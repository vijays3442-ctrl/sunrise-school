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
        $type = $request->input('type', 'photo');

        if ($type === 'video') {
            $rules = [
                'title' => 'required|string|max:255',
                'category' => 'nullable|string|max:100',
                'video_source' => 'required|in:url,file',
                'thumbnail' => 'nullable|file|mimes:jpeg,png,jpg,webp|max:10240',
            ];

            if ($request->input('video_source') === 'file') {
                $rules['video_file'] = 'required|file|mimes:mp4,webm,ogg,mov,m4v|max:65536';
            } else {
                $rules['video_url'] = 'required|url|max:1000';
            }

            $messages = [
                'video_file.required' => 'Please select a video file (MP4 or WebM) to upload.',
                'video_file.mimes' => 'Video must be a format of MP4, WebM, MOV, or OGG.',
                'video_file.max' => 'The video file must not exceed 64MB.',
                'video_url.required' => 'Please enter a video URL (e.g. YouTube video link).',
                'video_url.url' => 'Please enter a valid URL including http:// or https://.',
                'thumbnail.mimes' => 'Thumbnail must be a JPG, PNG, or WEBP image.',
                'thumbnail.max' => 'Thumbnail must not exceed 10MB.',
            ];

            $validated = $request->validate($rules, $messages);

            $videoPath = null;
            $thumbPath = null;

            if ($request->hasFile('video_file')) {
                $videoPath = $request->file('video_file')->store('galleries/videos', 'public');
            }

            if ($request->hasFile('thumbnail')) {
                $thumbPath = $request->file('thumbnail')->store('galleries/thumbnails', 'public');
            }

            Gallery::create([
                'type' => 'video',
                'title' => $validated['title'],
                'category' => $validated['category'] ?? null,
                'video_url' => $request->input('video_source') === 'url' ? $request->input('video_url') : null,
                'video_path' => $videoPath,
                'thumbnail_path' => $thumbPath,
            ]);

            return back()->with('success', 'Video added to gallery successfully!');
        }

        // Default: Photo
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,webp,svg,heic,avif|max:25600',
        ], [
            'image.required' => 'Please select an image file to upload.',
            'image.mimes' => 'Image must be in JPEG, PNG, JPG, GIF, or WEBP format.',
            'image.max' => 'Image file must not exceed 25MB.',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'type' => 'photo',
            'title' => $validated['title'],
            'category' => $validated['category'] ?? null,
            'image_path' => $imagePath,
        ]);

        return back()->with('success', 'Photo uploaded successfully!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        if ($gallery->video_path && Storage::disk('public')->exists($gallery->video_path)) {
            Storage::disk('public')->delete($gallery->video_path);
        }

        if ($gallery->thumbnail_path && Storage::disk('public')->exists($gallery->thumbnail_path)) {
            Storage::disk('public')->delete($gallery->thumbnail_path);
        }

        $gallery->delete();

        return back()->with('success', 'Item deleted successfully!');
    }
}
