@extends('layouts.website')
@section('title', 'Dashboard')
@section('content')

    <section id="user_dashboard_main_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    @include('website.customer.sidebar')
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="user_dashboard_sidebar_main_content">
                        <div class="user_dashboard_sidebar_main_content_statci">
                            <div class="row">
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-shopping-bag"></i></span>
                                        <h3>{{$orders}}</h3>
                                        <p>Total Order</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-cart-arrow-down"></i></span>
                                        <h3>{{$activeOrders}}</h3>
                                        <p>Active Order Order</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4 col-sm-4">
                                    <div class="user_dashboard_sidebar_main_content_statci_item text-center">
                                        <span><i class="fas fa-times"></i></span>
                                        <h3>{{$cancledOrders}}</h3>
                                        <p>Canceled Order</p>
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