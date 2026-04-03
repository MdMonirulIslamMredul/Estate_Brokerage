@extends('admin_dashboard')
@section('title')
    User Details
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">User Details</h4>
                        <a href="{{ route('all.agents') }}" class="btn btn-sm btn-secondary">Back to User List</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">{{ $user->name }} ({{ ucfirst($user->role) }})</h4>
                            <table class="table table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>{{ $user->username ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $user->phone ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <td>{{ $user->age ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Current Address</th>
                                        <td>{{ $user->current_address ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Permanent Address</th>
                                        <td>{{ $user->permanent_address ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>{{ ucfirst($user->role) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Registered</th>
                                        <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="mb-3">Photos</h5>
                            <div class="mb-3">
                                @if ($user->photo)
                                    <a href="{{ Storage::url($user->photo) }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ Storage::url($user->photo) }}" class="img-fluid rounded"
                                            alt="Profile Photo">
                                    </a>
                                @else
                                    <div class="border p-4 text-muted">No profile photo uploaded</div>
                                @endif
                            </div>
                            <div>
                                <h6>ID Document</h6>
                                @if ($user->id_document)
                                    <a href="{{ Storage::url($user->id_document) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-sm btn-primary">View Document</a>
                                @else
                                    <div class="border p-3 text-muted">No ID document uploaded</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
