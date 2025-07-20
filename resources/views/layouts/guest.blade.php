<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Imigrasi Kelas I TPI Banjarmasin')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-2px);
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #fbbf24;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .floating-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                        <img src="{{ asset('storage/' . setting('logo')) }}" alt="">
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">Imigrasi Kelas I TPI</h1>
                        <p class="text-xs text-gray-500">Banjarmasin</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="nav-link text-gray-700 hover:text-blue-600 font-medium {{ request()->routeIs('home') ? 'active text-blue-600' : '' }}">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                    <a href="{{ route('tentang') }}"
                        class="nav-link text-gray-700 hover:text-blue-600 font-medium {{ request()->routeIs('tentang') ? 'active text-blue-600' : '' }}">
                        <i class="fas fa-info-circle mr-1"></i> Tentang
                    </a>
                    <a href="{{ route('kontak') }}"
                        class="nav-link text-gray-700 hover:text-blue-600 font-medium {{ request()->routeIs('kontak') ? 'active text-blue-600' : '' }}">
                        <i class="fas fa-phone mr-1"></i> Kontak
                    </a>
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-2 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-tachometer-alt mr-1"></i> DASHBOARD
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-sign-in-alt mr-1"></i> LOGIN
                        </a>
                    @endauth

                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
                    <a href="{{ route('home') }}"
                        class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="{{ route('tentang') }}"
                        class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md {{ request()->routeIs('tentang') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i> Tentang
                    </a>
                    <a href="{{ route('kontak') }}"
                        class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md {{ request()->routeIs('kontak') ? 'text-blue-600 bg-blue-50' : '' }}">
                        <i class="fas fa-phone mr-2"></i> Kontak
                    </a>
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-md hover:shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i> LOGIN
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-passport text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold">Imigrasi Kelas I TPI</h3>
                            <p class="text-sm text-gray-300">Banjarmasin</p>
                        </div>
                    </div>
                    <p class="text-gray-300 text-sm">Melayani keperluan keimigrasian dengan profesional dan terpercaya
                        untuk wilayah Kalimantan Selatan.</p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Layanan Kami</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><i class="fas fa-check-circle mr-2 text-green-400"></i>Penerbitan Paspor</li>
                        <li><i class="fas fa-check-circle mr-2 text-green-400"></i>Visa dan Izin Tinggal</li>
                        <li><i class="fas fa-check-circle mr-2 text-green-400"></i>Pengawasan Keimigrasian</li>
                        <li><i class="fas fa-check-circle mr-2 text-green-400"></i>Intelijen Keimigrasian</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak Info</h4>
                    <div class="space-y-2 text-sm text-gray-300">
                        <p><i class="fas fa-map-marker-alt mr-2 text-red-400"></i>{{ setting('address') }}</p>
                        <p><i class="fas fa-phone mr-2 text-green-400"></i>{{ setting('phone') }}</p>
                        <p><i class="fas fa-envelope mr-2 text-blue-400"></i>{{ setting('email') }}</p>
                        <div class="flex space-x-4 mt-4">
                            <a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-300">
                <p>&copy; 2025 create by : Haryati Apri Yani </p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('shadow-xl');
            } else {
                nav.classList.remove('shadow-xl');
            }
        });
    </script>
</body>

</html>
