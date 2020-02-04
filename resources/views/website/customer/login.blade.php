
@extends('layouts.website')
@section('title', 'Login')
@section('content')

    <section id="login_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-7 col-sm-9 mx-auto">
                    <div class="login_main_container">
                        <h3>We're glad to see you again!</h3>
                        <p>Don't have an account? <a href="{{url('customer/register')}}">Sign Up!</a></p>
                    </div>
                    <div class="login_page_login_container">
                        <form action="{{url('customer/login')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="input_login_box">
                                        <input name="email_or_phone" type="text" placeholder="Phone Number or Email" value="{{old('email_or_phone')}}" required=""> 
                                        <label><i class="icofont-user-alt-3"></i></label>

                                        @if ($errors->has('email_or_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email_or_phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input_login_box">
                                        <input name="password" type="password" placeholder="Password" required=""> 
                                        <label><i class="icofont-lock"></i></label>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="login_page_btn text-center">
                                        <button type="submit">Login Now</button>
                                    </div>
                                </div>
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
    </section>
@endsection