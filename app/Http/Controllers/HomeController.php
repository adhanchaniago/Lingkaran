<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Visitor;
use App\Models\Category;
use App\Models\Headline;
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
        $trending = Post::where('status', 1)
                        ->where('view', '>=', 1)
                        ->latest('view')
                        ->take(5)
                        ->get();

        // Headline
        $headline_main = Headline::with(['post', 'post.category', 'post.user_author'])
                                    ->firstWhere('type', 'main');

        $headline_secondary = Headline::with(['post.category', 'post.user_author'])
                                    ->where('type', 'secondary')
                                    ->get();

        // Berita Terkini
        $populer_category_all = Post::with(['category', 'user_author'])
                                    ->where('status', 1)
                                    ->where('view', '>=', 1)
                                    ->take(5)
                                    ->get();
        // dd($populer_category_all);

        $terbaru_category_all = Post::with(['category', 'user_author'])
                                    ->where('status', 1)
                                    ->latest()
                                    ->take(5)
                                    ->get();

        $categories = Category::with(['posts', 'posts.user_author'])
                                    ->take(9)
                                    ->get();
        
        // Berita Terbaru
        $berita_terbaru = Post::with(['category', 'user_author'])
                                ->where('status', 1)
                                ->latest()
                                ->paginate(16);

        return view('guest.home', compact([
            'trending', 'headline_main', 'headline_secondary', 'populer_category_all', 'terbaru_category_all',
            'categories', 'berita_terbaru'
        ]));
    }

    /**
     * Show choosed post by id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Post $post)
    {
        $post = Post::with('tags')->find($post->id);

        $relatedPosts = Post::where('category_id', $category->id)
                            ->where('id', '<>', $post->id)
                            ->where('status', 1)
                            ->orderByRaw('RAND()')
                            ->take(8)
                            ->get();

        $populerPosts = Post::where('status', 1)
                            ->where('view', '>=', 1)
                            ->latest('view')
                            ->take(4)
                            ->get();

        $terbaruPosts = Post::with('user_author')
                            ->where('status', 1)
                            ->latest()
                            ->take(5)
                            ->get();
        
        return view('guest.post', compact([
            'post', 'relatedPosts', 'populerPosts', 'terbaruPosts'
        ]));
    }

    /**
     * Undocumented function
     *
     * @param Category $category
     * @return void
     */
    public function category(Category $category)
    {
        $posts = Post::with(['category', 'tags'])
                        ->where('category_id', $category->id)
                        ->paginate(10);

        $populerPosts = Post::where('status', 1)
                        ->where('view', '>=', 1)
                        ->latest('view')
                        ->take(4)
                        ->get();

        $terbaruPosts = Post::with('user_author')
                        ->where('status', 1)
                        ->latest()
                        ->take(5)
                        ->get();

        return view('guest.category', compact([
            'posts', 'populerPosts', 'terbaruPosts'
        ]));
    }

    /**
     * Undocumented function
     *
     * @param Tag $tag
     * @return void
     */
    public function tag(Tag $tag)
    {
        $tag = Tag::with('posts')
                    ->where('id', $tag->id)
                    ->get()
                    ->first();

        $posts = $tag->posts()->latest()->paginate(10);

        $populerPosts = Post::where('status', 1)
                            ->where('view', '>=', 1)
                            ->latest('view')
                            ->take(4)
                            ->get();

        $terbaruPosts = Post::with('user_author')
                            ->where('status', 1)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('guest.tag', compact([
            'tag', 'posts', 'populerPosts', 'terbaruPosts'
        ]));
    }

    public function addVisitor(Request $request)
    {
        $post = Post::findOrFail($request->id);

        $expiresAt = now()->addHours(2);
        $visit = views($post)
                ->cooldown($expiresAt)
                ->record();

        if ($visit) {
            $post->update([
                'view' => views($post)->count()
            ]);
            $data = 'Expires At '.$expiresAt;
        } else {
            $data = 'in countdown';
        }

        return response()->json(array($msg = 'Message: '.$data), 200);
    }
}
