@extends('frontend.layout')
@section('title') Mission-Vission @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($about->banner_image ?? null ) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Mission And Vission</h5>
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
<section class="section mb-5 pb-5">
    

    <div class="container">
        <div class="row g-4 mt-0">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h1 class="">{{ $about->title_english }}</h1>
                    
                    <hr style="
                            border-top:3px solid #17A84C;
                            width:100px;margin:auto;
                            opacity:1;margin-top:-15px;
                            border-radius: 2px;" >
                </div>

            </div>

            <div class="row mt-5">
                  <div class="col-md-6">
                    <img src="{{ asset($about->mission_image ?? null ) }}" class="img-fluid img-thumbnail rounded "  alt="Mission_Image" style="width:100%;height:70%;">
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Our Mission</h3>
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >
                    <div class="mt-4"></div>
                    {!! $about->mission_english !!}
                </div>
              
            </div>
           
            <div class="row mt-5 py-5">
                <div class="col-md-6">
                    <img src="{{ asset($about->vission_image ?? null ) }}" class="img-fluid img-thumbnail rounded "  alt="Vission_image" style="width:100%;height:70%;">
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Our Vission</h3>
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >
                    <div class="mt-4"></div>
                    {!! $about->vission_english !!}
                </div>
               
            </div>
        
        
    </div><!--end container-->
</section><!--end section-->
<!-- End -->









@endsection