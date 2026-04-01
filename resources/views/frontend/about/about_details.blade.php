@extends('frontend.layout')
@section('title')
    About
@endsection
@section('content')
    <!-- Hero Start -->
    <style>
        :root {
            --brand: #f08121;
        }

        .accent-hr {
            border-top: 3px solid var(--brand);
            width: 100px;
            margin: auto;
            opacity: 1;
            margin-top: -15px;
            border-radius: 2px;
        }

        .modern-heading h5,
        .modern-heading h1 {
            color: var(--brand);
        }

        .about-image {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            object-fit: cover;
        }

        .cta {
            background: linear-gradient(90deg, var(--brand), #e96b15);
            color: #fff;
            border-radius: 999px;
            padding: .6rem 1.2rem;
            display: inline-block;
            text-decoration: none;
            box-shadow: 0 6px 18px rgba(240, 129, 33, 0.25);
            border: none
        }

        @media(min-width:992px) {
            .about-image {
                height: 360px
            }
        }
    </style>
    <section class="bg-half-170 d-table w-100 modern-hero"
        style="background: url({{ asset($about->banner_image ?? null) }});background-size:cover;background-position:center;">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <div class="modern-heading">
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">About Us</h5>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

        </div><!--end container-->
    </section><!--end section-->


    <!-- Hero End -->

    <!-- Start -->
    <section class="section mb-5">


        <div class="container">
            <div class="row g-4 mt-0">
                <div class="row mb-5">
                    <div class="col-md-12 text-center">
                        <h3 class="">{{ $about->title_english }}</h3>
                        <h1>{{ $about->short_title_english }}</h1>
                        <hr class="accent-hr">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        {!! $about->details_1_eng !!}
                    </div>

                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <img src="{{ asset($about->main_image ?? null) }}" class="img-fluid about-image"
                            alt="Profile_image">
                    </div>
                    <div class="col-md-6">
                        {!! $about->details_2_eng !!}
                    </div>

                </div>
                <div class="row mt-5">

                    <hr class="accent-hr">

                    <div class="col-md-12 mt-3">
                        {!! $about->details_3_eng !!}
                    </div>

                </div>











            </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
