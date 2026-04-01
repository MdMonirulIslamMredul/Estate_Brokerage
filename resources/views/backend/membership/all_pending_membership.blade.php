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
                        
                    </div>
                    <h4 class="page-title">All Pending Members</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Pending Members Table</h4>
                      
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Occupation</th>
                                    <th>Address</th>
                                    <th>Status</th>                                    
                                    
                                </tr>
                            </thead>                        
                        
                            <tbody>
                                @foreach($all_members as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($item->image) }}" alt="" style="width:90px;height:80px"></td>
                                    <td>{{ $item->name_english }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->occupation }}</td>
                                    <td>{{ $item->address_eng }}</td>
                                    
                                    <td>
                                        @if($item->status=='0')
                                        <a href="{{ route('membership.active',$item->id) }}" class="badge rounded-pill bg-danger p-2 " title="Do Active" style="color:white;font-size:12px">Pending</a>
                                        @endif
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