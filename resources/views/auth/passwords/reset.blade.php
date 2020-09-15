@extends('guest.layouts.app')

@section('content')

<section class="login_content">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <h1>
            <a href="{{ route('guest.home') }}" style="text-decoration: none;"><img class="mr-2"
                    src="{{ asset('assets/logo/logo.png') }}" alt="Logo Lingkaran" style="width: 30px;">Lingkaran</a>
        </h1>
        <div class="form-group row">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group row">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password" placeholder="New Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group row">
            <input id="password-confirm" type="password"
                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                required autocomplete="new-password" placeholder="Password Confirm">

            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group row mb-0">
            <button type="submit" class="btn btn-success btn-sm btn-block">
                {{ __('Reset Password') }}
            </button>
        </div>
        <div class="separator">
            <p>©2020 All Rights Reserved. Lingkaran web news.</p>
        </div>
    </form>
</section>
@endsection