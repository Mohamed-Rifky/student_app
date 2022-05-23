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
                        <div class="row">
                            <div class="col-12 justify-content-center d-flex">
                                <img src="{{ asset('images/logo.png') }}" alt=""  class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            {{-- <div>
                                 <div class="avatar-md profile-user-wid mb-4">
                                         <span class="avatar-title rounded-circle bg-light">
                                             <img src="{{ asset('images/logo.jpg') }}" alt="" class="rounded-circle"
                                                  height="34">
                                         </span>
                                 </div>
                             </div>--}}
                            <div class="p-2">
                                <form class="form-horizontal" action="index.html">

                                    <div class="form-group">
                                        <label for="username">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                               for="customControlInline"> {{ __('Remember Me') }}</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                                type="submit">Log In
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        Designed & Developed By <a href="https://helium.lk/" class="text-white" target="_blank"> Helium Solutions </a>
                                    </div>
                                </form>
                            </div>
                        </form>
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
<script>
    var flagsUrl = '{{ asset('/') }}';
    var route = '{{ \Route::current()->getName() }}';
    var currencySymbol = '{{ config('settings.currency_symbol') }}';
    var css = '{{ asset('css/app.css') }}';
</script>
<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

