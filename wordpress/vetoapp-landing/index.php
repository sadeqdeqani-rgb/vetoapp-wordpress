<?php
/** @package VetoAppLanding */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main id="main-content" class="veto-container page-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <h1>محتوایی پیدا نشد</h1>
        <p>برای بازگشت به صفحهٔ معرفی، <a class="text-link" href="<?php echo esc_url(home_url('/')); ?>">اینجا را انتخاب کنید.</a></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
