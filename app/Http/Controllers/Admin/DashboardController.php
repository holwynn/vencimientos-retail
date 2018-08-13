<?php

namespace App\Http\Controllers\Admin;


use App\User;
use App\Product;
use App\Expiration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        setlocale(LC_TIME, 'es_AR.utf8');

        $today = Carbon::now();
        
        $usersCount = User::count();
        $productsCount = Product::count();
        $expirationsCount = Expiration::count();
        $expirations = Expiration::with('product')
            ->where('expiration', '>', $today->startOfMonth()->format('Y-m-d'))
            ->where('expiration', '<', $today->endOfMonth()->format('Y-m-d'))
            ->orderBy('expiration', 'DESC')
            ->get();

        return view('admin.dashboard', [
            'today' => Carbon::now(),
            'usersCount' => $usersCount,
            'productsCount' => $productsCount,
            'expirationsCount' => $expirationsCount,
            'expirations' => $expirations,
        ]);
    }
}
