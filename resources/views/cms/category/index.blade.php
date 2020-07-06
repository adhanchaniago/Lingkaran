@extends('cms.layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}.
        </div>
        @endif
    </div>
    <div class="col-md-8">
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
                                        <th scope="col">Color</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $category->title }}</td>
                                        <td><span class="badge"
                                                style="background-color: {{ $category->color }};">{{ $category->color }}</span>
                                        </td>
                                        <td class="d-flex justify-content-center">

                                            @can('edit category')
                                            <button class="btn btn-info btn-sm" id="btn-edit" data-toggle="modal"
                                                data-target="#modal-edit" data-id="{{ $category->id }}"
                                                data-title="{{ $category->title }}" data-color="{{ $category->color }}">
                                                <i class="fa fa-edit"></i></button>
                                            @endcan

                                            @can('delete category')
                                            <button class="btn btn-danger btn-sm" id="btn-delete" data-toggle="modal"
                                                data-target="#modal-delete" data-id="{{ $category->id }}"
                                                data-title="{{ $category->title }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @endcan
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
    </div>

    <!-- Form Input -->
    @can('add category')
    <div class="col-md-4 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Category Form <small>add new category</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="control-label col-md-3 col-sm-3  ">Title</label>
                        <div class="col-md-9 col-sm-9">
                            <input id="title" name="title" type="text" value="{{ old('title') }}"
                                class="form-control form-control-sm @error('title') is-invalid @enderror"
                                placeholder="Category Title" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="color" class="control-label col-md-3 col-sm-3  ">Color</label>
                        <div class="col-md-9 col-sm-9  ">
                            <div class="input-group demo2">
                                <input id="color" name="color" type="text" value="{{ old('color') }}"
                                    class="form-control form-control-sm @error('color') is-invalid @enderror"
                                    required />
                                <span class="input-group-addon"><i></i></span>
                                @error('color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Save</button>
                        <button type="reset" class="btn btn-secondary btn-sm pull-right">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @endcan
</div>

<!-- Edit modal -->
<div class="modal fade" id="modal-edit" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah kategori <span class="category-title text-info"></span></h4>
            </div>
            <form action="{{ route('category.update', 'id' ) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group row">
                        <p class="col-md-12 col-sm-12 text-danger text-center">Note: Semua Postingan dengan category ini
                            juga akan berubah.</p>
                        <input type="hidden" id="form-id" name="id">
                        <label for="title" class="control-label col-md-2 col-sm-2">Title</label>
                        <div class="col-md-10 col-sm-10">
                            <input id="title" name="title" type="text" value="{{ old('title') }}"
                                class="form-control form-control-sm @error('title') is-invalid @enderror"
                                placeholder="Category Title" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="color" class="control-label col-md-2 col-sm-2">Color</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group demo2">
                                <input id="color" name="color" type="text" value="{{ old('color') }}"
                                    class="form-control form-control-sm @error('color') is-invalid @enderror"
                                    required />
                                <span class="input-group-addon"><i></i></span>
                                @error('color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
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
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus kategori <span class="category-title text-danger"></span></h4>
            </div>
            <form action="{{ route('category.destroy', 'id') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="form-group row">
                        <p class="col-md-12 col-sm-12 text-center text-danger">Menghapus kategori ini juga akan
                            menghapus seluruh postingan yang menggunakan kategori ini. anda yakin?
                        </p>
                    </div>
                    <input type="hidden" id="form-id" name="id" value="" />
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

@endsection

@section('b-script')
<script>
    $('.table').DataTable();
    $('#modal-edit').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        var color = $(e.relatedTarget).data('color');
        $('.modal-header .category-title').text(title);
        $('.modal-body #form-id').val(id);
        $('.modal-body #title').val(title);
        $('.modal-body #color').val(color);
    });

    $('#modal-delete').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        $('.modal-header .category-title').text(title);
        $('.modal-body #form-id').val(id);
    });

</script>
@endsection