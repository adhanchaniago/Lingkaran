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
                    <img src="{{ asset('post_images/'.$post->image) }}" class="figure-img" alt="{{ $post->title }}">
                    <figcaption class="figure-caption">Source: Lingkaran.com</figcaption>
                </figure>
                <div class="detail-content">
                    <span class="first-content-text">Lingkaran.com - </span>
                    {!! $post->content !!}
                    @if ($post->editor != 0)
                    <div class="mt-5">
                        <span class="text-muted small">Editor: {{ $post->user_editor->name }}</span>
                    </div>
                    @endif
                </div>
                <div class="detail-tag">
                    <span class="tag-header">Tags: </span>
                    <a href="#">Bodyfit</a>
                    <a href="#">Fitness</a>
                    <a href="#">Sport</a>
                </div>

                <div class="berita-lain mt-5">
                    <div class="berita-lain-header">Berita Lainnya</div>
                    <div class="row">
                        @foreach ($relatedPosts as $post)
                        <div class="col-md-3">
                            <div class="berita-lain-content mt-3">
                                <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}"><img
                                        src="{{ asset('post_images/'.$post->image) }}" alt="{{ $post->title }}"
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
            @include('guest.layouts.partials.sidebar');
        </div>
    </div>
</section>
@endsection