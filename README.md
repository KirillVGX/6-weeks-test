# 6 Weeks Marketing — Contact Form

A production-ready Laravel 11 contact form application built as a test task for the Full-stack Developer position at **6 Weeks Marketing**.

---

## Features

- **Premium dark SaaS UI** — glassmorphism card, animated gradient background, responsive two-column layout
- **Real email delivery** — Laravel Mail with SMTP (Gmail), dedicated `Mailable` class, HTML email template
- **Ukrainian validation messages** — server-side validation via `ContactFormRequest`
- **CSRF protection** — built-in Laravel CSRF middleware on all POST routes
- **Honeypot spam guard** — hidden `company` field silently rejects bots without user-facing errors
- **Rate limiting** — `throttle:10,1` middleware (10 requests per minute per IP)
- **Accessible form** — `aria-required`, `aria-invalid`, `aria-describedby`, semantic labels
- **Input preservation** — old input retained after validation failure
- **Loading state** — button spinner + disabled state during submission (JavaScript)
- **Flash messages** — success and error alerts after form submission
- **Safe error handling** — mail failures are logged server-side, generic message shown to user

---

## Requirements

| Tool | Version |
|------|---------|
| PHP | 8.2 or higher |
| Composer | 2.x |
| Node.js | 18 or higher |
| npm | 9 or higher |

---

## Local Setup

### 1. Clone the repository

```bash
git clone <repository-url> 6weeks-contact
cd 6weeks-contact
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Create environment file

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure SMTP

Open `.env` and fill in your mail credentials (see the [SMTP Configuration](#smtp-configuration) section below).

### 5. Install Node dependencies and build assets

```bash
npm install
npm run build
```

### 6. Set storage permissions (Linux/macOS only)

```bash
chmod -R 775 storage bootstrap/cache
```

### 7. Run the development server

```bash
php artisan serve
```

Open [http://localhost:8000](http://localhost:8000) in your browser.

---

## SMTP Configuration

The application sends email via Gmail SMTP. Fill in the following values in your `.env` file:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your-gmail-address@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=your-gmail-address@gmail.com
MAIL_FROM_NAME="6 Weeks Form"

CONTACT_FORM_RECIPIENT=6weeks.13h@gmail.com
```

### Generating a Gmail App Password

Gmail requires an **App Password** (not your regular account password) when two-factor authentication is enabled:

1. Go to [myaccount.google.com/security](https://myaccount.google.com/security)
2. Under **"How you sign in to Google"**, open **2-Step Verification** and enable it if not already
3. Return to the Security page and search for **"App passwords"**
4. Select app: **Mail**, select device: **Other (custom name)** → type `6 Weeks Form`
5. Copy the generated 16-character password into `MAIL_PASSWORD`

---

## Building Assets

**Development** (with hot reload):
```bash
npm run dev
```

**Production** (minified, versioned):
```bash
npm run build
```

Compiled assets are written to `public/build/`. This directory is committed to `.gitignore`, so always run `npm run build` after cloning for a production deploy.

---

## Testing the Form

1. Start the Laravel server:
   ```bash
   php artisan serve
   ```

2. Open [http://localhost:8000](http://localhost:8000) in your browser.

3. Submit the form with an **empty email field**.
   Expected result: Ukrainian validation error displayed under the email field.

4. Submit the form with an **invalid email** (e.g. `notanemail`).
   Expected result: Ukrainian validation error for invalid email format.

5. Submit the form with **valid data**:
   - Name: `Test User`
   - Email: `test@example.com`
   - Message: `Test message`

   Expected result:
   - Green success banner appears on the page
   - Email is sent to the address configured in `CONTACT_FORM_RECIPIENT`
   - Email subject is exactly: `6weeks - Форма заповнена`
   - Email body contains name, email, message, and submission date/time

6. Test **SMTP error handling** by temporarily setting an invalid `MAIL_PASSWORD` in `.env`, then run `php artisan config:clear` and submit the form.
   Expected result:
   - User sees a generic red error message (no stack trace, no SMTP details)
   - Error is logged to `storage/logs/laravel.log`

---

## Deployment

### Shared Hosting (cPanel / Apache)

1. Upload all files to your hosting account
2. Point the domain's document root to the `public/` directory
3. Create `.env` from `.env.example` and fill in credentials
4. Run via SSH (if available): `composer install --no-dev --optimize-autoloader`
5. Run `npm run build` locally and upload the `public/build/` directory
6. Run `php artisan key:generate` and `php artisan config:cache`

### VPS / Dedicated Server (Ubuntu + Nginx)

```bash
# Install dependencies
composer install --no-dev --optimize-autoloader

# Build frontend
npm ci && npm run build

# Generate key and cache config
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Fix permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

**Nginx site config** (point root to `/public`):
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/6weeks-contact/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### Laravel Forge / Vapor

Both platforms auto-detect Laravel projects. Set environment variables through their dashboard and trigger a deploy — asset compilation is handled automatically.

### Production Safety

Before deploying to any public environment, set the following in `.env`:

```env
APP_DEBUG=false
APP_ENV=production
```

`APP_DEBUG=true` exposes stack traces and environment details in the browser. It must be `false` in production.

---

## Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── ContactFormController.php   # GET / and POST /contact handlers
│   │   └── Requests/
│   │       └── ContactFormRequest.php      # Validation rules + Ukrainian messages
│   ├── Mail/
│   │   └── ContactFormSubmitted.php        # Mailable class
│   └── Providers/
│       └── AppServiceProvider.php
├── bootstrap/
│   └── app.php                             # Laravel 11 application bootstrap
├── config/
│   └── contact.php                         # Recipient config key
├── resources/
│   ├── css/app.css                         # Tailwind CSS entry point
│   ├── js/app.js                           # Loading state + scroll-to-alert
│   └── views/
│       ├── contact.blade.php               # Main form page
│       └── emails/
│           └── contact-form-submitted.blade.php  # HTML email template
├── routes/
│   └── web.php                             # Application routes
├── .env.example                            # Environment variable template
├── composer.json
├── package.json
├── tailwind.config.js
└── vite.config.js
```

---

## Environment Variables Reference

| Variable | Description |
|----------|-------------|
| `APP_KEY` | Laravel application key (auto-generated) |
| `APP_URL` | Full URL of the application |
| `MAIL_MAILER` | Mail driver (`smtp`) |
| `MAIL_HOST` | SMTP host (`smtp.gmail.com`) |
| `MAIL_PORT` | SMTP port (`465` for SSL) |
| `MAIL_USERNAME` | Gmail address used to send |
| `MAIL_PASSWORD` | Gmail App Password (16 chars) |
| `MAIL_ENCRYPTION` | `ssl` |
| `MAIL_FROM_ADDRESS` | Sender address (same as username) |
| `MAIL_FROM_NAME` | Sender display name |
| `CONTACT_FORM_RECIPIENT` | Address that receives submissions |
