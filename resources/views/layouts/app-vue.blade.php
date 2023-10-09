<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- @vite(['resources/js/app.js']) --}}

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- Scripts -->

    <style>
        * {
            font-family: Inter, sans-serif !important;
        }

        .required:after {
            content: ' *';
            color: red;
        }
    </style>
</head>

<body class="dark-sidenav navy-sidenav">
    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <!-- LOGO -->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                </span>
                <span>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                @include('includes.navbar')
            </ul>

        </div>
    </div>
    <!-- end left-sidenav-->


    <div class="page-wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    <li class="dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="pages-profile.html"><i data-feather="user"
                                    class="align-self-center icon-xs icon-dual me-1"></i>
                                Profile</a>
                            <a class="dropdown-item" href="apps-contact-list.html"><i data-feather="users"
                                    class="align-self-center icon-xs icon-dual me-1"></i>
                                Contacts</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="auth-login.html"><i data-feather="power"
                                    class="align-self-center icon-xs icon-dual me-1"></i>
                                Logout</a>

                        </div>
                    </li>
                </ul><!--end topbar-nav-->


            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">@yield('page-title')</h4>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
                <div id="app">
                    @yield('content')
                </div>
            </div><!-- container -->

            <footer class="footer text-center text-sm-start">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                {{ config('app.name') }}
                {{-- <span class="text-muted d-none d-sm-inline-block float-end">Crafted
                    with <i class="mdi mdi-heart text-danger"></i> by {{ config('app.name') }}</span> --}}
            </footer><!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->


    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @vite('resources/js/app.js')
</body>

</html>
