@extends('layouts.app')
@section('title', 'Admin Login')
@section('content')
<div class="auth-page">
    <div class="card auth-card shadow-lg mt-5">
        <div class="card-body">
            <div class="px-3">
                <div class="auth-logo-box">
                    <img src="{{ asset('contents/admin/images/logo-sm.png') }}" height="55" alt="logo" class="auth-logo">
                </div>
                <!--end auth-logo-box-->
                <div class="text-center auth-logo-text">
                    <h4 class="mt-0 mb-3 mt-5">Customer Login</h4>
                    <p class="text-muted mb-0">Sign in to continue to account.</p>
                </div>
                <!--end auth-logo-text-->
                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('customer.login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">E-mail Address</label>
                        <div class="input-group mb-3">
                            <span class="auth-form-icon"><i class="dripicons-user"></i> </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter E-mail" autocomplete="email">
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-lock"></i> </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password" autocomplete="new-password">
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end form-group-->
                    <div class="form-group row mt-4">
                        <div class="col-sm-6">
                            <div class="custom-control custom-switch switch-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess" name="remember">
                                <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember Me</label>
                            </div>
                        </div>
                        <!--end col-->
                        @if (Route::has('password.request'))
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('password.request') }}" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                        </div>
                        @endif
                        <!--end col-->
                    </div>
                    <!--end form-group-->
                    <div class="form-group mb-0 row">
                        <div class="col-12 mt-2">
                            <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">Login <i class="fas fa-sign-in-alt ml-1"></i></button>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end form-group-->
                </form>
                <!--end form-->
            </div>
            <!--end /div-->
            <div class="m-3 text-center text-muted">
                <p class="">Don't have an account ? <a href="{{ route('customer.register') }}" class="text-primary ml-2">Free Resister</a></p>
            </div>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
    <div class="account-social text-center mt-4">
        <h6 class="my-4">Or Login With</h6>
        <ul class="list-inline mb-4">
            <li class="list-inline-item"><a href="#" class=""><i class="fab fa-facebook-f facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" class=""><i class="fab fa-twitter twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class=""><i class="fab fa-google google"></i></a></li>
        </ul>
    </div>
    <!--end account-social-->
</div>
@endsection
