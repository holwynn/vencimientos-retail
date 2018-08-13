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
        $expiration = $product->expirations()->create($request->validated());

        $request->session()->flash('message-s', 'El vencimiento ha sido creado.');
        return redirect()->route('admin.expirations');
    }

    public function update(UpdateExpirationRequest $request, $id)
    {
        $expiration = Expiration::findOrFail($id);
        $expiration->update($request->all());
        $expiration->save();

        $request->session()->flash('message-s', 'El vencimiento ha sido actualizado.');
        return redirect()->back();
    }

    public function check(Request $request, $id)
    {
        $expiration = Expiration::findOrFail($id);
        $expiration->checked = true;
        $expiration->save();

        $request->session()->flash('message-s', 'El vencimiento ha sido revisado.');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $expiration = Expiration::findOrFail($id);
        $expiration->delete();

        $request->session()->flash('message-s', 'El vencimiento ha sido eliminado.');
        return redirect()->route('admin.dashboard');
    }
}
