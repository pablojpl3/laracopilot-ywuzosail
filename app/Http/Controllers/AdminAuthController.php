<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // Static admin credentials
    private $adminCredentials = [
        [
            'email' => 'admin@docmanager.com',
            'password' => 'admin123',
            'name' => 'System Administrator',
            'role' => 'Super Admin'
        ],
        [
            'email' => 'manager@docmanager.com',
            'password' => 'manager123',
            'name' => 'System Manager',
            'role' => 'Manager'
        ],
        [
            'email' => 'supervisor@docmanager.com',
            'password' => 'supervisor123',
            'name' => 'System Supervisor',
            'role' => 'Supervisor'
        ]
    ];

    public function showLogin()
    {
        // If already logged in, redirect to dashboard
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Check against static credentials
        foreach ($this->adminCredentials as $admin) {
            if ($admin['email'] === $email && $admin['password'] === $password) {
                // Create admin session
                session([
                    'admin_logged_in' => true,
                    'admin_user' => [
                        'email' => $admin['email'],
                        'name' => $admin['name'],
                        'role' => $admin['role']
                    ]
                ]);

                return redirect()->route('admin.dashboard')->with('success', 'Welcome to DocManager Pro Admin Panel!');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials. Please check the demo credentials above.']);
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }

    // Middleware-like function to check admin authentication
    public static function checkAuth()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return null;
    }
}