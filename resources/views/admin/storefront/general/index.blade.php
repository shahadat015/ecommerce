@extends('layouts.admin')
@section('title', 'Storefront')
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Storefront</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Storefront</h4>
                </div>
                    
                <form action="{{ route('admin.storefront') }}" id="update-form" method="post" class="form-horizontal form-wizard-wrapper">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#sitelogo" role="tab">Logo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#footerandseo" role="tab">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#sociallinks" role="tab">Social Links</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#seo" role="tab">SEO</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="general" role="tabpanel">
                                <h4>General</h4><hr>
                                <div class="form-group">
                                    <label for="name">Slider</label>
                                    <select name="storefront_slider" class="form-control">
                                        <option value="">Select Slider</option>
                                        @foreach($sliders as $slider)
                                            <option value="{{ $slider->id }}" {{  $slider->id == config('settings.storefront_slider') ? 'selected' : '' }}>{{ $slider->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Terms & Conditions Page</label>
                                    <select name="storefront_terms_page" class="form-control">
                                        <option value="">Select Terms & Condition page</option>
                                        @foreach($pages as $page)
                                            <option value="{{ $page->id }}" {{  $page->id == config('settings.storefront_terms_page') ? 'selected' : '' }}>{{ $page->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Privacy Policy Page</label>
                                    <select name="storefront_privacy_page" class="form-control">
                                        <option value="">Select Privacy Policy Page</option>
                                        @foreach($pages as $page)
                                            <option value="{{ $page->id }}" {{  $page->id == config('settings.storefront_privacy_page') ? 'selected' : '' }}>{{ $page->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Footer Address</label>
                                    <input type="text" name="storefront_footer_address" class="form-control" value="{{ config('settings.storefront_footer_address') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Footer Phone</label>
                                    <input type="text" name="storefront_footer_phone" class="form-control" value="{{ config('settings.storefront_footer_phone') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Footer Email</label>
                                    <input type="text" name="storefront_footer_email" class="form-control" value="{{ config('settings.storefront_footer_email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Footer Copyright Text</label>
                                    <input type="text" name="storefront_copyright_text" class="form-control" value="{{ config('settings.storefront_copyright_text') }}">
                                </div>

                            </div>

                            <div class="tab-pane p-3" id="sitelogo" role="tabpanel">
                                <h4>Site Logo</h4><hr>
                                <div class="single-image">
                                    <div class="image-holder">
                                        @if(config('settings.storefront_logo'))
                                        <img src="{{ asset( config('settings.storefront_logo')) }}">
                                        <input type="hidden" name="storefront_logo" value="{{ config('settings.storefront_logo') }}">
                                        @else
                                        <i class="far fa-image"></i>
                                        @endif
                                    </div>
                                </div>
                                <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-4" data-image="logo"><i class="far fa-folder-open mr-2"></i> Browse Image</button>

                                <h4>Site Favicon</h4><hr>
                                <div class="single-image">
                                    <div class="image-holder">
                                        @if(config('settings.storefront_favicon'))
                                        <img src="{{ asset(config('settings.storefront_favicon')) }}">
                                        <input type="hidden" name="storefront_favicon" value="{{ config('settings.storefront_favicon') }}">
                                        @else
                                        <i class="far fa-image"></i>
                                        @endif
                                    </div>
                                </div>
                                <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-4" data-image="favicon"><i class="far fa-folder-open mr-2"></i> Browse Image</button>
                                
                            </div>
                            
                            <div class="tab-pane p-3" id="footerandseo" role="tabpanel">
                                <h4>Menus</h4><hr>

                                <div class="form-group">
                                    <label for="name">Primary Menu</label>
                                    <select name="storefront_primary_menu" class="form-control">
                                        <option value="">Select Menu</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ $menu->id == config('settings.storefront_primary_menu') ? 'selected' : '' }}>{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Category Menu Title</label>
                                    <input type="text" name="storefront_category_menu_title" class="form-control" value="{{ config('settings.storefront_category_menu_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Category Menu</label>
                                    <select name="storefront_category_menu" class="form-control">
                                        <option value="">Select Menu</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ $menu->id == config('settings.storefront_category_menu') ? 'selected' : '' }}>{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Footer Menu Title</label>
                                    <input type="text" name="storefront_footer_menu_title" class="form-control" value="{{ config('settings.storefront_footer_menu_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Footer Menu</label>
                                    <select name="storefront_footer_menu" class="form-control">
                                        <option value="">Select Menu</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ $menu->id == config('settings.storefront_footer_menu') ? 'selected' : '' }}>{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="tab-pane p-3" id="sociallinks" role="tabpanel">
                                <h4>Social Links</h4><hr>

                                <div class="form-group">
                                    <label for="name">Facebook</label>
                                    
                                    <input type="text" name="storefront_facebook_link" class="form-control" value="{{ config('settings.storefront_facebook_link') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Twitter</label>
                                    <input type="text" name="storefront_twitter_link" class="form-control" value="{{ config('settings.storefront_twitter_link') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Instagram</label>
                                    <input type="text" name="storefront_instagram_link" class="form-control" value="{{ config('settings.storefront_instagram_link') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Linkedin</label>
                                    <input type="text" name="storefront_linkedin_link" class="form-control" value="{{ config('settings.storefront_linkedin_link') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Google Plus</label>
                                    <input type="text" name="storefront_google_link" class="form-control" value="{{ config('settings.storefront_google_link') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Youtube</label>
                                    <input type="text" name="storefront_youtube_link" class="form-control" value="{{ config('settings.storefront_youtube_link') }}">
                                </div>

                            </div>
                            <div class="tab-pane p-3" id="seo" role="tabpanel">
                                <h4>SEO</h4><hr>

                                <div class="form-group">
                                    <label for="name">Meta Title</label>
                                    
                                    <input type="text" name="storefront_meta_title" class="form-control" value="{{ config('settings.storefront_meta_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Meta Keywords</label>
                                    
                                    <textarea rows="4" name="storefront_meta_keywords" class="form-control">{{ config('settings.storefront_meta_keywords') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Meta Description</label>
                                    
                                    <textarea rows="5" name="storefront_meta_description" class="form-control">{{ config('settings.storefront_meta_description') }}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    @include('admin.image.modal')
    <!-- end row -->
@endsection