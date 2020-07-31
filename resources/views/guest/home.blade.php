@extends('guest.layouts.app')

@section('title')
{{ config('app.name', 'Lingkaran') }}
@endsection

@section('content')
<!-- Trending Text Slide -->
<section class="trending my-4 d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center">
                <span class="trending-header p-2"><i class="fas fa-bolt"></i> Populer</span>
                <div id="carousel-text" class="carousel slide pl-3" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($trending as $key => $post)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <a
                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">{{ $post->title }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Headline -->
<section class="headline">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 pl-md-3">
                <div class="row">
                    <div class="col-md-8 my-3 my-md-0">
                        <div id="headline-captions" class="carousel slide carousel-fade" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($headline_main as $key => $headline)
                                <li data-target="#headline-captions" data-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($headline_main as $key => $main)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="headline-wrapper h-3"
                                        style="background-image: url({{ asset('images/post/'. $main->post->image) }});">
                                        <a href="{{ route('guest.post.show', [$main->post->category->slug, $main->post]) }}"
                                            class="headline-link"></a>
                                        <div
                                            class="headline-body d-flex flex-column justify-content-end align-items-start">
                                            <a href="{{ route('guest.category.show', $main->post->category->slug) }}"
                                                class="headline-category px-2"
                                                style="background-color: {{ $main->post->category->color }};">{{ $main->post->category->title }}</a>
                                            <h3 class="headline-title-wrap mt-2 mb-1">
                                                <a href="{{ route('guest.post.show', [$main->post->category->slug, $main->post]) }}"
                                                    class="headline-title">{{ $main->post->title }}</a>
                                            </h3>
                                            <span class="headline-info d-none d-md-block">
                                                <span><i class="fas fa-user"></i>
                                                    {{ $main->post->user_author->firstname }}</span>
                                                <span><i class="far fa-clock"></i>
                                                    {{ $main->post->created_at->diffForHumans() }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#headline-captions" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#headline-captions" role="button" data-slide="next">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>
                    </div>

                    <div class="col-md-4 pl-md-0 pr-lg-4">
                        @if(!empty($headline_secondary[0]))
                        <div class="headline-wrapper h-3"
                            style="background-image: url({{ asset('images/post/'. $headline_secondary[0]->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_secondary[0]->post->category->slug, $headline_secondary[0]->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="{{ route('guest.category.show', $headline_secondary[0]->post->category->slug) }}"
                                    class="headline-category px-2"
                                    style="background-color: {{ $headline_secondary[0]->post->category->color }};">{{ $headline_secondary[0]->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_secondary[0]->post->category->slug, $headline_secondary[0]->post]) }}"
                                        class="headline-title">{{ $headline_secondary[0]->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_secondary[0]->post->user_author->firstname }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_secondary[0]->post->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        @if(!empty($headline_secondary[1]))
                        <div class="headline-wrapper h-2"
                            style="background-image: url({{ asset('images/post/' . $headline_secondary[1]->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_secondary[1]->post->category->slug, $headline_secondary[1]->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="{{ route('guest.category.show', $headline_secondary[1]->post->category->slug) }}"
                                    class="headline-category px-2"
                                    style="background-color: {{ $headline_secondary[1]->post->category->color }};">{{ $headline_secondary[1]->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_secondary[1]->post->category->slug, $headline_secondary[1]->post]) }}"
                                        class="headline-title">{{ $headline_secondary[1]->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_secondary[1]->post->user_author->firstname }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_secondary[1]->post->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-md-4 mt-3 pl-md-0">
                        @if(!empty($headline_secondary[2]))
                        <div class="headline-wrapper h-2"
                            style="background-image: url({{ asset('images/post/' . $headline_secondary[2]->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_secondary[2]->post->category->slug, $headline_secondary[2]->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="{{ route('guest.category.show', $headline_secondary[2]->post->category->slug) }}"
                                    class="headline-category px-2"
                                    style="background-color: {{ $headline_secondary[2]->post->category->color }};">{{ $headline_secondary[2]->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_secondary[2]->post->category->slug, $headline_secondary[2]->post]) }}"
                                        class="headline-title">{{ $headline_secondary[2]->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_secondary[2]->post->user_author->firstname }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_secondary[2]->post->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-md-4 mt-3 pl-md-0 pr-lg-4">
                        @if(!empty($headline_secondary[3]))
                        <div class="headline-wrapper h-2"
                            style="background-image: url({{ asset('images/post/' . $headline_secondary[3]->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_secondary[3]->post->category->slug, $headline_secondary[3]->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="{{ route('guest.category.show', $headline_secondary[3]->post->category->slug) }}"
                                    class="headline-category px-2"
                                    style="background-color: {{ $headline_secondary[3]->post->category->color }};">{{ $headline_secondary[3]->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_secondary[3]->post->category->slug, $headline_secondary[3]->post]) }}"
                                        class="headline-title">{{ $headline_secondary[3]->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_secondary[3]->post->user_author->firstname }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_secondary[3]->post->created_at->diffForHumans() }}</span>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-none d-lg-block pl-0 bg-secondary">
                <a href="#"><img src="assets/images/ads.png" alt="Iklan" style="height: 100%;"></a>
            </div>
        </div>
    </div>
</section>

<!-- Berita Terkini -->
<section class="berita-terkini mt-5">
    <div class="container pr-md-0">
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <span class="terkini-header">Berita Terkini</span>
                        <a class="nav-item nav-link ml-auto active" id="nav-all-tab" data-toggle="tab" href="#nav-all"
                            role="tab" aria-controls="nav-all" aria-selected="true">All</a>

                        @foreach ($categories as $category)
                        <a class="nav-item nav-link" id="nav-{{ $category->slug }}-tab" data-toggle="tab"
                            href="#nav-{{ $category->slug }}" role="tab" aria-controls="nav-{{ $category->slug }}"
                            aria-selected="true">{{ $category->title }}</a>
                        @endforeach

                        <a href="{{ route('guest.category.index') }}" class="nav-item nav-link">Lainnya</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    {{-- Category all --}}
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach($populer_category_all as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('images/post/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a
                                                                href="{{ route('guest.category.show', $post->category->slug) }}"><span
                                                                    class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span>
                                                                    <i class="fas fa-user"></i>
                                                                    {{ $post->user_author->firstname }}
                                                                </span>
                                                                <span><i class="far fa-clock"></i>
                                                                    {{ $post->created_at->diffForHumans() }}</span>
                                                                <span><i class="far fa-eye"></i>
                                                                    {{ ($post->view >= 1000) ? floor($post->view / 1000) . 'k' : $post->view }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Berita Terbaru -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Terbaru</span>
                                <div class="terkini-body">
                                    @foreach($terbaru_category_all as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('images/post/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a
                                                                href="{{ route('guest.category.show', $post->category->slug) }}"><span
                                                                    class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->firstname }}</span>
                                                                <span><i class="far fa-clock"></i>
                                                                    {{ $post->created_at->diffForHumans() }}</span>
                                                                <span><i class="far fa-eye"></i>
                                                                    {{ ($post->view >= 1000) ? floor($post->view / 1000) . 'k' : $post->view }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Category fashion --}}
                    @foreach ($categories as $category)
                    <div class="tab-pane fade show" id="nav-{{ $category->slug }}" role="tabpanel"
                        aria-labelledby="nav-{{ $category->slug }}-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach ($category->populerPosts as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$category->slug, $post]) }}">
                                                            <img src="{{ asset('images/post/'.$post->image) }}"
                                                                class="card-img rounded-0" alt="#">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$category->slug, $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="{{ route('guest.category.show', $category) }}"><span
                                                                    class="card-category"
                                                                    style="background-color:{{ $category->color }}">{{ $category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->firstname }}</span>
                                                                <span><i class="far fa-clock"></i>
                                                                    {{ $post->created_at->diffForHumans() }}</span>
                                                                <span><i class="far fa-eye"></i>
                                                                    {{ ($post->view >= 1000) ? floor($post->view / 1000) . 'k' : $post->view }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Berita Terbaru -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Terbaru</span>
                                <div class="terkini-body">
                                    @foreach ($category->posts as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$category->slug, $post]) }}">
                                                            <img src="{{ asset('images/post/'.$post->image) }}"
                                                                class="card-img rounded-0" alt="#">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$category->slug, $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="{{ route('guest.category.show', $category) }}"><span
                                                                    class="card-category"
                                                                    style="background-color:{{ $category->color }}">{{ $category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->firstname }}</span>
                                                                <span><i class="far fa-clock"></i>
                                                                    {{ $post->created_at->diffForHumans() }}</span>
                                                                <span><i class="far fa-eye"></i>
                                                                    {{ ($post->view >= 1000) ? floor($post->view / 1000) . 'k' : $post->view }}
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Space Iklan Tengah -->
<section class="iklan-tengah mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="#">
                    <img src="assets/images/ads-w.png" alt="Iklan" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Berita Terbaru -->
<section class="berita-terbaru mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 pr-md-0">
                <div class="berita-header-wrap">
                    <span class="berita-header">Berita Terbaru</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-columns p-3 pr-md-0 pl-md-3">
                @foreach($berita_terbaru as $post)
                {{-- <div class="col-md-3 pr-md-0"> --}}
                <div class="card">
                    <a href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                        <img src="{{ asset('images/post/'.$post->image) }}" class="card-img-top"
                            alt="{{ $post->title }}">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('guest.category.show', $post->category->slug) }}" class="terbaru-category"
                            style="background-color:{{ $post->category->color }};">{{ $post->category->title }}</a>
                        <a href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                            <h5 class="card-title text-capitalize">{{ $post->title }}</h5>
                        </a>
                        <p class="card-text terbaru-info">
                            <span><i class="fas fa-user"></i> {{ $post->user_author->firstname }}</span>
                            <span><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}</span>
                            <span><i class="far fa-eye"></i>
                                {{ ($post->view>= 1000) ? floor($post->view / 1000) . 'k' : $post->view }}</span>
                        </p>
                    </div>
                </div>
                {{-- </div> --}}
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-sm-12">
                <nav>
                    <ul class="pagination pagination-sm justify-content-center mt-4">
                        {{ $berita_terbaru->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection