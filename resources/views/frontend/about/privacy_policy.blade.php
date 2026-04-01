@extends('frontend.layout')
@section('title') Privacy Policy @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($policy->banner_image ?? null ) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Privacy Policy</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        
    </div><!--end container-->
    {{-- <div class="container">
        <nav class="d-flex">
            <ul class=" d-flex text-white">
                <li class=""><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                <li class=""><a href="#">Corporate</a></li>
                <li class=""><a href="#">Meet The Team</a></li>
                <li class="active"><em>Chairman</em></li>
            </ul>
        </nav>
    </div> --}}
</section><!--end section-->

<!-- Hero End -->

<!-- Start -->



<section class="section">
    
   <div class="container-fluid">
        <div class="row justify-content-center pt-5" style="margin-top: -45px">
            <div class="col">
                <div class="section-title text-center mb-4 pb-2">
                    <h1 class="title text-primary mb-3 ">Client Security is our First Priority </h1>                    
                    
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >
                </div>
            </div><!--end col-->
        </div><!--end row-->
        {{-- owner information start --}}

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div>{!! $policy->short_des !!}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div>{!! $policy->short_des2 !!}</div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div><img src="{{ asset($policy->image1) }}" alt=""></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div>{!! $policy->long_des !!}</div>
                </div>
            </div>
        </div>
       

    
   </div>
   
</section><!--end section-->
<!-- End -->









@endsection