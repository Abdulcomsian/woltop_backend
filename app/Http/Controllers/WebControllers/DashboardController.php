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
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $lastMonth = now()->subMonth()->month;
        $lastMonthYear = now()->subMonth()->year;
      

        $categoryEarnings = DB::table('orders')
        ->join('products_orders', 'orders.id', '=', 'products_orders.order_id')
        ->join('products', 'products_orders.product_id', '=', 'products.id')
        ->join('products_categories', 'products.id', '=', 'products_categories.product_id')
        ->join('categories', 'products_categories.category_id', '=', 'categories.id')
        ->whereYear('orders.created_at', $currentYear)
        ->groupBy('categories.name')
        ->select(
            'categories.name as category',
            DB::raw('SUM(orders.total_amount * products_orders.quantity) as earning')
        )
        ->orderByDesc('earning')
        ->get();

        $categories = Category::pluck("name");
        $monthlyEarnings = Order::whereYear('created_at', Carbon::now()->year)
        ->selectRaw("DATE_FORMAT(created_at, '%b') as month, SUM(total_amount) as total_earnings")
        ->groupByRaw("DATE_FORMAT(created_at, '%b')")
        ->get();

        // Revenue
        $totalRevenue = Order::whereMonth('created_at', $currentMonth)->whereYear("created_at", $currentYear)->sum("total_amount"); // current Month
        $lastMonthRevenue = Order::whereMonth('created_at', $lastMonth) // lastMonth
        ->whereYear('created_at', $lastMonthYear)
        ->sum('total_amount');

        if ($lastMonthRevenue > 0) {
            $revenuePercentage = (($totalRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
        } else {
            $revenuePercentage = $totalRevenue > 0 ? 100 : 0;
        }

        // Orders
        $totalOrders = Order::whereMonth('created_at', $currentMonth)->whereYear("created_at", $currentYear)->count();
        $lastMonthOrder = Order::whereMonth('created_at', $lastMonth) // lastMonth
        ->whereYear('created_at', $lastMonthYear)
        ->count();
        if ($lastMonthOrder > 0) {
            $orderPercentage = (($totalOrders - $lastMonthOrder) / $lastMonthOrder) * 100;
        } else {
            $orderPercentage = $totalOrders > 0 ? 100 : 0;
        }

        $activeUsers = User::whereHas('roles', function($query){
            $query->where("name", "!=", "admin");
        })->count();


        // // Conversion Rate calculation
        // $currentMonthRevenue = Order::whereMonth('created_at', $currentMonth)
        // ->whereYear('created_at', $currentYear)
        // ->sum('total_amount');
    
        // // Get total revenue for last month
        // $lastMonthRevenue = Order::whereMonth('created_at', $lastMonth)
        // ->whereYear('created_at', $lastMonthYear)
        // ->sum('total_amount');

        // // Calculate conversion (growth) rate
        // if ($lastMonthRevenue > 0) {
        //     $conversionRate = (($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
        // } else {
        //     // Handle zero revenue in last month (avoid division by zero)
        //     $conversionRate = $currentMonthRevenue > 0 ? 100 : 0;
        // }

        // $conversionRate = round($conversionRate, 2);
    
        $recentOrders = Order::with('user', 'products')->latest()->limit(6)->get();
        
        return view('pages.dashboards.index', compact("totalRevenue", "revenuePercentage", "totalOrders","orderPercentage", "activeUsers" ,"monthlyEarnings", "categories", "recentOrders", "categoryEarnings"));
    }
}
