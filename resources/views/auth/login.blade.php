<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Imigrasi Kelas I TPI Banjarmasin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-animation-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: -3s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.3); }
            50% { box-shadow: 0 0 30px rgba(102, 126, 234, 0.6); }
        }
        
        .input-focus {
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.6;
            animation: particle-float 20s linear infinite;
        }
        
        @keyframes particle-float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 0.6; }
            90% { opacity: 0.6; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .btn-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-hover:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-hover:hover:before {
            left: 100%;
        }
        
        .password-toggle {
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: #667eea;
        }
    </style>
</head>
<body class="h-full hero-gradient relative">
    <!-- Floating Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Large floating circles -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-white opacity-10 rounded-full floating-animation"></div>
        <div class="absolute top-40 right-20 w-20 h-20 bg-white opacity-20 rounded-full floating-animation-delayed"></div>
        <div class="absolute bottom-20 left-20 w-24 h-24 bg-white opacity-15 rounded-full floating-animation"></div>
        <div class="absolute bottom-40 right-10 w-16 h-16 bg-white opacity-25 rounded-full floating-animation-delayed"></div>
        
        <!-- Geometric shapes -->
        <div class="absolute top-1/4 left-1/4 w-8 h-8 bg-white opacity-20 transform rotate-45 floating-animation"></div>
        <div class="absolute top-3/4 right-1/3 w-6 h-6 bg-white opacity-30 transform rotate-12 floating-animation-delayed"></div>
    </div>

    <!-- Particles Container -->
    <div id="particles-container" class="absolute inset-0"></div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-md w-full space-y-8">
            <!-- Logo and Header -->
            <div class="text-center">
                <div class="mx-auto h-20 w-20 bg-white rounded-full flex items-center justify-center mb-6 pulse-glow">
                    <img src="{{asset('storage/'.setting('logo'))}}" alt="">
                </div>
                <h2 class="text-4xl font-bold text-white mb-2">
                    Selamat Datang
                </h2>
                <p class="text-lg text-gray-200">
                    Masuk ke Portal Imigrasi Banjarmasin
                </p>
                <div class="mt-4 text-sm text-gray-300">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Sistem Keamanan Terjamin
                </div>
            </div>

            <!-- Login Form -->
            <div class="login-card rounded-3xl shadow-2xl p-8 space-y-6">
                <form class="space-y-6" id="loginForm" action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="space-y-5">
                        <!-- Email Input -->
                        <div class="relative">
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope mr-2 text-blue-500"></i>
                                Email Address
                            </label>
                            <div class="relative">
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    autocomplete="email" 
                                    required 
                                    class="input-focus appearance-none relative block w-full px-4 py-4 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:z-10 text-base"
                                    placeholder="nama@imigrasi-bjm.go.id"
                                >
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            </div>
                            <!-- Email validation indicator -->
                            <div id="email-feedback" class="mt-2 text-sm hidden">
                                <span id="email-success" class="text-green-600 hidden">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Email valid
                                </span>
                                <span id="email-error" class="text-red-600 hidden">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    Format email tidak valid
                                </span>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock mr-2 text-blue-500"></i>
                                Password
                            </label>
                            <div class="relative">
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    autocomplete="current-password" 
                                    required 
                                    class="input-focus appearance-none relative block w-full px-4 py-4 pr-12 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:z-10 text-base"
                                    placeholder="Masukkan password Anda"
                                >
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                    <i id="password-toggle" class="fas fa-eye password-toggle text-gray-400"></i>
                                </div>
                            </div>
                            <!-- Password strength indicator -->
                            <div id="password-strength" class="mt-2 hidden">
                                <div class="flex space-x-1">
                                    <div class="h-1 flex-1 rounded bg-gray-200">
                                        <div id="strength-bar" class="h-full rounded transition-all duration-300"></div>
                                    </div>
                                </div>
                                <p id="strength-text" class="text-xs mt-1"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                id="remember-me" 
                                name="remember-me" 
                                type="checkbox" 
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer"
                            >
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                                Ingat saya
                            </label>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button 
                            type="submit" 
                            class="btn-hover group relative w-full flex justify-center py-4 px-4 border border-transparent text-base font-semibold rounded-xl text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-105 transition-all duration-300 shadow-lg"
                            id="loginBtn"
                        >
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i id="login-icon" class="fas fa-sign-in-alt text-white group-hover:text-gray-200 transition-colors"></i>
                            </span>
                            <span id="login-text">Masuk ke Dashboard</span>
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">atau</span>
                        </div>
                    </div>

                </form>

                <!-- Security Notice -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                <strong>Keamanan:</strong> Pastikan Anda menggunakan perangkat yang aman dan jangan berbagi kredensial login Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Links -->
            <div class="text-center space-y-4">
                <div class="text-sm text-gray-200">
                    Belum punya akses? 
                    <a href="#" class="font-medium text-white hover:text-gray-200 underline">
                        Hubungi Administrator
                    </a>
                </div>
                <div class="flex justify-center space-x-6 text-sm text-gray-300">
                    <a href="#" class="hover:text-white transition-colors">Bantuan</a>
                    <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                </div>
                <div class="text-xs text-gray-400">
                    © 2024 Imigrasi Kelas I TPI Banjarmasin. Hak Cipta Dilindungi.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const container = document.getElementById('particles-container');
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.width = (Math.random() * 4 + 2) + 'px';
                particle.style.height = particle.style.width;
                particle.style.backgroundColor = `rgba(255, 255, 255, ${Math.random() * 0.3 + 0.1})`;
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 15) + 's';
                container.appendChild(particle);
            }
        }

        // Password toggle functionality
        document.getElementById('password-toggle').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Email validation
        document.getElementById('email').addEventListener('input', function() {
            const email = this.value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const feedback = document.getElementById('email-feedback');
            const success = document.getElementById('email-success');
            const error = document.getElementById('email-error');
            
            if (email.length > 0) {
                feedback.classList.remove('hidden');
                if (emailRegex.test(email)) {
                    success.classList.remove('hidden');
                    error.classList.add('hidden');
                    this.classList.remove('border-red-300');
                    this.classList.add('border-green-300');
                } else {
                    success.classList.add('hidden');
                    error.classList.remove('hidden');
                    this.classList.remove('border-green-300');
                    this.classList.add('border-red-300');
                }
            } else {
                feedback.classList.add('hidden');
                this.classList.remove('border-red-300', 'border-green-300');
            }
        });

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');
            const strengthContainer = document.getElementById('password-strength');
            
            if (password.length > 0) {
                strengthContainer.classList.remove('hidden');
                
                let strength = 0;
                let text = '';
                let color = '';
                
                // Check password criteria
                if (password.length >= 8) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/\d/.test(password)) strength++;
                if (/[^a-zA-Z\d]/.test(password)) strength++;
                
                switch (strength) {
                    case 0:
                    case 1:
                        text = 'Sangat Lemah';
                        color = 'bg-red-500';
                        break;
                    case 2:
                        text = 'Lemah';
                        color = 'bg-orange-500';
                        break;
                    case 3:
                        text = 'Sedang';
                        color = 'bg-yellow-500';
                        break;
                    case 4:
                        text = 'Kuat';
                        color = 'bg-green-500';
                        break;
                    case 5:
                        text = 'Sangat Kuat';
                        color = 'bg-green-600';
                        break;
                }
                
                strengthBar.className = `h-full rounded transition-all duration-300 ${color}`;
                strengthBar.style.width = (strength * 20) + '%';
                strengthText.textContent = text;
                strengthText.className = `text-xs mt-1 ${color.replace('bg-', 'text-')}`;
            } else {
                strengthContainer.classList.add('hidden');
            }
        });


        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // Add entrance animation to login card
            const loginCard = document.querySelector('.login-card');
            loginCard.style.opacity = '0';
            loginCard.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                loginCard.style.transition = 'all 0.6s ease';
                loginCard.style.opacity = '1';
                loginCard.style.transform = 'translateY(0)';
            }, 300);
        });

        // Add focus effects to inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>