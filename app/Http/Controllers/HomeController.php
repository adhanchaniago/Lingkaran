<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Headline;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headline_main = Headline::with('post')->firstWhere('type', 'main');
        $headline_secondary = Headline::with('post')->where('type', 'secondary')->get();

        // Ambil id category berdasarkan nama kategori
        $fashion = Category::where('slug', '=', 'fashion')->get();
        $sains = Category::where('slug', '=', 'sains-teknologi')->get();
        $olahraga = Category::where('slug', '=', 'olahraga')->get();
        $otomotif = Category::where('slug', '=', 'otomotif')->get();
        $properti = Category::where('slug', '=', 'properti')->get();
        $kesehatan = Category::where('slug', '=', 'kesehatan')->get();
        $mediasosial = Category::where('slug', '=', 'media-sosial')->get();

        $trending = Post::where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $populer_category_all = Post::where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_all = Post::where('status', 1)->latest()->take(5)->get();
        $populer_category_fashion = Post::where('category_id', '=', (!empty($fashion[0])) ? $fashion[0]->id : '' )->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_fashion = Post::where('category_id', '=', (!empty($fashion[0])) ? $fashion[0]->id : '' )->where('status', 1)->latest()->take(5)->get();
        $populer_category_sains = Post::where('category_id', '=', (!empty($sains[0])) ? $sains[0]->id : '' )->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_sains = Post::where('category_id', '=', (!empty($sains[0])) ? $sains[0]->id : '' )->where('status', 1)->latest()->take(5)->get();
        $populer_category_olahraga = Post::where('category_id', '=', (!empty($olahraga[0])) ? $olahraga[0]->id : '' )->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_olahraga = Post::where('category_id', '=', (!empty($olahraga[0])) ? $olahraga[0]->id : '' )->where('status', 1)->latest()->take(5)->get();
        $populer_category_otomotif = Post::where('category_id', '=', (!empty($otomotif[0])) ? $otomotif[0]->id : '' )->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_otomotif = Post::where('category_id', '=', (!empty($otomotif[0])) ? $otomotif[0]->id : '' )->where('status', 1)->latest()->take(5)->get();
        $populer_category_properti = Post::where('category_id', '=', (!empty($properti[0])) ? $properti[0]->id : '' )->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_properti = Post::where('category_id', '=', (!empty($properti[0])) ? $properti[0]->id : '' )->where('status', 1)->latest()->take(5)->get();
        $populer_category_kesehatan = Post::where('category_id', '=', (!empty($kesehatan[0])) ? $kesehatan[0]->id : '' )->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_kesehatan = Post::where('category_id', '=', (!empty($kesehatan[0])) ? $kesehatan[0]->id : '' )->where('status', 1)->latest()->take(5)->get();
        $populer_category_mediasosial = Post::where('category_id', '=', (!empty($mediasosial[0])) ? $mediasosial[0]->id : '' )->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_mediasosial = Post::where('category_id', '=', (!empty($mediasosial[0])) ? $mediasosial[0]->id : '' )->where('status', 1)->latest()->take(5)->get();

        $berita_terbaru = Post::where('status', 1)->paginate(16);

        return view('guest.home', compact('trending',
         'populer_category_all', 'terbaru_category_all',
         'populer_category_fashion', 'terbaru_category_fashion',
         'populer_category_sains', 'terbaru_category_sains', 
         'populer_category_olahraga', 'terbaru_category_olahraga', 
         'populer_category_otomotif', 'terbaru_category_otomotif', 
         'populer_category_properti', 'terbaru_category_properti', 
         'populer_category_kesehatan', 'terbaru_category_kesehatan', 
         'populer_category_mediasosial', 'terbaru_category_mediasosial', 
         'berita_terbaru', 'headline_main', 'headline_secondary'));
    }

    /**
     * Show choosed post by id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Post $post)
    {
        $relatedPosts = Post::where('category_id', $category->id)->where('id', '<>', $post->id)
        ->where('status', 1)->take(8)->get();
        $populerPosts = Post::where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(4)->get();
        $terbaruPosts = Post::where('status', 1)->latest()->take(5)->get();
        return view('guest.post', compact('post', 'relatedPosts', 'populerPosts', 'terbaruPosts'));
    }

}
