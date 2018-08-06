<?php

namespace App\Http\Controllers;

use Validator;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'upc' => 'required|string|unique:products,upc',
            'img' => 'string',
        ]);

        if ($validator->fails()) {
            return new Response([
                'msg' => 'Failed to validate data',
                'errors' => $validator->errors(),
            ], 400);
        }

        $product = auth()->user()->products()->create($request->all());

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
            return new Response([
                'msg' => 'Product does not exist'
            ], 404);
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
    public function update(Request $request, $upc)
    {
        $product = Product::where('upc', $upc)->first();

        if (!$product) {
            return new Response([
                'msg' => 'Product does not exist'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'upc' => 'string|unique:products,upc',
            'img' => 'string',
        ]);

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
            return new Response([
                'msg' => 'Product does not exist'
            ], 404);
        }

        $product->delete();

        return new Response([
            'msg' => 'Product deleted'
        ], 200);
    }
}