<div class="col-md-4 mt-4 mt-md-0">
    <div class="berita-side-right mb-5">
        <div class="berita-side-header">Berita Populer</div>
        <div class="row">
            @foreach($populerPosts as $post)
            <div class="col-md-6">
                <div class="berita-side-populer-content mt-3">
                    <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}"><img
                            src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}"
                            class="berita-side-populer-img"></a>
                    <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}"
                        class="berita-side-populer-title">{{ $post->title }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="berita-side-right mb-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/ads-s.png') }}" alt="ads">
            </div>
        </div>
    </div>
    <div class="berita-side-right mb-5">
        <div class="berita-side-header">Berita Terbaru</div>
        <div class="side-body">
            @foreach($terbaruPosts as $post)
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3 rounded-0">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}"><img
                                        src="{{ asset('images/'. $post->image) }}" class="card-img rounded-0"
                                        alt="{{ $post->title }}"></a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                    </a>
                                    <p class="card-text">
                                        <span><i class="fas fa-user"></i> {{ $post->user_author->name }}</span>
                                        <span><i class="far fa-clock"></i>
                                            {{ $post->created_at->diffForHumans() }}</span>
                                        <span><i class="fa fa-eye"></i>
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
