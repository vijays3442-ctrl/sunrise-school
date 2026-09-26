<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galleries', 'public');

            Gallery::create([
                'title' => $request->title,
                'category' => $request->category,
                'image_path' => $imagePath,
            ]);

            return back()->with('success', 'Image uploaded successfully!');
        }

        return back()->with('error', 'Please select an image to upload.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        
        $gallery->delete();

        return back()->with('success', 'Image deleted successfully!');
    }
}
