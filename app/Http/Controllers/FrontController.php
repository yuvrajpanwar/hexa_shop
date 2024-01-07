<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function home(Request $request)
    {
        $backgrounds = Background::all();
        $recent_products = Product::with('images')->where('is_deleted', 'no')->where('is_enabled', 'yes')->orderBy('id', 'DESC')->limit(8)->get();
        $popular_products = Product::with('images')->where('is_deleted', 'no')->where('is_enabled', 'yes')->orderBy('views', 'DESC')->limit(8)->get();

        return view('customer.home', compact('backgrounds', 'recent_products', 'popular_products'));
    }

    public function category(Category $category,Request $request)
    {
        dd(Auth::user()->email);
        $products = Product::with('images')
            ->where('category_id', $category->id)
            ->where('is_deleted', 'no')
            ->where('is_enabled', 'yes')
            ->paginate(3);

        if($request->ajax())
        {
            $view =  view('customer.data',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('customer.category', compact(['category', 'products']));
    }

    public function product($product_id)
    {
        $product = Product::with('images','category')->where('id',$product_id)->first();
        $product->views = $product->views + 1 ;
        $product->save();
        return view('customer.product',compact('product'));
    }

    public function add_to_cart(Request $request)
    {
        $product_id = $request->product_id;
        if($request->session()->has('FRONT_USER_ID')){
            $user_type = 'registered';
            $user_id = $request->session()->get('FRONT_USER_ID');
        }
        else{
            $user_type = 'not-registered';
            $user_id = get_user_temp_id($request);
        }

        $validatedData = $request->validate([
            'product_id' => 'required|numeric'
        ]);

        $exist = Cart::where('user_id', $user_id)->where('product_id',$product_id)->first();
        if (!$exist) {
            $newCart = Cart::create(
                [
                    'product_id' => $product_id,
                    'user_id' => $user_id,
                    'user_type' => $user_type
                ]
            );
            $message = 'Product added to cart successfully';
        } else {
            $message = 'Product already in cart';
        }

        $total_cart_products = Cart::where('user_id',$user_id)->count();

        return response()->json(['message' => $message, 'total_cart_products'=>$total_cart_products ], 201);
    }

    public function cart(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $user_id = $request->session()->get('FRONT_USER_LOGIN');
        }
        else{
            $user_id = get_user_temp_id($request);
        }

        $cart_products = Cart::where('user_id',$user_id)->with('product.images')->get();
        
        $grand_total=0;
        foreach ($cart_products as $item) {
            $grand_total += $item->product->price * $item->quantity;
        }


        return view('customer.cart',compact('cart_products','grand_total'));
    }

    public function remove_cart_product(Request $request)
    {
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');
        Cart::where('user_id', $user_id)->where('product_id', $product_id)->delete();

        $cart_products = Cart::where('user_id',$user_id)->with('product.images')->get();
        $total_cart_products = count($cart_products);
        
        $grand_total=0;
        foreach ($cart_products as $item) {
            $grand_total += $item->product->price * $item->quantity;
        }

        return response()->json(['message' => 'Product removed successfully','total_cart_products'=>$total_cart_products,'grand_total'=>$grand_total]);
    }

    public function update_quantity(Request $request)
    {
        $item_id = $request->input('item_id');
        $item = Cart::where('id', $item_id)->first();
        $item->quantity = $request->input('quantity');
        $item->save();

        $cart_products = Cart::where('user_id',$item->user_id)->with('product.images')->get();
        $grand_total=0;
        foreach ($cart_products as $item) {
            $grand_total += $item->product->price * $item->quantity;
        }

        return response()->json(['message' => 'Cart updated successfully','grand_total'=>$grand_total]);
    }

}
