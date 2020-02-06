@extends('layouts.admin')
@section('title', 'Create Customer')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.customers.index') }}">customers</a></li>
    <li class="breadcrumb-item active">Create</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Create Customer</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.customers.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.customers.store') }}" method="post" id="create-form">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" autocomplete="password_confirmation">
                            </div>
                        </div>

                        <div class="single-image">
                            <div class="image-holder">
                                <i class="far fa-image"></i>
                            </div>
                        </div>
                        <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-3" data-image="single" data-name="image"><i class="far fa-folder-open mr-2"></i> Browse Image</button>
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
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/select2.init.js"></script>
@endpush
