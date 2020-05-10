@extends('layouts.admin_main')

@section('title', 'Authorize Roles - ')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1>Authorize roles for user</h1>
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
                        <a href="{{ route('manager.all_users') }}" class="btn btn-sm btn-success">
                            <li class="fas fa-users"></li>&nbsp; All Users
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
                                <label for="user-name">Username</label>
                                <input type="text" class="form-control" id="user-name" name="name" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="user-email">Email</label>
                                <input type="email" class="form-control" id="user-email" name="email" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="role-selection">Roles</label>
                                <select class="form-control select2" id="role-selection" name="roles[]" multiple="multiple" data-placeholder="Select roles" style="width: 100%;">
                                    @foreach ($roles as $role)
                                        <option value="{!! $role->name !!}" @if(in_array($role->name, $selectedRoles)) selected="selected" @endif>
                                            {!! $role->name !!}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-warning">Cancel</button>
                            <button type="submit" class="btn btn-info float-right">Authorize</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection