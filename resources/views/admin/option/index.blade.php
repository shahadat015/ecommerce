@extends('layouts.admin')
@section('title', 'Options')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Options</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 float-left">Options</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.options.create') }}"><i class="mdi mdi-plus-circle-outline"></i> Create Options</a>
                    <button class="btn-delete btn btn-danger btn-sm float-right mr-2" data-url="{{ route('admin.option.destroy') }}" disabled=""><i class="mdi mdi-delete"></i> Delete</button>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
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
                ajax: "{{ route('admin.options.datatables') }}",
                columns: [
                    { name: 'name' },
                    { name: 'type' },
                    { name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush