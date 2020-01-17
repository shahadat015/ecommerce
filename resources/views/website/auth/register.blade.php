@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="auth-page">
    <div class="card auth-card shadow-lg mt-5">
        <div class="card-body">
            <div class="px-3">
                <div class="auth-logo-box">
                    <img src="{{asset('contents/admin')}}/images/logo-sm.png" height="55" alt="logo" class="auth-logo">
                </div>
                <!--end auth-logo-box-->
                <div class="text-center auth-logo-text">
                    <h4 class="mt-5 mb-3">Free Registration</h4>
                    <p class="text-muted mb-0">Get your free account now.</p>
                </div>
                <!--end auth-logo-text-->
                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('customer.register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="username">Name</label>
                        <div class="input-group mb-3">
                            <span class="auth-form-icon"><i class="dripicons-user"></i> </span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Name">
                        </div>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!--end form-group-->
                    <div class="form-group">
                        <label for="useremail">Email</label>
                        <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-mail"></i> </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="userpassword">Password</label>
                        <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-lock"></i> </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="conf_password">Confirm Password</label>
                        <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-lock-open"></i> </span>
                            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password">
                        </div>
                        <!--end form-group-->
                    </div>
                    <!--end form-group-->
                    <div class="form-group row mt-4">
                        <div class="col-sm-12">
                            <div class="custom-control custom-switch switch-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                <label class="custom-control-label text-muted" for="customSwitchSuccess">By registering you agree to the Frogetor <a href="#" class="text-primary">Terms of Use</a></label>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end form-group-->
                    <div class="form-group mb-0 row">
                        <div class="col-12 mt-2">
                            <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end form-group-->
                </form>
                <!--end form-->
            </div>
            <!--end /div-->
            <div class="m-3 text-center text-muted">
                <p class="">Already have an account ? <a href="{{ route('customer.login') }}" class="text-primary ml-2">Log in</a></p>
            </div>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
@endsection
