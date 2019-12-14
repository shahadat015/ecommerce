<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Login')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('contents/admin') }}/images/favicon.ico">
    <!-- App css -->
    <link href="{{ asset('contents/admin') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('contents/admin') }}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('contents/admin') }}/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('contents/admin') }}/css/style.css" rel="stylesheet" type="text/css"> 
</head>

<body class="account-body accountbg">
    <!-- Log In page -->
    <div class="row vh-100">
        <div class="col-12 align-self-center">
            
            @yield('content')
            <!--end auth-page-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- End Log In page -->
    <!-- jQuery  -->
    <script src="{{ asset('contents/admin') }}/js/jquery.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/metisMenu.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/waves.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.slimscroll.min.js"></script>
    <!-- App js -->
    <script src="{{ asset('contents/admin') }}/js/app.js"></script>
</body>
</html>