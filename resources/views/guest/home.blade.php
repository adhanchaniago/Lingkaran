@extends('guest.layouts.app')
@section('content')
<!-- Trending Text Slide -->
<section class="trending my-4 d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center">
                <span class="trending-header p-2"><i class="fas fa-bolt"></i> Populer</span>
                <div id="carousel-text" class="carousel slide pl-3" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($trending as $key => $post)
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
            <div class="col-md-12 col-lg-10 px-0 pl-md-3">
                <div class="row">
                    <div class="col-md-8 my-3 my-md-0">
                        @if (!empty($headline_main))
                        <div class="headline-wrapper h-3"
                            style="background-image: url({{ asset('post_images/'. $headline_main->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_main->post->category->slug, $headline_main->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="#" class="headline-category px-2"
                                    style="background-color: {{ $headline_main->post->category->color }};">{{ $headline_main->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_main->post->category->slug, $headline_main->post]) }}"
                                        class="headline-title">{{ $headline_main->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_main->post->user_author->name }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_main->post->created_at->diffForHumans() }}</span>
                                    <span><i class="far fa-eye"></i>
                                        {{ ($headline_main->post->view >= 1000) ? floor($headline_main->post->view / 1000) . 'k' : $headline_main->post->view }}</span>
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="text-center text-warning">Null</div>
                        @endif
                    </div>
                    <div class="col-md-4 pl-md-0 pr-lg-4">
                        @if (!empty($headline_secondary[0]))
                        <div class="headline-wrapper h-3"
                            style="background-image: url({{ asset('post_images/'. $headline_secondary[0]->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_secondary[0]->post->category->slug, $headline_secondary[0]->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="#" class="headline-category px-2"
                                    style="background-color: {{ $headline_secondary[0]->post->category->color }};">{{ $headline_secondary[0]->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_secondary[0]->post->category->slug, $headline_secondary[0]->post]) }}"
                                        class="headline-title">{{ $headline_secondary[0]->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_secondary[0]->post->user_author->name }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_secondary[0]->post->created_at->diffForHumans() }}</span>
                                    <span><i class="far fa-eye"></i>
                                        {{ ($headline_secondary[0]->post->view >= 1000) ? floor($headline_secondary[0]->post->view / 1000) . 'k' : $headline_secondary[0]->post->view }}</span>
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="text-center text-warning">Null</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        @if (!empty($headline_secondary[1]))
                        <div class="headline-wrapper h-2"
                            style="background-image: url({{ asset('post_images/' . $headline_secondary[1]->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_secondary[1]->post->category->slug, $headline_secondary[1]->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="index.html" class="headline-category px-2"
                                    style="background-color: {{ $headline_secondary[1]->post->category->color }};">{{ $headline_secondary[1]->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_secondary[1]->post->category->slug, $headline_secondary[1]->post]) }}"
                                        class="headline-title">{{ $headline_secondary[1]->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_secondary[1]->post->user_author->name }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_secondary[1]->post->created_at->diffForHumans() }}</span>
                                    <span><i class="far fa-eye"></i>
                                        {{ ($headline_secondary[1]->post->view >= 1000) ? floor($headline_secondary[1]->post->view / 1000) . 'k' : $headline_secondary[1]->post->view }}</span>
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="text-center text-warning">Null</div>
                        @endif
                    </div>

                    <div class="col-md-4 mt-3 pl-md-0">
                        @if (!empty($headline_secondary[2]))
                        <div class="headline-wrapper h-2"
                            style="background-image: url({{ asset('post_images/' . $headline_secondary[2]->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_secondary[2]->post->category->slug, $headline_secondary[2]->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="index.html" class="headline-category px-2"
                                    style="background-color: {{ $headline_secondary[2]->post->category->color }};">{{ $headline_secondary[2]->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_secondary[2]->post->category->slug, $headline_secondary[2]->post]) }}"
                                        class="headline-title">{{ $headline_secondary[2]->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_secondary[2]->post->user_author->name }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_secondary[2]->post->created_at->diffForHumans() }}</span>
                                    <span><i class="far fa-eye"></i>
                                        {{ ($headline_secondary[2]->post->view >= 1000) ? floor($headline_secondary[2]->post->view / 1000) . 'k' : $headline_secondary[2]->post->view }}</span>
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="text-center text-warning">Null</div>
                        @endif
                    </div>

                    <div class="col-md-4 mt-3 pl-md-0 pr-lg-4">
                        @if (!empty($headline_secondary[3]))
                        <div class="headline-wrapper h-2"
                            style="background-image: url({{ asset('post_images/' . $headline_secondary[3]->post->image) }});">
                            <a href="{{ route('guest.post.show', [$headline_secondary[3]->post->category->slug, $headline_secondary[3]->post]) }}"
                                class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="index.html" class="headline-category px-2"
                                    style="background-color: {{ $headline_secondary[3]->post->category->color }};">{{ $headline_secondary[3]->post->category->title }}</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="{{ route('guest.post.show', [$headline_secondary[3]->post->category->slug, $headline_secondary[3]->post]) }}"
                                        class="headline-title">{{ $headline_secondary[3]->post->title }}</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i>
                                        {{ $headline_secondary[3]->post->user_author->name }}</span>
                                    <span><i class="far fa-clock"></i>
                                        {{ $headline_secondary[3]->post->created_at->diffForHumans() }}</span>
                                    <span><i class="far fa-eye"></i>
                                        {{ ($headline_secondary[3]->post->view >= 1000) ? floor($headline_secondary[3]->post->view / 1000) . 'k' : $headline_secondary[3]->post->view }}</span>
                                </span>
                            </div>
                        </div>
                        @else
                        <div class="text-center text-warning">Null</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-none d-lg-block pl-0">
                <a href="index.html"><img src="assets/images/ads.png" alt="Iklan" style="height: 100%;"></a>
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

                        <a class="nav-item nav-link" id="nav-fashion-tab" data-toggle="tab" href="#nav-fashion"
                            role="tab" aria-controls="nav-fashion" aria-selected="true">Fashion</a>
                        <a class="nav-item nav-link" id="nav-sains-teknologi-tab" data-toggle="tab"
                            href="#nav-sains-teknologi" role="tab" aria-controls="nav-sains-teknologi"
                            aria-selected="true">Sains & Teknologi</a>
                        <a class="nav-item nav-link" id="nav-olahraga-tab" data-toggle="tab" href="#nav-olahraga"
                            role="tab" aria-controls="nav-olahraga" aria-selected="true">Olahraga</a>
                        <a class="nav-item nav-link" id="nav-otomotif-tab" data-toggle="tab" href="#nav-otomotif"
                            role="tab" aria-controls="nav-otomotif" aria-selected="true">Otomotif</a>
                        <a class="nav-item nav-link" id="nav-properti-tab" data-toggle="tab" href="#nav-properti"
                            role="tab" aria-controls="nav-properti" aria-selected="true">Properti</a>
                        <a class="nav-item nav-link" id="nav-kesehatan-tab" data-toggle="tab" href="#nav-kesehatan"
                            role="tab" aria-controls="nav-kesehatan" aria-selected="true">Kesehatan</a>
                        <a class="nav-item nav-link" id="nav-media-sosial-tab" data-toggle="tab"
                            href="#nav-media-sosial" role="tab" aria-controls="nav-media-sosial"
                            aria-selected="true">Media Sosial</a>

                        <a href="#" class="nav-item nav-link">More</a>
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
                                    @foreach ($populer_category_all as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span>
                                                                    <i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}
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
                                    @foreach ($terbaru_category_all as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                    <div class="tab-pane fade show" id="nav-fashion" role="tabpanel" aria-labelledby="nav-fashion-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach ($populer_category_fashion as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                                    @foreach ($terbaru_category_fashion as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                    {{-- Category sains-teknologi --}}
                    <div class="tab-pane fade show" id="nav-sains-teknologi" role="tabpanel"
                        aria-labelledby="nav-sains-teknologi-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach ($populer_category_sains as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                                    @foreach ($terbaru_category_sains as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                    {{-- Category olahraga --}}
                    <div class="tab-pane fade show" id="nav-olahraga" role="tabpanel"
                        aria-labelledby="nav-olahraga-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach ($populer_category_olahraga as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                                    @foreach ($terbaru_category_olahraga as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                    {{-- Category otomotif --}}
                    <div class="tab-pane fade show" id="nav-otomotif" role="tabpanel"
                        aria-labelledby="nav-otomotif-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach ($populer_category_otomotif as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                                    @foreach ($terbaru_category_otomotif as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                    {{-- Category properti --}}
                    <div class="tab-pane fade show" id="nav-properti" role="tabpanel"
                        aria-labelledby="nav-properti-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach ($populer_category_properti as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                                    @foreach ($terbaru_category_properti as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                    {{-- Category kesehatan --}}
                    <div class="tab-pane fade show" id="nav-kesehatan" role="tabpanel"
                        aria-labelledby="nav-kesehatan-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach ($populer_category_kesehatan as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                                    @foreach ($terbaru_category_kesehatan as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                    {{-- Category media-sosial --}}
                    <div class="tab-pane fade show" id="nav-media-sosial" role="tabpanel"
                        aria-labelledby="nav-media-sosial-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    @foreach ($populer_category_mediasosial as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                                    @foreach ($terbaru_category_mediasosial as $post)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a
                                                            href="{{ route('guest.post.show', [$post->category->slug , $post]) }}"><img
                                                                src="{{ asset('post_images/'. $post->image) }}"
                                                                class="card-img rounded-0" alt="{{ $post->title }}"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a
                                                                href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                            </a>
                                                            <a href="#"><span class="card-category"
                                                                    style="background-color: {{ $post->category->color }}">{{ $post->category->title }}</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i>
                                                                    {{ $post->user_author->name }}</span>
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
                    <img src="assets/images/ads-w.png" alt="Iklan">
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
            @foreach ($berita_terbaru as $post)
            <div class="col-md-3 pr-md-0">
                <div class="card my-3">
                    <a href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                        <img src="{{ asset('post_images/'.$post->image) }}" class="card-img-top"
                            alt="{{ $post->title }}">
                    </a>
                    <div class="card-body">
                        <a href="#" class="terbaru-category"
                            style="background-color:{{ $post->category->color }};">{{ $post->category->title }}</a>
                        <a href="{{ route('guest.post.show', [$post->category->slug , $post]) }}">
                            <h5 class="card-title text-capitalize">{{ $post->title }}</h5>
                        </a>
                        <p class="card-text terbaru-info">
                            <span><i class="fas fa-user"></i> {{ $post->user_author->name }}</span>
                            <span><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}</span>
                            <span><i class="far fa-eye"></i>
                                {{ ($post->view >= 1000) ? floor($post->view / 1000) . 'k' : $post->view }}</span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
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