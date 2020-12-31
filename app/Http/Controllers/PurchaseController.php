<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\purchaseDetails;
use App\Models\Stock;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class PurchaseController extends Controller
{
    public function create()
    {

        return view('purchase.createPurchase',[
            'product'=>Product::with('category')->get(),
            'supplier'=>Supplier::select('sup_name', 'id')->get(),
        ]);
    }

    public function detail(){
        $purchase = Purchase::with('supplier')->orderBy('id', 'desc')->get();
        return view('purchase.purchaseSuccess',compact('purchase'));
    }

    public function addCart(Request $request){

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
    
    }
    public function cartUpdate2(Request $request, $rowId ){
        $cartUpdate = $request->qty;
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
    }
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

    public function invoicePurchase(Request $request)
    {
        $request->validate([
            'sup_id'=>'required',
        ],[
            'sup_id.required'=>'Select A Supplier First',
        ]);
        $id = $request->sup_id;
        $supplier = Supplier::where('id',$id)->first();
        $content = Cart::content();
        $shopdetails = Setting::first();
        return view('purchase.invoicePurchase',compact('content','supplier','shopdetails'));
    }

    public function storePurchase(Request $request)
    {
        $data = [
            'supplier_id'=>$request->supplier_id,
            'purchase_no'=>$request->purchase_no,
            'purchase_date'=>$request->purchase_date,
            'total_product'=>$request->total_product,
            'sub_total'=>$request->sub_total,
            'tax'=>$request->tax,
            'total'=>$request->total,
            'payment_type'=>$request->payment_type,
            'pay'=>$request->pay,
            'due'=>$request->due,
        ];
        $purchase_id = Purchase::insertGetId($data);
        $contents = Cart::content();
        $pdata = array();
        foreach($contents as $content)
        {
            $pdata['purchase_id']=$purchase_id;
            $pdata['product_id']=$content->id;
            $pdata['quantity']=$content->qty;
            $pdata['unit_cost']=$content->price;
            $pdata['total']=$content->total;
            $pdata['purchase_date']=$request->purchase_date;
            $pdata['description']=$content->options->description;

          
            $purchasedetail_id = purchaseDetails::insertGetId($pdata);
            
        }
        
        foreach($contents as $content){
            $qdata = [
                'purchase_id'=>$purchase_id,
                'purchasedetail_id'=>$purchasedetail_id,
                'product_id'=>$content->id,
                'quantity'=>$content->qty,
            ];
            $check = Stock::where('product_id', $content->id)->first();
            if($check){
                $increment = Stock::find($check->id)->increment('quantity', $content->qty);
            }else{
                $success = Stock::insert($qdata);
            }
            
        }
        Cart::destroy();
        $notification = array(
            'message'=>'Product Purchase Successfull',
            'alert-type'=>'success',
        );
        return redirect()->route('create.purchase')->with($notification);
        
    }

    public function purchaseHistory($id)
    {
        $purchase = DB::table('purchases')
                ->join('suppliers','purchases.supplier_id', 'suppliers.id')
                ->where('purchases.id', $id)
                ->first();
        
        $purchaseDetails =purchaseDetails::where('purchase_id',$id)->with('product')->get();

        $shopdetails = Setting::first();
        
        return view('purchase.purchaseHistory', compact('purchase','purchaseDetails','shopdetails'));
        
    }
}
