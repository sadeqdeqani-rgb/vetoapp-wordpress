<?php
/**
 * Bootstrap for the VetoApp landing theme.
 *
 * @package VetoAppLanding
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/setup-pages.php';
require_once get_template_directory() . '/inc/admin.php';

/**
 * B Mitra contains Persian heh-with-yeh-above (ۀ) but not the combining
 * hamza-above sequence (هٔ). Normalize only public HTML so conventional
 * Persian copy remains visually complete when the self-hosted font is used.
 */
function vetoapp_landing_normalize_b_mitra_output(string $html): string
{
    return vetoapp_landing_normalize_b_mitra_text($html);
}

function vetoapp_landing_start_public_font_buffer(): void
{
    if (is_admin() || wp_doing_ajax() || is_feed()) {
        return;
    }

    ob_start('vetoapp_landing_normalize_b_mitra_output');
}
add_action('template_redirect', 'vetoapp_landing_start_public_font_buffer', 0);

function vetoapp_landing_setup(): void
{
    load_theme_textdomain('vetoapp-landing', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'               => 512,
        'width'                => 512,
        'flex-height'          => true,
        'flex-width'           => true,
        'unlink-homepage-logo' => true,
    ]);
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    register_nav_menus([
        'primary' => __('منوی اصلی', 'vetoapp-landing'),
        'footer'  => __('منوی پایین صفحه', 'vetoapp-landing'),
    ]);
}
add_action('after_setup_theme', 'vetoapp_landing_setup');

function vetoapp_landing_assets(): void
{
    $theme = wp_get_theme();
    $version = (string) $theme->get('Version');

    wp_enqueue_style('vetoapp-landing', get_stylesheet_uri(), [], $version);
    wp_enqueue_script(
        'vetoapp-landing',
        get_theme_file_uri('/assets/js/site.js'),
        [],
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'vetoapp_landing_assets');

function vetoapp_landing_customize_register(WP_Customize_Manager $customizer): void
{
    $customizer->add_section('vetoapp_links', [
        'title'       => __('پیوندهای وِتواَپ', 'vetoapp-landing'),
        'description' => __('این مقادیر فقط برای پیوندهای عمومی سایت معرفی هستند.', 'vetoapp-landing'),
        'priority'    => 30,
    ]);

    $customizer->add_setting('vetoapp_android_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $customizer->add_control('vetoapp_android_url', [
        'label'       => __('نشانی دریافت نسخهٔ اندروید', 'vetoapp-landing'),
        'section'     => 'vetoapp_links',
        'type'        => 'url',
        'description' => __('فقط پس از بارگذاری نسخهٔ قابل‌اعتماد APK این مقدار را وارد کنید.', 'vetoapp-landing'),
    ]);

    $customizer->add_setting('vetoapp_contact_email', [
        'default'           => 'sadeqdeqani@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $customizer->add_control('vetoapp_contact_email', [
        'label'   => __('ایمیل تماس عمومی', 'vetoapp-landing'),
        'section' => 'vetoapp_links',
        'type'    => 'email',
    ]);
}
add_action('customize_register', 'vetoapp_landing_customize_register');

function vetoapp_landing_head_metadata(): void
{
    $site_name = get_bloginfo('name') ?: 'وِتواَپ';
    $description = 'وِتواَپ؛ معرفی محیطی برای آشنایی با مسیرهای مشارکت مدنی و تصمیم‌گیری جمعی.';
    $image = vetoapp_asset_url('/assets/images/social-card.png');
    ?>
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
    <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:image" content="<?php echo esc_url($image); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($image); ?>">
    <link rel="icon" href="<?php echo esc_url(vetoapp_asset_url('/assets/icons/favicon.svg')); ?>" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo esc_url(vetoapp_asset_url('/assets/icons/apple-touch-icon.png')); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="وِتواَپ">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="manifest" href="<?php echo esc_url(vetoapp_asset_url('/assets/icons/site.webmanifest')); ?>">
    <?php
}
add_action('wp_head', 'vetoapp_landing_head_metadata', 3);

function vetoapp_landing_body_classes(array $classes): array
{
    $classes[] = 'vetoapp-site';
    return $classes;
}
add_filter('body_class', 'vetoapp_landing_body_classes');
