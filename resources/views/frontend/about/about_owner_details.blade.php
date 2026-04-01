@extends('frontend.layout')
@section('title') Owner Info @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null ) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Owner Information</h5>
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
<section class="section mb-5">
    <div class="container">
            <div class="mt-5" style="">
                <div class="row">
                    <div class="col-md-6 col-lg-6 ">
                        <div class="">
                            <img src="{{ asset($owner->profile_image) }}" alt="" style="width: 100%">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <h1>{{ $owner->name }}</h1>
                        <div class="d-flex justify-content-between">
                            <h5>{{ $owner->designation }}</h5>
                            <div class="p-3">
                                <a href="{{ $owner->facebook }}" class="p-2" style="background:green;border-radius:0px 0px 0px 5px;font-size:12px"><i class="fa-brands fa-facebook-f text-white"></i></a>
                                <a href="{{ $owner->instagram }}" class="p-2" style="background:green;border-radius:0px 0px 0px 5px;font-size:12px"><i class="fa-brands fa-instagram text-white"></i></a>
                                <a href="{{ $owner->twitter }}" class="p-2" style="background:green;border-radius:0px 0px 0px 5px;font-size:12px"><i class="fa-brands fa-x-twitter text-white"></i></a>
                                <a href="{{ $owner->linkedin }}" class="p-2" style="background:green;border-radius:0px 0px 0px 5px;font-size:12px"><i class="fa-brands fa-linkedin text-white"></i></a>
                            </div>
                        </div>
                        <div>
                            {!! $owner->long_des !!}
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-12 col-lg-12">
                        <h1>{{ $owner->name }} of {{ $owner->designation }}</h1>
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >
                    </div>
                    <div class="mt-5"></div>
                    {{-- gallery image start --}}
                    <div class="col-md-4 col-lg-4"><img src="{{ asset($owner->image_1) }}" alt="" style="width:99%;height:99%"></div>
                    <div class="col-md-4 col-lg-4"><img src="{{ asset($owner->image_2) }}" alt="" style="width:99%;height:99%"></div>
                    <div class="col-md-4 col-lg-4"><img src="{{ asset($owner->image_3) }}" alt="" style="width:99%;height:99%"></div>
                   <h1></h1>
                    <div class="col-md-4 col-lg-4"><img src="{{ asset($owner->image_4) }}" alt="" style="width:99%;height:99%"></div>
                    <div class="col-md-4 col-lg-4"><img src="{{ asset($owner->image_5) }}" alt="" style="width:99%;height:99%"></div>
                    <div class="col-md-4 col-lg-4"><img src="{{ asset($owner->image_6) }}" alt="" style="width:99%;height:99%"></div>
                     {{-- gallery image end --}}
                </div>
            </div>
        
    </div><!--end container-->



</section><!--end section-->
<!-- End -->









@endsection