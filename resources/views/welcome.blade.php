<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPBD Kudus - Sigap Tanggap Bencana</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="icon" type="image/png" href="{{ asset('images/logobpbd3.png') }}">



    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #fc4f05 35%, #1e3b8a 100%);
        }

        .stat-card {
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .gallery-img {
            transition: transform 0.3s ease;
        }

        .gallery-img:hover {
            transform: scale(1.05);
        }
    </style>

</head>

<body class="bg-gray-50">

    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo dan Nama BPBD -->
                <a href="{{ url('/') }}" class="flex items-center space-x-4 hover:opacity-80 transition-opacity">
                    <img src="{{ asset('images/logobpbd3.png') }}" alt="Logo BPBD" class="h-10">
                    <span class="font-bold text-xl text-blue-900">BPBD Kudus</span>
                </a>

                <!-- Menu untuk Desktop -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#dokumentasi" class="text-gray-700 hover:text-blue-600">Dokumentasi</a>
                    <a href="#kontak" class="text-gray-700 hover:text-blue-600">Kontak</a>
                    <a href="{{ url('/download/surat') }}   " class="text-gray-700 hover:text-blue-600">Surat
                        Permohonan</a>
                    <a href="{{ url('/admin/login') }}" class="text-gray-700 hover:text-blue-600">Masuk</a>
                    <a href="{{ route('form') }}" style="background-color: #fc4f05;"
                        class="text-white px-6 py-2 rounded-full hover:bg-opacity-90 transition duration-300">
                        Pengajuan Kunjungan
                    </a>
                </div>

                <!-- Tombol Toggle untuk Mobile -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700 hover:text-blue-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Menu untuk Mobile (Akan Muncul Saat Tombol Toggle Diklik) -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="flex flex-col space-y-4 mt-4">
                    <a href="#dokumentasi" class="text-gray-700 hover:text-blue-600">Dokumentasi</a>
                    <a href="#kontak" class="text-gray-700 hover:text-blue-600">Kontak</a>
                    <a href="{{ url('/download/surat') }}"" class="text-gray-700 hover:text-blue-600">Surat
                        Permohonan</a>
                    <a href="{{ url('/admin/login') }}" class="text-gray-700 hover:text-blue-600">Masuk</a>
                    <a href="{{ route('form') }}" style="background-color: #fc4f05;"
                        class="text-white px-6 py-2 rounded-full hover:bg-opacity-90 transition duration-300">
                        Pengajuan Kunjungan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Script untuk Toggle Menu Mobile -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>

    <!-- Hero Section -->
    <section id="beranda" class="hero-gradient pt-24">
        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/3 flex justify-center items-center mb-8 md:mb-0" data-aos="fade-right">
                    <img src="{{ asset('images/logobpbd3.png') }}" alt="BPBD Logo"
                        class="rounded-lg shadow-xl w-64 h-64 md:w-72 md:h-72 object-contain">
                </div>
                <div class="md:w-2/3 text-white pl-0 md:pl-8" data-aos="fade-left">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Sigap Tanggap Bencana</h1>
                    <p class="text-xl mb-8">Melindungi dan melayani masyarakat Kudus dengan kesiapsiagaan dan penanganan
                        bencana yang profesional.</p>
                </div>
            </div>
        </div>
        <div class="wave-bottom -mb-6"> <!-- Added negative margin to bring sections closer -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-10 bg-white"> <!-- Reduced padding from py-16 to py-10 -->
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="stat-card bg-blue-50 p-6 rounded-xl text-center" data-aos="fade-up">
                    <h3 class="text-4xl font-bold text-blue-600 mb-2">24/7</h3>
                    <p class="text-gray-600">Layanan Darurat</p>
                </div>
                <div class="stat-card bg-green-50 p-6 rounded-xl text-center" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-4xl font-bold text-green-600 mb-2">500+</h3>
                    <p class="text-gray-600">Relawan Aktif</p>
                </div>
                <div class="stat-card bg-yellow-50 p-6 rounded-xl text-center" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-4xl font-bold text-yellow-600 mb-2">1000+</h3>
                    <p class="text-gray-600">Misi Selesai</p>
                </div>
                <div class="stat-card bg-red-50 p-6 rounded-xl text-center" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-4xl font-bold text-red-600 mb-2">50+</h3>
                    <p class="text-gray-600">Kerjasama Instansi</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Layanan Section -->
    <section id="layanan" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Layanan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up">
                    <div class="bg-blue-100 p-4 rounded-full w-16 h-16 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Tanggap Darurat</h3>
                    <p class="text-gray-600">Penanganan cepat dan profesional untuk setiap situasi darurat bencana.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-green-100 p-4 rounded-full w-16 h-16 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Edukasi Bencana</h3>
                    <p class="text-gray-600">Program edukasi dan pelatihan untuk meningkatkan kesiapsiagaan masyarakat.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-yellow-100 p-4 rounded-full w-16 h-16 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Mitigasi Bencana</h3>
                    <p class="text-gray-600">Upaya pencegahan dan pengurangan risiko dampak bencana.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8" data-aos="fade-up">Layanan Online</h2>
            <p class="text-xl text-gray-600 mb-10 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Akses layanan BPBD Kudus secara online untuk pengajuan kunjungan dan unduh format surat permohonan
                resmi.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-6 mt-8" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('form') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-white rounded-lg shadow-lg"
                    style="background-color: #fc4f05;">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                    Pengajuan Kunjungan
                </a>
                <a href="{{ url('/download/surat') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download Format Surat
                </a>
            </div>
        </div>
    </section>

    <!-- Dokumentasi Section -->
    <section id="dokumentasi" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Dokumentasi Kegiatan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Gallery Item 1 -->
                <div class="space-y-4" data-aos="fade-up">
                    <div class="overflow-hidden rounded-xl">
                        <img src="{{ asset('images/kegiatan1.webp') }}" alt="Kegiatan 1"
                            class="gallery-img w-full h-64 object-cover">
                    </div>
                    <h3 class="text-xl font-bold">Edukasi Bencana</h3>
                    <p class="text-gray-600">Program edukasi rutin untuk meningkatkan pengetahuan akan bencana.</p>
                    <p class="text-sm text-gray-500">20 Januari 2025</p>
                </div>
                <!-- Gallery Item 2 -->
                <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="overflow-hidden rounded-xl">
                        <img src="{{ asset('images/kegiatan2.webp') }}" alt="Kegiatan 2"
                            class="gallery-img w-full h-64 object-cover">
                    </div>
                    <h3 class="text-xl font-bold">Bantuan Bencana</h3>
                    <p class="text-gray-600">Bantuan penanganan bencana bersama masyarakat dan stakeholder terkait.</p>
                    <p class="text-sm text-gray-500">15 Januari 2025</p>
                </div>
                <!-- Gallery Item 3 -->
                <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="overflow-hidden rounded-xl">
                        <img src="{{ asset('images/kegiatan3.webp') }}" alt="Kegiatan 3"
                            class="gallery-img w-full h-64 object-cover">
                    </div>
                    <h3 class="text-xl font-bold">Sosialisasi Kebencanaan</h3>
                    <p class="text-gray-600">Edukasi masyarakat tentang kesiapsiagaan menghadapi bencana.</p>
                    <p class="text-sm text-gray-500">10 Januari 2025</p>
                </div>
            </div>
            {{-- <div class="text-center mt-12">
                <a href="{{ route('form') }}"

                <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-300">
                    Pengajuan Kunjungan
                </button>
                </a>
            </div> --}}
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div data-aos="fade-right">
                    <h2 class="text-3xl font-bold mb-6">Hubungi Kami</h2>
                    <p class="text-gray-600 mb-8">Untuk informasi lebih lanjut atau bantuan darurat, silakan hubungi
                        kami melalui:</p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold">Nomor Darurat</h3>
                                <p class="text-gray-600">0811-2996-112</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold">Email</h3>
                                <p class="text-gray-600">info@bpbdkudus.go.id</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold">Alamat</h3>
                                <p class="text-gray-600">Jl. PG Rendeng, Mlati Norowito, Kec. Kota Kudus, Kabupaten
                                    Kudus, Jawa Tengah 59319</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <form action="{{ route('feedback.store') }}" method="POST"
                        class="bg-white p-8 rounded-xl shadow-lg">
                        @csrf
                        <h3 class="text-2xl font-bold mb-6">Kritik & Saran</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-2" for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="email">Email</label>
                                <input type="email" name="email"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="subjek">Subjek</label>
                                <input type="text" name="subjek"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="pesan">Pesan</label>
                                <textarea rows="4" name="pesan"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('pesan') }}</textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-4 mb-6">
                        <img src="{{ asset('images/logobpbd3.png') }}" alt="Logo BPBD" class="h-10">
                        <span class="font-bold text-xl">BPBD Kudus</span>
                    </div>
                    <p class="text-blue-200">Melindungi dan melayani masyarakat Kudus dengan kesiapsiagaan dan
                        penanganan bencana yang profesional.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-200 hover:text-white">Beranda</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Tentang Kami</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Layanan</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Dokumentasi</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-200 hover:text-white">Tanggap Darurat</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Edukasi Bencana</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Mitigasi Bencana</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Relawan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Media Sosial</h4>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/bpbdkuduskab/?locale=id_ID"
                            class="bg-blue-800 p-2 rounded-full hover:bg-blue-700 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="https://x.com/bpbdkudus"
                            class="bg-blue-800 p-2 rounded-full hover:bg-blue-700 transition duration-300">
                            {{-- <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg> --}}
                            @svg('bi-twitter-x')
                        </a>
                        <a href="https://www.instagram.com/bpbdkudus/?hl=id"
                            class="bg-blue-800 p-2 rounded-full hover:bg-blue-700 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.897 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.897-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/channel/UC-ld4aBDiY7YVZibXBacY7A"
                            class="bg-blue-800 p-2 rounded-full hover:bg-blue-700 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                            </svg>
                        </a>
                        {{-- <a href="https://www.youtube.com/channel/UC-ld4aBDiY7YVZibXBacY7A" class="bg-blue-800 p-2 rounded-full hover:bg-blue-700 transition duration-300">
                            
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                            </svg>
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-800 mt-8 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-blue-200">© 2025 BPBD Kudus. Hak Cipta Dilindungi.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-blue-200 hover:text-white">Kebijakan Privasi</a>
                        <a href="#" class="text-blue-200 hover:text-white">Syarat & Ketentuan</a>
                        <a href="https://maps.app.goo.gl/TqL4Cp4HJXyz1suo8"
                            class="text-blue-200 hover:text-white">Peta Situs</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg hidden hover:bg-blue-700 transition duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Back to Top Button
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth Scroll for Navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Mobile Navigation Toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Form Submission Handler
        // const contactForm = document.querySelector('form');
        // if (contactForm) {
        //     contactForm.addEventListener('submit', (e) => {
        //         e.preventDefault();
        //         // Add your form submission logic here
        //         alert('/Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');
        //         contactForm.reset();
        //     });
        // }

        // Add loading animation for images
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                img.addEventListener('load', () => {
                    img.classList.add('loaded');
                });
            });
        });

        // Add intersection observer for better performance
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.gallery-img').forEach((img) => {
            observer.observe(img);
        });
    </script>


</body>

</html>
