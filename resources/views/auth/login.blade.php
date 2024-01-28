@extends('auth.app')
@section('login-content')
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="{{ route('dashboard') }}" class="login-logo">
                                <img src="{{ $allSetting->logo_url }}" alt="" class="m-auto" />
                            </a>
                            <h5>Welcome back,<br />Please Login to your Account.</h5>
                            <div class="form-group">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    placeholder="Username Or Email" value="" required autocomplete="username"
                                    autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" value=""
                                    name="password" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="actions mb-4">
                                <div class="custom-control custom-checkbox">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="forgot-pwd">
                                <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                            <hr>
                            <div class="actions align-left">
                                <span class="additional-link">New here?</span>
                                <a href="{{ route('register') }}" class="btn btn-dark">Create an Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
