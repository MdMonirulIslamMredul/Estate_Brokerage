@extends('admin_dashboard')
@section('title') Admin @endsection
@section('admin')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('create.result') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Create Result</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Result</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Result Table</h4>
                      
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Game Name</th>
                                    <th>Date</th>                                   
                                                                       
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>                        
                        
                            <tbody>
                                @foreach($results as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($item->gamedata->main_image) }}" alt="" style="width:90px;height:80px"></td>
                                    <td>{{ $item->gamedata->game_name }}</td>
                                    <td>{{ $item->year }}</td>
                                   

                                    <td width="10%">
                                        <a href="{{ route('edit.result',$item->id) }}" class="btn btn-info">Edit</a>
                                         <a href="{{ route('delete.result',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->



        
    </div> <!-- container -->

</div> <!-- content -->





@endsection