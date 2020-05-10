@extends('layouts.admin_main')

@section('title', 'New Role - ')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1>Create a new Role</h1>
            </div>
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if (session('status'))
                <div class="alert alert-primary">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <!-- Horizontal Form -->
        <div class="card card-outline card-info">
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
                @csrf
                <div class="card-header">
                    <a href="{{ route('manager.all_roles') }}" class="btn btn-sm btn-success">
                        <li class="fas fa-list-alt"></li>&nbsp; All Roles
                    </a>
                </div>
                <div class="card-body"> 
                    <div class="form-group row">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Role name" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="reset" class="btn btn-info">Cancel</button>
                    <button type="submit" class="btn btn-success float-right">Create</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>
@endsection