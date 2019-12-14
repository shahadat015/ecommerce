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
                    <h4 class="mt-0 mb-3 mt-5">Reset Password For Admin</h4>
                    <p class="text-muted mb-3">Enter your Email and instructions will be sent to you!</p>
                </div>

                @if(session('status'))
                    <div class="text-success text-center">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif

                <!--end auth-logo-text-->
                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="useremail">E-mail Address</label>
                        <div class="input-group mb-3">
                            <span class="auth-form-icon"><i class="dripicons-mail"></i> </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end form-group-->
                    <div class="form-group mb-0 row">
                        <div class="col-12 mt-2">
                            <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">Send Password Reset Link <i class="fas fa-sign-in-alt ml-1"></i></button>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end form-group-->
                </form>
                <!--end form-->
            </div>
            <!--end /div-->
            <div class="m-3 text-center text-muted">
                <p class="">Remember It ? <a href="{{ url('/login') }}" class="text-primary ml-2">Sign in here</a></p>
            </div>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
@endsection
