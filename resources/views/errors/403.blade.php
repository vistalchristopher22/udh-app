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

    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
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
            font-size: 10rem;
        }

        .error-description {
            font-size: 2.8rem;
            font-weight: 500;
        }
    </style>
</head>

<body class="d-flex flex-row justify-content-center align-items-center account-body accountbg">
    <img src="{{ asset('logo.png') }}" class="img-fluid w-25" alt="">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1 class="code-error mb-5">
            <div class="fw-bolder">
                403
            </div>
        </h1>
        <h1 class="text-uppercase error-description mx-5 fw-bold">I'm sorry but you don't have any access to this page</h1>
    </div>

</body>

</html>
