<?php

namespace App\Http\Controllers;

use Validator;
use App\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductsController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::orderBy('id', 'DESC')
            ->take(100)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  str  $upc
     * @return \Illuminate\Http\Response
     */
    public function show($upc)
    {
        if (strlen($upc) != 13) {
            $this->throwUnknownProduct();
        }

        $product = Product::where('upc', $upc)->first();

        if ($product) {
            return $product;
        }

        $product = $this->fromWalmart($upc);

        if (!$product) {
            $this->throwUnknownProduct();
        }

        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str  $upc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $upc)
    {
        $product = Product::where('upc', $upc)->first();

        if (!$product) {
            $this->throwUnknownProduct();
        }

        $product->update($request->all());
        $product->save();

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  str  $upc
     * @return \Illuminate\Http\Response
     */
    public function destroy($upc)
    {
        $product = Product::where('upc', $upc)->first();

        if (!$product) {
            $this->throwUnknownProduct();
        }

        $product->delete();

        return new Response([
            'msg' => 'Product deleted'
        ], 200);
    }

    /**
     * Throw 404 if product doesn't exist
     * 
     * @return Illuminate\Http\Exceptions\HttpResponseException
     */
    private function throwUnknownProduct() {
        throw new HttpResponseException(response()->json([
            'msg' => 'Product does not exist',
        ]), 404);
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
