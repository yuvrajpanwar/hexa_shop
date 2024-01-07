<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:customer'); 
    }

    // public function customer_logout()
    // {

    //     Auth::guard('customer')->logout();

    //     return redirect('/customer_login')->with('success', 'Logout Successfully !');
    // }

    public function profile(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        return view('customer.profile', compact('customer'));
    }

    public function update_details(Request $request)
    {
        $customer = Customer::where('id', Auth::guard('customer')->user()->id);
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'password' => 'nullable|string|min:5|max:20|confirmed',
                'address' => 'required',
                // 'phone' => 'required',
                // 'email' => 'required|string|email|max:255',
            ],
            [
                "password.confirmed" => "Confirm password does not match."
            ]
        );

        $customer->update([
            'name' => $request->name,
            'address' => $request->address,
            // 'email' => $request->email,
            // 'phone' => $request->phone,
        ]);
        if ($request->password) {
            $customer->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->back()->with('message', 'Details updated successfully.');
    }
}
