
@extends('layouts.website')
@section('title', 'Customer Signup')
@section('content')

    <!-- satrt registration area -->
    <section id="registration">
        .<div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8 col-12 mx-auto">
                    <div class="registration_container">
                        <div class="registration_top text-center">
                            <h4>Let's create your account!</h4>
                            <p>Already have an account? <a href="{{url('customer/login')}}">Login</a></p>
                        </div>
                        <div class="registration_form">
                            <form action="{{url('customer/register')}}" method="post">
                                @csrf
                                
                                <div class="input_login_box">
                                    <input name="name" type="text" placeholder="Name" value="{{old('name')}}" required="">
                                    <label><i class="icofont-user-alt-3"></i></label>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input_login_box">
                                    <input name="email" type="email" placeholder="Email Address" value="{{old('email')}}" required="">
                                    <label><i class="icofont-email"></i></label>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input_login_box">
                                    <input name="phone" type="text" placeholder="Phone" value="{{old('phone')}}" required="">
                                    <label><i class="icofont-phone"></i></label>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input_login_box">
                                    <input name="password" type="password" placeholder="Password" required="">
                                    <label><i class="icofont-lock"></i></label>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input_login_box">
                                    <input name="password_confirmation" type="password" placeholder="Re-Password" required="">
                                    <label><i class="icofont-lock"></i></label>
                                </div>
                                <div class="registration_page_btn text-center">
                                    <button type="submit">Register Now</button>
                                </div>
                            </form>
                        </div>
                        <div class="login_with_social_container">
                            <h4>or</h4>
                            <div class="login_with_social_button text-center">
                                <ul>
                                    <li><a class="facebook_login" href="{{url('login/facebook')}}"><i class="fab fa-facebook-f"></i> Log In via Facebook</a></li>
                                    <li><a class="google_login" href="{{url('login/google')}}"><i class="fab fa-google-plus-g"></i> Log In via Google+</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection