<?php

namespace App\Http\Controllers\cms;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $userMale = Profile::where('gender', 'Male')->count();
        $userFemale = Profile::where('gender', 'Female')->count();
        $posts = Post::count();
        $categories = Category::count();
        $tags = Tag::count();

        $recentPosts = Post::with('user_author', 'category')
                            ->latest()
                            ->take(4)
                            ->get();

        $populers = Post::with('user_author', 'category')
                            ->where('view', '>', 0)
                            ->latest('view')
                            ->take(5)
                            ->get();

        $userMostPosts = User::with('posts', 'profiles')
                            ->take(5)
                            ->get();
        
        return view('cms.home', compact([
            'users', 'userMale', 'userFemale', 'posts', 'categories', 'tags', 'recentPosts', 'populers', 'userMostPosts'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
