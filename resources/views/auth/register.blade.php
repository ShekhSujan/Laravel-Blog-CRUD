@extends('auth.app')
@section('login-content')
    <div class="container">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="{{ route('dashboard') }}" class="login-logo">
                                <img src="{{ $allSetting->logo_url }}" alt="" class="m-auto" />
                            </a>
                            <h5>Welcome back,<br />Please Register.</h5>
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email"
                                    autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="mobile" type="text"
                                    class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                    placeholder="Mobile Number" value="{{ old('mobile') }}" required autocomplete="mobile"
                                    autofocus>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password" required autocomplete="current-password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Confirm Password" required
                                    autocomplete="current-password">
                                @error('password_confirmation')
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
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="forgot-pwd">
                                    <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                            @endif
                            <hr>
                            <div class="actions align-left">
                                <span class="additional-link">Already have an account?</span>
                                <a href="{{ route('login') }}" class="btn btn-dark">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
