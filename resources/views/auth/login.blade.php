@extends('auth.layouts.app')

@section('content')
<section class="login_content">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1><a href="{{ route('guest.home') }}" style="text-decoration: none;"><img
                    src="{{ asset('assets/logo/logo.png') }}" alt="Logo Lingkaran" style="width: 30px;">
                Lingkaran</a></h1>
        <div class="form-group row">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group row">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <div class="form-group row mb-0">
            <button type="submit" class="btn btn-success btn-sm btn-block">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
            <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
        <div class="separator">
            <p>©2020 All Rights Reserved. Lingkaran web news.</p>
        </div>
    </form>
</section>
@endsection
