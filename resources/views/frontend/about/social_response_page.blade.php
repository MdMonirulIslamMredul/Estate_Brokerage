@extends('frontend.layout')
@section('title') Social Response @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null ) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Social Responcibility</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        
    </div><!--end container-->
</section><!--end section-->

<!-- Hero End -->

<!-- Start -->
<section class="section mb-5 pb-5" style="background: #F8F8F8">
    

    <div class="container">
        <div class="row g-4 mt-0">
            <div class="row mb-5">
                <div class="col-md-12 col-lg-12 text-center">
                    <h1 class="">Socail Responsibility</h1>
                    <hr style="
                            border-top:3px solid #17A84C;
                            width:100px;margin:auto;
                            opacity:1;margin-top:-15px;
                            border-radius: 2px;" >
                </div>
              
            </div>
        </div>
        
        <div class="row">
            @foreach($social as $item)
            <div class="col-md-4 col-lg-4">
                <div class="card " style="background:#FFFFFF">
                    <img src="{{ asset($item->main_image) }}" class="card-img-top" alt="Main Image" style="width: 100%;height:450px;">
                    <div class="card-body text-center">
                      <p class="text-success fs-5 fw-bold">{{ $item->title_english }}</p>
                      
                      <a href="{{ route('social.response.details',$item->id) }}" class="btn btn-success">Details</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
            
        
    </div><!--end container-->
</section><!--end section-->
<!-- End -->









@endsection