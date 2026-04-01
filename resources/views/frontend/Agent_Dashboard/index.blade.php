@extends('frontend.Agent_Dashboard.app')

@section('title', 'Agent Dashboard')
@section('page-title', 'Dashboard')

@section('content')

    {{-- ── Stat Cards ─────────────────────────────────────────── --}}
    <div class="row g-4 mb-4">

        {{-- Welcome card --}}
        <div class="col-md-4">
            <div class="ag-card h-100 mb-0">
                <div class="d-flex align-items-center gap-3">
                    <div class="ag-stat-icon" style="background:#ede9fe;">
                        <i class="mdi mdi-account-tie" style="color:#7c3aed;"></i>
                    </div>
                    <div>
                        <div class="card-label">Welcome </div>
                        <div class="card-value" style="font-size:20px;">{{ Auth::user()->name }}</div>
                        <div class="card-sub">
                            @if (Auth::user()->status == 0)
                                <span class="badge"
                                    style="background:#fee2e2; color:#991b1b; border-radius:6px; font-size:11.5px; padding:3px 9px;">
                                    <i class="mdi mdi-close-circle me-1"></i>Not active — please contact admin
                                </span>
                            @else
                                <span class="badge"
                                    style="background:#dcfce7; color:#166534; border-radius:6px; font-size:11.5px; padding:3px 9px;">
                                    <i class="mdi mdi-check-circle me-1"></i>Active Account
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Commissions --}}
        <div class="col-md-4">
            <div class="ag-card h-100 mb-0">
                <div class="d-flex align-items-center gap-3">
                    <div class="ag-stat-icon" style="background:#fef3c7;">
                        <i class="mdi mdi-trophy-outline" style="color:#d97706;"></i>
                    </div>
                    <div>
                        <div class="card-label">Total Commissions</div>
                        <div class="card-value">{{ $commissions->count() }}</div>
                        <div class="card-sub">Assigned projects</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Amount --}}
        <div class="col-md-4">
            <div class="ag-card h-100 mb-0">
                <div class="d-flex align-items-center gap-3">
                    <div class="ag-stat-icon" style="background:#d1fae5;">
                        <i class="mdi mdi-currency-usd" style="color:#059669;"></i>
                    </div>
                    <div>
                        <div class="card-label">Total Amount</div>
                        <div class="card-value">{{ number_format($commissions->sum('amount'), 2) }}</div>
                        <div class="card-sub">Cumulative earnings</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Commission Table ─────────────────────────────────────── --}}
    <div class="ag-card ag-table-card p-0">
        <div class="d-flex align-items-center justify-content-between px-4 py-3" style="border-bottom:1px solid #f1f5f9;">
            <h6 class="mb-0" style="font-size:15px; color:#1e293b; font-weight:700;">
                <i class="mdi mdi-format-list-bulleted me-1" style="color:#4f46e5;"></i>
                Commission Records
            </h6>
            <span class="badge"
                style="background:#ede9fe; color:#5b21b6; border-radius:8px; padding:5px 12px; font-size:12px;">
                {{ $commissions->count() }} total
            </span>
        </div>

        @if ($commissions->isEmpty())
            <div class="text-center py-5">
                <i class="mdi mdi-inbox-outline" style="font-size:48px; color:#cbd5e1;"></i>
                <p class="mt-2 mb-0" style="color:#94a3b8; font-size:14px;">No commission records yet.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th style="width:50px;">#</th>
                            <th>Project</th>
                            <th>Commission Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commissions as $key => $commission)
                            <tr>
                                <td>
                                    <span
                                        style="background:#f1f5f9; color:#64748b; border-radius:6px; padding:2px 8px; font-size:12px; font-weight:600;">
                                        {{ $key + 1 }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div
                                            style="width:32px;height:32px;border-radius:8px;background:#ede9fe;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="mdi mdi-office-building-outline"
                                                style="color:#7c3aed;font-size:15px;"></i>
                                        </div>
                                        <span style="font-weight:500;">{{ $commission->project->property_name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span style="font-weight:700; color:#059669; font-size:15px;">
                                        {{ number_format($commission->amount, 2) }}
                                    </span>
                                </td>
                                <td>
                                    <div style="font-size:13px; color:#334155;">
                                        {{ $commission->created_at->format('M d, Y') }}
                                    </div>
                                    <div style="font-size:11.5px; color:#94a3b8;">
                                        {{ $commission->created_at->format('h:i A') }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
