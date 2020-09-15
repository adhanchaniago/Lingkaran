@extends('guest.layouts.app')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto my-5">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif (session('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ session('danger') }}
                </div>
                @endif
                <div class="login-wrapper px-4 py-3 rounded border shadow">
                    <div class="login-title text-center">Reset Password</div>
                    <div class="login-description text-center text-muted my-3">
                        We'll send link to your registered email.
                    </div>

                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-login btn-sm btn-block mt-3">
                            Send Password Reset Link
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection