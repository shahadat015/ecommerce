@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@push('css')
	<link href="{{asset('contents/admin')}}/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Dashboard</li>
    @endcomponent
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Total Orders</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $totalOrders }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Total Sales</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">Tk {{ $totalSales }}</h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Yesterday</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Total Productss</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $totalProducts }}</h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Total Customers</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $totalCustomers }}</h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Sales Analystics</h4>
                    <div class="apexchart-wrapper">
                        <div id="eco-dash1" class="chart-gutters"></div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Top District Visitors</h4>
                    <div id="bd-map-markers" class="dashboard-map"></div>
                    <div class="row">
                        @forelse($topVisitorsAreas as $topVisitorsArea)
                        <div class="col-md-5">
                            <div class="mt-3">
                                <span class="text-info">{{ $topVisitorsArea->city }}</span> 
                                <small class="float-right text-muted ml-3 font-14">{{ $totalVisitorPercentage = $topVisitorsArea->totalVisitorPercentage($topVisitorsArea->total_visitors) }}%</small>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $totalVisitorPercentage }}%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-5">
                            <div class="mt-3">
                                <span class="text-info">No visitors</span> 
                                <small class="float-right text-muted ml-3 font-14">0%</small>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!--<div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 align-self-center">
                            <div class="">
                                <h4 class="mt-0 header-title">This Month Revenue</h4>
                                <h2 class="mt-0 font-weight-bold">$57k</h2>
                                <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up From Last Month</p>
                            </div>
                        </div>
                        <div class="col-4 align-self-center">
                            <div class="icon-info text-right"><i class="dripicons-wallet bg-soft-info"></i></div>
                        </div>
                    </div>
                </div>
                <div class="card-body overflow-hidden p-0">
                    <div class="d-flex mb-0 h-100 dash-info-box">
                        <div class="w-100">
                            <div class="apexchart-wrapper">
                                <div id="eco_dash_2" class="chart-gutters"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-3">New Customers</h4>
                    <div class="row">
                        <div class="col-8">
                            <div class="align-self-center">
                                <div id="re_customers" class="apex-charts mb-n4"></div>
                            </div>
                        </div>
                        <div class="col-4 align-self-center">
                            <div class="re-customers-detail">
                                <h3 class="mb-0">21,546</h3>
                                <p class="text-muted"><i class="mdi mdi-circle text-info mr-1"></i>New Customers</p>
                            </div>
                            <div class="re-customers-detail">
                                <h3 class="mb-0">1535</h3>
                                <p class="text-muted"><i class="mdi mdi-circle text-light mr-1"></i>Repeated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card carousel-bg-img">
                <div class="card-body dash-info-carousel">
                    <h4 class="mt-0 header-title">Populer Product</h4>
                    <div id="carousel_2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="media"><img src="{{asset('contents/admin')}}/images/products/img-2.png" height="200" class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">354 sold</span>
                                        <h4 class="mt-0">Important Watch</h4>
                                        <p class="text-muted mb-0">$99.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="media"><img src="{{asset('contents/admin')}}/images/products/img-3.png" height="200" class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">654 sold</span>
                                        <h4 class="mt-0">Wireless Headphone</h4>
                                        <p class="text-muted mb-0">$39.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="media"><img src="{{asset('contents/admin')}}/images/products/img-1.png" height="200" class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">551 sold</span>
                                        <h4 class="mt-0">Leather Bag</h4>
                                        <p class="text-muted mb-0">$49.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                        <a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body order-list">
                    <h4 class="header-title mt-0 mb-3">Latest Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">Order ID</th>
                                    <th class="border-top-0">Customer Name</th>
                                    <th class="border-top-0">Total</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Order Time</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                <!--end tr-->
                            </thead>
                            <tbody>
                                @forelse($latestOrders as $latestOrder)
                                <tr>
                                    <td>{{ $latestOrder->id }}</td>
                                    <td>{{ $latestOrder->customer_name }}</td>
                                    <td>TK {{ $latestOrder->total }}</td>
                                    <td>
                                        <span class="badge badge-boxed badge-soft-primary">{{ $latestOrder->status }}</span>
                                    </td>
                                    <td> {{ date_formate($latestOrder->created_at) }} </td>
                                    <td><a href="{{ route('admin.orders.show', $latestOrder->id) }}"><i class="far fa-eye text-info mr-1 mt-1 font-16"></i></a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">No recent order</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                    <!--end /div-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@push('js')
	<script src="{{asset('contents/admin')}}/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="{{asset('contents/admin')}}/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="{{asset('contents/admin')}}/plugins/jvectormap/jquery-jvectormap-bd-merc.js"></script>
	<script src="{{asset('contents/admin')}}/pages/jquery.eco_dashboard.init.js"></script>
@endpush