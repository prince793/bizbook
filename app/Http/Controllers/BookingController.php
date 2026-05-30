<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;

class BookingController extends Controller
{
    public function create()
    {
        $services = Service::where('is_active', true)->get();
        return view('booking', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'date'       => 'required|date|after:today',
            'time'       => 'required',
            'message'    => 'nullable|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('booking.success');
    }

    public function success()
    {
        return view('booking-success');
    }
}