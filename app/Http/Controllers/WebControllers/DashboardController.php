<?php
namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
use Carbon\Carbon;
use DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $users = User::count();
        $orders = Order::count();
        $recentOrders = Order::with('user', 'products')->latest()->limit(6)->get();
        $categories = Category::pluck("name");
        $productCategories = Category::withCount(['products as order_count' => function ($query) {
            $query->join('products_orders', 'products_orders.product_id', '=', 'products.id');
        }])->orderByDesc('order_count')->pluck("order_count");


        $monthlyEarnings = Order::whereYear('created_at', Carbon::now()->year)
        ->selectRaw("DATE_FORMAT(created_at, '%b') as month, SUM(total_amount) as total_earnings")
        ->groupByRaw("DATE_FORMAT(created_at, '%b')")
        ->get();
        
        return view('pages.dashboards.index', compact("products", "users", "orders", "recentOrders", "categories","productCategories", "monthlyEarnings"));
    }
}
