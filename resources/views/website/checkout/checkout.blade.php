@extends('layouts.website')
@section('title', 'Delivery Method')
@section('content')

    <!-- start card process progress -->
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
                            <div class="col-xl-7 col-lg-7 col-md-12 mx-auto">
                                <div class="delevery_option">
                                    <h4>Your information</h4>
                                    <form method="post" action="{{ route('checkout') }}" id="delivery-form">
                                        @csrf

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First name</label>
                                                    <input type="text" class="form-control" placeholder="First Name" name="first_name">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Last name</label>
                                                    <input type="text" class="form-control" name="last_name"  placeholder="Last Name"> 
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                    <input type="text" class="form-control" name="phone"  placeholder="Phone Number">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="text" class="form-control" name="email"  placeholder="Email Address">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{old('address')}}">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-4 col-md-6"> <small>Country</small>
                                                        <div class="">
                                                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                            <select class="custom-select mr-sm-2" name="country">
                                                                <option selected>Choose...</option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6"> <small>City </small>
                                                        <div class="">
                                                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                            <select class="custom-select mr-sm-2" name="city">
                                                                <option selected>Choose...</option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-12">
                                                        <div class="form-group"> 
                                                            <small>Zip Code</small>
                                                            <input type="text" class="form-control" name="zip_code">
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
                        <a href="{{ route('cart') }}">Go Back Cart</a> 
                        <a href="{{ route('payment') }}" class="checkout-form">Continue to Payment</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection