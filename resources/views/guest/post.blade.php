@extends('guest.layouts.app')
@section('content')
<!-- Breadcrum -->
<nav aria-label="breadcrumb">
    <div class="container p-0 mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">This is Post Title For Content Detail</li>
        </ol>
    </div>
</nav>

<section class="post-detail mt-3">
    <div class="container">
        <div class="row">
            <!-- Post Detail -->
            <div class="col-md-8">
                <div class="detail-category">
                    <a href="#" class="bg-success">Sport</a>
                </div>
                <div class="detail-title mt-3">
                    <h3>Tips Hidup Sehat Untuk Para Gadis Usia Remaja Dengan Olah Raga Ala Anak Milenial</h3>
                </div>
                <div class="detail-info">
                    <span><i class="fas fa-user"></i> Riyan</span>
                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
                </div>
                <figure class="figure mt-3">
                    <img src="assets/images/sport.png" class="figure-img" alt="Sport">
                    <figcaption class="figure-caption">Source: Lingkaran.com</figcaption>
                </figure>
                <div class="detail-content">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos ut eveniet doloribus
                        asperiores blanditiis sint.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt excepturi rerum officiis
                        eveniet, repellat aperiam est! Corporis quasi cum, qui, eos accusamus vitae fugiat dolorum
                        minima quisquam illum, consequuntur praesentium?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus vero sit illum aspernatur
                        quia eos rem quod dolor quos fugit ducimus eveniet molestias a, dignissimos, dolores, soluta
                        quaerat dolorem voluptatem hic et esse tempore exercitationem? Quos debitis quis enim quasi
                        culpa repudiandae, quod est ut consectetur illum, voluptates reiciendis facere.</p>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, atque!</p>
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
                        <div class="col-md-3">
                            <div class="berita-lain-content mt-3">
                                <a href="#"><img src="assets/images/1.png" alt="Sport" class="berita-lain-img"></a>
                                <a href="#" class="berita-lain-title">Pria ini Melakukan Yoga Setiap Hari Diwaktu
                                    Pagi Dipercaya Dapat Membuat Pikiran Sehat</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="berita-lain-content mt-3">
                                <a href="#"><img src="assets/images/2.png" alt="Fashion" class="berita-lain-img"></a>
                                <a href="#" class="berita-lain-title">Gaya Rambut Saat Karnaval di Sebuah
                                    Negara Bagian Selatan</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="berita-lain-content mt-3">
                                <a href="#"><img src="assets/images/3.png" alt="Gaming" class="berita-lain-img"></a>
                                <a href="#" class="berita-lain-title">20 Open-Beta Game MMORPG Terbaru 2020
                                    yang Paling Ditunggu-tunggu para Gamer Indonesia</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="berita-lain-content mt-3">
                                <a href="#"><img src="assets/images/tech.png" alt="Tech" class="berita-lain-img"></a>
                                <a href="#" class="berita-lain-title">Perkembangan Teknology yang Pesat
                                    Membuat Paradox</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-md-4 mt-4 mt-md-0">
                <div class="berita-side-right mb-5">
                    <div class="berita-side-header">Berita Populer</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="berita-side-populer-content mt-3">
                                <a href="#"><img src="assets/images/1.png" alt="Sport"
                                        class="berita-side-populer-img"></a>
                                <a href="#" class="berita-side-populer-title">Pria ini Melakukan Yoga Setiap Hari
                                    Diwaktu
                                    Pagi Dipercaya Dapat Membuat Pikiran Sehat</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="berita-side-populer-content mt-3">
                                <a href="#"><img src="assets/images/2.png" alt="Fashion"
                                        class="berita-side-populer-img"></a>
                                <a href="#" class="berita-side-populer-title">Gaya Rambut Saat Karnaval di Sebuah
                                    Negara Bagian Selatan</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="berita-side-populer-content mt-3">
                                <a href="#"><img src="assets/images/3.png" alt="Gaming"
                                        class="berita-side-populer-img"></a>
                                <a href="#" class="berita-side-populer-title">20 Open-Beta Game MMORPG Terbaru 2020
                                    yang Paling Ditunggu-tunggu para Gamer Indonesia</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="berita-side-populer-content mt-3">
                                <a href="#"><img src="assets/images/tech.png" alt="Tech"
                                        class="berita-side-populer-img"></a>
                                <a href="#" class="berita-side-populer-title">Perkembangan Teknology yang Pesat
                                    Membuat Paradox</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="berita-side-right mb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/images/ads-s.png" alt="ads">
                        </div>
                    </div>
                </div>
                <div class="berita-side-right mb-5">
                    <div class="berita-side-header">Berita Terbaru</div>
                    <div class="side-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-3 rounded-0">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <a href="#"><img src="assets/images/1.png" class="card-img rounded-0"
                                                    alt="sport"></a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="#">
                                                    <h5 class="card-title">Pria ini Melakukan Yoga Setiap Hari
                                                        Diwaktu Pagi Dipercaya Dapat Membuat Pikiran Sehat</h5>
                                                </a>
                                                <p class="card-text">
                                                    <span><i class="fas fa-user"></i> Riyan</span>
                                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
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
                                            <a href="#"><img src="assets/images/2.png" class="card-img rounded-0"
                                                    alt="sport"></a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="#">
                                                    <h5 class="card-title">Gaya Rambut Saat Karnaval di Sebuah
                                                        Negara Bagian Selatan</h5>
                                                </a>
                                                <p class="card-text">
                                                    <span><i class="fas fa-user"></i> Riyan</span>
                                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
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
                                            <a href="#"><img src="assets/images/3.png" class="card-img rounded-0"
                                                    alt="sport"></a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="#">
                                                    <h5 class="card-title">20 Open-Beta Game MMORPG Terbaru 2020
                                                        yang Paling Ditunggu-tunggu para Gamer Indonesia</h5>
                                                </a>
                                                <p class="card-text">
                                                    <span><i class="fas fa-user"></i> Riyan</span>
                                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
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
                                            <a href="#"><img src="assets/images/sport.png" class="card-img rounded-0"
                                                    alt="sport"></a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="#">
                                                    <h5 class="card-title">Tips Hidup Sehat Untuk Para Gadis Usia
                                                        Remaja Dengan Olah Raga Ala Anak Milenial</h5>
                                                </a>
                                                <p class="card-text">
                                                    <span><i class="fas fa-user"></i> Riyan</span>
                                                    <span><i class="far fa-clock"></i> 20 Maret 2020</span>
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
</section>
@endsection