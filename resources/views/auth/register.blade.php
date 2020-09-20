@extends('guest.layouts.app')

@section('title')
{{ config('app.name', 'Lingkaran') }}
@endsection

@section('content')
<section class="register-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto my-5">
                <div class="register-wrapper px-4 py-3 rounded border shadow">
                    <div class="register-title text-center">Register</div>
                    <div class="register-description text-center text-muted">
                        Create an account to create contents and make comments
                    </div>
                    <form href="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                        name="firstname" id="firstname" value="{{ old('firstname') }}" required>
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('lastname') is-invalid @enderror"
                                        name="lastname" id="lastname" value="{{ old('lastname') }}" required>
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth">Birth</label>
                                    <input type="date"
                                        class="form-control form-control-sm @error('birth') is-invalid @enderror"
                                        name="birth" id="birth" value="{{ old('birth') }}" required>
                                    @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                        name="phone" id="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"
                                class="form-control form-control-sm @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        name="password" id="password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control form-control-sm"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-register btn-sm btn-block mt-2">Register</button>
                        <div class="text-muted mt-3 text-center"><small>NOTE: You need to verify your email first before
                                login.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection