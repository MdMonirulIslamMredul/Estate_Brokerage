@extends('admin_dashboard')
@section('title')
    Edit Agent Commission
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Agent Commission</h4>
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
                            <h4 class="header-title py-2">Edit Agent Commission</h4>

                            <form action="{{ route('agent.commission.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $commission->id }}">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group
                                            mb-3">
                                            <label for="agent_id" class="form-label">Select Agent</label>
                                            <select name="agent_id" id="agent_id" class="form-select">
                                                <option value="" selected disabled>Select an agent</option>
                                                @foreach ($agents as $agent)
                                                    <option value="{{ $agent->id }}"
                                                        {{ $commission->agent_id == $agent->id ? 'selected' : '' }}>
                                                        {{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="project_id" class="form-label">Select Project</label>
                                            <select name="project_id" id="project_id" class="form-select">
                                                <option value="" selected disabled>Select a project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}"
                                                        {{ $commission->project_id == $project->id ? 'selected' : '' }}>
                                                        {{ $project->property_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="amount" class="form-label">Commission Amount</label>
                                            <input type="number" name="amount" id="amount" class="form-control"
                                                value="{{ $commission->amount }}" placeholder="Enter commission amount">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Commission</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
