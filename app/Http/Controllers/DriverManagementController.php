<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DriverManagementController extends Controller
{
    public function index()
    {
        $drivers = User::where('role', 'driver')->get();
        return view('admin.driver-management', compact('drivers'));
    }

    public function create()
    {
        return view('admin.driver-management-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'no_hp' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => 'driver',
            'route' => $request->route,
        ]);

        return redirect()->route('admin.driver-management')->with('success', 'Driver created successfully.');
    }

    public function edit($id)
    {
        $driver = User::findOrFail($id);
        return view('admin.driver-management-edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $driver = User::where('role', 'driver')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $driver->id,
            'username' => 'required|string|unique:users,username,' . $driver->id,
            'no_hp' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
        ]);

        $driver->name = $request->name;
        $driver->email = $request->email;
        $driver->username = $request->username;
        $driver->no_hp = $request->no_hp;
        $driver->route = $request->route;

        if ($request->filled('password')) {
            $driver->password = Hash::make($request->password);
        }

        $driver->save();

        return redirect()->route('admin.driver-management')->with('success', 'Driver updated successfully.');
    }

    public function destroy($id)
    {
        $driver = User::findOrFail($id);
        $driver->delete();

        return redirect()->route('admin.driver-management')->with('success', 'Driver deleted successfully.');
    }
}
