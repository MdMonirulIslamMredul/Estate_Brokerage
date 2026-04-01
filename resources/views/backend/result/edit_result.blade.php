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
                            <a href="{{ route('all.result') }}" class="btn btn-primary rounded-pill waves-effect waves-light"><i class="fe-arrow-left"></i>All Result</a>                            
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Result</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form id="myForm" method="post" action="{{ route('result.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $edit_result->id }}">

                            <div class="row">                  
                                <div class="col-lg-6 mt-1">                      
                                    <div class="form-group mb-3">
                                        <label for="simpleinput" class="form-label">Game Name </label>
                                        <select name="game_id" class="form-select" style="padding:12px 5px">
                                            <option selected="" disabled>Select Game</option>
                                            @foreach ($games as $item)
                                               <option value="{{ $item->id }}" {{ $item->id == $edit_result->game_id ? 'selected' : '' }}>{{ $item->game_name }}</option>
                                            @endforeach              
                                         </select> 
                                    </div>
                                </div>    
                               
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Game Year (Like 2023)</label>
                                        <input type="text" id="year" name="year" class="form-control" value="{{ $edit_result->year }}" >
                                    </div>
                                </div> 
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email" class="form-label">Result File (pdf) </label>
                                        <input type="file" id="pdf_file" name="pdf_file" class="form-control" autocomplete="off">
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
       
        
       
       


@endsection