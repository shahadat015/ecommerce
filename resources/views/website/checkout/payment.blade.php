@extends('layouts.website')
@section('title', 'Payment Method')
@section('content')

    <section id="payment_process">
        <div class="container">
            @include('website.partial.stepsbar')
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
                                    <h4>Payment Method</h4>
                                    @if(config('settings.cod_enabled'))
                                    <div class="custom-control custom-radio custom-control-inline mb-1">
                                        <input type="radio" id="customRadioInline1" name="payment_method" class="shipping-method custom-control-input" value="cod" checked>
                                        <label class="custom-control-label" for="customRadioInline1">{{ config('settings.cod_label') }} </label>
                                    </div>
                                    @endif
                                    @if(config('settings.ssl_commrz_enabled'))
                                    <div class="custom-control custom-radio custom-control-inline mb-1">
                                        <input type="radio" id="customRadioInline2" name="payment_method" class="shipping-method custom-control-input" value="ssl_commerz">
                                        <label class="custom-control-label" for="customRadioInline2">{{ config('settings.ssl_commrz_label') }} </label>
                                    </div>
                                    @endif
                                </div>
                                <div class="payment_method_option mt-4">
                                    <h4>We Accept</h4>
                                    <img class="img-fluid" src="{{ asset('contents/website/img/card-icon.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="card_info_form">
                                    <h4>Your information</h4>
                                    <form id="payment-form" method="post" action="{{ route('payment')}}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Cardholder Name </label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Card Number </label>
                                                    <input type="text" class="form-control" name="card_number">
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
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">May</option>
                                                                    <option value="6">Jun</option>
                                                                    <option value="7">July</option>
                                                                    <option value="8">August</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                                        <div class="form-row align-items-center">
                                                            <div class="">
                                                                <small>Expire Year </small>
                                                                <select class="custom-select mr-sm-2" name="exp_year">
                                                                    <option selected>YYYY</option>
                                                                    @for($i = now()->year; $i< now()->addYears(5)->year; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6">
                                                        <div class="form-group">
                                                            <small>CVV</small>
                                                            <input type="text" class="form-control" name="cvv">
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
                        <a href="{{ route('checkout') }}">Back to Checkout</a>
                        <a href="{{ route('confirm') }}" class="payment-form">Go Confirm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection