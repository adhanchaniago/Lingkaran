@foreach ($replies as $reply)
<div class="media my-3">
    <img src="{{ asset('images/profile/thumbnails/'.$reply->user->profiles->first()->image) }}"
        class="reply mr-3 rounded-circle">
    <div class="media-body">
        <div class="post-comment-title">{{ $reply->user->firstname }}
            <span>
                {{ $reply->created_at->diffForHumans() }}
            </span>
        </div>
        {{ $reply->body }}

        @auth
        <div class="post-comment-reply">
            @if ($reply->user_id != auth()->user()->id)
            <span><a href="#">Reply</a></span>
            @endif
            @if ($reply->user_id == auth()->user()->id)
            <form id="form-delete-reply-comment" action="{{ route('comments.destroy', $reply) }}" method="post"
                style="display: none">
                @csrf
                @method('DELETE')
            </form>
            <span>
                <a href="#" class="text-danger"
                    onclick="event.preventDefault();
                                                document.getElementById('form-delete-reply-comment').submit();">Delete</a>
            </span>
            @endif
        </div>
        @endauth

    </div>
</div>
@endforeach