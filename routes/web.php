<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\PerusahaanDashboardController;
use App\Http\Controllers\Dashboard\PencakerDashboardController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\Pencaker\LowonganController;
use App\Http\Controllers\Pencaker\ApplicationController;
use App\Http\Controllers\Pencaker\LamaranController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Public\LowonganPublikController;
use App\Http\Controllers\Public\MagangPublikController;
use App\Http\Controllers\Public\BeasiswaPublikController;
use App\Http\Controllers\Auth\RegisteredUserController;

// ⛳ PUBLIC
Route::get('/', fn () => view('welcome'))->name('home');



Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);



Route::get('/dashboard', function () {
    return view('dashboard'); // Atau arahkan ke view dashboard pencaker jika ada
})->middleware(['auth', 'verified'])->name('dashboard');


// ✅ AUTH USER
Route::middleware(['auth'])->group(function () {
    // 🔧 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🏠 Dashboard per Role
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/perusahaan/dashboard', [PerusahaanDashboardController::class, 'index'])->name('perusahaan.dashboard');
    Route::get('/pencaker/dashboard', [PencakerDashboardController::class, 'index'])->name('pencaker.dashboard');
});

// 🧑‍💼 PERUSAHAAN
Route::prefix('perusahaan')->middleware(['auth', 'perusahaan'])->group(function () {
    // Lowongan & Pelamar
    Route::resource('vacancies', VacancyController::class);
    Route::get('vacancies/{id}/applicants', [VacancyController::class, 'applicants'])->name('vacancies.applicants');
    Route::patch('applications/{id}/update-status', [VacancyController::class, 'updateStatus'])->name('applications.updateStatus');

    // Magang
    Route::resource('magang', \App\Http\Controllers\Perusahaan\MagangController::class)
        ->only(['index', 'create', 'store'])
        ->names('perusahaan.magang');

    // Beasiswa
    Route::resource('beasiswa', \App\Http\Controllers\Perusahaan\BeasiswaController::class)
        ->only(['index', 'create', 'store'])
        ->names('perusahaan.beasiswa');
});

// 👤 PENCAKER
Route::prefix('pencaker')->middleware(['auth'])->group(function () {
    Route::get('/lowongan', [LowonganController::class, 'index'])->name('pencaker.lowongan.index');
    Route::get('/lowongan/{id}', [LowonganController::class, 'show'])->name('pencaker.lowongan.show');
    Route::post('/lowongan/{id}/apply', [LowonganController::class, 'apply'])->name('pencaker.lowongan.apply');

    Route::get('/lamaran-saya', [ApplicationController::class, 'index'])->name('pencaker.applications.index');

    Route::get('/lamaran/{vacancy}/apply', [LamaranController::class, 'create'])->name('lamaran.create');
    Route::post('/lamaran/store', [LamaranController::class, 'store'])->name('lamaran.store');
});

// 👑 ADMIN
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/statistik', [AdminDashboardController::class, 'statistik'])->name('admin.statistik');

    Route::resource('beasiswa', BeasiswaController::class)->names('admin.beasiswa');
    Route::resource('magang', MagangController::class)->names('admin.magang');

    Route::resource('company', CompanyController::class)->names('admin.company');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->names('admin.users');

    Route::get('iklan', [\App\Http\Controllers\Admin\ComercialController::class, 'index'])->name('admin.iklan.index');
    Route::resource('comercial', \App\Http\Controllers\Admin\ComercialController::class)->names('admin.comercial');

    Route::get('/lamaran', [\App\Http\Controllers\Admin\LamaranAdminController::class, 'index'])->name('admin.lamaran.index');
});

// 🛫 Redirect Role -> Dashboard
Route::get('/redirect-dashboard', function () {
    $user = auth()->user();
    return match ($user->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'perusahaan' => redirect()->route('perusahaan.dashboard'),
        'pencaker' => redirect()->route('pencaker.dashboard'),
        default => abort(403, 'Role tidak dikenali.'),
    };
})->middleware('auth');

// 🌐 PUBLIC PAGES (Bisa dilihat tanpa login)
Route::prefix('explore')->group(function () {
    Route::get('/lowongan', [LowonganPublikController::class, 'index'])->name('public.lowongan');
    Route::get('/magang', [MagangPublikController::class, 'index'])->name('public.magang');
    Route::get('/beasiswa', [BeasiswaPublikController::class, 'index'])->name('public.beasiswa');
    Route::get('/perusahaan', [CompanyPublikController::class, 'index'])->name('public.perusahaan');
});

Route::get('/redirect-dashboard', function () {
    $user = auth()->user();
    return match ($user->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'perusahaan' => redirect()->route('perusahaan.dashboard'),
        'pencaker' => redirect()->route('pencaker.dashboard'),
        default => abort(403, 'Role tidak dikenali.'),
    };
})->middleware('auth');



// 🧾 Auth (login/register/logout)
require __DIR__.'/auth.php';
