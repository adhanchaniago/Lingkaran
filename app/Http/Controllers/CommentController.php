<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|string|max:300'
        ]);

        $comment = Comment::create([
            'body' => $request->comment,
            'user_id' => auth()->user()->id
        ]);

        $postId = decrypt($request->post_id);
        $post = Post::findOrFail($postId);
        $post->comments()->save($comment);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|string|max:300'
        ]);

        $comment_id = decrypt($id);
        $comment = Comment::findOrFail($comment_id);

        $comment->update([
            'body' => $request->body
        ]);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = decrypt($request->id);

        $comment = Comment::where('id', $id)
            ->get()
            ->first();
            
        $reply = Comment::where('parent_id', $id)
            ->get()
            ->first();
            
        if ($reply) {
            $reply->delete();
        }

        $comment->delete();

        return redirect()->back();
    }

    public function replyComment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|string|max:300',
            'parent_id' => 'required|string'
        ]);
        
        $reply = Comment::create([
            'body' => $request->comment,
            'user_id' => auth()->user()->id,
            'parent_id' => decrypt($request->parent_id)
        ]);

        $postId = decrypt($request->post_id);
        $post = Post::findOrFail($postId);
        $post->comments()->save($reply);

        return redirect()->back();
    }
}
