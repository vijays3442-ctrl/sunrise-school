<?php

namespace App\Http\Controllers;

use App\Mail\NewContactMessageNotification;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    /**
     * Store a newly created contact message from the public website.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:3000',
        ]);

        $contactMessage = ContactMessage::create($validated);

        // Send email notification to school administration
        try {
            $schoolEmail = config('mail.school_recipient', 'Hmsunrisegurukul@gmail.com');
            if ($schoolEmail) {
                Mail::to($schoolEmail)->send(new NewContactMessageNotification($contactMessage));
            }
        } catch (Throwable $e) {
            Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }

        return redirect()->to(route('contact') . '#contact-form')
            ->with('contact_success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}
