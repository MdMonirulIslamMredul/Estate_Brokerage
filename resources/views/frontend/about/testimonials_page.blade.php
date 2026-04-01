@extends('frontend.layout')
@section('title') Testimonials @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Client Reivews</h5>
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
    
   <div class="container-fluid" style="background:#F8F8F8;">
    <div class="container mt-20 mt-20 py-5" >
        <div class="row justify-content-center">
            <div class="col">
                <div class="section-title text-center mb-4 pb-2">
                    <h1 class="title text-primary mb-3 ">What Our Client Say ?</h1>
                    
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >

                    <p class="text-muted para-desc mb-0 py-3 mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row g-4 mt-0" >
            @foreach($testimonials as $key => $item)
           <div class="col-md-6">
            <div class="card bg-white">
                <div class="card-body p-4 rounded-3 shadow m-2">
                        <i class="mdi mdi-format-quote-open display-1 text-primary opacity-25 position-absolute end-0 top-0"></i>

                    <div class="d-flex">
                        <img src="{{ asset($item->image ?? null ) }}" class="avatar avatar-md-sm rounded-circle shadow-md" alt="Image">
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0">{{ $item->name_english }}</h6>
                            <small class="text-muted">{{ $item->desig_eng }}</small>
                        </div>
                    </div>
                    
                    <p class="text-muted fst-italic mb-0 mt-4"> {!! $item->review_eng !!} </p>
                   
                    <ul class="list-unstyled mb-0 mt-3 text-warning h5">
                        @for($i = 0; $i < $item->star; $i++)
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        @endfor
                    </ul>
                    
                </div>
            </div>
           </div>
            @endforeach

           
        </div><!--end row-->
    </div><!--end container-->
   </div>
   
</section><!--end section-->
<!-- End -->









@endsection