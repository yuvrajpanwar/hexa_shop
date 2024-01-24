<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{

    public function wishlist(Request $request)
    {
        if ($request->session()->has('FRONT_USER_ID')) {
            $user_id = $request->session()->get('FRONT_USER_ID');
        } else {
            $user_id = get_user_temp_id($request);
        }

        // $wishlist_products = Wishlist::where('user_id', $user_id)->with('product.images')->get();

        $wishlist_products = Wishlist::leftJoin('cart', function ($join) {
            $join->on('wishlist.product_id', '=', 'cart.product_id')
                ->on('wishlist.user_id', '=', 'cart.user_id');
        })
            ->select('wishlist.*', 'cart.quantity')
            ->with('product.images')
            ->where('wishlist.user_id', $user_id)
            ->get();

        return view('customer.wishlist', compact('wishlist_products'));
    }

    public function add_to_wishlist(Request $request)
    {
        $product_id = $request->product_id;
        if ($request->session()->has('FRONT_USER_ID')) {
            $user_type = 'registered';
            $user_id = $request->session()->get('FRONT_USER_ID');
        } else {
            $user_type = 'not-registered';
            $user_id = get_user_temp_id($request);
        }

        $validatedData = $request->validate([
            'product_id' => 'required|numeric'
        ]);

        $exist = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if (!$exist) {
            $newItem = Wishlist::create(
                [
                    'product_id' => $product_id,
                    'user_id' => $user_id,
                    'user_type' => $user_type
                ]
            );
            $message = 'Product added to wishlist successfully';
        } else {
            $message = 'Product already in wishlist';
        }

        $total_wishlist_products = Wishlist::where('user_id', $user_id)->count();

        return response()->json(['message' => $message, 'total_wishlist_products' => $total_wishlist_products], 201);
    }

    public function remove_wishlist_product(Request $request)
    {
        if ($request->session()->has('FRONT_USER_ID')) {
            $user_id = $request->session()->get('FRONT_USER_ID');
        } else {
            $user_id = get_user_temp_id($request);
        }

        Wishlist::where('id', $request->input('item_id'))->delete();

        $wishlist_products = Wishlist::where('user_id', $user_id)->with('product.images')->get();
        $total_wishlist_products = count($wishlist_products);

        return response()->json(['message' => 'Product removed successfully', 'total_wishlist_products' => $total_wishlist_products]);
    }
}
