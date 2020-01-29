@extends('admin.report.index')
@section('title', 'Coupon Report')
@section('report')
<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Date</th>
            <th>Coupon Name</th>       
            <th>Coupon Code</th>
            <th>Orders</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($report as $data)
            <tr>
                <td>{{ date_formate($data->start_date) }} - {{ date_formate($data->end_date) }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->code }}</td>
                <td>{{ $data->total_orders }}</td>
                <td>Tk {{ $data->total }}</td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="5">No data available</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

@section('filter')
@include('admin.report.filter.common')
<div class="form-group">
    <label>Coupon Code</label>
    <input type="text" name="coupon_code" class="form-control" value="{{ $request->coupon_code ?? '' }}">
</div>
@endsection