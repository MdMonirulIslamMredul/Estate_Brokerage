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
                            <a href="{{ route('all.agro_product') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Blogs</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Agro Products</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Agro Products Informantion</p>

                    <form id="myForm" method="post" action="{{ route('agro_product.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $edit_product->id }}">
                            <div class="row">                  
                                <div class="col-lg-12">                      
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Agro Product Title English </label>
                                        <input type="text" name="title_english" id="title_english" class="form-control" value="{{ $edit_product->title_english }}">
                        
                                    </div>
                                </div>    
                                {{-- <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Agro Product Title Bangla </label>
                                        <input type="text" id="title_bangla" name="title_bangla" class="form-control" value="{{ $edit_product->title_bangla }}">
                                    </div>
                                </div>  --}}
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="main_image" class="form-label">Image 1(460x440)</label>
                                        <input type="file" id="image1" name="image1" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($edit_product->image1))? asset($edit_product->image1) : url('upload/no_image.jpg') }}" alt="" id="image1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Image 2(460x440) </label>
                                        <input type="file" id="image2" name="image2" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($edit_product->image2))? asset($edit_product->image2) : url('upload/no_image.jpg') }}" alt="" id="image2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>   
                                
                                <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Agro Short Description in English </label>
                                        <textarea name="short_des_eng" class="form-control" id="short_des_eng" cols="30" rows="5" >
                                            {!! $edit_product->short_des_eng !!}
                                      </textarea>
                                    </div>
                                </div> 
                                {{-- <div class="col-lg-12 "> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Agro Short Description in Bangla </label>
                                        <textarea name="short_des_bng" class="form-control" id="short_des_bng" cols="30" rows="5" placeholder="Service Short Description Bangla ...">
                                            {!! $edit_product->short_des_bng !!}
                                        </textarea>                                      
                                    </div>
                                </div>  --}}

                              
                              
                                
                                
                              
                                <div class="col-lg-12 mt-2">                                    
                                        <div class="form-group">
                                            <label for="long_des1_eng" class="form-label">Agro Long Description English</label>                                            
                                            <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des_eng" placeholder="Agro Long Description Bangla...">
                                                {!! $edit_product->long_des_eng !!}
                                            </textarea>
                                                                                    
                                        </div>        
                                                                      
                                </div>  
                                {{-- <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="long_des_bng" class="form-label">Agro Long Description Bangla</label>
                                        <textarea name="long_des_bng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Agro Long Description Bangla...">
                                            {!! $edit_product->long_des_bng !!}
                                        </textarea> 
                                                  
                                    </div>                                   
                                </div>  --}}
                              
                            </div>

                            <!-- end row-->
                            <div class="text-center">
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
                $('#image1').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image1_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#image2').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image2_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                
            });
        </script>
        
        {{-- js form validation rules --}}
       


@endsection