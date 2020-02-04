@extends('layouts.website')
@section('title', 'Sign In')
@section('content')

<section id="chekout_sign_up">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="chekout_sign_up_title text-center">
                        <h1>Welcome, Please Sign In!</h1>
                    </div>
                </div>
            </div>
            <div class="chekout_sign_up_container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-9 mx-auto">
                        <div class="chekout_sign_up_container_top">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="chekout_sign_up_container_top_fb">
                                        <a href="{{url('login/facebook')}}"><i class="fab fa-facebook"></i> Login With facebook</a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="chekout_sign_up_container_top_gest text-center">
                                        <p>You don't have to create anaccount to place an order</p>
                                        <a href="{{url('customer/guest')}}" onclick="event.preventDefault();
                                        document.getElementById('signin-form').submit();"><i class="icofont-lock"></i> checkout-as-guest</a>
                                    </div>
                                    <form id="signin-form" action="{{ url('customer/guest') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-9 mx-auto">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> Register</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Login</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form class="crat_sign_up_form" action="{{url('customer/register')}}" method="post">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name')}}" required="">

                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}" required="">

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input name="phone" type="text" class="form-control" placeholder="Phone" value="{{old('phone')}}" required="">

                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Password" required="">

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required="">
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                            <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                        </div>
                                    </div>
                                    <button type="submit">Register Now</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form action="{{url('customer/login')}}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email or Phone Number</label>
                                        <input name="email_or_phone" type="mobile" class="form-control" placeholder="Enter Email or Phone Number" value="{{old('phone')}}" required="">

                                        @if ($errors->has('email_or_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email_or_phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Enter Your Password" required="">

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection