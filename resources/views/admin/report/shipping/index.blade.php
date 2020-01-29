@extends('admin.report.index')
@section('title', 'Shipping Reports')
@section('report')
    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Date</th>      
                <th>Shipping Method</th>
                <th>Orders</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($report as $data)
                <tr>
                    <td>{{ date_formate($data->start_date) }} - {{ date_formate($data->end_date) }}</td>
                    <td>{{ $data->shipping_method }}</td>
                    <td>{{ $data->total_orders }}</td>
                    <td>Tk {{ $data->total }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="4">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('filter')
    @include('admin.report.filter.common')
    <div class="form-group">
        <label>Shipping Method</label>
        <select name="shipping_method" class="form-control">
            <option value="">Please Select</option>
            <option value="free_shipping" {{ $request->shipping_method == 'free_shipping' ? 'selected' : '' }}>Free Shipping</option>
            <option value="local_pickup" {{ $request->shipping_method == 'local_pickup' ? 'selected' : '' }}>Local Pickup</option>
        </select>
    </div>
@endsection