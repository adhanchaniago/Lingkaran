@extends('cms.layouts.app')
@section('content')
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>User Profile <small>All about this user and its information</small></h2>
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
            <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img d-flex justify-content-center">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view img-fluid rounded-lg"
                            src="{{ (!empty($profile->image)) ? asset('images/profile/'. $profile->image) : asset('cms/images/user.png') }}"
                            alt="Avatar" title="">
                    </div>
                </div>
                <form action="{{ route('profile.image', $profile) }}" method="POST" enctype="multipart/form-data"
                    class="mt-2">
                    @csrf
                    @method('PATCH')
                    <input type="file"
                        class="form-control-file form-control-file-sm @error('image') is-invalid @enderror" name="image"
                        required>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-primary btn-sm mt-1 btn-block">Change Image</button>
                </form>
                <h3>{{ $profile->user->firstname. ' ' . $profile->user->lastname }}</h3>
                <span class="badge badge-info my-2">{{ $profile->user->roles->first()->name }}</span>
                <div class="row">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-user user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ date('d M Y', strToTime($profile->birth)) }}</div>
                </div>
                <div class="row">
                    @if ($profile->gender == 'Male')
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-male user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">Male</div>
                    @else
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-female user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">Female</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-user user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ $profile->religion }}</div>
                </div>
                <div class="row">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-heart user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ $profile->status }}</div>
                </div>
                <div class="row">
                    <div class="col-1 d-flex justify-content-center pt-1"><i
                            class="fa fa-map-marker user-profile-icon"></i></div>
                    <div class="col-10 pl-0">{{ $profile->address }}</div>
                </div>
                <div class="row">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-phone user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ $profile->phone }}</div>
                </div>
                <div class="row">
                    <div class="col-1 d-flex justify-content-center pt-1"><i
                            class="fa fa-envelope user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ $profile->user->email }}</div>
                </div>
                <br />
            </div>

            <div class="col-md-9 col-sm-9 ">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">

                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                                data-toggle="tab" aria-expanded="true">Recent Posts</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2"
                                data-toggle="tab" aria-expanded="false">About</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab3"
                                data-toggle="tab" aria-expanded="false">Update Information</a>
                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">

                        <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                                <p>Total post <span
                                        class="badge badge-pill badge-info">{{ count($profile->user->posts) }}</span>
                                </p>
                                @foreach ($posts as $post)
                                <li>
                                    <img src="{{ asset('images/post/'. $post->image) }}" class="avatar">
                                    <div class="message_date">
                                        <h3 class="date text-info">{{ $post->created_at->format('d') }}</h3>
                                        <p class="month">{{ $post->created_at->format('M') }}</p>
                                    </div>
                                    <div class="message_wrapper">
                                        <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}">
                                            <h4 class="heading">{{ $post->title }}</h4>
                                        </a>
                                        <blockquote class="message">{{ Str::limit($post->content, 147, '...') }}
                                        </blockquote>
                                        <br />
                                        <p class="url">
                                            @if ($post->status == 1)
                                            Status : <span class="badge badge-success">Publish</span>
                                            @else
                                            Status : <span class="badge badge-warning">unpublish</span>
                                            @endif
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                                {{ $posts->links() }}
                            </ul>
                            <!-- end recent activity -->

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <p>{{ $profile->about }}</p>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <form action="{{ route('profile.update', $profile) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                                name="firstname" id="firstname" value="{{ $profile->user->firstname }}"
                                                required>
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('lastname') is-invalid @enderror"
                                                name="lastname" id="lastname" value="{{ $profile->user->lastname }}"
                                                required>
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select
                                                class="form-control form-control-sm @error('gender') is-invalid @enderror"
                                                id="gender" name="gender" required="required">
                                                <option></option>
                                                <option value="Male" {{ $profile->gender == 'Male' ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="Female"
                                                    {{ $profile->gender == 'Female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select
                                                class="form-control form-control-sm @error('status') is-invalid @enderror"
                                                id="status" name="status" required="required">
                                                <option></option>
                                                <option value="Single"
                                                    {{ $profile->status == 'Single' ? 'selected' : '' }}>
                                                    Single
                                                </option>
                                                <option value="Married"
                                                    {{ $profile->status == 'Married' ? 'selected' : '' }}>
                                                    Married</option>
                                                <option value="Divorce"
                                                    {{ $profile->status == 'Divorce' ? 'selected' : '' }}>
                                                    Divorce</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email"
                                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ $profile->user->email }}" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="birth">Birth</label>
                                            <input type="date"
                                                class="form-control form-control-sm @error('birth') is-invalid @enderror"
                                                name="birth" id="birth" value="{{ $profile->birth }}" required>
                                            @error('birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="religion">Religion</label>
                                            <select
                                                class="form-control form-control-sm @error('religion') is-invalid @enderror"
                                                id="religion" name="religion" required="required">
                                                <option></option>
                                                <option value="Islam"
                                                    {{ $profile->religion == 'Islam' ? 'selected' : '' }}>
                                                    Islam</option>
                                                <option value="Kristen"
                                                    {{ $profile->religion == 'Kristen' ? 'selected' : '' }}>
                                                    Kristen</option>
                                                <option value="Hindu"
                                                    {{ $profile->religion == 'Hindu' ? 'selected' : '' }}>
                                                    Hindu</option>
                                                <option value="Budha"
                                                    {{ $profile->religion == 'Budha' ? 'selected' : '' }}>
                                                    Budha</option>
                                                <option value="Kepercayaan"
                                                    {{ $profile->religion == 'Kepercayaan' ? 'selected' : '' }}>
                                                    Kepercayaan
                                                </option>
                                                <option value="Ateis"
                                                    {{ $profile->religion == 'Ateis' ? 'selected' : '' }}>
                                                    Ateis</option>
                                            </select>
                                            @error('religion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                                name="phone" id="phone" value="{{ $profile->phone }}" required>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea
                                        class="form-control form-control-sm @error('address') is-invalid @enderror"
                                        id="address" name="address">{{ $profile->address }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea class="form-control form-control-sm @error('about') is-invalid @enderror"
                                        id="about" name="about">{{ $profile->about }}</textarea>
                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="ln_solid"></div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password"
                                                class="form-control form-control-sm @error('password') is-invalid @enderror"
                                                name="password" id="password" required>
                                            <small id="helpId" class="form-text text-muted">Password minimal 8
                                                karakter</small>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password_confirm">Password Confirmation</label>
                                            <input type="password" class="form-control form-control-sm"
                                                name="password_confirmation" id="password_confirm" required>
                                            <small id="helpId" class="form-text text-muted">Password minimal 8
                                                karakter</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection