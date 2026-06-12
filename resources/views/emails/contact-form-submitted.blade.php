<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Нова заявка — 6 Weeks Marketing</title>
    <style>
        /* Reset */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #08081a;
            color: #e2e8f0;
            -webkit-font-smoothing: antialiased;
            margin: 0;
            padding: 0;
        }
        table { border-collapse: collapse; }
        img { border: 0; display: block; }

        /* Layout */
        .email-wrapper {
            width: 100%;
            background-color: #08081a;
            padding: 48px 16px;
        }
        .email-container {
            max-width: 580px;
            margin: 0 auto;
            background-color: #111127;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #1e1e40;
        }

        /* Header */
        .email-header {
            padding: 36px 40px 32px;
            background: linear-gradient(135deg, #6d28d9 0%, #4338ca 100%);
        }
        .header-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50px;
            padding: 5px 14px;
            margin-bottom: 16px;
        }
        .badge-dot {
            display: inline-block;
            width: 7px;
            height: 7px;
            background: #c4b5fd;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 7px;
            margin-top: -1px;
        }
        .badge-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.85);
            vertical-align: middle;
        }
        .header-title {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 6px;
            line-height: 1.2;
        }
        .header-subtitle {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            margin: 0;
        }

        /* Body */
        .email-body {
            padding: 36px 40px;
        }

        /* Fields */
        .field {
            margin-bottom: 24px;
        }
        .field:last-child {
            margin-bottom: 0;
        }
        .field-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #7c3aed;
            margin-bottom: 8px;
        }
        .field-value {
            background: #0d0d22;
            border: 1px solid #1e1e40;
            border-radius: 10px;
            padding: 14px 16px;
            font-size: 15px;
            line-height: 1.6;
            color: #e2e8f0;
            word-break: break-word;
        }
        .field-value.is-empty {
            color: #3d3d60;
            font-style: italic;
            font-size: 14px;
        }
        .field-value a {
            color: #a78bfa;
            text-decoration: none;
        }

        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid #1e1e40;
            margin: 28px 0;
        }

        /* Footer */
        .email-footer {
            padding: 22px 40px;
            background-color: #0c0c1f;
            border-top: 1px solid #1e1e40;
            text-align: center;
        }
        .footer-brand {
            font-size: 13px;
            font-weight: 600;
            color: #7c3aed;
        }
        .footer-note {
            font-size: 12px;
            color: #3d3d60;
            margin-top: 4px;
        }

        /* Responsive */
        @media only screen and (max-width: 600px) {
            .email-header,
            .email-body,
            .email-footer {
                padding-left: 24px;
                padding-right: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">

            {{-- Header --}}
            <div class="email-header">
                <div class="header-badge">
                    <span class="badge-dot"></span>
                    <span class="badge-label">Нова заявка</span>
                </div>
                <h1 class="header-title">Форма заповнена</h1>
                <p class="header-subtitle">Новий запит отримано через контактну форму сайту 6 Weeks Marketing</p>
            </div>

            {{-- Body --}}
            <div class="email-body">

                <div class="field">
                    <div class="field-label">Ім'я</div>
                    @if ($name)
                    <div class="field-value">{{ $name }}</div>
                    @else
                    <div class="field-value is-empty">Не вказано</div>
                    @endif
                </div>

                <div class="field">
                    <div class="field-label">Електронна пошта</div>
                    <div class="field-value">
                        <a href="mailto:{{ $email }}">{{ $email }}</a>
                    </div>
                </div>

                <div class="field">
                    <div class="field-label">Повідомлення</div>
                    @if ($userMessage)
                    <div class="field-value">{!! nl2br(e($userMessage)) !!}</div>
                    @else
                    <div class="field-value is-empty">Не вказано</div>
                    @endif
                </div>

                <hr class="divider">

                <div class="field">
                    <div class="field-label">Дата та час надсилання</div>
                    <div class="field-value">{{ $submittedAt }}</div>
                </div>

            </div>

            {{-- Footer --}}
            <div class="email-footer">
                <p class="footer-brand">6 Weeks Marketing</p>
                <p class="footer-note">Цей лист згенеровано автоматично. Будь ласка, не відповідайте на нього.</p>
            </div>

        </div>
    </div>
</body>
</html>
