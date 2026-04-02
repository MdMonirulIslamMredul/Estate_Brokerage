@extends('frontend.layout')

@section('title')
    All Builders
@endsection

@section('content')
    <style>
        :root {
            --builders-primary: #b20101;
            --builders-primary-dark: #7f0000;
            --builders-ink: #0f172a;
            --builders-muted: #64748b;
            --builders-bg: #f8fafc;
        }

        .builders-hero {
            position: relative;
            overflow: hidden;
            padding: 118px 0 86px;
            background:
                radial-gradient(circle at top left, rgba(178, 1, 1, 0.24), transparent 30%),
                radial-gradient(circle at 88% 20%, rgba(245, 158, 11, 0.16), transparent 22%),
                linear-gradient(135deg, #0f172a 0%, #111827 48%, #1f2937 100%);
            color: #ffffff;
        }

        .builders-hero-inner {
            position: relative;
            z-index: 1;
            max-width: 980px;
            margin: 0 auto;
            text-align: center;
        }

        .builders-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.54rem 1rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: rgba(255, 255, 255, 0.92);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 1.15rem;
        }

        .builders-hero h1 {
            margin: 0;
            font-size: clamp(2.6rem, 5vw, 4.8rem);
            line-height: 1.02;
            font-weight: 800;
            letter-spacing: -0.04em;
            color: var(--builders-primary)
        }

        .builders-hero p {
            max-width: 760px;
            margin: 1rem auto 0;
            color: rgba(255, 255, 255, 0.78);
            font-size: 1.04rem;
            line-height: 1.8;
        }

        .builders-stats {
            margin-top: -28px;
            position: relative;
            z-index: 2;
        }

        .builders-stat-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 18px 20px;
            border: 1px solid rgba(15, 23, 42, 0.06);
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.08);
            text-align: center;
        }

        .builders-stat-card strong {
            display: block;
            color: var(--builders-primary);
            font-size: 1.7rem;
            font-weight: 900;
            line-height: 1;
        }

        .builders-stat-card span {
            display: block;
            margin-top: 0.35rem;
            color: var(--builders-muted);
            font-size: 0.92rem;
            font-weight: 600;
        }

        .builders-shell {
            padding: 56px 0 88px;
            background: linear-gradient(180deg, var(--builders-bg) 0%, #ffffff 100%);
        }

        .builders-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .builders-toolbar h2 {
            margin: 0;
            color: var(--builders-ink);
            font-size: clamp(1.65rem, 3vw, 2.4rem);
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .builders-toolbar p {
            margin: 0.35rem 0 0;
            color: var(--builders-muted);
            line-height: 1.7;
            max-width: 720px;
        }

        .builders-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .builders-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0.85rem 1.15rem;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .builders-action.primary {
            color: #fff;
            background: linear-gradient(135deg, var(--builders-primary), var(--builders-primary-dark));
            box-shadow: 0 16px 24px rgba(178, 1, 1, 0.24);
        }

        .builders-action.secondary {
            color: var(--builders-ink);
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
        }

        .builders-action:hover {
            transform: translateY(-2px);
        }

        .builders-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
        }

        .builder-card {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
            min-height: 280px;
        }

        .builder-card:hover {
            transform: translateY(-6px);
            border-color: rgba(178, 1, 1, 0.18);
            box-shadow: 0 24px 44px rgba(15, 23, 42, 0.12);
        }

        .builder-logo {
            aspect-ratio: 1 / 1;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 26px;
        }

        .builder-logo img {
            max-width: 100%;
            max-height: 120px;
            object-fit: contain;
            filter: drop-shadow(0 10px 18px rgba(15, 23, 42, 0.12));
        }

        .builder-body {
            padding: 18px 18px 20px;
            text-align: center;
        }

        .builder-body h3 {
            margin: 0 0 0.35rem;
            color: var(--builders-ink);
            font-size: 1.08rem;
            font-weight: 800;
            line-height: 1.35;
        }

        .builder-body p {
            margin: 0;
            color: var(--builders-muted);
            font-size: 0.9rem;
            line-height: 1.65;
        }

        .builders-empty {
            grid-column: 1 / -1;
            padding: 2rem;
            border-radius: 22px;
            background: #ffffff;
            border: 1px dashed rgba(178, 1, 1, 0.18);
            color: var(--builders-muted);
            text-align: center;
            font-weight: 600;
        }

        @media (max-width: 1200px) {
            .builders-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 992px) {
            .builders-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .builders-toolbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .builders-hero {
                padding: 100px 0 72px;
            }

            .builders-shell {
                padding: 42px 0 72px;
            }

            .builders-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .builder-card {
                min-height: 0;
            }
        }
    </style>

    <section class="builders-hero">
        <div class="container">
            <div class="builders-hero-inner">
                <div class="builders-kicker">Verified Builder Network</div>
                <h1>All Builders & Sponsors</h1>
                <p>Browse every verified builder partner working with EstateBrokerage. Discover trusted developers, compare
                    brands, and move faster to the right project.</p>
            </div>
        </div>
    </section>

    <section class="builders-stats">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-4 col-6">
                    <div class="builders-stat-card">
                        <strong>{{ $sponsors->count() }}</strong>
                        <span>Verified Partners</span>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="builders-stat-card">
                        <strong>100%</strong>
                        <span>Visible on Platform</span>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="builders-stat-card">
                        <strong>24/7</strong>
                        <span>Discovery Access</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="builders-shell">
        <div class="container">
            <div class="builders-toolbar">
                <div>
                    <h2>Browse Builder Partners</h2>
                    <p>Each logo below represents a builder or sponsor currently active on the platform.</p>
                </div>

                <div class="builders-actions">
                    <a href="{{ route('all.project.list') }}" class="builders-action secondary">
                        <i class="fa-solid fa-layer-group"></i>
                        View Projects
                    </a>
                    <a href="{{ route('contact.us') }}" class="builders-action primary">
                        <i class="fa-solid fa-headset"></i>
                        Contact Us
                    </a>
                </div>
            </div>

            <div class="builders-grid">
                @forelse($sponsors as $item)
                    <article class="builder-card">
                        <div class="builder-logo">
                            @if (!empty($item->image))
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title_english }}">
                            @else
                                <div style="font-size: 3rem; color: var(--builders-primary); font-weight: 900;">
                                    {{ strtoupper(substr($item->title_english ?? 'B', 0, 1)) }}</div>
                            @endif
                        </div>
                        <div class="builder-body">
                            <h3>{{ $item->title_english ?? 'Builder Partner' }}</h3>
                            <p>Verified real estate builder partner on EstateBrokerage.</p>
                        </div>
                    </article>
                @empty
                    <div class="builders-empty">No builder partners available right now.</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
