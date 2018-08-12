<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Expiration;
use App\Http\Requests\StoreExpirationRequest;
use App\Http\Requests\UpdateExpirationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpirationsController extends Controller
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
     * Show all expirations
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expirations = Expiration::with('product')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.expirations.index', [
            'expirations' => $expirations,
        ]);
    }

    public function create($upc = '')
    {
        return view('admin.expirations.create', [
            'upc' => $upc,
        ]);
    }

    public function edit($id)
    {
        $expiration = Expiration::findOrFail($id);

        return view('admin.expirations.edit', [
            'expiration' => $expiration,
        ]);
    }

    public function store(StoreExpirationRequest $request)
    {
        $product = Product::where('upc', $request->input('upc'))->first();
        $expiration = $product->expirations()->create($request->all());

        return redirect()->route('admin.expirations');
    }

    public function update(UpdateExpirationRequest $request, $id)
    {
        $expiration = Expiration::findOrFail($id);
        $expiration->update($request->all());
        $expiration->save();

        return redirect()->route('admin.expirations');
    }
}
