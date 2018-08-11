<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Expiration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsCount = Product::count();
        $expirationsCount = Expiration::count();

        return view('admin.dashboard', [
            'products' => $productsCount,
            'expirations' => $expirationsCount,
        ]);
    }
}
