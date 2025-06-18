<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShuttleRoute;

class ShuttleRouteController extends Controller
{
    public function index()
    {
        $routes = ShuttleRoute::orderBy('route')->orderBy('order')->get();
        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        return view('admin.routes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'route' => 'required|string',
            'order' => 'required|integer'
        ]);

        ShuttleRoute::create($request->only(['route', 'order']));
        return redirect()->route('routes.index')->with('success', 'Route created successfully.');
    }

    public function edit($id)
    {
        $route = ShuttleRoute::findOrFail($id);
        return view('admin.routes.edit', compact('route'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'route' => 'required|string',
            'order' => 'required|integer'
        ]);

        $route = ShuttleRoute::findOrFail($id);
        $route->update($request->only(['route', 'order']));
        return redirect()->route('routes.index')->with('success', 'Route updated.');
    }

    public function destroy($id)
    {
        ShuttleRoute::destroy($id);
        return back()->with('success', 'Route deleted.');
    }
}
