@extends('guest.layouts.app')

@section('title')
{{ config('app.name', 'Lingkaran') }}
@endsection

@section('content')
<section class="guest-dashboard">
    <div class="container my-3">
        <div class="dashboard">
            <div class="card mt-1 shadow">
                <div class="card-header">Dashboard
                    <button class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Post</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 pr-0">
                            @include('guest.layouts.partials.nav')
                        </div>
                        <div class="dashboard-page col-md-10 mt-3 mt-md-0">
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

@section('b-script')
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>
@endsection