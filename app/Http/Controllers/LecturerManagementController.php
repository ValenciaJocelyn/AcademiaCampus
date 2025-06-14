<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LecturerManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'lecturer');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
            });
        }

        $lecturers = $query->get();

        return view('admin.lecturer-management', compact('lecturers'));
    }

    public function create()
    {
        return view('admin.lecturer-management-create');
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
            'role' => 'lecturer',
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'campus' => $request->campus
        ]);

        return redirect()->route('admin.lecturer-management')->with('success', 'Lecturer created successfully.');
    }

    public function edit($id)
    {
        $lecturer = User::findOrFail($id);
        return view('admin.lecturer-management-edit', compact('lecturer'));
    }

    public function update(Request $request, $id)
    {
        $lecturer = User::where('role', 'lecturer')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $lecturer->id,
            'username' => 'required|string|unique:users,username,' . $lecturer->id,
            'no_hp' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'gender' => 'nullable|in:male,female,others'
        ]);

        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->username = $request->username;
        $lecturer->no_hp = $request->no_hp;
        $lecturer->gender = $request->gender;
        $lecturer->dob = $request->dob;
        $lecturer->address = $request->address;
        $lecturer->campus = $request->campus;

        if ($request->filled('password')) {
            $lecturer->password = Hash::make($request->password);
        }

        $lecturer->save();

        return redirect()->route('admin.lecturer-management')->with('success', 'Lecturer updated successfully.');
    }

    public function destroy($id)
    {
        $lecturer = User::findOrFail($id);
        $lecturer->delete();

        return redirect()->route('admin.lecturer-management')->with('success', 'Lecturer deleted successfully.');
    }
}
