@extends('layouts.website')
@section('title', 'Customer Account')
@section('content')

        <section id="user_dashboard_main_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    @include('website.partial.sidebar')
                </div>
                <div class="col-xl-8 col-md-8">
                    @foreach ($errors->all() as $message)
                        <div class="alert alert-danger">{{$message}}</div>
                    @endforeach
                    <div class="user_dashboard_sidebar_main_content">
                        <div class="user_dashboard_acount_content">
                            <div class="user_image_dashboard text-center">
                                <img class="img-fluid" src="{{asset('contents/website/img/profile.jpg')}}" alt="">
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-md-6">
                                    <div class="user_dashboard_acount_content_user_info mt-4 text-center">
                                        <h3>Account Information</h3>
                                        <ul>
                                            <li><span>Name:</span> {{ $customer->name }}</li>
                                            <li><span>Email:</span> {{ $customer->email }}</li>
                                            <li><span>Phone:</span> {{ $customer->phone ?? "Phone number is empty"}}</li>
                                            <li><span>Address:</span> {{ $customer->address ?? 'Address is empty' }}</li>
                                        </ul>
                                        <button data-toggle="modal" data-target="#account-modal">Update Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end user dashboard index -->
    <!-- personal Modal -->
    <div class="modal fade" id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Account Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('customer.account')}}" method="post" id="account-update">
                    <div class="modal-body">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $customer->email }}" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" required="">
                        </div>

                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                        </div>

                        <div class="form-group">
                            <label for="name">New Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-submit btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection