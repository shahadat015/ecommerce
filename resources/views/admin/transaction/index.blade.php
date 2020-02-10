@extends('layouts.admin')
@section('title', 'Transaction')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Transaction</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 float-left">Transaction</h4>
                    <button class="btn-delete btn btn-danger btn-sm float-right mr-2" data-url="{{ route('admin.transaction.destroy') }}" disabled=""><i class="mdi mdi-delete"></i> Delete</button>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Transaction ID</th>       
                                <th>Amount</th>       
                                <th>Payment Method</th>
                                <th>Transaction Time</th>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="check-all custom-control-input" id="horizontalCheckbox">
                                        <label class="custom-control-label" for="horizontalCheckbox">Action</label>
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
                ajax: "{{ route('admin.transactions.datatables') }}",
                columns: [
                    { name: 'order_id'},
                    { name: 'transaction_id'},
                    { name: 'amount'},
                    { name: 'payment_method' },
                    { name: 'created_at' },
                    { name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush