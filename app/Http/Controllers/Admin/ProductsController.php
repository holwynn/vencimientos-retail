<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
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
     * Show all products
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')
            ->paginate(8);

        return view('admin.products', [
            'products' => $products
        ]);
    }

    /**
     * Show a product
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product', [
            'product' => $product
        ]);
    }

    /**
     * Update a product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());
        $product->save();

        return view('admin.product', [
            'product' => $product
        ]);
    }
}
