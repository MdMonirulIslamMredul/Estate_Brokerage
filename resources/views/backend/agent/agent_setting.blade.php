@extends('admin_dashboard')
@section('title')
    User Management
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">User Management</h4>
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
                            <h4 class="header-title py-2">All Registered Users</h4>

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <span class="badge rounded-pill p-2"
                                                        style="background:green;color:white;font-size:12px">Active</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger p-2"
                                                        style="font-size:12px;color:white">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <a href="{{ route('user.inactive', $user->id) }}"
                                                        class="btn btn-sm btn-danger">Deactivate</a>
                                                @else
                                                    <a href="{{ route('user.active', $user->id) }}"
                                                        class="btn btn-sm btn-success">Activate</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">No users found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
