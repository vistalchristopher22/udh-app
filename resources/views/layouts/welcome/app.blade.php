<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Welcome to {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template"/>
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose"/>
    <meta content="Themesbrand" name="author"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- css -->
    <link href="{{ asset('/landing/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/landing/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/landing/css/style.min.css') }}" rel="stylesheet" type="text/css"/>


    <!-- Scripts -->
    <style>
        * {
            font-family: Inter, sans-serif !important;
        }

        body {
            overflow-x: hidden;
        }
    </style>

    @stack('page-css')
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="20" class="home-4">
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>

<!--Navbar Start-->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top bg-white">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand logo d-flex align-items-center" href="/">
            <img src="{{ asset('/logo.png') }}" alt="" class="logo-dark" height="28"/>
            <img src="{{ asset('/logo.png') }}" alt="" class="logo-light" height="28"/>
            <strong class="text-uppercase mx-2">
                {{ config('app.name') }}
            </strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul id="navbar-navlist" class="navbar-nav ms-auto navbar-center">
                <li class="nav-item">
                    <a href="/" class="nav-link fw-medium">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('explore.index') }}" class="nav-link fw-medium">Explore</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link fw-medium">Contact Us</a>
                </li>
            </ul>
            <a href="{{ route('login') }}" class="btn btn-sm rounded-pill nav-btn ms-lg-3">Sign In</a>
        </div>
    </div>
    <!-- end container -->
</nav>
<!-- Navbar End -->
@yield('content')
<!-- Features end -->
<!-- Contact us start -->
<section id="contact" class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Get in Touch</h2>
                <p class="text-muted mb-5">Need to reach out? We are here to help, we value every interaction and
                    strive to provide the best customer service possible. Feel free to contact us for any questions,
                    comments, or partnership opportunities. You matter to us, and we're committed to delivering the
                    best service experience.</p>

                <div>
                    <form method="post" name="myForm" onsubmit="return validateForm()">
                        <p id="error-msg"></p>
                        <div id="simple-msg"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class="text-muted form-label">Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                           placeholder="Enter name*">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="email" class="text-muted form-label">Email</label>
                                    <input id="email" name="email" type="email" class="form-control"
                                           placeholder="Enter email*">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="subject" class="text-muted form-label">Subject</label>
                                    <input id="subject" type="text" class="form-control" name="subject"
                                           placeholder="Enter Subject.."/>
                                </div>

                                <div class="mb-4 pb-2">
                                    <label for="comments" class="text-muted form-label">Message</label>
                                    <textarea id="comments" name="comments" rows="4" class="form-control"
                                              placeholder="Enter your message. We're here to listen..."></textarea>
                                </div>

                                <button id="submit" type="submit" name="send"
                                        class="btn btn-primary">Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- end col -->

            <div class="col-lg-5 ms-lg-auto">
                <div class="mt-5 mt-lg-0">
                    <img src="/landing/images/contact.png" alt="" class="img-fluid d-block"/>
                    <p class="text-muted mt-5 mb-3">For any quick inquiries:</p>
                    <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="mail"></i>
                        Support@info.com</p>
                    <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="phone"></i>
                        +91 123 4556 789</p>
                    <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs"
                                                  data-feather="map-pin"></i> 2976 Edwards Street Rocky Mount, NC 27804
                    </p>
                    <p class="text-muted mb-3">Connect with us on social media to stay updated on latest offers,
                        news, and events:</p>
                    <ul class="list-inline pt-4">
                        <li class="list-inline-item me-3">
                            <a href="javascript: void(0);"
                               class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs"
                                                                                         data-feather="facebook"></i></a>
                        </li>
                        <li class="list-inline-item me-3">
                            <a href="javascript: void(0);"
                               class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs"
                                                                                         data-feather="twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);"
                               class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs"
                                                                                         data-feather="instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>

<!-- Contact us end -->

<!-- Footer Start -->
<footer class="footer" style="background-image: url('/landing/images/footer-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-4">
                    <a href="/"><img src="/landing/images/logo-light.png" alt="" class=""
                                                height="30"/></a>
                    <p class="text-white-50 my-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                        blanditiis praesentium voluptatum deleniti.</p>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-7 ms-lg-auto">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="mt-4 mt-lg-0">
                            <h4 class="text-white font-size-18 mb-3">Customer</h4>
                            <ul class="list-unstyled footer-sub-menu">
                                <li><a href="javascript: void(0);" class="footer-link">Works</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Strategy</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Releases</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Press</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Mission</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="mt-4 mt-lg-0">
                            <h4 class="text-white font-size-18 mb-3">Product</h4>
                            <ul class="list-unstyled footer-sub-menu">
                                <li><a href="javascript: void(0);" class="footer-link">Trending</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Popular</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Customers</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Features</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="mt-4 mt-lg-0">
                            <h4 class="text-white font-size-18 mb-3">Information</h4>
                            <ul class="list-unstyled footer-sub-menu">
                                <li><a href="javascript: void(0);" class="footer-link">Developers</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Support</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Customer Service</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Get Started</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Guide</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="mt-4 mt-lg-0">
                            <h4 class="text-white font-size-18 mb-3">Support</h4>
                            <ul class="list-unstyled footer-sub-menu">
                                <li><a href="javascript: void(0);" class="footer-link">FAQ</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Contact</a></li>
                                <li><a href="javascript: void(0);" class="footer-link">Disscusion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-5">
                    <p class="text-white-50 f-15 mb-0">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        © {{ config('app.name') }}
                    </p>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</footer>
<!-- Footer End -->

<!-- Style switcher -->
<div id="style-switcher">
    <div class="bottom">
        <a id="mode" href="javascript: void(0);" class="mode-btn text-white">
            <i class="mdi mdi-white-balance-sunny mode-light"></i>
            <i class="mdi mdi-moon-waning-crescent mode-dark"></i>
        </a>
        <a href="javascript: void(0);" class="settings" onclick="toggleSwitcher()"><i
                class="mdi mdi-cog  mdi-spin"></i></a>
    </div>
</div>

<!-- javascript -->
<script src="{{ asset('/landing/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/landing/js/smooth-scroll.polyfills.min.js') }}"></script>

<script src="https://unpkg.com/feather-icons"></script>

<!-- App Js -->
<script src="{{ asset('/landing/js/app.js') }}"></script>
@stack('page-scripts')
</body>


</html>
