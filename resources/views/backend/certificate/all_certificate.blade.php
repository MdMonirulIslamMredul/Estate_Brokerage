@extends('admin_dashboard')
@section('title') Certification @endsection
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
                            <a href="{{ route('add.certificate') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Certificate</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Certificate</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Certificate Table</h4>
                      
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Certificate</th>                                    
                                    <th>Title</th>                                    
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>                        
                        
                            <tbody>
                                @foreach($certificates as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>                                    
                                    <td>
                                        <img src="{{ (!empty($item->certificate_file)) ? asset($item->certificate_file) : url('upload/no_image.jpg') }}" alt="" style="width:120px;height:120px">    
                                    </td>                                    
                                    <td>{!! $item->title_english !!}</td>                                    
                                    <td>
                                        @if($item->status=='1')
                                        <a href="{{ route('certificate.inactive',$item->id) }}" class="badge rounded-pill p-2 " style="background: green;color:white;font-size:12px">Active</a>
                                        @else
                                        <a href="{{ route('certificate.active',$item->id) }}" class="badge rounded-pill bg-danger p-2" style="font-size:12px;color:white">Deactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.certificate',$item->id) }}" class="btn btn-info">Edit</a>
                                         <a href="{{ route('delete.certificate',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
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