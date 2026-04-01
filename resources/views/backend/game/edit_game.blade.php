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
                            <a href="{{ route('all.game') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Gmae</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Game</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Games Main Informantion</p>

                        <form id="myForm" method="post" action="{{ route('game.update') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $edit_game->id }}">

                            <div class="row">                  
                                <div class="col-lg-6">                      
                                    <div class="form-group mb-3">
                                        <label for="simpleinput" class="form-label">Game Name In English </label>
                                        <input type="text" name="game_name" id="game_name" class="form-control" value="{{  $edit_game->game_name }}">
                                    </div>
                                </div>    
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Game Name In Bangla </label>
                                        <input type="text" id="game_name_bng" name="game_name_bng" class="form-control" value="{{  $edit_game->game_name_bng }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Game Holding Date </label>
                                        <input type="text" id="datepicker" name="date" class="form-control" value="{{  $edit_game->date }}">
                                    </div>
                                </div> 
                                <div class="col-lg-6 mt-1"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Game Holding Time </label>
                                        <input type="time" id="timepicker" name="start_time" class="form-control timepicker" value="{{  $edit_game->start_time }}" style="padding: 12px 5px;">
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Location/Venu </label>
                                        <input type="text" id="location_eng" name="location_eng" class="form-control" value="{{  $edit_game->location_eng }}" >
                                    </div>
                                </div> 
                                {{-- <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Location/Venu Bangla </label>
                                        <input type="text" id="location_bng" name="location_bng" class="form-control" value="{{  $edit_game->location_bng }}" >
                                    </div>
                                </div> --}}
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="main_image" class="form-label">Main Image</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control" >
                                    </div>
                                    @if($edit_game->main_image)
                                    <img src="{{ asset($edit_game->main_image) }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="main_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                     
                                </div>   
                               
                                <div class="col-lg-6 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Game Short Description in English </label>
                                        <textarea name="short_des1_eng" class="form-control" id="" cols="30" rows="5" placeholder="Game Short Description English ...">
                                            {!! $edit_game->short_des1_eng !!}
                                      </textarea>
                                    </div>
                                </div> 
                                <div class="col-lg-6 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Game Short Description in Bangla </label>
                                        <textarea name="short_des1_bng" class="form-control" id="" cols="30" rows="5" placeholder="Game Short Description Bangla ...">
                                            {!! $edit_game->short_des1_bng !!}
                                        </textarea>                                      
                                    </div>
                                </div> 

                                <p class="text-white my-3" style="font-size: 20px">Game Details  Informantion</p>

                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="banner_image" class="form-label">Banner Image</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control" >
                                    </div>
                                    @if($edit_game->banner_image)
                                    <img src="{{ asset($edit_game->banner_image) }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                     @endif
                                </div>  
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="detais_image_1" class="form-label">Game Image 1</label>
                                        <input type="file" id="image1" name="image1" class="form-control" >
                                    </div>
                                    @if($edit_game->image1)
                                    <img src="{{ asset($edit_game->image1) }}" alt="" id="banner_image_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @else
                                    <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image_1_show" class="avatar-lg img-thumbnail" alt="profile-image" style="width: 120px;height:120px">
                                    @endif
                                     
                                </div>  
                               
                              
                                <div class="col-lg-12 mt-2">                                    
                                        <div class="form-group">
                                            <label for="long_des1_eng" class="form-label">Game Long Details-1 English</label>                                            
                                            <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des1_eng">
                                                {!! $edit_game->long_des1_eng !!}
                                            </textarea>
                                                                                    
                                        </div>        
                                                                      
                                </div>  
                                <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="long_des1_bng" class="form-label">Game Long Details-1 Bangla</label>
                                        <textarea name="long_des1_bng" id="tinymce" class="editor form-control" cols="30" rows="15" placeholder="Game Long Details-1 Bangla...">
                                            {!! $edit_game->long_des1_bng !!}
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
                $('#image1').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_1_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#image2').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_2_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
                $('#image3').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#image_3_show').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
        
        {{-- js form validation rules --}}
       
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
      $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:'yy-mm-dd',
        
      });
    } );
</script>

        


@endsection