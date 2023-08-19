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

    public function product_list(Product $product)
    {
        $products = $product->all();
        return view('auth/product_list',['products'=>$products]);
    }

    public function add_product(Product $product,Category $category)
    { 
        $categories = $category->all(); 
        return view('auth/add_product',['categories'=>$categories]);
    }

    public function destroy_product(Request $request, Product $product)
    {
        $product = Product::find($request->id);
        $product->delete();
        return redirect()->route('product_list')->with('success', 'Product deleted successfully!');
    }

    public function store_product(Request $request, Product $product )
    {
            $request->validate([
                'title' => 'required|min:3',
                'description' => 'required|min:5',
                'size' => 'required',
                'price' => 'required|integer|min:0',
                'category' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'status' => 'required|in:sold,available',
            ]);

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            
            try {
                // File upload code
                $image->storeAs('product_images', $image_name, 'public');
            } catch (\Exception $e) {
                // Log the error
                Log::error('File upload error: ' . $e->getMessage());
                
                // Redirect with an error message
                return redirect()->route('add_product')->with('error', 'An error occurred while uploading the image.');
            }
            


            $new_product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'size' => $request->size,
                'price' => $request->price,
                'category' => $request->category,
                'image' => $image_name,
                'status' => $request->status
            ]);
            
            return redirect()->route('add_product')->with('success', 'Product added successfully!');
         
    }

    public function edit_product_details(Request $request, Product $product, Category $category)
    {
        $categories = $category->all();
        return view('auth/update_product', ['product' => $product, 'categories'=>$categories]);
    }

    public function update_product(Request $request, Product $product )
    {

       


            $product = Product::find($request->id);

        

            // $request->validate([
            //     'name' => 'required|min:3',
            //     'password' => 'required|min:3|confirmed',
            //     'admin_type' => 'required',
            //     'email' => [
            //         'required',
            //         'email',
            //     ],
            // ]);

            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'size' => $request->size,
                'price' => $request->price,
                'category' => $request->category,
                'status' => $request->status,
                'image' => $request->image ?? $product->image       
            ]);
            
            return redirect()->route('product_list')->with('success', 'Product updated successfully!');  

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

    // only for super admin
    public function destroy(Request $request, User $user )
    {

        if(Gate::allows('is_super_admin',auth()->user())){
            $user = User::find($request->id);
            $user->delete();
            return redirect()->route('admin_list')->with('success', 'Admin deleted successfully!');
        }
        else
        {
            abort(403);
        }  

    }

    // only for super admin
    public function update_admin(Request $request, User $user )
    {

        if(Gate::allows('is_super_admin',auth()->user())){


            $user = User::find($request->id);

        

            $request->validate([
                'name' => 'required|min:3',
                'password' => 'required|min:3|confirmed',
                'admin_type' => 'required',
                'email' => [
                    'required',
                    'email',
                ],
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'admin_type' => $request->admin_type
            ]);
            
            return redirect()->route('admin_list')->with('success', 'Admin updated successfully!');
        }
        else
        {
            abort(403);
        }  

    }

    public function edit_admin_details(Request $request, User $user)
    {
        if (Gate::allows('is_super_admin', auth()->user())) {
            return view('auth/update_admin', ['user' => $user]);
        } else {
            abort(403);
        }
    }

    // public function logout()
    // {
    //     Session::flush(); 
        
    //     return redirect('/login')->with('success','Logout Successfully !'); 
    // }

    public function logout()
    {
        Auth::guard('web')->logout();
        
        return redirect('/login')->with('success', 'Logout Successfully !');
    }
  
}
