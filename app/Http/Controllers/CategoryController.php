<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function categories()
    {
        $categories = Category::All();
        return view('auth.categories',compact('categories'));
    }

    public function add_category()
    {
        return view('auth.add_category');
    }

    public function store_category(Request $request)
    {
        $category = Category::create(
            [
                'name'=>$request->name,
                'status'=>$request->status
            ]
        );
        return redirect(route('add_category'))->with('success', 'Category added successfully!');
    }

    public function destroy_category(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('categories')->with('success', 'category deleted successfully!');
    }

    public function edit_category(Category $category)
    {
        return view('auth.edit_category',compact('category'));
    }

    public function update_category(Category $category , Request $request)
    {
        $category->name=$request->name;
        $category->status=$request->status;
        $category->save();
        return redirect(route('categories'))->with('success','Category has been updated !');
    }

}
