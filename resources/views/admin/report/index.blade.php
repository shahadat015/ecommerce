@extends('layouts.admin')
@push('css')
    <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/flatpickr/flatpickr.min.css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Report</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2">Reports</h4>
                </div>
                <div class="card-body pb-0">
                    @yield('report')
                </div>
                <div class="card-body pt-0">
                    <div class="float-left">
                        Showing {{ $report->count() }} entries
                    </div>
                    <div class="float-right">
                        {{  $report->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header"><h4 class="mt-2">Filter</h4></div>
                <form action="{{ route('admin.reports') }}" method="get" id="filter-form">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="my-3">Report Type</label>
                            <select name="type" class="form-control" id="type">
                                <option value="coupons_report" {{ $request->type == 'coupons_report' ? 'selected' : '' }}>Coupons Report</option>
                                <option value="order_report" {{ $request->type == 'order_report' ? 'selected' : '' }}>Order Report</option>
                                <option value="purchase_report" {{ $request->type == 'purchase_report' ? 'selected' : '' }}>Purchase Report</option>
                                <option value="stock_report" {{ $request->type == 'stock_report' ? 'selected' : '' }}>Stock Report</option>
                                <option value="sales_report" {{ $request->type == 'sales_report' ? 'selected' : '' }}>Sales Report</option>
                                <option value="shipping_report" {{ $request->type == 'shipping_report' ? 'selected' : '' }}>Shipping Report</option>
                            </select>
                        </div>
                        @yield('filter')                      
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary btn-block"> Filter</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/flatpickr/flatpickr.js"></script>
    <script src="{{asset('contents/admin')}}/js/flatpickr.init.js"></script>
    <script src="{{asset('contents/admin')}}/js/filter.js"></script>
@endpush
