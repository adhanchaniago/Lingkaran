@extends('cms.layouts.app')
@section('content')

<div class="row">

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Registration Form <small>Please input all its needs</small></h2>
                <button onclick="location.href='{{ route('user.index') }}'" class="btn btn-secondary btn-sm pull-right">Back</button>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal mt-4">
                        <ul class="wizard_steps">
                            <li>
                                <a href="#step-1">
                                    <span class="step_no">1</span>
                                    <span class="step_descr">
                                        Profile<br />
                                        <small>User Profile Information</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <span class="step_no">2</span>
                                    <span class="step_descr">
                                        Login<br />
                                        <small>User Login Information</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">
                                    <span class="step_no">3</span>
                                    <span class="step_descr">
                                        Role<br />
                                        <small>Role of New User</small>
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div id="step-1" class="mt-3">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="firstname">First Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="firstname" name="firstname" required="required"
                                        value="{{ old('firstname') }}"
                                        class="form-control form-control-sm @error('firstname') is-invalid @enderror">
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lastname">Last Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="lastname" name="lastname" required="required"
                                        value="{{ old('lastname') }}"
                                        class="form-control form-control-sm @error('lastname') is-invalid @enderror">
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="birth">Birthday
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="birth" name="birth" required="required"
                                        value="{{ old('birth') }}"
                                        class="form-control form-control-sm @error('birth') is-invalid @enderror">
                                    @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gender">Gender
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control form-control-sm @error('gender') is-invalid @enderror"
                                        id="gender" name="gender" required="required">
                                        <option></option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="religion">Religion
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control form-control-sm @error('religion') is-invalid @enderror"
                                        id="religion" name="religion" required="required">
                                        <option></option>
                                        <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Budha" {{ old('religion') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Kepercayaan" {{ old('religion') == 'Kepercayaan' ? 'selected' : '' }}>Kepercayaan</option>
                                        <option value="Ateis" {{ old('religion') == 'Ateis' ? 'selected' : '' }}>Ateis</option>
                                    </select>
                                    @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control form-control-sm @error('status') is-invalid @enderror"
                                        id="status" name="status" required="required">
                                        <option></option>
                                        <option value="Single" {{ old('status') == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ old('status') == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Divorce" {{ old('status') == 'Divorce' ? 'selected' : '' }}>Divorce</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Address
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea
                                        class="form-control form-control-sm @error('address') is-invalid @enderror"
                                        id="address" name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="phone" name="phone" required="required"
                                        value="{{ old('phone') }}"
                                        class="form-control form-control-sm @error('phone') is-invalid @enderror">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div id="step-2" class="mt-3">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" id="email" name="email" required="required"
                                        value="{{ old('email') }}"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" id="password" name="password" required="required"
                                        autocomplete="new-password"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="password-confirm">Password
                                    Confirm <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" id="password-confirm" name="password_confirmation"
                                        required="required" autocomplete="new-password"
                                        class="form-control form-control-sm @error('password_confirm') is-invalid @enderror">
                                    @error('password_confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div id="step-3" class="mt-3">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="role">Role
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control form-control-sm @error('role') is-invalid @enderror"
                                        id="role" name="role" required="required">
                                        <option></option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End SmartWizard Content -->
                </form>
            </div>
        </div>
    </div>

</div>
@endsection