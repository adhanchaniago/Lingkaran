@extends('cms.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> Check type atau judul post yang ingin dijadikan headline.
        </div>
        @endif
        @if (session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ session('danger') }}.
        </div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>Posts List</h2>
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
                                    <th scope="col">Category</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Author</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>
                                        @if($post->image == null)
                                        null
                                        @else
                                        <button class="btn btn-light btn-sm" data-toggle="modal"
                                            data-target=".modal-image" data-title="{{ $post->title }}"
                                            data-image-url="{{ asset('images/'.$post->image) }}"><i
                                                class="fa fa-picture-o"></i></button>
                                        @endif
                                    </td>
                                    <td>{{ $post->user_author->name }}</td>
                                    <td class="d-flex justify-content-end">
                                        <button id="btn-set" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modal-headline" data-id="{{ $post->id }}"
                                            data-title="{{ $post->title }}">Set
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

    <!-- Headline modal -->
    <div class="modal fade" id="modal-headline" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Set a post as healine</h4>
                </div>
                <form action="{{ route('headline.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">Apa anda ingin menjadikan postingan "<span
                                class="post-title text-success"></span>" sebagai berita utama?</p>
                        <input type="hidden" id="form-headline" name="post_id">
                        <div class="item form-group">
                            <label class="col-form-label col-md-2 col-sm-2 label-align" for="type">Type <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <select id="headline-type" name="type"
                                    class="form-control form-control-sm @error('type') is-invalid @enderror">
                                    <option value="{{ old('type') }}" selected>{{ old('type') }}</option>
                                    <option value="main">Main</option>
                                    <option value="secondary">Secondary</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Set</button>
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
    $('.table').DataTable();

    $('.modal-image').on('show.bs.modal', function(e){
        var img = $(e.relatedTarget).data('image-url');
        var title = $(e.relatedTarget).data('title');
        $('.modal-header .modal-title').text(title);
        $('.modal-body .img-fluid').attr('src', img);
    });

    $('#modal-headline').on('show.bs.modal', function(e){
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        $('.modal-body .post-title').text(title);
        $('.modal-body #form-headline').val(id);
    });
</script>
@endsection