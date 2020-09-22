<?php

namespace App\Http\Controllers\GuestUser;

use DataTables;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::with('category')
            ->select('posts.*')
            ->where('author', auth()->user()->id)
            ->get();

            return DataTables::of($posts)
            ->addColumn('content', function ($data) {
                $button = '<button class="btn btn-secondary btn-sm btn-block"';
                $button .= 'onclick="location.href=\'/guestuser/dashboard/post/'. $data->slug . '\'"';
                $button .= '><i class="far fa-newspaper"></i></button>';
                return $button;
            })
            ->addColumn('image', function ($data) {
                $button = '<button class="btn btn-light btn-sm" data-toggle="modal" data-target=".modal-image"';
                $button .= 'data-title="'.$data->title.'" data-image-url="/images/post/'.$data->image.'">';
                $button .= '<i class="fas fa-image"></i></button>';
                return $button;
            })
            ->addColumn('status', function ($data) {
                if ($data->is_rejected == true) {
                    $badge = '<span class="badge badge-danger">Rejected</span>';
                    return $badge;
                } else {
                    if ($data->is_published == true) {
                        $badge = '<span class="badge badge-success">Published</span>';
                        return $badge;
                    } else {
                        $badge = '<span class="badge badge-warning">Unpublish</span>';
                        return $badge;
                    }
                }
            })
            ->addColumn('action', function ($data) {
                if ($data->is_published == false) {
                    $button = '<button class="btn btn-info btn-sm btn-block text-light"';
                    $button .= 'onclick="location.href=\'/guestuser/dashboard/post/'.$data->slug.'/edit\'">Edit</button>';
                    $button .= '<button class="btn btn-danger btn-sm btn-block" data-toggle="modal"';
                    $button .= 'data-target=".modal-delete" data-id="'. $data->id .'" data-title="'. $data->title .'">Delete</button>';
                    return $button;
                }
            })
            ->rawColumns(['content', 'image', 'status', 'action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('guest.dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('guest.dashboard.posts.create', compact('categories', 'tags'));
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
            'tags' => 'required|string',
            'image' => 'required|image'
        ]);

        $post = Post::create([
            'title' => Str::title(request('title')),
            'slug' => Str::slug(request('title')),
            'category_id' => request('category'),
            'content' => request('content'),
            'author' => auth()->user()->id
        ]);

        $post->tags()->sync($request->tags, false);

        $image = $request->file('image');
        $filename = Str::slug($post->title) . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/post/'. $filename);
        Image::make($image->getRealPath())->resize(600, 400)->save($location);
        $post->update([
            'image' => $filename
        ]);


        return redirect(route('guestuser.post.index'))->withSuccess('New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with('category', 'user_author')
            ->where('slug', $slug)
            ->get()
            ->first();
        return view('guest.dashboard.posts.show', compact('post'));
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
        $tags = Tag::all();

        return view('guest.dashboard.posts.edit', compact('post', 'categories', 'tags'));
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
            'tags' => 'required|string'
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
            Image::make($image)->fit(600, 400)->save($location);
            $oldFilename = 'images/post/'.$post->image;

            $post->update([
                'image' => $filename
            ]);

            Storage::delete($oldFilename);
        }

        return redirect(route('guestuser.post.index'))->withSuccess('The post has been updated');
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
        Storage::delete('post/'.$post->image);
        //Delete current post
        $post->delete();

        return redirect(route('guestuser.post.index'))->withSuccess('Post has been deleted');
    }

    public function getUnpublished(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::with('category')
            ->select('posts.*')
            ->where('is_published', false)
            ->where('is_rejected', false)
            ->where('author', auth()->user()->id)
            ->get();
            
            return DataTables::of($posts)
            ->addColumn('content', function ($data) {
                $button = '<button class="btn btn-secondary btn-sm btn-block"';
                $button .= 'onclick="location.href=\'/guestuser/dashboard/post/'. $data->slug . '\'"';
                $button .= '><i class="far fa-newspaper"></i></button>';
                return $button;
            })
            ->addColumn('image', function ($data) {
                $button = '<button class="btn btn-light btn-sm" data-toggle="modal" data-target=".modal-image"';
                $button .= 'data-title="'.$data->title.'" data-image-url="/images/post/'.$data->image.'">';
                $button .= '<i class="fas fa-image"></i></button>';
                return $button;
            })
            ->addColumn('status', function ($data) {
                if ($data->is_rejected == true) {
                    $badge = '<span class="badge badge-danger">Rejected</span>';
                    return $badge;
                } else {
                    if ($data->is_published == true) {
                        $badge = '<span class="badge badge-success">Published</span>';
                        return $badge;
                    } else {
                        $badge = '<span class="badge badge-warning">Unpublish</span>';
                        return $badge;
                    }
                }
            })
            ->rawColumns(['content', 'image', 'status'])
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function getRejected(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::with('category')
            ->select('posts.*')
            ->where('is_rejected', true)
            ->where('author', auth()->user()->id)
            ->get();

            return DataTables::of($posts)
            ->addColumn('content', function ($data) {
                $button = '<button class="btn btn-secondary btn-sm btn-block"';
                $button .= 'onclick="location.href=\'/guestuser/dashboard/post/'. $data->slug . '\'"';
                $button .= '><i class="far fa-newspaper"></i></button>';
                return $button;
            })
            ->addColumn('image', function ($data) {
                $button = '<button class="btn btn-light btn-sm" data-toggle="modal" data-target=".modal-image"';
                $button .= 'data-title="'.$data->title.'" data-image-url="/images/post/'.$data->image.'">';
                $button .= '<i class="fas fa-image"></i></button>';
                return $button;
            })
            ->addColumn('status', function ($data) {
                if ($data->is_rejected == true) {
                    $badge = '<span class="badge badge-danger">Rejected</span>';
                    return $badge;
                } else {
                    if ($data->is_published == true) {
                        $badge = '<span class="badge badge-success">Published</span>';
                        return $badge;
                    } else {
                        $badge = '<span class="badge badge-warning">Unpublish</span>';
                        return $badge;
                    }
                }
            })
            ->rawColumns(['content', 'image', 'status'])
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function getPublished(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::with('category')
            ->select('posts.*')
            ->where('is_published', true)
            ->where('author', auth()->user()->id)
            ->get();

            return DataTables::of($posts)
            ->addColumn('content', function ($data) {
                $button = '<button class="btn btn-secondary btn-sm btn-block"';
                $button .= 'onclick="location.href=\'/guestuser/dashboard/post/'. $data->slug . '\'"';
                $button .= '><i class="far fa-newspaper"></i></button>';
                return $button;
            })
            ->addColumn('image', function ($data) {
                $button = '<button class="btn btn-light btn-sm" data-toggle="modal" data-target=".modal-image"';
                $button .= 'data-title="'.$data->title.'" data-image-url="/images/post/'.$data->image.'">';
                $button .= '<i class="fas fa-image"></i></button>';
                return $button;
            })
            ->addColumn('status', function ($data) {
                if ($data->is_rejected == true) {
                    $badge = '<span class="badge badge-danger">Rejected</span>';
                    return $badge;
                } else {
                    if ($data->is_published == true) {
                        $badge = '<span class="badge badge-success">Published</span>';
                        return $badge;
                    } else {
                        $badge = '<span class="badge badge-warning">Unpublish</span>';
                        return $badge;
                    }
                }
            })
            ->rawColumns(['content', 'image', 'status'])
            ->addIndexColumn()
            ->make(true);
        }
    }
}
