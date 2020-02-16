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
                                    @php $customer = auth('customer')->user();  @endphp
                                    <h4>Billing Address</h4>
                                    <form method="post" action="{{ route('checkout') }}" id="checkout-form">
                                        @csrf

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="billing[name]" value="{{ $customer->name ?? old('billing.name') }}">

                                                    @error('billing.name')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                    <input type="text" class="form-control" name="billing[phone]"  placeholder="Phone Number" value="{{ $customer->phone ?? old('billing.phone') }}">

                                                    @error('billing.phone')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="text" class="form-control" name="email"  placeholder="Email Address" value="{{ $customer->email ?? old('email') }}">

                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 password {{ old('create_account') ? 'd-block' : 'd-none' }}">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password">

                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input type="text" class="form-control" name="billing[address]" placeholder="Address" value="{{ $customer->address ?? old('billing.address') }}">

                                                    @error('billing.address')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-4 col-md-6"> <small>Country</small>
                                                        <div class="">
                                                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                            <select class="custom-select mr-sm-2" name="billing[country]">
                                                                <option selected>Select Country</option>
                                                                <option value="Bangladesh" selected>Bangladesh</option>
                                                            </select>

                                                            @error('billing.country')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6"> <small>City </small>
                                                        <div class="">
                                                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                            <select class="custom-select mr-sm-2" name="billing[city]">
                                                                <option selected>Select City</option>
                                                                <option value="Dhaka" selected>Dhaka</option>
                                                                <option value="Chittagong">Chittagong</option>
                                                                <option value="Rajshai">Rajshai</option>
                                                                <option value="Noakhali">Noakhali</option>
                                                                <option value="Barishal">Barishal</option>
                                                            </select>

                                                            @error('billing.city')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-12">
                                                        <div class="form-group"> 
                                                            <small>Zip Code</small>
                                                            <input type="text" class="form-control" name="billing[zip_code]" value="{{ old('billing.zip_code') }}">

                                                            @error('billing.zip_code')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-12">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input shipping-address" name="ship_to_a_different_address" id="customCheck1" value="1" {{ old('ship_to_a_different_address') ? 'checked' : '' }}>
                                                                <label class="custom-control-label mr-3" for="customCheck1">Ship to a different address</label>
                                                            </div>
                                                            @if(!$customer)
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input create-account" name="create_account" id="customCheck2" value="1" {{ old('create_account') ? 'checked' : '' }}>
                                                                <label class="custom-control-label mr-3" for="customCheck2">Create an account?</label>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shipping-info mt-3 {{ old('ship_to_a_different_address') ? 'd-block' : 'd-none' }}">
                                            <h4>Shipping Address</h4>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Name</label>
                                                        <input type="text" class="form-control" placeholder="Name" name="shipping[name]" value="{{ old('shipping.name') }}">

                                                        @error('shipping.name')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Phone</label>
                                                        <input type="text" class="form-control" name="shipping[phone]"  placeholder="Phone Number" value="{{ old('shipping.phone') }}">

                                                        @error('shipping.phone')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Address</label>
                                                        <input type="text" class="form-control" name="shipping[address]" placeholder="Address" value="{{ old('shipping.address') }}">

                                                        @error('shipping.address')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-6"> <small>Country</small>
                                                            <div class="">
                                                                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                                <select class="custom-select mr-sm-2" name="shipping[country]">
                                                                    <option selected>Choose...</option>
                                                                    <option value="Bangladesh" selected>Bangladesh</option>
                                                                </select>

                                                                @error('shipping.country')
                                                                    <div class="invalid-feedback">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-md-6"> <small>City </small>
                                                            <div class="">
                                                                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                                <select class="custom-select mr-sm-2" name="shipping[city]">
                                                                    <option selected>Choose...</option>
                                                                    <option value="Dhaka" selected>Dhaka</option>
                                                                    <option value="Chittagong">Chittagong</option>
                                                                    <option value="Rajshai">Rajshai</option>
                                                                    <option value="Noakhali">Noakhali</option>
                                                                    <option value="Barishal">Barishal</option>
                                                                </select>

                                                                @error('shipping.city')
                                                                    <div class="invalid-feedback">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-md-12">
                                                            <div class="form-group"> 
                                                                <small>Zip Code</small>
                                                                <input type="text" class="form-control" name="shipping[zip_code]" value="{{ old('shipping.zip_code') }}">
                                                                @error('shipping.zip_code')
                                                                    <div class="invalid-feedback">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>
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
                        <a href="{{ route('payment') }}" class="checkout-btn">Continue to Payment</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(function() {
            $(document).on('click', '.shipping-address', function(){
                $('.shipping-info').toggleClass('d-none');
            });
            $(document).on('click', '.create-account', function(){
                $('.password').toggleClass('d-none');
            });

            $(document).on('click', '.checkout-btn', function(e){
                e.preventDefault();
                $('#checkout-form').submit();
            });
        });
    </script>
@endpush