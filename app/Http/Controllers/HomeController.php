<?php

namespace App\Http\Controllers;

use App\Models\Coupen;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Supplier;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalSales = OrderDetail::count();
        $totalProducts = Product::where('product_status', 1)->count();
        $totalIncomingProducts = Product::where('product_status', 0)->count();
        $totalOrders = Coupen::where('status', false)->count();
        $totalSuppliers = Supplier::count();
        $totalRevenue = Order::sum("total_price");
        $todaySales = OrderDetail::whereDate("created_at", Carbon::today()->format('Y-m-d'))->count();
        $todayRevenue = Order::whereDate("created_at", Carbon::today()->format('Y-m-d'))->sum("total_price");
        $monthlySales = OrderDetail::whereYear("created_at", Carbon::now()->year)->whereMonth("created_at", Carbon::now()->month)->count();
        $monthlyRevenue = Order::whereYear("created_at", Carbon::now()->year)->whereMonth("created_at", Carbon::now()->month)->sum("total_price");
        return view('home', compact('monthlyRevenue','monthlySales','totalSales', 'totalRevenue', 'todaySales','totalIncomingProducts', 'todayRevenue', 'totalSuppliers', 'totalProducts', 'totalOrders'));
    }
}
