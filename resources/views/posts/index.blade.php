@extends('layouts.layout')

@section('title')
Blog - Detail
@endsection

@section('container')
<div class="container">
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">{{ $post->post_title }}</h1>

            <!-- Author -->
            <p class="lead">
                by
                {{ $post->creator }}
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{ date('F d, Y', strtotime($post->created_at)) }}</p>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ asset('storage/'.$post->post_image) }}" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">{{ $post->post_body }}</p>

            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form method="POST" action="{{ url("comments") }}">
                        @csrf
                        {{ session(['post_id' => $post->id]) }}
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
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="commenter-name">Commenter Name</label>
                                    <input type="text" class="form-control" name="commenter_name" id="commenter-name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="comment">Comment</label>
                                <div class="form-group">
                                    <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            <hr>
            @foreach ($comments as $comment)
            <div class="media mb-4">
                <div class="media-body">
                    <h5 class="mt-0">{{ $comment->commenter_name }}</h5>
                    {{ $comment->content }}
                </div>
            </div>
            @endforeach
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header lead bg-success text-white">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($categories as $post)
                                        <li>
                                            <a href="{{ url("posts/category/".strtolower($post->category)) }}">{{ $post->category }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Recent Posts -->
                    <div class="card my-4">
                        <h5 class="card-header lead bg-success text-white">Recent Posts</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($recentPosts as $recentPost)
                                        <li>
                                            <a
                                                href="{{ url("posts/$recentPost->id") }}">{{ $recentPost->post_title }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->
</div>
@endsection