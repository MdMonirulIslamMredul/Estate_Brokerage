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
                    <h4 class="page-title">Add Agro Products</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Agro Products Informantion</p>

                    <form id="myForm" method="post" action="{{ route('agro_product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                  
                                <div class="col-lg-12">                      
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Agro Product Title English </label>
                                        <input type="text" name="title_english" id="title_english" class="form-control" placeholder="Agro Product Title English...">
                        
                                    </div>
                                </div>    
                                {{-- <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Agro Product Title Bangla </label>
                                        <input type="text" id="title_bangla" name="title_bangla" class="form-control" placeholder="Agro Product Title Bangla ...">
                                    </div>
                                </div>  --}}
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="main_image" class="form-label">Image 1(460x440)</label>
                                        <input type="file" id="image1" name="image1" class="form-control" >
                                    </div>
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Image 2(460x440) </label>
                                        <input type="file" id="image2" name="image2" class="form-control" >
                                    </div>
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>   
                                {{-- <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="multi_img" class="form-label">Multiple Image(460x440) </label>
                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">                                   
                                        <div class="row" id="preview_img"> </div>
                                    </div>
                                   
                                     
                                </div>    --}}
                                
                                <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Agro Short Description in English </label>
                                        <textarea name="short_des_eng" class="form-control" id="short_des_eng" cols="30" rows="5" placeholder="Agro Short Description English ...">
                                      </textarea>
                                    </div>
                                </div> 
                                {{-- <div class="col-lg-12 "> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Agro Short Description in Bangla </label>
                                        <textarea name="short_des_bng" class="form-control" id="short_des_bng" cols="30" rows="5" placeholder="Service Short Description Bangla ...">
                                        </textarea>                                      
                                    </div>
                                </div>  --}}

                              
                              
                                <div class="col-lg-12 mt-2">                                    
                                        <div class="form-group">
                                            <label for="long_des1_eng" class="form-label">Agro Long Description English</label>                                            
                                            <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des_eng" placeholder="Agro Long Description Bangla..."></textarea>
                                                                                    
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
        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        title_english: {
                            required : true,
                        },  
                        image1: {
                            required : true,
                        },              
                                    
                    },
                   
                    messages :{
                        title_english: {
                            required : 'Please Enter Agro Title',
                        }, 
                        image1: {
                            required : 'Please Select Agro Image',
                        },               
                     
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
            
        </script>


<script> 
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(130)
                    .height(120); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
     
    </script>



@endsection