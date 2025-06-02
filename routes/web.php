<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShuttleBookingController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\LecturerManagementController;
use App\Http\Controllers\DriverManagementController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('landing');
});
Route::get('/dashboard', function () {
    return view('mahasiswa.dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/student-services', function () {
    return view('mahasiswa.student-services');
});
Route::get('/courses', function () {
    return view('mahasiswa.courses');
});
Route::get('/schedule', function () {
    return view('mahasiswa.schedule');
});
Route::get('/attendance', function () {
    return view('mahasiswa.attendance');
});
Route::get('/grade', function () {
    return view('mahasiswa.grade');
});
Route::get('/announcement', function () {
    return view('mahasiswa.announcement');
});
Route::get('/setting', function () {
    return view('mahasiswa.setting');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/shuttle-booking', [ShuttleBookingController::class, 'create'])->name('shuttle-booking.create');
    Route::post('/shuttle-booking', [ShuttleBookingController::class, 'store'])->name('shuttle-booking.store');

    Route::put('/settings/update', [StudentManagementController::class, 'updateSelf'])->name('student.settings.update');
});

Route::get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
})->middleware('auth');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/shuttle-management', [ShuttleBookingController::class, 'index'])->name('shuttle-management');
    Route::get('/shuttle-management/{id}/edit', [ShuttleBookingController::class, 'edit'])->name('shuttle-management.edit');
    Route::put('/shuttle-management/{id}', [ShuttleBookingController::class, 'update'])->name('shuttle-management.update');
    Route::delete('/shuttle-management/{id}', [ShuttleBookingController::class, 'destroy'])->name('shuttle-management.destroy');

    Route::get('/admin-management', [AdminManagementController::class, 'index'])->name('admin-management');
    Route::get('/admin-management/create', [AdminManagementController::class, 'create'])->name('admin-management.create');
    Route::post('/admin-management', [AdminManagementController::class, 'store'])->name('admin-management.store');
    Route::get('/admin-management/{id}/edit', [AdminManagementController::class, 'edit'])->name('admin-management.edit');
    Route::put('/admin-management/{id}', [AdminManagementController::class, 'update'])->name('admin-management.update');
    Route::delete('/admin-management/{id}', [AdminManagementController::class, 'destroy'])->name('admin-management.destroy');

    Route::get('/student-management', [StudentManagementController::class, 'index'])->name('student-management');
    Route::get('/student-management/create', [StudentManagementController::class, 'create'])->name('student-management.create');
    Route::post('/student-management', [StudentManagementController::class, 'store'])->name('student-management.store');
    Route::get('/student-management/{id}/edit', [StudentManagementController::class, 'edit'])->name('student-management.edit');
    Route::put('/student-management/{id}', [StudentManagementController::class, 'update'])->name('student-management.update');
    Route::delete('/student-management/{id}', [StudentManagementController::class, 'destroy'])->name('student-management.destroy');

    Route::get('/lecturer-management', [LecturerManagementController::class, 'index'])->name('lecturer-management');
    Route::get('/lecturer-management/create', [LecturerManagementController::class, 'create'])->name('lecturer-management.create');
    Route::post('/lecturer-management', [LecturerManagementController::class, 'store'])->name('lecturer-management.store');
    Route::get('/lecturer-management/{id}/edit', [LecturerManagementController::class, 'edit'])->name('lecturer-management.edit');
    Route::put('/lecturer-management/{id}', [LecturerManagementController::class, 'update'])->name('lecturer-management.update');
    Route::delete('/lecturer-management/{id}', [LecturerManagementController::class, 'destroy'])->name('lecturer-management.destroy');

    Route::get('/driver-management', [DriverManagementController::class, 'index'])->name('driver-management');
    Route::get('/driver-management/create', [DriverManagementController::class, 'create'])->name('driver-management.create');
    Route::post('/driver-management', [DriverManagementController::class, 'store'])->name('driver-management.store');
    Route::get('/driver-management/{id}/edit', [DriverManagementController::class, 'edit'])->name('driver-management.edit');
    Route::put('/driver-management/{id}', [DriverManagementController::class, 'update'])->name('driver-management.update');
    Route::delete('/driver-management/{id}', [DriverManagementController::class, 'destroy'])->name('driver-management.destroy');
});


Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/logout', function (Request $request) {
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
