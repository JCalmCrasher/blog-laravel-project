@extends('layouts.app2')
@section('title')
Blog - Comments
@endsection

@section('page-title')
Comments
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All comments</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table id="postTable" class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th>Post commented on</th>
                                <th>Commenter name</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th style="width:6rem !important">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->post_title }}</td>
                                <td>{{ $comment->commenter_name }}</td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td>
                                    <button type="submit" class='btn btn-{{ $comment->approved == 1 ?"danger" : "primary" }}'
                                        onclick="event.preventDefault();
                                    document.getElementById('{{ $comment->id }}-form').submit();">{{ $comment->approved==1 ? "Disapprove" : "Approve" }}</button>
                                    <form action="{{ url("admin/comments/$comment->id") }}" method="POST"
                                        id="{{ $comment->id }}-form">
                                        @method('PUT')
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