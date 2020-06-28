<?php

namespace App\Http\Controllers\cms;

use Image;
use App\Tag;
use App\Post;
use App\Category;
use App\Headline;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'user_author', 'user_editor'])->latest()->get();
        return view('cms.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('cms.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|min:10|unique:posts',
            'category' => 'required',
            'content' => 'required|min:100',
            'image' => 'required|image'
        ]);

        $post = Post::create([
            'title' => Str::title(request('title')),
            'slug' => Str::slug(request('title')),
            'category_id' => request('category'),
            'image' => null,
            'content' => request('content'),
            'author' => auth()->id(),
            'editor' => null,
            'status' => 0,
            'view' => 0
        ]);

        $post->tags()->sync($request->tags, false);

        $image = $request->file('image');
        $filename = Str::slug($post->title) . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/post/'. $filename);
        Image::make($image->getRealPath())->resize(600, 400)->save($location);
        $post->update([
            'image' => $filename
        ]);


        return redirect(route('post.index'))->withSuccess('New post has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('cms.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|min:10',
            'category' => 'required',
            'content' => 'required|min:100',
            'image' => 'image'
        ]);
        $post->update([
            'title' => Str::title(request('title')),
            'slug' => Str::slug(request('title')),
            'category_id' => request('category'),
            'content' => request('content'),
            'editor' => auth()->id()
        ]);
        $post->tags()->sync($request->tags);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($post->title) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/post/'. $filename);
            Image::make($image)->resize(600, 400)->save($location);
            $oldFilename = 'images/post/'.$post->image;

            $post->update([
                'image' => $filename
            ]);
            Storage::delete($oldFilename);
        }
        return redirect(route('post.index'))->withSuccess('The post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);

        //Delete current post image
        Storage::delete($post->image);
        //Delete current post
        $post->delete();

        return redirect(route('post.index'))->withSuccess('Post has been deleted');
    }

    /**
     * Publish the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->update([
            'status' => 1
        ]);
        return redirect(route('post.index'))->withSuccess('Post has been published');
    }

    /**
     * revoke the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function revoke(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->update([
            'status' => 0
        ]);
        $headline = Headline::where('post_id', $request->id)->get();
        if (!empty($headline[0])) {
            $headline[0]->delete();
        }
        return redirect(route('post.index'))->withSuccess('Post has been revoked');
    }
}
