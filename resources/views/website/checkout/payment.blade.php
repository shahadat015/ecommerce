@extends('layouts.website')
@section('title', 'Payment Method')
@section('content')

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
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="payment_method_option">
                                    <h4>Your Card</h4>
                                    <img class="img-fluid" src="{{asset('contents/website')}}/assests/img/card-icon.png" alt="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="card_info_form">
                                    <h4>Your information</h4>
                                    <form id="payment-form" method="post" action="{{url('/payment/method')}}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Cardholder Name </label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">

                                                    @if($errors->has('name'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{$errors->first('name')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Card Number </label>
                                                    <input type="text" class="form-control" name="card_number" value="{{old('card_number')}}">

                                                    @if($errors->has('card_number'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{$errors->first('card_number')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                                        <div class="form-row align-items-center">
                                                            <div class="">
                                                                <small>Expire Month </small>
                                                                <select class="custom-select mr-sm-2" name="exp_month">

                                                                    <option selected>MM</option>
                                                                    <option value="1">01</option>
                                                                    <option value="2">02</option>
                                                                    <option value="3">04</option>
                                                                    <option value="3">05</option>
                                                                    <option value="3">06</option>
                                                                    <option value="3">07</option>
                                                                    <option value="3">08</option>
                                                                    <option value="3">09</option>
                                                                    <option value="3">10</option>
                                                                    <option value="3">11</option>
                                                                    <option value="3">12</option>
                                                                </select>
                                                                @if($errors->has('exp_month'))
                                                                    <span class="invalid-feedback">
                                                                        <strong>{{$errors->first('exp_month')}}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                                        <div class="form-row align-items-center">
                                                            <div class="">
                                                                <small>Expire Year </small>
                                                                <select class="custom-select mr-sm-2" name="exp_year">
                                                                    <option selected>YYYY</option>
                                                                    @for($i=Carbon\Carbon::now()->year; $i< Carbon\Carbon::now()->addYears(5)->year; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                    @endfor
                                                                </select>

                                                                @if($errors->has('exp_year'))
                                                                    <span class="invalid-feedback">
                                                                        <strong>{{$errors->first('exp_year')}}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6">
                                                        <div class="form-group">
                                                            <small>CVV</small>
                                                            <input type="text" class="form-control" name="cvv" value="{{old('cvv')}}">

                                                            @if($errors->has('cvv'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{$errors->first('cvv')}}</strong>
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
                        <a href="{{url('shopping/cart')}}">Back to Cart</a>
                        <a href="{{url('payment/method')}}" onclick="event.preventDefault();
                        document.getElementById('payment-form').submit();">Go Delivery Methods</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection