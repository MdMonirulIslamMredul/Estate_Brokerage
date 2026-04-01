@extends('admin_dashboard')
@section('title') Provacy Setting @endsection
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

                        <form id="myForm" method="post" action="{{ route('privacy.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">  
                                <div class="col-lg-4"> 
                                    <div class="form-group mb-3">
                                        <label for="image1" class="form-label">Privacy Image 1(540x360)</label>
                                        <input type="file" id="image1" name="image1" class="form-control" >
                                    </div>
                                    @if($privacy->image1??null)
                                    <img src="{{ asset($privacy->image1) }}" alt="" id="image1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                </div> 

                                <div class="col-lg-4"> 
                                    <div class="form-group mb-3">
                                        <label for="image2" class="form-label">Privacy image 2(540x360)</label>
                                        <input type="file" id="image2" name="image2" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($privacy->image2) ? asset($privacy->image2 ?? null) : url('upload/no_image.jpg')) }}" alt="" id="image2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                </div> 

                                <div class="col-lg-4"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Banner Image(1920x920)</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control" >
                                    </div>
                                    <img src="{{ (!empty($privacy->banner_image) ? asset($privacy->banner_image ?? null) : url('upload/no_image.jpg')) }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                </div>  
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="short_des" class="form-label">Short Description 1</label>                                            
                                        <textarea id="tinymce" class="editor form-control" col="10" row="10" name="short_des" placeholder="Short Description...">
                                            {!! $privacy->short_des??'' !!}
                                        </textarea>                         
                                    </div>                                             
                                </div>  
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="short_des2" class="form-label">Short Description 2</label>                                            
                                        <textarea id="tinymce" class="editor form-control" col="10" row="10" name="short_des2" placeholder="Short Description 2...">
                                            {!! $privacy->short_des2??'' !!}
                                        </textarea>                         
                                    </div>                                             
                                </div>  
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="long_des" class="form-label">Long Description</label>                                            
                                        <textarea id="tinymce" class="editor form-control" col="10" row="20" name="long_des" placeholder="Long Description...">
                                            {!! $privacy->long_des??'' !!}
                                        </textarea>                         
                                    </div>                                             
                                </div>  

                            </div>
                            <!-- end row-->
                            <div class="text-center">
                            @if($privacy != true)
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
                $('#image1').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image1_show').attr('src',e.target.result);
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