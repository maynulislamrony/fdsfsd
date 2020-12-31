<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $date = date("d/m/y");
        // $da = Purchase::where('purchase_date', $date)->count('total_product');
        // dd($da);
       return view('dashboard',[
            'total_product'=>Product::count(),
            'total_category'=>Category::count(),
            'total_employee'=>Employee::count(),
            'daily_present'=>Attendence::where('attendence','Present')->count(),
            'daily_purchase'=>Purchase::where('purchase_date', $date)->sum('total_product'),
            'daily_sales'=>Order::where('order_date',$date)->sum('total_product'),
            'daily_expenses'=>Expense::where('date', $date)->sum('amount'),
            'profit'=>OrderDetails::where('order_date',$date)->sum('profit'),
            'latestOrder'=>Order::with('customer')->limit(10)->orderBy('id','desc')->get(),
            'latestPurchase'=>Purchase::with('supplier')->limit(10)->orderBy('id', 'desc')->get(),
       ]);
    }
}
