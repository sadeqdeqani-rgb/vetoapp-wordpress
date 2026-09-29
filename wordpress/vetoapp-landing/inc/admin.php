<?php
/**
 * WordPress-native editorial controls for the VetoApp landing site.
 *
 * @package VetoAppLanding
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Default copy is kept in one place so the public template and the dashboard
 * always have a meaningful, editable starting point.
 *
 * @return array<string, string>
 */
function vetoapp_landing_default_options(): array
{
    return [
        'brand_name'          => 'وِتواَپ',
        'site_caption'        => 'همه‌پرسی . انتخابات . استیضاح',
        'brand_logo_url'      => '',
        'intro_video_url'     => '',
        'telegram_handle'     => 'sadeqdeqani',
        'header_cta_label'    => 'مشاهدهٔ محیط',
        'header_cta_url'      => '#preview',
        'contact_email'       => 'sadeqdeqani@gmail.com',
        'android_url'         => '',
        'hero_eyebrow'        => 'معرفی وِتواَپ',
        'hero_title'          => 'همه‌پرسی . انتخابات . استیضاح',
        'hero_lead'           => "وِتواَپ یک اپلیکیشن با قابلیت برگزاری همه‌پرسی، انتخابات و استیضاح است.\nهدف از توسعهٔ این اپلیکیشن، طراحی مسیر انقلاب سوم در ایران ـ پس از انقلاب مشروطه و انقلاب ۵۷ ـ برای انحلال و پایان جمهوری اسلامی و آغاز یک جمهوری تمام‌عیار در ایران است.",
        'hero_primary_label'  => 'مشاهدهٔ محیط سامانه',
        'hero_primary_url'    => '#preview',
        'hero_secondary_label'=> 'دریافت نسخهٔ اندروید',
        'hero_secondary_url'  => '#download',
        'hero_note_one'       => 'ثبت‌نام مبتنی بر کد ملی',
        'hero_note_two'       => 'بی‌نیاز از اتصال به وزارت کشور',
        'hero_note_three'     => 'هر کاربر یک حق رأی',
        'hero_app_name'       => 'وِتواَپ',
        'hero_app_caption'    => 'نمای نمونهٔ آفلاین',
        'hero_app_status_label' => 'محیط آشنایی با سامانه',
        'hero_app_status_value' => 'بدون دادهٔ زنده',
        'hero_app_filter'     => 'کشور / استان / شهرستان / شهر / روستا',
        'hero_app_section_title' => 'مسیرهای اصلی وِتواَپ',
        'hero_app_referendum' => 'آشنایی با همه‌پرسی',
        'hero_app_election'   => 'آشنایی با انتخابات',
        'features_label'      => '',
        'features_title'      => 'فرآیندهای اصلی در وِتواَپ',
        'features_lead'       => '',
        'flow_label'          => 'مؤلفه‌های اعتمادسازی سامانه',
        'flow_title'          => 'شفاف، مرحله به مرحله، قابل رهگیری',
        'flow_lead'           => '',
        'flow_one_title'      => 'رسید دیجیتال معتبر',
        'flow_one_body'       => 'پس از شرکت کاربر در فرایندهای رأی‌گیری، رسید امضاشدهٔ دیجیتال صادر خواهد شد.\nمحتوا و صحت رسید، قابل رهگیری و صحت‌سنجی خواهد بود.',
        'flow_two_title'      => 'زنجیره آرا مستند',
        'flow_two_body'       => 'در هر رأی‌گیری، زنجیره‌ای از آرا ساخته خواهد شد، تا سلامت کلی فرایند رأی‌گیری، تضمین شود.',
        'flow_three_title'    => 'صندوق قابل انتشار',
        'flow_three_body'     => 'تمامی تعرفه‌های رأی دیجیتال، زنجیرهٔ آرا و کل صندوق پس از پایان هر فرایند برای راستی‌آزمایی توسط اشخاص ثالث و نهادهای مردم‌نهاد انتشار خواهد یافت.',
        'preview_title'       => 'آشنایی با محیط سامانه',
        'preview_lead'        => 'برای آن‌که پیش از دریافت اپ با ساختار آن آشنا شوید، نمونه‌های آمادهٔ صفحه‌های اصلی را در این‌جا قرار داده‌ایم.',
        'preview_badge'       => 'تصاویر نمونهٔ از پیش آماده',
        'preview_notice'      => 'این تصاویر، نمونه‌های طراحی‌شده و آفلاین هستند؛ اطلاعات زنده، نتیجهٔ واقعی یا دادهٔ کاربران را نمایش نمی‌دهند.',
        'privacy_card_title'  => 'حریم خصوصی',
        'privacy_card_body'   => 'سامانه برای ثبت‌نام و تضمین احراز هویت یکتا، با شماره تلفن همراه و کد ملی بنا شده است. سایر مشخصات در فرایندهای ثبت‌نام، از کاربر اخذ نمی‌شود.',
        'privacy_label'       => 'حریم خصوصی',
        'privacy_title'       => 'حفظ داده‌های ضروری، بدون دریافت مشخصات اضافی',
        'privacy_body'        => 'سامانه برای ثبت‌نام و تضمین احراز هویت یکتا، با شماره تلفن همراه و کد ملی بنا شده است. سایر مشخصات در فرایندهای ثبت‌نام، از کاربر اخذ نمی‌شود.',
        'privacy_link_label'  => 'مطالعهٔ حریم خصوصی',
        'faq_label'           => 'پرسش‌های متداول',
        'faq_title'           => 'پاسخ‌های کوتاه پیش از ورود به اپ',
        'faq_lead'            => 'این پاسخ‌ها فقط برای معرفی نسخهٔ فعلی سایت هستند. جزئیات حقوقی و عملیاتی در نسخه‌های تأییدشدهٔ قوانین و حریم خصوصی منتشر می‌شوند.',
        'download_label'      => 'نسخهٔ اندروید',
        'download_title'      => 'برای آشنایی بیشتر، اپلیکیشن را دریافت کنید',
        'download_lead'       => 'پیوند دریافت فقط زمانی در این بخش فعال می‌شود که فایل نهایی در محل قابل‌اعتماد و قابل‌تأیید قرار گرفته باشد.',
        'download_ready_status' => 'پیوند دریافت توسط مدیر سایت تنظیم شده است.',
        'download_pending_status' => 'پیوند نهایی هنوز منتشر نشده است.',
        'footer_copy'         => 'وِتواَپ؛ همه‌پرسی، انتخابات و استیضاح.',
        'footer_quick_title'  => 'دسترسی سریع',
        'footer_contact_title'=> 'اطلاعات و تماس',
        'footer_bottom_left'  => 'همهٔ حقوق محفوظ است.',
        'footer_bottom_right' => 'همه‌پرسی . انتخابات . استیضاح',
    ];
}

/**
 * @return array<string, string>
 */
function vetoapp_landing_options(): array
{
    $stored = get_option('vetoapp_landing_options', []);
    $options = wp_parse_args(is_array($stored) ? $stored : [], vetoapp_landing_default_options());

    $non_text_options = ['contact_email', 'android_url', 'brand_logo_url', 'intro_video_url', 'header_cta_url', 'hero_primary_url', 'hero_secondary_url'];
    foreach ($options as $key => $value) {
        if (is_string($value) && !in_array($key, $non_text_options, true)) {
            $options[$key] = vetoapp_landing_normalize_b_mitra_text($value);
        }
    }

    return $options;
}

function vetoapp_landing_option(string $key): string
{
    $options = vetoapp_landing_options();
    $value = $options[$key] ?? '';

    return is_scalar($value) ? (string) $value : '';
}

/**
 * @param mixed $input
 * @return array<string, string>
 */
function vetoapp_landing_sanitize_options($input): array
{
    $input = is_array($input) ? $input : [];
    $defaults = vetoapp_landing_default_options();
    $sanitized = [];
    $url_fields = ['brand_logo_url', 'intro_video_url', 'header_cta_url', 'android_url', 'hero_primary_url', 'hero_secondary_url'];
    $email_fields = ['contact_email'];
    $textarea_fields = [
        'hero_title',
        'hero_lead',
        'preview_notice',
        'privacy_card_body',
        'privacy_body',
        'features_lead',
        'flow_lead',
        'flow_one_body',
        'flow_two_body',
        'flow_three_body',
        'preview_lead',
        'faq_lead',
        'download_lead',
        'footer_copy',
    ];

    foreach ($defaults as $key => $default) {
        $value = $input[$key] ?? $default;
        $value = is_scalar($value) ? (string) $value : $default;

        if (in_array($key, $url_fields, true)) {
            $sanitized[$key] = esc_url_raw($value);
            continue;
        }

        if (in_array($key, $email_fields, true)) {
            $sanitized[$key] = sanitize_email($value);
            continue;
        }

        $sanitized[$key] = in_array($key, $textarea_fields, true)
            ? sanitize_textarea_field($value)
            : sanitize_text_field($value);
        $sanitized[$key] = vetoapp_landing_normalize_b_mitra_text($sanitized[$key]);
    }

    return $sanitized;
}

function vetoapp_landing_register_settings(): void
{
    register_setting('vetoapp_landing_settings', 'vetoapp_landing_options', [
        'type'              => 'array',
        'sanitize_callback' => 'vetoapp_landing_sanitize_options',
        'default'           => vetoapp_landing_default_options(),
    ]);
}
add_action('admin_init', 'vetoapp_landing_register_settings');

function vetoapp_landing_register_editorial_post_types(): void
{
    register_post_type('vetoapp_feature', [
        'labels' => [
            'name'          => 'قابلیت‌ها',
            'singular_name' => 'قابلیت',
            'add_new_item'  => 'افزودن قابلیت',
            'edit_item'     => 'ویرایش قابلیت',
            'all_items'     => 'همهٔ قابلیت‌ها',
            'menu_name'     => 'قابلیت‌ها',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => 'vetoapp-content',
        'show_in_rest'        => true,
        'map_meta_cap'        => true,
        'capability_type'     => 'post',
        'supports'            => ['title', 'editor', 'excerpt', 'page-attributes'],
        'has_archive'         => false,
        'rewrite'             => false,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
    ]);

    register_post_type('vetoapp_preview', [
        'labels' => [
            'name'          => 'تصاویر نمونه',
            'singular_name' => 'تصویر نمونه',
            'add_new_item'  => 'افزودن تصویر نمونه',
            'edit_item'     => 'ویرایش تصویر نمونه',
            'all_items'     => 'همهٔ تصاویر نمونه',
            'menu_name'     => 'تصاویر نمونه',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => 'vetoapp-content',
        'show_in_rest'        => true,
        'map_meta_cap'        => true,
        'capability_type'     => 'post',
        'supports'            => ['title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'],
        'has_archive'         => false,
        'rewrite'             => false,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
    ]);

    register_post_type('vetoapp_faq', [
        'labels' => [
            'name'          => 'پرسش‌های متداول',
            'singular_name' => 'پرسش متداول',
            'add_new_item'  => 'افزودن پرسش',
            'edit_item'     => 'ویرایش پرسش',
            'all_items'     => 'همهٔ پرسش‌ها',
            'menu_name'     => 'پرسش‌های متداول',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => 'vetoapp-content',
        'show_in_rest'        => true,
        'map_meta_cap'        => true,
        'capability_type'     => 'post',
        'supports'            => ['title', 'editor', 'excerpt', 'page-attributes'],
        'has_archive'         => false,
        'rewrite'             => false,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
    ]);
}
add_action('init', 'vetoapp_landing_register_editorial_post_types');

/**
 * @return array<string, string>
 */
function vetoapp_landing_feature_icon_options(): array
{
    return [
        'referendum' => 'همه‌پرسی',
        'election'   => 'انتخابات',
        'impeachment'=> 'استیضاح',
        'location'   => 'محدودهٔ محلی',
    ];
}

function vetoapp_landing_add_feature_meta_box(WP_Post $post): void
{
    add_meta_box(
        'vetoapp-feature-icon',
        'نمای قابلیت در سایت',
        'vetoapp_landing_render_feature_meta_box',
        'vetoapp_feature',
        'side',
        'default'
    );
}
add_action('add_meta_boxes_vetoapp_feature', 'vetoapp_landing_add_feature_meta_box');

function vetoapp_landing_render_feature_meta_box(WP_Post $post): void
{
    $selected = (string) get_post_meta($post->ID, '_vetoapp_feature_icon', true);
    $options = vetoapp_landing_feature_icon_options();
    $selected = array_key_exists($selected, $options) ? $selected : 'referendum';

    wp_nonce_field('vetoapp_save_feature_icon', 'vetoapp_feature_icon_nonce');
    ?>
    <p>
        <label for="vetoapp-feature-icon-select"><strong>رنگ و آیکن کارت</strong></label>
    </p>
    <select id="vetoapp-feature-icon-select" name="vetoapp_feature_icon" class="widefat">
        <?php foreach ($options as $key => $label) : ?>
            <option value="<?php echo esc_attr($key); ?>" <?php selected($selected, $key); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description">ترتیب نمایش قابلیت‌ها از «ویژگی‌های برگه» تعیین می‌شود.</p>
    <?php
}

function vetoapp_landing_save_feature_icon(int $post_id, WP_Post $post): void
{
    if ($post->post_type !== 'vetoapp_feature') {
        return;
    }

    if (
        !isset($_POST['vetoapp_feature_icon_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['vetoapp_feature_icon_nonce'])), 'vetoapp_save_feature_icon')
        || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || wp_is_post_revision($post_id)
        || !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    $value = isset($_POST['vetoapp_feature_icon'])
        ? sanitize_key(wp_unslash($_POST['vetoapp_feature_icon']))
        : 'referendum';
    $options = vetoapp_landing_feature_icon_options();

    update_post_meta($post_id, '_vetoapp_feature_icon', array_key_exists($value, $options) ? $value : 'referendum');
}
add_action('save_post_vetoapp_feature', 'vetoapp_landing_save_feature_icon', 10, 2);

function vetoapp_landing_add_faq_resource_meta_box(WP_Post $post): void
{
    add_meta_box(
        'vetoapp-faq-resource',
        'فایل یا پیوند تکمیلی',
        'vetoapp_landing_render_faq_resource_meta_box',
        'vetoapp_faq',
        'side',
        'default'
    );
}
add_action('add_meta_boxes_vetoapp_faq', 'vetoapp_landing_add_faq_resource_meta_box');

function vetoapp_landing_render_faq_resource_meta_box(WP_Post $post): void
{
    $url = (string) get_post_meta($post->ID, '_vetoapp_faq_resource_url', true);
    $label = (string) get_post_meta($post->ID, '_vetoapp_faq_resource_label', true);
    wp_nonce_field('vetoapp_save_faq_resource', 'vetoapp_faq_resource_nonce');
    ?>
    <p><label for="vetoapp-faq-resource-url"><strong>فایل PDF یا نشانی پیوند</strong></label></p>
    <div class="vetoapp-media-field">
        <input id="vetoapp-faq-resource-url" name="vetoapp_faq_resource_url" type="url" value="<?php echo esc_attr($url); ?>" class="widefat code" data-vetoapp-media-url data-vetoapp-media-type="application/pdf" data-vetoapp-media-title="انتخاب فایل PDF" data-vetoapp-media-button="استفاده از این فایل">
        <button type="button" class="button" data-vetoapp-media-select>انتخاب از کتابخانهٔ رسانه</button>
        <button type="button" class="button-link-delete" data-vetoapp-media-clear>حذف فایل</button>
    </div>
    <p><label for="vetoapp-faq-resource-label"><strong>متن دکمهٔ دانلود</strong></label></p>
    <input id="vetoapp-faq-resource-label" name="vetoapp_faq_resource_label" type="text" value="<?php echo esc_attr($label); ?>" class="widefat">
    <p class="description">این پیوند زیر پاسخ همین پرسش نمایش داده می‌شود.</p>
    <?php
}

function vetoapp_landing_save_faq_resource(int $post_id, WP_Post $post): void
{
    if ($post->post_type !== 'vetoapp_faq' || !isset($_POST['vetoapp_faq_resource_nonce'])) {
        return;
    }

    if (
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['vetoapp_faq_resource_nonce'])), 'vetoapp_save_faq_resource')
        || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || wp_is_post_revision($post_id)
        || !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    $url = isset($_POST['vetoapp_faq_resource_url']) ? esc_url_raw(wp_unslash($_POST['vetoapp_faq_resource_url'])) : '';
    $label = isset($_POST['vetoapp_faq_resource_label'])
        ? vetoapp_landing_normalize_b_mitra_text(sanitize_text_field(wp_unslash($_POST['vetoapp_faq_resource_label'])))
        : '';
    update_post_meta($post_id, '_vetoapp_faq_resource_url', $url);
    update_post_meta($post_id, '_vetoapp_faq_resource_label', $label);
}
add_action('save_post_vetoapp_faq', 'vetoapp_landing_save_faq_resource', 10, 2);

function vetoapp_landing_add_page_subtitle_meta_box(WP_Post $post): void
{
    $managed_slugs = ['about', 'faq', 'privacy', 'terms', 'contact'];

    if (!in_array($post->post_name, $managed_slugs, true)) {
        return;
    }

    add_meta_box(
        'vetoapp-page-subtitle',
        'زیرعنوان صفحه',
        'vetoapp_landing_render_page_subtitle_meta_box',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes_page', 'vetoapp_landing_add_page_subtitle_meta_box');

function vetoapp_landing_render_page_subtitle_meta_box(WP_Post $post): void
{
    wp_nonce_field('vetoapp_save_page_subtitle', 'vetoapp_page_subtitle_nonce');
    $subtitle = (string) get_post_meta($post->ID, '_vetoapp_page_subtitle', true);
    ?>
    <p><label for="vetoapp-page-subtitle"><strong>متن زیر عنوان در سربرگ همین صفحه</strong></label></p>
    <textarea id="vetoapp-page-subtitle" name="vetoapp_page_subtitle" rows="3" class="widefat"><?php echo esc_textarea($subtitle); ?></textarea>
    <p class="description">در صورت خالی‌بودن، متن پیش‌فرض قالب نمایش داده می‌شود.</p>
    <?php
}

function vetoapp_landing_save_page_subtitle(int $post_id, WP_Post $post): void
{
    if ($post->post_type !== 'page' || !isset($_POST['vetoapp_page_subtitle_nonce'])) {
        return;
    }

    if (
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['vetoapp_page_subtitle_nonce'])), 'vetoapp_save_page_subtitle')
        || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || wp_is_post_revision($post_id)
        || !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    $subtitle = isset($_POST['vetoapp_page_subtitle'])
        ? vetoapp_landing_normalize_b_mitra_text(sanitize_textarea_field(wp_unslash($_POST['vetoapp_page_subtitle'])))
        : '';
    update_post_meta($post_id, '_vetoapp_page_subtitle', $subtitle);
}
add_action('save_post_page', 'vetoapp_landing_save_page_subtitle', 10, 2);

/**
 * Keep text entered in the theme's native editorial post types compatible
 * with the self-hosted B Mitra font in both the editor and public pages.
 *
 * @param array<string, mixed> $data
 * @param array<string, mixed> $postarr
 * @return array<string, mixed>
 */
function vetoapp_landing_normalize_editorial_post_data(array $data, array $postarr): array
{
    $editorial_types = ['vetoapp_feature', 'vetoapp_preview', 'vetoapp_faq'];

    if (!in_array($data['post_type'] ?? '', $editorial_types, true)) {
        return $data;
    }

    foreach (['post_title', 'post_content', 'post_excerpt'] as $field) {
        if (isset($data[$field]) && is_string($data[$field])) {
            $data[$field] = vetoapp_landing_normalize_b_mitra_text($data[$field]);
        }
    }

    return $data;
}
add_filter('wp_insert_post_data', 'vetoapp_landing_normalize_editorial_post_data', 10, 2);

function vetoapp_landing_add_admin_menu(): void
{
    add_menu_page(
        'محتوای وِتواَپ',
        'محتوای وِتواَپ',
        'manage_options',
        'vetoapp-content',
        'vetoapp_landing_render_admin_page',
        'dashicons-layout',
        58
    );
}
add_action('admin_menu', 'vetoapp_landing_add_admin_menu');

function vetoapp_landing_render_admin_field(array $options, string $key, string $label, string $description = '', string $type = 'text'): void
{
    $value = $options[$key] ?? '';
    $name = 'vetoapp_landing_options[' . $key . ']';
    ?>
    <tr>
        <th scope="row"><label for="<?php echo esc_attr('vetoapp-' . $key); ?>"><?php echo esc_html($label); ?></label></th>
        <td>
            <?php if ($type === 'textarea') : ?>
                <textarea id="<?php echo esc_attr('vetoapp-' . $key); ?>" name="<?php echo esc_attr($name); ?>" rows="3" class="large-text"><?php echo esc_textarea((string) $value); ?></textarea>
            <?php elseif ($type === 'media' || $type === 'media-file') : ?>
                <div class="vetoapp-media-field">
                    <input id="<?php echo esc_attr('vetoapp-' . $key); ?>" name="<?php echo esc_attr($name); ?>" type="url" value="<?php echo esc_attr((string) $value); ?>" class="regular-text code" data-vetoapp-media-url<?php echo $type === 'media-file' ? ' data-vetoapp-media-type="video" data-vetoapp-media-title="انتخاب ویدیوی معرفی" data-vetoapp-media-button="استفاده از این ویدیو"' : ''; ?>>
                    <button type="button" class="button" data-vetoapp-media-select>انتخاب از کتابخانهٔ رسانه</button>
                    <button type="button" class="button-link-delete" data-vetoapp-media-clear>حذف تصویر</button>
                </div>
                <?php if ($type === 'media') : ?>
                    <img class="vetoapp-media-preview" data-vetoapp-media-preview src="<?php echo esc_url((string) $value); ?>" alt=""<?php echo $value === '' ? ' hidden' : ''; ?>>
                <?php endif; ?>
            <?php else : ?>
                <input id="<?php echo esc_attr('vetoapp-' . $key); ?>" name="<?php echo esc_attr($name); ?>" type="<?php echo esc_attr($type); ?>" value="<?php echo esc_attr((string) $value); ?>" class="regular-text<?php echo $type === 'url' ? ' code' : ''; ?>">
            <?php endif; ?>
            <?php if ($description !== '') : ?>
                <p class="description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </td>
    </tr>
    <?php
}

function vetoapp_landing_render_admin_page(): void
{
    if (!current_user_can('manage_options')) {
        wp_die('شما اجازهٔ دسترسی به این صفحه را ندارید.');
    }

    $options = vetoapp_landing_options();
    $feature_url = admin_url('edit.php?post_type=vetoapp_feature');
    $preview_url = admin_url('edit.php?post_type=vetoapp_preview');
    $faq_url = admin_url('edit.php?post_type=vetoapp_faq');
    $pages_url = admin_url('edit.php?post_type=page');
    ?>
    <div class="wrap vetoapp-admin">
        <div class="vetoapp-admin__hero">
            <div>
                <p class="vetoapp-admin__eyebrow">مدیریت محتوا</p>
                <h1>محتوای سایت وِتواَپ</h1>
                <p>متن صفحهٔ اصلی، پیوندهای عمومی و اجزای محتوایی سایت از این‌جا مدیریت می‌شوند؛ بدون نیاز به page builder یا ویرایش فایل قالب.</p>
            </div>
            <span class="vetoapp-admin__badge">همگام با ظاهر اپ</span>
        </div>

        <div class="vetoapp-admin__routes" aria-label="مسیرهای ویرایش محتوا">
            <a href="<?php echo esc_url($feature_url); ?>"><strong>قابلیت‌ها</strong><span>کارت‌های صفحهٔ اصلی، متن، آیکن و ترتیب</span></a>
            <a href="<?php echo esc_url($preview_url); ?>"><strong>تصاویر نمونه</strong><span>گالری محیط سامانه و تصویر شاخص هر مورد</span></a>
            <a href="<?php echo esc_url($faq_url); ?>"><strong>پرسش‌های متداول</strong><span>سؤال در عنوان و پاسخ در ویرایشگر</span></a>
            <a href="<?php echo esc_url($pages_url); ?>"><strong>برگه‌ها</strong><span>دربارهٔ ما، حریم خصوصی، قوانین و تماس</span></a>
            <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><strong>منوها</strong><span>ویرایش ترتیب و پیوندهای منوی سایت</span></a>
            <a href="<?php echo esc_url(admin_url('upload.php')); ?>"><strong>رسانه‌ها</strong><span>بارگذاری لوگو و تصویرهای جدید</span></a>
        </div>

        <form action="options.php" method="post" class="vetoapp-admin__form">
            <?php settings_fields('vetoapp_landing_settings'); ?>
            <?php settings_errors('vetoapp_landing_options'); ?>

            <details class="vetoapp-admin__section" open>
                <summary>هویت عمومی و پیوندها</summary>
                <table class="form-table" role="presentation">
                    <?php vetoapp_landing_render_admin_field($options, 'brand_name', 'نام برند'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'site_caption', 'زیرعنوان کنار لوگو'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'brand_logo_url', 'لوگوی سایت', 'برای تغییر لوگو، تصویر را از کتابخانهٔ رسانه انتخاب کنید.', 'media'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'intro_video_url', 'فایل ویدیوی معرفی', 'ویدیوی MP4 را از کتابخانهٔ رسانه انتخاب کنید.', 'media-file'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'header_cta_label', 'متن دکمهٔ هدر'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'header_cta_url', 'پیوند دکمهٔ هدر', 'مثال: #preview یا یک نشانی کامل.', 'url'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'contact_email', 'ایمیل تماس عمومی', 'برای دریافت پیام‌های عمومی؛ هرگز اطلاعات حساس را در آن منتشر نکنید.', 'email'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'telegram_handle', 'شناسهٔ تلگرام', 'شناسه را بدون @ یا با @ وارد کنید.'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'android_url', 'نشانی دریافت نسخهٔ اندروید', 'پس از قراردادن APK در محل قابل‌اعتماد وارد کنید.', 'url'); ?>
                </table>
            </details>

            <details class="vetoapp-admin__section" open>
                <summary>بخش آغازین صفحهٔ اصلی</summary>
                <table class="form-table" role="presentation">
                    <?php vetoapp_landing_render_admin_field($options, 'hero_eyebrow', 'برچسب بالای عنوان'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_title', 'عنوان اصلی', 'برای شکستن خط، Enter بزنید.', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_lead', 'متن معرفی', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_primary_label', 'متن دکمهٔ اول'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_primary_url', 'پیوند دکمهٔ اول', 'برای پیوند داخل همین صفحه می‌توانید #preview یا #features وارد کنید.', 'url'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_secondary_label', 'متن دکمهٔ دوم'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_secondary_url', 'پیوند دکمهٔ دوم', 'اگر پیوند Android تنظیم شود، دکمهٔ دریافت در انتهای صفحه نیز فعال می‌شود.', 'url'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_note_one', 'گزینهٔ معرفی اول'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_note_two', 'گزینهٔ معرفی دوم'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_note_three', 'گزینهٔ معرفی سوم'); ?>
                </table>
            </details>

            <details class="vetoapp-admin__section">
                <summary>نمای نمونهٔ اپ در ابتدای صفحه</summary>
                <table class="form-table" role="presentation">
                    <?php vetoapp_landing_render_admin_field($options, 'hero_app_name', 'نام در نمای اپ'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_app_caption', 'زیرعنوان نمای اپ'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_app_status_label', 'عنوان وضعیت'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_app_status_value', 'مقدار وضعیت'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_app_filter', 'متن محدودهٔ جغرافیایی'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_app_section_title', 'عنوان مسیرها'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_app_referendum', 'متن کارت همه‌پرسی'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'hero_app_election', 'متن کارت انتخابات'); ?>
                </table>
            </details>

            <details class="vetoapp-admin__section">
                <summary>عنوان و متن بخش‌ها</summary>
                <table class="form-table" role="presentation">
                    <?php vetoapp_landing_render_admin_field($options, 'features_label', 'برچسب قابلیت‌ها'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'features_title', 'عنوان قابلیت‌ها'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'features_lead', 'توضیح قابلیت‌ها', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'preview_title', 'عنوان محیط سامانه'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'preview_lead', 'توضیح محیط سامانه', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'preview_badge', 'برچسب تصاویر نمونه'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'preview_notice', 'یادداشت زیر تصاویر نمونه', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'faq_label', 'برچسب پرسش‌های متداول'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'faq_title', 'عنوان پرسش‌های متداول'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'faq_lead', 'توضیح پرسش‌های متداول', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'download_label', 'برچسب بخش Android'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'download_title', 'عنوان بخش Android'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'download_lead', 'توضیح بخش Android', '', 'textarea'); ?>
                </table>
            </details>

            <details class="vetoapp-admin__section">
                <summary>مسیر آشنایی کاربر</summary>
                <table class="form-table" role="presentation">
                    <?php vetoapp_landing_render_admin_field($options, 'flow_label', 'برچسب بخش'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'flow_title', 'عنوان بخش'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'flow_lead', 'توضیح بخش', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'flow_one_title', 'عنوان گام اول'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'flow_one_body', 'توضیح گام اول', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'flow_two_title', 'عنوان گام دوم'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'flow_two_body', 'توضیح گام دوم', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'flow_three_title', 'عنوان گام سوم'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'flow_three_body', 'توضیح گام سوم', '', 'textarea'); ?>
                </table>
            </details>

            <details class="vetoapp-admin__section">
                <summary>حریم خصوصی و بخش دریافت اپ</summary>
                <table class="form-table" role="presentation">
                    <?php vetoapp_landing_render_admin_field($options, 'privacy_card_title', 'عنوان کارت حریم خصوصی'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'privacy_card_body', 'متن کارت حریم خصوصی', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'privacy_label', 'برچسب بخش حریم خصوصی'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'privacy_title', 'عنوان بخش حریم خصوصی'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'privacy_body', 'متن بخش حریم خصوصی', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'privacy_link_label', 'متن پیوند حریم خصوصی'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'download_ready_status', 'پیام آماده‌بودن دریافت'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'download_pending_status', 'پیام نبود پیوند دریافت'); ?>
                </table>
            </details>

            <details class="vetoapp-admin__section">
                <summary>فوتر</summary>
                <table class="form-table" role="presentation">
                    <?php vetoapp_landing_render_admin_field($options, 'footer_copy', 'متن معرفی فوتر', '', 'textarea'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'footer_quick_title', 'عنوان ستون پیوندهای سریع'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'footer_contact_title', 'عنوان ستون تماس'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'footer_bottom_left', 'متن پایین فوتر ـ سمت اول'); ?>
                    <?php vetoapp_landing_render_admin_field($options, 'footer_bottom_right', 'متن پایین فوتر ـ سمت دوم'); ?>
                </table>
            </details>

            <?php submit_button('ذخیرهٔ تغییرات'); ?>
        </form>

        <p class="vetoapp-admin__note">ترتیب نمایش قابلیت‌ها، تصاویر نمونه و پرسش‌ها از فیلد «ترتیب» در هر مورد تعیین می‌شود. تصویرهای بخش محیط سامانه باید همواره با برچسب «تصویر نمونه» منتشر شوند.</p>
    </div>
    <?php
}

function vetoapp_landing_admin_assets(string $hook): void
{
    $screen = get_current_screen();
    $content_screens = ['vetoapp_feature', 'vetoapp_preview', 'vetoapp_faq'];
    $is_landing_screen = $hook === 'toplevel_page_vetoapp-content'
        || ($screen instanceof WP_Screen && in_array($screen->post_type, $content_screens, true));

    if (!$is_landing_screen) {
        return;
    }

    $theme = wp_get_theme();
    wp_enqueue_media();
    wp_enqueue_style(
        'vetoapp-landing-admin',
        get_theme_file_uri('/assets/css/admin.css'),
        [],
        (string) $theme->get('Version')
    );
    wp_enqueue_script(
        'vetoapp-landing-admin',
        get_theme_file_uri('/assets/js/admin.js'),
        ['jquery'],
        (string) $theme->get('Version'),
        true
    );
}
add_action('admin_enqueue_scripts', 'vetoapp_landing_admin_assets');

function vetoapp_landing_seed_editorial_content(): void
{
    if (get_option('vetoapp_landing_editorial_seeded') === '1') {
        return;
    }

    vetoapp_landing_register_editorial_post_types();

    $features = [
        ['همه‌پرسی', "پیشنهاد و انتخاب موضوع توسط کاربران\nمشاهدهٔ کمپین‌ها و موضوعات پیشنهادی به‌صورت زنده\nپیشنهاد همه‌پرسی در سطوح ملی و محلی\nمشاهدهٔ نتایج همه‌پرسی‌ها به‌صورت زنده", 'referendum'],
        ['انتخابات', "ثبت‌نام آزادانه و بی‌قیدوشرط نامزدها\nمشاهدهٔ نتایج انتخابات به‌صورت زنده\nامکان رهگیری رأی ارسالی به صندوق و اطمینان از ثبت رأی", 'election'],
        ['استیضاح', "امکان استیضاح هر مقام سیاسی و حاکمیتی توسط کاربران\nبرگزاری استیضاح در سطح ملی و محلی\nمشاهدهٔ تعداد متقاضیان استیضاح و نتایج رأی اعتماد به‌صورت زنده", 'impeachment'],
    ];
    $previews = [
        ['مسیرهای اصلی سامانه', 'نمایی یکجا از بخش‌های اصلی برای آشنایی سریع با ساختار و ناوبری.', 'vetoapp_navigation_concept_v1.svg'],
        ['خانه و فرصت‌های مشارکت', 'نمونهٔ چیدمان صفحهٔ خانه و مسیر شروع یک اقدام مدنی.', 'vetoapp_home_proposed_theme.svg'],
        ['نمای دسترس‌پذیر محیط', 'نمونهٔ چیدمان خوانا و رنگ‌بندی با کنتراست مناسب.', 'vetoapp_home_wcag_palette.svg'],
    ];
    $faqs = [
        ['وِتواَپ چیست؟', 'وِتواَپ یک اپلیکیشن با محوریت آشنایی و مشارکت کاربران در فرایندهای همه‌پرسی، انتخابات و استیضاح در سطوح مختلف جغرافیایی است.'],
        ['آیا تصاویر این سایت اطلاعات زنده را نمایش می‌دهند؟', 'خیر. تصاویر بخش «آشنایی با محیط سامانه» نمونه‌های از پیش آماده هستند و هیچ دادهٔ زنده یا اطلاعات کاربران در آن‌ها وجود ندارد.'],
        ['ثبت‌نام از طریق سایت انجام می‌شود؟', 'خیر. این وب‌سایت فرم ثبت‌نام یا دریافت دادهٔ هویتی ندارد. هر فرایند رسمی ثبت‌نام، در صورت عرضه، فقط از مسیر اعلام‌شده در اپلیکیشن انجام می‌شود.'],
        ['نسخهٔ اندروید را از کجا دریافت کنم؟', 'پس از انتشار رسمی، پیوند دریافت نسخهٔ اندروید در همین صفحه و از مسیر قابل‌اعتماد اعلام خواهد شد.'],
    ];

    if ((int) wp_count_posts('vetoapp_feature')->publish === 0) {
        foreach ($features as $order => [$title, $excerpt, $icon]) {
            $post_id = wp_insert_post([
                'post_type'    => 'vetoapp_feature',
                'post_status'  => 'publish',
                'post_title'   => $title,
                'post_excerpt' => $excerpt,
                'menu_order'   => $order,
            ]);

            if (is_int($post_id) && $post_id > 0) {
                update_post_meta($post_id, '_vetoapp_feature_icon', $icon);
            }
        }
    }

    if ((int) wp_count_posts('vetoapp_preview')->publish === 0) {
        foreach ($previews as $order => [$title, $excerpt, $asset]) {
            $post_id = wp_insert_post([
                'post_type'    => 'vetoapp_preview',
                'post_status'  => 'publish',
                'post_title'   => $title,
                'post_excerpt' => $excerpt,
                'menu_order'   => $order,
            ]);

            if (is_int($post_id) && $post_id > 0) {
                update_post_meta($post_id, '_vetoapp_preview_asset', $asset);
            }
        }
    }

    if ((int) wp_count_posts('vetoapp_faq')->publish === 0) {
        foreach ($faqs as $order => [$title, $answer]) {
            wp_insert_post([
                'post_type'    => 'vetoapp_faq',
                'post_status'  => 'publish',
                'post_title'   => $title,
                'post_content' => $answer,
                'menu_order'   => $order,
            ]);
        }
    }

    update_option('vetoapp_landing_editorial_seeded', '1', false);
}
add_action('after_switch_theme', 'vetoapp_landing_seed_editorial_content', 20);

function vetoapp_landing_maybe_seed_editorial_content(): void
{
    if (get_option('vetoapp_landing_editorial_seeded') !== '1') {
        vetoapp_landing_seed_editorial_content();
    }
}
add_action('admin_init', 'vetoapp_landing_maybe_seed_editorial_content', 20);
