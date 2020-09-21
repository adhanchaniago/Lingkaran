<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Headline;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

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
        $trending = Post::with(['category', 'user_author'])
            ->where('is_published', true)
            ->where('view', '>=', 1)
            ->latest('view')
            ->take(5)
            ->get();
            
        // Headline
        $headline_main = Headline::with(['post', 'post.category', 'post.user_author'])
            ->where('type', 'main')
            ->get();

        $headline_secondary = Headline::with(['post', 'post.category', 'post.user_author'])
            ->where('type', 'secondary')
            ->get();

        // Berita Terkini
        $terbaru_category_all = Post::with(['category', 'user_author'])
            ->where('is_published', true)
            ->latest()
            ->take(5)
            ->get();

        // Berita Terbaru
        $berita_terbaru = Post::with(['category', 'user_author'])
            ->where('is_published', true)
            ->latest()
            ->paginate(16);

        return view('guest.home', compact([
            'trending', 'headline_main', 'headline_secondary', 'terbaru_category_all', 'berita_terbaru'
        ]));
    }

    /**
     * Show choosed post by id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Post $post)
    {
        $post = Post::with('category', 'user_author', 'user_editor', 'tags')->find($post->id);

        $relatedPosts = Post::with('category')
            ->where('category_id', $category->id)
            ->where('id', '<>', $post->id)
            ->where('is_published', true)
            ->orderByRaw('RAND()')
            ->take(8)
            ->get();

        $populerPosts = Post::with('category')
            ->where('is_published', true)
            ->where('view', '>=', 1)
            ->latest('view')
            ->take(4)
            ->get();

        $terbaruPosts = Post::with('category', 'user_author')
            ->where('is_published', true)
            ->latest()
            ->take(5)
            ->get();
            
        $visitors = View::where('viewable_id', $post->id)
            ->whereNotIn('ip_address', ['127.0.0.1'])
            ->get('ip_address');
            
        $collection = [];
        foreach ($visitors->unique('ip_address') as $visitor) {
            $collection[] = Location::get($visitor->ip_address);
        }
        $positions = collect($collection)->unique('cityName');

        return view('guest.post', compact([
            'post', 'relatedPosts', 'populerPosts', 'terbaruPosts', 'positions'
        ]));
    }

    public function addVisitor(Request $request)
    {
        if (Auth::check() != true) {
            $post = Post::findOrFail(decrypt($request->id));

            $expiresAt = now()->addHours(6);
            $visit = views($post)
                ->cooldown($expiresAt)
                ->record();

            if ($visit) {
                $post->increment('view');
                $visit->update([
                    'ip_address' => request()->ip()
                ]);
            }
        }
    }
}
