@extends('layouts.layout')
@section('title')
Larablog - Home
@endsection

@section('container')
<div class="container">
    <div class="row mt-3">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            @foreach($posts as $post)
            <h1 class="display-4" style="font-size: 2em">
                <a href="posts/{{ $post->id }}">{{ $post->post_title }}</a>
            </h1>

            <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap" />
                <div class="card-body">
                    <h2 class="card-title lead">
                        <a href="posts/{{ $post->id }}">{{ $post->post_excerpt }}</a>
                    </h2>
                    <p class="card-text">
                        {{ $post->post_body }}
                    </p>
                    <a href="posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on
                    {{ date('F d, Y', strtotime($post->created_at)) }} by
                    <a href="#">{{ $post->creator }}</a>
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header lead">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($categories as $post)
                                        <li>
                                            <a href="#">{{ $post->category }}</a>
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
                        <h5 class="card-header lead">Recent Posts</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($recentPosts as $recentPost)
                                        <li>
                                            <a href="#">{{ $recentPost->post_title }}</a>
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