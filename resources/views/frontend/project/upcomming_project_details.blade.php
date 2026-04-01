@extends('frontend.layout')
@section('title') {{ $upcomming->title_english }} @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null ) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">{{ $upcomming->title_english }}</h5>
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

<!-- Start -->
<section class="section mb-5">
    

    <div class="container">
        <div class="row g-4 mt-0">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">{{ $upcomming->title_english }}</h1>
                    <hr style="
                            border-top:3px solid #17A84C;
                            width:100px;margin:auto;
                            opacity:1;margin-top:-15px;
                            border-radius: 2px;" >
                </div>
            </div>
               
            <div class="row py-3">
                <div class="col-md-12 ">
                    <img src="{{ asset($upcomming->main_image ?? null ) }}" class="img-fluid img-thumbnail rounded d-block m-auto"  alt="{{ $upcomming->title_english }}_Image ">
                    <p class="py-3">{!! $upcomming->short_des_eng !!}</p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <img src="{{ asset($upcomming->details_image1 ?? null) }}" class="img-fluid img-thumbnail rounded "  alt="{{ $upcomming->title_english }}_Image" style="width: 100%;height:700px">
                </div>
               
            </div>
            <div class="row py-3">
                <div class="col-md-12">
                   {!! $upcomming->long_des_eng !!}
                </div>
                
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-md-12">
                    <img src="{{ asset($upcomming->details_image2 ?? null ) }}" class="img-fluid img-thumbnail rounded "  alt="{{ $upcomming->title_english }}_Image" style="width: 100%;height:700px">
                </div>
               
            </div>
        
    </div><!--end container-->
</section><!--end section-->
<!-- End -->









@endsection