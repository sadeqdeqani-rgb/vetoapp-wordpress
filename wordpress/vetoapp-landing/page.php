<?php
/** @package VetoAppLanding */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        vetoapp_page_hero(get_the_title(), 'اطلاعات تکمیلی وِتواَپ');
        ?>
        <main id="main-content" class="veto-container page-content">
            <?php the_content(); ?>
        </main>
        <?php
    }
}

get_footer();
