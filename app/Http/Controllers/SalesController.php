<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Setting;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class SalesController extends Controller
{
//create Sales.......................
    public function create()
    {   

        return view('sales.createSales',[
            'product'=>Product::with('category')->get(),
            'customer'=>Customer::select('name', 'id')->get(),
        ]);
    }
//cart Add ....................
    public function addCart(Request $request){

        $check = Stock::where('quantity', '>=', $request->qty)->where('product_id',$request->id)->first();
        if($check){
            $data = [
                'id'=>$request->id,
                'name'=>$request->name,
                'qty'=>$request->qty,
                'price'=>$request->unit,
                'weight'=>'0',
                'options'=>[
                    'description'=>$request->description,
                ]
            ];
            $add = Cart::add($data);
            if($add){
                $notification = array(
                    'message'=>'Product Add Successfull',
                    'alert-type'=>'success',
                );
                return Redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message'=>'Error',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message'=>'Stock not Available',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }
//cart Update......................
    public function cartUpdate1(Request $request, $rowId ){
        $cartUpdate = $request->qty;
        $check1 = DB::table('stocks')
                ->where('product_id', $request->product_id)
                ->where('quantity','>=',$request->qty)
                ->first();
        if($check1){
            $update = Cart::update($rowId, $cartUpdate);
            if($update){
                $notification = array(
                    'message'=>'Cart Update Successfull',
                    'alert-type'=>'success',
                );
                return Redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message'=>'Error',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message'=>'Stock not Available',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }
//cart Destroy...........................
    public function destroy($rowId ){
        $delete = Cart::remove($rowId);
        if($delete){
            $notification = array(
                'message'=>'Cart Delete Successfull',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Cart Remove Successfull',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }
//invoice create...........................
    public function invoiceSales(Request $request)
    {
        $request->validate([
            'customer_id'=>'required',
        ],[
            'customer_id.required'=>'Select A customer First',
        ]);
        $id = $request->customer_id;
        $customer = Customer::where('id',$id)->first();
        $content = Cart::content();
        $shopdetails = Setting::first();
        return view('sales.invoiceSales',compact('content','customer','shopdetails'));
    }
//order store.................................
    public function storeSales(Request $request)
    {
        $data = [
            'customer_id'=>$request->customer_id,
            'order_no'=>$request->order_no,
            'order_date'=>$request->order_date,
            'total_product'=>$request->total_product,
            'sub_total'=>$request->sub_total,
            'tax'=>$request->tax,
            'total'=>$request->total,
            'payment_type'=>$request->payment_type,
            'pay'=>$request->pay,
            'due'=>$request->due,
        ];
        $order_id = Order::insertGetId($data);
        $contents = Cart::content();
        $pdata = array();
        foreach($contents as $content)
        {
            $pdata['order_id']=$order_id;
            $pdata['product_id']=$content->id;
            $pdata['quantity']=$content->qty;
            $pdata['unit_cost']=$content->price;
            $pdata['total']=$content->total;
            $pdata['order_date']=$request->order_date;
            $pdata['description']=$content->options->description;

            $product = Product::where('id', $content->id)->select('buyPrice')->first();
            $total_buy_price = $product->buyPrice*$content->qty;

            $total_sel_price = $content->price*$content->qty;

            $pdata['profit'] = $total_sel_price-$total_buy_price;
            $orderDetail_id = OrderDetails::insertGetId($pdata);
        }
        
        foreach($contents as $content){
            $qdata = [
                'product_id'=>$content->id,
                'quantity'=>$content->qty,
            ];
            $check = Stock::where('product_id', $content->id)->first();

            if($check){
                $decrement = Stock::find($check->id)->decrement('quantity', $content->qty);
            }
    }
    Cart::destroy();
            $notification = array(
                'message'=>'Sales Successfull !',
                'alert-type'=>'success',
            );
            return Redirect()->route('create.sales')->with($notification);
}
//sales Success list................................
    public function success(){
        $order = DB::table('orders')
                ->join('customers', 'orders.customer_id','customers.id')
                ->where('status', 'Success')
                ->select('orders.*', 'customers.name')
                ->orderBy('id','desc')
                ->get();
        // $order = Order::with('customer')->where('status', 'success')->get();
        return view('sales.salesSuccess',compact('order'));
    }
//sales Success history....................................
    public function salesSuccessHistor($id)
    {
        $order = DB::table('orders')
                ->join('customers','orders.customer_id', 'customers.id')
                ->where('orders.id', $id)
                ->first();
        
        $orderDetails =OrderDetails::where('order_id',$id)->with('product')->get();
        $shopdetails = Setting::first();
        
        return view('sales.salesSuccessHistor', compact('order','orderDetails','shopdetails'));
    }

}
