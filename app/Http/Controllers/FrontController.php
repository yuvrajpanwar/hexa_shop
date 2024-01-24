<?php

namespace App\Http\Controllers;

use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Wishlist;
use App\Models\Background;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class FrontController extends Controller
{
    public function home(Request $request)
    {
        $backgrounds = Background::all();
        $recent_products = Product::with('images')->where('is_deleted', 'no')->where('is_enabled', 'yes')->orderBy('id', 'DESC')->limit(8)->get();
        $popular_products = Product::with('images')->where('is_deleted', 'no')->where('is_enabled', 'yes')->orderBy('views', 'DESC')->limit(8)->get();

        return view('customer.home', compact('backgrounds', 'recent_products', 'popular_products'));
    }

    public function category(Category $category, Request $request)
    {
        $products = Product::with('images')
            ->where('category_id', $category->id)
            ->where('is_deleted', 'no')
            ->where('is_enabled', 'yes')
            ->paginate(3);

        if ($request->ajax()) {
            $view =  view('customer.data', compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        return view('customer.category', compact(['category', 'products']));
    }

    public function product($product_id)
    {
        $product = Product::with('images', 'category')->where('id', $product_id)->first();
        $product->views = $product->views + 1;
        $product->save();
        return view('customer.product', compact('product'));
    }

    public function cart(Request $request)
    {
        if ($request->session()->has('FRONT_USER_ID')) {
            $user_id = $request->session()->get('FRONT_USER_ID');
        } else {
            $user_id = get_user_temp_id($request);
        }

        $cart_products = Cart::where('user_id', $user_id)->with('product.images')->get();

        // return ($cart_products);








        $grand_total = 0;
        foreach ($cart_products as $item) {
            $grand_total += $item->product->price * $item->quantity;
        }


        return view('customer.cart', compact('cart_products', 'grand_total'));
    }

    public function checkout(Request $request)
    {
        if ($request->session()->has('FRONT_USER_ID')) {
            $user_id = $request->session()->get('FRONT_USER_ID');
        } else {
            $user_id = get_user_temp_id($request);
        }

        $cart_products = Cart::where('user_id', $user_id)->with('product.images')->get();
        return view('customer.checkout', compact('cart_products'));
    }

    public function add_to_cart(Request $request)
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

        $exist = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();
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

        $total_cart_products = Cart::where('user_id', $user_id)->count();

        return response()->json(['message' => $message, 'total_cart_products' => $total_cart_products], 201);
    }

    public function remove_cart_product(Request $request)
    {
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');
        Cart::where('user_id', $user_id)->where('product_id', $product_id)->delete();

        $cart_products = Cart::where('user_id', $user_id)->with('product.images')->get();
        $total_cart_products = count($cart_products);

        $grand_total = 0;
        foreach ($cart_products as $item) {
            $grand_total += $item->product->price * $item->quantity;
        }

        return response()->json(['message' => 'Product removed successfully', 'total_cart_products' => $total_cart_products, 'grand_total' => $grand_total]);
    }

    public function update_quantity(Request $request)
    {
        $item_id = $request->input('item_id');
        $item = Cart::where('id', $item_id)->first();
        $item->quantity = $request->input('quantity');
        $item->save();

        $cart_products = Cart::where('user_id', $item->user_id)->with('product.images')->get();
        $grand_total = 0;
        foreach ($cart_products as $item) {
            $grand_total += $item->product->price * $item->quantity;
        }

        return response()->json(['message' => 'Cart updated successfully', 'grand_total' => $grand_total]);
    }

    public function place_order(Request $request)
    {

        $request->validate(
            [
                'name_in_order' => 'required',
                'email_in_order' => 'required|email',
                'phone_in_order' => 'required',
                'address_in_order' => 'required',
            ],
            [
                'name_in_order.required' => 'The name field is required.',
                'email_in_order.required' => 'The email field is required.',
                'email_in_order.email' => 'Please enter a valid email address.',
                'phone_in_order.required' => 'The phone field is required.',
                'address_in_order.required' => 'The address field is required.',
            ]
        );

        //cart products and total amount
        if ($request->session()->has('FRONT_USER_ID')) {
            $user_id = $request->session()->get('FRONT_USER_ID');
        } else {
            $user_id = get_user_temp_id($request);
        }
        $cart_products = Cart::where('user_id', $user_id)->with('product.images')->get();
        $total_amount = 0;
        foreach ($cart_products as $item) {
            $total_amount += $item->product->price * $item->quantity;
        }

        $customer = Customer::where('id', $user_id)->first();
        if (!$customer) {
            $email_exists =  Customer::where('email', $request->email_in_order)->first();
            $phone_exists =  Customer::where('phone', $request->phone_in_order)->first();
            if ($email_exists) {
                return redirect()->back()->with(['error' => 'There is already an account with this email. Please login to continue'])->withInput();
            }
            if ($phone_exists) {
                return redirect()->back()->with(['error' => 'There is already an account with this phone number. Please login to continue'])->withInput();
            }
            //register user
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $password = substr(str_shuffle($characters), 0, 5);
            $customer = Customer::Create([
                'name' => $request->name_in_order,
                'email' => $request->email_in_order,
                'phone' => $request->phone_in_order,
                'address' => $request->address_in_order,
                'password' =>  Hash::make($password),
            ]);
            //login user and send password in mail, set FRONT_USER_ID
            Auth::guard('customer')->loginUsingId($customer->id);
            session()->put('FRONT_USER_ID', $customer->id);
            //send mail with password
            $data = ['new_customer' => $customer, 'password' => $password];
            $my_config = ['to_address' => $request->email_in_order];
            try {
                Mail::send('password_mail', $data, function ($message) use ($my_config) {
                    $message->to($my_config['to_address']);
                    $message->subject('Order Placed');
                });
            } catch (\Exception $e) {
                Log::error('Email sending failed: ' . $e->getMessage());
            }
            //save order and order details
            //move cart Products form Cart to Orders,OrderDetails//wishlist products get associated with new registred
            $user_temp_id = get_user_temp_id();
            Wishlist::where('user_id', $user_temp_id)->update(['user_id' => $customer->id, 'user_type' => 'registered']);
        }

        $order = Order::Create([
            'customer_id' => $customer->id,
            'name' => $request->name_in_order,
            'email' => $request->email_in_order,
            'phone' => $request->phone_in_order,
            'address' => $request->address_in_order,
            'special_notes' => $request->special_notes,
            'payment_method' => $request->payment_method,
            'total_amount' => $total_amount
        ]);
        $records = [];
        foreach ($cart_products as $key => $value) {
            $records[] = [
                'order_id' => $order->id,
                'product_id' => $value->product_id,
                'price' => $value->product->price,
                'quantity' => $value->quantity,
                'total' => $value->product->price * $value->quantity
            ];
        }
        OrderDetail::insert($records);
        Cart::where('user_id', $user_id)->with('product.images')->delete();

        $razorpay_order_id = null;
        if ($request->payment_method == 'gateway') {
            try {
                $api = new Api("rzp_test_bAPAKRSUq6ieTG", "UK4WVL18S4FlEGx3A6HyTMuW");
                $razorpay_order = $api->order->create(array(
                    "amount" => $total_amount * 100,
                    "currency" => "INR",
                ));
                $razorpay_order_id = $razorpay_order['id'];
            } 
            catch (\Exception $e) {
                Log::error('Razorpay API Error: ' . $e->getMessage());
            }
            return redirect(route('make_payment'))->with(['razorpay_order_id' => $razorpay_order_id, 'customer' => $customer,'order_id' => $order->id]);
        } 
        else 
        {
            return redirect(route('order_placed'));
        }
    }
}
