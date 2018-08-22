<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Product;
use App\Events\Products\Create;
use App\Events\Products\Update;
use App\Events\Products\Delete;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return Product::orderBy('id', 'DESC')
            ->take(100)
            ->get();
    }

    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

        $product = Product::create($request->validated());

        event(new Create(auth()->user(), $product));
        return $product;
    }

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

    public function update(UpdateProductRequest $request, $upc)
    {
        $product = Product::where('upc', $upc)->first();

        $this->authorize('update', $product);

        if (!$product) {
            $this->throwUnknownProduct();
        }

        $product->update($request->all());
        $product->save();

        event(new Update(auth()->user(), $product));
        return $product;
    }

    public function destroy($upc)
    {
        $product = Product::where('upc', $upc)->first();

        $this->authorize('delete', $product);

        if (!$product) {
            $this->throwUnknownProduct();
        }

        $product->delete();

        event(new Delete(auth()->user(), $product));
        return new Response([
            'msg' => 'Product deleted'
        ], 200);
    }

    private function throwUnknownProduct() {
        throw new HttpResponseException(response()->json([
            'msg' => 'Product does not exist',
        ]), 404);
    }

    private function fromWalmart($upc)
    {
        $this->authorize('create', Product::class);

        $product = new Product();
        $product->fromWalmart($upc);

        if (!$product->name) {
            return false;
        }

        $product->save();

        event(new Create(auth()->user(), $product));
        return $product;
    }
}
