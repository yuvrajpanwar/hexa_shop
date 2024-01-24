<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use Illuminate\Http\Request;

class MyOrdersController extends Controller
{
    public function make_payment()
    {
        return view('customer.make_payment');
    }

    public function update_payment_status(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();
        if ($order) {
            $order->razorpay_order_id = $request->razorpay_order_id;
            $order->razorpay_payment_id = $request->razorpay_payment_id;
            $order->razorpay_signature = $request->razorpay_signature;
            $order->payment_method = 'gateway';
            $order->payment_status = 'paid';
            $order->save();
            return response()->json(['message' => 'Payment status updated successfully']);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }

    public function order_placed()
    {
        return view('customer.order_placed');
    }

    public function my_orders(Request $request)
    {
        $user_id = $request->session()->get('FRONT_USER_ID');
        $orders = Order::with('OrderDetail.product')->where('customer_id', $user_id)->orderbY('id','DESC')->get();
        return view('customer.my_orders', compact('orders'));
    }

    public function pay_now(Request $request)
    {
        $order = Order::where('id',$request->id)->first();
        $user_id = $request->session()->get('FRONT_USER_ID');
        $customer = Customer::where('id',$user_id)->first();
        if(!$order){
            return redirect()->back()->with('error','Oops! Something went wrong.');
        }
        $total_amount = $order->total_amount;
        try {
            $api = new Api("rzp_test_bAPAKRSUq6ieTG", "UK4WVL18S4FlEGx3A6HyTMuW");
            $razorpay_order = $api->order->create(array(
                "amount" => $total_amount * 100,
                "currency" => "INR",
            ));
            $razorpay_order_id = $razorpay_order['id'];
        } catch (\Exception $e) {
            Log::error('Razorpay API Error: ' . $e->getMessage());
            return redirect()->back()->with('error','Oops! Something went wrong. Try again.');

        }
        return redirect(route('make_payment'))->with(['razorpay_order_id' => $razorpay_order_id, 'customer' => $customer, 'order_id' => $order->id]);
    }

    public function payment_successful(){
        return view('customer.payment_successful');
    }

}
