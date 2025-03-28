<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showAdminLogin()
    {
        return view('auth.login_admin');
    }

    public function showStudentLogin()
    {
        return view('auth.login_student');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    // Login Administrador
    public function loginAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role !== 'admin') {
                Auth::logout();
                return back()->with('error', 'Acceso denegado. Solo administradores pueden ingresar.');
            }

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Credenciales incorrectas.');
    }

    // Login Estudiante
    public function loginStudent(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role !== 'student') {
                Auth::logout();
                return back()->with('error', 'Acceso denegado. Solo estudiantes pueden ingresar.');
            }

            return redirect()->route('student.dashboard');
        }

        return back()->with('error', 'Credenciales incorrectas.');
    }

    // Registro de usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,student'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        Auth::login($user);

        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('student.dashboard');
    }

    // Logout Administrador
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('login.admin.view');
    }
    
    // Logout Estudiante
    public function logoutStudent()
    {
        Auth::logout();
        return redirect()->route('login.student.view');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada correctamente.');
    }
}