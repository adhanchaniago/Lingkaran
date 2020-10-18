<div class="reply-form-{{ $comments->id }}" style="display: none">
    <form action="{{ route('comments.reply') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" name="post_id" value="{{ encrypt($post->id) }}">
            <input type="hidden" name="parent_id" value="{{ encrypt($comment->id) }}">
            <textarea name="comment" placeholder="Add reply" required></textarea>
        </div>
        <div id="btn-reply-wrapper" class="form-group float-right">
            <button onclick="cancelReply({{ $comments->id }})" type="reset" class="btn btn-outline-secondary btn-sm">
                Cancel
            </button>
            <button type="submit" class="btn btn-outline-info btn-sm">
                Reply
            </button>
        </div>
    </form>
</div>