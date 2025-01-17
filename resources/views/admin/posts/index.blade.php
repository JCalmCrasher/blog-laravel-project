@extends('layouts.app2')
@section('title')
Blog - Posts
@endsection

@section('page-title')
Posts
@endsection
@section('button')
    <a href="{{ url('admin/posts/create') }}" class="btn btn-primary" id="add-post">Add New Post</a>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All posts</h6>
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
                                <th>Title</th>
                                <th>Excerpt</th>
                                <th>Body</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th style="width:6rem !important">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->post_title }}</td>
                                <td>{{ $post->post_excerpt }}</td>
                                <td>{{ $post->post_body }}</td>
                                <td>{{ $post->category }}</td>
                                <td><span class="btn badge badge-primary text-white"
                                        id="add-post">{{ $post->creator }}</span></td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ "posts/$post->id/edit" }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="posts/delete" onclick="event.preventDefault();
                                    document.getElementById('{{ $post->id }}-form').submit();">Delete</a>
                                    <form id="{{ $post->id }}-form" action="{{ url("admin/posts/$post->id") }}" method="POST"
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