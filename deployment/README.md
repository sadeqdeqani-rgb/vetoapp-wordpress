# استقرار WordPress

این بسته، سایت معرفی WordPress را کنار API لاراول VetoApp اجرا می‌کند؛ ولی WordPress از نظر database، volume، image و secrets کاملاً جدا باقی می‌ماند.

```text
vetoapp.net       → WordPress / قالب VetoApp Landing
www.vetoapp.net   → redirect به vetoapp.net
api.vetoapp.net   → Laravel API
```

## فایل‌های این پوشه

- `Dockerfile.wordpress` — image PHP-FPM وردپرس، شامل قالب اختصاصی، WP-CLI و ابزار backup
- `env.wordpress.production.example` — متغیرهایی که باید به `vetoapp/deploy/.env.production` افزوده شوند
- `scripts/backup-wordpress.sh` — archive رمزگذاری‌پذیر از database وردپرس و `wp-content/uploads`
- `scripts/sync-theme.sh` — همگام‌سازی قالب bundled با volume پایدار WordPress در هر release

## چیدمان پیشنهادی روی سرور

برای جلوگیری از وابستگی build به مسیر کامپیوتر توسعه، هر دو پوشه را کنار هم روی سرور قرار دهید:

```text
/opt/vetoapp/             ← مخزن اصلی اپ و deploy/
/opt/vetoapp-wordpress/   ← محتوای همین پوشهٔ «ورد پرس»
```

در فایل `/opt/vetoapp/deploy/.env.production` مقدار زیر باید به مسیر دوم اشاره کند:

```dotenv
WORDPRESS_BUILD_CONTEXT=../../vetoapp-wordpress
WORDPRESS_DOCKERFILE=deployment/Dockerfile.wordpress
```

این مسیر از دید `deploy/` به `/opt/vetoapp-wordpress` می‌رسد. با این روش Docker در زمان build فقط به بستهٔ مستقل WordPress نیاز دارد، نه به پروژهٔ Flutter یا دمو.

## تنظیم متغیرها

1. متغیرهای فایل `env.wordpress.production.example` را به `vetoapp/deploy/.env.production` منتقل کنید.
2. همهٔ مقدارهای `CHANGE_ME` را با secretهای یکتا و طولانی جایگزین کنید.
3. `WORDPRESS_DOMAIN=vetoapp.net`، `WORDPRESS_WWW_DOMAIN=www.vetoapp.net` و `APP_DOMAIN=api.vetoapp.net` را قرار دهید.
4. تا وقتی DNS هر سه hostname به IP سرور نرسیده، `init-ssl.sh` را اجرا نکنید.

برای تولید secret نمونه (آن را در terminal history یا Git نگه ندارید):

```bash
openssl rand -base64 48
```

برای همهٔ key و saltهای وردپرس از مقادیر متفاوت استفاده کنید.

## ترتیب استقرار پس از تحویل VPS

1. طبق راهنمای اصلی، Docker Engine و Compose را نصب و فایروال را فقط برای 80، 443 و SSH تنظیم کنید.
2. دو پوشه را در مسیرهای بالا منتقل کنید و `.env.production` را تکمیل کنید.
3. DNS را تنظیم کنید:

   ```text
   A  vetoapp.net       → IP سرور
   A  www.vetoapp.net   → IP سرور
   A  api.vetoapp.net   → IP سرور
   ```

4. release نخست را اجرا کنید:

   ```bash
   cd /opt/vetoapp
   bash deploy/scripts/release.sh
   ```

5. WordPress و قالب را نصب کنید:

   ```bash
   bash deploy/scripts/setup-wordpress.sh
   ```

6. پس از آن‌که DNS و پورت 80 از اینترنت قابل دسترس بودند، گواهی‌ها را بگیرید:

   ```bash
   bash deploy/scripts/init-ssl.sh
   ```

7. سلامت هر دو سایت را بررسی کنید:

   ```bash
   bash deploy/scripts/healthcheck.sh
   ```

## تفکیک امنیتی

- WordPress فقط به `wordpress-db` وصل است و به MySQL، Valkey، `APP_KEY`، Telegram secrets و داده‌های VetoApp دسترسی ندارد.
- WordPress PHP-FPM پشت Nginx داخلی است؛ پورت PHP-FPM یا database به اینترنت bind نمی‌شود.
- ویرایش فایل یا نصب افزونه از داخل داشبورد WordPress غیرفعال است؛ تغییر قالب از طریق build/release انجام می‌شود.
- backup وردپرس جدا از backup لاراول ساخته می‌شود. `WORDPRESS_BACKUP_PATH` را روی storage پایدار و ترجیحاً خارج از دیسک اصلی سرور بگذارید و passphrase رمزگذاری را در secret manager نگه دارید.
- به‌روزرسانی هستهٔ WordPress، افزونه یا image باید ابتدا در محیط آزمایشی آزموده و سپس image به digest تأییدشده pin شود.
