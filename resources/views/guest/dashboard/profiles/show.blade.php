@extends('guest.layouts.dashboard')
@section('page')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session('success') }}.
</div>
@elseif(session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>FAIL!</strong> {{ session('danger') }}.
</div>
@endif
<div class="row">
    <div class="col-md-3">
        <figure class="figure text-center">
            <img src="{{ (!empty($profile->image)) ? asset('images/profile/'. $profile->image) : asset('cms/images/user.png') }}"
                class="figure-img img-fluid rounded">
            <form action="{{ route('guestuser.profile.changeImage', encrypt($profile->user_id)) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="file" name="image" class="form-control-file form-control-file-sm" required>
                <button type="submit" class="btn btn-info btn-sm btn-block text-light mt-1">Change Image</button>
            </form>
        </figure>
        <div class="user-information">
            <div class="row">
                <div class="col-1 d-flex justify-content-center pt-1 ml-1"><i class="fa fa-user"></i></div>
                <div class="col-10">{{ date('d M Y', strToTime($profile->birth)) }}</div>
            </div>
            <div class="row">
                @if ($profile->gender == 'Male')
                <div class="col-1 d-flex justify-content-center pt-1 ml-1"><i class="fa fa-male"></i></div>
                @else
                <div class="col-1 d-flex justify-content-center pt-1 ml-1"><i class="fa fa-female"></i></div>
                @endif
                <div class="col-10">{{ $profile->gender }}</div>
            </div>
            <div class="row">
                <div class="col-1 d-flex justify-content-center pt-1 ml-1"><i class="fa fa-user"></i></div>
                <div class="col-10">{{ $profile->religion }}</div>
            </div>
            <div class="row">
                <div class="col-1 d-flex justify-content-center pt-1 ml-1"><i class="fa fa-heart"></i></div>
                <div class="col-10">{{ $profile->status }}</div>
            </div>
            <div class="row">
                <div class="col-1 d-flex justify-content-center pt-1 ml-1"><i class="fa fa-map-marker"></i>
                </div>
                <div class="col-10">{{ $profile->address }}</div>
            </div>
            <div class="row">
                <div class="col-1 d-flex justify-content-center pt-1 ml-1"><i class="fa fa-phone"></i></div>
                <div class="col-10">{{ $profile->phone }}</div>
            </div>
            <div class="row">
                <div class="col-1 d-flex justify-content-center pt-1 ml-1"><i class="fa fa-envelope"></i>
                </div>
                <div class="col-10">{{ $profile->user->email }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-9 mt-3 mt-md-0">
        <nav>
            <div class="nav nav-fill nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab"
                    aria-controls="nav-about" aria-selected="true">About
                </a>
                <a class="nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab"
                    aria-controls="nav-update" aria-selected="false">Update Informations
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                <p class="mt-2">{{ $profile->about }}</p>
            </div>
            <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                <form action="{{ route('guestuser.profile.update', encrypt($profile->user_id)) }}" method="POST"
                    class="mt-3">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                    name="firstname" id="firstname"
                                    value="{{ $profile->user->firstname ?? old('firstname') }}" required />
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"
                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ $profile->user->email ?? old('email') }}" />
                                @error('email')
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
                                <label for="lastname">Lastname</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('lastname') is-invalid @enderror"
                                    name="lastname" id="lastname"
                                    value="{{ $profile->user->lastname ?? old('lastname') }}" required />
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth">Birth</label>
                                <input type="date"
                                    class="form-control form-control-sm @error('birth') is-invalid @enderror"
                                    name="birth" id="birth" value="{{ $profile->birth ?? old('birth') }}" />
                                @error('birth')
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
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender"
                                    class="custom-select custom-select-sm @error('gender') is-invalid @enderror">
                                    <option>Select gender</option>
                                    <option value="Male" {{ $profile->gender == 'Male' ? 'selected' : '' }}>
                                        Male
                                    </option>
                                    <option value="Female" {{ $profile->gender == 'Female' ? 'selected' : '' }}>
                                        Female
                                    </option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <select id="religion" name="religion"
                                    class="custom-select custom-select-sm @error('religion') is-invalid @enderror">
                                    <option>Select religion</option>
                                    <option value="Islam" {{ $profile->religion == 'Islam' ? 'selected' : '' }}>
                                        Islam
                                    </option>
                                    <option value="Kristen" {{ $profile->religion == 'Kristen' ? 'selected' : '' }}>
                                        Kristen
                                    </option>
                                    <option value="Hindu" {{ $profile->religion == 'Hindu' ? 'selected' : '' }}>
                                        Hindu
                                    </option>
                                    <option value="Budha" {{ $profile->religion == 'Budha' ? 'selected' : '' }}>
                                        Budha
                                    </option>
                                    <option value="Kepercayaan"
                                        {{ $profile->religion == 'Kepercayaan' ? 'selected' : '' }}>
                                        Kepercayaan
                                    </option>
                                    <option value="Ateis" {{ $profile->religion == 'Ateis' ? 'selected' : '' }}>
                                        Ateis
                                    </option>
                                </select>
                                @error('religion')
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
                                <label for="status">Status</label>
                                <select id="status" name="status"
                                    class="custom-select custom-select-sm @error('status') is-invalid @enderror">
                                    <option>Select status</option>
                                    <option value="Single" {{ $profile->status == 'Single' ? 'selected' : '' }}>
                                        Single
                                    </option>
                                    <option value="Married" {{ $profile->status == 'Married' ? 'selected' : '' }}>
                                        Married
                                    </option>
                                    <option value="Divorce" {{ $profile->status == 'Divorce' ? 'selected' : '' }}>
                                        Divorce
                                    </option>
                                </select>
                                @error('status')
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
                                    name="phone" id="phone" value="{{ $profile->phone ?? old('phone') }}" required />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control form-control-sm @error('address') is-invalid @enderror"
                                    name="address" id="address" required>{{ $profile->address }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea class="form-control form-control-sm @error('about') is-invalid @enderror"
                                    name="about" id="about" required>{{ $profile->about }}</textarea>
                                @error('about')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-sm @error('password') is-invalid @enderror" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirm">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control form-control-sm" />
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <button type="submit" class="btn btn-primary btn-sm btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection