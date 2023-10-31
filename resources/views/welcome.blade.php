<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Welcome to {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesbrand" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- css -->
    <link href="{{ asset('/landing/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/landing/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/landing/css/style.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- Scripts -->
    <style>
        * {
            font-family: Inter, sans-serif !important;
        }

        body {
            overflow-x: hidden;
        }
    </style>
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
            <a class="navbar-brand logo" href="index-1.html">
                <img src="{{ asset('/logo.png') }}" alt="" class="logo-dark" height="28" />
                <img src="{{ asset('/logo.png') }}" alt="" class="logo-light" height="28" />
                <strong>
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
                        <a href="#home" class="nav-link fw-medium">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#services" class="nav-link fw-medium">Explore</a>
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

    <!-- Hero Start -->
    <section id="home" class="hero-4 position-relative bg-light"
        style="background-image: url(/landing/images/hero-4-bg.jpg);">
        <div class="bg-overlay bg-dark"></div>
        <div class="bg-overlay-img" style="background-image: url(/landing/images/hero-4-overlay.png);"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <h1 class="font-weight-semibold mb-4 hero-4-title">Transform Data and Innovation with Our Data
                        Solutions</h1>
                    <p class="mb-5 text-muted">
                        Harness the unparalleled potential of data through our University Data Hub. We offer
                        cutting-edge data analytics solutions that elevate research, optimize operational efficiency,
                        and fuel groundbreaking innovation in the academic landscape.
                    </p>
                    <a href="#" class="btn btn-lg btn-primary me-2">Explore Documents</a>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </section>


    <!-- Hero End -->
    <section class="section bg-gradient-primary mt-5">
        <div class="bg-overlay-img" style="background-image: url(/landing/images/demos.png);"></div>

        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="text-center counter-box">
                    <h1 class="text-white">600+</h1>
                    <p class="text-white mb-0">Searches</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center counter-box">
                    <h1 class="text-white">3+</h1>
                    <p class="text-white mb-0">Downloads</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center counter-box">
                    <h1 class="text-white">197+</h1>
                    <p class="text-white mb-0">Visits</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center counter-box">
                    <h1 class="text-white">1440+</h1>
                    <p class="text-white mb-0">Users</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Services start -->
    <section id="data-hub-cycles" class="section">
        <div class="container">
            <div class="row justify-content-center mb-2">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bolder">Data Hub Cycles</h2>
                    <p class="text-muted">Explore the meticulously crafted cycles and processes that fuel
                        our university's innovative data hub.</p>
                </div>
            </div>

            <!-- Cycle Cards -->
            <div class="row">
                <!-- Cycle 1 -->
                <div class="col-lg-4">
                    <div class="card plan-card mt-4 rounded text-center overflow-hidden">
                        <div class="card-body px-4 py-5">
                            <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    viewBox="0 0 64 64">
                                    <path d="M32 4a28 28 0 0 0-1 56h2a28 28 0 0 0 1-56z" fill="#F07600" />
                                    <path d="M32 60a28 28 0 0 0 1-56h-2a28 28 0 0 0-1 56z" fill="#FFBD31" />
                                    <path d="M60 32a28 28 0 0 0-56-1v2a28 28 0 0 0 56 1z" fill="#F07600" />
                                    <path d="M4 32a28 28 0 0 0 56 1v-2a28 28 0 0 0-56-1z" fill="#FFBD31" />
                                    <path d="M32 0a32 32 0 0 0-1 64h2a32 32 0 0 0 1-64z" fill="#F07600" />
                                    <path d="M32 64a32 32 0 0 0 1-64h-2a32 32 0 0 0-1 64z" fill="#FFBD31" />
                                    <path d="M0 32a32 32 0 0 0 64-1v2a32 32 0 0 0-64 1z" fill="#F07600" />
                                    <path d="M64 32a32 32 0 0 0-64-1v2a32 32 0 0 0 64 1z" fill="#FFBD31" />
                                </svg>
                            </div>
                            <h4 class="text-uppercase mb-4 pb-1">Data Collection</h4>
                            <p class="text-muted mb-0 text-justify">Data Collection is the foundational
                                stage of our data hub's workflow. We gather data from various sources
                                employing cutting-edge tools and methodologies to acquire data efficiently
                                and ethically.</p>
                        </div>
                    </div>
                </div>

                <!-- Cycle 2 -->
                <div class="col-lg-4">
                    <div class="card plan-card mt-4 rounded text-center overflow-hidden">
                        <div class="card-body px-4 py-5">
                            <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">

                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    viewBox="0 0 64 64">
                                    <path
                                        d="M52.859 11.129c-12.5-12.498-32.758-12.498-45.257 0-12.5 12.499-12.5 32.759 0 45.258 12.499 12.5 32.758 12.5 45.257 0 12.5-12.499 12.5-32.759 0-45.258zM48.738 15.262c11.171 11.171 11.171 29.294 0 40.465-11.172 11.17-29.293 11.171-40.465 0-11.171-11.171-11.171-29.294 0-40.465 11.172-11.17 29.293-11.171 40.465 0z"
                                        fill="#34A853" />
                                    <path
                                        d="M32 6.132c-11.598 0-22.153 4.489-30.175 11.86l9.211 7.947c4.271-3.243 9.723-5.224 15.964-5.224 15.214 0 27.648 12.429 27.648 27.648 0 2.39-.304 4.728-.876 6.97H62.28C63.639 45.008 64 38.629 64 32c0-17.645-14.355-31.868-32-31.868z"
                                        fill="#0F9D58" />
                                    <path
                                        d="M6.325 19.675c-1.887 2.68-3.171 5.875-3.82 9.325H0.462C.178 24.07.001 28.008 0 32s.178 7.93.462 13.675h1.042c.649 3.45 1.933 6.645 3.82 9.325L15 32 6.325 19.675z"
                                        fill="#FBBB00" />
                                    <path
                                        d="M32 62c4.698 0 9.127-1.674 12.572-4.72l-6.101-5.273c-1.705 1.142-3.712 1.992-6.127 1.992-4.946 0-9.155-3.342-10.609-7.924H1.044C2.475 58.815 16.668 62 32 62z"
                                        fill="#EB4335" />
                                </svg>

                            </div>
                            <h4 class="text-uppercase mb-4 pb-1">Data Processing</h4>
                            <p class="text-muted mb-0 text-justify">Data Processing is where we transform
                                raw data into actionable insights. We employ advanced algorithms and
                                statistical techniques for accurate, consistent, and meaningful data.</p>
                        </div>
                    </div>
                </div>

                <!-- Cycle 3 -->
                <div class="col-lg-4">
                    <div class="card plan-card mt-4 rounded text-center overflow-hidden">
                        <div class="card-body px-4 py-5">
                            <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    viewBox="0 0 64 64">
                                    <path d="M16 58h32v4H16zm42-4v4h4v-4z" fill="#34A853" />
                                    <path d="M62 16v32H30V16h32zm-4 28V20H34v24h24z" fill="#0F9D58" />
                                    <path
                                        d="M30 16v32h-8V16h8zm-8 4H16v24h6v-24zm-4 26v-4h-4v4h4zm-4-6v-4h-4v4h4zm0-6v-4h-4v4h4zm4-6v-4h-4v4h4zm0-6v-4h-4v4h4z"
                                        fill="#FBBB00" />
                                    <path d="M16 62h32v4H16zm42-4v4h4v-4z" fill="#EB4335" />
                                </svg>
                            </div>
                            <h4 class="text-uppercase mb-4 pb-1">Data Storage</h4>
                            <p class="text-muted mb-0 text-justify">Data Storage safeguards your valuable
                                data in state-of-the-art storage systems. We ensure data integrity,
                                availability, and confidentiality through robust security measures.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <!-- Key Features Section -->
    <section id="key-features" class="bg-light py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bold">Key Features</h2>
                    <p class="text-muted">Experience the ease, efficiency, and power of our next-generation data
                        platform.</p>
                </div>
            </div>
            <!-- Features List -->
            <div class="row">
                <!-- Feature 1 -->
                <div class="col-lg-4 mb-4">
                    <div class="card ">
                        <div class="card-body p-4">
                            <div class="mt-2 mb-3 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                </svg>
                            </div>
                            <h4 class="card-title text-center">Drag-and-drop Feature</h4>
                            <p class="card-text">Our drag-and-drop feature makes it easy for anyone to publish open
                                data, regardless of skill level.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                    <path
                                        d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    <path
                                        d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                                </svg>
                            </div>
                            <h4 class="card-title text-center">User-friendly Interface</h4>
                            <p class="card-text">Say goodbye to frustration as you navigate and explore your data with our incredibly user-friendly and intuitive interface.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-3 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    fill="currentColor" class="bi bi-diagram-3-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1z" />
                                </svg>
                            </div>

                            <h4 class="card-title text-center">Data Visualization</h4>
                            <p class="card-text">Empower your users to uncover insights and trends in your open data
                                with our powerful self-service visualization tools.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 4 -->
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-3 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </div>
                            <h4 class="card-title text-center">Quick Insights</h4>
                            <p class="card-text">Make your data come alive with our beautiful charts and quick insights
                                - showcasing your data easier.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 5 -->
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-3 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </div>
                            <h4 class="card-title text-center">Real-time Communication</h4>
                            <p class="card-text">Get the best features from CKAN. Perfect for organizations looking for
                                a lightweight and cost-effective solution.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 6 -->
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="mb-3 mt-2 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                    fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                                </svg>
                            </div>
                            <h4 class="card-title text-center">Quick Repository Access</h4>
                            <p class="card-text">Get more done, with less hassle without worrying about maintenance and
                                support. On our cloud or yours. You choose.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Features start -->
    <section id="document-search" class="section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bold">Search Documents</h2>
                    <p class="text-muted">Find the documents you need easily and efficiently using our advanced search
                        features.</p>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-lg-7">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search for documents...">
                        <button class="btn btn-primary btn-sm" type="button">Search</button>
                    </div>
                    <p class="text-muted">Tip: Use keywords, tags, or document IDs for better search results.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4 text-center">How to Search Effectively</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="icon-lg me-3" data-feather="search"></i>
                            <div>
                                <h5 class="mt-2">Simple Search</h5>
                                <p class="text-muted">Start with a general keyword that defines what you're looking
                                    for.</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="icon-lg me-3" data-feather="filter"></i>
                            <div>
                                <h5 class="mt-2">Use Filters</h5>
                                <p class="text-muted">Narrow down results using filters like document type, date range,
                                    etc.</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="icon-lg me-3" data-feather="tag"></i>
                            <div>
                                <h5 class="mt-2">Tags & Categories</h5>
                                <p class="text-muted">Use predefined tags and categories for more specific results.</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="icon-lg me-3" data-feather="help-circle"></i>
                            <div>
                                <h5 class="mt-2">Ask for Help</h5>
                                <p class="text-muted">If you can't find what you're looking for, our support team is
                                    here to assist.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


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
                                            placeholder="Enter Subject.." />
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="comments" class="text-muted form-label">Message</label>
                                        <textarea id="comments" name="comments" rows="4" class="form-control"
                                            placeholder="Enter your message. We're here to listen..."></textarea>
                                    </div>

                                    <button id="submit" type="submit" name="send"
                                        class="btn btn-primary">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- end col -->

                <div class="col-lg-5 ms-lg-auto">
                    <div class="mt-5 mt-lg-0">
                        <img src="images/contact.png" alt="" class="img-fluid d-block" />
                        <p class="text-muted mt-5 mb-3">For any quick inquiries:</p>
                        <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="mail"></i>
                            Support@info.com</p>
                        <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="phone"></i>
                            +91 123 4556 789</p>
                        <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs"
                                data-feather="map-pin"></i> 2976 Edwards Street Rocky Mount, NC 27804</p>
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
    <footer class="footer" style="background-image: url(images/footer-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-4">
                        <a href="index-1.html"><img src="images/logo-light.png" alt="" class=""
                                height="30" /></a>
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
                            </script> © {{ config('app.name') }}
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
</body>


</html>
