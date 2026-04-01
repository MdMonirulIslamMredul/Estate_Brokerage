@extends('frontend.layout')
@section('title') News @endsection
@section('content')

 <!-- Hero Start -->
 <section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Property News</h5>
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
<section class="section">
    

    <div class="container">
        <div class="row g-4 mt-0">
            @foreach($blogs as $item)
            <div class="col-lg-12 col-12">
                <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                    <div class="d-md-flex">
                        <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                            <img src="{{ asset($item->main_image ?? null) }}" class="img-fluid h-100 w-100" alt="{{ $item->title_english }}_image">                           
                        </div>
                        <div class="p-4">
                          <a style="font-size:24px !important;" href="{{ route('news.details',$item->id) }}"  class="title fw-medium  text-dark">{{ $item->title_english }}</a>
                            <p class="text-muted mt-2">{!! $item->short_des_eng !!}</p>

                            <a href="{{ route('news.details',$item->id) }}" class="text-dark read-more">Read More <i class="mdi mdi-chevron-right align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end items-->
            </div><!--end col-->
            @endforeach          

        <div class="row">
            <div class="col-12 mt-4 pt-2">
                <ul class="pagination justify-content-center mb-0">
                   {{ $blogs->links() }}
                </ul>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->








@endsection