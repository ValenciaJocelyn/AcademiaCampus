<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShuttleBookingController;
use App\Http\Controllers\AdminManagementController;
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
