@extends('admin_dashboard')
@section('title')
    Rent Requests
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row mb-3">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4 class="page-title">Rent Requests</h4>
                    </div>
                </div>
                <div class="col-sm-6 text-sm-end">
                    <span class="badge bg-info me-1">Total: {{ $totalCount ?? 0 }}</span>
                    <span class="badge bg-danger me-1">Unread: {{ $unreadCount ?? 0 }}</span>
                    <span class="badge bg-success">Read: {{ $readCount ?? 0 }}</span>
                </div>
            </div>

            <div class="mb-3">
                <a href="{{ route('admin.rent.requests') }}"
                    class="btn btn-sm btn-dark {{ empty($statusFilter) ? 'active' : '' }}">All</a>
                <a href="{{ route('admin.rent.requests', ['status' => 'unread']) }}"
                    class="btn btn-sm btn-danger {{ $statusFilter === 'unread' ? 'active' : '' }}">Unread</a>
                <a href="{{ route('admin.rent.requests', ['status' => 'read']) }}"
                    class="btn btn-sm btn-success {{ $statusFilter === 'read' ? 'active' : '' }}">Read</a>
            </div>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">All Rent Property Requests</h4>

                            <table id="rent-requests-table" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Rent</th>
                                        <th>Submitted</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rentRequests as $key => $request)
                                        <tr class="{{ $request->status === 'unread' ? 'table-warning' : '' }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $request->name_english }}</td>
                                            <td>{{ $request->email }}</td>
                                            <td>{{ $request->phone }}</td>
                                            <td>{{ $request->property_type }}</td>
                                            <td>{{ number_format($request->monthly_rent, 2) }}</td>
                                            <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                @if ($request->status === 'unread')
                                                    <span class="badge bg-danger">Unread</span>
                                                @else
                                                    <span class="badge bg-success">Read</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.rent.request.show', $request->id) }}"
                                                    class="btn btn-sm btn-primary">View</a>
                                                @if ($request->status === 'unread')
                                                    <a href="{{ route('admin.rent.request.read', $request->id) }}"
                                                        class="btn btn-sm btn-success">Mark Read</a>
                                                @else
                                                    <a href="{{ route('admin.rent.request.unread', $request->id) }}"
                                                        class="btn btn-sm btn-warning">Mark Unread</a>
                                                @endif
                                                <a href="{{ route('admin.rent.request.delete', $request->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Delete this request?');">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
