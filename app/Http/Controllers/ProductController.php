<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexAdmin()
    {
        return view('admin.products', ['products' => Product::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function indexAdminByCategory($id)
    {
        $category = Category::find($id);
        return view('admin.products', ['products' => $category->products()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createProduct', ['categories' => Category::all()]);
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        Product::create([
            'name' => $request['name'],
            'category_id' => $request['category'],
            'description' => $request['description'],
            'price' => $request['price'],
            'visible' => '1',
            'img1' => implode("", explode("public/", $request->file('img1')->store('public/product'))),
            'img2' => implode("", explode("public/", $request->file('img2')->store('public/product'))),
            'img3' => implode("", explode("public/", $request->file('img3')->store('public/product')))
        ]);

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('single', [
            'product' => $product,
            'relatedProducts' => Product::where([['category_id', $product->category->id], ['visible', 1]])->orderBy('created_at', 'desc')->whereNotIn('name', [$product->name])->take(6)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return response()->json(Product::find(request('product')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return void
     */
    public function update()
    {
        $product              = Product::find(request('id'));
        $product->name        = request('name');
        $product->description = request('description');
        $product->price       = request('price');
        $product->visible     = request('visible');
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function search($search)
    {
        return view('category', [
            'categoryProducts' => Product::where([['name', 'LIKE', '%' . $search . '%'], ['visible', 1]])->orderBy('price', 'asc')->paginate(12),
            'search' => $search
        ]);
    }
}
