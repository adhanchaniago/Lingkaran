@extends('guest.layouts.app')

@section('title')
Lingkaran - {{ $post->title }}
@endsection

@section('content')
<!-- Breadcrum -->
<nav aria-label="breadcrumb">
    <div class="container p-0 mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guest.home') }}"><i class="fa fa-home"></i>
                    Home</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('guest.category.show', $post->category->slug) }}">{{ $post->category->title }}</a>
            </li>
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
                    <a href="{{ route('guest.category.show', $post->category->slug) }}"
                        style="background-color: {{ $post->category->color }};">{{ $post->category->title }}</a>
                </div>
                <div class="detail-title mt-3">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="detail-info">
                    <span><i class="fas fa-user"></i> {{ $post->user_author->firstname }}</span>
                    <span><i class="far fa-clock"></i> {{ $post->created_at->format('d M Y') }}</span>
                    <span><i class="far fa-eye"></i>
                        {{ ($post->view>= 1000) ? floor($post->view / 1000) . 'k' : $post->view }} views</span>

                </div>
                <figure class="figure mt-3">
                    <img src="{{ asset('images/post/'.$post->image) }}" class="figure-img" alt="{{ $post->title }}">
                    <figcaption class="figure-caption">Source: Lingkaran.com</figcaption>
                </figure>
                <div class="detail-content">
                    <span class="first-content-text">Lingkaran.com</span> -
                    {!! $post->content !!}
                    @if($post->editor != 0)
                    <div class="mt-3">
                        <span class="text-muted small">Editor: {{ $post->user_editor->firstname }}</span>
                    </div>
                    @endif
                </div>
                <div class="detail-tag mt-3">
                    <span class="tag-header">Tags</span>
                    @foreach($post->tags as $tag)
                    <a href="{{ route('guest.tag.show', $tag->slug) }}">{{ $tag->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Button -->
    @if(auth()->user())
    @hasrole('Writer')
    <div class="admin-btn action shadow-lg p-2">
        <h6 class="text-center border-bottom pb-1">Action</h6>
        <button onclick="location.href='{{ url()->previous() }}'" class="btn btn-sm btn-block btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </button>
    </div>
    @endhasrole
    @endif
</section>
@endsection