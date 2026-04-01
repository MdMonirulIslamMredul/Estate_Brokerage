@extends('frontend.layout')
@section('title') Career @endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{ asset($banner->banner_image ?? null) }});">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Career</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        
    </div><!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!-- Start -->
<section class="section mb-5 pb-5">
    
   <div class="container-fluid" >
    <div class="container mt-20 mt-20 py-5" >
        <div class="row justify-content-center">
            <div class="col">
                <div class="section-title text-center mb-4 pb-2">
                    <h1 class="title text-primary mb-3 ">Career Oppourtinity</h1>
                    
                    <hr style="
                    border-top:3px solid #17A84C;
                    width:100px;margin:auto;
                    opacity:1;margin-top:-15px;
                    border-radius: 2px;" >

                    <h1 class="text-muted para-desc mb-0 py-3 mx-auto">Let Us Know About Yourself</h1>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if(session('career_msg'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('career_msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>                            
                @endif
                <div class="p-4 rounded-3 shadow">

                    <form method="post" id="myForm" action="/cv/submit" enctype="multipart/form-data">
                        @csrf                       
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name_english" id="name_english" class="form-control @error('name_english') is-invalid @enderror " placeholder="Name :">
                                    @error('name_english')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email :">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> 
                            </div><!--end col-->

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone :">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> 
                            </div><!--end col-->

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Skill Set</label>
                                    <input type="text" name="skill" id="skill" class="form-control @error('skill') is-invalid @enderror" placeholder="Skill :">
                                    @error('skill')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!--end col-->

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea name="message_english" id="message_english" rows="4" class="form-control" placeholder="Message :"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 ">
                                <div class="form-group mb-3">
                                    <label class="form-label">Upload Your CV (Pdf)<span class="text-danger">*</span></label>
                                    <input type="file" name="pdf_file" id="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror" placeholder="File :">
                                    @error('pdf_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!--end col-->
                          
                            <div class="col-2 ">
                                <div class="mb-3">
                                    <label class="form-label" style="margin-top:50px"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div><!--end col-->
        </div>

      
    </div><!--end container-->
   </div>
   
</section><!--end section-->
<!-- End -->



  {{-- js form validation rules --}}
  <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name_english: {
                    required : true,
                },  
                email: {
                    required : true,
                },                
                phone: {
                    required : true,
                },                
                skill: {
                    required : true,
                },                
                pdf_file: {
                    required : true,
                },                
            },
           
            messages :{
                name_english: {
                    required : 'You must be filled this field!',
                }, 
                email: {
                    required : 'You must be filled this field!',
                },               
                phone: {
                    required : 'You must be filled this field!',
                },               
                skill: {
                    required : 'You must be filled this field!',
                },               
                pdf_file: {
                    required : 'Your pdf file do not found!',
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