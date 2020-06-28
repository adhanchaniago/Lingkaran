@extends('guest.layouts.app')

@section('title')
{{ (!empty($posts[0])) ? $posts[0]->category->title : 'Lingkaran' }}
@endsection

@section('content')
<!-- Breadcrum -->
<nav aria-label="breadcrumb">
    <div class="container p-0 mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guest.home') }}"><i class="fa fa-home"></i>
                    Home</a></li>
            <li class="breadcrumb-item">{{ (!empty($posts[0])) ? $posts[0]->category->title : 'Lingkaran' }}</li>
        </ol>
    </div>
</nav>

<section class="post-detail mt-3">
    <div class="container">
        <div class="row">
            <!-- Category -->
            <div class="col-md-8">
                <div class="col-md-12 px-0">
                    <div class="category-header">
                        <span class="category-title">Category : <span
                                style="color: {{ (!empty($posts[0])) ? $posts[0]->category->color : '' }}">{{ (!empty($posts[0])) ? $posts[0]->category->title : 'Berita belum ada' }}</span></span>
                    </div>
                    @foreach ($posts as $post)
                    <div class="category-body mt-4 shadow">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="category-image">
                                    <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}"><img src="{{ asset('images/post/'. $post->image) }}" alt="{{ $post->title }}"></a>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 p-4 pt-md-3 pr-md-4">
                                <div class="post-tag">
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('guest.tag.show', $tag->slug) }}" class="tag-item">{{ $tag->title }}</a>
                                    @endforeach
                                </div>
                                <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}" class="post-title">{{ $post->title }}</a>
                                <div class="post-info my-1">
                                    <span><i class="fas fa-user"></i> {{ $post->user_author->firstname }}</span>
                                    <span><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}</span>
                                    <span><i class="far fa-eye"></i> {{ ($post->view >= 1000) ? floor($post->view / 1000) . 'k' : $post->view }} Views</span>
                                </div>
                                <div class="post-content">
                                    {!! $post->content !!}
                                </div>
                                <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}" class="post-readmore">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-12 load-more px-0 mt-3 mt-md-5 d-flex justify-content-center">
                    <a href="#">Load More</a>
                </div>
            </div>

            <!-- Sidebar -->
            @include('guest.layouts.partials.sidebar')
        </div>
    </div>
</section>
@endsection
