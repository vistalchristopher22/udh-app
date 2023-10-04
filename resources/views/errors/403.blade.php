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

    @stack('page-css')


    <!-- Scripts -->

    <style>
        * {
            font-family: Inter, sans-serif !important;
        }

        body {
            overflow: hidden;
        }

        .base-text-color {
            color: #1c0ed7;
        }

        .code-error {
            font-size :10rem;
        }
        
        .error-description {
            font-size : 2.8rem;
            font-weight: 500;
        }
    </style>
</head>

<body class="d-flex flex-row justify-content-center align-items-center vh-100 w-100">
    <img src="{{ asset('logo.png') }}" class="img-fluid w-25" alt="">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1 class="code-error">403</h1>
        <h1 class="text-uppercase error-description mx-5">I'm sorry but you don't have any access to this page</h1>
    </div>
    <svg style="position:absolute; z-index:-9999; left:0%; right:0%; bottom:0%; transform:scale(1.2)" id="visual" viewBox="0 0 2000 1080" width="2000" height="1080" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><rect x="0" y="0" width="2000" height="1080" fill="#ffffff"></rect><path d="M0 742L35.5 776.3C71 810.7 142 879.3 213.2 915.2C284.3 951 355.7 954 426.8 948.8C498 943.7 569 930.3 640 940.5C711 950.7 782 984.3 853.2 1001.7C924.3 1019 995.7 1020 1066.8 1010.3C1138 1000.7 1209 980.3 1280 975.7C1351 971 1422 982 1493.2 986C1564.3 990 1635.7 987 1706.8 953C1778 919 1849 854 1884.5 821.5L1920 789L1920 1081L1884.5 1081C1849 1081 1778 1081 1706.8 1081C1635.7 1081 1564.3 1081 1493.2 1081C1422 1081 1351 1081 1280 1081C1209 1081 1138 1081 1066.8 1081C995.7 1081 924.3 1081 853.2 1081C782 1081 711 1081 640 1081C569 1081 498 1081 426.8 1081C355.7 1081 284.3 1081 213.2 1081C142 1081 71 1081 35.5 1081L0 1081Z" fill="#0066FF" stroke-linecap="round" stroke-linejoin="miter"></path></svg>
</body>

</html>
