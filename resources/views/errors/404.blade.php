@extends('layouts.app')
@section('title', '404 - Page Not Found')
@section('content')
<div class="auth-page">
    <div class="card auth-card shadow-lg">
        <div class="card-body">
            <div class="px-3">
                <div class="auth-logo-box">
                    <img src="{{asset('contents/admin/images/logo-sm.png')}}" height="55" alt="logo" class="auth-logo">
                </div>
                <!--end auth-logo-box--><img src="{{asset('contents/admin/images/404.jpg')}}" alt="" class="d-block mx-auto mt-4" height="250">
                <div class="text-center auth-logo-text mb-4">
                    <h4 class="mt-0 mb-3 mt-5">Looks like you've got lost...</h4><a href="{{url('/')}}" class="btn btn-sm btn-primary">Back to Home</a></div>
                <!--end auth-logo-text-->
            </div>
            <!--end /div-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
@endsection