@extends('admin_dashboard')
@section('title') Dashboard @endsection
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
                        <ol class="breadcrumb m-0">
                            <a href="" class="btn btn-primary rounded-pill waves-effect waves-light">About Setting</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">About Setting</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">About Information</p>

                        <form id="myForm" method="post" action="{{ route('about.update.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                  
                                <div class="col-lg-6">                      
                                    <div class="form-group mb-3">
                                        <label for="simpleinput" class="form-label">About Title In English </label>
                                        <input type="text" name="title_english" id="title_english" class="form-control" placeholder="About Title In English..." value="{{ $about->title_english??'' }}">
                                    </div>
                                </div>    
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">About Title In Bangla </label>
                                        <input type="text" id="title_bangla" name="title_bangla" class="form-control" placeholder="About Title In Bangla ..." value="{{ $about->title_bangla??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6">                      
                                    <div class="form-group mb-3">
                                        <label for="simpleinput" class="form-label">About Short Title English </label>
                                        <input type="text" name="short_title_english" id="short_title_english" class="form-control" placeholder="About Title In English..." value="{{ $about->short_title_english??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6">                      
                                    <div class="form-group mb-3">
                                        <label for="simpleinput" class="form-label">About Short Bangla </label>
                                        <input type="text" name="short_title_bangla" id="short_title_bangla" class="form-control" placeholder="About Title In Bangla..." value="{{ $about->short_title_bangla??'' }}">
                                    </div>
                                </div> 
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="main_image" class="form-label">Profile Image(400x500)</label>
                                        <input type="file" id="profile_image" name="profile_image" class="form-control" >
                                    </div>
                                    @if($about->profile_image??null)
                                    <img src="{{ asset($about->profile_image) }}" alt="" id="profile_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="profile_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                     
                                </div>  
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="main_image" class="form-label">Main Image(400x500)</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control" >
                                    </div>
                                    @if($about->main_image??null)
                                    <img src="{{ asset($about->main_image) }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                     
                                </div>  
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Banner Image(1920x920)</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($about->banner_image) ? asset($about->banner_image ?? null) : url('upload/no_image.jpg')) }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>                                
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="about_info_image" class="form-label">About Information Image(1200x900)</label>
                                        <input type="file" id="about_info_image" name="about_info_image" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($about->about_info_image) ? asset($about->about_info_image ?? null) : url('upload/no_image.jpg')) }}" alt="" id="about_info_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>                                
                              
                                <p class="text-white my-3" style="font-size: 20px">About Details  Informantion</p>

                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="long_des1_eng" class="form-label">About Details-1 English</label>                                            
                                        <textarea id="tinymce" class="editor form-control" col="10" row="15" name="details_1_eng" placeholder="About Details-1 English">
                                            {!! $about->details_1_eng??'' !!}
                                        </textarea>
                                                                                
                                    </div>                                             
                                </div>  
                                <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="long_des1_bng" class="form-label">About Details-1 Bangla</label>
                                        <textarea name="details_1_bng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="About Details-1 Bangla...">
                                            {!! $about->details_1_bng??'' !!}
                                        </textarea> 
                                                  
                                    </div>                                   
                                </div> 
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="long_des2_eng" class="form-label">About Details-2 English</label>
                                        <textarea name="details_2_eng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="About Details-2 English ...">
                                            {!! $about->details_2_eng??'' !!}
                                        </textarea> 
                                      
                                    </div>         
                                                                  
                            </div>  
                            <div class="col-lg-12 mt-2"> 
                                <div class="form-group mb-3">
                                    <label for="long_des2_bng" class="form-label">About Details-2 Bangla</label>
                                    <textarea name="details_2_bng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="About Details-2 Bangla ...">
                                        {!! $about->details_2_bng??'' !!}
                                    </textarea> 
                                             
                                </div>                                   
                            </div> 
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="long_des2_eng" class="form-label">About Details-3 English</label>
                                        <textarea name="details_3_eng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="About Details-3 English ...">
                                            {!! $about->details_3_eng??'' !!}
                                        </textarea> 
                                      
                                    </div>         
                                                                  
                            </div>  
                            <div class="col-lg-12 mt-2"> 
                                <div class="form-group mb-3">
                                    <label for="long_des2_bng" class="form-label">About Details-3 Bangla</label>
                                    <textarea name="details_3_bng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="About Details-3 Bangla ...">
                                        {!! $about->details_3_bng??'' !!}
                                    </textarea> 
                                             
                                </div>                                   
                            </div>
                            
                            <p class="text-white my-3" style="font-size: 20px">Mission & Vission Setting</p>

                            <div class="col-lg-6"> 
                                <div class="form-group mb-3">
                                    <label for="mission_image" class="form-label">Mission Image(400x500)</label>
                                    <input type="file" id="mission_image" name="mission_image" class="form-control" >
                                </div>
                                @if($about->mission_image??null)
                                <img src="{{ asset($about->mission_image) }}" alt="" id="mission_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                @else
                                <img src="{{ url('upload/no_image.jpg') }}" alt="" id="mission_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                @endif                                 
                            </div>  
                            <div class="col-lg-6"> 
                                <div class="form-group mb-3">
                                    <label for="vission_image" class="form-label">Visssion Image(400x500)</label>
                                    <input type="file" id="vission_image" name="vission_image" class="form-control" >
                                </div>
                                @if($about->vission_image??null)
                                <img src="{{ asset($about->vission_image) }}" alt="" id="vission_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                @else
                                <img src="{{ url('upload/no_image.jpg') }}" alt="" id="vission_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                @endif                                 
                            </div>  
                            <div class="col-lg-6 mt-2"> 
                                <div class="form-group mb-3">
                                    <label for="mission_english" class="form-label">Mission English</label>
                                    <textarea name="mission_english" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Mission English ...">
                                        {!! $about->mission_english??'' !!}
                                    </textarea>                                              
                                </div>                                   
                            </div> 
                            <div class="col-lg-6 mt-2"> 
                                <div class="form-group mb-3">
                                    <label for="mission_bangla" class="form-label">Mission Bangla</label>
                                    <textarea name="mission_bangla" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Mission Bangla ...">
                                        {!! $about->mission_bangla??'' !!}
                                    </textarea>                                              
                                </div>                                   
                            </div> 
                            <div class="col-lg-6 mt-2"> 
                                <div class="form-group mb-3">
                                    <label for="vission_english" class="form-label">Vission English</label>
                                    <textarea name="vission_english" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Vission English ...">
                                        {!! $about->vission_english??'' !!}
                                    </textarea>                                              
                                </div>                                   
                            </div> 
                            <div class="col-lg-6 mt-2"> 
                                <div class="form-group mb-3">
                                    <label for="vission_bangla" class="form-label">Vission Bangla</label>
                                    <textarea name="vission_bangla" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Vission Bangla ...">
                                        {!! $about->vission_bangla??'' !!}
                                    </textarea>                                              
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
                $('#main_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#main_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
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
                $('#about_info_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#about_info_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });                
                $('#mission_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#mission_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });                
                $('#vission_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#vission_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });                
            });
        </script>
        
        {{-- js form validation rules --}}
       



@endsection