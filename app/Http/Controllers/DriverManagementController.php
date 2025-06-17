<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DriverManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'driver');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
            });
        }

        $drivers = $query->get();

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
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $driver->name = $request->name;
        $driver->email = $request->email;
        $driver->username = $request->username;
        $driver->no_hp = $request->no_hp;
        $driver->route = $request->route;

        if ($request->filled('password')) {
            $driver->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            if ($driver->photo && $driver->photo !== 'profile_photos/default-profile.jpg') {
                Storage::disk('public')->delete($driver->photo);
            }

            $extension = $photo->getClientOriginalExtension();
            $filename = $driver->username . '.' . $extension;

            $path = $photo->storeAs('profile_photos', $filename, 'public');
            $driver->photo = $path;
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
