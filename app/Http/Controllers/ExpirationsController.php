<?php

namespace App\Http\Controllers;

use Validator;
use App\Expiration;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpirationsController extends Controller
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'qty' => 'required|integer',
            'expiration' => 'required|date',
            'upc' => 'required|exists:products,upc'
        ]);

        if ($validator->fails()) {
            return new Response([
                'msg' => 'Failed to validate data',
                'errors' => $validator->errors(),
            ], 400);
        }

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
            return new Response([
                'msg' => 'Expiration does not exist'
            ], 404);
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
    public function update(Request $request, $id)
    {
        $expiration = Expiration::find($id);

        if (!$expiration) {
            return new Response([
                'msg' => 'Expiration does not exist'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'qty' => 'string',
            'expiration' => 'date',
        ]);

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
            return new Response([
                'msg' => 'Expiration does not exist'
            ], 404);
        }

        $expiration->delete();

        return new Response([
            'msg' => 'Expiration deleted'
        ], 200);
    }
}
