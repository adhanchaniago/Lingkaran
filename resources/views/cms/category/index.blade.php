@extends('cms.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Category <small>all stored categories</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td class="d-flex justify-content-center">
                                            <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                <li class="page-item">
                    {{ $categories->links() }}
                </li>
            </ul>
        </nav>
    </div>

    <!-- Form Input -->
    <div class="col-md-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Category Form <small>add new category</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <input id="title" name="title" type="text"
                            class="form-control form-control-sm @error('title') is-invalid @enderror"
                            placeholder="title Title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection