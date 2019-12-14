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
                    <h4 class="mt-0 mb-3 mt-5">Confirm Password</h4>
                    <p class="text-muted mb-3">Please confirm your password before continuing</p>
                </div>
                <!--end auth-logo-text-->
                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!--end form-group-->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-lock"></i> </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password" autocomplete="current-password">
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!--end form-group-->
                    <div class="form-group mb-0 row">
                        <div class="col-12 mt-2">
                            <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">Confirm Password <i class="fas fa-sign-in-alt ml-1"></i></button>
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
