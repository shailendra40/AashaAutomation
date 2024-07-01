{{-- @extends('layouts.app') --}}
@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>User Management</h2>

        <a href="{{ route('admin.users.create') }}" class="btn btn-success">Create New User Member</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            {{-- <button class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }})">Delete</button> --}}
                            {{-- <button class="btn btn-danger delete-button" data-user-id="{{ $user->id }}">Delete</button> --}}
                            <button class="btn btn-danger btn-sm" data-user-id="{{ $user->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete User Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteUserForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    <script>
        function deleteUser(userId) {
            $('#deleteUserModal').modal('show');
            $('#deleteUserForm').attr('action', '/users/' + userId);
        }
    </script>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Event listener for delete button click
            // $('.delete-button').click(function() {
            $('.btn-sm').click(function() {
                var userId = $(this).data('user-id');
                $('#deleteUserForm').attr('action', '/admin/users/' + userId); // Set form action dynamically
                $('#deleteUserModal').modal('show'); // Show modal
            });

            // Event listener for close button click
            $('.close').click(function() {
                $('#deleteUserModal').modal('hide'); // Hide modal
            });

            // Event listener for cancel button click
            $('.btn-secondary').click(function() {
                $('#deleteUserModal').modal('hide'); // Hide modal
            });
        });
    </script>
{{-- @endsection --}}
