@extends('layouts.main')

@section('title', 'Reset password -')

@section('content')
<div class="container">
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Enter your email address!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
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
                                <button type="submit" class="btn vizew-btn w-100 mt-30">Send Password Reset Link</button>
                                <a class="post-title float-right" href="{{ route('register') }}">Don't have account? Sign up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
