@extends('cms.layouts.app')

@section('content')
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Reporters <small>All reporters list and access</small></h2>
            <button onclick="location.href='{{ route('register') }}'" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> Reporter</i></button>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            <div class="col-md-3 cold-sm-12">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-center">
                        <img src="{{ asset('cms/images/img.jpg') }}" class="card-img rounded-circle" style="width: 100px; object-fit: cover;object-position: center center;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Riyan Amanda</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Administrator | <span class="text-success">Active</span></h6>
                        <p class="card-text">
                            <span class="badge badge-primary">Add post</span>
                            <span class="badge badge-secondary">Edit post</span>
                            <span class="badge badge-success">Delete post</span>
                            <span class="badge badge-danger">Add category</span>
                            <span class="badge badge-warning">Edit category</span>
                            <span class="badge badge-info">Delete category</span>
                            <span class="badge badge-light">Add tag</span>
                            <span class="badge badge-dark">Edit tag</span>
                            <span class="badge badge-danger">Delete tag</span>
                            <span class="badge badge-secondary">User</span>
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item pl-0"><i class="fa fa-home"></i> Jl.Bumi, Palembang</li>
                            <li class="list-group-item pl-0"><i class="fa fa-phone"></i> 081279xxxxxx</li>
                        </ul>
                        <div class="mt-2">
                            <a href="#" class="card-link text-info"><i class="fa fa-user"> Profile</i></a>
                            <a href="#" class="card-link text-primary"><i class="fa fa-ban"> Status</i></a>
                            <a href="#" class="card-link text-danger"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
