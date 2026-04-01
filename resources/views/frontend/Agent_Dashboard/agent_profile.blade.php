@extends('frontend.Agent_Dashboard.app')

@section('title', 'My Profile')
@section('page-title', 'My Profile')

@section('content')

    <div class="row g-4">

        {{-- ── Profile Card ──────────────────────────────── --}}
        <div class="col-lg-4">
            <div class="ag-card text-center">
                {{-- Avatar --}}
                <div
                    style="width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,#4f46e5,#7c3aed);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                    <span
                        style="font-size:36px;font-weight:800;color:#fff;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                </div>
                <h5 class="mb-1" style="font-weight:700;color:#1e293b;">{{ Auth::user()->name }}</h5>
                <p class="mb-3" style="color:#64748b;font-size:13.5px;">{{ Auth::user()->email }}</p>
                <span class="badge"
                    style="background:#dcfce7;color:#166534;border-radius:8px;padding:5px 14px;font-size:12px;">
                    <i class="mdi mdi-check-circle me-1"></i> Active Account
                </span>

                <hr style="border-color:#f1f5f9;margin:20px 0;">

                <div class="text-start">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div
                            style="width:34px;height:34px;border-radius:8px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;">
                            <i class="mdi mdi-email-outline" style="color:#64748b;"></i>
                        </div>
                        <div>
                            <div style="font-size:11px;color:#94a3b8;font-weight:600;">EMAIL</div>
                            <div style="font-size:13.5px;color:#334155;">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div
                            style="width:34px;height:34px;border-radius:8px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;">
                            <i class="mdi mdi-phone-outline" style="color:#64748b;"></i>
                        </div>
                        <div>
                            <div style="font-size:11px;color:#94a3b8;font-weight:600;">PHONE</div>
                            <div style="font-size:13.5px;color:#334155;">{{ Auth::user()->phone ?? '—' }}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div
                            style="width:34px;height:34px;border-radius:8px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;">
                            <i class="mdi mdi-map-marker-outline" style="color:#64748b;"></i>
                        </div>
                        <div>
                            <div style="font-size:11px;color:#94a3b8;font-weight:600;">ADDRESS</div>
                            <div style="font-size:13.5px;color:#334155;">{{ Auth::user()->address ?? '—' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Edit Profile Form ────────────────────────── --}}
        <div class="col-lg-8">
            <div class="ag-card">
                <h6 style="font-size:15px;font-weight:700;color:#1e293b;margin-bottom:22px;">
                    <i class="mdi mdi-pencil-outline me-1" style="color:#4f46e5;"></i>
                    Edit Profile Information
                </h6>

                <form action="{{ route('agent.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="ag-form-label">Full Name</label>
                            <input type="text" name="name" class="ag-form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="ag-form-label">Email Address</label>
                            <input type="email" name="email"
                                class="ag-form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', Auth::user()->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="ag-form-label">Phone Number</label>
                            <input type="text" name="phone"
                                class="ag-form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', Auth::user()->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="ag-form-label">Address</label>
                            <input type="text" name="address"
                                class="ag-form-control @error('address') is-invalid @enderror"
                                value="{{ old('address', Auth::user()->address) }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="ag-btn-primary">
                                <i class="mdi mdi-content-save-outline me-1"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
