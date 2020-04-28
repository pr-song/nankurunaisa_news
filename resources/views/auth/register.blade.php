@extends('layouts.main')

@section('title', 'Register - ')

@section('content')
<div class="container">
    <!-- ##### Register Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Be our member now!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" value="{{ old('name') }}" placeholder="Your Full Name" required
                                    autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}" placeholder="Email" required
                                    autocomplete="email" autofocus>

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
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn vizew-btn w-100 mt-30">Register Now</button>
                                <a class="post-title float-right" href="{{ route('login') }}">Have an account? Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Register Area End ##### -->
</div>
@endsection
