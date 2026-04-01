@extends('admin_dashboard')

@section('admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Project Subcategory</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('all.project_subcategory') }}">Project Subcategories</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Validation Errors!</h4>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Subcategory</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.project_subcategory', $subcategory->id) }}" method="POST"
                            enctype="multipart/form-data" id="subcategoryForm">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="project_category_id" class="form-label">Category *</label>
                                <select class="form-select @error('project_category_id') is-invalid @enderror"
                                    id="project_category_id" name="project_category_id" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('project_category_id', $subcategory->project_category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('project_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Subcategory Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $subcategory->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4">{{ old('description', $subcategory->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                @if ($subcategory->image)
                                    <div class="mb-2">
                                        <img src="{{ asset($subcategory->image) }}" width="150" height="150"
                                            alt="{{ $subcategory->name }}">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*">
                                <small class="form-text text-muted">Max size: 2MB. Allowed: jpeg, png, jpg, gif</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Status *</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                        name="status" id="status_active" value="1"
                                        {{ (string) old('status', $subcategory->status) === '1' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="status_active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                        name="status" id="status_inactive" value="0"
                                        {{ (string) old('status', $subcategory->status) === '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_inactive">Inactive</label>
                                </div>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <i class="mdi mdi-content-save"></i> Update Subcategory
                                </button>
                                <a href="{{ route('all.project_subcategory') }}" class="btn btn-secondary">
                                    <i class="mdi mdi-close"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('subcategoryForm').addEventListener('submit', function(e) {
            console.log('Form is being submitted');
        });
    </script>
@endsection
