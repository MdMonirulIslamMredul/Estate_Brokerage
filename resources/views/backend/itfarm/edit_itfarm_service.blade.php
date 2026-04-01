@extends('admin_dashboard')
@section('title') Admin @endsection
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
                            <a href="{{ route('all.itfarm.service') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All IT Service</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Edit IT Service</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">IT Service Informantion</p>

                    <form id="myForm" method="post" action="{{ route('itservice.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $edit_itservice->id }}">

                            <div class="row">                  
                                <div class="col-lg-12">                      
                                    <div class="form-group mb-3">
                                        <label for="it_service_name_eng" class="form-label">IT Service Name English </label>
                                        <input type="text" name="it_service_name_eng" id="it_service_name_eng" class="form-control" value="{{ $edit_itservice->it_service_name_eng }}">
                        
                                    </div>
                                </div>    
                              
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Banner Image 1(1920x600)</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($edit_itservice->banner_image))? asset($edit_itservice->banner_image) : url('upload/no_image.jpg') }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div> 
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="main_image" class="form-label">Main Image 2(460x440) </label>
                                        <input type="file" id="main_image" name="main_image" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($edit_itservice->main_image))? asset($edit_itservice->main_image) : url('upload/no_image.jpg') }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>   

                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="details_image1" class="form-label">Details Image1(460x440) </label>
                                        <input type="file" id="details_image1" name="details_image1" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($edit_itservice->details_image1))? asset($edit_itservice->details_image1) : url('upload/no_image.jpg') }}" alt="" id="details_image1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>   

                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="details_image2" class="form-label">Main Image2(460x440) </label>
                                        <input type="file" id="details_image2" name="details_image2" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($edit_itservice->details_image2))? asset($edit_itservice->details_image2) : url('upload/no_image.jpg') }}" alt="" id="details_image2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>   

                                <div class="col-lg-12 mt-3"> 
                                    <div class="form-group mb-3">
                                        <label for="resource_eng" class="form-label">IT Resources English </label>
                                        <textarea name="resource_eng" class="form-control" id="resource_eng" cols="30" rows="5" placeholder="IT Resources English ...">
                                            {!! $edit_itservice->resource_eng !!}
                                        </textarea>
                                    </div>
                                </div> 
                                
                                <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">IT Service Short Description English </label>
                                        <textarea name="short_des_eng" class="form-control" id="short_des_eng" cols="30" rows="5" placeholder="IT Service Short Description English ...">
                                            {!! $edit_itservice->short_des_eng !!}
                                      </textarea>
                                    </div>
                                </div> 
                              
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="long_des_eng" class="form-label">IT Service Long Description  English</label>                                            
                                        <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des_eng" id="long_des_eng" placeholder="IT Service Long Description Englsh...">
                                            {!! $edit_itservice->long_des_eng !!}
                                        </textarea>                                     
                                    </div>                                      
                                </div>  
                              
                            </div>
                            <!-- end row-->
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-success waves-effect waves-light "><i class="mdi mdi-content-save"></i>Update</button>
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
                $('#banner_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#banner_image_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#main_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#main_image_show').attr('src',e.target.result);
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
                
            });
        </script>
        


@endsection