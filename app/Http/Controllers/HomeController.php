<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use App\Headline;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Trending
        $trending = Post::where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();

        // Headline
        $headline_main = Headline::with(['post.category', 'post.user_author'])->firstWhere('type', 'main');
        $headline_secondary = Headline::with(['post.category', 'post.user_author'])->where('type', 'secondary')->get();

        // Berita Terkini
        // Ambil id category berdasarkan nama kategori
        $fashion = Category::where('slug', '=', 'fashion')->get();
        $sains = Category::where('slug', '=', 'sains-teknologi')->get();
        $olahraga = Category::where('slug', '=', 'olahraga')->get();
        $otomotif = Category::where('slug', '=', 'otomotif')->get();
        $properti = Category::where('slug', '=', 'properti')->get();
        $kesehatan = Category::where('slug', '=', 'kesehatan')->get();
        $mediasosial = Category::where('slug', '=', 'media-sosial')->get();

        $populer_category_all = Post::with(['category', 'user_author'])->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_all = Post::with(['category', 'user_author'])->where('status', 1)->latest()->take(5)->get();
        $populer_category_fashion = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($fashion[0])) ? $fashion[0]->id : '')->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_fashion = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($fashion[0])) ? $fashion[0]->id : '')->where('status', 1)->latest()->take(5)->get();
        $populer_category_sains = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($sains[0])) ? $sains[0]->id : '')->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_sains = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($sains[0])) ? $sains[0]->id : '')->where('status', 1)->latest()->take(5)->get();
        $populer_category_olahraga = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($olahraga[0])) ? $olahraga[0]->id : '')->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_olahraga = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($olahraga[0])) ? $olahraga[0]->id : '')->where('status', 1)->latest()->take(5)->get();
        $populer_category_otomotif = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($otomotif[0])) ? $otomotif[0]->id : '')->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_otomotif = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($otomotif[0])) ? $otomotif[0]->id : '')->where('status', 1)->latest()->take(5)->get();
        $populer_category_properti = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($properti[0])) ? $properti[0]->id : '')->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_properti = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($properti[0])) ? $properti[0]->id : '')->where('status', 1)->latest()->take(5)->get();
        $populer_category_kesehatan = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($kesehatan[0])) ? $kesehatan[0]->id : '')->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_kesehatan = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($kesehatan[0])) ? $kesehatan[0]->id : '')->where('status', 1)->latest()->take(5)->get();
        $populer_category_mediasosial = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($mediasosial[0])) ? $mediasosial[0]->id : '')->where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(5)->get();
        $terbaru_category_mediasosial = Post::with(['category', 'user_author'])->where('category_id', '=', (!empty($mediasosial[0])) ? $mediasosial[0]->id : '')->where('status', 1)->latest()->take(5)->get();

        // Berita Terbaru
        $berita_terbaru = Post::with(['category', 'user_author'])->where('status', 1)->latest()->paginate(16);

        return view('guest.home', compact(
            'trending',
            'headline_main',
            'headline_secondary',
            'populer_category_all',
            'terbaru_category_all',
            'populer_category_fashion',
            'terbaru_category_fashion',
            'populer_category_sains',
            'terbaru_category_sains',
            'populer_category_olahraga',
            'terbaru_category_olahraga',
            'populer_category_otomotif',
            'terbaru_category_otomotif',
            'populer_category_properti',
            'terbaru_category_properti',
            'populer_category_kesehatan',
            'terbaru_category_kesehatan',
            'populer_category_mediasosial',
            'terbaru_category_mediasosial',
            'berita_terbaru'
        ));
    }

    /**
     * Show choosed post by id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Post $post)
    {
        $post = Post::with('tags')->find($post->id);
        $relatedPosts = Post::where('category_id', $category->id)->where('id', '<>', $post->id)
        ->where('status', 1)->orderByRaw('RAND()')->take(8)->get();
        $populerPosts = Post::where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(4)->get();
        $terbaruPosts = Post::with('user_author')->where('status', 1)->latest()->take(5)->get();
        return view('guest.post', compact('post', 'relatedPosts', 'populerPosts', 'terbaruPosts'));
    }

    /**
     * Undocumented function
     *
     * @param Category $category
     * @return void
     */
    public function category(Category $category)
    {
        $posts = Post::with(['category', 'tags'])->where('category_id', $category->id)->take(10)->get();
        $populerPosts = Post::where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(4)->get();
        $terbaruPosts = Post::with('user_author')->where('status', 1)->latest()->take(5)->get();
        return view('guest.category', compact('posts', 'populerPosts', 'terbaruPosts'));
    }

    /**
     * Undocumented function
     *
     * @param Tag $tag
     * @return void
     */
    public function tag(Tag $tag)
    {
        $tags_post = Tag::with('posts')->where('id', $tag->id)->latest()->take(10)->get();
        for ($i=0; $i < count($tags_post); $i++) {
            $tags = $tags_post[$i];
        }
        $populerPosts = Post::where('status', 1)->where('view', '>=', 1)->orderBy('view', 'DESC')->take(4)->get();
        $terbaruPosts = Post::with('user_author')->where('status', 1)->latest()->take(5)->get();
        return view('guest.tag', compact('tags', 'populerPosts', 'terbaruPosts'));
    }
}
