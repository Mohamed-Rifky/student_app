<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Css -->
    <link href="{{ asset('css/login/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="" rel="stylesheet">
    <!-- Icons Css -->
    <link href="{{ asset('css/login/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('css/login/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
            url("{{ asset('images/bg.jpeg') }}");
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            padding: 0 0 28px 0;
            overflow-x: hidden;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            backdrop-filter: blur(4px);
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.05);
        }
    </style>
    <!-- Styles -->

</head>
<body>
<div class="account-pages my-5 pt-sm-5 ">
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card  overflow-hidden" {{ __('Login') }}>
                    <div class="">
                        <div class="row py-4 justify-content-center">
                            <div class="col-6">
                                <img src="{{ asset('images/logo.jpg') }}" alt="" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <h1 class="text-danger text-capitalize text-center">Sorry ! Access Denied !!!</h1>
                        <p class="shadow-sm">Unauthorized Access was attempted and has been reported. If you feel you
                            have reached this in error,</p>
                        <h5 class="text-capitalize text-danger"> please contact <span
                                class="text-uppercase">{{ config('settings.app_name') }} </span> support </h5>
                        <div class="mt-3">
                            <a href="{{ route('home') }}" class="btn btn-info btn-block">Go Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/login/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/login/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/login/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/login/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('js/login/libs/node-waves/waves.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

