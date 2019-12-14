@extends('layouts.admin')

@push('css')
	<link href="{{asset('contents/admin')}}/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
		@slot('title', 'Dashboard')
		Index
    @endcomponent
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Visits</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">24k</h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">New Orders</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">10k</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
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
                    <h4 class="title-text mt-0">Return Orders</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">8400</h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
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
                    <h4 class="title-text mt-0">Revenue</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">$1590</h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Yesterday</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="float-right eco-revene-history justify-content-end">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link active" href="#">Today</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Yesterday</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Last Week</a></li>
                        </ul>
                    </div>
                    <h4 class="header-title mt-0">Revenue</h4>
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
                    <h4 class="header-title mt-0">Top Globle Sales</h4>
                    <div id="world-map-markers" class="dashboard-map"></div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mt-3"><span class="text-info">USA</span> <small class="float-right text-muted ml-3 font-14">81%</small>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 81%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="mt-3"><span class="text-info">Greenland</span> <small class="float-right text-muted ml-3 font-14">68%</small>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 68%; border-radius:5px;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-5 ml-auto">
                            <div class="mt-3"><span class="text-info">Australia</span> <small class="float-right text-muted ml-3 font-14">48%</small>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-purple" role="progressbar" style="width: 48%; border-radius:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="mt-3"><span class="text-info">Brazil</span> <small class="float-right text-muted ml-3 font-14">32%</small>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 32%; border-radius:5px;" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
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
    <div class="row">
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
                        <!--end col-->
                        <div class="col-4 align-self-center">
                            <div class="icon-info text-right"><i class="dripicons-wallet bg-soft-info"></i></div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
                <div class="card-body overflow-hidden p-0">
                    <div class="d-flex mb-0 h-100 dash-info-box">
                        <div class="w-100">
                            <div class="apexchart-wrapper">
                                <div id="eco_dash_2" class="chart-gutters"></div>
                            </div>
                        </div>
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
                    <h4 class="mt-0 header-title mb-3">New Customers</h4>
                    <div class="row">
                        <div class="col-8">
                            <div class="align-self-center">
                                <div id="re_customers" class="apex-charts mb-n4"></div>
                            </div>
                        </div>
                        <!--end col-->
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
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
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
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body order-list">
                    <h4 class="header-title mt-0 mb-3">Order List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Pro Name</th>
                                    <th class="border-top-0">Country</th>
                                    <th class="border-top-0">Order Date/Time</th>
                                    <th class="border-top-0">Pcs.</th>
                                    <th class="border-top-0">Amount ($)</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                                <!--end tr-->
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img class="" src="{{asset('contents/admin')}}/images/products/img-1.png" alt="user"></td>
                                    <td>Beg</td>
                                    <td><img src="{{asset('contents/admin')}}/images/flags/us_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                    <td>3/03/2019 4:29 PM</td>
                                    <td>200</td>
                                    <td>$750</td>
                                    <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td><img class="" src="{{asset('contents/admin')}}/images/products/img-2.png" alt="user"></td>
                                    <td>Watch</td>
                                    <td><img src="{{asset('contents/admin')}}/images/flags/french_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                    <td>13/03/2019 1:09 PM</td>
                                    <td>180</td>
                                    <td>$970</td>
                                    <td><span class="badge badge-boxed badge-soft-danger">Delivered</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td><img class="" src="{{asset('contents/admin')}}/images/products/img-3.png" alt="user"></td>
                                    <td>Headphone</td>
                                    <td><img src="{{asset('contents/admin')}}/images/flags/spain_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                    <td>22/03/2019 12:09 PM</td>
                                    <td>30</td>
                                    <td>$2800</td>
                                    <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td><img class="" src="{{asset('contents/admin')}}/images/products/img-4.png" alt="user"></td>
                                    <td>Purse</td>
                                    <td><img src="{{asset('contents/admin')}}/images/flags/russia_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                    <td>14/03/2019 8:27 PM</td>
                                    <td>100</td>
                                    <td>$520</td>
                                    <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td><img class="" src="{{asset('contents/admin')}}/images/products/img-5.png" alt="user"></td>
                                    <td>Shoe</td>
                                    <td><img src="{{asset('contents/admin')}}/images/flags/italy_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                    <td>18/03/2019 5:09 PM</td>
                                    <td>100</td>
                                    <td>$1150</td>
                                    <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td><img class="" src="{{asset('contents/admin')}}/images/products/img-6.png" alt="user"></td>
                                    <td>Boll</td>
                                    <td><img src="{{asset('contents/admin')}}/images/flags/us_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                                    <td>30/03/2019 4:29 PM</td>
                                    <td>140</td>
                                    <td>$ 650</td>
                                    <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                                </tr>
                                <!--end tr-->
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
	<script src="{{asset('contents/admin')}}/plugins/moment/moment.js"></script>
	<script src="{{asset('contents/admin')}}/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="{{asset('contents/admin')}}/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="{{asset('contents/admin')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{asset('contents/admin')}}/pages/jquery.eco_dashboard.init.js"></script>
@endpush