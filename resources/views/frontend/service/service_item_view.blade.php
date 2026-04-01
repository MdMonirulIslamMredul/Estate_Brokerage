@extends('frontend.layout')
@section('title')
    {{ $service->title_english }}
@endsection
@section('content')
    <style>
        :root {
            --brand: #f08121;
            --brand-deep: #d76f16;
            --ink: #1a2230;
            --muted: #6c7480;
        }

        .service-hero {
            background-size: cover;
            background-position: center;
        }

        .service-kicker {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 999px;
            background: rgba(240, 129, 33, 0.18);
            color: #fff;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .service-hero h5 {
            font-size: clamp(2rem, 4vw, 3.3rem);
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .service-shell {
            position: relative;
            margin-top: -38px;
            z-index: 2;
        }

        .service-panel {
            background: linear-gradient(180deg, #ffffff 0%, #fff8f1 100%);
            border: 1px solid rgba(240, 129, 33, 0.14);
            border-radius: 30px;
            padding: 36px;
            box-shadow: 0 24px 54px rgba(24, 32, 43, 0.08);
        }

        .service-heading {
            text-align: center;
            margin-bottom: 34px;
        }

        .service-heading h1 {
            margin: 0;
            color: var(--ink);
            font-size: clamp(2rem, 3vw, 3rem);
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .service-divider {
            width: 92px;
            height: 5px;
            border-radius: 999px;
            margin: 14px auto 0;
            background: linear-gradient(90deg, var(--brand), var(--brand-deep));
        }

        .service-overview {
            align-items: center;
            margin-bottom: 30px;
        }

        .service-main-image {
            width: 100%;
            min-height: 420px;
            object-fit: cover;
            border-radius: 24px;
            display: block;
            box-shadow: 0 18px 42px rgba(17, 22, 30, 0.12);
        }

        .service-intro-card,
        .service-copy-card,
        .service-image-card {
            background: #fff;
            border-radius: 24px;
            border: 1px solid rgba(24, 32, 43, 0.06);
            box-shadow: 0 14px 38px rgba(20, 24, 33, 0.07);
        }

        .service-intro-card {
            padding: 30px;
        }

        .service-intro-card span,
        .service-section-label {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(240, 129, 33, 0.1);
            color: var(--brand);
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .service-intro-card h2 {
            margin: 14px 0 14px;
            color: var(--ink);
            font-size: 1.8rem;
            font-weight: 800;
            line-height: 1.25;
        }

        .service-intro-card .service-copy,
        .service-copy-card .service-copy {
            color: var(--muted);
            line-height: 1.85;
        }

        .service-copy-card {
            padding: 30px;
            margin-top: 26px;
        }

        .service-copy-card+.service-copy-card {
            margin-top: 24px;
        }

        .service-image-grid {
            margin-top: 10px;
        }

        .service-image-card {
            overflow: hidden;
            height: 100%;
        }

        .service-image-card img {
            width: 100%;
            height: 340px;
            object-fit: cover;
            display: block;
        }

        .service-image-caption {
            padding: 16px 18px 18px;
            color: var(--ink);
            font-size: 0.92rem;
            font-weight: 700;
        }

        .service-wide-image img {
            height: 430px;
        }

        @media (max-width: 991px) {
            .service-shell {
                margin-top: -20px;
            }

            .service-panel {
                padding: 24px;
                border-radius: 24px;
            }

            .service-main-image {
                min-height: 320px;
                margin-bottom: 22px;
            }
        }

        @media (max-width: 575px) {

            .service-panel,
            .service-intro-card,
            .service-copy-card {
                padding: 18px;
            }

            .service-image-card img,
            .service-wide-image img {
                height: 240px;
            }
        }
    </style>


    <section class="bg-half-170 d-table w-100 service-hero"
        style="background: url({{ asset($banner->banner_image ?? null) }});">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <div class="service-kicker">Our Expertise</div>
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark mt-2">Services</h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="section">
        <div class="container service-shell">
            <div class="service-panel">
                <div class="service-heading">
                    <h1>{{ $service->title_english }}</h1>
                    <div class="service-divider"></div>
                </div>

                <div class="row service-overview g-4">
                    <div class="col-lg-6">
                        <img src="{{ asset($service->main_image ?? null) }}" class="service-main-image"
                            alt="{{ $service->title_english }} image">
                    </div>
                    <div class="col-lg-6">
                        <div class="service-intro-card">
                            <span>Service Overview</span>
                            <h2>{{ $service->title_english }}</h2>
                            <div class="service-copy">{!! $service->des_sm_eng !!}</div>
                        </div>
                    </div>
                </div>

                <div class="service-copy-card">
                    <div class="service-section-label">Core Details</div>
                    <div class="service-copy mt-3">{!! $service->long_des1_eng !!}</div>
                </div>

                <div class="row g-4 service-image-grid">
                    <div class="col-md-6">
                        <div class="service-image-card">
                            <img src="{{ asset($service->detais_image_1 ?? null) }}"
                                alt="{{ $service->title_english }} detail image 1">
                            <div class="service-image-caption">Service highlight 01</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-image-card">
                            <img src="{{ asset($service->detais_image_2 ?? null) }}"
                                alt="{{ $service->title_english }} detail image 2">
                            <div class="service-image-caption">Service highlight 02</div>
                        </div>
                    </div>
                </div>

                <div class="service-copy-card">
                    <div class="service-section-label">Extended Scope</div>
                    <div class="service-copy mt-3">{!! $service->long_des2_eng !!}</div>
                </div>

                <div class="row g-4 align-items-start mt-1">
                    <div class="col-12">
                        <div class="service-image-card service-wide-image">
                            <img src="{{ asset($service->detais_image_3 ?? ($service->detais_image_2 ?? null)) }}"
                                alt="{{ $service->title_english }} detail image 3">
                            <div class="service-image-caption">Service highlight 03</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="service-copy-card mb-0">
                            <div class="service-section-label">Additional Insights</div>
                            <div class="service-copy mt-3">{!! $service->long_des3_eng !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
@endsection
