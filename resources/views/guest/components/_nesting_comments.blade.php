@foreach ($comment->comments as $reply)
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
            <span>
                <a onclick="reply({{ $reply->id }})" style="cursor: pointer">Reply</a>
            </span>
            {{-- Reply form --}}
            @include('guest.components._reply_form', ['comments' => $reply])
            {{-- End Reply Form --}}
            @endif
            @if ($reply->user_id == auth()->user()->id)
            <span><a href="#" class="text-info">Edit</a></span>
            <span>
                <a href="#" class="text-danger" data-toggle="modal" data-target="#modal-delete-comment"
                    data-id="{{ encrypt($reply->id) }}" data-title="{{ $reply->body }}">
                    delete
                </a>
            </span>
            @endif
        </div>
        @endauth
    </div>
</div>
@endforeach