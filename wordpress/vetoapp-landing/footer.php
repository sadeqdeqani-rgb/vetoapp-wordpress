<?php
/** @package VetoAppLanding */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$options = vetoapp_landing_options();
$telegram_handle = vetoapp_telegram_handle();
?>
<footer class="site-footer">
    <div class="veto-container site-footer__main">
        <div>
            <a class="footer-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img class="brand__logo" src="<?php echo esc_url(vetoapp_brand_logo_url()); ?>" width="51" height="51" alt="">
                <span>
                    <span class="brand__name"><?php echo esc_html($options['brand_name']); ?></span>
                    <span class="brand__caption"><?php echo esc_html($options['site_caption']); ?></span>
                </span>
            </a>
        </div>
        <div>
            <h2 class="footer-title"><?php echo esc_html($options['footer_quick_title']); ?></h2>
            <ul class="footer-links">
                <li><a href="<?php echo esc_url(vetoapp_page_url('about')); ?>">دربارهٔ وِتواَپ</a></li>
                <li><a href="<?php echo esc_url(vetoapp_page_url('faq')); ?>">پرسش‌های متداول</a></li>
                <li><button class="footer-video-link" type="button" data-video-open>مشاهدهٔ ویدیوی معرفی</button></li>
            </ul>
        </div>
        <div class="footer-contact">
            <h2 class="footer-title"><?php echo esc_html($options['footer_contact_title']); ?></h2>
            <ul class="footer-links">
                <li><a href="<?php echo esc_url(vetoapp_page_url('privacy')); ?>">حریم خصوصی</a></li>
                <li><a href="<?php echo esc_url(vetoapp_page_url('terms')); ?>">قوانین استفاده</a></li>
                <li><a href="<?php echo esc_url('https://t.me/' . $telegram_handle); ?>" target="_blank" rel="noopener noreferrer">@<?php echo esc_html($telegram_handle); ?></a></li>
            </ul>
        </div>
    </div>
    <div class="veto-container site-footer__bottom">
        <span>© <?php echo esc_html(wp_date('Y')); ?> <?php echo esc_html($options['brand_name']); ?>. <?php echo esc_html($options['footer_bottom_left']); ?></span>
    </div>
</footer>

<div class="video-modal" data-video-modal hidden aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="video-modal-caption">
    <div class="video-modal__dialog" data-video-dialog>
        <button class="video-modal__close" type="button" data-video-close aria-label="بستن ویدیو">
            <?php vetoapp_icon('close', 'icon'); ?>
        </button>
        <video class="video-modal__player" data-video-player controls preload="metadata" playsinline>
            <source src="<?php echo esc_url(vetoapp_intro_video_url()); ?>" type="video/mp4">
            مرورگر شما از پخش ویدیو پشتیبانی نمی‌کند.
        </video>
        <p id="video-modal-caption" class="video-modal__caption">ویدیوی معرفی وِتواَپ</p>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
