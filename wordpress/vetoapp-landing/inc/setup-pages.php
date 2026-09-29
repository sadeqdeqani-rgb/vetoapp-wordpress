<?php
/**
 * Minimal first-run setup. Existing content and menus are never overwritten.
 *
 * @package VetoAppLanding
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function vetoapp_landing_seed_pages(): void
{
    $pages = [
        'home'    => 'خانه',
        'about'   => 'دربارهٔ وِتواَپ',
        'faq'     => 'پرسش‌های متداول',
        'privacy' => 'حریم خصوصی',
        'terms'   => 'قوانین استفاده',
        'contact' => 'تماس با ما',
    ];
    $page_ids = [];

    foreach ($pages as $slug => $title) {
        $page = get_page_by_path($slug);

        if (!$page instanceof WP_Post) {
            $page_id = wp_insert_post([
                'post_title'  => $title,
                'post_name'   => $slug,
                'post_status' => 'publish',
                'post_type'   => 'page',
            ], true);

            if (is_wp_error($page_id)) {
                continue;
            }

            $page_ids[$slug] = (int) $page_id;
            continue;
        }

        $page_ids[$slug] = (int) $page->ID;
    }

    if ((int) get_option('page_on_front') === 0 && isset($page_ids['home'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_ids['home']);
    }

    $locations = (array) get_theme_mod('nav_menu_locations', []);
    if (!empty($locations['primary'])) {
        return;
    }

    $menu_name = 'منوی اصلی وِتواَپ';
    $menu = wp_get_nav_menu_object($menu_name);
    $menu_id = $menu instanceof WP_Term ? (int) $menu->term_id : wp_create_nav_menu($menu_name);

    if (is_wp_error($menu_id) || $menu_id <= 0) {
        return;
    }

    foreach (['home', 'about', 'faq', 'contact'] as $slug) {
        if (!isset($page_ids[$slug])) {
            continue;
        }

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-object-id' => $page_ids[$slug],
            'menu-item-object'    => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish',
        ]);
    }

    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}
add_action('after_switch_theme', 'vetoapp_landing_seed_pages');
