@extends('admin.report.index')
@section('title', 'Sales Report')
@section('report')
    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Date</th>
                <th>Orders</th>       
                <th>Products</th>       
                <th>Subtotal</th>
                <th>Shipping Cost</th>
                <th>Discount</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($report as $data)
                <tr>
                    <td>{{ date_formate($data->start_date) }} - {{ date_formate($data->end_date) }}</td>
                    <td>{{ $data->total_orders }}</td>
                    <td>{{ $data->total_products }}</td>
                    <td>Tk {{ $data->sub_total }}</td>
                    <td>Tk {{ $data->shipping_cost }}</td>
                    <td>Tk {{ $data->discount }}</td>
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
@endsection