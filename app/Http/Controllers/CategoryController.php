<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'categories' => Category::all()
        ]);
    }

    public function indexAdmin()
    {
        return view('admin.categories', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request['name'],
            'img' => implode("", explode("public/", $request->file('img')->store('public/category')))
        ]);

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function show(Category $category)
    {
        // for ajax and sorting/filtering implementation, also dont forget to include products.js
//        if (request()->ajax()) {
//            $categoryProducts = $category->products()
//                ->whereBetween('price', array(request('min'), request('max')))
//                ->orderBy(request('sort'), request('sort_direction'))
//                ->paginate(9)
//                ->appends('min', request('min'))
//                ->appends('max', request('max'))
//                ->appends('sort', request('sort'))
//                ->appends('sort_direction', request('sort_direction'))
//                ->appends('sort', request('sort'));
//            return response()->json(view('layouts.products', ['categoryProducts' => $categoryProducts])->render());
//        }

        return view('category', [
            'category' => $category,
            'categoryProducts' => $categoryProducts = $category->products()->where('visible', 1)->orderBy('price', 'asc')->paginate(12),
            'newestProducts' => Product::where('visible', 1)->orderBy('created_at', 'desc')->take(3)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return response()->json(Category::find(request('category')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return void
     */
    public function update()
    {
        $category              = Category::find(request('id'));
        $category->name        = request('name');
        $category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
