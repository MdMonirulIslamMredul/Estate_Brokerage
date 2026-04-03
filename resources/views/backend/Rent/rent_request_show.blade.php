@extends('admin_dashboard')
@section('title')
    Rent Request Details
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Rent Request Details</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.rent.requests') }}" class="btn btn-secondary">Back to list</a>
                        @if ($rentRequest->status === 'unread')
                            <a href="{{ route('admin.rent.request.read', $rentRequest->id) }}" class="btn btn-success">Mark
                                Read</a>
                        @else
                            <a href="{{ route('admin.rent.request.unread', $rentRequest->id) }}"
                                class="btn btn-warning">Mark Unread</a>
                        @endif
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $rentRequest->name_english }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $rentRequest->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $rentRequest->email }}</td>
                        </tr>
                        <tr>
                            <th>Property Type</th>
                            <td>{{ $rentRequest->property_type }}</td>
                        </tr>
                        <tr>
                            <th>Monthly Rent</th>
                            <td>{{ number_format($rentRequest->monthly_rent, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Property Title</th>
                            <td>{{ $rentRequest->property_title }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $rentRequest->location }}</td>
                        </tr>
                        <tr>
                            <th>Area Size</th>
                            <td>{{ $rentRequest->area_size ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Bedrooms</th>
                            <td>{{ $rentRequest->bedrooms ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Bathrooms</th>
                            <td>{{ $rentRequest->bathrooms ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Available From</th>
                            <td>{{ $rentRequest->available_from ? $rentRequest->available_from->format('Y-m-d') : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Full Address</th>
                            <td>{{ $rentRequest->full_address }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $rentRequest->description }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ ucfirst($rentRequest->status) }}</td>
                        </tr>
                        <tr>
                            <th>Submitted At</th>
                            <td>{{ $rentRequest->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
