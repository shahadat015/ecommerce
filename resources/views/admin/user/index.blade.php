@extends('layouts.admin')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Uers</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Role Information</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.users.create') }}"><i class="mdi mdi-plus-circle-outline"></i> Create User</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <!-- <th>Role</th> -->
                                <th>Action</th>
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
        $('#datatable').DataTable({
            serverSide: true,
            ajax: "{{ route('admin.user') }}",
            columns: [
                { name: 'name' },
                { name: 'email' },
                { name: 'action', orderable: false, searchable: false }
            ]
        });
    </script>
@endpush