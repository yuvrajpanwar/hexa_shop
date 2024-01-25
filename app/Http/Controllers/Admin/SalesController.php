<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;

class SalesController extends Controller
{
    public function sales()
    {
        $categories = Category::select('name')->get();
        $category_sale = [];
        foreach ($categories as $key => $category) {
            $category_sale[$category->name] = OrderDetail::select('total')->with('product.category')
            ->whereHas('product.category', function ($query) use ($category) {
                $query->where('name', $category->name);
            })
            ->sum('total');
        }
        // return $category_sale;
        return view('auth/sales',compact('categories','category_sale'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
