@extends('layouts.app2')
@section('title')
Blog - My Profile
@endsection

@section('page-title')
Profile
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update your profile</h6>
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
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form action='{{ url("admin/profile/$profile->id") }}' method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" {{ old('firstname') }} id="firstname" name="firstname"
                                    class="form-control" value="{{ $profile->firstname }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" {{ old('lastname') }} id="lastname" name="lastname"
                                    class="form-control" value="{{ $profile->lastname }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" {{ old('username') }} id="username" name="username"
                                    class="form-control" value="{{ $profile->username }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" {{ old('email') }} id="email" name="email" class="form-control"
                                    value="{{ $profile->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="current-password">Current Password</label>
                                <input type="password" id="current-password" name="current_password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" id="confirm-password" name="password_confirmation"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="avatar">Choose a profile picture</label>
                                <input type="file" {{ old('avatar') }} id="avatar" name="avatar"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update My Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection