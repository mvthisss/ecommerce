<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addCategory() {
        return view('admin.addcategory');
    }
    public function postAddCategory(Request $request) {
        $category=new Category();
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('success','Category added successfully');
    }
        public function viewCategory() {
        $categories=Category::all();
        return view('admin.viewcategory',compact('categories')); 
    }
 public function deleteCategory($id) {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }
 public function updateCategory($id){
        $category=Category::findOrFail($id);
        return view('admin.updatecategory',compact('category'));
 }
  public function postUpdateCategory(Request $request, $id){
        $category=Category::findOrFail($id);
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('update_success','Category updated successfully');

  }
  public function addProduct() {
    $categories=Category::all();
      return view('admin.addproduct',compact('categories'));
  }
    public function postAddProduct(Request $request) {
        // dd($request->all());
        $product=new Product();
        $product->product_title=$request->product_title;
        $product->description=$request->description;
        $product->product_price=$request->product_price;
        $product->product_quantity=$request->product_quantity;

        $image=$request->file('product_image');
        if($image){
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->product_image->move(public_path('product_images'),$imageName);
            $product->product_image=$imageName;
            $product->save();
        }

        $product->product_category=$request->product_category;
        $product->save();

        if($image && $product->save()){
            $product->product_image->move('products',$image);
        }

        return redirect()->back()->with('product_message','Product added successfully');
        }
    
    }
