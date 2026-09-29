<?php
/**
 * Presentation helpers kept free of plugin dependencies.
 *
 * @package VetoAppLanding
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function vetoapp_asset_url(string $path): string
{
    return get_theme_file_uri($path);
}

function vetoapp_brand_logo_url(): string
{
    $url = esc_url_raw(vetoapp_landing_option('brand_logo_url'));

    return $url !== '' ? $url : vetoapp_asset_url('/assets/images/vetoapp-logo.png');
}

function vetoapp_intro_video_url(): string
{
    return esc_url(vetoapp_landing_option('intro_video_url'));
}

function vetoapp_telegram_handle(): string
{
    $handle = trim(vetoapp_landing_option('telegram_handle'));
    $handle = ltrim($handle, '@');

    return $handle !== '' ? $handle : 'sadeqdeqani';
}

function vetoapp_page_subtitle(string $fallback = ''): string
{
    $post = get_post();
    $subtitle = $post instanceof WP_Post ? (string) get_post_meta($post->ID, '_vetoapp_page_subtitle', true) : '';

    return $subtitle !== '' ? $subtitle : $fallback;
}

/**
 * B Mitra provides the precomposed Persian heh-with-yeh-above glyph (ۀ),
 * while conventional input often uses the unsupported combining sequence هٔ.
 */
function vetoapp_landing_normalize_b_mitra_text(string $text): string
{
    return str_replace("\u{0647}\u{0654}", "\u{06C0}", $text);
}

/**
 * @return list<WP_Post>
 */
function vetoapp_landing_editorial_posts(string $post_type, int $limit = -1): array
{
    $allowed_types = ['vetoapp_feature', 'vetoapp_preview', 'vetoapp_faq'];

    if (!in_array($post_type, $allowed_types, true)) {
        return [];
    }

    return get_posts([
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'posts_per_page' => $limit,
        'orderby'        => ['menu_order' => 'ASC', 'date' => 'ASC'],
        'no_found_rows'  => true,
    ]);
}

function vetoapp_landing_post_summary(WP_Post $post): string
{
    $summary = trim((string) $post->post_excerpt);

    if ($summary !== '') {
        return $summary;
    }

    return trim(wp_strip_all_tags((string) $post->post_content));
}

/**
 * @return list<array{title: string, body: string, icon: string}>
 */
function vetoapp_landing_feature_items(): array
{
    $fallback = [
        ['title' => 'همه‌پرسی', 'body' => "پیشنهاد و انتخاب موضوع توسط کاربران\nمشاهدهٔ کمپین‌ها و موضوعات پیشنهادی به‌صورت زنده\nپیشنهاد همه‌پرسی در سطوح ملی و محلی\nمشاهدهٔ نتایج همه‌پرسی‌ها به‌صورت زنده", 'icon' => 'referendum'],
        ['title' => 'انتخابات', 'body' => "ثبت‌نام آزادانه و بی‌قیدوشرط نامزدها\nمشاهدهٔ نتایج انتخابات به‌صورت زنده\nامکان رهگیری رأی ارسالی به صندوق و اطمینان از ثبت رأی", 'icon' => 'election'],
        ['title' => 'استیضاح', 'body' => "امکان استیضاح هر مقام سیاسی و حاکمیتی توسط کاربران\nبرگزاری استیضاح در سطح ملی و محلی\nمشاهدهٔ تعداد متقاضیان استیضاح و نتایج رأی اعتماد به‌صورت زنده", 'icon' => 'impeachment'],
    ];
    $posts = vetoapp_landing_editorial_posts('vetoapp_feature');

    if ($posts === []) {
        return $fallback;
    }

    $icons = vetoapp_landing_feature_icon_options();
    $items = [];

    foreach ($posts as $post) {
        $icon = (string) get_post_meta($post->ID, '_vetoapp_feature_icon', true);
        $items[] = [
            'title' => get_the_title($post),
            'body'  => vetoapp_landing_post_summary($post),
            'icon'  => array_key_exists($icon, $icons) ? $icon : 'referendum',
        ];
    }

    return $items;
}

/**
 * @return array<string, array{url: string, alt: string, width: string, height: string}>
 */
function vetoapp_landing_preview_assets(): array
{
    return [
        'vetoapp_navigation_concept_v1.svg' => [
            'url'    => vetoapp_asset_url('/assets/previews/vetoapp_navigation_concept_v1.svg'),
            'alt'    => 'پیش‌نمایش مسیرهای اصلی سامانه شامل خانه، همه‌پرسی، انتخابات، استیضاح و حساب کاربری',
            'width'  => '900',
            'height' => '660',
        ],
        'vetoapp_home_proposed_theme.svg' => [
            'url'    => vetoapp_asset_url('/assets/previews/vetoapp_home_proposed_theme.svg'),
            'alt'    => 'پیش‌نمایش صفحهٔ خانه و فرصت‌های مشارکت',
            'width'  => '540',
            'height' => '1170',
        ],
        'vetoapp_home_wcag_palette.svg' => [
            'url'    => vetoapp_asset_url('/assets/previews/vetoapp_home_wcag_palette.svg'),
            'alt'    => 'پیش‌نمایش دسترس‌پذیر صفحهٔ خانهٔ سامانه',
            'width'  => '540',
            'height' => '1170',
        ],
    ];
}

/**
 * @return list<array{title: string, body: string, url: string, alt: string, width: string, height: string}>
 */
function vetoapp_landing_preview_items(): array
{
    $assets = vetoapp_landing_preview_assets();
    $posts = vetoapp_landing_editorial_posts('vetoapp_preview');

    if ($posts === []) {
        $fallback = [
            ['title' => 'مسیرهای اصلی سامانه', 'body' => 'نمایی یکجا از بخش‌های اصلی برای آشنایی سریع با ساختار و ناوبری.', 'asset' => 'vetoapp_navigation_concept_v1.svg'],
            ['title' => 'خانه و فرصت‌های مشارکت', 'body' => 'نمونهٔ چیدمان صفحهٔ خانه و مسیر شروع یک اقدام مدنی.', 'asset' => 'vetoapp_home_proposed_theme.svg'],
            ['title' => 'نمای دسترس‌پذیر محیط', 'body' => 'نمونهٔ چیدمان خوانا و رنگ‌بندی با کنتراست مناسب.', 'asset' => 'vetoapp_home_wcag_palette.svg'],
        ];

        return array_map(static function (array $item) use ($assets): array {
            $asset = $assets[$item['asset']];

            return [
                'title'  => $item['title'],
                'body'   => $item['body'],
                'url'    => $asset['url'],
                'alt'    => $asset['alt'],
                'width'  => $asset['width'],
                'height' => $asset['height'],
            ];
        }, $fallback);
    }

    $items = [];
    foreach ($posts as $post) {
        $asset_key = (string) get_post_meta($post->ID, '_vetoapp_preview_asset', true);
        $asset_key = array_key_exists($asset_key, $assets) ? $asset_key : 'vetoapp_navigation_concept_v1.svg';
        $asset = $assets[$asset_key];
        $attachment_id = (int) get_post_thumbnail_id($post);
        $url = $attachment_id > 0 ? wp_get_attachment_image_url($attachment_id, 'large') : false;
        $alt = $attachment_id > 0 ? (string) get_post_meta($attachment_id, '_wp_attachment_image_alt', true) : '';

        $items[] = [
            'title'  => get_the_title($post),
            'body'   => vetoapp_landing_post_summary($post),
            'url'    => $url ?: $asset['url'],
            'alt'    => $alt !== '' ? $alt : $asset['alt'],
            'width'  => $asset['width'],
            'height' => $asset['height'],
        ];
    }

    return $items;
}

/**
 * @return list<array{title: string, body: string, resource_url: string, resource_label: string}>
 */
function vetoapp_landing_faq_items(): array
{
    $fallback = [
        ['title' => 'وِتواَپ چیست؟', 'body' => 'وِتواَپ یک اپلیکیشن با محوریت آشنایی و مشارکت کاربران در فرایندهای همه‌پرسی، انتخابات و استیضاح در سطوح مختلف جغرافیایی است.', 'resource_url' => '', 'resource_label' => ''],
        ['title' => 'آیا تصاویر این سایت اطلاعات زنده را نمایش می‌دهند؟', 'body' => 'خیر. تصاویر بخش «آشنایی با محیط سامانه» نمونه‌های از پیش آماده هستند و هیچ دادهٔ زنده یا اطلاعات کاربران در آن‌ها وجود ندارد.', 'resource_url' => '', 'resource_label' => ''],
        ['title' => 'ثبت‌نام از طریق سایت انجام می‌شود؟', 'body' => 'خیر. این وب‌سایت فرم ثبت‌نام یا دریافت دادهٔ هویتی ندارد. هر فرایند رسمی ثبت‌نام، در صورت عرضه، فقط از مسیر اعلام‌شده در اپلیکیشن انجام می‌شود.', 'resource_url' => '', 'resource_label' => ''],
        ['title' => 'نسخهٔ اندروید را از کجا دریافت کنم؟', 'body' => 'پس از انتشار رسمی، پیوند دریافت نسخهٔ اندروید در همین صفحه و از مسیر قابل‌اعتماد اعلام خواهد شد.', 'resource_url' => '', 'resource_label' => ''],
    ];
    $posts = vetoapp_landing_editorial_posts('vetoapp_faq');

    if ($posts === []) {
        return $fallback;
    }

    $items = [];
    foreach ($posts as $post) {
        $items[] = [
            'title'          => get_the_title($post),
            'body'           => vetoapp_landing_post_summary($post),
            'resource_url'   => esc_url((string) get_post_meta($post->ID, '_vetoapp_faq_resource_url', true)),
            'resource_label' => (string) get_post_meta($post->ID, '_vetoapp_faq_resource_label', true),
        ];
    }

    return $items;
}

function vetoapp_render_current_page_content(): bool
{
    $post = get_post();

    if (!$post instanceof WP_Post || trim((string) $post->post_content) === '') {
        return false;
    }

    echo apply_filters('the_content', $post->post_content); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WordPress editor content is filtered by the_content.

    return true;
}

function vetoapp_page_url(string $slug): string
{
    $page = get_page_by_path($slug);

    if ($page instanceof WP_Post) {
        return (string) get_permalink($page);
    }

    return home_url('/' . trim($slug, '/') . '/');
}

function vetoapp_contact_email(): string
{
    $email = sanitize_email(vetoapp_landing_option('contact_email'));

    if ($email === '') {
        $email = sanitize_email((string) get_theme_mod('vetoapp_contact_email', 'sadeqdeqani@gmail.com'));
    }

    return $email !== '' ? $email : 'sadeqdeqani@gmail.com';
}

function vetoapp_android_url(): string
{
    $url = esc_url(vetoapp_landing_option('android_url'));

    return $url !== '' ? $url : esc_url((string) get_theme_mod('vetoapp_android_url', ''));
}

/**
 * Outputs a small trusted inline SVG. $class is escaped before use.
 */
function vetoapp_icon(string $name, string $class = ''): void
{
    $icons = [
        'arrow' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>',
        'download' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v12m0 0 4-4m-4 4-4-4M5 20h14"/></svg>',
        'preview' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/><circle cx="12" cy="12" r="2.6"/></svg>',
        'referendum' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 4.5h14v15H5zM8 9h8M8 13h4"/><path d="m15.5 13.2 1.1 1.1 2.1-2.4"/></svg>',
        'election' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4.5 9.5h15v10h-15zM7 9.5 9.5 5h5L17 9.5M8 14h8"/><path d="m11 16 1.4 1.3 2.6-3"/></svg>',
        'impeachment' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 5h14v14H5zM8 8h8M8 12h5M8 16h3"/><path d="m16 14 3 3m0-3-3 3"/></svg>',
        'location' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M19 10c0 5-7 10-7 10S5 15 5 10a7 7 0 1 1 14 0Z"/><circle cx="12" cy="10" r="2.2"/></svg>',
        'shield' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 19 6v5c0 4.4-3 8-7 10-4-2-7-5.6-7-10V6l7-3Z"/><path d="m9 12 2 2 4-4"/></svg>',
        'info' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5m0-8v.1"/></svg>',
        'mail' => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="5.5" width="17" height="13" rx="2"/><path d="m5 7 7 5 7-5"/></svg>',
        'close' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg>',
        'home' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m4 10 8-6 8 6v9.5H4z"/><path d="M9.5 19.5v-5h5v5"/></svg>',
        'profile' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="3.3"/><path d="M5.5 20c.8-3.5 3-5.2 6.5-5.2s5.7 1.7 6.5 5.2"/></svg>',
        'people' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2.3"/><path d="M3.5 20c.8-3.8 2.7-5.8 5.8-5.8s5 2 5.8 5.8M15 14.2c2.7.2 4.4 2.1 5.1 5.1"/></svg>',
        'filter' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 7h14M8 12h8m-5 5h2"/><circle cx="7" cy="7" r="1.6"/><circle cx="15" cy="12" r="1.6"/><circle cx="12" cy="17" r="1.6"/></svg>',
    ];

    if (!isset($icons[$name])) {
        return;
    }

    $class_attribute = $class !== '' ? ' class="' . esc_attr($class) . '"' : '';
    echo '<span' . $class_attribute . '>' . $icons[$name] . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted SVG map.
}

function vetoapp_primary_nav_fallback(): void
{
    $items = [
        home_url('/')        => 'خانه',
        home_url('/#features') => 'قابلیت‌ها',
        home_url('/#preview')  => 'محیط سامانه',
        vetoapp_page_url('faq') => 'پرسش‌های متداول',
        vetoapp_page_url('contact') => 'تماس',
    ];

    echo '<ul>';
    foreach ($items as $url => $label) {
        printf('<li><a href="%s">%s</a></li>', esc_url($url), esc_html($label));
    }
    echo '</ul>';
}

function vetoapp_page_hero(string $title, string $description): void
{
    ?>
    <section class="page-hero">
        <div class="veto-container">
            <a class="page-hero__crumb" href="<?php echo esc_url(home_url('/')); ?>">
                <?php vetoapp_icon('arrow', 'icon'); ?>
                <span>بازگشت به صفحهٔ اصلی</span>
            </a>
            <h1><?php echo esc_html($title); ?></h1>
            <p><?php echo esc_html($description); ?></p>
        </div>
    </section>
    <?php
}
