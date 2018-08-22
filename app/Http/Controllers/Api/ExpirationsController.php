<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Expiration;
use App\Product;
use App\Events\Expirations\Create;
use App\Events\Expirations\Update;
use App\Events\Expirations\Delete;
// use App\Events\Expirations\Check;
use App\Http\Requests\StoreExpirationRequest;
use App\Http\Requests\UpdateExpirationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExpirationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return Expiration::with('product')
            ->orderBy('expiration', 'ASC')
            ->take(50)
            ->get();
    }

    public function store(StoreExpirationRequest $request)
    {
        $this->authorize('create', Expiration::class);

        $product = Product::where('upc', $request->input('upc'))->first();
        $expiration = $product->expirations()->create($request->validated());

        event(new Create(auth()->user(), $expiration));
        return $expiration->load('product');
    }

    public function show($id)
    {
        $expiration = Expiration::with('product')
            ->find($id);

        if (!$expiration) {
            $this->throwUnknownExpiration();
        }

        return $expiration;
    }

    public function update(UpdateExpirationRequest $request, $id)
    {
        $expiration = Expiration::findOrFail($id);

        $this->authorize('update', $expiration);

        if (!$expiration) {
            $this->throwUnknownExpiration();
        }

        $expiration->update($request->validated());
        $expiration->save();

        event(new Update(auth()->user(), $expiration));
        return $expiration->load('product');
    }

    public function destroy($id)
    {
        $expiration = Expiration::find($id);

        $this->authorize('delete', $expiration);

        if (!$expiration) {
            $this->throwUnknownExpiration();
        }

        $expiration->delete();

        event(new Delete(auth()->user(), $expiration));
        return new Response([
            'msg' => 'Expiration deleted'
        ], 200);
    }

    public function throwUnknownExpiration()
    {
        throw new HttpResponseException(response()->json([
            'msg' => 'Expiration does not exist',
        ]), 404);
    }
}
