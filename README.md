# سایت معرفی وِتواَپ

## وضعیت

- دامنهٔ اصلی: `vetoapp.net` — در انتظار تأیید و فعال‌سازی Netcup
- دامنهٔ API پس از استقرار: `api.vetoapp.net`
- ایمیل عمومی پیشنهادی: `sadeqdeqani@gmail.com`
- وضعیت اجرا: قالب و بستهٔ استقرار آماده و اعتبارسنجی محلی شده‌اند؛ در انتظار تحویل VPS و تنظیم DNS

## هدف این پوشه

این مسیر محل واحد نگهداری محتوای سایت، راهنمای هویت بصری، طرح صفحات، فایل‌های قالب WordPress و تنظیمات استقرار آن است. داده‌ها و کلیدهای محرمانهٔ VetoApp یا WordPress نباید در این مسیر ثبت یا commit شوند.

## ساختار

- `content/` — متن‌های منبع، نسخهٔ پیشنهادی صفحات و موارد نیازمند بازبینی
- `design/` — هویت بصری، رنگ‌ها، تایپوگرافی و وایرفریم
- `wordpress/` — قالب اختصاصی سبک WordPress و ابزارهای ساخت دارایی‌های برند
- `deployment/` — Dockerfile، متغیرهای تولید، backup و راهنمای اتصال به Nginx/Compose
- `design/qa/` — screenshotهای تأییدشدهٔ دسکتاپ و موبایل

## معماری هدف

```text
vetoapp.net       → WordPress (لندینگ و صفحات عمومی)
www.vetoapp.net   → redirect به vetoapp.net
api.vetoapp.net   → Laravel API / VetoApp
```

WordPress باید database، کاربر MySQL، volume و متغیرهای محرمانهٔ جدا داشته باشد و به داده‌های هویتی، کلید Telegram یا `APP_KEY` برنامهٔ اصلی دسترسی نداشته باشد.

## کنترل کیفیت انجام‌شده

- syntax تمام PHPهای قالب و shell scriptهای استقرار بررسی شده است.
- `docker compose config` با محیط آزمایشی معتبر اجرا شده است.
- Nginx برای هر دو حالت HTTP و HTTPS با hostnameهای `vetoapp.net`، `www.vetoapp.net` و `api.vetoapp.net` اعتبارسنجی شده است.
- image اختصاصی WordPress شامل قالب، WP-CLI و ابزار backup با موفقیت build شده است.
- آزمون end-to-end موقت با MariaDB مستقل، WordPress PHP-FPM، فعال‌شدن قالب و Nginx انجام شده است.
- نسخهٔ دسکتاپ و موبایل قالب در [design/qa](</home/sadeq/workspace/ورد پرس/design/qa>) بررسی تصویری شده‌اند.
