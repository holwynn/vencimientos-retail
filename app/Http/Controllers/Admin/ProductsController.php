<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Queries\Admin\ListProducts;
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
    public function index(Request $request)
    {
        $query = new ListProducts();
        $products = $query->search($request);

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show a product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', [
            'product' => $product
        ]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        $request->session()->flash('message-s', 'El producto ha sido creado.');
        return view('admin.products.edit', [
            'product' => $product
        ]);
    }

    public function walmart(Request $request)
    {
        $product = Product::where('upc', $request->input('upc'))->first();

        if (!$product) {
            $product = $this->fromWalmart($request->input('upc'));

            if (!$product) {
                $request->session()->flash('message-d', 'No se ha encontrado el producto. Ingreselo manualmente.');
                return redirect()->back();
            }
        }

        $request->session()->flash('message-s', 'El producto ha sido creado.');
        return view('admin.products.edit', [
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

        $request->session()->flash('message-s', 'El producto ha sido actualizado.');
        return redirect()->back();

        // return view('admin.product', [
        //     'product' => $product
        // ]);
    }

    /**
     * Search and save a product from walmart db
     * 
     * @param str $upc
     * @return App\Product
     */
    private function fromWalmart($upc) {
        $product = new Product();
        $product->fromWalmart($upc);

        if (!$product->name) {
            return false;
        }

        $product->save();
        return $product;
    }
}
