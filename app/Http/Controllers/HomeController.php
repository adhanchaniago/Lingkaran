<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesNav = Category::all()->take(8);
        $post_populer = Post::where('status', '=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $post_populer_category_all = Post::where('status', '=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $post_terbaru_category_all = Post::where('status', '=', 1)->latest()->take(5)->get();
        $berita_terbaru = Post::where('status', '=', 1)->paginate(16);
        return view('guest.home', compact('categoriesNav', 'post_populer', 'post_populer_category_all', 'post_terbaru_category_all','berita_terbaru'));
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
}
