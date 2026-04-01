@extends('frontend.layout')
@section('title')
    Project
@endsection
@section('content')



    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null) }});">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">All Luxurious Property</h5>
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
    <div class="container-fluid mt-100 mt-60 mb-100 mb-60 pb-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title text-primary mb-3 ">Explore Your Dream Homes</h4>
                    <h1>Unveiling Our Premier Apartment and Land Projects</h1>
                    <hr
                        style="
                border-top:3px solid #17A84C;
                width:100px;margin:auto;
                opacity:1;margin-top:-15px;
                border-radius: 2px;">

                    <p class="text-muted para-desc mb-0 py-3 mx-auto">Step into the realm of luxury living and unparalleled
                        convenience as we showcase our exceptional apartment and land projects in and around Dhaka. From
                        stunning urban residences to expansive plots of land ripe for development, our projects epitomize
                        modern living at its finest. Discover the perfect blend of comfort, style, and sophistication,
                        meticulously crafted to exceed your expectations/p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row g-4 mt-0" style="width:100%;margin:auto">

            @for ($i = 1; $i < 4; $i++)
                @foreach ($all_project as $key => $item)
                    @if ($item->property_status == $i)
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                                <div class="property-image position-relative overflow-hidden shadow">
                                    <img src="{{ asset($item->property_thumbnail ?? null) }}" class="img-fluid"
                                        alt="Image" style="width: 100%;height:300px">

                                </div>

                                <div class="card-body content p-4" style="
    height: 273px;
">
                                    <a href="{{ route('completed.project.details', $item->id) }}"
                                        class="title  text-dark fw-medium">
                                        <h4 class="text-center fs-4 text-success fw-bold">{{ $item->property_name }}</h4>
                                    </a>
                                    @if ($item->projectCategory)
                                        <p
                                            style="text-align: center; font-size: 0.9rem; color: #b20101; margin: 5px 0; font-weight: 500;">
                                            <i class="mdi mdi-folder-outline me-1"></i>{{ $item->projectCategory->name }}
                                        </p>
                                    @endif
                                    <p class="text-center" style="font-size: 18px"><i
                                            class="fa-solid fa-location-dot text-success"></i> {{ $item->location_eng }}</p>

                                    @if ($item->property_mood == 'sqr feet')
                                        <ul
                                            class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                            <li class="d-flex align-items-center me-3">
                                                <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>

                                                <span class="text-muted">{{ $item->property_size }} SQFT</span>

                                            </li>

                                            <li class="d-flex align-items-center me-3">
                                                <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                                <span class="text-muted">{{ $item->rooms }} Beds</span>
                                            </li>

                                            <li class="d-flex align-items-center">
                                                <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                                <span class="text-muted">{{ $item->bathrooms }} Baths</span>
                                            </li>
                                        </ul>
                                    @endif

                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">

                                            <span class="fw-mediumtext-muted">Offer Price: &#2547;
                                                {{ $item->discount }}</span>
                                            <p class="fw-medium mb-0" style="font-size: smaller;">Regular Price: &#2547;
                                                <del>{{ $item->price }}</del></p>
                                        </li>

                                        <li class="list-inline-item mb-0 mt-3">
                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                class="btn btn-sm btn-primary" style="font-size: 14px">Call</a>
                                            <a href="{{ route('contact.us') }}" class="btn btn-sm btn-success"
                                                style="font-size: 14px">Email</a>
                                        </li>

                                    </ul>
                                </div>
                            </div><!--end items-->
                        </div><!--end col-->
                    @endif
                @endforeach
            @endfor


        </div><!--end row-->
    </div><!--end container-->









@endsection
