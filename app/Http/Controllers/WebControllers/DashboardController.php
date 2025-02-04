<?php
namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $users = User::count();
        $orders = Order::count();
        return view('pages.dashboards.index', compact("products", "users", "orders"));
    }
}
