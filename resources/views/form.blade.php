<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Kunjungan Edukasi - BPBD Kudus</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logobpbd3.png') }}">

    <style>
        .hero-pattern {
            background-color: #f8fafc;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23e2e8f0' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="hero-pattern min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-10">
            <img src="{{ asset('images/logobpbd3.png') }}" alt="Logo BPBD Kudus" class="mx-auto mb-4 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Pengajuan Kunjungan Edukasi</h1>
            <p class="text-gray-600">Badan Penanggulangan Bencana Daerah Kabupaten Kudus</p>
        </div>

        <!-- Main Form -->
        <div class="bg-white rounded-lg shadow-xl p-6 md:p-8 max-w-4xl mx-auto">
            <form id="visitForm" action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Informasi Pengajuan -->
                <div class="bg-blue-50 p-4 rounded-lg mb-6">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Informasi Pengajuan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="visit_date">
                                Tanggal Kunjungan*
                            </label>
                            <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="waktu_kunjungan">
                                Waktu Kunjungan*
                            </label>
                            <select id="waktu_kunjungan" name="waktu_kunjungan" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="09.00 WIB">09.00 WIB</option>
                                
                                {{-- @foreach($waktuKunjunganOptions as $waktu)
                                    <option value="{{ $waktu->waktu_kunjungan }}">
                                        {{ \Carbon\Carbon::parse($waktu->waktu_kunjungan)->format('H:i') }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Informasi Instansi -->
                <div class="bg-green-50 p-4 rounded-lg mb-6">
                    <h2 class="text-xl font-semibold text-green-800 mb-4">Informasi Instansi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="institution">
                                Nama Instansi*
                            </label>
                            <input type="text" id="instansi" name="instansi" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="jenis_instansi">
                                Jenis Instansi*
                            </label>
                            <select id="jenis_instansi" name="jenis_instansi" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Jenis Instansi</option>
                                <option value="sekolah">Sekolah</option>
                                <option value="universitas">Universitas</option>
                                <option value="pemerintah">Instansi Pemerintah</option>
                                <option value="swasta">Instansi Swasta</option>
                                <option value="komunitas">Komunitas</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2" for="alamat">
                                Alamat Instansi*
                            </label>
                            <textarea id="alamat" name="alamat" rows="3" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Informasi Penanggung Jawab -->
                <div class="bg-purple-50 p-4 rounded-lg mb-6">
                    <h2 class="text-xl font-semibold text-purple-800 mb-4">Informasi Penanggung Jawab</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="nama_pj">
                                Nama Lengkap*
                            </label>
                            <input type="text" id="nama_pj" name="nama_pj" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="jabatan_pj">
                                Jabatan*
                            </label>
                            <input type="text" id="jabatan_pj" name="jabatan_pj" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="phone">
                                Nomor Telepon/WhatsApp*
                            </label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="email">
                                Email*
                            </label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                    </div>
                </div>

                <!-- Informasi Kunjungan -->
                <div class="bg-orange-50 p-4 rounded-lg mb-6">
                    <h2 class="text-xl font-semibold text-orange-800 mb-4">Informasi Kunjungan</h2>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="jumlah_peserta">
                                Jumlah Peserta*
                            </label>
                            <input type="number" id="jumlah_peserta" name="jumlah_peserta" min="1" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="tujuan_kunjungan">
                                Tujuan Kunjungan*
                            </label>
                            <textarea id="tujuan_kunjungan" name="tujuan_kunjungan" rows="3" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Informasi Status dan Catatan -->
<div class="bg-yellow-50 p-4 rounded-lg mb-6">
    <h2 class="text-xl font-semibold text-yellow-800 mb-4">Catatan</h2>
    <div class="grid grid-cols-1 gap-6">
        <!-- Field Status -->
        {{-- <div>
            <label class="block text-gray-700 font-medium mb-2" for="status">
                Status Pengajuan*
            </label>
            <select id="status" name="status" required
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                <option value="pending">Pending</option>
                <option value="approved">Disetujui</option>
                <option value="rejected">Ditolak</option>
            </select>
        </div> --}}

        <!-- Field Catatan -->
        <div>
            <label class="block text-gray-700 font-medium mb-2" for="catatan">
            
            </label>
            <textarea id="catatan" name="catatan" rows="3"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"></textarea>
        </div>
    </div>
</div>

                <!-- Dokumen Pendukung -->
                <div class="bg-red-50 p-4 rounded-lg mb-6">
                    <h2 class="text-xl font-semibold text-red-800 mb-4">Dokumen Pendukung</h2>
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="surat_permohonan">
                                Surat Permohonan Kunjungan*
                            </label>
                            <input type="file" id="surat_permohonan" name="surat_permohonan" accept=".pdf,.doc,.docx" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                            <p class="text-sm text-gray-500 mt-1">Format: PDF, DOC, atau DOCX (Maks. 2MB)</p>
                        </div>
                    </div>
                </div>



                <!-- Terms and Submit -->
                <div class="space-y-4">
                    <div class="flex items-start space-x-2">
                        <input type="checkbox" id="terms" name="terms" required
                            class="mt-1 rounded text-blue-500 focus:ring-blue-500">
                        <label for="terms" class="text-sm text-gray-600">
                            Saya menyatakan bahwa data yang diisi adalah benar dan bersedia mengikuti ketentuan kunjungan yang berlaku di BPBD Kudus
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300 font-medium">
                        Ajukan Kunjungan
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-gray-600">
            <p>© 2025 BPBD Kabupaten Kudus. Semua hak dilindungi.</p>
        </div>
    </div>
    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif
    
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif
    
        @if($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <script>
    document.getElementById('visitForm').addEventListener('submit', function(e) {
    // Validate file size
    const supportLetter = document.getElementById('surat_permohonan').files[0];
    if (supportLetter && supportLetter.size > 2 * 1024 * 1024) {
        e.preventDefault();
        alert('Ukuran file tidak boleh lebih dari 2MB');
        return;
    }

        });

        // Disable past dates in date picker
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_kunjungan').setAttribute('min', today);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cek apakah ada flash message 'success'
            @if(session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6',
                    timer: 5000,
                    timerProgressBar: true
                });
            @endif
    
            // Cek apakah ada flash message 'error'
            @if(session('error'))
                Swal.fire({
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#d33',
                    timer: 5000,
                    timerProgressBar: true
                });
            @endif
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>