<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShuttleStatus;
use App\Models\ShuttleBus;

class ShuttleStatusController extends Controller
{
    public function index()
    {
        $statuses = ShuttleStatus::with('shuttle')->latest()->get();
        return view('admin.statuses.index', compact('statuses'));
    }

    public function create()
    {
        $buses = ShuttleBus::all();
        return view('admin.statuses.create', compact('buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shuttle_id' => 'required|exists:shuttle_bus,id',
            'current_stop' => 'required|string',
            'next_stop' => 'required|string',
            'departure_time' => 'nullable|string',
            'arrival_time' => 'nullable|string',
        ]);

        ShuttleStatus::create($request->all());
        return redirect()->route('statuses.index')->with('success', 'Status added.');
    }

    public function destroy($id)
    {
        ShuttleStatus::destroy($id);
        return back()->with('success', 'Status deleted.');
    }
}
