@extends('cms.layouts.app')
@section('content')
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>User Profile <small>All about this user and its information</small></h2>
            <div class="pull-right">
                <button onclick="location.href='{{ url()->previous() }}'"
                    class="btn btn-secondary btn-sm">Back</button>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view img-fluid rounded-lg"
                            src="{{ (!empty($user->profiles->first()->image)) ? asset('images/profile/'.$user->profiles->first()->image) : asset('cms/images/user.png') }}"
                            alt="Avatar" title="{{ $user->firstname }}">
                    </div>
                </div>
                <h3>{{ $user->firstname. ' ' . $user->lastname }}</h3>
                <span class="badge badge-info my-2">{{ $user->roles->first()->name }}</span>
                <div class="row mt-1">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-user user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ date('d M Y', strToTime($user->profiles->first()->birth)) }}</div>
                </div>
                <div class="row mt-1">
                    @if ($user->profiles->first()->gender == 'Male')
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-male user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">Male</div>
                    @else
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-female user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">Female</div>
                    @endif
                </div>
                <div class="row mt-1">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-user user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ $user->profiles->first()->religion }}</div>
                </div>
                <div class="row mt-1">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-heart user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ $user->profiles->first()->status }}</div>
                </div>
                <div class="row mt-1">
                    <div class="col-1 d-flex justify-content-center pt-1"><i
                            class="fa fa-map-marker user-profile-icon"></i></div>
                    <div class="col-10 pl-0">{{ $user->profiles->first()->address }}</div>
                </div>
                <div class="row mt-1">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-phone user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ $user->profiles->first()->phone }}</div>
                </div>
                <div class="row mt-1">
                    <div class="col-1 d-flex justify-content-center pt-1"><i class="fa fa-envelope user-profile-icon"></i>
                    </div>
                    <div class="col-10 pl-0">{{ $user->email }}</div>
                </div>
                <br />
            </div>

            <div class="col-md-9 col-sm-9 ">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                                data-toggle="tab" aria-expanded="true">Recent Posts</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2"
                                data-toggle="tab" aria-expanded="false">About</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                                <p>Total post <span class="badge badge-pill badge-info">{{ count($user->posts) }}</span>
                                </p>
                                @foreach ($posts as $post)
                                <li>
                                    <img src="{{ asset('images/post/'. $post->image) }}" class="avatar">
                                    <div class="message_date">
                                        <h3 class="date text-info">{{ $post->created_at->format('d') }}</h3>
                                        <p class="month">{{ $post->created_at->format('M') }}</p>
                                    </div>
                                    <div class="message_wrapper">
                                        <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}"><h4 class="heading">{{ $post->title }}</h4></a>
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>{{ $user->profiles->first()->about }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection