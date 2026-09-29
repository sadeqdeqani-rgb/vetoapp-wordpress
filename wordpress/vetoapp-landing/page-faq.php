<?php
/** @package VetoAppLanding */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$faq_items = vetoapp_landing_faq_items();

if (have_posts()) {
    the_post();
}

get_header();
vetoapp_page_hero(get_the_title() ?: 'پرسش‌های متداول', vetoapp_page_subtitle('پاسخ‌هایی برای آشنایی با محدودهٔ سایت معرفی و نسخهٔ اولیهٔ محصول.'));
?>
<main id="main-content" class="veto-container page-content">
    <?php vetoapp_render_current_page_content(); ?>
    <div class="faq-list">
        <?php foreach ($faq_items as $index => $faq) : ?>
            <details<?php echo $index === 0 ? ' open' : ''; ?>>
                <summary><?php echo esc_html($faq['title']); ?></summary>
                <p><?php echo nl2br(esc_html($faq['body'])); ?></p>
                <?php if ($faq['resource_url'] !== '') : ?>
                    <a class="faq-resource" href="<?php echo esc_url($faq['resource_url']); ?>" target="_blank" rel="noopener noreferrer">
                        <?php vetoapp_icon('download', 'icon'); ?>
                        <span><?php echo esc_html($faq['resource_label'] !== '' ? $faq['resource_label'] : 'دریافت فایل پیوست'); ?></span>
                    </a>
                <?php endif; ?>
            </details>
        <?php endforeach; ?>
    </div>
</main>
<?php get_footer(); ?>
