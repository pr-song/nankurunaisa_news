@extends('layouts.admin_main')

@section('title', 'New Post - ')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1>Create a new Post</h1>
            </div>
        </div>
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger col-sm-5">{{ $error }}</p>
        @endforeach

        @if (session('status'))
            <div class="alert alert-primary col-sm-5">
                {{ session('status') }}
            </div>
        @endif
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <a href="{{ route('manager.all_posts') }}" class="btn btn-sm btn-success">
                            <li class="fas fa-list-alt"></li>&nbsp; All Posts
                        </a>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <form method="post">
                        @csrf
                        <div class="card-body pad">
                            <div class="form-group">
                                <label for="category-name">Title</label>
                                <input type="text" class="form-control" id="category-name" name="title"
                                    placeholder="Post title">
                            </div>
                            <div class="form-group">
                                <label>Categories</label>
                                <select class="form-control select2" name="categories[]" multiple="multiple" data-placeholder="Select a category" style="width: 100%;">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <div class="mb-3">
                                    <textarea class="textarea" id="content" name="content"
                                        placeholder="Place some text here..."
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-warning">Cancel</button>
                            <button type="submit" class="btn btn-info float-right">Post</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection