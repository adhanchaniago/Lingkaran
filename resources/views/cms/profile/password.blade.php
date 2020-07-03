@extends('cms.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Change Password <small>Password minimum 8 characters</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}.
                </div>
                @elseif(session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>FAIL!</strong> {{ session('danger') }}.
                </div>
                @endif
                <form action="{{ route('password.update', auth()->id()) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control form-control-sm @error('current_password') is-invalid @enderror" name="current_password" id="current_password" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" id="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password_confirm">New Password Confirmation</label>
                                <input type="password" class="form-control form-control-sm" name="password_confirmation" id="password_confirm" required>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <button type="button" onclick="location.href='{{ url()->previous() }}'" class="btn btn-secondary btn-sm pull-right">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm pull-right">Save</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection