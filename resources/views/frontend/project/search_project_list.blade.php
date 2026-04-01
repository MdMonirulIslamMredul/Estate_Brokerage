@extends('frontend.layout')
@section('title')
    Project
@endsection
@section('content')
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100"
        style="background: url({{ asset($banner->banner_image ?? null) }});background-size: cover;background-position: center;">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Search Results</h5>
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
    <!-- Hero End -->

    {{-- Search Results --}}
    <section class="py-100">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <div class="section-title text-center">
                        <span class="text-uppercase fw-semibold"
                            style="font-size: 12px; letter-spacing: 2px; color: var(--secondary-color);">Search
                            Results</span>
                        <h1 style="color: var(--dark-color); font-size: 2.5rem; font-weight: 700; margin-top: 10px;">Find
                            Your Dream Property</h1>
                        <div
                            style="width: 60px; height: 4px; background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); margin: 20px auto; border-radius: 2px;">
                        </div>
                        @if (count($all_project) > 0)
                            <p class="my-4 mx-auto"
                                style="text-align: center; max-width: 600px; color: var(--text-muted); line-height: 1.8;">
                                Found <span
                                    style="color: var(--primary-color); font-weight: 600;">{{ count($all_project) }}</span>
                                properties matching your criteria. Click on any property card to view detailed information.
                            </p>
                        @else
                            <p class="my-4 mx-auto"
                                style="text-align: center; max-width: 600px; color: var(--text-muted); line-height: 1.8;">
                                No properties found matching your search criteria. Please try different filters.
                            </p>
                        @endif
                    </div>
                </div><!--end col-->
            </div>

            @if (count($all_project) > 0)
                <div class="row g-4">
                    @foreach ($all_project as $key => $item)
                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="{{ route('completed.project.details', $item->id) }}" class="text-decoration-none">
                                <div class="card property-card border-0 h-100 shadow-sm rounded-3 overflow-hidden transition-all"
                                    style="cursor: pointer;transition: all 0.3s ease;">

                                    <!-- Image Section with Overlay -->
                                    <div class="position-relative overflow-hidden" style="height: 280px;">
                                        <img src="{{ asset($item->property_thumbnail ?? null) }}"
                                            class="img-fluid w-100 h-100" alt="{{ $item->property_name }}_Image"
                                            style="object-fit: cover;transition: transform 0.3s ease;">

                                        <!-- Overlay with Badge -->
                                        <div class="position-absolute top-0 start-0 end-0 bottom-0 bg-dark"
                                            style="opacity: 0;transition: opacity 0.3s ease;" class="overlay-hover"></div>

                                        @if ($item->projectCategory)
                                            <div class="position-absolute top-3 start-3">
                                                <span class="badge"
                                                    style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); padding: 0.5rem 1rem; font-size: 0.85rem;">
                                                    {{ $item->projectCategory->name }}
                                                </span>
                                            </div>
                                        @endif

                                        <div class="position-absolute top-3 end-3">
                                            <span class="badge bg-success"
                                                style="padding: 0.5rem 1rem; font-size: 0.85rem;">Featured</span>
                                        </div>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body p-4">
                                        <!-- Property Name -->
                                        <h5 class="card-title fw-bold mb-2"
                                            style="color: var(--dark-color); font-size: 1.2rem; line-height: 1.4;">
                                            {{ $item->property_name }}
                                        </h5>

                                        <!-- Location -->
                                        <p class="text-muted mb-3" style="font-size: 0.95rem;">
                                            <i class="fa-solid fa-location-dot"
                                                style="color: var(--secondary-color); margin-right: 6px;"></i>
                                            {{ $item->location_eng }}
                                        </p>

                                        <!-- Property Details Grid -->
                                        @if ($item->property_mood == 'sqr feet')
                                            <div class="row g-2 py-3 border-top border-bottom"
                                                style="border-color: var(--border-color);">
                                                <div class="col-4 text-center">
                                                    <i class="mdi mdi-arrow-expand-all"
                                                        style="color: var(--primary-color); font-size: 1.3rem;"></i>
                                                    <p class="mb-0 small mt-2" style="color: var(--text-muted);">
                                                        {{ $item->property_size }} sqft</p>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="mdi mdi-bed"
                                                        style="color: var(--primary-color); font-size: 1.3rem;"></i>
                                                    <p class="mb-0 small mt-2" style="color: var(--text-muted);">
                                                        {{ $item->rooms }} Beds</p>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="mdi mdi-shower"
                                                        style="color: var(--primary-color); font-size: 1.3rem;"></i>
                                                    <p class="mb-0 small mt-2" style="color: var(--text-muted);">
                                                        {{ $item->bathrooms }} Baths</p>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Price Section -->
                                        <div class="text-center my-4">
                                            <p class="mb-1" style="font-size: 0.9rem; color: var(--text-muted);">Offer
                                                Price</p>
                                            <p class="mb-2 fw-bold" style="color: var(--primary-color); font-size: 1.5rem;">
                                                &#2547; {{ number_format($item->discount) }}
                                                <span style="font-size: 0.85rem; color: var(--text-muted);">
                                                    @if ($item->property_mood == 'sqr feet')
                                                        / per sqft
                                                    @else
                                                        / per Katha
                                                    @endif
                                                </span>
                                            </p>
                                            <p class="small mb-0" style="color: var(--text-muted);">
                                                Regular: <del>&#2547; {{ number_format($item->price) }}</del>
                                            </p>
                                        </div>

                                        <!-- CTA Buttons -->
                                        <div class="d-grid gap-2 mt-4">
                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                class="btn btn-outline-primary rounded-2"
                                                style="font-weight: 600; padding: 0.6rem; border: 2px solid var(--primary-color);">
                                                <i class="mdi mdi-phone me-2"></i>Call Now
                                            </a>
                                            <a href="{{ route('completed.project.details', $item->id) }}"
                                                class="btn text-white rounded-2"
                                                style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); font-weight: 600; padding: 0.6rem;">
                                                <i class="mdi mdi-information-outline me-2"></i>View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="text-center py-5">
                            <div style="font-size: 4rem; margin-bottom: 1rem;">
                                <i class="mdi mdi-inbox-multiple-outline" style="color: var(--text-muted);"></i>
                            </div>
                            <h5 style="color: var(--dark-color); margin-bottom: 1rem;">No Properties Found</h5>
                            <p style="color: var(--text-muted); margin-bottom: 2rem;">Try adjusting your search filters or
                                browse our featured properties.</p>
                            <a href="{{ route('all.project.list') }}" class="btn"
                                style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); color: white; padding: 0.7rem 2rem;">
                                <i class="mdi mdi-arrow-left me-2"></i>Browse All Properties
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <style>
        .property-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .property-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
        }

        .property-card:hover img {
            transform: scale(1.08);
        }

        .property-card:hover .overlay-hover {
            opacity: 0.3 !important;
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .property-card {
                margin-bottom: 1rem;
            }
        }
    </style>
@endsection
