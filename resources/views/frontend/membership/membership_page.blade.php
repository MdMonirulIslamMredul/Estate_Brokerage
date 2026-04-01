@extends('frontend.layout')
@section('content')
{{-- toastr cdn --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    @php
        $links = App\Models\WebsiteLink::latest()->first();
    @endphp


  <!-- Content -->
  <div class="page-content">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url({{ asset($banner->banner_image) }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Membership</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Membership</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- contact area -->
    <div class="section-full content-inner-1 bg-white contact-style-1">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
               
                <!-- Left part start -->
                <div class="col-md-8">
                   
                    {{-- @if (session('message'))                    
                      <div class="alert alert-warning alert-dismissible" role="alert">                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{session('message')}}
                      </div>                      
                    @endif --}}
                    <div class="p-a30 bg-gray clearfix m-b30 ">
                        <h2 style="text-align: center">Take Our Membership</h2>
                        <div class="dzFormMsg"></div>
                        <form method="post" action="{{ route('membership.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="name_english" required type="text" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group"> 
                                            <input name="email" type="email" required class="form-control"  placeholder="Your Email Id" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="phone" type="text" required class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="fat_name_eng" type="text" required class="form-control" placeholder="Father's Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="occupation" type="text" required class="form-control" placeholder="Occupation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="reference" type="text" required class="form-control" placeholder="Reference">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="address_eng" type="text" required class="form-control" placeholder="Address Name">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="message_english" rows="4" class="form-control" required placeholder="Write Your Valuable Comment... "></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label for="image" class="text-muted">Your Image Here</label>
                                            <input type="file" id="image" name="image" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <img src="{{ url('upload/no_image.jpg') }}" alt="" id="showImg" class="avatar-lg img-circle" alt="profile-image" style="width: 120px;height:120px">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <button type="submit" value="Submit" class="site-button"> <span>Submit</span> </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Left part END -->
                <div class="col-md-2"></div>
               
            </div>
            
        </div>
    </div>
    <!-- contact area  END -->
</div>

<!-- Content END-->

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImg').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



@endsection