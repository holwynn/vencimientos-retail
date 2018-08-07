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
        $product = auth()->user()->products()->create($request->validated());

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
        $product = Product::where('upc', $upc)->first();

        if (!$product) {
            throw new HttpResponseException(response()->json([
                'msg' => 'Product does not exist',
            ]), 404);
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
            throw new HttpResponseException(response()->json([
                'msg' => 'Product does not exist',
            ], 404));
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
            throw new HttpResponseException(response()->json([
                'msg' => 'Product does not exist',
            ], 404));
        }

        $product->delete();

        return new Response([
            'msg' => 'Product deleted'
        ], 200);
    }
}
