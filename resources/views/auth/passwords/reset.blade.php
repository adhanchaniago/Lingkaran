@extends('guest.layouts.app')

@section('title')
{{ config('app.name', 'Lingkaran') }}
@endsection

@section('content')
<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto my-5">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="login-wrapper px-4 py-3 rounded border shadow">
                    <div class="login-title text-center">Reset Password</div>
                    <div class="login-description text-center text-muted my-3">
                        Please type your new password.
                    </div>

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required>
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

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password-confirm" required>
                        </div>

                        <button type="submit" class="btn btn-login btn-sm btn-block mt-3">
                            Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection