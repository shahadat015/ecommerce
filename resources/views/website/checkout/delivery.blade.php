@extends('layouts.website')
@section('title', 'Delivery Method')
@section('content')

    <!-- start card process progress -->
    <section id="payment_process">
        <div class="container">
            @include('website.checkout.stepsbar')
        </div>
    </section>
    <!-- satrt payment method form -->
    <section id="payment_method">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="payment_method_container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-7 col-md-12 mx-auto">
                                <div class="delevery_option">
                                    <h4>Your information</h4>
                                    <form method="post" action="{{url('delivery/method')}}" id="delivery-form">
                                        @csrf

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First name</label>
                                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{old('first_name')}}">

                                                    @if($errors->has('first_name'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{$errors->first('first_name')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Last name</label>
                                                    <input type="text" class="form-control" name="last_name"  placeholder="Last Name" value="{{old('last_name')}}"> 

                                                    @if($errors->has('last_name'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{$errors->first('last_name')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                    <input type="text" class="form-control" name="phone"  placeholder="Phone Number" value="{{old('phone')}}">

                                                    @if($errors->has('phone'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{$errors->first('phone')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="text" class="form-control" name="email"  placeholder="Email Address" value="{{old('email')}}">

                                                    @if($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{$errors->first('email')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{old('address')}}">

                                                    @if($errors->has('address'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{$errors->first('address')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-4 col-md-6"> <small>Country</small>
                                                        <div class="">
                                                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                            <select class="custom-select mr-sm-2" name="country">
                                                                <option selected>Choose...</option>
                                                                @foreach($countries as $country)
                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                                @endforeach
                                                            </select>

                                                            @if($errors->has('country'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{$errors->first('country')}}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6"> <small>City </small>
                                                        <div class="">
                                                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                            <select class="custom-select mr-sm-2" name="city">
                                                                <option selected>Choose...</option>
                                                                @foreach($cities as $city)
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        @if($errors->has('city'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{$errors->first('city')}}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-xl-4 col-md-12">
                                                        <div class="form-group"> 
                                                            <small>Zip Code</small>
                                                            <input type="text" class="form-control" name="zip_code">
                                                            @if($errors->has('zip_code'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{$errors->first('zip_code')}}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment_process_btn"> 
                        <a href="paymentmethod.html">Go Back Payment</a> 
                        <a href="{{url('delivery/method')}}" onclick="event.preventDefault();
                        document.getElementById('delivery-form').submit();">Go Confirm</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection