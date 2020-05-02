@extends('layouts.app2')
@section('title')
Blog - Users
@endsection

@section('page-title')
Users
@endsection
@section('button')
    <a href="{{ url('admin/users/create') }}" class="btn btn-primary" id="add-post">Add New User</a>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All users</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table id="postTable" class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Date created</th>
                                <th style="width:6rem !important">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ "users/$user->id/edit" }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="users/delete" onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();">Delete</a>
                                    <form id="delete-form" action="{{ url("admin/users/$user->id") }}" method="POST"
                                        style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection