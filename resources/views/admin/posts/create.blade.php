@extends('layouts.app2')
@section('title')
Blog - Create New Post
@endsection

@section('page-title')
Post
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Post</h6>
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
                <form action="{{ url('admin/posts/') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="post-title">Enter Post Title</label>
                                <input type="text" {{ old('post_title') }} id="post-title" name="post_title"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="post-title">Enter Post Excerpt</label>
                                <input type="text" {{ old('post_excerpt') }} id="post-excerpt" name="post_excerpt"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Enter Post Category</label>
                                <select id="category" name="category" class="form-control" {{ old('category') }}>
                                    @foreach ($posts as $post)
                                        <option value="{{ $post->category }}">{{ $post->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="post-body">Enter Post Body</label>
                                <textarea name="post_body" {{ old('post_body') }} id="post-body" cols="30" rows="5"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection