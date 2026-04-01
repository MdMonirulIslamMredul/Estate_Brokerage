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
                            <a href="{{ route('all.completed.events') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Completed Events</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Add Completed Events</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Completed Events Informantion</p>

                    <form id="myForm" method="post" action="{{ route('completed.event.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">                  
                                <div class="col-lg-12">                      
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Event Title English </label>
                                        <input type="text" name="title_english" id="title_english" class="form-control" placeholder="Event Title English...">
                                    </div>
                                </div>  
                                <div class="col-lg-4">                      
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Event Location </label>
                                        <input type="text" name="location_eng" id="location_eng" class="form-control" placeholder="Event location English...">
                                    </div>
                                </div>   
                                <div class="col-lg-4">                      
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Event Start Date </label>
                                        <input type="text" name="start_date" id="start_datepicker" class="form-control" placeholder="Event Start Date...">
                                    </div>
                                </div>    
                                <div class="col-lg-4">                      
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Event End Date </label>
                                        <input type="text" name="end_date" id="end_datepicker" class="form-control" placeholder="Event End Date...">
                                    </div>
                                </div>    
                              
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="main_image" class="form-label">Banner Image(19200x600)</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control" >
                                    </div>
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div> 
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Main Image(460x440) </label>
                                        <input type="file" id="main_image" name="main_image" class="form-control" >
                                    </div>
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>   
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Main Image(460x440) </label>
                                        <input type="file" id="details_image1" name="details_image1" class="form-control" >
                                    </div>
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="details_image1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>   
                                <div class="col-lg-3"> 
                                    <div class="form-group mb-3">
                                        <label for="details_image2" class="form-label">Main Image(460x440) </label>
                                        <input type="file" id="details_image2" name="details_image2" class="form-control" >
                                    </div>
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="details_image2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     
                                </div>  
                                
                                
                                <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Event Short Description in English </label>
                                        <textarea name="short_des_eng" class="form-control" id="short_des_eng" cols="30" rows="5" placeholder="Agro Short Description English ...">
                                      </textarea>
                                    </div>
                                </div>                               
                              
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="long_des_eng" class="form-label">Event Long Description English</label>                                            
                                        <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des_eng" placeholder="Agro Long Description Bangla..."></textarea>                                    
                                    </div>                                        
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
        
        {{-- js form validation rules --}}
        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        title_english: {
                            required : true,
                        },  
                        banner_image: {
                            required : true,
                        },              
                        main_image: {
                            required : true,
                        },              
                                    
                    },
                   
                    messages :{
                        title_english: {
                            required : 'Please Enter Event Title',
                        }, 
                        banner_image: {
                            required : 'Please Select Event Image',
                        },               
                        main_image: {
                            required : 'Please Select Event Image',
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




<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        // content_css: 'dark',
        skin: "oxide-dark",
        content_css: "tinymce-5-dark"
    });
</script>

<script>
    $( function() {
      $( "#start_datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:'yy-mm-dd',
        
      });
    } );
</script>
<script>
    $( function() {
      $( "#end_datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:'yy-mm-dd',
        
      });
    } );
</script>
        


@endsection