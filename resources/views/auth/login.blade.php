<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | Sign in your account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="{{ config('app.name') }}" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <style>
        body {
            font-family: Inter, sans-serif !important;
        }
    </style>
</head>

<body class="account-body accountbg">
    <!-- Log In page -->
    <div class="container" id="app">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="{{ asset('logo.png') }}" height="50" alt="logo"
                                            class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Started
                                        {{ config('app.name') }}</h4>
                                    <p class="text-muted  mb-0">Sign in to continue to {{ config('app.name') }}.</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                                        <form class="form-horizontal auth-form" action="/login" method="POST">
                                            @csrf
                                            <Login />
                                        </form>

                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- End Log In page -->



</body>

@vite('resources/js/app.js')

</html>
