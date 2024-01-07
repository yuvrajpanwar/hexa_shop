<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function images(Product $product)
    {
        $images = $product->images;
        return view('auth/images', compact('product', 'images'));
    }

    public function add_image(Product $product)
    {
        return view('auth.add_image', compact('product'));
    }

    public function upload_images(Product $product, Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        // Retrieve the uploaded file
        $file = $request->file('file');
    
        // Move the file to a designated directory (optional)
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('storage/product_images'), $imageName);
    
        // Create a new image associated with the product
        $image = new Image();
        $image->name = $imageName;
    
        // Associate the image with the product
        $product->images()->save($image);
    
        return response()->json(['success' => 'Image uploaded successfully', 'image_name' => $imageName, 'name' => $request->name]);
    }

    public function destroy_image(Image $image)
    {
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully!');
    }

    public function change_image_status(Request $request)
    {
     
        $image = Image::find($request->image_id);
        if($image->is_enabled=='yes')
        {
            $image->is_enabled='no';
            $image->save();
        }
        else{
            $image->is_enabled='yes';
            $image->save();
        }
        return response()->json(['is_enabled' => $image->is_enabled]);
    }
}
