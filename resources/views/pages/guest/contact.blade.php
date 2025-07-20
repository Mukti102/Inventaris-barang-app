@extends('layouts.guest')

@section('title', 'Kontak - Imigrasi Kelas I TPI Banjarmasin')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">Hubungi Kami</h1>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                Siap membantu Anda dengan informasi dan layanan keimigrasian. Tim profesional kami siap melayani 24/7
            </p>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
            <!-- Phone -->
            <div class="bg-white rounded-3xl shadow-lg p-8 text-center hover-scale">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-phone text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Telepon</h3>
                <p class="text-gray-600 mb-4">
                    Hubungi kami langsung untuk informasi cepat
                </p>
                <a href="tel:(0511)123-4567" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors text-lg">
                    (0511) 123-4567
                </a>
            </div>

            <!-- Email -->
            <div class="bg-white rounded-3xl shadow-lg p-8 text-center hover-scale">
                <div class="w-20 h-20 bg-gradient-to-r from-green-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-envelope text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Email</h3>
                <p class="text-gray-600 mb-4">
                    Kirim pertanyaan detail melalui email
                </p>
                <a href="mailto:info@imigrasi-bjm.go.id" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors text-lg">
                    info@imigrasi-bjm.go.id
                </a>
            </div>

            <!-- Location -->
            <div class="bg-white rounded-3xl shadow-lg p-8 text-center hover-scale">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-map-marker-alt text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Alamat</h3>
                <p class="text-gray-600 mb-4">
                    Kunjungi kantor kami langsung
                </p>
                <p class="text-blue-600 font-semibold text-lg">
                    Jl. Ahmad Yani No. 123<br>
                    Banjarmasin, Kalimantan Selatan
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Map Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-3xl shadow-xl p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Kirim Pesan</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="alamat@email.com">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" id="telepon" name="telepon" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="08xxxxxxxxxx">
                        </div>
                        <div>
                            <label for="layanan" class="block text-sm font-medium text-gray-700 mb-2">Jenis Layanan</label>
                            <select id="layanan" name="layanan" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                <option value="">Pilih Layanan</option>
                                <option value="paspor">Penerbitan Paspor</option>
                                <option value="visa">Visa & Izin Tinggal</option>
                                <option value="pengawasan">Pengawasan Keimigrasian</option>
                                <option value="intelijen">Intelijen Keimigrasian</option>
                                <option value="konsultasi">Konsultasi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label for="pesan" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..."></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- Map & Office Hours -->
            <div class="space-y-8">
                <!-- Map -->
                <div class="bg-white rounded-3xl shadow-xl p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Lokasi Kami</h3>
                    <div class="bg-gray-200 rounded-2xl h-64 flex items-center justify-center">
                        <div class="text-center text-gray-500">
                            <i class="fas fa-map text-4xl mb-4"></i>
                            <p class="text-lg font-semibold">Peta Lokasi</p>
                            <p class="text-sm">Jl. Ahmad Yani No. 123, Banjarmasin</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="https://maps.google.com" target="_blank" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold transition-colors">
                            <i class="fas fa-external-link-alt mr-2"></i>Buka di Google Maps
                        </a>
                    </div>
                </div>

                <!-- Office Hours -->
                <div class="bg-white rounded-3xl shadow-xl p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Jam Operasional</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="font-medium text-gray-700">Senin - Kamis</span>
                            <span class="text-blue-600 font-semibold">08:00 - 16:00</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="font-medium text-gray-700">Jumat</span>
                            <span class="text-blue-600 font-semibold">08:00 - 16:30</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="font-medium text-gray-700">Sabtu</span>
                            <span class="text-gray-500">Tutup</span>
                        </div>
                        <div class="flex justify-between items-center py-3">
                            <span class="font-medium text-gray-700">Minggu & Libur</span>
                            <span class="text-gray-500">Tutup</span>
                        </div>
                    </div>
                    <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                        <p class="text-sm text-blue-800">
                            <i class="fas fa-info-circle mr-2"></i>
                            <strong>Catatan:</strong> Layanan online tersedia 24/7 melalui website resmi kami.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Pertanyaan Umum</h2>
            <p class="text-xl text-gray-600">Jawaban untuk pertanyaan yang sering diajukan</p>
        </div>
        
        <div class="space-y-4">
            <div class="bg-white rounded-2xl shadow-lg">
                <button class="w-full p-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors rounded-2xl faq-toggle">
                    <span class="text-lg font-semibold text-gray-800">Berapa lama proses pembuatan paspor?</span>
                    <i class="fas fa-chevron-down text-blue-600 transform transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 faq-content hidden">
                    <p>Proses pembuatan paspor biasanya memakan waktu 3-5 hari kerja untuk paspor biasa dan 1-2 hari kerja untuk paspor percepatan (dengan biaya tambahan).</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg">
                <button class="w-full p-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors rounded-2xl faq-toggle">
                    <span class="text-lg font-semibold text-gray-800">Dokumen apa saja yang diperlukan untuk membuat paspor?</span>
                    <i class="fas fa-chevron-down text-blue-600 transform transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 faq-content hidden">
                    <p>Dokumen yang diperlukan: KTP asli dan fotokopi, Kartu Keluarga asli dan fotokopi, Akta Kelahiran asli dan fotokopi, pas foto 4x6 cm (2 lembar), dan mengisi formulir permohonan.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg">
                <button class="w-full p-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors rounded-2xl faq-toggle">
                    <span class="text-lg font-semibold text-gray-800">Apakah bisa membuat paspor tanpa antri?</span>
                    <i class="fas fa-chevron-down text-blue-600 transform transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 faq-content hidden">
                    <p>Ya, Anda dapat membuat janji temu online melalui website resmi kami atau menggunakan layanan paspor percepatan untuk menghindari antrian panjang.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg">
                <button class="w-full p-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors rounded-2xl faq-toggle">
                    <span class="text-lg font-semibold text-gray-800">Berapa biaya pembuatan paspor?</span>
                    <i class="fas fa-chevron-down text-blue-600 transform transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 faq-content hidden">
                    <p>Biaya pembuatan paspor biasa adalah Rp 350.000 untuk 48 halaman dan Rp 655.000 untuk 24 halaman. Untuk layanan percepatan dikenakan biaya tambahan Rp 200.000.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg">
                <button class="w-full p-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors rounded-2xl faq-toggle">
                    <span class="text-lg font-semibold text-gray-800">Apakah ada layanan visa untuk turis asing?</span>
                    <i class="fas fa-chevron-down text-blue-600 transform transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 faq-content hidden">
                    <p>Ya, kami melayani berbagai jenis visa termasuk visa kunjungan, visa tinggal terbatas, dan visa tinggal tetap. Silakan hubungi kami untuk informasi lebih detail mengenai persyaratan masing-masing jenis visa.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg">
                <button class="w-full p-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors rounded-2xl faq-toggle">
                    <span class="text-lg font-semibold text-gray-800">Bagaimana cara melakukan perpanjangan paspor?</span>
                    <i class="fas fa-chevron-down text-blue-600 transform transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 faq-content hidden">
                    <p>Paspor tidak dapat diperpanjang. Jika masa berlaku paspor habis atau hampir habis (kurang dari 6 bulan), Anda harus mengajukan penggantian paspor baru dengan membawa dokumen yang sama seperti pembuatan paspor pertama kali.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Contact Section -->
<section class="py-20 bg-red-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-white rounded-3xl shadow-xl p-8">
            <div class="w-20 h-20 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-exclamation-triangle text-white text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Kontak Darurat</h3>
            <p class="text-gray-600 mb-6">
                Untuk situasi darurat keimigrasian di luar jam operasional
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-semibold text-gray-800 mb-2">Hotline 24 Jam</h4>
                    <a href="tel:119" class="text-red-600 font-bold text-xl hover:text-red-800 transition-colors">
                        119
                    </a>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 mb-2">WhatsApp Darurat</h4>
                    <a href="https://wa.me/628115551234" class="text-red-600 font-bold text-xl hover:text-red-800 transition-colors">
                        +62 811-555-1234
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// FAQ Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqToggles = document.querySelectorAll('.faq-toggle');
    
    faqToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Close all other FAQ items
            faqToggles.forEach(otherToggle => {
                if (otherToggle !== this) {
                    const otherContent = otherToggle.nextElementSibling;
                    const otherIcon = otherToggle.querySelector('i');
                    otherContent.classList.add('hidden');
                    otherIcon.classList.remove('rotate-180');
                }
            });
            
            // Toggle current FAQ item
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>

@endsection