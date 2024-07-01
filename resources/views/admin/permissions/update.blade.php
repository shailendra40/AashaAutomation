@extends('admin.layouts.master')

<!-- Main content -->
@section('content')
@include('includes.forms')
<div class="card-header">
    <h1 class="card-title">Update Permission</h1>
</div>
<!-- /.card-header -->
<!-- form start -->

<form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('admin.permissions.update') }}">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <input type="hidden" value="{{ $permission->id }}" name="id" id="">
            <label for="exampleInputEmail1">Permission Name</label>
            <input type="text" value="{{ $permission->name }}" name="name" class="form-control" id="exampleInputName" placeholder="Name"
                onkeyup="replaceFunction(this.value)">
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
</div>
<script>
    $(function() {
        $.noConflict();
        $('#quickForm').validate({
            rules: {
                name: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Please provide a name of permission",
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    function replaceFunction(val) {
        document.getElementById('exampleInputName').value = val.replace(' ', '-');
    }

</script>
@endsection
