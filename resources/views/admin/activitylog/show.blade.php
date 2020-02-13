@extends('layouts.admin')
@section('title', 'Activity Log')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Activity Log</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 float-left">Activity Logs</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.activitylog.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tbody>
                            <tr>
                                <th>Description</th>
                                <td>{{ $activitylog->description }}</td>
                            </tr>
                            <tr>
                                <th>Performed By</th>
                                <td>
                                    Name: {{ $activitylog->causer->name }}
                                    Email: {{ $activitylog->causer->email }}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>{{ date_formate($activitylog->created_at, 'd M Y h:i:A') }}</td>
                            </tr>
                            <tr>
                                <th>Changes</th>
                                <td>
                                    @foreach($activitylog->changes as $change=>$changes)
                                        @if($change == 'old') Old @else Changes  @endif <hr>
                                        @foreach($changes as $key=>$value)
                                            {{ ucfirst(str_replace('_', ' ', $key)) }} : {{ $value }} <br><br>
                                        @endforeach
                                    @endforeach
                                </td>
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