<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Agent Dashboard')</title>
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" id="app-style">
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/assets/js/head.js') }}"></script>
    <style>
        :root {
            --sidebar-width: 240px;
            --topbar-height: 60px;
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --sidebar-bg: #1e1b4b;
            --sidebar-text: #c7d2fe;
            --sidebar-hover: #312e81;
            --sidebar-active: #4f46e5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: #f1f5f9;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            margin: 0;
            min-height: 100vh;
        }

        /* ── Sidebar ─────────────────────────────── */
        .ag-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform .3s ease;
        }

        .ag-sidebar .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
            text-decoration: none;
        }

        .ag-sidebar .sidebar-brand img {
            height: 34px;
            border-radius: 6px;
        }

        .ag-sidebar .sidebar-brand span {
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: .3px;
        }

        .ag-sidebar .sidebar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        .ag-sidebar .sidebar-user .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }

        .ag-sidebar .sidebar-user .user-info .name {
            color: #fff;
            font-weight: 600;
            font-size: 13.5px;
            line-height: 1.3;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 160px;
        }

        .ag-sidebar .sidebar-user .user-info .role {
            color: var(--sidebar-text);
            font-size: 11.5px;
        }

        .ag-nav {
            list-style: none;
            margin: 12px 0 0;
            padding: 0 10px;
            flex: 1;
        }

        .ag-nav .nav-label {
            color: rgba(199, 210, 254, .45);
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: .8px;
            text-transform: uppercase;
            padding: 10px 10px 4px;
        }

        .ag-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: background .18s, color .18s;
            margin-bottom: 2px;
        }

        .ag-nav a i {
            font-size: 17px;
            flex-shrink: 0;
            width: 20px;
            text-align: center;
        }

        .ag-nav a:hover {
            background: var(--sidebar-hover);
            color: #fff;
        }

        .ag-nav a.active {
            background: var(--primary);
            color: #fff;
        }

        .ag-nav a.nav-logout {
            color: #fca5a5;
        }

        .ag-nav a.nav-logout:hover {
            background: rgba(239, 68, 68, .2);
            color: #f87171;
        }

        .sidebar-footer {
            padding: 14px 20px;
            border-top: 1px solid rgba(255, 255, 255, .08);
            color: rgba(199, 210, 254, .4);
            font-size: 11.5px;
            text-align: center;
        }

        /* ── Top Bar ─────────────────────────────── */
        .ag-topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            z-index: 999;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .06);
        }

        .ag-topbar .page-heading {
            font-size: 17px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .ag-topbar .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .ag-topbar .topbar-right .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #334155;
            font-weight: 500;
            font-size: 13.5px;
            padding: 6px 10px;
            border-radius: 8px;
            transition: background .15s;
        }

        .ag-topbar .topbar-right .dropdown-toggle:hover {
            background: #f1f5f9;
        }

        .ag-topbar .topbar-right .user-avatar-sm {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
        }

        /* Hamburger for mobile */
        .ag-topbar .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            color: #334155;
            cursor: pointer;
            margin-right: 10px;
        }

        /* ── Main Content ─────────────────────────── */
        .ag-main {
            margin-left: var(--sidebar-width);
            padding-top: var(--topbar-height);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .ag-content {
            flex: 1;
            padding: 28px 28px 0;
        }

        .ag-footer {
            margin-left: 0;
            padding: 16px 28px;
            color: #94a3b8;
            font-size: 12.5px;
            border-top: 1px solid #e2e8f0;
            background: #fff;
            margin-top: 32px;
        }

        /* ── Card Styles ──────────────────────────── */
        .ag-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .06), 0 0 0 1px rgba(0, 0, 0, .04);
            padding: 24px;
            margin-bottom: 24px;
        }

        .ag-card .card-label {
            font-size: 11.5px;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 6px;
        }

        .ag-card .card-value {
            font-size: 26px;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.2;
        }

        .ag-card .card-sub {
            font-size: 13px;
            color: #64748b;
            margin-top: 6px;
        }

        .ag-stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        /* ── Table ────────────────────────────────── */
        .ag-table-card {
            border-radius: 14px;
            overflow: hidden;
        }

        .ag-table-card .table {
            margin: 0;
        }

        .ag-table-card .table thead th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 16px;
        }

        .ag-table-card .table tbody td {
            vertical-align: middle;
            padding: 13px 16px;
            color: #334155;
            font-size: 13.5px;
            border-bottom: 1px solid #f1f5f9;
        }

        .ag-table-card .table tbody tr:last-child td {
            border-bottom: none;
        }

        .ag-table-card .table tbody tr:hover td {
            background: #fafbff;
        }

        /* ── Form styles ──────────────────────────── */
        .ag-form-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .ag-form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            width: 100%;
            transition: border-color .18s, box-shadow .18s;
            outline: none;
            background: #fff;
            color: #1e293b;
        }

        .ag-form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .12);
        }

        .ag-btn-primary {
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 9px;
            padding: 11px 28px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background .18s, transform .12s;
        }

        .ag-btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* ── Alerts ───────────────────────────────── */
        .ag-alert {
            border-radius: 10px;
            padding: 13px 18px;
            font-size: 13.5px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .ag-alert-success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .ag-alert-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* ── Breadcrumb ───────────────────────────── */
        .ag-breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 22px;
        }

        .ag-breadcrumb a {
            color: #64748b;
            text-decoration: none;
        }

        .ag-breadcrumb a:hover {
            color: var(--primary);
        }

        .ag-breadcrumb .sep {
            color: #cbd5e1;
        }

        .ag-breadcrumb .current {
            color: #1e293b;
            font-weight: 500;
        }

        /* ── Overlay for mobile ───────────────────── */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .4);
            z-index: 999;
        }

        @media (max-width: 768px) {
            .ag-sidebar {
                transform: translateX(-100%);
            }

            .ag-sidebar.open {
                transform: translateX(0);
            }

            .ag-topbar {
                left: 0;
            }

            .ag-topbar .sidebar-toggle {
                display: block;
            }

            .ag-main {
                margin-left: 0;
            }

            .ag-content {
                padding: 20px 16px 0;
            }

            .sidebar-overlay.open {
                display: block;
            }
        }
    </style>
    @stack('styles')
</head>

<body>

    <!-- Sidebar overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ── Sidebar ─────────────────────────────────────── -->
    <aside class="ag-sidebar" id="agSidebar">
        <a href="{{ route('agent.dashboard') }}" class="sidebar-brand">
            @php $logo = App\Models\Logo::first(); @endphp
            @if ($logo)
                <img src="{{ asset($logo->favicon_image) }}" alt="Logo">
            @endif
            <span>Agent Portal</span>
        </a>

        <div class="sidebar-user">
            <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div class="user-info">
                <div class="name">{{ Auth::user()->name }}</div>
                <div class="role">Sales Agent</div>
            </div>
        </div>

        <ul class="ag-nav">
            <li class="nav-label">Main</li>
            <li>
                <a href="{{ route('agent.dashboard') }}"
                    class="{{ request()->routeIs('agent.dashboard') ? 'active' : '' }}">
                    <i class="mdi mdi-view-dashboard-outline"></i> Dashboard
                </a>
            </li>

            <li class="nav-label">Account</li>
            <li>
                <a href="{{ route('agent.profile') }}"
                    class="{{ request()->routeIs('agent.profile') ? 'active' : '' }}">
                    <i class="mdi mdi-account-circle-outline"></i> My Profile
                </a>
            </li>
            <li>
                <a href="{{ route('agent.change.password') }}"
                    class="{{ request()->routeIs('agent.change.password') ? 'active' : '' }}">
                    <i class="mdi mdi-lock-outline"></i> Change Password
                </a>
            </li>

            <li class="nav-label">Session</li>
            <li>
                <a href="{{ route('agent.logout') }}" class="nav-logout">
                    <i class="mdi mdi-logout-variant"></i> Logout
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            &copy; {{ date('Y') }} AJ Group
        </div>
    </aside>

    <!-- ── Top Bar ─────────────────────────────────────── -->
    <div class="ag-topbar">
        <div class="d-flex align-items-center">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="mdi mdi-menu"></i>
            </button>
            <h5 class="page-heading">@yield('page-title', 'Dashboard')</h5>
        </div>
        <div class="topbar-right">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="user-avatar-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    {{ Auth::user()->name }}
                    <i class="mdi mdi-chevron-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0"
                    style="border-radius:10px; min-width:200px; margin-top:8px;">
                    <li>
                        <div class="px-3 py-2 border-bottom">
                            <small class="text-muted">Signed in as</small>
                            <div class="fw-semibold" style="font-size:13.5px;">{{ Auth::user()->email }}</div>
                        </div>
                    </li>
                    <li><a class="dropdown-item py-2" href="{{ route('agent.profile') }}"><i
                                class="mdi mdi-account-outline me-2"></i>My Profile</a></li>
                    <li><a class="dropdown-item py-2" href="{{ route('agent.change.password') }}"><i
                                class="mdi mdi-lock-outline me-2"></i>Change Password</a></li>
                    <li>
                        <hr class="dropdown-divider my-1">
                    </li>
                    <li><a class="dropdown-item py-2 text-danger" href="{{ route('agent.logout') }}"><i
                                class="mdi mdi-logout me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ── Main ────────────────────────────────────────── -->
    <div class="ag-main">
        <div class="ag-content">

            {{-- Session alerts --}}
            @if (session('success'))
                <div class="ag-alert ag-alert-success">
                    <i class="mdi mdi-check-circle" style="font-size:18px;"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="ag-alert ag-alert-error">
                    <i class="mdi mdi-alert-circle" style="font-size:18px;"></i>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>

        <footer class="ag-footer">
            &copy; {{ date('Y') }} AJ Group &mdash; Agent Portal
        </footer>
    </div>

    <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
    <script>
        // Mobile sidebar toggle
        const sidebar = document.getElementById('agSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        document.getElementById('sidebarToggle').addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('open');
        });
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('open');
        });
    </script>
    @stack('scripts')
</body>

</html>
