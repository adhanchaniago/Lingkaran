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
                <h2>Headline Post List</h2>
                <button type="button" class="btn btn-outline-primary btn-sm float-right"
                    onclick="location.href='{{ route('headline.create') }}'"><i class="fa fa-plus"></i>
                    Headline</button>
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
                                    <th scope="col">Type</th>
                                    <th scope="col">Set at</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($headlines as $headline)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td scope="col">{{ $headline->post->title }}</td>
                                    <td scope="col">{{ $headline->post->category->title }}</td>
                                    <td>
                                        @if($headline->post->image == null)
                                        null
                                        @else
                                        <button class="btn btn-light btn-sm" data-toggle="modal"
                                            data-target=".modal-image" data-title="{{ $headline->post->title }}"
                                            data-image-url="{{ asset('images/'.$headline->post->image) }}"><i
                                                class="fa fa-picture-o"></i></button>
                                        @endif
                                    </td>
                                    <td scope="col">{{ $headline->post->user_author->name }}</td>
                                    <td scope="col" class="text-bold text-info">
                                        @if ( $headline->type == 'main')
                                        <span class="badge badge-pill badge-primary">Main</span>
                                        @else
                                        <span class="badge badge-pill badge-secondary">Secondary</span>
                                        @endif
                                    </td>
                                    <td scope="col">{{ $headline->created_at->diffForHumans() }}</td>
                                    <td scope="col" class="text-center">
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modal-delete" data-id="{{ $headline->id }}"
                                            data-title="{{ $headline->post->title }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
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
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Menghapus post dari Headline</h4>
                </div>
                <form action="{{ route('headline.destroy', 'id') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p class="text-center">Apa anda yakin ingin menghapus headline dari postingan "<span
                                class="post-title text-danger"></span>" ?</p>
                        <input type="hidden" id="form-delete" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
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

    $('#modal-delete').on('show.bs.modal', function(e){
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        $('.modal-body .post-title').text(title);
        $('.modal-body #form-delete').val(id);
    });
</script>
@endsection