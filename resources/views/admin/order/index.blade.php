@extends('layouts.admin')
@section('title', 'Orders')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Orders</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 float-left">Orders</h4>
                    <button class="btn-delete btn btn-danger btn-sm float-right mr-2" data-url="{{ route('admin.order.destroy') }}" disabled=""><i class="mdi mdi-delete"></i> Delete</button>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Email</th>       
                                <th>Total</th>
                                <th>Status</th>
                                <th>Order Time</th>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="check-all custom-control-input" id="horizontalCheckbox1">
                                        <label class="custom-control-label" for="horizontalCheckbox1">Action</label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('js')
    <script src="{{asset('contents/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#datatable').DataTable({
                serverSide: true,
                ajax: "{{ route('admin.orders.datatables') }}",
                columns: [
                    { name: 'customer_name'},
                    { name: 'customer_email'},
                    { name: 'total' },
                    { name: 'status' },
                    { name: 'created_at' },
                    { name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush