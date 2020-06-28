@extends('cms.layouts.app')

@section('content')
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Reporters <small>All reporters list and access</small></h2>
            <button onclick="location.href='{{ route('register') }}'" class="btn btn-primary btn-sm float-right"><i
                    class="fa fa-plus"> Reporter</i></button>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            @foreach ($reporters as $reporter)
            <div class="col-md-3 cold-sm-12">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-center">
                        <img src="
                        @foreach ($reporter->profiles as $profile)
                            {{ (!empty($profile->image) ? asset('images/profile/'. $profile->image) : asset('cms/images/user.png')) }}"
                            @endforeach class="card-img rounded-circle img-fluid"
                            style="width: 100px; object-fit: cover;object-position: center center;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $reporter->firstname }} {{ $reporter->lastname }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $reporter->roles->first()->name }} |
                            @if ($reporter->status == 1)
                            <span class="text-success">Active</span>
                            @else
                            <span class="text-danger">Suspended</span>
                            @endif
                        </h6>
                        <p class="card-text">
                            @foreach ($reporter->roles->first()->permissions as $permission)
                            <span class="badge badge-secondary">{{ $permission->name }}</span>
                            @endforeach
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item pl-0"><i class="fa fa-home"></i> {{ $reporter->profiles->first()->address }}</li>
                            <li class="list-group-item pl-0"><i class="fa fa-phone"></i> {{ $reporter->profiles->first()->phone }}</li>
                        </ul>
                        <div class="mt-2">
                            <a href="#" class="card-link text-info"><i class="fa fa-user"> Profile</i></a>
                            <a href="#" class="card-link text-primary"><i class="fa fa-ban"> Status</i></a>
                            <a href="#" class="card-link text-danger"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-12 col-sm-12">
                {{ $reporters->links() }}
            </div>
        </div>
    </div>
</div>
@endsection