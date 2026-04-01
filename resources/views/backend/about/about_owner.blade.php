@extends('admin_dashboard')
@section('title') Owner Setting @endsection
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                       
                    </div>
                    <h4 class="page-title">Owner Setting</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Owner Information</p>

                        <form id="myForm" method="post" action="{{ route('owner.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                  
                                <div class="col-lg-6">                      
                                    <div class="form-group mb-3">
                                        <label for="simpleinput" class="form-label">Owner Name </label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Owner Name..." value="{{ $about->name??'' }}">
                                    </div>
                                </div>    
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Designation </label>
                                        <input type="text" id="designation" name="designation" class="form-control" placeholder="Designation ..." value="{{ $about->designation??'' }}">
                                    </div>
                                </div> 

                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="profile_image" class="form-label">Profile Image(680x460)</label>
                                        <input type="file" id="profile_image" name="profile_image" class="form-control" >
                                    </div>
                                    @if($about->profile_image??null)
                                    <img src="{{ asset($about->profile_image) }}" alt="" id="profile_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="profile_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Banner Image(1920x920)</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($about->banner_image) ? asset($about->banner_image ?? null) : url('upload/no_image.jpg')) }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                </div>  
                                <div class="col-lg-2 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="image_1" class="form-label">Image-1 (450x280)</label>
                                        <input type="file" id="image_1" name="image_1" class="form-control" >
                                    </div>
                                    @if($about->image_1??null)
                                    <img src="{{ asset($about->image_1) }}" alt="" id="image_1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image_1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                </div>                                
                                <div class="col-lg-2 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="image_2" class="form-label">Image-2 (450x280)</label>
                                        <input type="file" id="image_2" name="image_2" class="form-control" >
                                    </div>
                                    @if($about->image_2??null)
                                    <img src="{{ asset($about->image_2) }}" alt="" id="image_2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image_2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                </div>                                
                                <div class="col-lg-2 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="image_3" class="form-label">Image-3 (450x280)</label>
                                        <input type="file" id="image_3" name="image_3" class="form-control" >
                                    </div>
                                    @if($about->image_3??null)
                                    <img src="{{ asset($about->image_3) }}" alt="" id="image_3_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image_3_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                </div>                                
                                <div class="col-lg-2 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="image_4" class="form-label">Image-4 (450x280)</label>
                                        <input type="file" id="image_4" name="image_4" class="form-control" >
                                    </div>
                                    @if($about->image_4??null)
                                    <img src="{{ asset($about->image_4) }}" alt="" id="image_4_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image_4_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                </div>                                
                                <div class="col-lg-2 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="image_5" class="form-label">Image-5 (450x280)</label>
                                        <input type="file" id="image_5" name="image_5" class="form-control" >
                                    </div>
                                    @if($about->image_5??null)
                                    <img src="{{ asset($about->image_5) }}" alt="" id="image_5_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image_5_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                </div>  
                                <div class="col-lg-2 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="image_6" class="form-label">Image-5 (450x280)</label>
                                        <input type="file" id="image_6" name="image_6" class="form-control" >
                                    </div>
                                    @if($about->image_6??null)
                                    <img src="{{ asset($about->image_6) }}" alt="" id="image_6_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image_6_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                </div>  
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="short_des" class="form-label">Short Description</label>                                            
                                        <textarea id="tinymce" class="editor form-control" col="10" row="10" name="short_des" placeholder="Short Description...">
                                            {!! $about->short_des??'' !!}
                                        </textarea>                         
                                    </div>                                             
                                </div>  
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="long_des" class="form-label">Long Description</label>                                            
                                        <textarea id="tinymce" class="editor form-control" col="10" row="10" name="long_des" placeholder="Long Description...">
                                            {!! $about->long_des??'' !!}
                                        </textarea>                         
                                    </div>                                             
                                </div>  
                                <div class="col-lg-6 mt-2">                      
                                    <div class="form-group mb-3">
                                        <label for="phone" class="form-label">Phone Number </label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="phone..." value="{{ $about->phone??'' }}">
                                    </div>
                                </div>    
                                <div class="col-lg-6 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Facebook </label>
                                        <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Facebook..." value="{{ $about->facebook??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Instagram </label>
                                        <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Instagram..." value="{{ $about->instagram??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">LinkedIn </label>
                                        <input type="text" id="linkedIn" name="linkedIn" class="form-control" placeholder="LinkedIn..." value="{{ $about->linkedIn??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Twitter</label>
                                        <input type="text" id="facebook" name="twitter" class="form-control" placeholder="Twitter..." value="{{ $about->twitter??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Telegram </label>
                                        <input type="text" id="telegram" name="telegram" class="form-control" placeholder="Telegram..." value="{{ $about->telegram??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Youtube </label>
                                        <input type="text" id="youtube" name="youtube" class="form-control" placeholder="Youtube..." value="{{ $about->youtube??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="website_link" class="form-label">Website link</label>
                                        <input type="text" id="website_link" name="website_link" class="form-control" placeholder="website link..." value="{{ $about->website_link??'' }}">
                                    </div>
                                </div> 

                            </div>
                            <!-- end row-->
                            <div class="text-center">
                            @if($about != true)
                                <button type="submit" class="btn btn-success waves-effect waves-light "><i class="mdi mdi-content-save"></i>Submit</button>
                            @else
                            <button type="submit" class="btn btn-success waves-effect waves-light "><i class="mdi mdi-content-save"></i>Update</button>
                            @endif
                            </div>
                        </form>
        
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
        
            </div><!-- end col -->
        </div>        
        <!-- end row -->

              
    </div> <!-- container -->

</div> <!-- content -->
       
        
        {{-- image view js  --}}
        <script>
            $(document).ready(function(){                
                $('#profile_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#profile_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#banner_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#banner_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });   
                $('#image_1').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_1_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });             
                $('#image_2').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_2_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });                
                $('#image_3').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_3_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });                
                $('#image_4').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_4_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });                
                $('#image_5').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_5_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });                
                $('#image_6').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_6_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });                
            });
        </script>
        
        {{-- js form validation rules --}}
       



@endsection