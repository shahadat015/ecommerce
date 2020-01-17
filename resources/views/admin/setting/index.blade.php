@extends('layouts.admin')
@section('title', 'Settings')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/plugins/daterangepicker/bootstrap-datepicker.min.css" rel="stylesheet">
@endpush
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
                    
                <form action="{{ route('admin.products.store') }}" id="create-form" method="post" id="" class="form-horizontal form-wizard-wrapper">
                    @csrf

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#sitelogo" role="tab">Site Logo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#footerandseo" role="tab">Footer and SEO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#sociallinks" role="tab">Social Links</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#analytics" role="tab">Analytics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#payments" role="tab">Payments</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="general" role="tabpanel">
                                <h4>General</h4><hr>
                                <div class="form-group">
                                    <label for="name">Site Name</label>
                                    <input type="text" name="site_name" class="form-control" value="{{ config('settings.site_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Site Title</label>
                                    <input type="text" name="site_title" class="form-control" value="{{ config('settings.site_title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Default Email Address</label>
                                    <input type="text" name="default_email_address" class="form-control" value="{{ config('settings.default_email_address') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Currency Code</label>
                                    <input type="text" name="currency_code" class="form-control" value="{{ config('settings.currency_code') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Currency Symbol</label>
                                    <input type="text" name="currency_symbol" class="form-control" value="{{ config('settings.currency_symbol') }}">
                                </div>

                            </div>

                            <div class="tab-pane p-3" id="sitelogo" role="tabpanel">
                                <h4>Site Logo</h4><hr>
                                <div class="single-image">
                                    <div class="image-holder">
                                        <i class="far fa-image"></i>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-4" data-image="single"><i class="far fa-folder-open mr-2"></i> Browse Image</button>

                                <h4>Site Favicon</h4><hr>
                                <div class="single-image">
                                    <div class="image-holder">
                                        <i class="far fa-image"></i>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-4" data-image="single"><i class="far fa-folder-open mr-2"></i> Browse Image</button>
                                
                            </div>
                            
                            <div class="tab-pane p-3" id="footerandseo" role="tabpanel">
                                <h4>Footer and SEO</h4><hr>

                                <div class="form-group">
                                    <label for="name">Footer Copyright Text</label>
                                    <textarea name="footer_copyright_text" class="form-control" cols="30" rows="4">{{ config('settings.footer_copyright_text') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Seo Meta Title</label>
                                    <input type="text" name="seo_meta_title" class="form-control" value="{{ config('settings.seo_meta_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Seo Meta Description</label>
                                    <textarea name="seo_meta_description" class="form-control" cols="30" rows="4">{{ config('settings.seo_meta_description') }}</textarea>
                                </div>
                            </div>

                            <div class="tab-pane p-3" id="sociallinks" role="tabpanel">
                                <h4>Social Links</h4><hr>

                                <div class="form-group">
                                    <label for="name">Facebook Profile</label>
                                    <input type="text" name="social_facebook" class="form-control" value="{{ config('settings.social_facebook') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Twitter Profile</label>
                                    <input type="text" name="social_twitter" class="form-control" value="{{ config('settings.social_twitter') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Instagram Profile</label>
                                    <input type="text" name="social_instagram" class="form-control" value="{{ config('settings.social_instagram') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Linkedin Profile</label>
                                    <input type="text" name="social_linkedin" class="form-control" value="{{ config('settings.social_linkedin') }}">
                                </div>

                            </div>
                            <div class="tab-pane p-3" id="analytics" role="tabpanel">
                                <h4>Analytics</h4><hr>

                                <div class="form-group">
                                    <label for="name">Google Analytics</label>
                                    <textarea name="google_analytics" class="form-control" cols="30" rows="4">{{ config('settings.google_analytics') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Facebook Pixels</label>
                                    <textarea name="facebook_pixels" class="form-control" cols="30" rows="4">{{ config('settings.facebook_pixels') }}</textarea>
                                </div>
                                
                            </div>
                            <div class="tab-pane p-3" id="payments" role="tabpanel">
                                <h4>Payments</h4><hr>

                                <div class="form-group">
                                    <label class="my-3">Stripe Payment Method</label>
                                    <input type="text" class="form-control " name="stripe_payment_method" value="{{ config('settings.stripe_payment_method') }}">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Stripe Key</label>
                                    <input type="text" class="form-control " name="stripe_key" value="{{ config('settings.stripe_key') }}">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Stripe Secret Key</label>
                                    <input type="text" class="form-control " name="stripe_secret_key" value="{{ config('settings.stripe_secret_key') }}">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Paypal Payment Method</label>
                                    <input type="text" class="form-control " name="paypal_payment_method" value="{{ config('settings.paypal_payment_method') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label class="my-3">Paypal Client Id</label>
                                    <input type="text" class="form-control " name="paypal_client_id" value="{{ config('settings.paypal_client_id') }}">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Paypal Secret Id</label>
                                    <input type="text" class="form-control " name="paypal_secret_id" value="{{ config('settings.paypal_secret_id') }}">
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
    @include('admin.image.modal')
    <!-- end row -->
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/moment/moment.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/daterangepicker/bootstrap-datepicker.min.js"></script>
    <script>
        $(function () {
            $(".select2").select2({
                width: "100%"
            });

            $('.datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });
        })
    </script>
@endpush
