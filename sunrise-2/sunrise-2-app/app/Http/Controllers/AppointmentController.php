<?php

namespace App\Http\Controllers;

use App\Mail\NewAppointmentNotification;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class AppointmentController extends Controller
{
    /**
     * Store a newly created appointment request from the public website.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guardian_name' => 'required|string|max:150',
            'guardian_email' => 'required|email|max:150',
            'guardian_phone' => 'nullable|string|max:30',
            'child_name' => 'required|string|max:150',
            'child_age' => 'required|string|max:50',
            'message' => 'nullable|string|max:2000',
        ]);

        $appointment = Appointment::create($validated);

        // Send email notification to school administration
        try {
            $schoolEmail = config('mail.school_recipient', 'Hmsunrisegurukul@gmail.com');
            if ($schoolEmail) {
                Mail::to($schoolEmail)->send(new NewAppointmentNotification($appointment));
            }
        } catch (Throwable $e) {
            Log::error('Failed to send appointment notification email: ' . $e->getMessage());
        }

        return redirect()->to(url()->previous() . '#contact')
            ->with('appointment_success', 'Thank you! Your appointment request has been submitted successfully. Our admissions team will get in touch with you shortly.');
    }
}
