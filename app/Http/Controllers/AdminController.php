<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    }
