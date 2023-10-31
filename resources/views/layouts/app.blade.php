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

    @stack('page-css')


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
                    {{--                <li class="dropdown hide-phone"> --}}
                    {{--                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" --}}
                    {{--                       data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" --}}
                    {{--                       aria-expanded="false"> --}}
                    {{--                        <i data-feather="search" class="topbar-icon"></i> --}}
                    {{--                    </a> --}}

                    {{--                    <div class="dropdown-menu dropdown-menu-end dropdown-lg p-0"> --}}
                    {{--                        <!-- Top Search Bar --> --}}
                    {{--                        <div class="app-search-topbar"> --}}
                    {{--                            <form action="#" method="get"> --}}
                    {{--                                <input type="search" name="search" class="from-control top-search mb-0" --}}
                    {{--                                       placeholder="Type text..."> --}}
                    {{--                                <button type="submit"><i class="ti-search"></i></button> --}}
                    {{--                            </form> --}}
                    {{--                        </div> --}}
                    {{--                    </div> --}}
                    {{--                </li> --}}

                    {{--                <li class="dropdown notification-list"> --}}
                    {{--                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" --}}
                    {{--                       data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" --}}
                    {{--                       aria-expanded="false"> --}}
                    {{--                        <i data-feather="bell" class="align-self-center topbar-icon"></i> --}}
                    {{--                        <span class="badge bg-danger rounded-pill noti-icon-badge">2</span> --}}
                    {{--                    </a> --}}
                    {{--                    <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0"> --}}

                    {{--                        <h6 --}}
                    {{--                            class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center"> --}}
                    {{--                            Notifications <span class="badge bg-primary rounded-pill">2</span> --}}
                    {{--                        </h6> --}}
                    {{--                        <div class="notification-menu" data-simplebar> --}}
                    {{--                            <!-- item--> --}}
                    {{--                            <a href="#" class="dropdown-item py-3"> --}}
                    {{--                                <small class="float-end text-muted ps-2">2 min ago</small> --}}
                    {{--                                <div class="media"> --}}
                    {{--                                    <div class="avatar-md bg-soft-primary"> --}}
                    {{--                                        <i data-feather="shopping-cart" class="align-self-center icon-xs"></i> --}}
                    {{--                                    </div> --}}
                    {{--                                    <div class="media-body align-self-center ms-2 text-truncate"> --}}
                    {{--                                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6> --}}
                    {{--                                        <small class="text-muted mb-0">Dummy text of the printing and --}}
                    {{--                                            industry.</small> --}}
                    {{--                                    </div><!--end media-body--> --}}
                    {{--                                </div><!--end media--> --}}
                    {{--                            </a><!--end-item--> --}}
                    {{--                            <!-- item--> --}}
                    {{--                            <a href="#" class="dropdown-item py-3"> --}}
                    {{--                                <small class="float-end text-muted ps-2">10 min ago</small> --}}
                    {{--                                <div class="media"> --}}
                    {{--                                    <div class="avatar-md bg-soft-primary"> --}}
                    {{--                                        <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="" --}}
                    {{--                                             class="thumb-sm rounded-circle"> --}}
                    {{--                                    </div> --}}
                    {{--                                    <div class="media-body align-self-center ms-2 text-truncate"> --}}
                    {{--                                        <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6> --}}
                    {{--                                        <small class="text-muted mb-0">It is a long established fact that a --}}
                    {{--                                            reader.</small> --}}
                    {{--                                    </div><!--end media-body--> --}}
                    {{--                                </div><!--end media--> --}}
                    {{--                            </a><!--end-item--> --}}
                    {{--                            <!-- item--> --}}
                    {{--                            <a href="#" class="dropdown-item py-3"> --}}
                    {{--                                <small class="float-end text-muted ps-2">40 min ago</small> --}}
                    {{--                                <div class="media"> --}}
                    {{--                                    <div class="avatar-md bg-soft-primary"> --}}
                    {{--                                        <i data-feather="users" class="align-self-center icon-xs"></i> --}}
                    {{--                                    </div> --}}
                    {{--                                    <div class="media-body align-self-center ms-2 text-truncate"> --}}
                    {{--                                        <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6> --}}
                    {{--                                        <small class="text-muted mb-0">Dummy text of the printing.</small> --}}
                    {{--                                    </div><!--end media-body--> --}}
                    {{--                                </div><!--end media--> --}}
                    {{--                            </a><!--end-item--> --}}
                    {{--                            <!-- item--> --}}
                    {{--                            <a href="#" class="dropdown-item py-3"> --}}
                    {{--                                <small class="float-end text-muted ps-2">1 hr ago</small> --}}
                    {{--                                <div class="media"> --}}
                    {{--                                    <div class="avatar-md bg-soft-primary"> --}}
                    {{--                                        <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="" --}}
                    {{--                                             class="thumb-sm rounded-circle"> --}}
                    {{--                                    </div> --}}
                    {{--                                    <div class="media-body align-self-center ms-2 text-truncate"> --}}
                    {{--                                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6> --}}
                    {{--                                        <small class="text-muted mb-0">It is a long established fact that a --}}
                    {{--                                            reader.</small> --}}
                    {{--                                    </div><!--end media-body--> --}}
                    {{--                                </div><!--end media--> --}}
                    {{--                            </a><!--end-item--> --}}
                    {{--                            <!-- item--> --}}
                    {{--                            <a href="#" class="dropdown-item py-3"> --}}
                    {{--                                <small class="float-end text-muted ps-2">2 hrs ago</small> --}}
                    {{--                                <div class="media"> --}}
                    {{--                                    <div class="avatar-md bg-soft-primary"> --}}
                    {{--                                        <i data-feather="check-circle" class="align-self-center icon-xs"></i> --}}
                    {{--                                    </div> --}}
                    {{--                                    <div class="media-body align-self-center ms-2 text-truncate"> --}}
                    {{--                                        <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6> --}}
                    {{--                                        <small class="text-muted mb-0">Dummy text of the printing.</small> --}}
                    {{--                                    </div><!--end media-body--> --}}
                    {{--                                </div><!--end media--> --}}
                    {{--                            </a><!--end-item--> --}}
                    {{--                        </div> --}}
                    {{--                        <!-- All--> --}}
                    {{--                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary"> --}}
                    {{--                            View all <i class="fi-arrow-right"></i> --}}
                    {{--                        </a> --}}
                    {{--                    </div> --}}
                    {{--                </li> --}}
                    <li class="dropdown">
                        <a class="nav-item" href="{{ route('logout') }}"
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
                @yield('content')
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
    @stack('page-scripts')
</body>

</html>
