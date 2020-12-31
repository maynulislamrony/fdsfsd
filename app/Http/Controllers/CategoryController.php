<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.createCategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_name'=>'required',
        ],[
            'cat_name.required'=>'Category name is empty.',
        ]);

        $data = [
            'cat_name'=>$request->cat_name,
            'description'=>$request->description,
        ];
        $category = Category::create($data);
        try{
            if($category){
                $notification = array(
                    'message'=>'Successfully Category Inserted',
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

    public function index()
    {
        $category = Category::select('cat_name','id')->get();
        return view('category.allCategory', compact('category'));
    }

    public function view($id)
    {
        $viewCategory = Category::find($id);
        return view('category.viewCategory', compact('viewCategory'));
    }

    public function destroy(Request $request)
    {
        $deleteCategory = Category::find($request->id);
        $delete = $deleteCategory->delete();
        if($delete){
            $notification = array(
                'message'=>'Data Deleted Succesxfull !',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {  
        $editCategory = Category::find($id);
        return view('category.editCategory', compact('editCategory'));
    }

    public function update(Request $request, $id)
    {
        $updateCategory = Category::find($id);

        $data = [
            'cat_name'=>$request->cat_name,
            'description'=>$request->description,
        ];
        $update = $updateCategory->update($data);
        try{
            if($update){
                $notification = array(
                    'message'=>'Data Update Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->route('index.category')->with($notification);
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
