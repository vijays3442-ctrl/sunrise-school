<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadershipMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LeadershipMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaders = LeadershipMessage::orderBy('sort_order', 'asc')->get();
        return view('admin.leadership.index', compact('leaders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leadership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|string|max:50',
            'designation' => 'required|string|max:100',
            'name' => 'required|string|max:150',
            'qualification' => 'nullable|string|max:150',
            'message' => 'required|string',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $leader = new LeadershipMessage();
        $leader->role = Str::slug($validated['role']);
        $leader->designation = $validated['designation'];
        $leader->name = $validated['name'];
        $leader->qualification = $validated['qualification'] ?? null;
        $leader->message = $validated['message'];
        $leader->email = $validated['email'] ?? null;
        $leader->phone = $validated['phone'] ?? null;
        $leader->sort_order = $validated['sort_order'] ?? 0;
        $leader->is_active = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $dir = public_path('images/leadership');
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $filename = time() . '_' . Str::slug($leader->name) . '.' . $photo->getClientOriginalExtension();
            $photo->move($dir, $filename);
            $leader->photo_path = '/images/leadership/' . $filename;
        }

        $leader->save();

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership message added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadershipMessage $leadership)
    {
        return view('admin.leadership.edit', ['leader' => $leadership]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadershipMessage $leadership)
    {
        $validated = $request->validate([
            'role' => 'required|string|max:50',
            'designation' => 'required|string|max:100',
            'name' => 'required|string|max:150',
            'qualification' => 'nullable|string|max:150',
            'message' => 'required|string',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $leadership->role = Str::slug($validated['role']);
        $leadership->designation = $validated['designation'];
        $leadership->name = $validated['name'];
        $leadership->qualification = $validated['qualification'] ?? null;
        $leadership->message = $validated['message'];
        $leadership->email = $validated['email'] ?? null;
        $leadership->phone = $validated['phone'] ?? null;
        $leadership->sort_order = $validated['sort_order'] ?? 0;
        $leadership->is_active = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $dir = public_path('images/leadership');
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $filename = time() . '_' . Str::slug($leadership->name) . '.' . $photo->getClientOriginalExtension();
            $photo->move($dir, $filename);
            $leadership->photo_path = '/images/leadership/' . $filename;
        }

        $leadership->save();

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership message updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadershipMessage $leadership)
    {
        $leadership->delete();
        return redirect()->route('admin.leadership.index')->with('success', 'Leadership message deleted successfully.');
    }
}
