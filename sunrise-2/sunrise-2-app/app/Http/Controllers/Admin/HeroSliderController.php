<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::orderBy('sort_order', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $slider = new HeroSlider();
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->is_active = $request->has('is_active');
        $slider->sort_order = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/sliders'), $filename);
            $slider->image_path = '/images/sliders/' . $filename;
        }

        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit($id)
    {
        $slider = HeroSlider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = HeroSlider::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->is_active = $request->has('is_active');
        $slider->sort_order = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            // Delete old image if it exists and is local
            if ($slider->image_path && file_exists(public_path($slider->image_path))) {
                @unlink(public_path($slider->image_path));
            }

            $image = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/sliders'), $filename);
            $slider->image_path = '/images/sliders/' . $filename;
        }

        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);

        if ($slider->image_path && file_exists(public_path($slider->image_path)) && !Str::startsWith($slider->image_path, 'http')) {
            @unlink(public_path($slider->image_path));
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
