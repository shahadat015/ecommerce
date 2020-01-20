@extends('layouts.admin')
@section('title', $order->customer_name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Order</a></li>
        <li class="breadcrumb-item active">Show</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body invoice-head">
                    <div class="row">
                        <div class="col-md-4 align-self-center">
                            <img src="{{ asset('contents/admin') }}/images/logo-sm.png" alt="logo-small" class="logo-sm mr-2" height="26"> 
                            <img src="{{ asset('contents/admin') }}/images/logo-dark.png" alt="logo-large" class="logo-lg" height="16"></div>
                        <div class="col-md-8">
                            <ul class="list-inline mb-0 contact-detail float-right">
                                <li class="list-inline-item">
                                    <div class="pl-3"><i class="mdi mdi-web"></i>
                                        <p class="text-muted mb-0">{{ url('/') }}</p>
                                        <p class="text-muted mb-0">{{ url('/') }}</p>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="pl-3"><i class="mdi mdi-phone"></i>
                                        <p class="text-muted mb-0">{{ config('settings.store_phone') }}</p>
                                        <p class="text-muted mb-0">{{ config('settings.store_phone_two') }}</p>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="pl-3"><i class="mdi mdi-map-marker"></i>
                                        <p class="text-muted mb-0">{{ config('settings.store_address') }}</p>
                                        <p class="text-muted mb-0">{{ config('settings.store_address_two') }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="mb-0"><b>Order Date :</b> {{ date_formate($order->created_at) }}</h6>
                            <h6><b>Order ID :</b> # {{ $order->id }}</h6>
                            <div class="row">
                                <label for="status" class="col-sm-6"><b>Order Status : </b></label>
                                <div class="col-sm-6">
                                    <select name="status" class="status" data-url="{{ route('admin.orders.status', $order->id) }}">
                                        <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="refunded" {{ $order->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="float-left">
                                <address class="font-13"><strong class="font-14">Billed To :</strong><br>{{ $order->billing_name }}<br>{{ $order->billing_address }}<br>{{ $order->billing_city }}-{{ $order->billing_zip }}, {{ $order->billing_country }}<br><abbr title="Phone">P:</abbr> {{ $order->billing_phone }}</address>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="">
                                <address class="font-13"><strong class="font-14">Shipped To :</strong><br>{{ $order->shipping_name }}<br>{{ $order->shipping_address }}<br>{{ $order->shipping_city }}-{{ $order->billing_zip }}, {{ $order->shipping_country }}<br><abbr title="Phone">P:</abbr> {{ $order->shipping_phone }}</address>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center bg-light p-3 mb-3">
                                <h5 class="m-0 d-sm-inline-block">Payment Method</h5>
                                <h6 class="font-13">{{ $order->payment_method }}</h6>
                                @if($order->payment_method != 'Cash On Delivery')
                                <p class="mb-0 text-muted">Transaction ID : {{ $order->transaction->transaction_id }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products as $key=>$product)
                                        <tr>
                                            <th>{{ $key + 1 }}</th>
                                            <td>{{  $product->product->name }}</td>
                                            <td>{{  $product->qty }}</td>
                                            <td>{{ $product->unit_price }}</td>
                                            <td>{{ $product->line_total }}</td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="border-0"></td>
                                            <td class="border-0 font-14"><b>Sub Total</b></td>
                                            <td class="border-0 font-14"><b>Tk {{ $order->sub_total }}</b></td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="border-0"></th>
                                            <td class="border-0 font-14"><b>Local Pickup</b></td>
                                            <td class="border-0 font-14"><b>Tk {{ $order->shipping_cost }}</b></td>
                                        </tr>
                                        <tr class="bg-dark text-white">
                                            <th colspan="3" class="border-0"></th>
                                            <td class="border-0 font-14"><b>Total</b></td>
                                            <td class="border-0 font-14"><b>Tk {{ $order->total }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h5 class="mt-4">Terms And Condition :</h5>
                            <ul class="pl-3">
                                <li><small>All accounts are to be paid within 7 days from receipt of invoice.</small></li>
                                <li><small>To be paid by cheque or credit card or direct payment online.</small></li>
                                <li><small>If account is not paid within 7 days the credits details supplied as confirmation<br>of work undertaken will be charged the agreed quoted fee noted above.</small></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 align-self-end">
                            <div class="w-25 float-right">
                                <small>Account Manager</small> 
                                <img src="{{ asset('contents/admin') }}/images/signature.png" alt="" class="" height="48">
                                <p class="border-top">Signature</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                            <div class="text-center text-muted"><small>Thank you very much for doing business with us. Thanks !</small></div>
                        </div>
                        <div class="col-lg-12 col-xl-4">
                            <div class="float-right d-print-none">
                                <a href="javascript:window.print()" class="btn btn-info"><i class="fa fa-print"></i></a> 
                                <a href="{{ route('admin.orders.invoice', $order->id) }}" class="btn btn-mail btn-info"><i class="fa fa-envelope"></i></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection