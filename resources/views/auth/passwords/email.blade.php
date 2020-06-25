@extends('auth.layouts.app')

@section('content')
<section class="login_content">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
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
        <div class="form-group row mb-0">
            <button type="submit" class="btn btn-success btn-sm btn-block">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
        <div class="separator">
            <p>©2020 All Rights Reserved. Lingkaran web news.</p>
        </div>
    </form>
</section>
@endsection
