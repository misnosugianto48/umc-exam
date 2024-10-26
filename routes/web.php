<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.index');
            Route::get('/pasien', 'showPatient')->name('admin.patient');
            Route::get('/pasien/tambah', 'addPatient')->name('admin.add-patient');
            Route::post('/pasien/tambah', 'storePatient')->name('admin.store-patient');
            Route::get('/dokter', 'showDoctor')->name('admin.doctor');
            Route::get('/kasir', 'showCashier')->name('admin.cashier');
        });
    });
});

Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::prefix('/doctor')->group(function () {
        Route::controller(DoctorController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('doctor.index');
            Route::get('/konsultasi', 'showConsultation')->name('doctor.consultation');
            Route::get('/konsultasi/tambah', 'addConsultation')->name('doctor.add-consultation');
            Route::post('/konsultasi/tambah', 'storeConsultation')->name('doctor.store-consultation');
        });
    });
});

Route::middleware(['auth', 'role:cashier'])->group(function () {
    Route::prefix('/cashier')->group(function () {
        Route::controller(CashierController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('cashier.index');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
