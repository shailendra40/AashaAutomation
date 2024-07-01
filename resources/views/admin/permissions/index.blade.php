@extends('admin.layouts.master')

<!-- Main content -->
@section('content')
    @include('includes.tables')
    @include('admin.includes.modals')
    @include('admin.includes.editmodal')
    <hr>
    <a href="{{ route('admin.permissions.create') }}" style="text-decoration:none;"><button type="button"
            class="btn btn-block btn-success btn-lg" style="width:auto;">Add Permission <i class="fas fa-user-plus"></i>

        </button>
    </a>
    <hr>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Permissions</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Name
                                    </th>
                                    <th class="non-sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($data)
                                    @foreach ($data as $data)
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">{{ $data->name }}</td>
                                            <td>
                                                    <div style="display: flex; flex-direction:row;">
                                                        <button type="button" class="btn-warning btn-sm"
                                                        data-toggle="modal" data-target="#modal-edit" style="width:auto;"
                                                        onclick="updateEditModal(<?php echo $data->id; ?>)">Edit</button>

                                                                <button type="button" class="btn btn-block btn-danger btn-sm"
                                                                data-toggle="modal" data-target="#modal-default" style="width:auto;"
                                                                onclick="replaceLinkFunction(<?php echo $data->id; ?>)">Delete</button>
                                                            </td>
                    </div>

                    </tr>
                    @endforeach
                    @endif

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- Page specific script -->
    <script>
        function replaceLinkFunction(id) {
            document.getElementById('confirm_button').setAttribute("href", "/admin/permissions/delete/".concat(id));
        }
        $(function() {
            $.noConflict();
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        function updateEditModal(id) {
            document.getElementById('edit_button').setAttribute("href", "/admin/permissions/edit/".concat(id));
        }
        $(function() {
            $.noConflict();
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>
@endsection
