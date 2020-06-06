@extends('cms.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Post List</h2>
                <button type="button" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-plus"></i> new
                    post</button>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Editor</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">View</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tetap produktif walau hanya dirumah saja dengan pengembangan diri</td>
                                    <td>Lifestyle</td>
                                    <td>Null</td>
                                    <td>Riyan Amanda</td>
                                    <td>Violen Amanda</td>
                                    <td>Publish</td>
                                    <td>0</td>
                                    <td class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-sm btn-warning"><i class="fa fa-bullhorn"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection