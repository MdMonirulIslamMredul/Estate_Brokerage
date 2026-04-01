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
                            <a href="{{ route('all.certificate') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Certificate</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">All Faq</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                       <p class="text-white" style="font-size: 20px">Faq Add</p>

                        <form id="myForm" method="post" action="{{ route('faq.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">  
                                            
                                <div class="col-lg-6 mt-2"> 
                                    <div class="form-group mb-3">
                                        <label for="title_english" class="form-label">Faq Question</label>
                                        <input type="text" id="" name="faq_question" class="form-control" >
                                    </div>                                   
                                     
                                </div>                 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="short_des_english" class="form-label">Faq Ans </label>
                                        <textarea name="faq_ans" class="form-control" id="" cols="30" rows="5" placeholder="...">
                                      </textarea>
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
 <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Faq Table</h4>
                      
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Faq Question</th>                                    
                                    <th>Faq Ans</th>                                    
                                  ]
                                    <th>Action</th>
                                </tr>
                            </thead>                        
                        
                            <tbody>
                                @foreach($faqs as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>                                    
                                                                      
                                    <td>{{ $item->faq_question }}</td>                                    
                                    <td>{{ $item->faq_ans }}</td>                                    
                                   
                                    <td>
                                  
                                         <a href="{{ route('delete.faq',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
              
    </div> <!-- container -->

</div> <!-- content -->
       
        {{-- js form validation rules --}}
        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        certificate_file: {
                            required : true,
                        }, 
                                    
                                      
                    },
                   
                    messages :{
                        certificate_file: {
                            required : 'Please Give certificate file',
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