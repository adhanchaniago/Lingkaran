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
    <!-- Form Input -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Post <small>star &#40;*&#41; marked is not nullable</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content mt-3">
                <form data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="title" name="title" required="required"
                                class="form-control form-control-sm @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="category" name="category"
                                class="form-control form-control-sm @error('category') is-invalid @enderror" required>
                                <option></option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category')==$category->id)
                                    selected
                                    @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="image" class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="image" class="form-control-file" type="file" name="image">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="content" class="col-form-label col-md-3 col-sm-3 label-align">Content <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea id="content" name="content"
                                class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                <button type="button" onclick="location.href='{{ route('post.index') }}'"
                                    class="btn btn-secondary btn-sm">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection