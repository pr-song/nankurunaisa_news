@extends('layouts.main')

@section('title', 'Update role for user - ')

@section('content')
<div class="container">
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Update role for user</h4>
                            <div class="line"></div>
                        </div>

                        <form method="post">
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach

                            @if (session('status'))
                                <div class="alert alert-primary">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            @csrf
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="role">Roles</label>
                                <select class="form-control" id="role" name="role[]" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{!! $role->name !!}" @if(in_array($role->name, $selectedRoles)) selected="selected" @endif>
                                            {!! $role->name !!}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn vizew-btn w-100 mt-30">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection