@extends('cms.layouts.app')
@section('content')

<div class="row">

    <div class="col-md-12 col-sm-12 ">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}.
        </div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>Post List</h2>
                <button type="button" class="btn btn-outline-primary btn-sm float-right"
                    onclick="location.href='{{ route('post.create') }}'"><i class="fa fa-plus"></i>
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
                                    <th scope="col">Content</th>
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
                                @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <button class="btn btn-light btn-sm"><i class="fa fa-newspaper-o"></i></button>
                                    </td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>
                                        @if($post->image == null)
                                        null
                                        @else
                                        <button class="btn btn-light btn-sm" data-toggle="modal"
                                            data-target=".modal-image" data-title="{{ $post->title }}"
                                            data-image-url="{{ asset('post_images/'.$post->image) }}"><i
                                                class="fa fa-picture-o"></i></button>
                                        @endif
                                    </td>
                                    <td>{{ $post->user_author->name }}</td>
                                    <td>@if ($post->editor == null)
                                        ...
                                        @else
                                        {{ $post->user_editor->name }}
                                        @endif</td>
                                    <td>@if ($post->status == 1)
                                        <span class="text-success">published</span>
                                        @else
                                        <span class="text-warning">unpublish</span>
                                        @endif</td>
                                    <td>{{ $post->view }}</td>
                                    <td class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-info"
                                            onclick="location.href='{{ route('post.edit', $post) }}'"><i
                                                class="fa fa-pencil"></i></button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target=".modal-delete" data-title="{{ $post->title }}"><i
                                                class="fa fa-trash"></i></button>

                                        @if( $post->status == 0 )
                                        <button onclick="document.getElementById('publish-{{ $post->id }}').submit();"
                                            type="button" class="btn btn-success btn-sm"><i
                                                class="fa fa-bullhorn"></i></button>
                                        <form style="display:none;" id="publish-{{ $post->id }}"
                                            action="{{ route('post.publish', $post->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        @else
                                        <button onclick="document.getElementById('unpublish-{{ $post->id }}').submit();"
                                            type="button" class="btn btn-warning btn-sm"><i
                                                class="fa fa-undo"></i></button>
                                        <form style="display:none;" id="unpublish-{{ $post->id }}"
                                            action="{{ route('post.unpublish', $post->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                {{ $posts->links() }}
            </ul>
        </nav>
    </div>

    <!-- Image modal -->
    <div class="modal fade modal-image" tabindex="-1" role="dialog">
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
    <div class="modal fade modal-delete" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Deleting post</h6>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete "<span class="title"></span>" ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm"
                        onclick="document.getElementById('delete-form').submit();">Delete</button>
                    <form id="delete-form" action="{{ route('post.destroy', $post ?? '') }}" method="POST"
                        style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /modals -->
</div>
@endsection

@section('script')
<script>
    $('.modal-image').on('show.bs.modal', function(e){
        var img = $(e.relatedTarget).data('image-url');
        var title = $(e.relatedTarget).data('title');
        $('.modal-header .modal-title').text(title);
        $('.modal-body .img-fluid').attr('src', img);
    });

    $('.modal-delete').on('show.bs.modal', function(e){
        var title = $(e.relatedTarget).data('title');
        $('.modal-body .title').text(title);
    });
</script>
@endsection