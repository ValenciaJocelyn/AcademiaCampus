<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShuttleBus;
use App\Models\ShuttleRoute;

class ShuttleBusController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $buses = ShuttleBus::with('route')
            ->when($search, function ($query, $search) {
                $query->where('plate_number', 'like', "%{$search}%")
                    ->orWhere('bus_type', 'like', "%{$search}%");
            })
            ->orderBy('plate_number')
            ->get();

        return view('admin.shuttle-bus', compact('buses'));
    }

    public function create()
    {
        $routes = ShuttleRoute::all();;
        return view('admin.shuttle-bus-create', compact('routes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'plate_number' => 'required|unique:shuttle_bus,plate_number',
            'bus_type' => 'required|in:Campus,Inter-campus,Others',
            'route_id' => 'required|exists:shuttle_routes,id',
        ]);

        ShuttleBus::create($request->only(['plate_number', 'bus_type', 'route_id']));

        return redirect()->route('admin.shuttle-bus')->with('success', 'Shuttle bus created successfully.');
    }

    public function edit($id)
    {
        $bus = ShuttleBus::findOrFail($id);
        $routes = ShuttleRoute::all();

        return view('admin.shuttle-bus-edit', compact('bus', 'routes'));
    }

    public function update(Request $request, $id)
    {
        $bus = ShuttleBus::findOrFail($id);

        $request->validate([
            'plate_number' => 'required|unique:shuttle_bus,plate_number,' . $bus->id,
            'bus_type' => 'required|in:Campus,Inter-campus,Others',
            'route_id' => 'required|exists:shuttle_routes,id',
        ]);

        $bus->update($request->only(['plate_number', 'bus_type', 'route_id']));

        return redirect()->route('admin.shuttle-bus')->with('success', 'Shuttle bus updated successfully.');
    }

    public function destroy($id)
    {
        $bus = ShuttleBus::findOrFail($id);
        $bus->delete();

        return redirect()->route('admin.shuttle-bus')->with('success', 'Shuttle bus deleted successfully.');
    }
}
