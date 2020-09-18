@extends('guest.layouts.dashboard')
@section('page')
<nav>
    <div class="nav nav-fill nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
            aria-controls="nav-profile" aria-selected="true">My Profile
        </a>
        <a class="nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab"
            aria-controls="nav-update" aria-selected="false">Update Informations
        </a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        All User's Informations
    </div>
    <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
        Update User's Informations
    </div>
</div>
@endsection