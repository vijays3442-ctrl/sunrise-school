<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of contact messages.
     */
    public function index(Request $request)
    {
        $status = $request->get('status');

        $query = ContactMessage::query()->latest();

        if ($status && in_array($status, ['unread', 'read', 'replied'])) {
            $query->where('status', $status);
        }

        $messages = $query->paginate(15)->withQueryString();

        $counts = [
            'all' => ContactMessage::count(),
            'unread' => ContactMessage::where('status', 'unread')->count(),
            'read' => ContactMessage::where('status', 'read')->count(),
            'replied' => ContactMessage::where('status', 'replied')->count(),
        ];

        return view('admin.contact-messages.index', compact('messages', 'counts', 'status'));
    }

    /**
     * Update the status of a message.
     */
    public function updateStatus(Request $request, ContactMessage $message)
    {
        $validated = $request->validate([
            'status' => 'required|in:unread,read,replied',
        ]);

        $message->update(['status' => $validated['status']]);

        return back()->with('success', "Message marked as {$validated['status']}.");
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return back()->with('success', 'Message deleted successfully.');
    }
}
