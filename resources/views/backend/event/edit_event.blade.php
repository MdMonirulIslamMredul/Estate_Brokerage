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
                            <a href="{{ route('all.event') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Event</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Event</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Edit Event</p>

                        <form id="myForm" method="post" action="{{ route('event.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $edit_event->id }}">

                            <div class="row">                  
                                <div class="col-lg-6">                      
                                    <div class="form-group mb-3">
                                        <label for="simpleinput" class="form-label">Event Title In English </label>
                                        <input type="text" name="title_english" id="title_english" class="form-control" 
                                        value="{{ $edit_event->title_english??null }}" >
                                    </div>
                                </div>    
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Event Title In Bangla </label>
                                        <input type="text" id="title_bangla" name="title_bangla" class="form-control" value="{{ $edit_event->title_bangla??null }}">
                                    </div>
                                </div> 
                                <div class="col-lg-12"> 
                                    <div class="form-group mb-3">
                                        <label for="main_image" class="form-label">Main Image</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control" >
                                    </div>
                                    @if($edit_event->main_image)
                                    <img src="{{ asset($edit_event->main_image) }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                     
                                </div>  
                               
                                <div class="col-lg-6 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Event Short Description in English </label>
                                        <textarea name="des_sm_eng" class="form-control" id="" cols="30" rows="5" placeholder="Event Short Description English ...">
                                            {!! $edit_event->des_sm_eng??null !!}
                                      </textarea>
                                    </div>
                                </div> 
                                <div class="col-lg-6 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Event Short Description in Bangla </label>
                                        <textarea name="des_sm_bng" class="form-control" id="" cols="30" rows="5" placeholder="Event Short Description Bangla ...">
                                            {!! $edit_event->des_sm_bng??null !!}
                                        </textarea>                                      
                                    </div>
                                </div> 

                                <p class="text-white my-3" style="font-size: 20px">Event Details  Informantion</p>

                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Banner Image</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control" >
                                    </div>
                                    @if($edit_event->banner_image)
                                    <img src="{{ asset($edit_event->banner_image) }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     @endif
                                </div>  
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="event_image1" class="form-label">Event Image 1</label>
                                        <input type="file" id="event_image1" name="event_image1" class="form-control" >
                                    </div>
                                    @if($edit_event->event_image1)
                                    <img src="{{ asset($edit_event->event_image1) }}" alt="" id="detais_image_1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="event_image1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif                                     
                                </div>  
                                <div class="col-lg-6 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="event_image2" class="form-label">Event Image 2</label>
                                        <input type="file" id="event_image2" name="event_image2" class="form-control" >
                                    </div>
                                    @if($edit_event->event_image2)
                                    <img src="{{ asset($edit_event->event_image2) }}" alt="" id="detais_image_2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="event_image2_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif                                     
                                </div>  
                                <div class="col-lg-6 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="event_image3" class="form-label">Event Image 3</label>
                                        <input type="file" id="event_image3" name="event_image3" class="form-control" >
                                    </div>
                                    @if($edit_event->event_image3)
                                    <img src="{{ asset($edit_event->event_image3) }}" alt="" id="detais_image_3_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="event_image3_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif                                     
                                </div>
                              
                                <div class="col-lg-12 mt-2">                                    
                                        <div class="form-group">
                                            <label for="long_des1_eng" class="form-label">Event Long Details-1 English</label>                                            
                                            <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des1_eng">
                                                {!! $edit_event->long_des1_eng??null !!}
                                            </textarea>                                          
                                        </div>        
                                                                      
                                </div>  
                                <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="long_des1_bng" class="form-label">Event Long Details-1 Bangla</label>
                                        <textarea name="long_des1_bng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Event Long Details-1 Bangla...">
                                            {!! $edit_event->long_des1_bng??null !!}
                                        </textarea> 
                                                  
                                    </div>                                   
                                </div> 
                                <div class="col-lg-12 mt-2">                                    
                                    <div class="form-group">
                                        <label for="long_des2_eng" class="form-label">Event Long Details-2 English</label>
                                        <textarea name="long_des2_eng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Event Long Details-2 English ...">
                                            {!! $edit_event->long_des2_eng??null !!}
                                        </textarea> 
                                      
                                    </div>         
                                                                  
                            </div>  
                            <div class="col-lg-12 mt-2"> 
                                <div class="form-group mb-3">
                                    <label for="long_des2_bng" class="form-label">Event Long Details-2 Bangla</label>
                                    <textarea name="long_des2_bng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Event Long Details-2 Bangla ...">
                                        {!! $edit_event->long_des2_bng??null !!}
                                    </textarea> 
                                             
                                </div>                                   
                            </div> 
                            <div class="col-lg-12 mt-2">                                    
                                <div class="form-group">
                                    <label for="long_des3_eng" class="form-label">Event Long Details-3 English</label>
                                    <textarea name="long_des3_eng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Event Long Details-3 English ...">
                                        {!! $edit_event->long_des3_eng??null !!}
                                    </textarea> 
                                      
                                </div>         
                                                              
                        </div>  
                        <div class="col-lg-12 mt-2"> 
                            <div class="form-group mb-3">
                                <label for="long_des3_bng" class="form-label">Event Long Details-3 Bangla</label>
                                <textarea name="long_des3_bng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Event Long Details-3 Bangla ...">
                                    {!! $edit_event->long_des3_bng??null !!}
                                </textarea> 
                                          
                            </div>                                   
                        </div>  
                              
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
      
        {{-- js form validation rules --}}
        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        title_english: {
                            required : true,
                        },                                       
                        price: {
                            required : true,
                        },                
                    },
                   
                    messages :{
                        title_english: {
                            required : 'Please Enter Event Title',
                        },                                     
                        price: {
                            required : 'Please Give Event Price',
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