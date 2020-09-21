<?php

namespace App\Http\Controllers\GuestUser;

use DataTables;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Contracts\DataTable;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Writer');
    }

    /**
     * Show index by ajax
     *
     * @param Request $request
     * @return void
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
                $button .= 'onclick="location.href=\'/guestuser/dashboard/post/preview/'. $data->slug . '\'"';
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
                    $button = '<button class="btn btn-info btn-sm btn-block">Edit</button>';
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
     * Show post
     *
     * @return void
     */
    public function preview(Request $request)
    {
        $post = Post::with('category', 'user_author')
            ->where('slug', $request->slug)
            ->get()
            ->first();

        return view('guest.dashboard.posts.show', compact('post'));
    }

    /**
     * Delete post
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);
        //Delete current post image
        Storage::delete('post/'.$post->image);
        //Delete current post
        $post->delete();

        return redirect(route('guestuser.post'))->withSuccess('Post has been deleted');
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
                $button .= 'onclick="location.href=\'/guestuser/dashboard/post/preview/'. $data->slug . '\'"';
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
                $button = '<button class="btn btn-info btn-sm btn-block">Edit</button>';
                $button .= '<button class="btn btn-danger btn-sm btn-block" data-toggle="modal"';
                $button .= 'data-target=".modal-delete" data-id="'. $data->id .'" data-title="'. $data->title .'">Delete</button>';
                return $button;
            })
            ->rawColumns(['content', 'image', 'status', 'action'])
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
                $button .= 'onclick="location.href=\'/guestuser/dashboard/post/preview/'. $data->slug . '\'"';
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
                $button = '<button class="btn btn-danger btn-sm btn-block" data-toggle="modal"';
                $button .= 'data-target=".modal-delete" data-id="'. $data->id .'" data-title="'. $data->title .'">Delete</button>';
                return $button;
            })
            ->rawColumns(['content', 'image', 'status', 'action'])
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
                $button .= 'onclick="location.href=\'/guestuser/dashboard/post/preview/'. $data->slug . '\'"';
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
