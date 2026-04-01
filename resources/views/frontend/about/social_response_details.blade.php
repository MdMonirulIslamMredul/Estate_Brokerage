@extends('frontend.layout')
@section('title') Social Response @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($social_detials->banner_image) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">{{ $social_detials->title_english }}</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        
    </div><!--end container-->
</section><!--end section-->

<!-- Hero End -->

<!-- Start -->
<section class="section mb-5 pb-5">
    

    <div class="container-fluid"  style="background: #F8F8F8;margin-top:-45px">
        <div class="container">
            <div class="row g-4 mt-0">
                <div class="row mb-5">
                    <div class="col-md-12 col-lg-12 text-center">
                        <h1 class="">Socail Responsibility</h1>
                        <h4>{{ $social_detials->title_english }}</h4>
                        <hr style="
                                border-top:3px solid #17A84C;
                                width:100px;margin:auto;
                                opacity:1;margin-top:-15px;
                                border-radius: 2px;" >
                    </div>
                </div>
            </div>
            
            <div class="row text-center">
                <div class="col-md-12 col-lg-12" style="background: ">
                    {!! $social_detials->short_des_eng !!}
                </div>
            </div>
        </div><!--end container-->
    </div>

   <div class="container-fluid py-5" style="background: white">
        <div class="container" >
            <div class="row g-4 mt-0">
                <div class="col-md-12 col-lg-12" style="background: ">
                    {!! $social_detials->long_des1_eng !!}
                </div>
            </div>
        </div>
   </div>

   <div class="container-fluid py-5" style="background: #F8F8F8">
        <div class="container" >
            <div class="row g-4 mt-0">
                <div class="col-md-6 col-lg-6" style="background: ">
                    {!! $social_detials->long_des2_eng !!}
                </div>
                <div class="col-md-6 col-lg-6" >
                    <div class="">
                        <img src="{{ asset($social_detials->main_image) }}" alt="">
                    </div>
                </div>                
            </div>
            <div class="row g-4 mt-5 text-center">
                <div class="col-md-4 col-lg-4">
                    <div class="card" style="">
                        <img src="{{ asset($social_detials->details_image2) }}" class="" alt="Image" style="width: 100%">
                      </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card" style="">
                        <img src="{{ asset($social_detials->details_image3) }}" class="" alt="Image" style="width: 100%">
                      </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card" style="">
                        <img src="{{ asset($social_detials->details_image4) }}" class="" alt="Image" style="width: 100%">
                      </div>
                </div>
            </div>
        </div>
   </div>

   <div class="container-fluid py-5" style="background: white">
    <div class="container" >
        <div class="row g-4 mt-0">
            <div class="col-md-6 col-lg-6" style="background: ">
                {!! $social_detials->long_des3_eng !!}
            </div>
            <div class="col-md-6 col-lg-6" >
                <div class="">
                    <img src="{{ asset($social_detials->details_image1) }}" alt="">
                </div>
            </div>                
        </div>
    </div>
</div>
</section><!--end section-->
<!-- End -->









@endsection