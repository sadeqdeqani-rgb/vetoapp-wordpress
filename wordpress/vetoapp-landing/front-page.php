<?php
/**
 * Front page for the public VetoApp introduction site.
 *
 * @package VetoAppLanding
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$options = vetoapp_landing_options();
$android_url = vetoapp_android_url();
$intro_video_url = vetoapp_intro_video_url();
$feature_items = vetoapp_landing_feature_items();
$faq_items = vetoapp_landing_faq_items();
$flow_items = [
    ['title' => $options['flow_one_title'], 'body' => $options['flow_one_body']],
    ['title' => $options['flow_two_title'], 'body' => $options['flow_two_body']],
    ['title' => $options['flow_three_title'], 'body' => $options['flow_three_body']],
];
?>
<main id="main-content">
    <section class="hero" aria-labelledby="hero-title">
        <div class="veto-container hero__grid">
            <div>
                <p class="eyebrow"><?php echo esc_html($options['hero_eyebrow']); ?></p>
                <h1 id="hero-title"><?php echo nl2br(esc_html($options['hero_title'])); ?></h1>
                <p class="hero__lead"><?php echo nl2br(esc_html($options['hero_lead'])); ?></p>
                <div class="hero__actions" aria-label="ویدیوهای معرفی و دریافت وِتواَپ">
                    <button class="button" type="button" data-video-open aria-haspopup="dialog">
                        <?php vetoapp_icon('preview', 'button__icon'); ?>
                        <span>مشاهدهٔ ویدیوی کوتاه معرفی وِتواَپ</span>
                    </button>
                    <a class="button button--outline" href="<?php echo esc_url($intro_video_url); ?>"<?php echo $intro_video_url !== '' ? ' download' : ' aria-disabled="true"'; ?>>
                        <?php vetoapp_icon('download', 'button__icon'); ?>
                        <span>دانلود ویدیوی معرفی وِتواَپ</span>
                    </a>
                    <a class="button button--outline" href="https://www.youtube.com/watch?v=owZiJmb5Roo" target="_blank" rel="noopener noreferrer">
                        <?php vetoapp_icon('preview', 'button__icon'); ?>
                        <span>مشاهدهٔ ویدیوی کامل معرفی وِتواَپ در یوتیوب</span>
                    </a>
                    <a class="button button--outline" href="<?php echo esc_url($options['hero_secondary_url']); ?>">
                        <?php vetoapp_icon('download', 'button__icon'); ?>
                        <span><?php echo esc_html($options['hero_secondary_label']); ?></span>
                    </a>
                    <a class="button button--outline" href="#pwa-install" data-pwa-install-link>
                        <?php vetoapp_icon('preview', 'button__icon'); ?>
                        <span>نصب نسخهٔ وب‌اپ وِتواَپ (PWA)</span>
                    </a>
                </div>
                <ul class="hero__note" aria-label="ویژگی‌های صفحهٔ معرفی">
                    <li><?php echo esc_html($options['hero_note_one']); ?></li>
                    <li><?php echo esc_html($options['hero_note_two']); ?></li>
                    <li><?php echo esc_html($options['hero_note_three']); ?></li>
                </ul>
            </div>
            <div class="hero-visual" aria-label="نمای گرافیکی معرفی وِتواَپ">
                <img class="hero-visual__map" src="<?php echo esc_url(vetoapp_asset_url('/assets/images/persianmap.png')); ?>" width="420" height="280" alt="" aria-hidden="true">
                <div class="hero-app">
                    <div class="hero-app__header">
                        <img class="hero-app__logo" src="<?php echo esc_url(vetoapp_brand_logo_url()); ?>" width="48" height="48" alt="">
                        <div>
                            <p><?php echo esc_html($options['hero_app_name']); ?></p>
                            <span><?php echo esc_html($options['hero_app_caption']); ?></span>
                        </div>
                    </div>
                    <div class="hero-app__body">
                        <div class="hero-app__status">
                            <?php vetoapp_icon('people', 'icon'); ?>
                            <div>
                                <span><?php echo esc_html($options['hero_app_status_label']); ?></span>
                                <strong><?php echo esc_html($options['hero_app_status_value']); ?></strong>
                            </div>
                        </div>
                        <div class="hero-app__filter">
                            <?php vetoapp_icon('filter', 'icon'); ?>
                            <span><?php echo esc_html($options['hero_app_filter']); ?></span>
                            <?php vetoapp_icon('arrow', 'icon'); ?>
                        </div>
                        <p class="hero-app__section-title"><?php echo esc_html($options['hero_app_section_title']); ?></p>
                        <div class="hero-app__event hero-app__event--success">
                            <?php vetoapp_icon('referendum', 'icon'); ?>
                            <span><?php echo esc_html($options['hero_app_referendum']); ?></span>
                        </div>
                        <div class="hero-app__event hero-app__event--teal">
                            <?php vetoapp_icon('election', 'icon'); ?>
                            <span><?php echo esc_html($options['hero_app_election']); ?></span>
                        </div>
                    </div>
                    <div class="hero-app__nav" aria-hidden="true">
                        <span class="hero-app__nav-item is-active"><?php vetoapp_icon('home', 'icon'); ?><small>خانه</small></span>
                        <span class="hero-app__nav-item hero-app__nav-item--success"><?php vetoapp_icon('referendum', 'icon'); ?><small>همه‌پرسی</small></span>
                        <span class="hero-app__nav-item hero-app__nav-item--teal"><?php vetoapp_icon('election', 'icon'); ?><small>انتخابات</small></span>
                        <span class="hero-app__nav-item hero-app__nav-item--danger"><?php vetoapp_icon('impeachment', 'icon'); ?><small>استیضاح</small></span>
                        <span class="hero-app__nav-item hero-app__nav-item--gold"><?php vetoapp_icon('profile', 'icon'); ?><small>کاربری</small></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="section section--surface" aria-labelledby="features-title">
        <div class="veto-container">
            <div class="section-heading">
                <?php if ($options['features_label'] !== '') : ?>
                    <p class="section-heading__label"><?php echo esc_html($options['features_label']); ?></p>
                <?php endif; ?>
                <h2 id="features-title"><?php echo esc_html($options['features_title']); ?></h2>
                <?php if ($options['features_lead'] !== '') : ?>
                    <p><?php echo nl2br(esc_html($options['features_lead'])); ?></p>
                <?php endif; ?>
            </div>
            <div class="capability-grid">
                <?php foreach ($feature_items as $feature) : ?>
                    <article class="capability-card capability-card--<?php echo esc_attr($feature['icon']); ?>">
                        <div class="capability-card__icon"><?php vetoapp_icon($feature['icon'], 'icon'); ?></div>
                        <h3><?php echo esc_html($feature['title']); ?></h3>
                        <p><?php echo nl2br(esc_html($feature['body'])); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section--tint" aria-labelledby="flow-title">
        <div class="veto-container">
            <div class="section-heading section-heading--center">
                <p class="section-heading__label"><?php echo esc_html($options['flow_label']); ?></p>
                <h2 id="flow-title"><?php echo esc_html($options['flow_title']); ?></h2>
                <?php if ($options['flow_lead'] !== '') : ?>
                    <p><?php echo nl2br(esc_html($options['flow_lead'])); ?></p>
                <?php endif; ?>
            </div>
            <div class="flow">
                <?php foreach ($flow_items as $flow_item) : ?>
                    <article class="flow-card">
                        <h3><?php echo esc_html($flow_item['title']); ?></h3>
                        <p><?php echo esc_html($flow_item['body']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section--tint" aria-labelledby="privacy-title">
        <div class="veto-container privacy-grid">
            <aside class="privacy-card" aria-label="حریم خصوصی">
                <div class="privacy-card__icon"><?php vetoapp_icon('shield', 'icon'); ?></div>
                <h3><?php echo esc_html($options['privacy_card_title']); ?></h3>
                <p><?php echo nl2br(esc_html($options['privacy_card_body'])); ?></p>
            </aside>
            <div class="privacy-copy">
                <p class="section-heading__label"><?php echo esc_html($options['privacy_label']); ?></p>
                <h2 id="privacy-title"><?php echo esc_html($options['privacy_title']); ?></h2>
                <p><?php echo nl2br(esc_html($options['privacy_body'])); ?></p>
                <a class="text-link" href="<?php echo esc_url(vetoapp_page_url('privacy')); ?>">
                    <span><?php echo esc_html($options['privacy_link_label']); ?></span><?php vetoapp_icon('arrow', 'icon'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="section section--surface" aria-labelledby="faq-title">
        <div class="veto-container faq-grid">
            <div class="faq-intro">
                <p class="section-heading__label"><?php echo esc_html($options['faq_label']); ?></p>
                <h2 id="faq-title"><?php echo esc_html($options['faq_title']); ?></h2>
                <p><?php echo nl2br(esc_html($options['faq_lead'])); ?></p>
                <a class="text-link" href="<?php echo esc_url(vetoapp_page_url('faq')); ?>"><span>مشاهدهٔ همهٔ پرسش‌ها</span><?php vetoapp_icon('arrow', 'icon'); ?></a>
            </div>
            <div class="faq-list">
                <?php foreach (array_slice($faq_items, 0, 4) as $index => $faq) : ?>
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
        </div>
    </section>

    <section id="download" class="section section--surface" aria-labelledby="download-title">
        <div class="veto-container">
            <div class="download-box">
                <div>
                    <span class="download-box__label"><?php echo esc_html($options['download_label']); ?></span>
                    <h2 id="download-title">از همین الان می‌توانید، در وِتواَپ ثبت‌نام کنید</h2>
                    <p>نسخهٔ اندروید وِتواَپ را دریافت و فرایند ثبت‌نام را آغاز کنید.</p>
                    <?php if ($android_url !== '') : ?>
                        <span class="download-box__status"><?php echo esc_html($options['download_ready_status']); ?></span>
                    <?php else : ?>
                        <span class="download-box__status"><?php echo esc_html($options['download_pending_status']); ?></span>
                    <?php endif; ?>
                </div>
                <div class="download-box__actions">
                    <a class="button" href="<?php echo esc_url($android_url); ?>"<?php echo $android_url !== '' ? ' rel="noopener noreferrer"' : ' aria-disabled="true"'; ?>>
                        <?php vetoapp_icon('download', 'button__icon'); ?>
                        <span>دانلود نسخهٔ اندروید</span>
                    </a>
                    <details id="pwa-install" class="pwa-install">
                        <summary class="button button--outline">
                            <?php vetoapp_icon('preview', 'button__icon'); ?>
                            <span>نصب نسخهٔ وب‌اپ وِتواَپ (PWA)</span>
                        </summary>
                        <div class="pwa-install__instructions">
                            <p>برای افزودن وِتواَپ به صفحهٔ اصلی آیفون، این صفحه را در Safari باز کنید؛ سپس دکمهٔ «اشتراک‌گذاری» و گزینهٔ «افزودن به صفحهٔ اصلی» را انتخاب کنید.</p>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
