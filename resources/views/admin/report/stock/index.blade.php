@extends('admin.report.index')
@section('title', 'Stock Report')
@section('report')
<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>       
            <th>Stock Availability</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($report as $product)
            <tr>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}">{{ $product->name }}</a>
                </td>

                <td>
                    {!! $product->qty ?: '&mdash;' !!}
                </td>

                <td>
                    @if ($product->in_stock)
                    <span class="badge badge-soft-primary">In Stock</span>
                    @else
                    <span class="badge badge-soft-warning">Stock Out</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="3">No data available</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

@section('filter')
<div class="form-group">
    <label>Stock Availability</label>
    <select name="stock_availability" class="form-control">
        <option value="">Please Select</option>
        <option value="in_stock" {{ $request->stock_availability == 'in_stock' ? 'selected' : '' }}>In Stock</option>
        <option value="out_of_stock" {{ $request->stock_availability == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
    </select>
</div>
@endsection