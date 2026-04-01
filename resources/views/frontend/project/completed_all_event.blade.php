@extends('frontend.layout')
@section('title') Complete Project @endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- Hero Start -->
  <section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">                   
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Completed Project</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="position-middle-bottom">
            <nav aria-label="breadcrumb" class="d-block">
                <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page" style="color:#9FA5AC">Media</li>
                    <li class="breadcrumb-item active" aria-current="page">Project</li>
                </ul>
            </nav>
        </div>
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
<section class="section" >
    

    <div class="container-fluid py-5" style="background:#F8F8F8;">
        <div class="row justify-content-center">
            <div class="col">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title text-primary mb-3 ">Completed Project</h4>
                    <h1>Luxurious Property for Sale in Dhaka, Bangladesh</h1>
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >

                   
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row g-4 mt-0" style="width:90%;margin:auto">
            @foreach($completed_project as $key => $item)
            <div class="col-lg-3 col-md-3 col-12">
                <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                    <div class="property-image position-relative overflow-hidden shadow">
                        <img src="{{ asset($item->main_image ?? null ) }}" class="img-fluid" alt="{{ $item->title_english }}_Image">
                        <ul class="list-unstyled property-icon">
                            <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                            <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                            <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                        </ul>
                    </div>

                    <div class="card-body content p-4">
                        <a href="{{ route('completed.project.details',$item->id) }}" class="title fs-5 text-dark fw-medium">{{ $item->title_english }}</a>

                        <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                            <li class="d-flex align-items-center me-3">
                                <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                <span class="text-muted">8000sqf</span>
                            </li>

                            <li class="d-flex align-items-center me-3">
                                <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                <span class="text-muted">4 Beds</span>
                            </li>

                            <li class="d-flex align-items-center">
                                <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                <span class="text-muted">4 Baths</span>
                            </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                            <li class="list-inline-item mb-0">
                                <span class="text-muted">Price</span>
                                <p class="fw-medium mb-0">$5000</p>
                            </li>
                            <li class="list-inline-item mb-0 text-muted">
                                <span class="text-muted">Rating</span>
                                <ul class="fw-medium text-warning list-unstyled mb-0">
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!--end items-->
            </div><!--end col-->
            @endforeach

           
        </div><!--end row-->
    </div><!--end container-->


</section><!--end section-->
<!-- End -->




@endsection