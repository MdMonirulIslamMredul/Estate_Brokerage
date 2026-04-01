@extends('frontend.layout')
@section('title')
    {{ $completed->title_english }}
@endsection
@section('content')

    <style>
        /* ── Completed Project Details ── */
        .project-hero {
            position: relative;
            min-height: 440px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: flex-end;
        }

        .project-hero .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(8, 18, 8, .85) 0%, rgba(8, 18, 8, .35) 60%, transparent 100%);
        }

        .project-hero .hero-content {
            position: relative;
            z-index: 2;
            padding: 44px 0 38px;
        }

        .badge-completed {
            background: #17A84C;
            color: #fff;
            font-size: .76rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            padding: 5px 16px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 14px;
        }

        .section-divider {
            width: 55px;
            height: 3px;
            background: #17A84C;
            border-radius: 2px;
            margin: 10px 0 20px;
        }

        /* Gallery */
        .gallery-main {
            border-radius: 14px;
            overflow: hidden;
            position: relative;
        }

        .gallery-main img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .gallery-thumb-row img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            border: 3px solid transparent;
            transition: border-color .2s, opacity .2s;
        }

        .gallery-thumb-row img:hover,
        .gallery-thumb-row img.active-thumb {
            border-color: #17A84C;
            opacity: .9;
        }

        /* Quick-stat chips */
        .stat-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f0faf4;
            border: 1px solid #c7ecd7;
            border-radius: 50px;
            padding: 8px 18px;
            font-size: .88rem;
            font-weight: 600;
            color: #1a6635;
        }

        /* Info card */
        .info-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 32px rgba(0, 0, 0, .09);
            padding: 28px 24px;
            position: sticky;
            top: 90px;
        }

        .info-row {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: #e8f7ee;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.1rem;
            color: #17A84C;
        }

        .info-label {
            font-size: .73rem;
            color: #888;
            margin: 0;
            line-height: 1;
        }

        .info-value {
            font-size: .93rem;
            font-weight: 700;
            color: #222;
            margin: 3px 0 0;
            line-height: 1.2;
        }

        /* Feature grid */
        .feature-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px 10px;
            background: #f8fdf9;
            border-radius: 12px;
            border: 1px solid #e0f2e9;
            min-height: 100px;
        }

        .feature-item i {
            font-size: 1.7rem;
            color: #17A84C;
            margin-bottom: 8px;
        }

        .feature-item .feat-val {
            font-weight: 700;
            font-size: .95rem;
            color: #1a2e1a;
        }

        .feature-item .feat-label {
            font-size: .72rem;
            color: #888;
            margin-top: 2px;
        }

        /* Desc cards */
        .desc-card {
            background: #f8fdf9;
            border-radius: 14px;
            padding: 30px 28px;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
        }

        .detail-table tr:nth-child(even) td,
        .detail-table tr:nth-child(even) th {
            background: #f8fdf9;
        }

        .detail-table th,
        .detail-table td {
            padding: 11px 14px;
            border: 1px solid #e3ede8;
            font-size: .88rem;
        }

        .detail-table th {
            font-weight: 600;
            color: #444;
            width: 45%;
        }

        .detail-table td {
            color: #222;
        }

        /* Media embeds */
        .embed-wrap {
            border-radius: 12px;
            overflow: hidden;
        }

        .embed-wrap iframe {
            display: block;
        }

        /* Lightbox */
        .gallery-main {
            cursor: zoom-in;
        }

        .gallery-main .zoom-hint {
            position: absolute;
            bottom: 12px;
            right: 14px;
            background: rgba(0, 0, 0, .45);
            color: #fff;
            font-size: .75rem;
            padding: 4px 10px;
            border-radius: 20px;
            pointer-events: none;
            display: flex;
            align-items: center;
            gap: 5px;
            z-index: 2;
        }

        #glbOverlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .93);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        #glbOverlay.open {
            display: flex;
        }

        #glbOverlay img {
            max-width: 92vw;
            max-height: 82vh;
            object-fit: contain;
            border-radius: 6px;
            user-select: none;
            -webkit-user-drag: none;
            transition: opacity .2s;
        }

        .glb-close {
            position: absolute;
            top: 18px;
            right: 22px;
            color: #fff;
            font-size: 2rem;
            cursor: pointer;
            line-height: 1;
            background: none;
            border: none;
            opacity: .85;
        }

        .glb-close:hover {
            opacity: 1;
        }

        .glb-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, .12);
            border: none;
            color: #fff;
            font-size: 2rem;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .2s;
            z-index: 2;
        }

        .glb-nav:hover {
            background: rgba(23, 168, 76, .7);
        }

        .glb-nav.prev {
            left: 16px;
        }

        .glb-nav.next {
            right: 16px;
        }

        .glb-dots {
            display: flex;
            gap: 8px;
            margin-top: 16px;
        }

        .glb-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .35);
            cursor: pointer;
            transition: background .2s;
        }

        .glb-dot.active {
            background: #17A84C;
        }

        /* CTA bar */
        .cta-bar {
            background: linear-gradient(135deg, #17A84C 0%, #0e7c38 100%);
            border-radius: 14px;
            padding: 30px 28px;
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

        /* Contact form */
        .contact-section {
            background: linear-gradient(135deg, #f0faf4 0%, #e8f4ee 100%);
        }

        .contact-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 28px rgba(0, 0, 0, .08);
            padding: 40px 36px;
        }

        @media (max-width: 991px) {
            .info-card {
                position: static;
            }
        }

        @media (max-width: 767px) {
            .gallery-main img {
                height: 260px;
            }

            .gallery-thumb-row img {
                height: 100px;
            }

            .contact-card {
                padding: 26px 18px;
            }
        }
    </style>



    {{-- ══ Hero Banner ══ --}}
    <div class="project-hero" style="background-image: url('{{ asset($banner->banner_image ?? '') }}');">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <span class="badge-completed"><i class="mdi mdi-check-decagram me-1"></i> Completed Project</span>
            <h1 class="text-white fw-bold mb-2" style="font-size:clamp(1.6rem,4vw,2.6rem);">{{ $completed->property_name }}
            </h1>
            @if ($completed->location_eng)
                <p class="text-white-50 mb-0 fs-6"><i
                        class="mdi mdi-map-marker me-1 text-success"></i>{{ $completed->location_eng }}</p>
            @endif
        </div>
    </div>
    {{-- ══ End Hero ══ --}}

    {{-- ══ Main Content ══ --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                {{-- ── Left Column ── --}}
                <div class="col-lg-8">

                    {{-- Image Gallery --}}
                    @php
                        $galleryImages = array_filter([
                            $completed->image1 ?? null,
                            $completed->image2 ?? null,
                            $completed->image3 ?? null,
                        ]);
                        $firstImg = reset($galleryImages);
                    @endphp

                    @if ($firstImg)
                        <div class="gallery-main mb-3" onclick="openLightbox(glbIndex)">
                            <img src="{{ asset($firstImg) }}" alt="{{ $completed->property_name }}" id="mainGalleryImg">
                            <span class="zoom-hint"><i class="mdi mdi-magnify-plus-outline"></i> Click to Zoom View</span>
                        </div>
                    @endif

                    @if (count($galleryImages) > 1)
                        <div class="row g-2 gallery-thumb-row mb-4">
                            @foreach ($galleryImages as $idx => $img)
                                <div class="col-4" onclick="swapGallery('{{ asset($img) }}', this, {{ $idx }})">
                                    <img src="{{ asset($img) }}" alt="{{ $completed->property_name }}"
                                        class="{{ $img === $firstImg ? 'active-thumb' : '' }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Quick stats (apartment only) --}}
                    @if ($completed->property_mood == 'sqr feet')
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            @if ($completed->property_size)
                                <span class="stat-chip"><i class="mdi mdi-arrow-expand-all"></i>
                                    {{ $completed->property_size }} sqf</span>
                            @endif
                            @if ($completed->rooms)
                                <span class="stat-chip"><i class="mdi mdi-bed-king-outline"></i> {{ $completed->rooms }}
                                    Beds</span>
                            @endif
                            @if ($completed->bathrooms)
                                <span class="stat-chip"><i class="mdi mdi-shower"></i> {{ $completed->bathrooms }}
                                    Baths</span>
                            @endif
                            @if ($completed->floors)
                                <span class="stat-chip"><i class="mdi mdi-layers-outline"></i> {{ $completed->floors }}
                                    Floors</span>
                            @endif
                        </div>
                    @endif

                    {{-- Features Grid (apartment) --}}
                    @if ($completed->property_mood == 'sqr feet')
                        <div class="mb-4">
                            <h4 class="fw-bold mb-0">Apartment Features</h4>
                            <div class="section-divider"></div>
                            <div class="row g-3">
                                @if ($completed->rooms)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="feature-item">
                                            <i class="mdi mdi-bed-king-outline"></i>
                                            <span class="feat-val">{{ $completed->rooms }}</span>
                                            <span class="feat-label">Bedrooms</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($completed->bathrooms)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="feature-item">
                                            <i class="mdi mdi-shower"></i>
                                            <span class="feat-val">{{ $completed->bathrooms }}</span>
                                            <span class="feat-label">Bathrooms</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($completed->floors)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="feature-item">
                                            <i class="mdi mdi-layers-outline"></i>
                                            <span class="feat-val">{{ $completed->floors }}</span>
                                            <span class="feat-label">Floors</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($completed->units)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="feature-item">
                                            <i class="mdi mdi-home-group"></i>
                                            <span class="feat-val">{{ $completed->units }}</span>
                                            <span class="feat-label">Units</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($completed->kitchens)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="feature-item">
                                            <i class="mdi mdi-countertop-outline"></i>
                                            <span class="feat-val">{{ $completed->kitchens }}</span>
                                            <span class="feat-label">Kitchen</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($completed->garages)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="feature-item">
                                            <i class="mdi mdi-car-back"></i>
                                            <span class="feat-val">{{ $completed->garages }}</span>
                                            <span class="feat-label">Parking</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($completed->lift)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="feature-item">
                                            <i class="mdi mdi-elevator-passenger-outline"></i>
                                            <span class="feat-val">{{ $completed->lift }}</span>
                                            <span class="feat-label">Lift</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($completed->store_room)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="feature-item">
                                            <i class="mdi mdi-warehouse"></i>
                                            <span class="feat-val">{{ $completed->store_room }}</span>
                                            <span class="feat-label">Store Room</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- Details & Features Table --}}
                    <div class="mb-4">
                        <h4 class="fw-bold mb-0">Details &amp; Specifications</h4>
                        <div class="section-divider"></div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <table class="detail-table rounded-3 overflow-hidden">
                                    @if ($completed->property_type)
                                        <tr>
                                            <th>Property Type</th>
                                            <td>{{ $completed->property_type }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>{{ $completed->property_mood == 'Per katha' ? 'Plot Size' : 'Apartment Size' }}
                                        </th>
                                        <td>{{ $completed->property_size }}
                                            {{ $completed->property_mood == 'Per katha' ? 'Katha' : 'sqf' }}</td>
                                    </tr>
                                    @if ($completed->property_mood == 'Per katha')
                                        @if ($completed->ploot_status)
                                            <tr>
                                                <th>Plot Status</th>
                                                <td>{{ $completed->ploot_status }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->approved_by)
                                            <tr>
                                                <th>Approved By</th>
                                                <td>{{ $completed->approved_by }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->main_road_size)
                                            <tr>
                                                <th>Main Road Size</th>
                                                <td>{{ $completed->main_road_size }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                    @if ($completed->property_mood == 'sqr feet')
                                        @if ($completed->daining)
                                            <tr>
                                                <th>Dining</th>
                                                <td>{{ $completed->daining }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->drawing)
                                            <tr>
                                                <th>Drawing Room</th>
                                                <td>{{ $completed->drawing }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->belkuni)
                                            <tr>
                                                <th>Veranda / Balcony</th>
                                                <td>{{ $completed->belkuni }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->approved_by)
                                            <tr>
                                                <th>Approved By</th>
                                                <td>{{ $completed->approved_by }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                </table>
                            </div>
                            @if ($completed->property_mood == 'sqr feet')
                                <div class="col-md-6">
                                    <table class="detail-table rounded-3 overflow-hidden">
                                        @if ($completed->face_type)
                                            <tr>
                                                <th>Face Type</th>
                                                <td>{{ $completed->face_type }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->units)
                                            <tr>
                                                <th>Units</th>
                                                <td>{{ $completed->units }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->floors)
                                            <tr>
                                                <th>Floors</th>
                                                <td>{{ $completed->floors }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->kitchens)
                                            <tr>
                                                <th>Kitchen</th>
                                                <td>{{ $completed->kitchens }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->garages)
                                            <tr>
                                                <th>Parking Space</th>
                                                <td>{{ $completed->garages }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->store_room)
                                            <tr>
                                                <th>Store Room</th>
                                                <td>{{ $completed->store_room }}</td>
                                            </tr>
                                        @endif
                                        @if ($completed->lift)
                                            <tr>
                                                <th>Lift</th>
                                                <td>{{ $completed->lift }}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Description --}}
                    @if ($completed->short_des)
                        <div class="desc-card mb-4">
                            <h4 class="fw-bold mb-0">Project Overview</h4>
                            <div class="section-divider"></div>
                            <div class="text-muted" style="line-height:1.85;">{{ strip_tags($completed->short_des) }}</div>
                        </div>
                    @endif
                    @if ($completed->long_des)
                        <div class="long-desc-section mb-4"
                            style="background:#fff;border-radius:14px;box-shadow:0 4px 22px rgba(0,0,0,.06);padding:30px 28px;">
                            <h4 class="fw-bold mb-0">Project Details</h4>
                            <div class="section-divider"></div>
                            <div style="line-height:1.9;">{{ strip_tags($completed->long_des) }}</div>
                        </div>
                    @endif

                    {{-- Video --}}
                    @if ($completed->property_video)
                        <div class="mb-4">
                            <h4 class="fw-bold mb-0">Property Video</h4>
                            <div class="section-divider"></div>
                            <div class="embed-wrap">
                                <iframe width="100%" height="420"
                                    src="https://www.youtube.com/embed/{{ $completed->property_video }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    @endif

                    {{-- Map --}}
                    @if ($completed->map_link)
                        <div class="mb-4">
                            <h4 class="fw-bold mb-0">Property Location</h4>
                            <div class="section-divider"></div>
                            <div class="embed-wrap" style="min-height:320px;">
                                {!! $completed->map_link !!}
                            </div>
                        </div>
                    @endif

                    {{-- Floor Plan --}}
                    @if ($completed->banner_image)
                        <div class="mb-4">
                            <h4 class="fw-bold mb-0">Floor Plan / Area Plan</h4>
                            <div class="section-divider"></div>
                            <a href="{{ asset($completed->banner_image) }}" target="_blank" rel="noopener">
                                <img src="{{ asset($completed->banner_image) }}"
                                    class="img-fluid rounded-3 shadow-sm w-100" alt="Floor Plan">
                            </a>
                            <p class="text-muted small mt-2 mb-0"><i class="mdi mdi-magnify-plus-outline me-1"></i>Click
                                image to view full size</p>
                        </div>
                    @endif

                    {{-- CTA bar --}}
                    <div class="cta-bar d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <h5 class="fw-bold mb-1">Interested in this property?</h5>
                            <p class="mb-0" style="opacity:.85;font-size:.9rem;">Contact our team — book a free site
                                visit today.</p>
                        </div>
                        <a href="{{ route('contact.us') }}" class="btn-cta"><i class="mdi mdi-phone me-1"></i> Contact
                            Us</a>
                    </div>

                </div>{{-- /col-lg-8 --}}

                {{-- ── Right Column – Info Card ── --}}
                <div class="col-lg-4">
                    <div class="info-card">
                        <h5 class="fw-bold mb-1">Property Info</h5>
                        <div class="section-divider"></div>

                        <div class="info-row">
                            <div class="info-icon"><i class="mdi mdi-home-city"></i></div>
                            <div>
                                <p class="info-label">Property Name</p>
                                <p class="info-value">{{ $completed->property_name }}</p>
                            </div>
                        </div>

                        @if ($completed->location_eng)
                            <div class="info-row">
                                <div class="info-icon"><i class="mdi mdi-map-marker"></i></div>
                                <div>
                                    <p class="info-label">Location</p>
                                    <p class="info-value">{{ $completed->location_eng }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($completed->property_type)
                            <div class="info-row">
                                <div class="info-icon"><i class="mdi mdi-office-building"></i></div>
                                <div>
                                    <p class="info-label">Property Type</p>
                                    <p class="info-value">{{ $completed->property_type }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($completed->property_size)
                            <div class="info-row">
                                <div class="info-icon"><i class="mdi mdi-arrow-expand-all"></i></div>
                                <div>
                                    <p class="info-label">Size</p>
                                    <p class="info-value">
                                        {{ $completed->property_size }}
                                        {{ $completed->property_mood == 'Per katha' ? 'Katha' : 'sqf' }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        {{-- Price --}}
                        @if ($completed->discount || $completed->price)
                            <div class="info-row">
                                <div class="info-icon"><i class="mdi mdi-currency-bdt"></i></div>
                                <div>
                                    <p class="info-label">Price
                                        / {{ $completed->property_mood == 'sqr feet' ? 'Per Sqf' : 'Per Katha' }}</p>
                                    <p class="info-value text-success">
                                        &#2547;{{ $completed->discount }}
                                        @if ($completed->price)
                                            <del class="text-muted fw-normal"
                                                style="font-size:.82rem;">{{ $completed->price }}</del>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif

                        <div class="info-row">
                            <div class="info-icon"><i class="mdi mdi-check-circle"></i></div>
                            <div>
                                <p class="info-label">Status</p>
                                <p class="info-value text-success">Completed</p>
                            </div>
                        </div>

                        @if (Auth::check())
                            <div class="info-row" style="background-color: #ffff00; padding: 13px; border-radius: 8px;">
                                <div class="info-icon"><i class="mdi mdi-currency-usd"></i></div>
                                <div>
                                    <p class="info-label"> <i class="mdi mdi-briefcase me-1"></i>Agent Commission </p>
                                    <p class="info-value text-success fw-bold"> {{ $completed->commission ?? 'N/A' }} </p>

                                </div>
                            </div>
                        @else
                            <a href="{{ route('contact.us') }}"
                                class="btn btn-success w-100 mt-4 rounded-pill fw-semibold">
                                <i class="mdi mdi-send me-1"></i> Send Enquiry
                            </a>
                        @endif

                    </div>
                </div>{{-- /col-lg-4 --}}

            </div>{{-- /row --}}
        </div>{{-- /container --}}
    </section>
    {{-- ══ End Main Content ══ --}}

    {{-- ══ Contact Form Section ══ --}}
    <section class="py-5 contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Leave Us a Message</h3>
                        <p class="text-muted">Have questions about this property? We'll get back to you shortly.</p>
                        <div class="section-divider mx-auto"></div>
                    </div>
                    <div class="contact-card">
                        <form method="post" id="myForm" action="{{ route('contactdata.store') }}">
                            @csrf
                            <div id="simple-msg"></div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Your Name <span
                                            class="text-danger">*</span></label>
                                    <input name="name_english" type="text" class="form-control"
                                        placeholder="Full Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control"
                                        placeholder="email@example.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Subject <span
                                            class="text-danger">*</span></label>
                                    <input name="subject_english" class="form-control"
                                        placeholder="e.g. Property Inquiry">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Phone Number <span
                                            class="text-danger">*</span></label>
                                    <input name="phone" class="form-control" placeholder="+880 ...">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Message <span
                                            class="text-danger">*</span></label>
                                    <textarea name="message_english" rows="4" class="form-control"
                                        placeholder="Tell us about your requirements..."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid gap-2">
                                        <button type="submit" name="send"
                                            class="btn btn-success btn-lg rounded-pill fw-semibold">
                                            <i class="mdi mdi-send me-1"></i> Send Message
                                        </button>
                                        <a href="tel:" class="btn btn-outline-success btn-lg rounded-pill fw-semibold">
                                            <i class="mdi mdi-phone me-1"></i> Call Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ══ End Contact Form ══ --}}

    {{-- ══ Lightbox Modal ══ --}}
    <div id="glbOverlay" role="dialog" aria-modal="true" aria-label="Image lightbox">
        <button class="glb-close" onclick="closeLightbox()" aria-label="Close">&times;</button>
        <button class="glb-nav prev" onclick="glbMove(-1)" aria-label="Previous"><i
                class="mdi mdi-chevron-left"></i></button>
        <img id="glbImg" src="" alt="Property image">
        <button class="glb-nav next" onclick="glbMove(1)" aria-label="Next"><i
                class="mdi mdi-chevron-right"></i></button>
        <div class="glb-dots" id="glbDots"></div>
    </div>

    <script>
        // Build gallery image array from PHP
        @php
            $glbImagesRaw = array_values(array_filter([$completed->image1 ?? null, $completed->image2 ?? null, $completed->image3 ?? null]));
        @endphp
        var glbImages = @json($glbImagesRaw);
        glbImages = glbImages.map(function(p) {
            return '{{ asset('') }}' + p;
        });
        var glbIndex = 0;

        // Swap gallery thumbnail & track current index
        function swapGallery(src, el, idx) {
            var img = document.getElementById('mainGalleryImg');
            if (img) img.src = src;
            document.querySelectorAll('.gallery-thumb-row img').forEach(function(t) {
                t.classList.remove('active-thumb');
            });
            if (el) el.querySelector('img').classList.add('active-thumb');
            if (typeof idx !== 'undefined') glbIndex = idx;
        }

        // Lightbox open / close
        function openLightbox(idx) {
            if (!glbImages.length) return;
            glbIndex = idx || 0;
            renderLightbox();
            document.getElementById('glbOverlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('glbOverlay').classList.remove('open');
            document.body.style.overflow = '';
        }

        function glbMove(dir) {
            glbIndex = (glbIndex + dir + glbImages.length) % glbImages.length;
            renderLightbox();
        }

        function renderLightbox() {
            document.getElementById('glbImg').src = glbImages[glbIndex];
            var dots = document.getElementById('glbDots');
            dots.innerHTML = '';
            glbImages.forEach(function(_, i) {
                var d = document.createElement('span');
                d.className = 'glb-dot' + (i === glbIndex ? ' active' : '');
                d.onclick = function() {
                    glbIndex = i;
                    renderLightbox();
                };
                dots.appendChild(d);
            });
        }

        // Close on overlay click (not on image)
        document.getElementById('glbOverlay').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!document.getElementById('glbOverlay').classList.contains('open')) return;
            if (e.key === 'ArrowLeft') glbMove(-1);
            if (e.key === 'ArrowRight') glbMove(1);
            if (e.key === 'Escape') closeLightbox();
        });

        // Touch/swipe support
        (function() {
            var el = document.getElementById('glbOverlay');
            var startX = 0,
                startY = 0;
            el.addEventListener('touchstart', function(e) {
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
            }, {
                passive: true
            });
            el.addEventListener('touchend', function(e) {
                var dx = e.changedTouches[0].clientX - startX;
                var dy = e.changedTouches[0].clientY - startY;
                if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)) {
                    glbMove(dx < 0 ? 1 : -1);
                }
            }, {
                passive: true
            });
        })();
    </script>









@endsection
