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
                <form action="{{ url("admin/posts/$post->id") }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="text" {{ old('post_id') }} id="post-id" name="post_id" class="form-control"
                        value="{{ $post->id }}" hidden>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="post-image">Select featured image</label>
                                <input type="file" {{ old('post_image') }} id="post-image" name="post_image"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="post-title">Enter Post Title</label>
                                <input type="text" {{ old('post_title') }} id="post-title" name="post_title"
                                    class="form-control" value="{{ $post->post_title }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="post-excerpt">Enter Post Excerpt</label>
                                <input type="text" {{ old('post_excerpt') }} id="post-excerpt" name="post_excerpt"
                                    class="form-control" value="{{ $post->post_excerpt }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Enter Post Category</label>
                                <select id="category" name="category" class="form-control" {{ old('category') }}>
                                    @foreach ($categories as $cat)
                                    <option value="{{ $cat->category }}"
                                        {{ ( $cat->category == $selectedCategory[0]) ? 'selected' : '' }}>
                                        {{ $cat->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="post-body">Enter Post Body</label>
                                <textarea name="post_body" {{ old('post_body') }} id="post-body" cols="30" rows="5"
                                    class="form-control">{{ $post->post_body }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection