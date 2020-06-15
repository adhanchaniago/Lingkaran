<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->Paginate(5);
        return view('cms.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.category.create');
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
            'title' => 'required|min:3|unique:categories',
            'color' => 'required|min:3|unique:categories'
        ]);

        Category::create([
            'title' => Str::title(request('title')),
            'slug' => Str::slug(request('title')),
            'color' => request('color')
        ]);
        return redirect(route('category.index'))->withSuccess('New category has been added');
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
            'title' => 'required|min:3',
            'color' => 'required|min:3'
        ]);

        $category = Category::findOrFail($request->id);
        $category->update([
            'title' => Str::title(request('title')),
            'slug' => Str::slug(request('title')),
            'color' => request('color')
        ]);
        return redirect(route('category.index'))->withSuccess('Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect(route('category.index'))->withSuccess('Category has been deleted');
    }
}
