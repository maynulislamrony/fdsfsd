<?php

namespace App\Http\Controllers;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class ProductController extends Controller
{
    public function create()
    {
        $category = Category::all();
        $supplier = Supplier::all();
        return view('product.createProduct', compact('category', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'cat_id'=>'required',
            'code'=>'required|numeric',
            'buyPrice'=>'required|numeric',
            'selPrice'=>'required|numeric',
        ],[
            'name.required'=>'Product name is empty.',
            'cat_id.required'=>'Category name not selected.',
            'code.required'=>'Product code is empty.',
            'buyPrice.required'=>'Buying price is empty.',
            'selPrice.required'=>'Selling price is empty.',
        ]);

        $data = [
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
            'code'=>$request->code,
            'buyDate'=>$request->buyDate,
            'expireDate'=>$request->expireDate,
            'buyPrice'=>$request->buyPrice,
            'selPrice'=>$request->selPrice,
            'description'=>$request->description,
        ];
        $img =$request-> file('photo');
        if($img){
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $product = Product::create($data);
            try{
                if($product){
                    $notification = array(
                        'message'=>'Product Added Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $product = Product::create($data);
            try{
                if($product){
                    $notification = array(
                        'message'=>'Product Added Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

    public function index()
    {
        $product = Product::with('category')->get();
        return view('product.allProduct', compact('product'));
    }

    public function view($id)
    {
        $viewProduct = DB::table('products')
                        ->join('categories', 'products.cat_id', 'categories.id')
                        ->select('categories.cat_name', 'products.*')
                        ->where('products.id',$id)->first();
        return view('product.viewProduct', compact('viewProduct'));
    }

    public function destroy(Request $request)
    {
        $deleteProduct = Product::find($request->id);
        $delete = $deleteProduct->delete();
        if($delete){
            $notification = array(
                'message'=>'Data Deleted Successfull !',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $editProduct = Product::find($id);
        $category = Category::all();
        $supplier = Supplier::all();
        return view('product.editProduct', compact('editProduct','category','supplier'));
    }

    public function update(Request $request, $id)
    {
        $updateProduct = Product::find($id);
        $oldphoto = $updateProduct->photo;

        $data = [
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
            'code'=>$request->code,
            'buyDate'=>$request->buyDate,
            'expireDate'=>$request->expireDate,
            'buyPrice'=>$request->buyPrice,
            'selPrice'=>$request->selPrice,
            'description'=>$request->description,
        ];
        $img =$request-> file('photo');
        if($img){
            @unlink($oldphoto);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $update = $updateProduct->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.product')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $update = $updateProduct->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.product')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
        
    }

    public function productImport()
    {
        return view('product.productImport');
    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import(Request $request) 
    {
        $request->validate([
            'product_import'=>'required',
        ]);
        $success = Excel::import(new ProductsImport, $request->file('product_import'));
        try{
            if($success){
                $notification = array(
                    'message'=>'Product insert Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->back()->with($notification);
            }
        }catch(Throwable $exception){
            $notification = array(
                'message'=>'Something is Wrong!',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
        
    }
}
