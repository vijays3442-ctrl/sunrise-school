<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageImage;
use App\Services\PageImageRegistry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PageImageController extends Controller
{
    public function index(PageImageRegistry $registry): View
    {
        $images = $registry->sync()->groupBy('page');

        return view('admin.page-images.index', compact('images'));
    }

    public function update(Request $request, PageImage $pageImage): RedirectResponse
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:8192'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);

        if ($pageImage->image_path) {
            Storage::disk('public')->delete($pageImage->image_path);
        }

        $pageImage->update([
            'image_path' => $request->file('image')->store('page-images/'.str($pageImage->page)->slug(), 'public'),
            'alt_text' => $validated['alt_text'] ?: $pageImage->alt_text,
        ]);

        return back()->with('success', "{$pageImage->label} updated successfully.");
    }

    public function reset(PageImage $pageImage): RedirectResponse
    {
        if ($pageImage->image_path) {
            Storage::disk('public')->delete($pageImage->image_path);
        }

        $pageImage->update(['image_path' => null]);

        return back()->with('success', "{$pageImage->label} restored to its original fallback.");
    }
}
