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
                        <div class="carousel-item active">
                            <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nihil,
                                mollitia!</a>
                        </div>
                        <div class="carousel-item">
                            <a href="#">Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit.
                                Earum, vero.</a>
                        </div>
                        <div class="carousel-item">
                            <a href="#">Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit.
                                Culpa,
                                cupiditate.</a>
                        </div>
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
                        <div class="headline-wrapper h-3" style="background-image: url(assets/images/sport.png);">
                            <a href="singgle_post.html" class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="singgle_post.html" class="headline-category px-2 bg-success">Sport</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="singgle_post.html" class="headline-title">20
                                        Tips Hidup Sehat Untuk Para Gadis Usia Remaja Dengan Olah Raga Ala
                                        Anak Milenial</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i> Riyan</span>
                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
                                    <span><i class="far fa-eye"></i> 8K</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pl-md-0 pr-lg-4">
                        <div class="headline-wrapper h-3" style="background-image: url(assets/images/fashion.png);">
                            <a href="index.html" class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="index.html" class="headline-category px-2 bg-danger">Fashion</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="index.html" class="headline-title">Cara Berpakaian Anak Milenial Mulai
                                        Membuat
                                        Designer Untung</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i> Riyan</span>
                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
                                    <span><i class="far fa-eye"></i> 8K</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="headline-wrapper h-2" style="background-image: url(assets/images/gaming.png);">
                            <a href="index.html" class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="index.html" class="headline-category px-2 bg-info">Gaming</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="index.html" class="headline-title">Bermain Game Pada Waktu Senggang
                                        Dapat Meningkatkan Kreatifitas Otak</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i> Riyan</span>
                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
                                    <span><i class="far fa-eye"></i> 8K</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 pl-md-0">
                        <div class="headline-wrapper h-2" style="background-image: url(assets/images/politic.png);">
                            <a href="index.html" class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="index.html" class="headline-category px-2 bg-secondary">Politic</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="index.html" class="headline-title">Rapat Para Petinggi Negara Mengenai
                                        Virus Corona di Indonesia</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i> Riyan</span>
                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
                                    <span><i class="far fa-eye"></i> 8K</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 pl-md-0 pr-lg-4">
                        <div class="headline-wrapper h-2" style="background-image: url(assets/images/tech.png);">
                            <a href="index.html" class="headline-link"></a>
                            <div class="headline-body d-flex flex-column justify-content-end align-items-start">
                                <a href="index.html" class="headline-category px-2 bg-warning">Technology</a>
                                <h3 class="headline-title-wrap mt-2 mb-1">
                                    <a href="index.html" class="headline-title">Perkembangan Teknology yang Pesat
                                        Membuat Paradox</a>
                                </h3>
                                <span class="headline-info">
                                    <span><i class="fas fa-user"></i> Riyan</span>
                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
                                    <span><i class="far fa-eye"></i> 8K</span>
                                </span>
                            </div>
                        </div>
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

                        <a href="#" class="nav-item nav-link">More</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="row">
                            <!-- Berita Populer -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Populer</span>
                                <div class="terkini-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a href="#"><img src="assets/images/1.png"
                                                                class="card-img rounded-0" alt="sport"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a href="#">
                                                                <h5 class="card-title">Pria ini Melakukan Yoga
                                                                    Setiap
                                                                    Hari Diwaktu Pagi Dipercaya Dapat Membuat
                                                                    Pikiran
                                                                    Sehat</h5>
                                                            </a>
                                                            <a href="#"><span
                                                                    class="card-category bg-success">Sport</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i> Riyan</span>
                                                                <span><i class="far fa-clock"></i> 20 Maret
                                                                    2020</span>
                                                                <span><i class="far fa-eye"></i> 8K</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a href="#"><img src="assets/images/3.png"
                                                                class="card-img rounded-0" alt="Gaming"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a href="#">
                                                                <h5 class="card-title">20 Open-Beta Game MMORPG
                                                                    Terbaru 2020 yang Paling Ditunggu-tunggu para
                                                                    Gamer Indonesia</h5>
                                                            </a>
                                                            <a href="#"><span
                                                                    class="card-category bg-info">Gaming</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i> Riyan</span>
                                                                <span><i class="far fa-clock"></i> 20 Maret
                                                                    2020</span>
                                                                <span><i class="far fa-eye"></i> 8K</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Berita Terbaru -->
                            <div class="col-md-6 mt-3">
                                <span class="terkini-category">Berita Terbaru</span>
                                <div class="terkini-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a href="#"><img src="assets/images/2.png"
                                                                class="card-img rounded-0" alt="Fashion"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a href="#">
                                                                <h5 class="card-title">Gaya Rambut Saat Karnaval di
                                                                    Sebuah Negara Bagian Selatan</h5>
                                                            </a>
                                                            <a href="#"><span
                                                                    class="card-category bg-danger">Fashion</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i> Riyan</span>
                                                                <span><i class="far fa-clock"></i> 20 Maret
                                                                    2020</span>
                                                                <span><i class="far fa-eye"></i> 8K</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 rounded-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <a href="#"><img src="assets/images/4.png"
                                                                class="card-img rounded-0" alt="Politic"></a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <a href="#">
                                                                <h5 class="card-title">Aksi Demo ini Membuat Para
                                                                    Polisi Turun Tangan Hingga Tengah Malam</h5>
                                                            </a>
                                                            <a href="#"><span
                                                                    class="card-category bg-secondary">Politic</span></a>
                                                            <p class="card-text">
                                                                <span><i class="fas fa-user"></i> Riyan</span>
                                                                <span><i class="far fa-clock"></i> 20 Maret
                                                                    2020</span>
                                                                <span><i class="far fa-eye"></i> 8K</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            @foreach ($posts as $post)
            <div class="col-md-3 pr-md-0">
                <div class="card my-3">
                    <a href="#">
                        <img src="{{ asset('post_images/'.$post->image) }}" class="card-img-top"
                            alt="{{ $post->title }}">
                    </a>
                    <div class="card-body">
                        <a href="#" class="terbaru-category bg-success">{{ $post->category->title }}</a>
                        <a href="#">
                            <h5 class="card-title text-capitalize">{{ $post->title }}</h5>
                        </a>
                        <p class="card-text terbaru-info">
                            <span><i class="fas fa-user"></i> {{ $post->user_author->name }}</span>
                            <span><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}</span>
                            <span><i class="far fa-eye"></i> {{ $post->view }}</span>
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
                        {{ $posts->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection