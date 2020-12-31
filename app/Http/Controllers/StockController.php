<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\purchaseDetails;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function view(){
        $stock = Stock::with('product')->get();
        
        return view('stock.viewStock', compact('stock'));
    } 
    public function show(){
        $inputStock = purchaseDetails::with('product', 'purchase')->orderBy('id', 'desc')->get();
        return view('stock.purchaseStock', compact('inputStock'));
    } 
    public function saleStock()
    {
        $outStock = OrderDetails::with('product', 'order')->orderBy('id', 'desc')->get();
        return view('stock.saleStock', compact('outStock'));
    }
}
