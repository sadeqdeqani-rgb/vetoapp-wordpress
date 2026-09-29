<?php
/** @package VetoAppLanding */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">پرش به محتوای اصلی</a>
<header class="site-header">
    <div class="veto-container site-header__inner">
        <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="صفحهٔ اصلی وِتواَپ">
            <img class="brand__logo" src="<?php echo esc_url(vetoapp_brand_logo_url()); ?>" width="92" height="92" alt="">
            <span>
                <span class="brand__name"><?php echo esc_html(vetoapp_landing_option('brand_name')); ?></span>
                <span class="brand__caption"><?php echo esc_html(vetoapp_landing_option('site_caption')); ?></span>
            </span>
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="باز کردن منوی اصلی">
            <span></span><span></span><span></span>
        </button>

        <nav id="primary-navigation" class="primary-nav" aria-label="منوی اصلی">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => 'vetoapp_primary_nav_fallback',
            ]);
            ?>
        </nav>

    </div>
</header>
