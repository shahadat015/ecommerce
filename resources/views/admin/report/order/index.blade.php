@extends('admin.report.index')
@section('title', 'Order Report')
@section('report')
    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>       
                <th>Email</th>
                <th>Customer</th>
                <th>Orders</th>
                <th>Products</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($report as $data)
                <tr>
                    <td>{{ date_formate($data->start_date) }} - {{ date_formate($data->end_date) }}</td>
                    <td>{{ $data->customer_name }}</td>
                    <td>{{ $data->customer_email }}</td>
                    <td>{{ $data->customer_id ? 'Guest' : 'Registered' }}</td>
                    <td>{{ $data->total_orders }}</td>
                    <td>{{ $data->total_products }}</td>
                    <td>Tk {{ $data->total }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="7">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
@section('filter')
    @include('admin.report.filter.common')
    <div class="form-group">
        <label>Customer Name</label>
        <input type="text" name="customer_name" class="form-control" value="{{ $request->customer_name ?? '' }}">
    </div>

    <div class="form-group">
        <label>Customer Email</label>
        <input type="text" name="customer_email" class="form-control" value="{{ $request->customer_email ?? '' }}">
    </div>
@endsection