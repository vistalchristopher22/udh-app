<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/js/app.js'])

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">


    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />


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
            {{-- <nav class="navbar-custom">
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


            </nav> --}}

            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    <li class="dropdown hide-phone">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search topbar-icon">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-lg p-0">
                            <!-- Top Search Bar -->
                            <div class="app-search-topbar">
                                <form action="#" method="get">
                                    <input type="search" name="search" class="from-control top-search mb-0"
                                        placeholder="Type text...">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-bell align-self-center topbar-icon">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span class="badge bg-danger rounded-pill noti-icon-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

                            <h6
                                class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                                Notifications <span class="badge bg-primary rounded-pill">2</span>
                            </h6>
                            <div class="notification-menu" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper"
                                                style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <!-- item-->
                                                    <a href="#" class="dropdown-item py-3">
                                                        <small class="float-end text-muted ps-2">2 min ago</small>
                                                        <div class="media">
                                                            <div class="avatar-md bg-soft-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-shopping-cart align-self-center icon-xs">
                                                                    <circle cx="9" cy="21" r="1">
                                                                    </circle>
                                                                    <circle cx="20" cy="21" r="1">
                                                                    </circle>
                                                                    <path
                                                                        d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div
                                                                class="media-body align-self-center ms-2 text-truncate">
                                                                <h6 class="my-0 fw-normal text-dark">Your order is
                                                                    placed</h6>
                                                                <small class="text-muted mb-0">Dummy text of the
                                                                    printing and industry.</small>
                                                            </div><!--end media-body-->
                                                        </div><!--end media-->
                                                    </a><!--end-item-->
                                                    <!-- item-->
                                                    <a href="#" class="dropdown-item py-3">
                                                        <small class="float-end text-muted ps-2">10 min ago</small>
                                                        <div class="media">
                                                            <div class="avatar-md bg-soft-primary">
                                                                <img src="assets/images/users/user-4.jpg"
                                                                    alt="" class="thumb-sm rounded-circle">
                                                            </div>
                                                            <div
                                                                class="media-body align-self-center ms-2 text-truncate">
                                                                <h6 class="my-0 fw-normal text-dark">Meeting with
                                                                    designers</h6>
                                                                <small class="text-muted mb-0">It is a long established
                                                                    fact that a reader.</small>
                                                            </div><!--end media-body-->
                                                        </div><!--end media-->
                                                    </a><!--end-item-->
                                                    <!-- item-->
                                                    <a href="#" class="dropdown-item py-3">
                                                        <small class="float-end text-muted ps-2">40 min ago</small>
                                                        <div class="media">
                                                            <div class="avatar-md bg-soft-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-users align-self-center icon-xs">
                                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                                                                    </path>
                                                                    <circle cx="9" cy="7" r="4">
                                                                    </circle>
                                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                                </svg>
                                                            </div>
                                                            <div
                                                                class="media-body align-self-center ms-2 text-truncate">
                                                                <h6 class="my-0 fw-normal text-dark">UX 3 Task
                                                                    complete.</h6>
                                                                <small class="text-muted mb-0">Dummy text of the
                                                                    printing.</small>
                                                            </div><!--end media-body-->
                                                        </div><!--end media-->
                                                    </a><!--end-item-->
                                                    <!-- item-->
                                                    <a href="#" class="dropdown-item py-3">
                                                        <small class="float-end text-muted ps-2">1 hr ago</small>
                                                        <div class="media">
                                                            <div class="avatar-md bg-soft-primary">
                                                                <img src="assets/images/users/user-5.jpg"
                                                                    alt="" class="thumb-sm rounded-circle">
                                                            </div>
                                                            <div
                                                                class="media-body align-self-center ms-2 text-truncate">
                                                                <h6 class="my-0 fw-normal text-dark">Your order is
                                                                    placed</h6>
                                                                <small class="text-muted mb-0">It is a long established
                                                                    fact that a reader.</small>
                                                            </div><!--end media-body-->
                                                        </div><!--end media-->
                                                    </a><!--end-item-->
                                                    <!-- item-->
                                                    <a href="#" class="dropdown-item py-3">
                                                        <small class="float-end text-muted ps-2">2 hrs ago</small>
                                                        <div class="media">
                                                            <div class="avatar-md bg-soft-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-check-circle align-self-center icon-xs">
                                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                    <polyline points="22 4 12 14.01 9 11.01">
                                                                    </polyline>
                                                                </svg>
                                                            </div>
                                                            <div
                                                                class="media-body align-self-center ms-2 text-truncate">
                                                                <h6 class="my-0 fw-normal text-dark">Payment
                                                                    Successfull</h6>
                                                                <small class="text-muted mb-0">Dummy text of the
                                                                    printing.</small>
                                                            </div><!--end media-body-->
                                                        </div><!--end media-->
                                                    </a><!--end-item-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                </div>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span class="ms-1 nav-user-name hidden-sm">Nick</span>
                            <img src="assets/images/users/user-5.jpg" alt="profile-user"
                                class="rounded-circle thumb-xs">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="pages-profile.html"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-user align-self-center icon-xs icon-dual me-1">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> Profile</a>
                            <a class="dropdown-item" href="apps-contact-list.html"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-users align-self-center icon-xs icon-dual me-1">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg> Contacts</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="auth-login.html"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-power align-self-center icon-xs icon-dual me-1">
                                    <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                    <line x1="12" y1="2" x2="12" y2="12"></line>
                                </svg> Logout</a>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="nav-link button-menu-mobile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-menu align-self-center topbar-icon">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </button>
                    </li>
                </ul>
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
</body>

</html>
