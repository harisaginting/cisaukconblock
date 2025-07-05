<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ isset($settings['name']) ? $settings['name'] : 'Laravel App' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="h-full font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        @include('admin.template.sidebar')
        
        <!-- Main Content -->
        <div class="lg:pl-64">
            <!-- Header -->
            @include('admin.template.header')
            
            <!-- Page Content -->
            <main class="py-6">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <!-- Page Header -->
                    @hasSection('page-header')
                        <div class="mb-8">
                            @yield('page-header')
                        </div>
                    @endif
                    
                    <!-- Main Content -->
                    <div class="animate-fade-in">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Footer -->
    @include('admin.template.footer')
    
    <!-- Scripts -->
    <script>
        // Global logout function
        function logout() {
            localStorage.clear();
            sessionStorage.clear();
            window.location.href = '{{ route("admin-login") }}';
        }
        
        // Add logout event listener
        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.getElementById('btn-logout');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', logout);
            }
        });
    </script>
    
    @stack('scripts')
    @yield('footcode')
</body>
</html>