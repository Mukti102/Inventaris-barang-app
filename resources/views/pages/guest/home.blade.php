@extends('layouts.guest')

@section('title', 'Home - Imigrasi Kelas I TPI Banjarmasin')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white min-h-screen flex items-center relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-32 h-32 border-2 border-white rounded-full floating-animation"></div>
        <div class="absolute top-40 right-32 w-24 h-24 border-2 border-white rounded-full floating-animation" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-32 left-1/4 w-20 h-20 border-2 border-white rounded-full floating-animation" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Imigrasi Kelas I TPI
                    <span class="block text-yellow-300">Banjarmasin</span>
                </h1>
                <p class="text-xl lg:text-2xl mb-8 text-gray-200 leading-relaxed">
                    Melayani keperluan keimigrasian dengan profesional, cepat, dan terpercaya untuk wilayah Kalimantan Selatan
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#layanan" class="bg-yellow-400 text-gray-800 px-8 py-4 rounded-full font-semibold hover:bg-yellow-300 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-rocket mr-2"></i>Lihat Layanan
                    </a>
                    <a href="tel:(0511)123-4567" class="glass-effect border border-white/30 text-white px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition-all duration-300">
                        <i class="fas fa-phone mr-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
            
            <div class="text-center lg:text-right">
                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 inline-block floating-animation">
                        <i class="fas fa-passport text-8xl text-yellow-300 mb-4"></i>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold mb-2">Layanan 24/7</h3>
                            <p class="text-gray-200">Siap melayani Anda kapan saja</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-2xl text-white/70"></i>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center hover-scale">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">50,000+</h3>
                <p class="text-gray-600">Pemohon Dilayani</p>
            </div>
            <div class="text-center hover-scale">
                <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-white text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">15</h3>
                <p class="text-gray-600">Tahun Pengalaman</p>
            </div>
            <div class="text-center hover-scale">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-award text-white text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">98%</h3>
                <p class="text-gray-600">Tingkat Kepuasan</p>
            </div>
            <div class="text-center hover-scale">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-600 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-globe text-white text-2xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">24/7</h3>
                <p class="text-gray-600">Layanan Online</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="layanan" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Layanan Kami</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Kami menyediakan berbagai layanan keimigrasian yang komprehensif untuk memenuhi kebutuhan Anda</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover-scale">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-passport text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Penerbitan Paspor</h3>
                    <p class="text-gray-600 mb-6">Layanan penerbitan paspor baru, perpanjangan, dan penggantian paspor dengan proses yang cepat dan mudah.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover-scale">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-blue-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-id-card text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Visa & Izin Tinggal</h3>
                    <p class="text-gray-600 mb-6">Pengurusan visa kunjungan, tinggal terbatas, dan izin tinggal untuk warga negara asing di Indonesia.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover-scale">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Pengawasan Keimigrasian</h3>
                    <p class="text-gray-600 mb-6">Layanan pengawasan dan penegakan hukum keimigrasian untuk menjaga keamanan wilayah Indonesia.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover-scale">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-600 to-red-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-search text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Intelijen Keimigrasian</h3>
                    <p class="text-gray-600 mb-6">Layanan intelijen untuk mencegah dan mendeteksi pelanggaran keimigrasian serta ancaman keamanan.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover-scale">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Konsultasi Online</h3>
                    <p class="text-gray-600 mb-6">Layanan konsultasi dan informasi keimigrasian secara online untuk kemudahan akses informasi.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden hover-scale">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-600 to-red-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Layanan Mobile</h3>
                    <p class="text-gray-600 mb-6">Akses layanan keimigrasian melalui aplikasi mobile untuk kemudahan dan kecepatan pelayanan.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6">Siap Untuk Memulai?</h2>
        <p class="text-xl mb-8 text-gray-200 max-w-2xl mx-auto">
            Dapatkan layanan keimigrasian terbaik dengan proses yang mudah, cepat, dan terpercaya. Tim profesional kami siap membantu Anda.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('login') }}" class="bg-white text-purple-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-sign-in-alt mr-2"></i>Mulai Sekarang
            </a>
            <a href="{{ route('kontak') }}" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-purple-600 transition-all duration-300">
                <i class="fas fa-phone mr-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection