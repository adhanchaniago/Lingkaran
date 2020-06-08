@extends('cms.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}.
        </div>
        @endif
    </div>
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

                                            <button class="btn btn-info btn-sm" id="btn-edit"
                                                data-id="{{ $category->id }}" data-title="{{ $category->title }}"
                                                data-toggle="modal" data-target=".modal-edit"><i
                                                    class="fa fa-pencil"></i></button>

                                            <button class="btn btn-danger btn-sm" id="btn-delete"
                                                data-id="{{ $category->id }}" data-title="{{ $category->title }}"
                                                data-toggle="modal" data-target=".modal-delete"><i
                                                    class="fa fa-trash"></i></button>
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
                            placeholder="Category Title" required>
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

<!-- Edit modal -->
<div class="modal fade modal-edit" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <span class="text-info text-title">data</span> category?</h4>
            </div>
            <form action="{{ route('category.update', $category) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <p>Note: Semua Postingan dengan category ini juga akan berubah.</p>
                        <input type="hidden" class="form-control form-control-sm form-edit" disabled>
                        <input type="text" name="title" class="form-control form-control-sm mt-3" placeholder="Title"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /modals -->

<!-- Delete modal -->
<div class="modal fade modal-delete" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete <span class="text-danger text-title">data</span> category?</h4>
            </div>
            <form action="{{ route('category.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="form-group">
                        <p>Note: Semua Postingan dengan category ini juga akan dihapus.</p>
                        <input type="hidden" class="form-control form-control-sm form-delete" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /modals -->
@endsection

@section('script')
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 1500);

    $('.modal-edit').on('show.bs.modal', function(e){
            var id = $(e.relatedTarget).data('id');
            var title = $(e.relatedTarget).data('title');
            $('.modal-header .text-title').text(title);
            $('.modal-body .form-edit').val(id);
        });
    $('.modal-delete').on('show.bs.modal', function(e){
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        $('.modal-header .text-title').text(title);
        $('.modal-body .form-delete').val(id);
    });
</script>
@endsection