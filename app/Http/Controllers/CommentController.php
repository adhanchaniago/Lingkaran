<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id)
    {
        $post = Post::findOrFail(decrypt($id));
        $comment = $post->comments()->with('replies.user.profiles', 'user.profiles')->latest()->get();

        return response()->json($comment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|string|max:300'
        ]);
        
        $post = Post::findOrFail(decrypt($id));
        $comment = $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->user()->id
          ]);
      
        $comment = Comment::where('id', $comment->id)->with('replies', 'user.profiles')->first();
      
        return $comment->toJson();
    }

    public function reply(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|string|max:300'
        ]);
        
        $post = Post::findOrFail(decrypt($id));
        $comment = $post->comments()->create([
            'parent_id' => $request->parent_id,
            'body' => $request->body,
            'user_id' => auth()->user()->id
          ]);
      
        $comment = Comment::where('id', $comment->id)->with('replies', 'user.profiles')->first();
      
        return $comment->toJson();
    }

    public function destroy(Request $request, $id)
    {
        $comment = Comment::findOrFail($request->commentId);
        $reply = Comment::where('parent_id', $request->commentId);
        $reply->delete();
        $comment->delete();

        $post = Post::findOrFail(decrypt($id));
        $comment = $post->comments()->with('replies.user.profiles', 'user.profiles')->latest()->get();

        return response()->json($comment);
    }
}
