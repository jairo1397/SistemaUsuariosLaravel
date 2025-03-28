<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
// Dashboard para Administradores
public function adminDashboard()
{
    if (Auth::user()->role !== 'admin') {
        return redirect()->route('login.admin')->with('error', 'Acceso denegado.');
    }

    $users = User::all(); // Obtener todos los usuarios
    return view('admin.dashboard', compact('users'));
}

// Dashboard para Estudiantes
public function studentDashboard()
{
    if (Auth::user()->role !== 'student') {
        return redirect()->route('login.student')->with('error', 'Acceso denegado.');
    }

    return view('student.dashboard');
}
}
