<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ $settings['name'] ?? 'Laravel App' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Logo and Title -->
            <div class="text-center">
                <img class="mx-auto h-12 w-auto" src="{{ asset('logo/logo.png') }}" alt="{{ $settings['name'] ?? 'Laravel App' }}">
                <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">
                    Sign in to your account
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Welcome back! Please enter your credentials to continue.
                </p>
            </div>

            <!-- Login Form -->
            <form class="mt-8 space-y-6" id="form-login">
                <div class="space-y-4">
                    <!-- Username Field -->
                    <div>
                        <label for="username" class="form-label">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="username" name="username" type="text" autocomplete="username" required 
                                class="form-input pl-10" placeholder="Enter your username">
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required 
                                class="form-input pl-10" placeholder="Enter your password">
                        </div>
                    </div>
                </div>

                <!-- Error Message -->
                <div id="errLogin" class="alert-error hidden">
                    <div class="flex">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-3">
                            <p class="text-sm" id="error-message"></p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" id="btn-login" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors duration-200">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-primary-500 group-hover:text-primary-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in
                    </button>
                </div>

                <!-- Footer Links -->
                <div class="text-center">
                    <p class="text-xs text-gray-500">
                        © {{ date('Y') }} {{ $settings['name'] ?? 'Laravel App' }}. All rights reserved.
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        class Login {
            constructor() {
                this.username = () => document.getElementById('username').value;
                this.password = () => document.getElementById('password').value;
            }

            async login(username, password) {
                const data = {
                    username: username,
                    password: password
                };

                try {
                    const response = await fetch("{{ route('admin-login-process') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(data)
                    });

                    return await response.json();
                } catch (error) {
                    console.error('Error:', error);
                    return { status: 500, message: 'Network error occurred' };
                }
            }

            showError(message) {
                const errorDiv = document.getElementById('errLogin');
                const errorMessage = document.getElementById('error-message');
                errorMessage.textContent = message;
                errorDiv.classList.remove('hidden');
            }

            hideError() {
                const errorDiv = document.getElementById('errLogin');
                errorDiv.classList.add('hidden');
            }

            setLoading(loading) {
                const button = document.getElementById('btn-login');
                const inputs = document.querySelectorAll('input');
                
                if (loading) {
                    button.disabled = true;
                    button.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Signing in...
                    `;
                    inputs.forEach(input => input.disabled = true);
                } else {
                    button.disabled = false;
                    button.innerHTML = `
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-primary-500 group-hover:text-primary-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in
                    `;
                    inputs.forEach(input => input.disabled = false);
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = new Login();
            const loginForm = document.getElementById('form-login');

            const submitForm = async (e) => {
                e.preventDefault();
                
                const username = form.username();
                const password = form.password();

                if (!username || !password) {
                    form.showError('Please enter both username and password');
                    return;
                }

                form.hideError();
                form.setLoading(true);

                try {
                    const data = await form.login(username, password);
                    
                    if (data.status === 200) {
                        localStorage.setItem('_token', data.data.token);
                        window.location.href = "{{ route('admin') }}";
                    } else {
                        const message = data.message || 'Username or password is incorrect';
                        form.showError(message);
                    }
                } catch (error) {
                    form.showError('An error occurred. Please try again.');
                } finally {
                    form.setLoading(false);
                }
            };

            loginForm.addEventListener('submit', submitForm);
        });
    </script>
</body>
</html>
