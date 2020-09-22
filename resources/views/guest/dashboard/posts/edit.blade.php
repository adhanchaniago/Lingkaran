@extends('guest.layouts.dashboard')

@section('page')
<div class="create-post shadow-sm">
    <div class="create-post-header">
        Form Post <small class="ml-2">star (*) marked is not nullable</small>
    </div>
    <div class="dropdown-divider"></div>
    <div class="create-post-body">
        <form action="{{ route('guestuser.post.update', $post->slug) }}" method="POST" enctype="multipart/form-data"
            class="my-3">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title <small>*</small></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror"
                        id="title" name="title" value="{{ $post->title ?? old('title') }}" required>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category <small>*</small></label>
                <div class="col-sm-10">
                    <select id="category" name="category"
                        class="custom-select custom-select-sm @error('category') is-invalid @enderror">
                        <option>Select category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($post->category->id ==$category->id) selected @endif>
                            {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file"
                        class="form-control-file form-control-file-sm @error('image') is-invalid @enderror" id="image"
                        name="image" required>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="tag" class="col-sm-2 col-form-label">Tags <small>*</small></label>
                <div class="col-sm-10">
                    <select id="tag" name="tags[]"
                        class="custom-select custom-select-sm select-tag @error('tags') is-invalid @enderror" multiple>
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->title }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Content <small>*</small></label>
                <div class="col-sm-10">
                    <textarea id="content" name="content"
                        class="form-control form-control-sm @error('content') is-invalid @enderror">
                        {{ $post->content ?? old('content') }}
                    </textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="dropdown-divider"></div>

            <div class="form-group row">
                <div class="col-md-3 offset-9">
                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
                    <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                    <button type="button" onclick="location.href='{{ URL()->previous() }}'"
                        class="btn btn-secondary btn-sm">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('b-script')
<script>
    $(document).ready(function(){
        $('.select-tag').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
        $('.select-tag').select2({
            maximumSelectionLength: 5
        });
        CKEDITOR.replace( 'content' );
    });
</script>
@endsection