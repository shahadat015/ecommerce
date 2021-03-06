@push('css')
    <link href="{{asset('contents/admin')}}/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/plugins/animate/animate.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/css/media.css" rel="stylesheet" type="text/css">
@endpush
<!-- end row -->
<div class="modal zoomIn animated bd-example-modal-xl mid-y-scroll" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0 mr-2" id="myModalLabel">File Maneger</h5>
                <button class="btn-delete btn btn-danger btn-xs" data-url="{{ route('admin.image.destroy') }}" disabled><i class="mdi mdi-delete"></i> Delete</button>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
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
                                    <input type="checkbox" class="check-all custom-control-input" id="horizontalCheckbox">
                                    <label class="custom-control-label" for="horizontalCheckbox">Action</label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/dropzone/dropzone.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/media.js"></script>
@endpush