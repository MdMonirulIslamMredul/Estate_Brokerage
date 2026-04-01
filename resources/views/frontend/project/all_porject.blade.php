@extends('frontend.layout')
@section('title')
    Project
@endsection
@section('content')
    <style>
        .all-project-page .accent-title,
        .all-project-page .accent-title i {
            color: var(--primary-color) !important;
        }

        .all-project-page .accent-line {
            border-top: 3px solid var(--primary-color) !important;
            width: 100px;
            margin: -15px auto 0;
            opacity: 1;
            border-radius: 2px;
        }

        .all-project-page .property {
            border: 1px solid rgba(178, 1, 1, 0.16) !important;
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .all-project-page .property:hover {
            transform: translateY(-6px);
            border-color: var(--primary-color) !important;
            box-shadow: 0 16px 34px rgba(178, 1, 1, 0.16) !important;
        }

        .all-project-page .project-item-card {
            position: relative;
        }

        .all-project-page .project-card-link-layer {
            position: absolute;
            inset: 0;
            z-index: 1;
            border-radius: 0.5rem;
        }

        .all-project-page .project-item-card .btn,
        .all-project-page .project-item-card .card-body a {
            position: relative;
            z-index: 2;
        }

        .all-project-page .property-title-link {
            color: var(--primary-color) !important;
            text-decoration: none;
        }

        .all-project-page .property-title-link:hover {
            opacity: 0.9;
        }

        .all-project-page .accent-btn {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: #000 !important;
            border: none !important;
            padding: 11px 28px !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            font-size: 16px !important;
            transition: all 0.3s ease !important;
            cursor: pointer !important;
            display: inline-block !important;
            text-decoration: none !important;
            box-shadow: 0 4px 12px rgba(178, 1, 1, 0.25) !important;
            height: auto !important;
        }

        .all-project-page .accent-btn:hover {
            color: #000 !important;
            box-shadow: 0 10px 28px rgba(178, 1, 1, 0.35) !important;
            transform: translateY(-2px) !important;
        }

        .all-project-page .selected-category-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 8px;
            padding: 7px 14px;
            border-radius: 999px;
            background: rgba(178, 1, 1, 0.1);
            color: var(--primary-color);
            font-weight: 600;
        }

        .all-project-page input[type="submit"].accent-btn {
            width: 100% !important;
            min-height: 48px !important;
            padding: 12px 24px !important;
        }
    </style>

    <div class="all-project-page">
        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null) }});">
            <div class="bg-overlay bg-gradient-overlay-2"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">All Luxurious Property
                            </h5>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            </div><!--end container-->
        </section><!--end section-->
        {{-- <div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div> --}}
        <!-- Hero End -->

        {{-- completed project start --}}
        <div class=" mt-100 mt-60 mb-100 mb-60 pb-5">
            {{-- search start --}}
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-lg-4">
                        <p class="fs-4 accent-title"><i class="fa-solid fa-house-user"></i> Find Your Property</p>
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <form action="{{ route('all.project.list') }}" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="project-category">Project Category</label>
                                        <select name="category" class="form-select" id="project-category">
                                            <option value="">All Categories</option>
                                            @foreach ($projectCategories as $category)
                                                <option value="{{ $category->slug }}"
                                                    {{ !empty($selectedCategory) && $selectedCategory->slug === $category->slug ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @php
                                    $property = App\Models\Project::where('property_status', 1)->get();
                                @endphp
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Locatin</label>
                                        <select name="location" class="form-select">
                                            <option value="" disabled selected>Select Property Location</option>
                                            @foreach ($property as $location)
                                                <option value="{{ $location->id }}">{{ $location->location_eng }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div style="margin-top:27px">
                                            <input type="submit" class="btn accent-btn" value="Search Property">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>{{-- end container --}}
            {{-- search end --}}
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2 mt-3">

                        <h1>Luxurious Property for Sale in Dhaka</h1>
                        <hr class="accent-line">

                        @if (!empty($selectedCategory))
                            <div class="selected-category-chip">
                                <i class="mdi mdi-filter-variant"></i>
                                Showing {{ $selectedCategory->name }} Projects
                            </div>
                        @endif
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div><!--end col-->
            </div><!--end row-->

            <div class="row g-4 mt-0" style="width:100%;margin:auto">
                @foreach ($all_project as $key => $item)
                    <div class="col-lg-4 col-md-4 col-12">
                        <div
                            class="card property border-0 shadow position-relative overflow-hidden rounded-3 project-item-card">
                            <a href="{{ route('completed.project.details', $item->id) }}" class="project-card-link-layer"
                                aria-label="View details for {{ $item->property_name }}"></a>
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="{{ asset($item->property_thumbnail ?? null) }}" class="img-fluid"
                                    alt="{{ $item->property_name }}_Image" style="width: 100%;height:300px">

                            </div>

                            <div class="card-body content p-4">
                                <a href="{{ route('completed.project.details', $item->id) }}"
                                    class="title fw-medium property-title-link">
                                    <h4 class="text-center fs-4 fw-bold">{{ $item->property_name }}</h4>
                                </a>
                                @if ($item->projectCategory)
                                    <p
                                        style="text-align: center; font-size: 0.9rem; color: #b20101; margin: 5px 0; font-weight: 500;">
                                        <i class="mdi mdi-folder-outline me-1"></i>{{ $item->projectCategory->name }}
                                    </p>
                                @endif
                                <p class="text-center" style="font-size: 18px"><i
                                        class="fa-solid fa-location-dot accent-title"></i>
                                    {{ $item->location_eng }}</p>
                                @if ($item->property_mood == 'sqr feet')
                                    <ul
                                        class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">{{ $item->property_size }} sqf</span>
                                        </li>

                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">{{ $item->bedrooms }} Beds</span>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">{{ $item->bathrooms }} Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled mt-2 mb-0">
                                        <li class="list-inline-item mb-0 d-flex justify-content-center">

                                            <div>
                                                <span class="fw-mediumtext-muted">Offer Price: &#2547;
                                                    {{ $item->discount }} /
                                                    per Sqft</span>
                                                <p class="fw-medium mb-0" style="font-size: smaller;">Regular Price: &#2547;
                                                    <del>{{ $item->price }} / per Sqft</del>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                class="btn btn-sm accent-btn me-2" style="font-size: 14px">Call</a>
                                            <a href="{{ route('contact.us') }}" class="btn btn-sm accent-btn"
                                                style="font-size: 14px">Email</a>
                                        </li>

                                    </ul>
                                @else
                                    <ul class="list-unstyled mt-2 mb-0">
                                        <li class="list-inline-item mb-0 d-flex justify-content-center">
                                            <div>

                                                <span class="fw-mediumtext-muted">Offer Price: &#2547;
                                                    {{ $item->discount }} /
                                                    per Katha</span>
                                                <p class="fw-medium mb-0" style="font-size: smaller;">Regular Price:
                                                    &#2547;
                                                    <del>{{ $item->price }} / per Katha</del>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                class="btn btn-sm accent-btn me-2" style="font-size: 14px">Call</a>
                                            <a href="{{ route('contact.us') }}" class="btn btn-sm accent-btn"
                                                style="font-size: 14px">Email</a>
                                        </li>

                                    </ul>
                                @endif
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                @endforeach


            </div><!--end row-->
        </div><!--end container-->
    </div>
@endsection
