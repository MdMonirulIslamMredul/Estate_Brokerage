@extends('frontend.layout')
@section('title') Cetification @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null ) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Certifications</h5>
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
                    <h1 class="title text-primary mb-3 ">Our Cetifications</h1>
                    
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >

                   
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row g-4 mt-0" >
            @foreach($certificate as $key => $item)
           <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-body p-4 rounded-3 shadow m-2">
                       

                    <a href="{{ route('certificate.details',$item->id) }}">
                        <div class="row">
                            <div class="col-md-6">
                                 <img src="{{ asset($item->certificate_file ?? null) }}" class="avatar avatar-md-sm  shadow-md" alt="Certificate_File" style="width: 100%;height:100%; object-fit:cover;">
                            </div>
                            <div class="col-md-6">
                                  <div class="flex-1 ms-3">
                                <h6 class="mb-0" style="text-align: justify;" >{{ $item->title_english }}</h6>
                                <br>
                                <p class="text-muted" style="text-align: justify;">{{ $item->short_des_english }}</p>
                            </div>
                            </div>
                           
                          
                        </div>
                    </a>
                    
                   
                    
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