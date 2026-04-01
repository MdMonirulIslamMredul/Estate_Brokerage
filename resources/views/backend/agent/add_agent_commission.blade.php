@extends('admin_dashboard')
@section('title')
    Add Agent Commission
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Agent Commission</h4>
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
                            <h4 class="header-title py-2">Add New Agent Commission</h4>

                            <form action="{{ route('agent.commission.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group
                                            mb-3">
                                            <label for="agent_id" class="form-label">Select Agent</label>
                                            <select name="agent_id" id="agent_id" class="form-select">
                                                <option value="" selected disabled>Select an agent</option>
                                                @foreach ($agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
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
                                                    <option value="{{ $project->id }}">{{ $project->property_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="amount" class="form-label">Commission Amount</label>
                                            <input type="number" name="amount" id="amount" class="form-control"
                                                placeholder="Enter commission amount">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Commission</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
