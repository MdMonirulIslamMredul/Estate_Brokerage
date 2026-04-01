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
                            <a href="{{ route('all.category') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Category</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Add Real Estate Category</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Real Estate Category Informantion</p>

                    <form id="myForm" method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                  
                                <div class="col-lg-12">                      
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Category Name English </label>
                                        <input type="text" name="category_name_eng" id="category_name_eng" class="form-control" placeholder="Category Name English...">
                                    </div>
                                </div>  
                                
                                <div class="col-lg-12"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Main Image(210x140) </label>
                                        <input type="file" id="image" name="image" class="form-control" >
                                    </div>
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>  

                            </div>
                            <!-- end row-->
                            <div class="text-center mt-3">
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
               
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_show').attr('src',e.target.result);
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
                        category_name_eng: {
                            required : true,
                        },  
                        image: {
                            required : true,
                        },              
                                    
                                    
                    },
                   
                    messages :{
                        category_name_eng: {
                            required : 'Please Enter Category Name',
                        }, 
                        image: {
                            required : 'Please Select Category Image',
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

@endsection