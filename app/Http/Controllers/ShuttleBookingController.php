<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShuttleBooking;
use Illuminate\Support\Facades\Auth;

class ShuttleBookingController extends Controller
{
    public function index(Request $request)
    {
        $query = ShuttleBooking::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                ->orWhere('username', 'like', "%$search%");
            })
            ->orWhere('route', 'like', "%$search%");
        }

        $bookings = $query->get();

        return view('admin.shuttle-booking', compact('bookings'));
    }

    public function create()
    {
        return view('mahasiswa.shuttle-booking');
    }

    public function store(Request $request)
    {
        $request->validate([
            'route' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'hour' => 'required|string',
        ]);

        ShuttleBooking::create([
            'user_id' => Auth::id(),
            'route' => $request->route,
            'date' => $request->date,
            'hour' => $request->hour,
        ]);

        return redirect()->back()->with('success', 'Shuttle booked successfully!');
    }

    public function edit($id)
    {
        $booking = ShuttleBooking::findOrFail($id);
        return view('admin.shuttle-booking-edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = ShuttleBooking::findOrFail($id);

        $request->validate([
            'route' => 'required|string',
            'date' => 'required|date',
            'hour' => 'required|string',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.shuttle-booking')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        ShuttleBooking::destroy($id);

        return redirect()->route('admin.shuttle-booking')->with('success', 'Booking deleted.');
    }
}
