@extends('layouts.admin')
@section('title', 'Images')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Media</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Media</h4>
                    <button class="btn-delete btn btn-danger btn-sm float-right mr-2" data-url="{{ route('admin.image.destroy') }}" disabled><i class="mdi mdi-delete"></i> Delete</button>
                </div>
                    
                <div class="card-body">
                    <form action="{{ route('admin.images.store') }}" method="post" class="dropzone mb-3" enctype="multipart/form-data" id="myDropzone">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Filename</th>
                                <th>
                                    <div class="custom-control custom-checkbox d-inline">
                                        <input type="checkbox" class="check-all custom-control-input" id="horizontalCheckbox" data-parsley-multiple="groups" data-parsley-mincheck="2">
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
    <script src="{{asset('contents/admin')}}/plugins/dropzone/dropzone.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#datatable').DataTable({
                serverSide: true,
                ajax: "{{ route('admin.images.datatables') }}",
                columns: [
                    { name: 'path' },
                    { name: 'name' },
                    { name: 'action', orderable: false, searchable: false }
                ]
            });
        });

        Dropzone.options.myDropzone = {
          paramName: "file",
          maxFilesize: 2,
          init() {
             this.on("success", function(file) {
                $('#datatable').DataTable().ajax.reload();
             });
          }
        };
    </script>
@endpush