@extends('guest.layouts.app')

@section('content')
<section class="guest-dashboard">
    <div class="container my-3">
        <div class="dashboard">
            <div class="card mt-1 shadow">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @include('guest.layouts.partials.nav')
                        </div>
                        <div class="dashboard-page col-md-9 mt-3 mt-md-0">
                            @section('page')
                            @show
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection