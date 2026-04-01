@extends('frontend.layout')
@section('title')
    {{ $ongoing->title_english }}
@endsection
@section('content')

    <style>
        /* ── Project Details Page ── */
        .project-hero {
            position: relative;
            min-height: 420px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: flex-end;
        }

        .project-hero .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10, 20, 10, .80) 0%, rgba(10, 20, 10, .35) 60%, transparent 100%);
        }

        .project-hero .hero-content {
            position: relative;
            z-index: 2;
            padding: 40px 0 36px;
        }

        .badge-status {
            background: #17A84C;
            color: #fff;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 12px;
        }

        .section-divider {
            width: 60px;
            height: 3px;
            background: #17A84C;
            border-radius: 2px;
            margin: 10px 0 20px;
        }

        /* Gallery */
        .gallery-main img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            border-radius: 12px;
        }

        .gallery-thumb img {
            width: 100%;
            height: 232px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: opacity .25s;
        }

        .gallery-thumb img:hover {
            opacity: .82;
        }

        /* Info card */
        .info-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 28px rgba(0, 0, 0, .08);
            padding: 28px 26px;
            position: sticky;
            top: 90px;
        }

        .info-card .info-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-card .info-row:last-child {
            border-bottom: none;
        }

        .info-card .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #e8f7ee;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.1rem;
            color: #17A84C;
        }

        .info-card .info-label {
            font-size: .75rem;
            color: #888;
            margin: 0;
            line-height: 1;
        }

        .info-card .info-value {
            font-size: .93rem;
            font-weight: 600;
            color: #222;
            margin: 3px 0 0;
            line-height: 1.2;
        }

        /* Description */
        .desc-section {
            background: #f8fdf9;
            border-radius: 14px;
            padding: 32px 30px;
        }

        .long-desc-section {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 22px rgba(0, 0, 0, .06);
            padding: 32px 30px;
        }

        /* CTA */
        .cta-bar {
            background: linear-gradient(135deg, #17A84C 0%, #0e7c38 100%);
            border-radius: 14px;
            padding: 32px 30px;
            color: #fff;
        }

        .btn-cta {
            background: #fff;
            color: #17A84C;
            font-weight: 700;
            border-radius: 50px;
            padding: 11px 28px;
            font-size: .9rem;
            border: none;
            text-decoration: none;
            display: inline-block;
            transition: background .2s, color .2s;
        }

        .btn-cta:hover {
            background: #e8f7ee;
            color: #0e7c38;
        }

        @media (max-width: 767px) {
            .gallery-main img {
                height: 260px;
            }

            .gallery-thumb img {
                height: 130px;
            }

            .info-card {
                position: static;
            }
        }
    </style>

    <!-- ══ Hero Banner ══ -->
    <div class="project-hero" style="background-image: url('{{ asset($banner->banner_image ?? '') }}');">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <span class="badge-status"><i class="mdi mdi-loading mdi-spin me-1"></i> Ongoing Project</span>
            <h1 class="text-white fw-bold mb-1" style="font-size:clamp(1.6rem,4vw,2.5rem);">{{ $ongoing->title_english }}</h1>
            @if ($ongoing->location_eng)
                <p class="text-white-50 mb-0"><i class="mdi mdi-map-marker me-1 text-success"></i>{{ $ongoing->location_eng }}
                </p>
            @endif
        </div>
    </div>
    <!-- ══ End Hero ══ -->

    <!-- ══ Main Content ══ -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                <!-- ── Left Column ── -->
                <div class="col-lg-8">

                    <!-- Image Gallery -->
                    @if ($ongoing->main_image)
                        <div class="gallery-main mb-3">
                            <img src="{{ asset($ongoing->main_image) }}" alt="{{ $ongoing->title_english }}"
                                id="mainGalleryImg">
                        </div>
                    @endif

                    @if ($ongoing->details_image1 || $ongoing->details_image2)
                        <div class="row g-3 gallery-thumb mb-4">
                            @if ($ongoing->details_image1)
                                <div class="col-6" onclick="swapGallery('{{ asset($ongoing->details_image1) }}')">
                                    <img src="{{ asset($ongoing->details_image1) }}"
                                        alt="{{ $ongoing->title_english }} – View 1">
                                </div>
                            @endif
                            @if ($ongoing->details_image2)
                                <div class="col-6" onclick="swapGallery('{{ asset($ongoing->details_image2) }}')">
                                    <img src="{{ asset($ongoing->details_image2) }}"
                                        alt="{{ $ongoing->title_english }} – View 2">
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Overview -->
                    @if ($ongoing->short_des_eng)
                        <div class="desc-section mb-4">
                            <h4 class="fw-bold mb-0">Project Overview</h4>
                            <div class="section-divider"></div>
                            <div class="text-muted" style="line-height:1.85;">
                                {!! $ongoing->short_des_eng !!}
                            </div>
                        </div>
                    @endif

                    <!-- Full Description -->
                    @if ($ongoing->long_des_eng)
                        <div class="long-desc-section mb-4">
                            <h4 class="fw-bold mb-0">Project Details</h4>
                            <div class="section-divider"></div>
                            <div style="line-height:1.9;">
                                {!! $ongoing->long_des_eng !!}
                            </div>
                        </div>
                    @endif

                    <!-- CTA Bar -->
                    <div class="cta-bar d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <h5 class="fw-bold mb-1">Interested in this property?</h5>
                            <p class="mb-0" style="opacity:.85;font-size:.9rem;">Contact our team to get more information
                                or book a site visit.</p>
                        </div>
                        <a href="{{ route('contact.us') }}" class="btn-cta"><i class="mdi mdi-phone me-1"></i> Contact
                            Us</a>
                    </div>

                </div><!-- /col-lg-8 -->

                <!-- ── Right Column – Info Card ── -->
                <div class="col-lg-4">
                    <div class="info-card">
                        <h5 class="fw-bold mb-1">Property Info</h5>
                        <div class="section-divider"></div>

                        <div class="info-row">
                            <div class="info-icon"><i class="mdi mdi-home-city"></i></div>
                            <div>
                                <p class="info-label">Project Name</p>
                                <p class="info-value">{{ $ongoing->title_english }}</p>
                            </div>
                        </div>

                        @if ($ongoing->location_eng)
                            <div class="info-row">
                                <div class="info-icon"><i class="mdi mdi-map-marker"></i></div>
                                <div>
                                    <p class="info-label">Location</p>
                                    <p class="info-value">{{ $ongoing->location_eng }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($ongoing->start_date)
                            <div class="info-row">
                                <div class="info-icon"><i class="mdi mdi-calendar-range"></i></div>
                                <div>
                                    <p class="info-label">Start Date</p>
                                    <p class="info-value">
                                        {{ \Carbon\Carbon::parse($ongoing->start_date)->format('M d, Y') }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($ongoing->end_date)
                            <div class="info-row">
                                <div class="info-icon"><i class="mdi mdi-calendar-check"></i></div>
                                <div>
                                    <p class="info-label">Completion Date</p>
                                    <p class="info-value">{{ \Carbon\Carbon::parse($ongoing->end_date)->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        <div class="info-row">
                            <div class="info-icon"><i class="mdi mdi-check-circle"></i></div>
                            <div>
                                <p class="info-label">Status</p>
                                <p class="info-value text-success">Ongoing</p>
                            </div>
                        </div>

                        <!-- Progress bar -->
                        @if ($ongoing->start_date && $ongoing->end_date)
                            @php
                                $start = \Carbon\Carbon::parse($ongoing->start_date);
                                $end = \Carbon\Carbon::parse($ongoing->end_date);
                                $now = \Carbon\Carbon::now();
                                $total = $start->diffInDays($end) ?: 1;
                                $done = min($start->diffInDays($now), $total);
                                $pct = round(($done / $total) * 100);
                                $pct = max(0, min(100, $pct));
                            @endphp
                            <div class="mt-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small class="text-muted fw-semibold">Construction Progress</small>
                                    <small class="text-success fw-bold">{{ $pct }}%</small>
                                </div>
                                <div class="progress" style="height:8px;border-radius:50px;">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width:{{ $pct }}%;border-radius:50px;"></div>
                                </div>
                            </div>
                        @endif



                        <a href="{{ route('contact.us') }}" class="btn btn-success w-100 mt-4 rounded-pill fw-semibold">
                            <i class="mdi mdi-send me-1"></i> Send Enquiry
                        </a>
                    </div>
                </div><!-- /col-lg-4 -->

            </div><!-- /row -->
        </div><!-- /container -->
    </section>
    <!-- ══ End Main Content ══ -->

    <script>
        function swapGallery(src) {
            var el = document.getElementById('mainGalleryImg');
            if (el) el.src = src;
        }
    </script>

@endsection
