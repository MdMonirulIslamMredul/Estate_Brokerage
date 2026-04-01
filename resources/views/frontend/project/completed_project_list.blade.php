@extends('frontend.layout')
@section('title')
    Completed Projects
@endsection
@section('content')

    <style>
        /* â”€â”€ Project List Page â”€â”€ */
        .project-hero {
            position: relative;
            min-height: 380px;
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
            width: 100%;
        }

        .section-divider {
            width: 55px;
            height: 3px;
            background: #17A84C;
            border-radius: 2px;
            margin: 8px auto 0;
        }

        /* Search Card */
        .search-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 32px rgba(0, 0, 0, .10);
            padding: 28px 30px;
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        /* Property Card */
        .prop-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .08);
            overflow: hidden;
            transition: transform .28s, box-shadow .28s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .prop-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, .14);
        }

        .prop-img-wrap {
            position: relative;
            overflow: hidden;
            height: 240px;
        }

        .prop-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .45s ease;
        }

        .prop-card:hover .prop-img-wrap img {
            transform: scale(1.06);
        }

        .prop-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: #17A84C;
            color: #fff;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 50px;
            z-index: 2;
        }

        .prop-body {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .prop-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1a2e1a;
            text-decoration: none;
            display: block;
            margin-bottom: 6px;
            transition: color .2s;
        }

        .prop-title:hover {
            color: #17A84C;
        }

        .prop-location {
            font-size: .83rem;
            color: #888;
            margin-bottom: 14px;
        }

        .prop-stats {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            padding: 12px 0;
            border-top: 1px solid #f0f0f0;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 14px;
        }

        .prop-stat {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: .82rem;
            color: #555;
        }

        .prop-stat i {
            color: #17A84C;
            font-size: 1rem;
        }

        .prop-price {
            margin-bottom: 16px;
        }

        .prop-price .offer {
            font-size: .95rem;
            font-weight: 700;
            color: #17A84C;
        }

        .prop-price .regular {
            font-size: .78rem;
            color: #aaa;
        }

        .prop-actions {
            margin-top: auto;
            display: flex;
            gap: 8px;
        }

        .prop-actions .btn {
            flex: 1;
            font-size: .85rem;
            border-radius: 50px;
            font-weight: 600;
        }

        /* No results */
        .no-results {
            text-align: center;
            padding: 60px 20px;
            color: #aaa;
        }

        .no-results i {
            font-size: 3rem;
            margin-bottom: 12px;
            display: block;
        }
    </style>

    {{-- Hero --}}
    <div class="project-hero" style="background-image: url('{{ asset($banner->banner_image ?? '') }}');">
        <div class="hero-overlay"></div>
        <div class="container hero-content text-center">
            <span
                style="background:#17A84C;color:#fff;font-size:.75rem;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:5px 16px;border-radius:50px;display:inline-block;margin-bottom:12px;"><i
                    class="mdi mdi-check-decagram me-1"></i> Completed Projects</span>
            <h1 class="text-white fw-bold mb-2" style="font-size:clamp(1.6rem,4vw,2.5rem);">Luxurious Completed Properties
            </h1>
            <p class="text-white-50 mb-0">Browse our portfolio of fully completed residential &amp; commercial properties</p>
            <div class="section-divider"></div>
        </div>
    </div>

    {{-- Search + List --}}
    <section class="py-5" style="background:#f5fdf8;">
        <div class="container">

            {{-- Search Card --}}
            <div class="search-card mb-5">
                <p class="fw-semibold text-success mb-3"><i class="mdi mdi-home-search me-1"></i> Filter Completed
                    Properties</p>
                <form action="{{ route('completed.project.search') }}" method="get">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Property Type</label>
                            <select name="property_type" class="form-select">
                                <option value="" disabled selected>Select Type</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Land">Land</option>
                            </select>
                        </div>
                        @php $property = App\Models\Project::where('property_status',2)->get(); @endphp
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Location</label>
                            <select name="location" class="form-select">
                                <option value="" disabled selected>Select Location</option>
                                @foreach ($property as $loc)
                                    <option value="{{ $loc->id }}">{{ $loc->location_eng }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold">
                                <i class="mdi mdi-magnify me-1"></i> Search Property
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row g-4">
                @forelse($all_project as $item)
                    <div class="col-xl-4 col-md-6">
                        <div class="prop-card">
                            <div class="prop-img-wrap">
                                <img src="{{ asset($item->property_thumbnail ?? '') }}" alt="{{ $item->property_name }}">
                                <span class="prop-badge"><i class="mdi mdi-check-circle me-1"></i>Completed</span>
                            </div>
                            <div class="prop-body">
                                <a href="{{ route('completed.project.details', $item->id) }}"
                                    class="prop-title">{{ $item->property_name }}</a>
                                @if ($item->projectCategory)
                                    <p class="prop-category"
                                        style="font-size: 0.9rem; color: #b20101; margin: 5px 0; font-weight: 500;">
                                        <i class="mdi mdi-folder-outline me-1"></i>{{ $item->projectCategory->name }}
                                    </p>
                                @endif
                                <p class="prop-location"><i
                                        class="mdi mdi-map-marker text-success me-1"></i>{{ $item->location_eng }}</p>

                                @if ($item->property_mood == 'sqr feet')
                                    <div class="prop-stats">
                                        <span class="prop-stat"><i
                                                class="mdi mdi-arrow-expand-all"></i>{{ $item->property_size }} sqf</span>
                                        <span class="prop-stat"><i class="mdi mdi-bed-king-outline"></i>{{ $item->rooms }}
                                            Beds</span>
                                        <span class="prop-stat"><i class="mdi mdi-shower"></i>{{ $item->bathrooms }}
                                            Baths</span>
                                    </div>
                                    <div class="prop-price">
                                        <div class="offer">&#2547;{{ $item->discount }} <span
                                                style="font-size:.78rem;font-weight:400;color:#888;">/ per Sqft</span></div>
                                        @if ($item->price)
                                            <div class="regular">Regular: &#2547;<del>{{ $item->price }} / per Sqft</del>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="prop-price" style="margin-top:14px;">
                                        <div class="offer">&#2547;{{ $item->discount }} <span
                                                style="font-size:.78rem;font-weight:400;color:#888;">/ per Katha</span>
                                        </div>
                                        @if ($item->price)
                                            <div class="regular">Regular: &#2547;<del>{{ $item->price }} / per Katha</del>
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <div class="prop-actions">
                                    <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone ?? '' }}"
                                        class="btn btn-outline-success">
                                        <i class="mdi mdi-phone me-1"></i>Call
                                    </a>
                                    <a href="{{ route('completed.project.details', $item->id) }}" class="btn btn-success">
                                        <i class="mdi mdi-eye me-1"></i>View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-results">
                            <i class="mdi mdi-home-off-outline"></i>
                            <h5>No properties found</h5>
                            <p>Try adjusting your search filters.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

@endsection
