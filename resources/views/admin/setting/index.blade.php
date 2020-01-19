@extends('layouts.admin')
@section('title', 'Settings')
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Settings</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Settings</h4>
                </div>
                    
                <form action="{{ route('admin.settings') }}" id="update-form" method="post" class="form-horizontal form-wizard-wrapper">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#mail" role="tab">Mail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#shipping" role="tab">Shipping</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#payments" role="tab">Payments</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="general" role="tabpanel">
                                <h4>General Setting</h4><hr>
                                <div class="form-group">
                                    <label for="name">Store Name</label>
                                    <input type="text" name="store_name" class="form-control" value="{{ config('settings.store_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Store Tagline</label>
                                    <input type="text" name="store_tagline" class="form-control" value="{{ config('settings.store_tagline') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Store Email</label>
                                    <input type="text" name="store_email" class="form-control" value="{{ config('settings.store_email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Store Email Two</label>
                                    <input type="text" name="store_email_two" class="form-control" value="{{ config('settings.store_email_two') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Store Phone</label>
                                    <input type="text" name="store_phone" class="form-control" value="{{ config('settings.store_phone') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Store Phone Two</label>
                                    <input type="text" name="store_phone_two" class="form-control" value="{{ config('settings.store_phone_two') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Store Address</label>
                                    <input type="text" name="store_address" class="form-control" value="{{ config('settings.store_address') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Store Address Two</label>
                                    <input type="text" name="store_address_two" class="form-control" value="{{ config('settings.store_address_two') }}">
                                </div>

                            </div>
                            
                            <div class="tab-pane p-3" id="mail" role="tabpanel">
                                <h4>Mail Setting</h4><hr>

                                <div class="form-group">
                                    <label for="name">Mail From Address</label>
                                    <input type="text" name="mail_from_address" class="form-control" value="{{ config('settings.mail_from_address') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mail From Name</label>
                                    <input type="text" name="mail_from_name" class="form-control" value="{{ config('settings.mail_from_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mail Host</label>
                                    <input type="text" name="mail_host" class="form-control" value="{{ config('settings.mail_host') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mail Port</label>
                                    <input type="text" name="mail_port" class="form-control" value="{{ config('settings.mail_port') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mail Username</label>
                                    <input type="text" name="mail_username" class="form-control" value="{{ config('settings.mail_username') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mail Password</label>
                                    <input type="password" name="mail_password" class="form-control" value="{{ config('settings.mail_password') }}">
                                </div>

                            </div>

                            <div class="tab-pane p-3" id="shipping" role="tabpanel">
                                <h4>Free Shipping</h4><hr>


                                <div class="form-group">
                                    <label for="name">Label</label>
                                    <input type="text" name="free_shipping_label" class="form-control" value="{{ config('settings.free_shipping_label') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Minimum Amount</label>
                                    <input type="text" name="free_shipping_min_amount" class="form-control" value="{{ config('settings.free_shipping_min_amount') }}">
                                </div>

                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="free_shipping_enabled" class="custom-control-input" id="customCheck1" {{ config('settings.free_shipping_enabled') == 1 ? 'checked'  : '' }}>
                                        <label class="custom-control-label" for="customCheck1">Enable Free Shipping</label>
                                    </div>
                                </div>

                                <h4>Local Pickup</h4><hr>

                                <div class="form-group">
                                    <label for="name">Label</label>
                                    <input type="text" name="local_pickup_label" class="form-control" value="{{ config('settings.local_pickup_label') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Cost</label>
                                    <input type="text" name="local_pickup_cost" class="form-control" value="{{ config('settings.local_pickup_cost') }}">
                                </div>

                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="local_pickup_enabled" class="custom-control-input" id="customCheck2" {{ config('settings.local_pickup_enabled') == 1 ? 'checked'  : '' }}>
                                        <label class="custom-control-label" for="customCheck2">Enable Local Pickup</label>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane p-3" id="payments" role="tabpanel">
                                <h4>Cash On Delivery</h4><hr>

                                <div class="form-group">
                                    <label for="name">Label</label>
                                    <input type="text" name="cod_label" class="form-control" value="{{ config('settings.cod_label') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea name="cod_description" class="form-control" rows="5">{{config('settings.cod_description') }}</textarea>
                                </div>

                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="cod_enabled" class="custom-control-input" id="customCheck3"  {{ config('settings.cod_enabled') == 1 ? 'checked'  : '' }}>
                                        <label class="custom-control-label" for="customCheck3">Enable Cash On Delivery</label>
                                    </div>
                                </div>

                                <h4>SSL Commerz</h4><hr>

                                <div class="form-group">
                                    <label for="name">Label</label>
                                    <input type="text" name="ssl_commrz_label" class="form-control" value="{{ config('settings.ssl_commrz_label') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea name="ssl_commrz_description" class="form-control" rows="5">{{config('settings.ssl_commrz_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Store ID</label>
                                    <input type="text" name="ssl_commrz_store_id" class="form-control" value="{{ config('settings.ssl_commrz_store_id') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Store Password</label>
                                    <input type="password" name="ssl_commrz_store_password" class="form-control" value="{{ config('settings.ssl_commrz_store_password') }}">
                                </div>

                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ssl_commrz_enabled" class="custom-control-input" id="customCheck4" {{ config('settings.ssl_commrz_enabled') == 1 ? 'checked'  : '' }}>
                                        <label class="custom-control-label" for="customCheck4">Enable SSL Commerz</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Submit</button>
                        <button type="reset" class="btn btn-info waves-effect waves-light">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection