<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Carbon\Carbon;
use App\Expiration;
use App\Log as DatabaseLog;
use Illuminate\Http\Request;
use App\Events\Expirations\Check;
use App\Events\Expirations\Create;
use App\Events\Expirations\Update;
use App\Events\Expirations\Delete;
use App\Http\Controllers\Controller;
use App\Queries\Admin\ListExpirations;
use App\Http\Requests\StoreExpirationRequest;
use App\Http\Requests\UpdateExpirationRequest;

class ExpirationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = new ListExpirations();
        $expirations = $query->search($request);

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
        $logs = DatabaseLog::expirations()
            ->model($expiration)
            ->latest()
            ->get();

        return view('admin.expirations.edit', [
            'expiration' => $expiration,
            'logs' => $logs,
        ]);
    }

    public function store(StoreExpirationRequest $request)
    {
        $this->authorize('create', Product::class);

        $product = Product::where('upc', $request->input('upc'))->first();
        $expiration = $product->expirations()->create($request->validated());

        $request->session()->flash('message-s', 'El vencimiento ha sido creado.');
        event(new Create(auth()->user(), $expiration));
        return redirect()->route('admin.expirations.edit', ['id' => $expiration->id]);
    }

    public function update(UpdateExpirationRequest $request, $id)
    {
        $expiration = Expiration::findOrFail($id);

        $this->authorize('update', $expiration);

        $expiration->update($request->all());
        $expiration->save();

        $request->session()->flash('message-s', 'El vencimiento ha sido actualizado.');
        event(new Update(auth()->user(), $expiration));

        if ($this->isDashboard($request)) {
            return redirect()->back();
        }

        return redirect()->route('admin.expirations.edit', ['id' => $expiration->id]);
    }

    public function destroy(Request $request, $id)
    {
        $expiration = Expiration::findOrFail($id);

        $this->authorize('delete', $expiration);

        $expiration->delete();

        $request->session()->flash('message-s', 'El vencimiento ha sido eliminado.');
        event(new Delete(auth()->user(), $expiration));

        if ($this->isDashboard($request)) {
            return redirect()->back();
        }

        return redirect()->route('admin.expirations');
    }

    private function isDashboard($request)
    {
        return strpos($request->header('referer'), 'dashboard');
    }
}
