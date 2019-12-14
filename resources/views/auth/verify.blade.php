@extends('layouts.app')

@section('content')
<div class="auth-page">
    <div class="card auth-card shadow-lg">
        <div class="card-body">
            <div class="px-3">
                <div class="auth-logo-box">
                    <img src="{{ asset('contents/admin/images/logo-sm.png') }}" height="55" alt="logo" class="auth-logo">
                </div>
                <!--end auth-logo-box-->
                <div class="text-center auth-logo-text">
                    <h4 class="mt-0 mb-3 mt-5">Verify Your Email Address</h4>
                    <p class="text-muted mb-3">Before proceeding, please check your email for a verification link. If you did not receive the email</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <!--end form-group-->
                        <button class="btn btn-link p-0 m-0 align-baseline" type="submit">Click here to request another</button>
                    </form>
                </div>
                <!--end form-->
                <!--end auth-logo-text-->
            </div>
            <!--end /div-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
@endsection
