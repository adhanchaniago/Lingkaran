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
        $trending = Post::where('status', '=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $post_populer_category_all = Post::where('status', '=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $post_terbaru_category_all = Post::where('status', '=', 1)->latest()->take(5)->get();
        $berita_terbaru = Post::where('status', '=', 1)->paginate(16);
        return view('guest.home', compact('trending', 'post_populer_category_all', 'post_terbaru_category_all','berita_terbaru'));
    }

}
