@extends('guest.layouts.app')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto my-5">
                <div class="login-wrapper px-4 py-3 rounded border shadow">
                    <div class="login-title text-center">Login</div>
                    <div class="login-description text-center text-muted">
                        Please login to create contents and make comments
                    </div>
                    <form href="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember</label>
                        </div>
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                        <button type="submit" class="btn btn-login btn-sm btn-block mt-3">Login</button>
                        <div class="mt-3 d-flex justify-content-center">
                            Don't have any account yet? <span class="ml-1"><a href="{{ route('register') }}">Sign
                                    up</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection