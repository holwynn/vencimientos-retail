<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Log as DatabaseLog;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Queries\Admin\ListProducts;
use App\Events\Products\Create;
use App\Events\Products\Update;
use App\Events\Products\Delete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
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
     * Show all products
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new ListProducts();
        $products = $query->search($request);

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show a product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $logs = DatabaseLog::products()
            ->model($product)
            ->latest()
            ->get();

        return view('admin.products.edit', [
            'product' => $product,
            'logs' => $logs
        ]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        $request->session()->flash('message-s', 'El producto ha sido creado.');
        event(new Create(auth()->user(), $product));
        return redirect()->route('admin.products.edit', ['id' => $product->id]);
    }

    public function walmart(Request $request)
    {
        $product = Product::where('upc', $request->input('upc'))->first();

        if (!$product) {
            $product = $this->fromWalmart($request->input('upc'));

            if (!$product) {
                $request->session()->flash('message-d', 'No se ha encontrado el producto. Ingreselo manualmente.');
                return redirect()->back();
            }
        }

        $request->session()->flash('message-s', 'El producto ha sido creado.');
        event(new Create(auth()->user(), $product));
        return redirect()->route('admin.products.edit', ['id' => $product->id]);
    }

    /**
     * Update a product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());
        $product->save();

        $request->session()->flash('message-s', 'El producto ha sido actualizado.');
        event(new Update(auth()->user(), $product));
        return redirect()->route('admin.products.edit', ['id' => $product->id]);
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
