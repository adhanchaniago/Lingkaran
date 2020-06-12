<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('cms.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('cms.post.create', compact('categories'));
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
            'title' => 'required|min:5|unique:posts',
            'category' => 'required',
            'content' => 'required|min:100',
            'image' => 'image'
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($post->title) . '.' . $image->getClientOriginalExtension();
            $location = public_path('post_images/'. $filename);
            Image::make($image)->resize(600, 400)->save($location);

            $post->update([
                'image' => $filename
            ]);
        }
        return redirect(route('post.index'))->withSuccess('New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('cms.post.edit', compact('post', 'categories'));
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
            'title' => 'required|min:5',
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($post->title) . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $location = public_path('post_images/'. $filename);
            Image::make($image)->resize(600, 400)->save($location);

            $oldFilename = $post->image;

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
     * Unpublish the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unpublish(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->update([
            'status' => 0
        ]);
        return redirect(route('post.index'))->withSuccess('Post has been unpublished');
    }
}
