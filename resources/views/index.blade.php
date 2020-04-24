@extends('layouts.layout') @section('title') Larablog - Home @endsection
@section('container')
<div class="container">
    <div class="row mt-3">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="row">
                <h1 class="display-4" style="font-size: 2em">
                    <a href="posts/{{ $post->id }}">{{ $post->post_title }}</a>
                </h1>

                <!-- Blog Post -->
                <div class="card mb-4">
                    <img
                        class="card-img-top"
                        src="http://placehold.it/750x300"
                        alt="Card image cap"
                    />
                    <div class="card-body">
                        <h2 class="card-title lead">
                            <a
                                href="posts/{{ $post->id }}"
                                >{{ $post->post_excerpt }}</a
                            >
                        </h2>
                        <p class="card-text">
                            {{ $post->post_body }}
                        </p>
                        <a href="posts/{{ $post->id }}" class="btn btn-primary"
                            >Read More &rarr;</a
                        >
                    </div>
                    <div class="card-footer text-muted">
                        Posted on
                        {{ date('F d, Y', strtotime($post->created_at)) }} by
                        <a href="#">{{ $post->creator }}</a>
                    </div>
                </div>

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul>
            </div>
            @endforeach
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
                                        <li>
                                            <a href="#">Web Design</a>
                                        </li>
                                        <li>
                                            <a href="#">HTML</a>
                                        </li>
                                        <li>
                                            <a href="#">Freebies</a>
                                        </li>
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
                                        <li>
                                            <a href="#">Web Design</a>
                                        </li>
                                        <li>
                                            <a href="#">HTML</a>
                                        </li>
                                        <li>
                                            <a href="#">Freebies</a>
                                        </li>
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
