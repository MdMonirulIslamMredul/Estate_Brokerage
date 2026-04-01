<!doctype html>
<html lang="en">

<!-- Mirrored from shreethemes.in/towntor/layouts/index-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 05:10:05 GMT -->

<head>

    @include('frontend.includes.headlink')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .accordion {
            /* background-color: #eee; */
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            /* background-color: #ccc; */
        }

        .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        @media only screen and (max-width: 426px) {
            .mbst {
                position: absolute;
                z-index: 999;
                top: 50%;
                left: 50%;
                width: 40%;
            }

            @media only screen and (max-width: 600px) {
                .d-show {
                    display: block !important;
                }

                .d-off {
                    display: none !important;
                }

                @media only screen and (max-width: 1024) {


                    #costom {
                        width: 80% !important;
                    }
                }
    </style>
    <style>
        .whatsapp_float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 25px;
            left: 40px;
            background-color: #F08121;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .whatsapp-icon {
            margin-top: 16px;
        }

        /* for mobile */
        @media screen and (max-width: 767px) {
            .whatsapp-icon {
                margin-top: 10px;
            }

            .whatsapp_float {
                width: 40px;
                height: 40px;
                bottom: 70px;
                right: 40px;
                font-size: 22px;
            }
        }

        .theme-switcher {
            display: none !important;
        }

        .back-to-top.open {
            bottom: 30px;
        }

        .phone-button {
            display: inline;
            font-size: 24px;

            line-height: 42px;
            text-align: center;
            position: fixed;
            bottom: 70px;
            right: 40px;
            z-index: 999;
            border-radius: 50%;


        }

        .bounce {
            -webkit-animation: float 1500ms infinite ease-in-out;
            animation: float 1500ms infinite ease-in-out;
        }

        .bounce_w {
            -webkit-animation: float 1500ms infinite ease-in-out;
            animation: float 1500ms infinite ease-in-out;
        }

        .phone-button i {
            color: #F08121;
        }
    </style>

</head>


<body>

    <a href="https://api.WhatsApp.com/send?phone=+8801715175856&text=Hello! " style="padding-top: 1px;margin-top: 9px;"
        class="phone-button bounce"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="70"
            viewBox="0 0 48 48">
            <path fill="#fff"
                d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
            </path>
            <path fill="#fff"
                d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
            </path>
            <path fill="#cfd8dc"
                d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
            </path>
            <path fill="#40c351"
                d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
            </path>
            <path fill="#fff" fill-rule="evenodd"
                d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                clip-rule="evenodd"></path>
        </svg></a>
    <!-- Navbar STart -->
    @include('frontend.includes.header')
    <!-- Navbar End -->

    <!-- Hero Start -->

    <section class="swiper-slider-hero position-relative d-block vh-100" id="home">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($slider as $item)
                <div class="swiper-slide d-flex align-items-center overflow-hidden">
                    <div class="slide-inner slide-bg-image d-flex align-items-center"
                        style="background: center center;" data-background="{{ asset($item->image) }}">
                        <div class="bg-overlay"></div>
                        <div class="container position-relative">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="title-heading mb-5 text-center">
                                        <h1 class="heading fw-bold title-dark  mb-3" style="color:red">
                                            {{ $item->title_english }}
                                        </h1>
                                        <p class="fs-3 fw-bolder title-dark mb-0 text-center" style="color:green">
                                            {{ $item->short_text_eng }}
                                        </p>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->


                        </div>
                        <!--end container-->
                    </div>
                    <!-- end slide-inner -->
                </div>
                <!-- end swiper-slide -->
                @endforeach
            </div>
            <!-- end swiper-wrapper -->
            <!-- swipper controls -->
            <div class="swiper-button-next rounded-circle text-center">
                <i class="fa-solid fa-arrow-right" style="color:green"></i>
            </div>
            <div class="swiper-button-prev rounded-circle text-center">
                <i class="fa-solid fa-arrow-left" style="color:green"></i>
            </div>
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    {{-- Heros end  --}}

    <div class="rounded-3 sm-rounded-0 shadow translate-middle mbst" id="costom"
        style="position: absolute; z-index: 900; top: 65%; left: 50%; width: 50%;">
        <div class="searchform card bg-dark border-0 tab-pane fade show active" id="buy" role="tabpanel"
            aria-labelledby="buy-login" style="opacity: .9">
            <form class="card-body text-start " method="get" action="{{ url('/serch-property/type/location') }}">
                @csrf
                <div class="text-dark text-start">
                    <div class="row g-lg-0 text-cneter">
                        <div class="col-lg-6 col-md-6  searchin ">
                            <div class="mb-3">
                                <div class="form-group">
                                    {{-- <i data-feather="search" class="fea icon-ex-md icons"></i> --}}
                                    <input name="location" type="text" class="form-control px-3"
                                        placeholder="Search Location" style="width: 97%">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        {{--
                                  <div class="col-lg-2 col-md-2 "></div>
                                  --}}
                        <div class="col-lg-6 col-md-6  searchin">
                            <div class="mb-3">
                                <div class="form-group">
                                    <select class="form-select px-3" name="property_type" id=""
                                        style="width: 97%">
                                        <option disabled selected>Select An Item </option>
                                        <option value="Apartment">Apartment </option>
                                        <option value="Land">Land </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4 col-md-4 searchin">
                            <div class="mb-3">
                                <div class="form-group">
                                    {{-- <i data-feather="search" class="fea icon-ex-md icons"></i> --}}
                                    <input name="bedrooms" type="text" class="form-control px-3" placeholder="Beds"
                                        style="width: 97%">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4 col-md-4 searchin">
                            <div class="mb-3">
                                <div class="form-group">
                                    {{-- <i data-feather="search" class="fea icon-ex-md icons"></i> --}}
                                    <input name="bathrooms" type="text" class="form-control px-3" placeholder="Baths"
                                        style="width: 97%">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        {{--
                                  <div class="col-lg-2 col-md-2 "></div>
                                  --}}
                        <div class="col-lg-4 col-md-4  searchin">
                            <div class="mb-3">
                                <div class="form-group">
                                    <input name="property_size" type="text" class="form-control px-3"
                                        placeholder="Area SQFT/katha" style="width: 97%">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="d-grid searchin" style="width: 98%">
                            <input type="submit" id="search" name="search" class="btn btn-primary"
                                value="Search">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </form>
            <!--end form-->
        </div>
        <!--end teb pane-->
    </div>

    <!-- main body section Start -->
    <section class="section">
        <!-- short about section Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0 text-center">
                    <div class="section-title ms-lg-5">
                        <h4 class="text-primary fw-medium mb-2"> {{ $about->title_english }}</h4>
                        <h1 class="title mb-3">{{ $about->short_title_english }}</h1>
                        <hr
                            style="
                            border-top:3px solid #17A84C;
                            width:100px;margin:auto;
                            opacity:1;margin-top:-15px;
                            border-radius: 2px;">

                        <div class="py-3">
                            {!! $about->details_1_eng !!}
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('about.details') }}" class="btn btn-pills btn-primary">Explore About Us
                                <i class="mdi mdi-arrow-right align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- short about section end -->


        {{-- <div class="container mt-100 mt-60">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-3">How It Works</h4>
                            <p class="text-muted para-desc mb-0 mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row g-4 mt-0">
                    <div class="col-md-4">
                        <div class="position-relative features text-center mx-lg-4 px-md-1">
                            <div class="feature-icon position-relative overflow-hidden d-flex justify-content-center">
                                <i data-feather="hexagon" class="hexagon"></i>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <i data-feather="home" class="fea icon-m-md text-primary"></i>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="#" class="fw-medium title text-dark fs-5">Evaluate Property</a>
                                <p class="text-muted mt-3 mb-0">If the distribution of letters and 'words' is random, the reader will not be distracted from making.</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4">
                        <div class="position-relative features text-center mx-lg-4 px-md-1">
                            <div class="feature-icon position-relative overflow-hidden d-flex justify-content-center">
                                <i data-feather="hexagon" class="hexagon"></i>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <i data-feather="briefcase" class="fea icon-m-md text-primary"></i>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="#" class="fw-medium title text-dark fs-5">Meeting with Agent</a>
                                <p class="text-muted mt-3 mb-0">If the distribution of letters and 'words' is random, the reader will not be distracted from making.</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4">
                        <div class="position-relative features text-center mx-lg-4 px-md-1">
                            <div class="feature-icon position-relative overflow-hidden d-flex justify-content-center">
                                <i data-feather="hexagon" class="hexagon"></i>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <i data-feather="key" class="fea icon-m-md text-primary"></i>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="#" class="fw-medium title text-dark fs-5">Close the Deal</a>
                                <p class="text-muted mt-3 mb-0">If the distribution of letters and 'words' is random, the reader will not be distracted from making.</p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container--> --}}

        {{-- completed project start --}}
        <div class="container-fluid mt-100 mt-60 mb-100 mb-60 pb-5" style="background:#F8F8F8;">
            <div class="row justify-content-center">
                <div class="col">
                    <div class=" container section-title text-center mb-4 pb-2">
                        <h4 class="title text-primary mb-3 ">Explore Your Dream Homes</h4>
                        <h1>Unveiling Our Premier Apartment and Land Projects</h1>
                        <hr
                            style="
                            border-top:3px solid #17A84C;
                            width:100px;margin:auto;
                            opacity:1;margin-top:-15px;
                            border-radius: 2px;">

                        <p class=" mb-0 py-3 mx-auto" style="text-align: justify; width:100%;">Step into the realm of
                            luxury living and unparalleled convenience as we showcase our exceptional apartment and land
                            projects in and around Dhaka. From stunning urban residences to expansive plots of land ripe
                            for development, our projects epitomize modern living at its finest. Discover the perfect
                            blend of comfort, style, and sophistication, meticulously crafted to exceed your
                            expectations</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->


            <div class="row g-4 mt-0" style="width:100%;margin:auto">
                @for ($i = 1; $i < 4; $i++)
                    @foreach ($projects as $item)
                    @if ($item->property_status == $i)
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="{{ asset($item->property_thumbnail ?? null) }}" class="img-fluid"
                                    alt="Image" style="width: 100%;height:300px">

                            </div>

                            <div class="card-body content p-2" style="
    height: 273px;
">
                                <a href="{{ route('completed.project.details', $item->id) }}"
                                    class="title  text-dark fw-medium">
                                    <h4 class="text-center fs-4 text-success fw-bold">
                                        {{ $item->property_name }}
                                    </h4>
                                </a>
                                <p class="text-center" style="font-size: 18px"><i
                                        class="fa-solid fa-location-dot text-success"></i>
                                    {{ $item->location_eng }}
                                </p>

                                @if ($item->property_mood == 'sqr feet')
                                <ul
                                    class="list-unstyled mb-0 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>

                                        <span class="text-muted">{{ $item->property_size }} sft</span>

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

                                <ul class="list-unstyled  mt-2 mb-0 ">
                                    <li class="list-inline-item mb-0 d-flex justify-content-center">

                                        <div>
                                            <span class="fw-mediumtext-muted">Offer Price: &#2547;
                                                {{ $item->discount }} / per Sqft</span>
                                            <p class="fw-medium mb-0" style="font-size: smaller;">Regular
                                                Price: &#2547; <del>{{ $item->price }} / per Sqft</del>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                        <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                            class="btn btn-sm btn-primary me-2"
                                            style="font-size: 14px">Call</a>
                                        <a href="{{ route('contact.us') }}"
                                            class="btn btn-sm btn-success"
                                            style="font-size: 14px">Email</a>
                                    </li>

                                </ul>
                                @else
                                <ul class="list-unstyled  mt-2 mb-0">
                                    <li class="list-inline-item mb-0 d-flex justify-content-center">

                                        <div>
                                            <span class="fw-mediumtext-muted">Offer Price: &#2547;
                                                {{ $item->discount }} / per Katha</span>
                                            <p class="fw-medium mb-0" style="font-size: smaller;">Regular
                                                Price: &#2547; <del>{{ $item->price }} / per Katha</del>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                        <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                            class="btn btn-sm btn-primary me-2"
                                            style="font-size: 14px">Call</a>
                                        <a href="{{ route('contact.us') }}"
                                            class="btn btn-sm btn-success"
                                            style="font-size: 14px">Email</a>
                                    </li>

                                </ul>
                                @endif
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    @endif
                    @endforeach
                    @endfor

                    <div class="col-12 mt-4 pt-2">
                        <div class="text-center">
                            <a href="{{ route('all.project.list') }}" class="mt-3 fs-6 text-primary">View More Properties
                                <i class="mdi mdi-arrow-right align-middle"></i></a>
                        </div>
                    </div>
            </div><!--end row-->
        </div><!--end container-->

        {{-- completed project end --}}


        {{-- counter start --}}
        <div class="container-fluid mt-100 mt-60">
            <div class="position-relative overflow-hidden rounded-3 shadow py-5"
                style="background: url({{ asset('frontend/assets/images/bg/05.jpg') }}) center center fixed;">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-4 py-3">
                            <div class="counter-box text-center">
                                <h1 class="mb-0 text-green fw-bold" style="color:green !important"><span
                                        class="counter-value" data-target="{{ $counter_icon->value_1 }}">1</span>+
                                </h1>
                                <h6 class="counter-head text-green fs-5 fw-semibold mb-0"
                                    style="color:green !important">{{ $counter_icon->title_english_1 }}</h6>
                            </div><!--end counter box-->
                        </div><!--end col-->

                        <div class="col-4 py-3">
                            <div class="counter-box text-center">
                                <h1 class="mb-0 text-green fw-bold" style="color:green !important"><span
                                        class="counter-value" data-target="{{ $counter_icon->value_2 }}">1</span>+
                                </h1>
                                <h6 class="counter-head text-green fs-5 fw-semibold mb-0"
                                    style="color:green !important">{{ $counter_icon->title_english_2 }}</h6>
                            </div><!--end counter box-->
                        </div><!--end col-->

                        <div class="col-4 py-3">
                            <div class="counter-box text-center">
                                <h1 class="mb-0 text-green fw-bold" style="color:green !important"><span
                                        class="counter-value" data-target="{{ $counter_icon->value_3 }}">1</span>+
                                </h1>
                                <h6 class="counter-head text-green fs-5 fw-semibold mb-0"
                                    style="color:green !important">{{ $counter_icon->title_english_3 }}</h6>
                            </div><!--end counter box-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </div><!--end container fluid-->
        {{-- counter end --}}

        {{-- various projects start --}}
        <div class="container-fluid mt-100 mt-60 py-5">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title text-primary mb-3 ">Our Portfolio of</h4>
                        <h1>Ongoing, Upcoming, and Completed Projects</h1>
                        <hr
                            style="
                border-top:3px solid #17A84C;
                width:100px;margin:auto;
                opacity:1;margin-top:-15px;
                border-radius: 2px;">
                        <p class="para-desc mb-0 py-3 mx-auto" style="text-align: justify;">We offer a wide variety of
                            residential and commercial properties in Dhaka. Find your dream home or commercial space
                            from the pull of nicely built properties.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row vrproject" style="width: 100%;margin:auto">
                <div class="col-xl-12 col-md-12 col-12 col-lg-12">
                    <div class="card">
                        <div class="">
                            <ul class="nav nav-pills navtabs d-flex justify-content-center" role="tablist"
                                style="background: none">
                                <li class="nav-item" role="presentation">
                                    <a href="#ongoing" data-bs-toggle="tab" aria-expanded="true"
                                        class="nav-link px-4 fs-5  me-5" aria-selected="false" role="tab"
                                        tabindex="-1">
                                        Ongoing
                                    </a>
                                </li>


                                <li class="nav-item" role="presentation">
                                    <a href="#upcomming" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link px-2 fs-5 px-2" aria-selected="true" role="tab">
                                        Upcomming
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation" style="padding-left: 40px !important;">

                                    <a href="#completed" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link active px-2 fs-5 me-5 " aria-selected="false" role="tab"
                                        tabindex="-1">
                                        Completed
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="completed" role="tabpanel">
                                    <div class="row g-4 mt-0">
                                        @foreach ($completed_project as $key => $item)
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div
                                                class="card property border-0 shadow position-relative overflow-hidden rounded-3">

                                                <div
                                                    class="property-image position-relative overflow-hidden shadow">
                                                    <img src="{{ asset($item->property_thumbnail ?? null) }}"
                                                        class="img-fluid" alt="{{ $item->property_name }}_Image"
                                                        style="width: 100%;height:300px">
                                                </div>
                                                <div class="card-body content p-2" style="
    height: 273px;
">
                                                    <a href="{{ route('completed.project.details', $item->id) }}"
                                                        class="title  text-dark fw-medium">
                                                        <h4 class="text-center fs-4 text-success fw-bold">
                                                            {{ $item->property_name }}
                                                        </h4>
                                                    </a>
                                                    <p class="text-center" style="font-size: 18px"><i
                                                            class="fa-solid fa-location-dot text-success"></i>
                                                        {{ $item->location_eng }}
                                                    </p>
                                                    @if ($item->property_mood == 'sqr feet')
                                                    <ul
                                                        class="list-unstyled mb-0 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                                        <li class="d-flex align-items-center me-3">
                                                            <i
                                                                class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                                            <span
                                                                class="text-muted">{{ $item->property_size }}
                                                                SQFT</span>
                                                        </li>

                                                        <li class="d-flex align-items-center me-3">
                                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->rooms }}
                                                                Beds</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i
                                                                class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->bathrooms }}
                                                                Baths</span>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled  mt-2 mb-0">
                                                        <li
                                                            class="list-inline-item mb-0 d-flex justify-content-center">
                                                            <div>

                                                                <span class="fw-mediumtext-muted">Offer Price:
                                                                    &#2547; {{ $item->discount }} / per
                                                                    Sqft</span>
                                                                <p class="fw-medium mb-0"
                                                                    style="font-size: smaller;">Regular Price:
                                                                    &#2547; <del>{{ $item->price }} / per
                                                                        Sqft</del></p>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                                class="btn btn-sm btn-primary me-2"
                                                                style="font-size: 14px">Call</a>
                                                            <a href="{{ route('contact.us') }}"
                                                                class="btn btn-sm btn-success"
                                                                style="font-size: 14px">Email</a>
                                                        </li>

                                                    </ul>
                                                    @else
                                                    <ul class="list-unstyled  mt-2 mb-0">
                                                        <li
                                                            class="list-inline-item mb-0 d-flex justify-content-center">
                                                            <div>

                                                                <span class="fw-mediumtext-muted">Offer Price:
                                                                    &#2547; {{ $item->discount }} / per
                                                                    Katha</span>
                                                                <p class="fw-medium mb-0"
                                                                    style="font-size: smaller;">Regular Price:
                                                                    &#2547; <del>{{ $item->price }} / per
                                                                        Katha</del></p>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                                class="btn btn-sm btn-primary me-2"
                                                                style="font-size: 14px">Call</a>
                                                            <a href="{{ route('contact.us') }}"
                                                                class="btn btn-sm btn-success"
                                                                style="font-size: 14px">Email</a>
                                                        </li>

                                                    </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end items-->
                                        </div>
                                        <!--end col-->
                                        @endforeach
                                        <div class="col-12 mt-4 pt-2">
                                            <div class="text-center">
                                                <a href="{{ route('all.project.list') }}"
                                                    class="mt-3 fs-6 text-primary">View More Properties <i
                                                        class="mdi mdi-arrow-right align-middle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                                <div class="tab-pane show" id="ongoing" role="tabpanel">
                                    <div class="row g-4 mt-0">
                                        @foreach ($ongoing_project as $key => $item)
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div
                                                class="card property border-0 shadow position-relative overflow-hidden rounded-3">

                                                <div
                                                    class="property-image position-relative overflow-hidden shadow">
                                                    <img src="{{ asset($item->property_thumbnail ?? null) }}"
                                                        class="img-fluid" alt="{{ $item->property_name }}_Image"
                                                        style="width: 100%;height:300px">
                                                </div>
                                                <div class="card-body content p-2" style="
    height: 273px;
">
                                                    <a href="{{ route('completed.project.details', $item->id) }}"
                                                        class="title  text-dark fw-medium">
                                                        <h4 class="text-center fs-4 text-success fw-bold">
                                                            {{ $item->property_name }}
                                                        </h4>
                                                    </a>
                                                    <p class="text-center" style="font-size: 18px"><i
                                                            class="fa-solid fa-location-dot text-success"></i>
                                                        {{ $item->location_eng }}
                                                    </p>

                                                    @if ($item->property_mood == 'sqr feet')
                                                    <ul
                                                        class="list-unstyled mb-0 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                                        <li class="d-flex align-items-center me-3">
                                                            <i
                                                                class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                                            <span
                                                                class="text-muted">{{ $item->property_size }}
                                                                SQFT</span>
                                                        </li>

                                                        <li class="d-flex align-items-center me-3">
                                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->rooms }}
                                                                Beds</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i
                                                                class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->bathrooms }}
                                                                Baths</span>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled  mt-2 mb-0">
                                                        <li
                                                            class="list-inline-item mb-0 d-flex justify-content-center">

                                                            <div>
                                                                <span class="fw-mediumtext-muted">Offer Price:
                                                                    &#2547; {{ $item->discount }} / per
                                                                    Sqft</span>
                                                                <p class="fw-medium mb-0"
                                                                    style="font-size: smaller;">Regular Price:
                                                                    &#2547; <del>{{ $item->price }} / per
                                                                        Sqft</del></p>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                                class="btn btn-sm btn-primary me-2"
                                                                style="font-size: 14px">Call</a>
                                                            <a href="{{ route('contact.us') }}"
                                                                class="btn btn-sm btn-success"
                                                                style="font-size: 14px">Email</a>
                                                        </li>

                                                    </ul>
                                                    @else
                                                    <ul class="list-unstyled  mt-2 mb-0">
                                                        <li
                                                            class="list-inline-item mb-0 d-flex justify-content-center">
                                                            <div>

                                                                <span class="fw-mediumtext-muted">Offer Price:
                                                                    &#2547; {{ $item->discount }} / per
                                                                    Katha</span>
                                                                <p class="fw-medium mb-0"
                                                                    style="font-size: smaller;">Regular Price:
                                                                    &#2547; <del>{{ $item->price }} / per
                                                                        Katha</del></p>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                                class="btn btn-sm btn-primary me-2"
                                                                style="font-size: 14px">Call</a>
                                                            <a href="{{ route('contact.us') }}"
                                                                class="btn btn-sm btn-success"
                                                                style="font-size: 14px">Email</a>
                                                        </li>

                                                    </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end items-->
                                        </div>
                                        <!--end col-->
                                        @endforeach

                                    </div>
                                    <!--end row-->
                                </div>
                                <div class="tab-pane" id="upcomming" role="tabpanel">
                                    <div class="row g-4 mt-0">
                                        @foreach ($upcomming_project as $key => $item)
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div
                                                class="card property border-0 shadow position-relative overflow-hidden rounded-3">

                                                <div
                                                    class="property-image position-relative overflow-hidden shadow">
                                                    <img src="{{ asset($item->property_thumbnail ?? null) }}"
                                                        class="img-fluid" alt="{{ $item->property_name }}_Image"
                                                        style="width: 100%;height:300px">
                                                </div>
                                                <div class="card-body content p-2" style="
    height: 273px;
">
                                                    <a href="{{ route('completed.project.details', $item->id) }}"
                                                        class="title  text-dark fw-medium">
                                                        <h4 class="text-center fs-4 text-success fw-bold">
                                                            {{ $item->property_name }}
                                                        </h4>
                                                    </a>
                                                    <p class="text-center" style="font-size: 18px"><i
                                                            class="fa-solid fa-location-dot text-success"></i>
                                                        {{ $item->location_eng }}
                                                    </p>
                                                    @if ($item->property_mood == 'sqr feet')
                                                    <ul
                                                        class="list-unstyled  py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                                        <li class="d-flex align-items-center me-3">
                                                            <i
                                                                class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                                            <span
                                                                class="text-muted">{{ $item->property_size }}
                                                                SQFT</span>
                                                        </li>

                                                        <li class="d-flex align-items-center me-3">
                                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->rooms }}
                                                                Beds</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i
                                                                class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->bathrooms }}
                                                                Baths</span>
                                                        </li>
                                                    </ul>
                                                    @endif
                                                    <ul class="list-unstyled  mt-2 mb-0">
                                                        <li
                                                            class="list-inline-item mb-0 d-flex justify-content-center">

                                                            <div>
                                                                <span class="fw-mediumtext-muted">Offer Price:
                                                                    &#2547; {{ $item->discount }}</span>
                                                                <p class="fw-medium mb-0"
                                                                    style="font-size: smaller;">Regular Price:
                                                                    &#2547;<del>{{ $item->price }}</del></p>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-inline-item mb-0 mt-3 d-flex justify-content-center">
                                                            <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                                class="btn btn-sm btn-primary me-2"
                                                                style="font-size: 14px">Call</a>
                                                            <a href="{{ route('contact.us') }}"
                                                                class="btn btn-sm btn-success"
                                                                style="font-size: 14px">Email</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!--end items-->
                                        </div>
                                        <!--end col-->
                                        @endforeach

                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col -->
            </div>

        </div>
        <!--end container-->
        {{-- various projects start --}}
        <section class="section">

            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="row g-4">
                            @foreach ($video_gallery as $item)
                            <div class="col-lg-6">
                                <div class="card" style="">
                                    <iframe width="100%" height="350"
                                        src="https://www.youtube.com/embed/{{ $item->video_link }}">
                                    </iframe>

                                </div>

                            </div><!--end col-->
                            @endforeach

                        </div><!--end row-->


                    </div>


                </div>
            </div><!--end container-->
        </section><!--end section-->



        <div class="container-fluid mt-100 mt-60 py-5" style="background:#F8F8F8;">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title text-primary mb-3">Sister Concern Of AJ Group</h4>

                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="container">
                <div class="row g-4 mt-0">
                    @foreach ($sponsors as $item)
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="card team team-primary text-center py-3">
                            <div
                                class="card-img team-image d-inline-block mx-auto rounded-pill avatar avatar-ex-large overflow-hidden">
                                <img src="{{ asset($item->image ?? null) }}" class="img-fluid"
                                    alt="Broker_image">
                                <div class="card-overlay avatar avatar-ex-large rounded-pill"></div>


                            </div>


                        </div>
                    </div><!--end col-->
                    @endforeach

                </div><!--end row-->
            </div><!--end container-->
        </div><!--end container-fluid -->





        {{-- Faq start --}}
        <div class="container-fluid mt-100 mt-60 py-5" style="background:#F8F8F8;">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title text-primary mb-3">Your Questions, Answered</h4>
                        <p class="para-desc mb-0 mx-auto" style="text-align: justify;">Dive into our FAQ section to
                            find answers to common inquiries about AJ Group, our projects, and services. Have a question
                            that's not covered? Don't hesitate to reach out – we're here to assist you!</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row" style="width: 90%;margin:auto">

                <div class="col-12 mt-4 mb-4">
                    @foreach ($faqs as $faq)
                    <button class="accordion">{{ $faq->faq_question }}</button>
                    <div class="panel">
                        <p>{{ $faq->faq_ans }}</p>
                    </div>
                    @endforeach
                    <!--<button class="accordion">Uncompromised Safety</button>-->
                    <!--<div class="panel">-->
                    <!--  <p>We design and develop buildings in line with the compliance guidelines stated in the National Building Code. We never deviate from the standards and best practices in the industry for providing safe addresses to our esteemed clients. Therefore, our buildings are capable of withstanding the code-specified natural forces like earthquakes.</p>-->
                    <!--</div>-->

                    <!--<button class="accordion">Best Construction Materials</button>-->
                    <!--<div class="panel">-->
                    <!--  <p>As a committed real estate company, we never compromise with the quality of construction materials. We assure that price hike or any other situation in the market don’t make us deviate from materials quality. Since we use the best materials, our buildings become stronger, more sustainable without harming the environment to a significant extent.</p>-->
                    <!--</div>-->
                    <!--<button class="accordion">On-Time Delivery</button>-->
                    <!--<div class="panel">-->
                    <!--  <p>On-time delivery is one of our motos while dealing in real estate business. We are always committed to satisfying you with on-time delivery service.</p>-->
                    <!--</div>-->
                    <!--<button class="accordion">World-Class Consultants</button>-->
                    <!--<div class="panel">-->
                    <!--  <p>We are endowed with world-class real estate consultants who ensure the best service in the domain.</p>-->
                    <!--</div>-->
                    <!--<button class="accordion">Prestigious Landmarks</button>-->
                    <!--<div class="panel">-->
                    <!--  <p>Since the very beginning, Assure Group has been passing many prestigious landmarks. One of the biggest landmarks that we have touched is evolving as a trusted real estate development company in Bangladesh.</p>-->
                    <!--</div>-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        {{-- Faq end --}}


        {{-- testimonial start --}}
        <div class="container-fluid mt-100 mt-60 py-5">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title text-primary mb-3">Client's Testmonial</h4>
                        <p class="para-desc mb-0 mx-auto">Discover the unparalleled quality and dedication through the
                            experiences of our satisfied clients at AJ Group</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row" style="width: 90%;margin:auto">
                <div class="col-12 mt-4">
                    <div class="tiny-three-item">
                        @foreach ($testimonials as $key => $item)
                        <div class="tiny-slider client-testi">
                            <div class="card border-0 bg-white">
                                <div class="card-body p-4 rounded-3 shadow m-2">
                                    <i
                                        class="mdi mdi-format-quote-open display-1 text-primary opacity-25 position-absolute end-0 top-0"></i>

                                    <div class="d-flex">
                                        <img src="{{ asset($item->image ?? null) }}"
                                            class="avatar avatar-md-sm rounded-circle shadow-md" alt="">
                                        <div class="flex-1 ms-3">
                                            <h6 class="mb-0">{{ $item->name_english }}</h6>
                                            <small class="text-muted">{{ $item->desig_eng }}</small>
                                        </div>
                                    </div>

                                    <p class="text-muted fst-italic mb-0 mt-4"> {!! $item->review_eng !!} </p>

                                    <ul class="list-unstyled mb-0 mt-3 text-warning h5">
                                        @for ($i = 0; $i < $item->star; $i++)
                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                            @endfor
                                    </ul>


                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        {{-- testimonial end --}}








        <div class="container mt-100 mt-60 py-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title text-primary mb-3">Have a question, inquiry, or simply want to get in touch?
                        </h4>
                        <p class="para-desc mb-0 mx-auto" style="text-align: justify;">We're here to assist you every
                            step of the way. Whether you're looking for more information about our projects, have
                            queries about our services, or want to explore partnership opportunities, our dedicated team
                            is ready to help. Simply fill out the form below, and we'll get back to you promptly. Your
                            satisfaction is our priority, and we look forward to hearing from you soon!</p>
                        <div class="mt-4 pt-2">
                            <a href="{{ route('contact.us') }}" class="btn btn-pills btn-primary"><span
                                    class="h5 mb-0 me-1"><i data-feather="mail" class="fea icon-sm"></i></span>
                                Contact us</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <!-- Footer Start -->
    @include('frontend.includes.footer')
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i
            data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
    <!-- Back to top -->

    <!-- JAVASCRIPTS -->
    @include('frontend.includes.script')

    {{-- faq js --}}
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>
</body>


</html>