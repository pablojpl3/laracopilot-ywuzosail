<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - DocManager Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gradient-to-br from-slate-800 via-slate-900 to-indigo-900 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <!-- Login Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl border border-white/20 p-8">
            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2">Admin Portal</h2>
                <p class="text-slate-300">DocManager Pro Administration</p>
            </div>

            <!-- Login Form -->
            <form action="/admin/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Email Address</label>
                    <input type="email" name="email" required 
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                           placeholder="Enter admin email">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                           placeholder="Enter password">
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Sign In to Admin Panel
                </button>
            </form>

            <!-- Demo Credentials -->
            <div class="mt-8 p-4 bg-white/5 rounded-xl border border-white/10">
                <h3 class="text-sm font-semibold text-white mb-3">Demo Admin Credentials:</h3>
                <div class="space-y-2 text-xs text-slate-300">
                    <div class="flex justify-between">
                        <span>Email: admin@docmanager.com</span>
                        <span>Password: admin123</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Email: manager@docmanager.com</span>
                        <span>Password: manager123</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Email: supervisor@docmanager.com</span>
                        <span>Password: supervisor123</span>
                    </div>
                </div>
            </div>

            <!-- Back to Website -->
            <div class="mt-6 text-center">
                <a href="/" class="text-slate-300 hover:text-white text-sm transition-colors duration-300">
                    ← Back to Document Manager
                </a>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Auto-fill demo credentials on click
            $('.demo-credentials div').on('click', function() {
                const email = $(this).find('span:first').text().split(': ')[1];
                const password = $(this).find('span:last').text().split(': ')[1];
                $('input[name="email"]').val(email);
                $('input[name="password"]').val(password);
            });

            // Form validation
            $('form').on('submit', function(e) {
                const email = $('input[name="email"]').val();
                const password = $('input[name="password"]').val();
                
                if (!email || !password) {
                    e.preventDefault();
                    alert('Please fill in all fields');
                }
            });
        });
    </script>
</body>
</html>