<?php
  
namespace App\Http\Controllers;
  
use Exception;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
  
class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {        
        return view('razorpayView');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_order_id(Request $request)
    {
        // rzp_test_bAPAKRSUq6ieTG
        // UK4WVL18S4FlEGx3A6HyTMuW
  
        $api = new Api("rzp_test_bAPAKRSUq6ieTG", "UK4WVL18S4FlEGx3A6HyTMuW");
        $order = $api->order->create(array( 
        'amount' => 100, 
        'currency' => 'INR', 
        'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
        $razorpay_order_id = $order['id'];
        dd($order);





        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}