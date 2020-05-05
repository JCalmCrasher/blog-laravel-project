@extends('layouts.app2')
@section('title')
Blog - Categories
@endsection

@section('page-title')
Categories
@endsection
@section('button')
    <a href="{{ url('admin/categories/create') }}" class="btn btn-primary" id="add-category">Add New Category</a>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All categories</h6>
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
                                <th>Category</th>
                                <th>Created by</th>
                                <th>Date</th>
                                <th style="width:6rem !important">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->category }}</td>
                                <td>{{ $category->creator }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ "categories/$category->id/edit" }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="categories/delete" onclick="event.preventDefault();
                                    document.getElementById('{{ $category->id }}-form').submit();">Delete</a>
                                    <form id="{{ $category->id }}-form" action="{{ url("admin/categories/$category->id") }}" method="POST"
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