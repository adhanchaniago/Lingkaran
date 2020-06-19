@extends('guest.layouts.app')
@section('content')
<!-- Breadcrum -->
<nav aria-label="breadcrumb">
    <div class="container p-0 mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guest.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $post->category->title }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
        </ol>
    </div>
</nav>

<section class="post-detail mt-3">
    <div class="container">
        <div class="row">
            <!-- Post Detail -->
            <div class="col-md-8">
                <div class="detail-category">
                    <a href="#" style="background-color: {{ $post->category->color }};">{{ $post->category->title}}</a>
                </div>
                <div class="detail-title mt-3">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="detail-info">
                    <span><i class="fas fa-user"></i> {{ $post->user_author->name }}</span>
                    <span><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}</span>
                </div>
                <figure class="figure mt-3">
                    <img src="{{ asset('images/'.$post->image) }}" class="figure-img" alt="{{ $post->title }}">
                    <figcaption class="figure-caption">Source: Lingkaran.com</figcaption>
                </figure>
                <div class="detail-content">
                    <span class="first-content-text">Lingkaran.com - </span>
                    {!! $post->content !!}
                    @if ($post->editor != 0)
                    <div class="mt-3">
                        <span class="text-muted small">Editor: {{ $post->user_editor->name }}</span>
                    </div>
                    @endif
                </div>
                <div class="detail-tag mt-3">
                    <span class="tag-header">Tags: </span>
                    @foreach ($post->tags as $tag)
                        <a href="#">{{ $tag->title }}</a>
                    @endforeach
                </div>

                <div class="berita-lain mt-5">
                    <div class="berita-lain-header">Berita Lainnya</div>
                    <div class="row">
                        @foreach ($relatedPosts as $post)
                        <div class="col-md-3">
                            <div class="berita-lain-content mt-3">
                                <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}"><img
                                        src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }}"
                                        class="berita-lain-img"></a>
                                <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}"
                                    class="berita-lain-title">{{ $post->title }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            @include('guest.layouts.partials.sidebar')
        </div>
    </div>
</section>

<!-- Admin Button -->
@if (auth()->user())
<div class="admin-btn action shadow-lg p-2">
    <h6 class="text-center border-bottom pb-1">Action</h6>
    <button onclick="location.href='{{ route('post.index') }}'" class="btn btn-sm btn-block btn-secondary">
        <i class="far fa-newspaper"></i> Index
    </button>
    <button onclick="location.href='{{ route('post.edit', $post) }}'" class="btn btn-sm btn-block btn-info">
        <i class="fas fa-edit"></i> Edit
    </button>
    @if ($post->status != 1)
    <button class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#modal-confirm"
        data-key="publish">
        <i class="fa fa-bullhorn"></i> Publish
    </button>
    @else
    <button class="btn btn-sm btn-block btn-warning" data-toggle="modal" data-target="#modal-confirm" data-key="revoke">
        <i class="fa fa-undo"></i> Revoke
    </button>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <form id="url" action="#" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p class="text-center" id="title">title</p>
                    <input type="hidden" id="form-confirm" name="id">
                </div>
                <div class="modal-footer">
                    <button type="submit" id="action">action</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /modals -->
@endif
@endsection

@section('script')
<script>
    $('#modal-confirm').on('show.bs.modal', function(e){
        const key = $(e.relatedTarget).data('key');
        if (key !== 'revoke') {
            $('.modal-body #title').text('Apakah anda ingin publish post ini?');
            $('.modal-body #form-confirm').val({{$post->id}});
            $('.modal-footer #action').text('Publish');
            $('.modal-footer #action').attr('class', 'btn btn-success btn-sm');
            $('#url').attr('action', '{{ route("post.publish", "id") }}');
        } else {
            $('.modal-body #title').text('Apakah anda ingin tarik kembali post ini?');
            $('.modal-body #form-confirm').val({{$post->id}});
            $('.modal-footer #action').text('Revoke');
            $('.modal-footer #action').attr('class', 'btn btn-warning btn-sm');
            $('#url').attr('action', '{{ route("post.revoke", "id") }}');
        }
    })
</script>
@endsection