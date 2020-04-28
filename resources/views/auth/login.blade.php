@extends('layouts.main')

@section('title', 'Login - ')

@section('content')
<div class="container">
    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Great to have you back!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}" placeholder="Email"
                                    required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="Password" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn vizew-btn w-100 mt-30">Login</button>
                                @if (Route::has('password.request'))
                                    <a class="post-title" href="{{ route('password.request') }}">Forgot Your Password?</a>
                                @endif
                                <a class="post-title float-right" href="{{ route('register') }}">Don't have account? Sign up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->
</div>
@endsection
