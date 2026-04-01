@extends('frontend.Agent_Dashboard.app')

@section('title', 'Change Password')
@section('page-title', 'Change Password')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="ag-card">
                <div class="text-center mb-4">
                    <div
                        style="width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,#4f46e5,#7c3aed);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;">
                        <i class="mdi mdi-lock-outline" style="font-size:28px;color:#fff;"></i>
                    </div>
                    <h5 style="font-weight:700;color:#1e293b;margin-bottom:4px;">Update Password</h5>
                    <p style="color:#64748b;font-size:13.5px;margin:0;">Keep your account secure with a strong password.</p>
                </div>

                @if ($errors->any())
                    <div class="ag-alert ag-alert-error mb-3">
                        <i class="mdi mdi-alert-circle" style="font-size:18px;"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="{{ route('agent.update.password') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="ag-form-label" for="current_password">Current Password</label>
                        <div style="position:relative;">
                            <input type="password" id="current_password" name="current_password" class="ag-form-control"
                                placeholder="Enter current password" required style="padding-right:44px;">
                            <button type="button" class="pw-toggle" data-target="current_password"
                                style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:#94a3b8;cursor:pointer;font-size:18px;">
                                <i class="mdi mdi-eye-outline"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="ag-form-label" for="new_password">New Password</label>
                        <div style="position:relative;">
                            <input type="password" id="new_password" name="new_password" class="ag-form-control"
                                placeholder="Minimum 6 characters" required style="padding-right:44px;">
                            <button type="button" class="pw-toggle" data-target="new_password"
                                style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:#94a3b8;cursor:pointer;font-size:18px;">
                                <i class="mdi mdi-eye-outline"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="ag-form-label" for="new_password_confirmation">Confirm New Password</label>
                        <div style="position:relative;">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="ag-form-control" placeholder="Repeat new password" required
                                style="padding-right:44px;">
                            <button type="button" class="pw-toggle" data-target="new_password_confirmation"
                                style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:#94a3b8;cursor:pointer;font-size:18px;">
                                <i class="mdi mdi-eye-outline"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="ag-btn-primary w-100">
                        <i class="mdi mdi-lock-reset me-1"></i> Update Password
                    </button>
                </form>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.pw-toggle').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = document.getElementById(this.dataset.target);
                const isText = input.type === 'text';
                input.type = isText ? 'password' : 'text';
                this.querySelector('i').className = isText ? 'mdi mdi-eye-outline' :
                    'mdi mdi-eye-off-outline';
            });
        });
    </script>
@endpush
