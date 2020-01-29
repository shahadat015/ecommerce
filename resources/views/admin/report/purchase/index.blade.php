@extends('admin.report.index')
@section('title', 'Purchase Report')
@section('report')
    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Date</th>
                <th>Product Name</th>       
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($report as $product)
                <tr>
                    <td>{{ date_formate($product->start_date) }} - {{ date_formate($product->end_date) }}</td>

                    <td>
                        <a href="{{ route('admin.products.edit', $product) }}">{{ $product->name }}</a>
                    </td>

                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->total }}</td>
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
        <label class="my-3">Product Name</label>
        <input type="text" name="product" class="form-control" value="{{ $request->product ?? '' }}">
    </div>
    <div class="form-group">
        <label class="my-3">SKU</label>
        <input type="text" name="sku" class="form-control" value="{{ $request->sku ?? '' }}">
    </div>
@endsection