<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('date', 'desc')->get();
        return view('admin.notices.index', compact('notices'));
    }

    public function publicIndex()
    {
        $notices = Notice::where('is_active', true)->orderBy('date', 'desc')->paginate(10);
        return view('notices', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'date' => 'required|date',
            'is_active' => 'boolean'
        ]);
        
        $validated['is_active'] = $request->has('is_active');

        Notice::create($validated);

        return redirect()->route('admin.notices.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'date' => 'required|date',
            'is_active' => 'boolean'
        ]);
        
        $validated['is_active'] = $request->has('is_active');

        $notice->update($validated);

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully.');
    }
}
