{{-- @extends('layouts.app') --}}
@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <h2>User Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $user->name }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
                <p class="card-text">Created at: {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
                <p class="card-text">Updated at: {{ $user->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>

        <a href="{{ route('admin.users.index') }}" class="btn btn-primary mt-3">Back to User List</a>
    </div>
@endsection
