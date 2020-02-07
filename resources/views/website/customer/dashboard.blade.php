@extends('layouts.website')
@section('title', 'Dashboard')
@section('content')

    <section id="user_dashboard_main_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    @include('website.partial.sidebar')
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="user_dashboard_sidebar_main_content mb-3">
                        <div class="user_dashboard_sidebar_main_content_statci">
                            <div class="row">
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-shopping-bag text-info"></i></span>
                                        <h3>{{ $orders->count() }}</h3>
                                        <p>Total Order</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-cart-arrow-down text-success"></i></span>
                                        <h3>{{ $orders->where('status', 'completed')->count() }}</h3>
                                        <p>Completed Order</p>
                                    </div>
                                </div> 
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-times text-danger"></i></span>
                                        <h3>{{ $orders->where('status', 'cenceled')->count() }}</h3>
                                        <p>Canceled Order</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user_dashboard_sidebar_main_content">
                        <div class="user_dashboard_sidebar_main_content_statci">
                            <div class="row">
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-history"></i></span>
                                        <h3>{{ $orders->where('status', 'pending')->count() }}</h3>
                                        <p>Pending Order</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-redo-alt"></i></span>
                                        <h3>{{ $orders->where('status', 'processing')->count() }}</h3>
                                        <p>Processing Order</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-undo-alt"></i></span>
                                        <h3>{{ $orders->where('status', 'refunded')->count() }}</h3>
                                        <p>Refunded Order</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection