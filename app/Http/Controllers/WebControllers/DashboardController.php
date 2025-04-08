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
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $lastMonth = now()->subMonth()->month;
        $lastMonthYear = now()->subMonth()->year;
      

        $productCategories = Category::withCount(['products as order_count' => function ($query) {
            $query->join('products_orders', 'products.id', '=', 'products_orders.product_id');
        }])->orderByDesc('order_count')->pluck("order_count");

        $categories = Category::pluck("name");
        $monthlyEarnings = Order::whereYear('created_at', Carbon::now()->year)
        ->selectRaw("DATE_FORMAT(created_at, '%b') as month, SUM(total_amount) as total_earnings")
        ->groupByRaw("DATE_FORMAT(created_at, '%b')")
        ->get();
        $totalRevenue = Order::whereMonth('created_at', $currentMonth)->whereYear("created_at", $currentYear)->sum("total_amount");
        $totalOrders = Order::whereMonth('created_at', $currentMonth)->whereYear("created_at", $currentYear)->count();
        $activeUsers = User::whereHas('orders', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('created_at', $currentMonth)
                  ->whereYear('created_at', $currentYear);
        })
        ->withCount(['orders as monthly_order_count' => function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('created_at', $currentMonth)
                  ->whereYear('created_at', $currentYear);
        }])
        ->having('monthly_order_count', '>=', 1)
        ->count();


        // Conversion Rate calculation
        $currentMonthRevenue = Order::whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->sum('total_amount');
    
        // Get total revenue for last month
        $lastMonthRevenue = Order::whereMonth('created_at', $lastMonth)
        ->whereYear('created_at', $lastMonthYear)
        ->sum('total_amount');

        // Calculate conversion (growth) rate
        if ($lastMonthRevenue > 0) {
            $conversionRate = (($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
        } else {
            // Handle zero revenue in last month (avoid division by zero)
            $conversionRate = $currentMonthRevenue > 0 ? 100 : 0;
        }

        $conversionRate = round($conversionRate, 2);
    
        $recentOrders = Order::with('user', 'products')->latest()->limit(6)->get();
        
        return view('pages.dashboards.index', compact("totalRevenue", "totalOrders","activeUsers" ,"monthlyEarnings", "categories", "productCategories", "recentOrders", "conversionRate"));
    }
}
