<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Auth/dashboard');
    }

    public function sales()
    {
        return view('auth/sales');
    }



    public function product_list()
    {
        $products = Product::with('category')->orderBy('id','DESC')->get();
        return view('auth/product_list', ['products' => $products]);
    }

    public function add_product(Product $product, Category $category)
    {
        $categories = $category->where('status','Enabled')->get();
        return view('auth/add_product', ['categories' => $categories]);
    }

    public function destroy_product(Request $request, Product $product)
    {
        $product = Product::find($request->id);
        $product->delete();
        return redirect()->route('product_list')->with('success', 'Product deleted successfully!');
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'size' => 'required',
            'price' => 'required|integer|min:0',
            'category' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|in:sold,available',
        ]);

        $new_product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'size' => $request->size,
            'price' => $request->price,
            'category_id' => $request->category,
            'status' => $request->status
        ]);

        return redirect()->route('add_product')->with('success', 'Product added successfully!');
    }

    public function edit_product_details(Request $request, Product $product, Category $category)
    {
        $categories = $category->where('status','Enabled')->get();
        return view('auth/update_product', ['product' => $product, 'categories' => $categories]);
    }

    public function update_product(Request $request, Product $product)
    {

        $product = Product::find($request->id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'size' => $request->size,
            'price' => $request->price,
            'category_id' => $request->category,
            'status' => $request->status,
            // 'image' => $request->image ?? $product->image
        ]);
        return redirect()->route('product_list')->with('success', 'Product updated successfully!!');
    }

    public function customers()
    {
        return view('auth/customers');
    }

    public function private()
    {
        if (Gate::allows('is_super_admin', auth()->user())) {
            return view('private');
        } else {
            abort(403);
        }
    }



    //only for super admin
    public function admin_list(User $user)
    {

        // $users = $user->all(); 
        $users = $user->with('roles')->get();

        if (Gate::allows('is_super_admin', auth()->user())) {
            return view('auth/admin_list', ['users' => $users]);
        } else {
            abort(403);
        }
    }

    //only for super admin
    public function add_admin(User $user)
    {

        if (Gate::allows('is_super_admin', auth()->user())) {

            $roles = Role::all();
            return view('auth/add_admin', compact('roles'));
        } else {
            abort(403);
        }
    }

    //only for super admin
    public function store_admin(Request $request, User $user)
    {

        if (Gate::allows('is_super_admin', auth()->user())) {

            $request->validate([
                'name' => 'required|min:3',
                'password' => 'required|min:3|confirmed',
                'role' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->where(function ($query) {
                    }),
                ],
            ]);

            $new_user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $role = Role::where('name', $request->role)->first();
            if ($role != null) {
                $new_user->assignRole($role);
            }

            return redirect()->route('add_admin')->with('success', 'User added successfully!');
        } else {
            abort(403);
        }
    }

    // only for super admin
    public function destroy(Request $request, User $user)
    {

        if (Gate::allows('is_super_admin', auth()->user())) {
            $user = User::find($request->id);
            $user->delete();
            return redirect()->route('admin_list')->with('success', 'Admin deleted successfully!');
        } else {
            abort(403);
        }
    }

    public function edit_admin_details(Request $request, User $user)
    {
        if (Gate::allows('is_super_admin', auth()->user())) {
            $roles = Role::all();
            $user_current_role = $user->getRoleNames()->first();
            return view('auth/update_admin', ['user' => $user, 'roles' => $roles, 'user_current_role' => $user_current_role]);
        } else {
            abort(403);
        }
    }

    // only for super admin
    public function update_admin(Request $request, User $user)
    {
        if (Gate::allows('is_super_admin', auth()->user())) {
            $user = User::find($request->id);
            if ($request->password != null) {
                $request->validate([
                    'name' => 'required|min:3',
                    'password' => 'required|min:8|confirmed',
                    'email' => [
                        'required',
                        'email',
                    ],
                ]);
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'admin_type' => ($request->admin_type) ?? 'super_admin'
                ]);
            }
            else{
                $request->validate([
                    'name' => 'required|min:3',
                    'email' => [
                        'required',
                        'email',
                    ],
                ]);
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'admin_type' => ($request->admin_type) ?? 'super_admin'
                ]);
            }

            return redirect()->route('admin_list')->with('success', 'Admin updated successfully!');
        } else {
            abort(403);
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/login')->with('success', 'Logout Successfully !');
    }
}
