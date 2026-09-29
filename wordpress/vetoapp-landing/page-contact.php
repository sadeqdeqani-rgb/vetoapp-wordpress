<?php
/** @package VetoAppLanding */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$telegram_handle = vetoapp_telegram_handle();

if (have_posts()) {
    the_post();
}

get_header();
vetoapp_page_hero(get_the_title() ?: 'تماس با ما', vetoapp_page_subtitle('راه ارتباطی عمومی برای پرسش‌ها و بازخوردهای مربوط به وِتواَپ.'));
?>
<main id="main-content" class="veto-container page-content">
    <?php if (!vetoapp_render_current_page_content()) : ?>
    <div class="contact-card">
        <p class="section-heading__label">تلگرام</p>
        <h2>برای پرسش‌ها و بازخوردها پیام بفرستید</h2>
        <p>برای بازخورد دربارهٔ وِتواَپ، گزارش اشکال سایت یا پرسش‌های عمومی، از راه ارتباطی تلگرام استفاده کنید. لطفاً کد ملی، رمز عبور، کد یک‌بارمصرف یا هر دادهٔ حساس دیگری را ارسال نکنید.</p>
        <a class="contact-card__mail" href="<?php echo esc_url('https://t.me/' . $telegram_handle); ?>" target="_blank" rel="noopener noreferrer">
            <?php vetoapp_icon('arrow', 'icon'); ?>
            <span>@<?php echo esc_html($telegram_handle); ?></span>
        </a>
    </div>

    <h2>پیش از ارسال پیام در تلگرام</h2>
    <ul>
        <li>موضوع پیام را روشن و مختصر بنویسید.</li>
        <li>برای گزارش مشکل سایت، در صورت امکان نوع دستگاه و مرورگر را توضیح دهید.</li>
        <li>از ارسال اطلاعات هویتی یا امنیتی حساس خودداری کنید.</li>
    </ul>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
