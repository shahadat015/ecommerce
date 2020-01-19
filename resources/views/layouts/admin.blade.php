<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="A premium admin dashboard template by Mannatthemes" name="description">
    <meta content="Mannatthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('contents/admin')}}/images/favicon.ico">
    @stack('css')
    <!-- App css -->
    <link href="{{asset('contents/admin')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/css/icons.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/pace/pace.min.css">
    <link href="{{asset('contents/admin')}}/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/plugins/toast/jquery.toast.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Top Bar Start -->
    @include('layouts.partials.topbar')
    <!-- Top Bar End -->
    <div class="page-wrapper">
        <!-- Left Sidenav -->
        @include('layouts.partials.sidebar')
        <!-- end left-sidenav-->
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">

                @yield('content')

            </div>
            <footer class="footer text-center text-sm-left">&copy; 2019 Metrica <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span></footer>
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- end page-wrapper -->
    <!-- jQuery  -->
    <script src="{{asset('contents/admin')}}/js/jquery.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/pace/pace.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/metisMenu.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/waves.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/jquery.slimscroll.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/toast/jquery.toast.js"></script>
    @stack('js')
    <!-- App js -->
    <script src="{{asset('contents/admin')}}/js/app.js"></script>
    <script src="{{asset('contents/admin')}}/js/ajax.js"></script>
</body>

</html>