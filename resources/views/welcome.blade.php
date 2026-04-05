@extends('layouts.app')

@section('title', 'PesanBayar — Sistem Restoran Tanpa Friksi')

@push('styles')
    <style>
        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            padding: 140px 48px 80px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: end;
            border-bottom: 1px solid var(--line);
        }

        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
                padding: 140px 24px 64px;
            }
        }

        .hero-eyebrow {
            font-size: 11px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 32px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .hero-eyebrow::before {
            content: '';
            display: block;
            width: 32px;
            height: 1px;
            background: var(--accent);
            flex-shrink: 0;
        }

        .hero-title {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(64px, 8.5vw, 116px);
            line-height: 0.91;
            letter-spacing: -0.025em;
            margin-bottom: 40px;
        }

        .hero-title em {
            font-style: italic;
            color: var(--muted);
        }

        .hero-sub {
            font-size: 15px;
            line-height: 1.75;
            color: var(--muted);
            max-width: 380px;
            margin-bottom: 48px;
        }

        .hero-actions {
            display: flex;
            gap: 24px;
            align-items: center;
            flex-wrap: wrap;
        }

        /* HERO RIGHT — CARDS */
        .hero-right {
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding-left: 48px;
        }

        @media (max-width: 900px) {
            .hero-right {
                padding-left: 0;
            }
        }

        .live-card {
            border: 1px solid var(--line);
            padding: 32px 36px;
            background: var(--white);
            position: relative;
            overflow: hidden;
        }

        .live-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent), transparent);
        }

        .live-tag {
            font-size: 10px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .live-pulse {
            width: 6px;
            height: 6px;
            background: var(--accent);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.25;
            }
        }

        .live-table {
            font-family: 'DM Serif Display', serif;
            font-size: 56px;
            line-height: 1;
            letter-spacing: -0.02em;
            margin-bottom: 6px;
        }

        .live-status {
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .live-footer {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .live-footer strong {
            font-size: 15px;
            letter-spacing: 0.04em;
            color: var(--ink);
            font-weight: 700;
            text-transform: none;
        }

        .stat-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .stat-mini {
            border: 1px solid var(--line);
            padding: 24px 28px;
            background: var(--white);
        }

        .stat-mini-label {
            font-size: 10px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 10px;
        }

        .stat-mini-val {
            font-family: 'DM Serif Display', serif;
            font-size: 36px;
            line-height: 1;
            letter-spacing: -0.01em;
        }

        .stat-mini-val.accent {
            color: var(--accent);
        }

        /* ── MARQUEE ── */
        .marquee-bar {
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            overflow: hidden;
            padding: 18px 0;
            background: var(--ink);
            display: flex;
        }

        .marquee-track {
            display: flex;
            gap: 56px;
            white-space: nowrap;
            animation: marquee-scroll 22s linear infinite;
            flex-shrink: 0;
        }

        @keyframes marquee-scroll {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        .marquee-item {
            font-size: 10px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: rgba(249, 246, 241, 0.45);
            display: flex;
            align-items: center;
            gap: 18px;
            flex-shrink: 0;
        }

        .marquee-dot {
            width: 4px;
            height: 4px;
            background: var(--accent);
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* ── FEATURES ── */
        .features {
            padding: 120px 48px;
            border-bottom: 1px solid var(--line);
        }

        @media (max-width: 768px) {
            .features {
                padding: 80px 24px;
            }
        }

        .section-header {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            margin-bottom: 72px;
            align-items: end;
        }

        @media (max-width: 768px) {
            .section-header {
                grid-template-columns: 1fr;
            }
        }

        .section-label {
            font-size: 10px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--muted);
            font-family: 'DM Mono', monospace;
            margin-bottom: 20px;
        }

        .section-title {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(36px, 5vw, 64px);
            line-height: 0.95;
            letter-spacing: -0.02em;
        }

        .section-title em {
            font-style: italic;
            color: var(--muted);
        }

        .section-desc {
            font-size: 15px;
            line-height: 1.75;
            color: var(--muted);
            max-width: 360px;
            align-self: end;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--line);
        }

        @media (max-width: 768px) {
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }

        .feature-card {
            background: var(--paper);
            padding: 48px 40px;
            transition: background 0.25s;
        }

        .feature-card:hover {
            background: var(--white);
        }

        .feature-num {
            font-family: 'DM Mono', monospace;
            font-size: 10px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 28px;
        }

        .feature-icon {
            width: 36px;
            height: 36px;
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            margin-bottom: 24px;
            color: var(--muted);
        }

        .feature-title {
            font-family: 'DM Serif Display', serif;
            font-size: 28px;
            line-height: 1.05;
            letter-spacing: -0.01em;
            margin-bottom: 14px;
        }

        .feature-desc {
            font-size: 14px;
            line-height: 1.7;
            color: var(--muted);
        }

        .feature-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 24px;
            font-size: 10px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--ink);
            text-decoration: none;
            transition: gap 0.2s;
        }

        .feature-card:hover .feature-link {
            gap: 14px;
        }

        /* ── CTA ── */
        .cta {
            padding: 160px 48px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        @media (max-width: 900px) {
            .cta {
                grid-template-columns: 1fr;
                padding: 100px 24px;
                gap: 48px;
            }
        }

        .cta-title {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(48px, 6.5vw, 96px);
            line-height: 0.92;
            letter-spacing: -0.025em;
        }

        .cta-title em {
            font-style: italic;
            color: var(--muted);
        }

        .cta-right {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .cta-desc {
            font-size: 16px;
            line-height: 1.75;
            color: var(--muted);
        }

        .cta-actions {
            display: flex;
            flex-direction: column;
            gap: 14px;
            align-items: flex-start;
        }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--line);
            padding: 32px 48px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 768px) {
            footer {
                padding: 24px;
                flex-direction: column;
                gap: 12px;
            }
        }

        .footer-copy {
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .footer-brand {
            font-size: 11px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--ink);
        }
    </style>
@endpush

@section('content')

    {{-- HERO --}}
    <section class="hero">
        <div class="hero-left">
            <div class="hero-eyebrow">Sistem Restoran Modern</div>

            <h1 class="hero-title">
                Operasional<br>
                <em>tanpa</em><br>
                Friksi.
            </h1>

            <p class="hero-sub">
                Sistem restoran generasi baru. Pesan, bayar, dan analitik dalam satu alur yang benar-benar otomatis.
            </p>

            <div class="hero-actions">
                <a href="{{ route('restaurant.create') }}" class="btn-primary">Mulai Sekarang</a>
                <a href="#" class="btn-ghost">Lihat Demo →</a>
            </div>
        </div>

        <div class="hero-right">
            <div class="live-card reveal">
                <div class="live-tag">
                    <div class="live-pulse"></div>
                    Live System
                </div>
                <div class="live-table">12</div>
                <div class="live-status">Meja — Order Confirmed</div>
                <div class="live-footer">
                    Total Tagihan
                    <strong>Rp 187.000</strong>
                </div>
            </div>

            <div class="stat-row reveal">
                <div class="stat-mini">
                    <div class="stat-mini-label">Meja Aktif</div>
                    <div class="stat-mini-val accent">24</div>
                </div>
                <div class="stat-mini">
                    <div class="stat-mini-label">Revenue Hari Ini</div>
                    <div class="stat-mini-val">4.2jt</div>
                </div>
            </div>
        </div>
    </section>

    {{-- MARQUEE --}}
    <div class="marquee-bar">
        <div class="marquee-track">
            @foreach (['Self Ordering', 'QRIS Payment', 'Real-time Analytics', 'Kitchen Display', 'QR Table System', 'Multi-branch Ready', 'Self Ordering', 'QRIS Payment', 'Real-time Analytics', 'Kitchen Display', 'QR Table System', 'Multi-branch Ready'] as $item)
                <div class="marquee-item">
                    <div class="marquee-dot"></div>
                    {{ $item }}
                </div>
            @endforeach
        </div>
    </div>

    {{-- FEATURES --}}
    <section class="features">
        <div class="section-header">
            <div>
                <div class="section-label">01 — Fitur Unggulan</div>
                <h2 class="section-title reveal">
                    Tiga pilar<br><em>sistem</em> kami.
                </h2>
            </div>
            <p class="section-desc reveal">
                Dirancang untuk restoran yang tidak punya waktu untuk sistem yang lambat.
            </p>
        </div>

        <div class="feature-grid">
            <div class="feature-card reveal">
                <div class="feature-num">01</div>
                <div class="feature-icon">◻</div>
                <h3 class="feature-title">Self Ordering</h3>
                <p class="feature-desc">
                    Scan QR, langsung pesan dari meja. Tanpa waiter, tanpa antrian, tanpa delay satu menit pun.
                </p>
                <a href="#" class="feature-link">Pelajari →</a>
            </div>

            <div class="feature-card reveal">
                <div class="feature-num">02</div>
                <div class="feature-icon">◈</div>
                <h3 class="feature-title">Instant Payment</h3>
                <p class="feature-desc">
                    QRIS & semua e-wallet langsung dari layar pelanggan. Rekonsiliasi otomatis tanpa effort.
                </p>
                <a href="#" class="feature-link">Pelajari →</a>
            </div>

            <div class="feature-card reveal">
                <div class="feature-num">03</div>
                <div class="feature-icon">◉</div>
                <h3 class="feature-title">Smart Analytics</h3>
                <p class="feature-desc">
                    Data real-time yang bisa langsung dibaca. Menu terlaris, jam sibuk, dan margin—semua dalam satu
                    dashboard.
                </p>
                <a href="#" class="feature-link">Pelajari →</a>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="cta">
        <h2 class="cta-title reveal">
            Sistem<br>
            restoran<br>
            <em>seharusnya</em><br>
            tidak<br>
            memperlambat<br>
            Anda.
        </h2>

        <div class="cta-right reveal">
            <p class="cta-desc">
                Bergabung dengan restoran yang sudah beralih ke sistem yang benar-benar bekerja untuk mereka—bukan
                sebaliknya.
            </p>
            <div class="cta-actions">
                <a href="{{ route('restaurant.create') }}" class="btn-primary">Gunakan PesanBayar</a>
                <a href="#" class="btn-ghost">Jadwalkan Demo →</a>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-copy">© {{ date('Y') }} PesanBayar. All rights reserved.</div>
        <div class="footer-brand">PesanBayar</div>
    </footer>

@endsection
