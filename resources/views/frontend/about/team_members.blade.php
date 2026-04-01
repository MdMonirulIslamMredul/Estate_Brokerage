@extends('frontend.layout')
@section('title') Team @endsection
@section('content')



<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null ) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Team Members</h5>
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
{{-- <div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div> --}}
<!-- Hero End -->

<!-- Start -->



<section class="section">
    
   <div class="container-fluid" style="background:#F8F8F8;">
        <div class="row justify-content-center pt-5" style="margin-top: -45px">
            <div class="col">
                <div class="section-title text-center mb-4 pb-2">
                    <!--<h1 class="title text-primary mb-3 ">Meet The Team of Aj Group</h1>-->
                    
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >
                </div>
            </div><!--end col-->
        </div><!--end row-->
        {{-- owner information start --}}
        @php
            $owner = App\Models\AboutOwner::latest()->first();
        @endphp
        <div class="mt-5" style="width:80%;margin:auto">
            <div class="row">
                <div class="col-md-12 col-lg-12 ">
                    
                </div>
                <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-3 col-lg-6">
                    <div class="text-center">
                        <img src="{{ asset($owner->profile_image) }}" style="height: 400px;
    width: 400px;" class="img-fluid" alt="">
    <br>
    <br>
                        <div>  <h3 style="margin-bottom: -0.5rem !important;">{{ $owner->name }}</h3></div>
                        <span>{{ $owner->designation }}</span>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-12 col-lg-12">
                  
               
                    <div>
                        <br>
                        <br>
                        {!! $owner->long_des !!}
                    </div>
                   
                </div>
            </div>
        </div>

    <div class="container text-center mt-20 mt-20 py-5" >
        <h1 class="text-center">Other Team Members</h1>
        <p class="text-center">Our Friendly and Collaboratable Team Members List. They can help you to find your charished destination.</p>
        <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >


         @for($i = 1; $i < 10; $i++)
         <div class="row g-4 mt-0 justify-content-md-center" style="width:90%;margin:auto">
            @foreach($teams as $item)            
            @if($item->committee == $i)
            <div class="col-lg-4 col-md-4 col-12 ">
                <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                    <div class="property-image position-relative overflow-hidden shadow">
                        <img src="{{ asset($item->image ?? null ) }}" class="img-fluid" alt="Team_Image">
                        <ul class="list-unstyled property-icon">
                            <li class=""><a href="{{ $item->facebook }}" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="facebook" class="icons"></i></a></li>
                            <li class="mt-1"><a href="{{ $item->twitter }}" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="twitter" class="icons"></i></a></li>
                            <li class="mt-1"><a href="{{ $item->instagram }}" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="instagram" class="icons"></i></a></li>
                            <li class="mt-1"><a href="{{ $item->linkedin }}" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="linkedin" class="icons"></i></a></li>
                        </ul>
                    </div>

                    <div class="card-body content p-4 text-center">
                        <span >{{ $item->name_english }}</span><br>
                        <a href="" class="title fs-5 text-dark fw-medium">{{ $item->desig_english }}</a>

                    </div>
                </div><!--end items-->
            </div><!--end col--> 
           
            @endif         
    
        @endforeach
        


        </div><!--end row-->
         @endfor
       

        
       


    </div><!--end container-->
   </div>
   
</section><!--end section-->
<!-- End -->









@endsection