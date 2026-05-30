<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalBookings   = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $totalServices   = Service::count();
        $recentBookings  = Booking::with('service')->latest()->take(5)->get();
        return view('admin.dashboard', compact(
            'totalBookings', 'pendingBookings', 'confirmedBookings', 'totalServices', 'recentBookings'
        ));
    }

    public function bookings()
    {
        $bookings = Booking::with('service')->latest()->paginate(10);
        return view('admin.bookings', compact('bookings'));
    }

    public function updateBooking(Request $request, Booking $booking)
    {
        $booking->update(['status' => $request->status]);
        return back()->with('success', 'Booking updated successfully.');
    }

    public function destroyBooking(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking deleted successfully.');
    }

    public function services()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }
}