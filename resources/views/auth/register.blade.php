<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Broker Registration | Estate Brokerage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Broker signup page" name="description" />
    <meta content="Estate Brokerage" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/assets/js/head.js') }}"></script>
    <style>
        :root {
            --ebi-primary: #b20101;
            --ebi-primary-dark: #7f0000;
            --ebi-bg: #f8fafc;
            --ebi-card: #ffffff;
            --ebi-text: #0f172a;
            --ebi-muted: #64748b;
        }

        body {
            background: radial-gradient(circle at top left, rgba(178, 1, 1, 0.24), transparent 30%),
                radial-gradient(circle at 88% 20%, rgba(245, 158, 11, 0.16), transparent 22%),
                linear-gradient(135deg, #0f172a 0%, #111827 48%, #1f2937 100%);
            color: #fff;
            min-height: 100vh;
        }

        .reg-card {
            border-radius: 1rem;
            background: #ffffff;
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.08);
            color: #0f172a;
        }

        .reg-btn {
            background: linear-gradient(135deg, var(--ebi-primary), var(--ebi-primary-dark));
            border-color: var(--ebi-primary);
            color: #ffffff;
        }

        .reg-btn:hover {
            background: linear-gradient(135deg, var(--ebi-primary-dark), #590000);
        }

        .form-label {
            font-weight: 600;
            color: #1f2937;
        }

        .page-head {
            padding-top: 120px;
            padding-bottom: 40px;
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .page-head h1 {
            color: #f97316;
            font-size: clamp(2rem, 5vw, 3rem);
        }

        .page-head p {
            color: #64748b;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="page-head">
            <h1>Become a Broker</h1>
            <p>Complete the broker registration with extra details and verification documents.</p>
        </div>

        <div class="reg-card p-4 p-md-5 mb-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Full Name *</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Age *</label>
                        <input id="age" type="number" name="age" min="18" max="80" value="{{ old('age') }}" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="username" class="form-label">Desired Username *</label>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address *</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone *</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="+8801XXXXXXXXX" required>
                    </div>

                    <div class="col-md-6">
                        <label for="current_address" class="form-label">Current Address *</label>
                        <input id="current_address" type="text" name="current_address" value="{{ old('current_address') }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="permanent_address" class="form-label">Permanent Address *</label>
                        <input id="permanent_address" type="text" name="permanent_address" value="{{ old('permanent_address') }}" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="photo" class="form-label">Profile Image</label>
                        <input id="photo" type="file" name="photo" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label for="id_document" class="form-label">ID Document (NID/Birth Certificate)</label>
                        <input id="id_document" type="file" name="id_document" class="form-control" accept="image/*">
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Password *</label>
                        <input id="password" type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm Password *</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="agree" required>
                    <label class="form-check-label" for="agree">I accept <a href="#">Terms & Conditions</a></label>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn reg-btn btn-lg w-100">Submit Broker Registration</button>
                </div>

                <p class="mt-3 text-center">Already have broker account? <a href="{{ route('login') }}">Sign In</a></p>
            </form>
        </div>
    </div>

    <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
</body>

</html>
