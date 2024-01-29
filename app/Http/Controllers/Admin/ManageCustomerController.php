<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManageCustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function customers()
    {
        $customers = Customer::all();
        return view('auth\customers',compact('customers'));
    }

    public function edit_customer(Customer $customer)
    {
        return view('auth.update_customer',compact('customer'));
    }

    public function update_customer(Customer $customer , Request $request)
    {
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        if($request->password)
        {
            $customer->password = Hash::make($request->password);
        }

        $customer->save();
        return redirect(route('customers'))->with('success','Customer details updated successfully !');
    }

}
