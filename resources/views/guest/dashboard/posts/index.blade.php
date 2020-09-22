@extends('guest.layouts.dashboard')

@section('page')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session('success') }}.
</div>
@endif
<nav>
    <div class="nav nav-fill nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-myposts-tab" data-toggle="tab" href="#nav-myposts" role="tab"
            aria-controls="nav-myposts" aria-selected="true">My Posts
        </a>
        <a class="nav-link" id="nav-unpublished-tab" data-toggle="tab" href="#nav-unpublished" role="tab"
            aria-controls="nav-unpublished" aria-selected="false">Unpublished
        </a>
        <a class="nav-link" id="nav-rejected-tab" data-toggle="tab" href="#nav-rejected" role="tab"
            aria-controls="nav-rejected" aria-selected="false">Rejected
        </a>
        <a class="nav-link" id="nav-published-tab" data-toggle="tab" href="#nav-published" role="tab"
            aria-controls="nav-published" aria-selected="false">Published
        </a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-myposts" role="tabpanel" aria-labelledby="nav-myposts-tab">

        <div class="row my-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <table class="table table-striped table-bordered table-sm table-responsive-sm" id="posts-table">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="nav-unpublished" role="tabpanel" aria-labelledby="nav-unpublished-tab">
        <div class="row my-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <table class="table table-striped table-bordered table-sm table-responsive-sm" id="unpublish-table">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab">
        <div class="row my-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <table class="table table-striped table-bordered table-sm table-responsive-sm" id="rejected-table">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-published" role="tabpanel" aria-labelledby="nav-published-tab">
        <div class="row my-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <table class="table table-striped table-bordered table-sm table-responsive-sm" id="published-table">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image modal -->
<div class="modal fade modal-image" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Title</h6>
            </div>
            <div class="modal-body">
                <img src="" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /modals -->

<!-- Delete modal -->
<div class="modal fade modal-delete" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Delete Post</h6>
            </div>
            <form action="{{ route('guestuser.post.destroy', 'id') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <p>Apakah anda yakin ingin menghapus post "<span class="title text-danger"></span>" ?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /modals -->
@endsection

@section('b-script')
<script>
    $(document).ready(function () {
        $('#posts-table').DataTable({
            processing : true,
            serverSide : true,
            ajax: {
                url: "{{ route('guestuser.post.index') }}",
                type: 'GET'
            },
            columns : [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data:'title', name:'posts.title'},
                {data:'content', name:'posts.content'},
                {data:'category.title', name:'category.category'},
                {data:'image', name:'image'},
                {data:'status', name:'posts.status'},
                {data:'action', name:'action'},
            ],
        });

        $('#unpublish-table').DataTable({
            processing : true,
            serverSide : true,
            ajax: {
                url: "{{ route('guestuser.post.getUnpublished') }}",
                type: 'GET'
            },
            columns : [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data:'title', name:'posts.title'},
                {data:'content', name:'posts.content'},
                {data:'category.title', name:'category.category'},
                {data:'image', name:'image'},
                {data:'status', name:'posts.is_published'},
            ],
        });

        $('#rejected-table').DataTable({
            processing : true,
            serverSide : true,
            ajax: {
                url: "{{ route('guestuser.post.getRejected') }}",
                type: 'GET'
            },
            columns : [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data:'title', name:'posts.title'},
                {data:'content', name:'posts.content'},
                {data:'category.title', name:'category.category'},
                {data:'image', name:'image'},
                {data:'status', name:'posts.is_published'},
            ],
        });

        $('#published-table').DataTable({
            processing : true,
            serverSide : true,
            ajax: {
                url: "{{ route('guestuser.post.getPublished') }}",
                type: 'GET'
            },
            columns : [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data:'title', name:'posts.title'},
                {data:'content', name:'posts.content'},
                {data:'category.title', name:'category.category'},
                {data:'image', name:'image'},
                {data:'status', name:'posts.is_published'},
            ],
        });
        
        $('.modal-image').on('show.bs.modal', function (e) {
            var img = $(e.relatedTarget).data('image-url');
            var title = $(e.relatedTarget).data('title');
            $('.modal-header .modal-title').text(title);
            $('.modal-body .img-fluid').attr('src', img);
        });

        $('.modal-delete').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var title = $(e.relatedTarget).data('title');
            $('.modal-body #id').val(id);
            $('.modal-body .title').text(title);
        });
    });
</script>
@endsection