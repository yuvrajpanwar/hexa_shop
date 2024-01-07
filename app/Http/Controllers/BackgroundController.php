<?php

namespace App\Http\Controllers;

use App\Models\Background;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    public function backgrounds()
    {
        $backgrounds = Background::all();
        return view('auth.backgrounds',compact('backgrounds'));
    }

    public function add_background(){
        return view('auth.add_background');

    }

    public function store_background(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the image in the public/images folder
        $imagePath = $request->file('image')->store('storage/background_images', 'public');

        // Get the image name from the path
        $imageName = basename($imagePath);

        // Create a new Background record in the database
        Background::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_name' => $imageName,
        ]);

        return redirect()->route('add_background')->with('success', 'Background added successfully');
    
    }

    public function destroy_background(Request $request)
    {
        $background = Background::find($request->id);
        $background->delete();
        return redirect()->route('backgrounds')->with('success', 'background deleted successfully!');
    }
}
