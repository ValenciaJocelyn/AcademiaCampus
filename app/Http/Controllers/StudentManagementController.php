<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'student');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
            });
        }

        $students = $query->get();

        return view('admin.student-management', compact('students'));
    }

    public function create()
    {
        return view('admin.student-management-create');
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
            'role' => 'student',
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'campus' => $request->campus
        ]);

        return redirect()->route('admin.student-management')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('admin.student-management-edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = User::where('role', 'student')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->id,
            'username' => 'required|string|unique:users,username,' . $student->id,
            'no_hp' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'gender' => 'nullable|in:male,female,others',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->username = $request->username;
        $student->no_hp = $request->no_hp;
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->address = $request->address;
        $student->campus = $request->campus;

        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            if ($student->photo && $student->photo !== 'profile_photos/default-profile.jpg') {
                Storage::disk('public')->delete($student->photo);
            }

            $extension = $photo->getClientOriginalExtension();
            $filename = $student->username . '.' . $extension;

            $path = $photo->storeAs('profile_photos', $filename, 'public');
            $student->photo = $path;
        }

        $student->save();

        return redirect()->route('admin.student-management')->with('success', 'Student updated successfully.');
    }

    public function updateSelf(Request $request)
    {
        /** @var \App\Models\User $student */
        $student = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->id,
            'username' => 'required|string|unique:users,username,' . $student->id,
            'no_hp' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'gender' => 'nullable|in:male,female,others',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->username = $request->username;
        $student->no_hp = $request->no_hp;
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->address = $request->address;
        $student->campus = $request->campus;

        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            if ($student->photo && $student->photo !== 'profile_photos/default-profile.jpg') {
                Storage::disk('public')->delete($student->photo);
            }

            $extension = $photo->getClientOriginalExtension();
            $filename = $student->username . '.' . $extension;
            $path = $photo->storeAs('profile_photos', $filename, 'public');

            $student->photo = $path;
        }

        $student->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.student-management')->with('success', 'Student deleted successfully.');
    }
}
