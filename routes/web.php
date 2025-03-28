<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
Route::get('/login', function () {
    return redirect()->route('login.admin.view');
})->name('login');
// Login Administrador
Route::get('/login/admin', [AuthController::class, 'showAdminLogin'])->name('login.admin.view');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin');
Route::post('/logout/admin', [AuthController::class, 'logoutAdmin'])->name('logout.admin');

// Login Estudiante
Route::get('/login/student', [AuthController::class, 'showStudentLogin'])->name('login.student.view');
Route::post('/login/student', [AuthController::class, 'loginStudent'])->name('login.student');
Route::post('/logout/student', [AuthController::class, 'logoutStudent'])->name('logout.student');

// Registro de usuarios
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Middleware para proteger los dashboards
Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::middleware('role:student')->get('/student/dashboard', [DashboardController::class, 'studentDashboard'])->name('student.dashboard');
});

// Ruta genérica de logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');