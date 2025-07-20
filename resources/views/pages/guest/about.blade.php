@extends('layouts.guest')

@section('title', 'Tentang Kami - Imigrasi Kelas I TPI Banjarmasin')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Tentang Kami</h1>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                Mengenal lebih dekat Imigrasi Kelas I TPI Banjarmasin, sejarah, visi misi, dan komitmen kami dalam melayani masyarakat
            </p>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
            <div>
                <h2 class="text-4xl font-bold text-gray-800 mb-6">Sejarah Singkat</h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Kantor Imigrasi Kelas I TPI Banjarmasin didirikan pada tahun 2009 sebagai bagian dari upaya pemerintah untuk meningkatkan pelayanan keimigrasian di wilayah Kalimantan Selatan. Sejak berdiri, kami telah berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat.
                </p>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Dengan wilayah kerja yang meliputi seluruh Provinsi Kalimantan Selatan, kami telah melayani ribuan pemohon dari berbagai kalangan, mulai dari masyarakat umum hingga pelaku bisnis internasional.
                </p>
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-calendar text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Didirikan Tahun 2009</h4>
                        <p class="text-gray-600">15+ tahun melayani masyarakat</p>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-8 text-white">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <i class="fas fa-users text-4xl mb-3"></i>
                            <h3 class="text-2xl font-bold">50,000+</h3>
                            <p class="text-blue-100">Pemohon Dilayani</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-globe text-4xl mb-3"></i>
                            <h3 class="text-2xl font-bold">120+</h3>
                            <p class="text-blue-100">Negara Tujuan</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-award text-4xl mb-3"></i>
                            <h3 class="text-2xl font-bold">98%</h3>
                            <p class="text-blue-100">Tingkat Kepuasan</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-clock text-4xl mb-3"></i>
                            <h3 class="text-2xl font-bold">24/7</h3>
                            <p class="text-blue-100">Layanan Online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Visi & Misi</h2>
            <p class="text-xl text-gray-600">Komitmen kami dalam memberikan pelayanan keimigrasian terbaik</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Vision -->
            <div class="bg-white rounded-3xl shadow-xl p-8 hover-scale">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-eye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">VISI</h3>
                </div>
                <p class="text-lg text-gray-600 text-center leading-relaxed">
                    "Menjadi institusi keimigrasian yang profesional, modern, dan terpercaya dalam memberikan pelayanan prima kepada masyarakat serta menjaga kedaulatan dan keamanan negara."
                </p>
            </div>
            
            <!-- Mission -->
            <div class="bg-white rounded-3xl shadow-xl p-8 hover-scale">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bullseye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">MISI</h3>
                </div>
                <ul class="space-y-4 text-gray-600">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Memberikan pelayanan keimigrasian yang berkualitas, cepat, dan mudah</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Menjaga keamanan dan kedaulatan wilayah melalui pengawasan keimigrasian</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Meningkatkan profesionalisme dan integritas aparatur keimigrasian</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Mendukung pertumbuhan ekonomi dan pariwisata daerah</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Nilai-Nilai Kami</h2>
            <p class="text-xl text-gray-600">Prinsip yang menjadi pedoman dalam setiap pelayanan</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center hover-scale">
                <div class="w-24 h-24 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-handshake text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">INTEGRITAS</h3>
                <p class="text-gray-600">Menjunjung tinggi kejujuran, transparansi, dan akuntabilitas dalam setiap tindakan</p>
            </div>
            
            <div class="text-center hover-scale">
                <div class="w-24 h-24 bg-gradient-to-r from-green-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-star text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">PROFESIONAL</h3>
                <p class="text-gray-600">Memberikan pelayanan dengan keahlian tinggi dan standar kualitas terbaik</p>
            </div>
            
            <div class="text-center hover-scale">
                <div class="w-24 h-24 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-heart text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">EMPATI</h3>
                <p class="text-gray-600">Memahami dan merespons kebutuhan masyarakat dengan penuh perhatian</p>
            </div>
            
            <div class="text-center hover-scale">
                <div class="w-24 h-24 bg-gradient-to-r from-yellow-600 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-rocket text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">INOVATIF</h3>
                <p class="text-gray-600">Terus berinovasi dalam teknologi dan metode pelayanan untuk kemudahan masyarakat</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Tim Kepemimpinan</h2>
            <p class="text-xl text-gray-600">Dipimpin oleh profesional berpengalaman di bidang keimigrasian</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover-scale">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 h-32"></div>
                <div class="p-8 text-center -mt-16">
                    <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-user-tie text-4xl text-gray-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Kepala Kantor</h3>
                    <p class="text-blue-600 font-semibold mb-3">Pimpinan Utama</p>
                    <p class="text-gray-600 text-sm">Memimpin dan mengkoordinasikan seluruh kegiatan operasional kantor imigrasi</p>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover-scale">
                <div class="bg-gradient-to-r from-green-600 to-blue-600 h-32"></div>
                <div class="p-8 text-center -mt-16">
                    <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-user-tie text-4xl text-gray-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Kasubag TU</h3>
                    <p class="text-green-600 font-semibold mb-3">Tata Usaha</p>
                    <p class="text-gray-600 text-sm">Mengelola administrasi dan tata usaha untuk kelancaran operasional</p>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover-scale">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 h-32"></div>
                <div class="p-8 text-center -mt-16">
                    <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-user-tie text-4xl text-gray-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Kasi Yankum</h3>
                    <p class="text-purple-600 font-semibold mb-3">Pelayanan & Kehumasan</p>
                    <p class="text-gray-600 text-sm">Mengkoordinasikan pelayanan publik dan hubungan masyarakat</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Commitment Section -->
<section class="py-20 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-8">Komitmen Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-effect rounded-2xl p-8">
                <i class="fas fa-shield-alt text-5xl mb-6 text-yellow-300"></i>
                <h3 class="text-2xl font-bold mb-4">Keamanan Terjamin</h3>
                <p class="text-gray-200">Data dan dokumen Anda aman dengan sistem keamanan berlapis</p>
            </div>
            
            <div class="glass-effect rounded-2xl p-8">
                <i class="fas fa-clock text-5xl mb-6 text-yellow-300"></i>
                <h3 class="text-2xl font-bold mb-4">Pelayanan Cepat</h3>
                <p class="text-gray-200">Proses yang efisien dengan waktu tunggu minimal</p>
            </div>
            
            <div class="glass-effect rounded-2xl p-8">
                <i class="fas fa-thumbs-up text-5xl mb-6 text-yellow-300"></i>
                <h3 class="text-2xl font-bold mb-4">Kepuasan Terjamin</h3>
                <p class="text-gray-200">Pelayanan prima dengan tingkat kepuasan 98%</p>
            </div>
        </div>
        
        <div class="mt-12">
            <a href="{{ route('kontak') }}" class="bg-white text-purple-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-phone mr-2"></i>Hubungi Kami Sekarang
            </a>
        </div>
    </div>
</section>
@endsection