<?php

namespace App\Http\Controllers;

use Validator;
use App\Expiration;
use App\Product;
use App\Http\Requests\StoreExpirationRequest;
use App\Http\Requests\UpdateExpirationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExpirationsController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Expiration::with('product')
            ->orderBy('expiration', 'ASC')
            ->take(50)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpirationRequest $request)
    {
        $product = Product::where('upc', $request->input('upc'))->first();
        $expiration = $product->expirations()->create($request->all());

        return $expiration->load('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expiration = Expiration::with('product')
            ->find($id);

        if (!$expiration) {
            $this->throwUnknownExpiration();
        }

        return $expiration;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpirationRequest $request, $id)
    {
        $expiration = Expiration::find($id);

        if (!$expiration) {
            $this->throwUnknownExpiration();
        }

        $expiration->update($request->all());
        $expiration->save();

        return $expiration->load('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expiration = Expiration::find($id);

        if (!$expiration) {
            $this->throwUnknownExpiration();
        }

        $expiration->delete();

        return new Response([
            'msg' => 'Expiration deleted'
        ], 200);
    }

    /**
     * Throw 404 if expiration doesn't exist
     * 
     * @return Illuminate\Http\Exceptions\HttpResponseException
     */
    public function throwUnknownExpiration() {
        throw new HttpResponseException(response()->json([
            'msg' => 'Expiration does not exist',
        ]), 404);
    }
}
