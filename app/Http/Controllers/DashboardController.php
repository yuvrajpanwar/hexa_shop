<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Auth/dashboard');
    }

    public function sales()
    {
        return view('auth/sales');
    }

    public function orders()
    {
        return view('auth/orders');
    }

    public function products()
    {
        return view('auth/products');
    }

    public function customers()
    {
        return view('auth/customers');
    }

    public function private()
    {
        if(Gate::allows('is_super_admin',auth()->user())){
            return view('private');
        }
        else
        {
            abort(403);
        }     
    }



    //only for super admin
    public function admin_list(User $user)
    {

        $users = $user->all(); //fetch all users from DB

        if(Gate::allows('is_super_admin',auth()->user())){
            return view('auth/admin_list',['users'=>$users]);

        }
        else
        {
            abort(403);
        }  

    }

    //only for super admin
    public function add_admin(User $user)
    {

        if(Gate::allows('is_super_admin',auth()->user())){
            return view('auth/add_admin');

        }
        else
        {
            abort(403);
        }  

    }

    //only for super admin
    public function store_admin(Request $request, User $user )
    {

        if(Gate::allows('is_super_admin',auth()->user())){


            $request->validate([
                'name' => 'required|min:3',
                'password' => 'required|min:3|confirmed',
                'admin_type' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->where(function ($query) {
                    }),
                ],
            ]);

            $newAdmin = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'admin_type' => $request->admin_type
            ]);
            
            return redirect()->route('add_admin')->with('success', 'Admin added successfully!');
        }
        else
        {
            abort(403);
        }  

    }


    

}
