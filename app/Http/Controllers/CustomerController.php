<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:customer'); 
    }


    public function login_signup()
    {
        return view('login_signup');
    }

    public function signup()
    {
        return view('customer_signup');
    }

    public function store_customer(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:8|confirmed',  
            'address' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => [
                'required',
                'email',
                Rule::unique('customers')->where(function ($query) use ($request) {
                    // Check if the email is unique except for the current user's email (if editing)
                    if ($request->has('id')) {
                        $query->where('id', '!=', $request->input('id'));
                    }
                }),
            ],
        ]);
   
        $newCustomer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('customer_login')->with('success', 'Account Created successfully! Please log in.');
    }

    public function customer_logout()
    {

        Auth::guard('customer')->logout();
        
        return redirect('/customer_login')->with('success', 'Logout Successfully !');
    }


}
