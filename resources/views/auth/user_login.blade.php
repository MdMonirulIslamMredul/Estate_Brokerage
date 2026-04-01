<!doctype html>
<html lang="en">


<!-- Mirrored from shreethemes.in/towntor/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 05:10:02 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Towntor - Real Estate Bootstrap 5 Landing Template</title>
    <meta name="description" content="Real Estate Bootstrap 5 Landing Template" />
    <meta name="keywords"
        content="Onepage, creative, modern, bootstrap 5, multipurpose, clean, Real Estate, buy, sell, Rent" />
    <meta name="author" content="Shreethemes" />
    <meta name="website" content="https://shreethemes.in/" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="version" content="1.0.0" />
    <!-- favicon -->
    <link href="{{ asset('frontend/assets') }}/images/favicon.ico" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/assets') }}/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!--Material Icon -->
    <link href="{{ asset('frontend/assets') }}/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom  Css -->
    <link href="{{ asset('frontend/assets') }}/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />

</head>

<body>
    <!-- Start Hero -->
    <section class="bg-home zoom-image d-flex align-items-center">
        <div class="bg-overlay image-wrap"
            style="background: url({{ asset('frontend/assets/images/bg/03.jpg') }}) center;"></div>
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="p-4 bg-white rounded-3 shadow-md mx-auto w-100" style="max-width: 400px;">
                        <form>
                            <a href="index.html"><img src="{{ asset('frontend/assets') }}/images/logo-icon-80.png"
                                    class="mb-4 d-block mx-auto" alt=""></a>
                            <h5 class="mb-3">Please sign in</h5>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label text-muted" for="flexCheckDefault">Remember
                                            me</label>
                                    </div>
                                </div>
                                <span class="forgot-pass text-muted mb-0"><a href="auth-reset-password.html"
                                        class="text-muted">Forgot password ?</a></span>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Sign in</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted me-2">Don't have an account ?</span> <a
                                        href="auth-signup.html" class="text-dark fw-medium">Sign Up</a></span>
                            </div><!--end col-->
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- ENd Hero -->

    <!-- javascript -->
    <script src="{{ asset('frontend/assets') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Icons -->
    <script src="{{ asset('frontend/assets') }}/js/feather.min.js"></script>
    <!-- Custom -->
    <script src="{{ asset('frontend/assets') }}/js/plugins.init.js"></script>
    <script src="{{ asset('frontend/assets') }}/js/app.js"></script>

</body>


<!-- Mirrored from shreethemes.in/towntor/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 05:10:03 GMT -->

</html>
