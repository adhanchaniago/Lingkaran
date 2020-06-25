<?php

namespace App\Http\Controllers\cms;

use App\Post;
use App\Headline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeadlineController extends Controller
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
        $headlines = Headline::with('post.category', 'post.user_author')->orderBy('type', 'ASC')->get();
        return view('cms.headline.index', compact('headlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headlines = Headline::get('post_id');
        $posts = Post::with(['category', 'user_author'])->where('status', 1)->whereNotIn('id', $headlines)->latest()->get();
        return view('cms.headline.create', compact('posts'));
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
            'post_id' => 'required|unique:headlines',
            'type' => 'required'
        ]);

        $check = Headline::where('type', $request->type)->count();
        if ($request->type == 'main' && $check > 0) {
            return redirect(route('headline.create'))->withDanger('Headline dengan type "Main" telah ada');
        } elseif ($request->type == 'secondary' && $check >= 4) {
            return redirect(route('headline.create'))->withDanger('Headline dengan type "Secondary" tidak melebihi 4');
        } else {
            Headline::create([
                'post_id' => $request->post_id,
                'type' => $request->type
            ]);

            return redirect(route('headline.index'))->withSuccess('Post has been set as Headline');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $headline = Headline::findOrFail($request->id);
        $headline->delete();
        return redirect(route('headline.index'))->withSuccess('Headline has been deleted');
    }
}
