@extends('admin_dashboard')
@section('title')
    Agent Commission Lists
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Agent Commission Lists</h4>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title py-2">Agent Commission Lists</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Agent Name</th>
                                        <th>Project Name</th>
                                        <th>Commission Amount</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($commissions as $key => $commission)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $commission->agent->name }}</td>
                                            <td>{{ $commission->project->property_name }}</td>
                                            <td>{{ $commission->amount }}</td>
                                            <td>
                                                <span class="badge bg-light text-dark">
                                                    <i class="mdi mdi-calendar-clock me-1"></i>
                                                    {{ $commission->created_at->format('M d, Y') }}
                                                </span>
                                                <br>
                                                <small
                                                    class="text-muted">{{ $commission->created_at->format('h:i A') }}</small>
                                            </td>
                                            <td>
                                                <a href="{{ route('agent.commission.edit', $commission->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('agent.commission.delete', $commission->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
