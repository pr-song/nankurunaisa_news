@extends('layouts.admin_main')

@section('title', 'All Posts -')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1>All Posts</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('manager.new_post') }}" class="btn btn-sm btn-success">
                            <li class="fas fa-plus"></li>&nbsp;New Post
                        </a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Slug</th>
                                    <th>Categories</th>
                                    <th>Date Created</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>
                                        @foreach($post->categories as $category)
                                            <a href="#" class="btn btn-sm btn-info">{{ $category->name }}</a>
                                        @endforeach
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-secondary">
                                            <li class="fas fa-cog"></li> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger">
                                            <li class="fas fa-trash"></li> Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection