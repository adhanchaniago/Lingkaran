<?php

namespace App\Http\Controllers\cms;

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
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
        $tags = Tag::latest()->get();
        return view('cms.tag.index', compact('tags'));
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
            'title' => 'required|min:2|unique:tags'
        ]);
        Tag::create([
            'title' => request('title'),
            'slug' => Str::slug(request('title'))
        ]);
        return redirect(route('tag.index'))->withSuccess('Tag has been added');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|min:2'
        ]);

        $tag = Tag::findOrFail($request->id);
        $tag->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title)
        ]);
        return redirect()->route('tag.index')->withSuccess('Tag has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tag = Tag::findOrFail($request->id);
        $tag->delete();
        return redirect()->route('tag.index')->withSuccess('Tag has been deleted');
    }
}
