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
                    <h4 class="mt-0 mb-3 mt-5">Reset Password</h4>
                </div>
                <!--end auth-logo-text-->
                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email">E-mail Address</label>
                        <div class="input-group mb-3">
                            <span class="auth-form-icon"><i class="dripicons-user"></i> </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required placeholder="Enter E-mail" autocomplete="email">
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

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-lock"></i> </span>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>
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
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
@endsection
