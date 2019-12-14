@extends('layouts.admin')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Products</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Product Stock</h4>
                    <p class="text-muted mb-4 font-13">Available all products.</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="horizontalCheckbox1" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="horizontalCheckbox1"></label>
                                    </div>
                                </th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="horizontalCheckbox" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="horizontalCheckbox"></label>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{asset('contents/admin')}}/images/products/img-2.png" alt="" height="52">
                                </td>
                                <td>Apple Watch</td>
                                <td>$39</td>
                                <td><span class="badge badge-soft-warning">Stock</span></td>
                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                            </tr>
                        </tbody>
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
        $('#datatable').DataTable();
    </script>
@endpush