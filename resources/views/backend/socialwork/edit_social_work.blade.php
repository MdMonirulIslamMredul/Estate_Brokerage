@extends('admin_dashboard')
@section('title') Social Work @endsection
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
                            <a href="{{ route('all.social.work') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Social Work</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Add Social Work</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Blogs Main Informantion</p>

<form id="myForm" method="post" action="{{ route('update.social.work') }}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id"  value="{{ $edit_social->id }}">

    <div class="row">                  
        <div class="col-lg-12">                      
            <div class="form-group mb-3">
                <label for="title_english" class="form-label">Work Title </label>
                <input type="text" name="title_english" id="title_english" class="form-control" value="{{ $edit_social->title_english }}">

            </div>
        </div>    
        
        <div class="col-lg-2"> 
            <div class="form-group mb-3">
                <label for="main_image" class="form-label">Main Image 1(600x600)</label>
                <input type="file" id="main_image" name="main_image" class="form-control" >
            </div>
            <img src="{{ (!empty($edit_social->main_image)) ? asset($edit_social->main_image) : url('upload/no_image.jpg') }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
        </div>  
        <div class="col-lg-2"> 
            <div class="form-group mb-3">
                <label for="details_image1" class="form-label">Main Image 2(600x600)</label>
                <input type="file" id="details_image1" name="details_image1" class="form-control" >
            </div>
            <img src="{{ (!empty($edit_social->details_image1)) ? asset($edit_social->details_image1) : url('upload/no_image.jpg') }}" alt="" id="details_image1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
        </div> 

        <div class="col-lg-2"> 
            <div class="form-group mb-3">
                <label for="banner_image" class="form-label">Banner Image(1920x450)</label>
                <input type="file" id="banner_image" name="banner_image" class="form-control" >
            </div>
            <img src="{{ (!empty($edit_social->banner_image)) ? asset($edit_social->banner_image) : url('upload/no_image.jpg') }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
        </div>   
        <div class="col-lg-2"> 
            <div class="form-group mb-3">
                <label for="details_image2" class="form-label">Image(440x330)</label>
                <input type="file" id="details_image2" name="details_image2" class="form-control" >
            </div>
            <img src="{{ (!empty($edit_social->details_image2)) ? asset($edit_social->details_image2) : url('upload/no_image.jpg') }}" alt="" id="details_image2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
        </div> 
        <div class="col-lg-2"> 
            <div class="form-group mb-3">
                <label for="details_image3" class="form-label">Image(440x330)</label>
                <input type="file" id="details_image3" name="details_image3" class="form-control" >
            </div>
            <img src="{{ (!empty($edit_social->details_image3)) ? asset($edit_social->details_image3) : url('upload/no_image.jpg') }}" alt="" id="details_image3_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
        </div> 
        <div class="col-lg-2"> 
            <div class="form-group mb-3">
                <label for="details_image4" class="form-label">Image(440x330)</label>
                <input type="file" id="details_image4" name="details_image4" class="form-control" >
            </div>
            <img src="{{ (!empty($edit_social->details_image4)) ? asset($edit_social->details_image4) : url('upload/no_image.jpg') }}" alt="" id="details_image4_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
        </div> 

        <div class="col-lg-12 mt-2"> 
            <div class="form-group mb-3">
                <label for="example-email" class="form-label">Work Short Description</label>              
                <textarea id="tinymce" class="editor form-control" col="10" row="15" name="short_des_eng">
                {!!  $edit_social->short_des_eng  !!}    
                </textarea>     
            </div>
        </div> 
                                        
        <div class="col-lg-12 mt-2">                                    
            <div class="form-group">
                <label for="long_des1_eng" class="form-label">Long Description 1</label>                                            
                <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des1_eng">
                    {!!  $edit_social->long_des1_eng  !!}  
                </textarea>      
            </div>                            
        </div> 
        
        <div class="col-lg-12 mt-2">                                    
            <div class="form-group">
                <label for="long_des2_eng" class="form-label">Long Details-2 </label>
                <textarea name="long_des2_eng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Long Details-2 English ...">
                    {!!  $edit_social->long_des2_eng  !!}
                </textarea> 
            </div>                        
        </div>  
    
        <div class="col-lg-12 mt-2">                                    
            <div class="form-group">
                <label for="long_des3_eng" class="form-label"> Long Details-3 </label>
                <textarea name="long_des3_eng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Long Details-3 English ...">
                    {!!  $edit_social->long_des3_eng  !!}
                </textarea> 
            </div>                       
        </div>  
        
    </div>
    <!-- end row-->

    <div class="text-center">
        <button type="submit" class="btn btn-success waves-effect waves-light "><i class="mdi mdi-content-save"></i>Submit</button>
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
                $('#banner_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#banner_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#details_image1').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#details_image1_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#details_image2').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#details_image2_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#details_image3').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#details_image3_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#details_image4').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#details_image4_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
        



@endsection