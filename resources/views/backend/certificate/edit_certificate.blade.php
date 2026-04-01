@extends('admin_dashboard')
@section('title') Certification @endsection
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
                            <a href="{{ route('all.certificate') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Certificate</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Certificate</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Certificate Main Informantion</p>

                        <form id="myForm" method="post" action="{{ route('certificate.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $edit_certificate->id }}">

                            <div class="row">  
                                <div class="col-lg-12"> 
                                    <div class="form-group mb-3">
                                        <label for="certificate_file" class="form-label">Upload Certificate File</label>
                                        <input type="file" id="certificate_file" name="certificate_file" class="form-control" >
                                    </div>                                   
                                    <img id="certificate_file_show" src="{{ (!empty($edit_certificate->certificate_file)) ? asset($edit_certificate->certificate_file ?? null) : url('upload/no_image.jpg') }}" alt="" style="width:120px;height:120px">
                                </div>                 
                                <div class="col-lg-12 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Certificate Title English</label>
                                        <input type="text" id="title_english" name="title_english" class="form-control" value="{{ $edit_certificate->title_english }}">
                                    </div>                                   
                                     
                                </div>                 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="short_des_english" class="form-label">Short Description English </label>
                                        <textarea name="short_des_english" class="form-control" id="short_des_english" cols="30" rows="5" placeholder="Short Description In English...">
                                            {!! $edit_certificate->short_des_english !!}
                                      </textarea>
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="short_des_bangla" class="form-label">Short Description Bangla </label>
                                        <textarea name="short_des_bangla" class="form-control" id="short_des_bangla" cols="30" rows="5" placeholder="Short Description Bangla ...">
                                            {!! $edit_certificate->short_des_bangla !!}
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
        $('#certificate_file').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#certificate_file_show').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
       
    });
</script>
       
        
       
       

        


@endsection