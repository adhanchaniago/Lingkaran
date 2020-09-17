<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::take(100)->get();

        $populerPosts = Post::with('category')
            ->where('status', 1)
            ->where('view', '>=', 1)
            ->latest('view')
            ->take(4)
            ->get();

        $terbaruPosts = Post::with(['category', 'user_author'])
            ->where('status', 1)
            ->latest()
            ->take(5)
            ->get();

        return view('guest.category.index', compact([
            'cats', 'populerPosts', 'terbaruPosts'
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
    public function show(Category $category)
    {
        $posts = Post::with(['category', 'user_author', 'tags'])
            ->where('category_id', $category->id)
            ->where('status', 1)
            ->paginate(10);

        $populerPosts = Post::with('category')
            ->where('status', 1)
            ->where('view', '>=', 1)
            ->latest('view')
            ->take(4)
            ->get();

        $terbaruPosts = Post::with(['category', 'user_author'])
            ->where('status', 1)
            ->latest()
            ->take(5)
            ->get();

        return view('guest.category.show', compact([
            'category', 'posts', 'populerPosts', 'terbaruPosts'
        ]));
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
