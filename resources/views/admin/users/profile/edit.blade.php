@extends('layouts.app2')
@section('title')
Blog - Create New Users
@endsection

@section('page-title')
Users
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Users</h6>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ url("admin/users/$user->id") }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="username">Enter Username</label>
                                <input type="text" {{ old('username') }} id="username" name="username"
                                    class="form-control" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="password">Enter Password</label>
                                <input type="password" {{ old('password') }} id="password" name="password"
                                    class="form-control" value="{{ $user->password }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="firstname">Enter Firsname</label>
                                <input type="text" {{ old('firstname') }} id="firstname" name="firstname"
                                    class="form-control" value="{{ $user->firstname }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="lastname">Enter Lastname</label>
                                <input type="text" {{ old('lastname') }} id="lastname" name="lastname"
                                    class="form-control" value="{{ $user->lastname }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Enter Email</label>
                                <input type="text" {{ old('email') }} id="email" name="email" class="form-control"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection