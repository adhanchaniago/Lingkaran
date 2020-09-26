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

                <div class="sebaran-berita mt-3">
                    <div class="sebaran-berita-header">Sebaran Berita</div>
                    <div class="mt-3 h-4" id="network-graph"></div>
                </div>

                <div class="berita-lain mt-3">
                    <div class="berita-lain-header">Berita Lainnya</div>
                    <div class="row">
                        @foreach($relatedPosts as $related)
                        <div class="col-md-3">
                            <div class="berita-lain-content mt-3">
                                <a href="{{ route('guest.post.show', [$related->category->slug, $related]) }}"><img
                                        src="{{ asset('images/post/'.$related->image) }}" alt="{{ $related->title }}"
                                        class="berita-lain-img"></a>
                                <a href="{{ route('guest.post.show', [$related->category->slug, $related]) }}"
                                    class="berita-lain-title">{{ $related->title }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="post-comment mt-5 mb-3">
                    <div class="post-comment-header my-3">Komentar</div>
                    <div class="post-comment-body">
                        @if (auth()->user())
                        <form action="{{ route('comments.store') }}" method="POST" class="mb-5">
                            @csrf
                            <div class="media mt-3">
                                <img src="{{ asset('images/profile/thumbnails/'.auth()->user()->profiles->first()->image) }}"
                                    class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <div class="form-group">
                                        <input type="hidden" name="post_id" value="{{ encrypt($post->id) }}">
                                        <textarea id="input-comment-form" name="comment"
                                            class="form-control form-control-sm" placeholder="Add a comment"
                                            required></textarea>
                                    </div>
                                    <div id="btn-comment-wrapper" class="float-right">
                                        <button id="btn-comment-cancel" type="reset" class="btn btn-secondary btn-sm">
                                            Cancel
                                        </button>
                                        <button id="btn-comment-submit" type="submit" class="btn btn-sm">
                                            Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                        <div class="login-order">
                            Please <a href="{{ route('login') }}" class="login-order-link">Login</a> to make comments.
                        </div>
                        @endif

                        @foreach ($post->comments->sortByDesc('created_at') as $comment)
                        <div class="media my-3">
                            <img src="{{ asset('images/profile/thumbnails/'.$comment->user->profiles->first()->image) }}"
                                class="mr-3 rounded-circle">
                            <div class="media-body">
                                <div class="post-comment-title">{{ $comment->user->firstname }}
                                    <span>
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                {{ $comment->body }}

                                @auth
                                <div class="post-comment-reply">
                                    @if ($comment->user_id != auth()->user()->id)
                                    <span>
                                        <a onclick="reply({{ $comment->id }})" style="cursor: pointer">Reply</a>
                                    </span>
                                    {{-- Reply form --}}
                                    @include('guest.components._reply_form', ['comments' => $comment])
                                    {{-- End Reply Form --}}
                                    @endif

                                    @if ($comment->user_id == auth()->user()->id)
                                    <span>
                                        <a href="#" class="text-info">Edit</a>
                                    </span>
                                    <span>
                                        <a href="#" class="text-danger" data-toggle="modal"
                                            data-target="#modal-delete-comment" data-id="{{ encrypt($comment->id) }}"
                                            data-title="{{ $comment->body }}">
                                            delete
                                        </a>
                                    </span>
                                    @endif
                                </div>
                                @endauth

                                {{-- Comment Reply --}}
                                @include('guest.components._nesting_comments')
                                {{-- End Comment Reply --}}
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
@if(auth()->user())
@hasrole('Administrator|Editor|Reporter')
<div class="admin-btn action shadow-lg p-2">
    <h6 class="text-center border-bottom pb-1">Action</h6>
    <button onclick="location.href='{{ url()->previous() }}'" class="btn btn-sm btn-block btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </button>
    <button onclick="location.href='{{ route('post.edit', $post) }}'" class="btn btn-sm btn-block btn-info">
        <i class="fas fa-edit"></i> Edit
    </button>
    @if($post->is_published != true)
    @can('publish post')
    <button class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#modal-confirm"
        data-key="publish">
        <i class="fa fa-bullhorn"></i> Publish
    </button>
    @endcan
    @else
    @can('revoke post')
    <button class="btn btn-sm btn-block btn-warning" data-toggle="modal" data-target="#modal-confirm" data-key="revoke">
        <i class="fa fa-undo"></i> Revoke
    </button>
    @endcan
    @endif
</div>
@endhasrole

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

<!-- Delete modal -->
<div class="modal fade" id="modal-delete-comment" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Menghapus Komentar</h4>
            </div>
            <form action="{{ route('comments.destroy', 'id') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p class="text-center">Apa anda yakin ingin menghapus komentar "<span
                            class="comment-body text-danger"></span>" ?</p>
                    <input type="hidden" id="form-delete" name="id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /modals -->
@endif
@endsection

@section('b-script')
{{-- Comment Form --}}
<script>
    const inputCommentForm = document.getElementById('input-comment-form');
    const btnCommentWrapper = document.getElementById('btn-comment-wrapper');
    const btnCommentCancel = document.getElementById('btn-comment-cancel');

    inputCommentForm.onfocus = function () {
        btnCommentWrapper.style.display = 'block';
    }

    btnCommentCancel.onclick = function () {
        btnCommentWrapper.style.display = 'none';
    }
</script>

{{-- Reply Form --}}
<script>
    function reply(replyId) {
        const formReply = document.querySelector('.reply-form-' + replyId);
        formReply.style.display = 'block';
    }

    function cancelReply(replyId) {
        const formReply = document.querySelector('.reply-form-' + replyId);
        formReply.style.display = 'none';
    }
</script>

{{-- Modal --}}
<script>
    $('#modal-confirm').on('show.bs.modal', function (e) {
        const key = $(e.relatedTarget).data('key');
        if (key !== 'revoke') {
            $('.modal-body #title').text('Apakah anda ingin publish post ini?');
            $('.modal-body #form-confirm').val('{{encrypt($post->id)}}');
            $('.modal-footer #action').text('Publish');
            $('.modal-footer #action').attr('class', 'btn btn-success btn-sm');
            $('#url').attr('action', '{{ route("post.publish", "id") }}');
        } else {
            $('.modal-body #title').text('Apakah anda ingin tarik kembali post ini?');
            $('.modal-body #form-confirm').val('{{encrypt($post->id)}}');
            $('.modal-footer #action').text('Revoke');
            $('.modal-footer #action').attr('class', 'btn btn-warning btn-sm');
            $('#url').attr('action', '{{ route("post.revoke", "id") }}');
        }
    });

    $('#modal-delete-comment').on('show.bs.modal', function (e) {
        const id = $(e.relatedTarget).data('id');
        const comment = $(e.relatedTarget).data('title');
        $('.modal-body .comment-body').text(comment);
        $('.modal-body #form-delete').val(id);
    });

    const waktu = setTimeout(function () {
        const id = '{{ encrypt($post->id) }}';
        const url = "{{ route('guest.add.visitor') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
            },
            success: function (data) {
                console.log(data);
            }
        });
    }, 10000);
</script>

{{-- Graph --}}
<script>
    anychart.onDocumentReady(function () {
        // create data
        const data = {
            "nodes": [{
                    id: '{{ $post->title }}',
                    height: '20',
                    fill: '{{ $post->category->color }}'
                },
                @foreach($positions as $position) {
                    id: '{{ $position->cityName }}'
                },
                @endforeach
            ],

            "edges": [
                @foreach($positions as $position) {
                    from: '{{ $position->cityName }}',
                    to: '{{ $post->title }}'
                },
                @endforeach
            ]
        }

        const chart = anychart.graph(data);

        // configure nodes
        chart.background().stroke("rgb(143, 143, 143)");
        chart.nodes().labels().enabled(true);
        chart.nodes().labels().fontSize(11);

        chart.nodes().normal().fill("#31B57B");
        chart.nodes().shape('circle');

        chart.nodes().hovered().fill("white");
        chart.nodes().hovered().stroke("2 black");
        chart.nodes().hovered().shape('circle');

        chart.layout().type('force');

        // initiate drawing the chart
        chart.container('network-graph').draw();
    });
</script>
@endsection