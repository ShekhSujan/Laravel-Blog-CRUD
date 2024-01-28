<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ $allSetting->favicon_url }}" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/main.css') }}" />
    <link href="{{ asset('assets/backend/toastr/toastr.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    <style>
        .login-screen .login-logo img {
            max-width: 250px !important;
        }
    </style>
</head>

<body class="authentication">
    @yield('login-content')
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
</body>

</html>
