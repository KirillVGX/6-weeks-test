<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Технічний запит на інтеграцію або автоматизацію — 6 Weeks Marketing.">
    <title>Технічний запит — 6 Weeks Marketing</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* ═══════════════════════════════════════════════════════════════
           RESET
        ═══════════════════════════════════════════════════════════════ */
        *, *::before, *::after { box-sizing: border-box; }

        /* ═══════════════════════════════════════════════════════════════
           PAGE
        ═══════════════════════════════════════════════════════════════ */
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
            color: #0f172a;
            background-color: #f7f8fb;
            background-image:
                radial-gradient(circle at 78% -8%, rgba(124, 58, 237, 0.10) 0%, transparent 34%),
                radial-gradient(circle at -4% 98%, rgba(79, 70, 229, 0.07) 0%, transparent 30%);
        }

        /* Dot grid overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image: radial-gradient(rgba(100, 116, 139, 0.18) 1px, transparent 1px);
            background-size: 24px 24px;
            z-index: 0;
        }

        /* Ambient glow — slow drift, barely perceptible */
        body::after {
            content: '';
            position: fixed;
            top: -25%;
            right: -15%;
            width: 65vw;
            height: 65vw;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.055) 0%, transparent 68%);
            pointer-events: none;
            z-index: 0;
            animation: ambient-drift 20s ease-in-out infinite alternate;
        }

        @keyframes ambient-drift {
            0%   { transform: translate(0, 0) scale(1); }
            50%  { transform: translate(-3%, 5%) scale(1.05); }
            100% { transform: translate(3%, -3%) scale(0.96); }
        }

        /* ═══════════════════════════════════════════════════════════════
           ENTRANCE ANIMATION KEYFRAMES
        ═══════════════════════════════════════════════════════════════ */
        @keyframes enter-down {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes enter-up {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes enter-up-scale {
            from { opacity: 0; transform: translateY(16px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0)    scale(1); }
        }

        /* Easing: fast-out, feel snappy without bounce */
        .animate-header {
            animation: enter-down 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .animate-hero {
            animation: enter-up 0.52s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .animate-card {
            animation: enter-up 0.52s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .animate-form {
            animation: enter-up-scale 0.58s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        /* ═══════════════════════════════════════════════════════════════
           CONTAINER  (max 1240px, centred, 24px side-padding each side)
        ═══════════════════════════════════════════════════════════════ */
        .wrap {
            width: min(100% - 48px, 1240px);
            margin-inline: auto;
        }

        /* ═══════════════════════════════════════════════════════════════
           HEADER
        ═══════════════════════════════════════════════════════════════ */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(255, 255, 255, 0.90);
            -webkit-backdrop-filter: blur(14px);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.85);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }

        /* Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-mark {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: #7c3aed;
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            flex-shrink: 0;
            letter-spacing: -0.01em;
        }

        .logo-name {
            font-size: 15px;
            font-weight: 600;
            color: #0f172a;
        }

        .logo-divider {
            width: 1px;
            height: 16px;
            background: #e2e8f0;
        }

        .logo-sub {
            font-size: 12px;
            font-weight: 500;
            color: #94a3b8;
        }

        /* Status pill */
        .status-pill {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 6px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 100px;
            background: #fff;
            font-size: 12px;
            font-weight: 500;
            color: #475569;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);
        }

        /* Status dot — only the dot animates */
        .status-dot-wrap {
            position: relative;
            width: 8px;
            height: 8px;
            flex-shrink: 0;
        }

        .status-dot-ping {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: #34d399;
            opacity: 0.75;
            animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        .status-dot-core {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: #10b981;
        }

        @keyframes ping {
            0%        { transform: scale(1); opacity: 0.75; }
            75%, 100% { transform: scale(2.2); opacity: 0; }
        }

        /* ═══════════════════════════════════════════════════════════════
           MAIN  (wraps alerts + grid)
        ═══════════════════════════════════════════════════════════════ */
        .main {
            position: relative;
            z-index: 1;
            padding: 60px 0 88px;
        }

        @media (max-width: 767px) {
            .main { padding: 40px 0 64px; }
        }

        /* ═══════════════════════════════════════════════════════════════
           ALERTS
        ═══════════════════════════════════════════════════════════════ */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 36px;
        }

        .alert-icon { width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px; }
        .alert-title { font-size: 14px; font-weight: 600; margin: 0 0 2px; }
        .alert-desc  { font-size: 13px; margin: 0; }

        .alert-ok  { background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; }
        .alert-ok  .alert-icon { color: #16a34a; }
        .alert-ok  .alert-desc { color: #16a34a; }

        .alert-err { background: #fff1f2; border: 1px solid #fecdd3; color: #be123c; }
        .alert-err .alert-icon { color: #e11d48; }
        .alert-err .alert-desc { color: #e11d48; }

        @keyframes alert-slide-in {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: alert-slide-in 0.34s cubic-bezier(0.16, 1, 0.3, 1) both; }

        /* ═══════════════════════════════════════════════════════════════
           TWO-COLUMN GRID
        ═══════════════════════════════════════════════════════════════ */
        .layout-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 460px;
            gap: 48px;
            align-items: start;
        }

        @media (max-width: 1023px) {
            .layout-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        /* ═══════════════════════════════════════════════════════════════
           LEFT COLUMN
        ═══════════════════════════════════════════════════════════════ */
        .left-col > * + * { margin-top: 32px; }

        /* ── Hero ── */
        .badge-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .badge-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 100px;
            background: #f5f3ff;
            border: 1px solid rgba(124, 58, 237, 0.22);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #6d28d9;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #7c3aed;
            flex-shrink: 0;
        }

        .badge-endpoint {
            display: inline-flex;
            align-items: center;
            padding: 5px 11px;
            border-radius: 7px;
            border: 1px solid #e2e8f0;
            background: #fff;
            font-family: ui-monospace, SFMono-Regular, Menlo, monospace;
            font-size: 11px;
            color: #64748b;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
        }

        .page-title {
            font-size: clamp(2.2rem, 4.5vw, 3.75rem);
            font-weight: 800;
            line-height: 1.06;
            letter-spacing: -0.03em;
            color: #0f172a;
            margin: 0 0 20px;
        }

        .page-subtitle {
            font-size: 17px;
            line-height: 1.72;
            color: #475569;
            max-width: 560px;
            margin: 0;
        }

        /* ── Section label ── */
        .sec-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #94a3b8;
            margin: 0 0 14px;
        }

        /* ── Capability cards ── */
        .cap-stack { display: flex; flex-direction: column; gap: 12px; }

        .cap-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px 22px;
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 20px;
            box-shadow: 0 1px 4px rgba(15, 23, 42, 0.05), 0 1px 2px rgba(15, 23, 42, 0.03);
            /* Transition covers hover + entrance */
            transition: box-shadow 0.22s ease, transform 0.22s ease, border-color 0.22s ease;
        }

        .cap-card:hover {
            box-shadow: 0 10px 32px rgba(15, 23, 42, 0.11), 0 2px 8px rgba(15, 23, 42, 0.06);
            transform: translateY(-3px);
            border-color: rgba(124, 58, 237, 0.28);
        }

        /* Icon box — transitions for hover glow */
        .cap-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #f5f3ff;
            border: 1px solid rgba(124, 58, 237, 0.14);
            flex-shrink: 0;
            transition: background 0.22s ease, border-color 0.22s ease, box-shadow 0.22s ease;
        }

        .cap-card:hover .cap-icon {
            background: #ede9fe;
            border-color: rgba(124, 58, 237, 0.32);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.08);
        }

        .cap-icon svg { width: 16px; height: 16px; stroke: #7c3aed; }

        .cap-title {
            font-size: 14.5px;
            font-weight: 600;
            color: #0f172a;
            margin: 0 0 4px;
        }

        .cap-text {
            font-size: 13.5px;
            line-height: 1.55;
            color: #64748b;
            margin: 0;
        }

        /* ── Checklist card ── */
        .checklist-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 1px 4px rgba(15, 23, 42, 0.05);
        }

        .checklist      { list-style: none; margin: 0; padding: 0; }
        .checklist li   {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13.5px;
            color: #475569;
            padding: 9px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: color 0.18s ease;
        }
        .checklist li:first-child { padding-top: 0; }
        .checklist li:last-child  { border-bottom: none; padding-bottom: 0; }

        .checklist li:hover { color: #1e293b; }

        .check-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #f5f3ff;
            flex-shrink: 0;
            transition: background 0.18s ease;
        }
        .checklist li:hover .check-circle { background: #ede9fe; }
        .check-circle svg { width: 11px; height: 11px; stroke: #7c3aed; }

        /* ── Flow card ── */
        .flow-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 1px 4px rgba(15, 23, 42, 0.05);
        }

        .flow-strip {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .flow-chip {
            padding: 6px 13px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: #f8fafc;
            font-family: ui-monospace, SFMono-Regular, Menlo, monospace;
            font-size: 11.5px;
            color: #475569;
            transition: border-color 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
        }

        .flow-chip:hover {
            border-color: #c7d2fe;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.08);
        }

        .flow-chip-accent {
            border-color: rgba(124, 58, 237, 0.2);
            background: #f5f3ff;
            color: #7c3aed;
        }

        .flow-chip-accent:hover { border-color: rgba(124, 58, 237, 0.45); }

        .flow-arrow {
            font-size: 15px;
            color: #cbd5e1;
            font-weight: 600;
            line-height: 1;
            transition: color 0.22s ease;
        }

        /* Brighten arrows when hovering the whole flow card */
        .flow-card:hover .flow-arrow { color: #a5b4fc; }

        /* ═══════════════════════════════════════════════════════════════
           RIGHT COLUMN — sticky form
        ═══════════════════════════════════════════════════════════════ */
        .form-panel {
            position: sticky;
            top: 88px;
        }

        @media (max-width: 1023px) {
            .form-panel { position: static; }
        }

        .form-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 28px;
            padding: 32px;
            box-shadow:
                0 0   0 1px rgba(255, 255, 255, 0.6) inset,
                0 24px 80px rgba(15, 23, 42, 0.11),
                0 4px  16px rgba(15, 23, 42, 0.06);
            transition: box-shadow 0.28s ease;
        }

        /* Subtle desktop-only shadow lift on hover */
        @media (min-width: 1024px) {
            .form-card:hover {
                box-shadow:
                    0 0   0 1px rgba(255, 255, 255, 0.6) inset,
                    0 32px 100px rgba(15, 23, 42, 0.15),
                    0 8px  28px rgba(15, 23, 42, 0.08);
            }
        }

        .form-card-hd {
            padding-bottom: 24px;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 28px;
        }

        .form-title {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 6px;
        }

        .form-subtitle {
            font-size: 13.5px;
            color: #64748b;
            margin: 0;
        }

        /* ── Field ── */
        .field { margin-bottom: 20px; }
        .field-last { margin-bottom: 28px; }

        .field-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }

        .field-hint { font-size: 11px; font-weight: 400; color: #9ca3af; }
        .req-star   { color: #ef4444; line-height: 1; }

        /* ── Input ── */
        .fi {
            display: block;
            width: 100%;
            height: 52px;
            padding: 0 16px;
            border-radius: 14px;
            border: 1.5px solid #e2e8f0;
            background: #f8fafc;
            color: #0f172a;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            -webkit-appearance: none;
            transition: border-color 0.18s ease, box-shadow 0.18s ease, background-color 0.18s ease;
        }

        .fi::placeholder { color: #94a3b8; }

        .fi:focus {
            border-color: #7c3aed;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.09);
        }

        .fi.is-err {
            border-color: #f87171;
            background: #fff5f5;
        }

        .fi.is-err:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.10);
        }

        textarea.fi {
            height: auto;
            min-height: 150px;
            padding: 14px 16px;
            resize: vertical;
            line-height: 1.65;
        }

        /* ── Field error ── */
        .field-err {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 7px;
            font-size: 12px;
            color: #ef4444;
        }

        .field-err svg { width: 12px; height: 12px; flex-shrink: 0; }

        /* ── Submit button ── */
        .submit-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            height: 56px;
            border-radius: 14px;
            border: none;
            background: linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%);
            color: #fff;
            font-family: inherit;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.01em;
            cursor: pointer;
            box-shadow: 0 8px 24px -4px rgba(124, 58, 237, 0.38);
            transition: transform 0.18s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.18s ease,
                        filter 0.18s ease,
                        opacity 0.15s ease;
        }

        .submit-btn:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 16px 40px -4px rgba(124, 58, 237, 0.50);
            filter: brightness(1.05);
        }

        .submit-btn:active:not(:disabled) {
            transform: translateY(0);
            box-shadow: 0 6px 20px -4px rgba(124, 58, 237, 0.40);
            filter: brightness(1);
            transition-duration: 0.08s;
        }

        .submit-btn:disabled {
            opacity: 0.70;
            cursor: not-allowed;
            transform: none;
            filter: none;
        }

        .form-note {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }

        /* ── Spinner ── */
        @keyframes spin { to { transform: rotate(360deg); } }
        .spin { animation: spin 0.8s linear infinite; }

        /* ── Utility ── */
        .hidden { display: none !important; }

        /* ── Mobile tweaks ── */
        @media (max-width: 599px) {
            .logo-divider, .logo-sub { display: none; }
            .status-long            { display: none; }
        }

        /* ═══════════════════════════════════════════════════════════════
           REDUCED MOTION  — honour OS preference
        ═══════════════════════════════════════════════════════════════ */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>

    {{-- ══════════════════════════════════════════════════════════════
         HEADER — slides down on load
    ══════════════════════════════════════════════════════════════ --}}
    <header class="site-header animate-header">
        <div class="wrap header-inner">

            <div class="logo">
                <div class="logo-mark">6W</div>
                <span class="logo-name">6 Weeks Marketing</span>
                <span class="logo-divider" aria-hidden="true"></span>
                <span class="logo-sub">Tech</span>
            </div>

            <div class="status-pill">
                <span class="status-dot-wrap" aria-hidden="true">
                    <span class="status-dot-ping"></span>
                    <span class="status-dot-core"></span>
                </span>
                <span class="status-long">Технічна команда онлайн</span>
                <span aria-hidden="true" style="display:none" class="status-short">Online</span>
            </div>

        </div>
    </header>

    {{-- ══════════════════════════════════════════════════════════════
         MAIN
    ══════════════════════════════════════════════════════════════ --}}
    <div class="wrap main">

        {{-- Flash alerts --}}
        @if (session('success'))
        <div role="alert" class="alert alert-ok fade-in">
            <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <p class="alert-title">Запит надіслано</p>
                <p class="alert-desc">Дякуємо — ми отримали ваші дані.</p>
            </div>
        </div>
        @endif

        @if (session('mail_error'))
        <div role="alert" class="alert alert-err fade-in">
            <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
            </svg>
            <div>
                <p class="alert-title">Не вдалося надіслати запит</p>
                <p class="alert-desc">Спробуйте ще раз або перевірте налаштування пошти.</p>
            </div>
        </div>
        @endif

        {{-- ── Two-column grid ──────────────────────────────────────── --}}
        <div class="layout-grid">

            {{-- ════════════════════════════════════════════════════════
                 LEFT COLUMN
            ════════════════════════════════════════════════════════ --}}
            <div class="left-col">

                {{-- Hero — fades/slides up first --}}
                <div class="animate-hero" style="animation-delay:60ms">
                    <div class="badge-row">
                        <span class="badge-tag">
                            <span class="badge-dot" aria-hidden="true"></span>
                            Технічний запит
                        </span>
                        <span class="badge-endpoint">POST /intake</span>
                    </div>
                    <h1 class="page-title">Заявка на інтеграцію або автоматизацію</h1>
                    <p class="page-subtitle">
                        Опишіть задачу, де потрібна інтеграція, автоматизація або бізнес-інтерфейс.
                        Запит потрапить до технічної команди для оцінки логіки та реалізації.
                    </p>
                </div>

                {{-- Capability cards — staggered --}}
                <div class="animate-card" style="animation-delay:130ms">
                    <p class="sec-label">Напрямки</p>
                    <div class="cap-stack">

                        <div class="cap-card animate-card" style="animation-delay:150ms">
                            <div class="cap-icon" aria-hidden="true">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="cap-title">CRM & API</p>
                                <p class="cap-text">Інтеграції з CRM, ERP, платіжними системами та зовнішніми сервісами.</p>
                            </div>
                        </div>

                        <div class="cap-card animate-card" style="animation-delay:220ms">
                            <div class="cap-icon" aria-hidden="true">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                            <div>
                                <p class="cap-title">Автоматизація</p>
                                <p class="cap-text">Webhooks, тригери, n8n/Make-сценарії та кастомна backend-логіка.</p>
                            </div>
                        </div>

                        <div class="cap-card animate-card" style="animation-delay:290ms">
                            <div class="cap-icon" aria-hidden="true">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                                </svg>
                            </div>
                            <div>
                                <p class="cap-title">Бізнес-інтерфейси</p>
                                <p class="cap-text">Внутрішні панелі, форми, кабінети та інструменти для операційної команди.</p>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Checklist --}}
                <div class="checklist-card animate-card" style="animation-delay:360ms">
                    <p class="sec-label">Що можна описати в заявці</p>
                    <ul class="checklist" role="list">
                        <li>
                            <span class="check-circle" aria-hidden="true">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            Звідки приходять дані
                        </li>
                        <li>
                            <span class="check-circle" aria-hidden="true">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            Куди їх потрібно передавати
                        </li>
                        <li>
                            <span class="check-circle" aria-hidden="true">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            Які події запускають процес
                        </li>
                        <li>
                            <span class="check-circle" aria-hidden="true">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            Де зараз виникає ручна робота
                        </li>
                    </ul>
                </div>

                {{-- Data flow --}}
                <div class="flow-card animate-card" style="animation-delay:430ms">
                    <p class="sec-label">Типова схема</p>
                    <div class="flow-strip">
                        <span class="flow-chip">Сайт / Форма</span>
                        <span class="flow-arrow" aria-hidden="true">→</span>
                        <span class="flow-chip">CRM / API</span>
                        <span class="flow-arrow" aria-hidden="true">→</span>
                        <span class="flow-chip">Автоматизація</span>
                        <span class="flow-arrow" aria-hidden="true">→</span>
                        <span class="flow-chip flow-chip-accent">Аналітика</span>
                    </div>
                </div>

            </div>{{-- /left-col --}}

            {{-- ════════════════════════════════════════════════════════
                 RIGHT COLUMN — sticky form card, fades/scales in
            ════════════════════════════════════════════════════════ --}}
            <aside class="form-panel animate-form" style="animation-delay:90ms">
                <div class="form-card">

                    <div class="form-card-hd">
                        <h2 class="form-title">Опишіть задачу</h2>
                        <p class="form-subtitle">Email потрібен, щоб ми могли повернутися з уточненнями.</p>
                    </div>

                    <form id="contact-form"
                          method="POST"
                          action="{{ route('contact.submit') }}"
                          novalidate>
                        @csrf

                        {{-- Honeypot --}}
                        <div style="display:none" aria-hidden="true">
                            <label for="company">Company</label>
                            <input type="text" id="company" name="company" autocomplete="off" tabindex="-1">
                        </div>

                        {{-- Name --}}
                        <div class="field">
                            <label for="name" class="field-label">
                                Ім'я
                                <span class="field-hint">(необов'язково)</span>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Ваше ім'я"
                                maxlength="100"
                                autocomplete="name"
                                class="fi {{ $errors->has('name') ? 'is-err' : '' }}"
                                aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                                @if ($errors->has('name')) aria-describedby="name-error" @endif
                            >
                            @error('name')
                            <p id="name-error" role="alert" class="field-err">
                                <svg fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="field">
                            <label for="email" class="field-label">
                                Електронна пошта
                                <span class="req-star" aria-hidden="true">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@company.com"
                                maxlength="255"
                                autocomplete="email"
                                required
                                class="fi {{ $errors->has('email') ? 'is-err' : '' }}"
                                aria-required="true"
                                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                                @if ($errors->has('email')) aria-describedby="email-error" @endif
                            >
                            @error('email')
                            <p id="email-error" role="alert" class="field-err">
                                <svg fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Message --}}
                        <div class="field field-last">
                            <label for="message" class="field-label">
                                Опис задачі
                                <span class="field-hint">(необов'язково)</span>
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                placeholder="Наприклад: потрібно передавати заявки з сайту в CRM, запускати оплату, створювати задачу в Notion/Slack або оновлювати аналітику."
                                maxlength="5000"
                                class="fi {{ $errors->has('message') ? 'is-err' : '' }}"
                                aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}"
                                @if ($errors->has('message')) aria-describedby="message-error" @endif
                            >{{ old('message') }}</textarea>
                            @error('message')
                            <p id="message-error" role="alert" class="field-err">
                                <svg fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <button id="submit-btn" type="submit" class="submit-btn">
                            <svg id="btn-spinner"
                                 class="hidden spin"
                                 style="width:16px;height:16px;flex-shrink:0"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 aria-hidden="true">
                                <circle style="opacity:.25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                <path style="opacity:.75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <svg id="btn-icon"
                                 style="width:16px;height:16px;flex-shrink:0"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                            <span id="btn-text">Надіслати запит</span>
                        </button>

                    </form>

                    <p class="form-note">
                        Запит буде надіслано технічній команді 6 Weeks Marketing.
                    </p>

                </div>
            </aside>

        </div>{{-- /layout-grid --}}
    </div>{{-- /wrap.main --}}

</body>
</html>
