<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Pendaftaran KKN INSAN 2024</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item ms-4">
                    <img src="{{ asset('images/logo/LOGO INSAN.png') }}" class="rounded-full w-12 h-12 object-cover" alt="Avatar" loading="lazy" />
                </li>
                <li class="nav-item ms-4">
                    @if (Auth::check())
                    <span class="text-blue-500 hover:underline">
                        Hi, {{ Auth::user()->nama }}
                    </span>
                    @endif
                </li>
            </ul>
            
            <ul class="navbar-nav me-4">
                <li class="nav-item">
                    <div class="flex space-x-4">
                        <li class="nav-item">
                            <div class="flex space-x-6">
                                <!-- Tombol Pengumuman -->
                                <a href="{{ route('mahasiswa.pengumuman') }}" class="flex justify-center rounded-md bg-white px-3 py-1.5 text-sm font-semibold text-black shadow-sm hover:bg-indigo-500">
                                    Pengumuman
                                </a>

                                <!-- Tombol Logout -->
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex justify-center rounded-md bg-white px-3 py-1.5 text-sm font-semibold text-black shadow-sm hover:bg-indigo-500">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </li>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="flex-grow" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ url('/mahasiswa/kkn') }}" method="POST" class="border border-gray-300 rounded-lg p-3 shadow-md bg-transparent" style="margin-top: 10px;">
                    @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <h2 class="mt-1 text-center text-2xl font-bold tracking-tight text-gray-900">PENDAFTARAN KKN 2024</h2>
                        </div>
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <p style="color: #727272">REGIONAL, NASIONAL DAN INTERNASIONAL</p>
                        </div>
                        <br>
                        <div>
                            @if(session('success'))
                                <div class="alert alert-info">
                                    {!! session('success') !!}
                                </div>
                            @endif
                
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="nama" class="form-label block text-sm font-medium leading-6 text-gray-900">Nama</label>
                                <div class="mt-2">
                                    <input name="nama" type="text" value="{{ Auth::user()->nama }}" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                        </div>
                
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="nim" class="form-label block text-sm font-medium leading-6 text-gray-900">Nomor Induk Mahasiswa / ID</label>
                            <div class="mt-2">
                                <input name="nim" value="{{ Auth::user()->nim }}" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" placeholder="Masukkan Email" autocomplete="email" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label block text-sm font-medium leading-6 text-gray-900" for="program_studi">Program Studi</label>
                            <select class="form-select block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="program_studi" required>
                                <option value="Pendidikan Agama Islam">S-1 Pendidikan Agama Islam</option>
                                <option value="PIAUD">S-1 PIAUD</option>
                                <option value="Hukum Keluarga">S-1 Hukum Keluarga</option>
                                <option value="Hukum Ekonomi Syariah">S-1 Hukum Ekonomi Syariah</option>
                                <option value="Perbankan Syariah">S-1 Perbankan Syariah</option>
                                <option value="Ekonomi Syariah">S-1 Ekonomi Syariah</option>
                            </select>
                        </div>
                        
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label block text-sm font-medium leading-6 text-gray-900" for="fakultas">Fakultas</label>
                            <select class="form-select block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="fakultas" required>
                                <option value="KKN Regional">Fakultas Ekonomi dan Bisnis Islam</option>
                                <option value="KKN Nasional">Fakultas Ilmu Tarbiyah dan Keguruan</option>
                                <option value="KKN Internasional">Fakultas Syariah dan Hukum</option>
                            </select>
                        </div>
                        
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label block text-sm font-medium leading-6 text-gray-900" for="jenis_kkn">Jenis KKN</label>
                            <select class="form-select block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="jenis_kkn" required>
                                <option value="KKN Regional">KKN Regional</option>
                                <option value="KKN Nasional">KKN Nasional</option>
                                <option value="KKN Internasional">KKN Internasional</option>
                            </select>
                        </div>
                        
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="alamat" class="form-label block text-sm font-medium leading-6 text-gray-900">Alamat / Domisili</label>
                            <div class="mt-2">
                                <input name="alamat_domisili" placeholder="Masukkan Alamat/Domisili" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="tempat_tanggal_lahir" class="form-label block text-sm font-medium leading-6 text-gray-900">Tempat Tanggal Lahir</label>
                            <div class="mt-2">
                                <input name="tempat_tanggal_lahir" placeholder="Masukkan Tempat Tanggal Lahir" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label block text-sm font-medium leading-6 text-gray-900" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-select block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="jenis_kelamin" required>
                                <option value="KKN Regional">Laki-Laki</option>
                                <option value="KKN Nasional">Perempuan</option>
                            </select>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="nomor_handphone" class="form-label block text-sm font-medium leading-6 text-gray-900">Nomor Handphone</label>
                            <div class="mt-2">
                                <input name="nomor_handphone" placeholder="Masukkan Nomor Handphone" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="ipk" class="form-label block text-sm font-medium leading-6 text-gray-900">IPK</label>
                            <div class="mt-2">
                                <input name="ipk" placeholder="Masukkan IPK Terakhir" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                                
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-success flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </section>
    
    <!-- <section class="vh-100" style="margin-top: 40px;">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div>
                        @if(session('success'))
                            <div class="alert alert-info">
                                {!! session('success') !!}
                            </div>
                        @endif
            
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <h5 class="fw-bold">PENDAFTARAN KKN 2024</h5>
                    <p style="color: #727272">REGIONAL, NASIONAL DAN INTERNASIONAL</p>
                    <form action="{{ url('/mahasiswa/kkn') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" value="{{ Auth::user()->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" id="nim" class="form-control" value="{{ Auth::user()->nim }}">
                    </div>
                    <div class="mb-3">
                        <label for="program_studi" class="form-label">Program Studi</label>
                        <select name="program_studi" class="form-control" required>
                            <option value="Pendidikan Agama Islam">S-1 Pendidikan Agama Islam</option>
                            <option value="PIAUD">S-1 PIAUD</option>
                            <option value="Hukum Keluarga">S-1 Hukum Keluarga</option>
                            <option value="Hukum Ekonomi Syariah">S-1 Hukum Ekonomi Syariah</option>
                            <option value="Perbankan Syariah">S-1 Perbankan Syariah</option>
                            <option value="Ekonomi Syariah">S-1 Ekonomi Syariah</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kkn" class="form-label">Jenis KKN</label>
                        <select name="jenis_kkn" class="form-control" required>
                            <option value="KKN Regional">KKN Regional</option>
                            <option value="KKN Nasional">KKN Nasional</option>
                            <option value="KKN Internasional">KKN Internasional</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Daftar</button>
                    </div>
                </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </section> -->

    <hr>
    <div class="container panduan-kkn" style="margin-bottom:50px;">
            <h6 class="fw-bold mt-4" style="text-align: center">PANDUAN DAN KETENTUAN UMUM KKN 2024</h6>
            <br>
            <div class="space-y-4">
                <!-- Item 1 -->
                <div class="border border-gray-300 rounded">
                    <button
                    class="w-full text-left px-4 py-2 font-semibold focus:outline-none flex justify-between"
                    onclick="toggleAccordion('accordion1')"
                    >
                    KKN REGULER 2024
                    </button>
                    <div id="accordion1" class="px-4 py-2 hidden ">
                        <div class="accordion-body">
                            <p>KKN Reguler merupakan proses pembelajaran inovatif mahasiswa melalui berbagai kegiatan langsung di tengah-tengah masyarakat, dan mahasiswa berupaya untuk menjadi bagian dari masyarakat serta secara aktif dan kreatif terlibat dalam dinamika yang terjadi di masyarakat sebagai penggerak pembangunan desa, dilaksanakan selama 30 hari, Lokasi pelaksanaannya di Kabupaten Langkat, Kabupaten Deli Serdang dan Kotamadya Medan</p>
                            <br>
                            <h6 class="fw-bold">Waktu Pendaftaran       : 25 Juni 2024 - 25 Juli 2024</h6>
                            <h6 class="fw-bold">Waktu Pelaksanaan KKN   : 01 Agustus 2024 - 30 Agustus 2024</h6>
                            <h6 class="fw-bold">Biaya Pelaksanaan KKN   : Rp. 450.000</h6>
                            <br>
                            <h6 class="fw-bold">Persyaratan Peserta :</h6>
                            <p>1. Hanya Untuk Mahasiswa Semester 7, 8 dan 9
                            <br>2. Bersedia mengikuti pembekalan KKN</p>
                            <br>
                            <h6 class="fw-bold">Tata Cara Pembayaran    :</h6>
                            <h6>1. Pembayaran WAJIB dilakukan HANYA MELALUI TELLER BANK (Tidak Boleh Menggunakan Platform Lain)</h6>
                            <h6>2. Harap lakukan pembayaran sebesar Rp. 450.000 ke rekening berikut : </h6>
                            <h6 style="padding-left: 20px;">   - Bank Syariah Indonesia (BSI)</h6>
                            <h6 style="padding-left: 20px;">   - Nomor Rekening         : 1046906515 </h6>
                            <h6 style="padding-left: 20px;">   - Nama Pemilik Rekening  : Yayasan Al Ishlahiyah Binjai</h6>
                            <h6>3. Setelah melakukan pembayaran, Teller Bank akan menyerahkan Receipt atau Bukti Pembayaran kepada peserta KKN</h6>
                            <h6>4. Harap bukti bayar tersebut disimpan untuk melengkapi berkas pendaftaran KKN.</h6>
                            <h6></h6>
                            <br>
                            <h6 class="fw-bold">Lokasi Pelaksanaan :</h6>
                            <h6>1. Kabupaten Langkat</h6>
                            <h6>2. Kabupaten Deli Serdang</h6>
                            <h6>3. Kotamadya Medan</h6>
                            <br>
                        </div>                    
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="border border-gray-300 rounded">
                    <button
                    class="w-full text-left px-4 py-2 font-semibold focus:outline-none flex justify-between"
                    onclick="toggleAccordion('accordion2')"
                    >
                    KKN NASIONAL 2024
                    </button>
                    <div id="accordion2" class="px-4 py-2 hidden">
                        <div class="accordion-body">
                            <p>KKN Nasional merupakan proses pembelajaran inovatif mahasiswa yang berkolaborasi dengan perguruan tinggi lain dan berlokasi di luar Sumatera Utara, dilaksanakan selama 30 hari, Lokasi pelaksanaannya di Kabupaten Aceh Tamiang, dan Kotamadya Langsa Provinsi Aceh.</p>
                            <br>
                            <h6 class="fw-bold">Waktu Pendaftaran       : 25 Juni 2024 - 25 Juli 2024</h6>
                            <h6 class="fw-bold">Waktu Pelaksanaan KKN   : 01 Agustus 2024 - 30 Agustus 2024</h6>
                            <h6 class="fw-bold">Biaya Pelaksanaan KKN   : Rp. 450.000</h6>
                            <br>
                            <h6 class="fw-bold">Persyaratan Peserta</h6>
                            <p>1. Hanya Untuk Mahasiswa Semester 7, 8 dan 9
                            <br>2. Bersedia mengikuti pembekalan KKN</p>
                            <br>
                            <h6 class="fw-bold">Tata Cara Pembayaran    :</h6>
                            <h6>1. Pembayaran WAJIB dilakukan HANYA MELALUI TELLER BANK (Tidak Boleh Menggunakan Platform Lain)</h6>
                            <h6>2. Harap lakukan pembayaran sebesar Rp. 450.000 ke rekening berikut : </h6>
                            <h6 style="padding-left: 20px;">   - Bank Syariah Indonesia (BSI)</h6>
                            <h6 style="padding-left: 20px;">   - Nomor Rekening         : 1046906515 </h6>
                            <h6 style="padding-left: 20px;">   - Nama Pemilik Rekening  : Yayasan Al Ishlahiyah Binjai</h6>
                            <h6>3. Setelah melakukan pembayaran, Teller Bank akan menyerahkan Receipt atau Bukti Pembayaran kepada peserta KKN</h6>
                            <h6>4. Harap bukti bayar tersebut disimpan untuk melengkapi berkas pendaftaran KKN.</h6>
                            <h6></h6>
                            <br>
                            <h6 class="fw-bold">Lokasi Pelaksanaan :</h6>
                            <h6>1. Kabupaten Aceh Tamiang</h6>
                            <h6>2. Kotamadya Langsa Provinsi Aceh</h6>
                            <br>
                        </div>                    
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="border border-gray-300 rounded">
                    <button
                    class="w-full text-left px-4 py-2 font-semibold focus:outline-none flex justify-between"
                    onclick="toggleAccordion('accordion3')"
                    >
                    KKN INTERNASIONAL 2024
                    </button>
                    <div id="accordion3" class="px-4 py-2 hidden">
                        <div class="accordion-body">
                            <p>Kuliah Kerja Nyata (KKN) Internasional adalah salah satu bentuk implementasi dari LPPM INSAN. KKN Internasional yang diselenggarakan oleh LPPM merupakan kegiatan intrakurikuler mahasiswa yang telah memenuhi persyaratan dan lulus seleksi sebagai peserta KKN Internasional.</p>
                            <p>Program KKN Internasional adalah bentuk kegiatan pengabdian masyarakat yang dilakukan oleh mahasiswa agar memiliki pengalaman langsung ke masyarakat dalam mengaplikasikan ilmu pengetahuan yang telah      diperolehnya selama perkuliahan. Selain bentuk kegiatan pendidikan dan pengajaran, mahasiswa juga dapat sekaligus melakukan penelitian lapangan di luar negara Indonesia, yang notabene memiliki kultur sosial-budaya yang berbeda. Program KKN Internasional merupakan gambaran pelaksanaan kegiatan pendidikan, penelitian, pengabdian kepada masyarakat dan bersifat internasional.</p>
                            <br>
                            <h6 class="fw-bold">Waktu Pendaftaran KKN   : 25 Juni 2024 - 10 Agustus 2024</h6>
                            <h6 class="fw-bold">Waktu Pelaksanaan KKN   : 15 Agustus 2024 - 30 Agustus 2024</h6>
                            <h6 class="fw-bold">Biaya Pelaksanaan KKN   : Rp. 5.100.000</h6>
                            <br>
                            <h6 class="fw-bold">Persyaratan Peserta</h6>
                            <p>1. Hanya Untuk Mahasiswa Semester 7, 8 dan 9
                            <br>2. Memiliki pasport.
                            <br>3. Bersedia mengikuti pembekalan KKN Internasional</p>
                            <br>
                            <h6 class="fw-bold">Rincian Biaya KKN Internasional</h6>
                            <h6>1. Biaya Transportasi dan Akomodasi :</h6>
                            <h6 style="padding-left: 20px;">- Tiket pesawat PP: Rp 1.200.000,-</h6>
                            <h6 style="padding-left: 20px;">- Biaya transportasi lokal PP dari Bandara ke Lokasi : Rp 600.000,- </h6>
                            <h6 style="padding-left: 20px;">- Biaya akomodasi (hotel, penginapan, dll.): Rp 1.500.000,- (selama 2 minggu)</h6>
                            <h6 style="padding-left: 20px;">- Dokumen perjalanan (pasport,visa, asuransi, dll.): Rp 600.000 </h6>
                            <h6 style="padding-left: 20px;">- Biaya administrasi dan pengurusan perjalanan: Rp 200.000</h6>
                            <h6>2. Biaya Hidup dan Konsumsi :</h6>
                            <h6 style="padding-left: 20px;">- Biaya makan dan minum: Rp/hari x jumlah hari: Rp 1.000.000,-</h6>
                            <br>
                            <h6 class="fw-bold">Tata Cara Pembayaran    :</h6>
                            <h6>1. Pembayaran WAJIB dilakukan HANYA MELALUI TELLER BANK (Tidak Boleh Menggunakan Platform Lain)</h6>
                            <h6>2. Harap lakukan pembayaran sebesar Rp. 5.100.000 ke rekening berikut : </h6>
                            <h6 style="padding-left: 20px;">   - Bank Syariah Indonesia (BSI)</h6>
                            <h6 style="padding-left: 20px;">   - Nomor Rekening         : 1046906515 </h6>
                            <h6 style="padding-left: 20px;">   - Nama Pemilik Rekening  : Yayasan Al Ishlahiyah Binjai</h6>
                            <h6>3. Setelah melakukan pembayaran, Teller Bank akan menyerahkan Receipt atau Bukti Pembayaran kepada peserta KKN</h6>
                            <h6>4. Harap bukti bayar tersebut disimpan untuk melengkapi berkas pendaftaran KKN.</h6>
                            <h6></h6>
                            <br>
                            <h6 class="fw-bold">Lokasi Pelaksanaan : Thailand Selatan</h6>
                            <h6>1. Patthani</h6>
                            <h6>2. Sonkla</h6>
                            <h6>3. Hatyai</h6>
                            <br>
                            
                            <br><br>
                            <h6>Dasar Hukum</h6>
                            <p>Salah satu kebijakan Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi melalui  Merdeka Belajar-Kampus Merdeka adalah Hak Belajar Tiga Semester di Luar Program Studi. Program ini dilandasi berbagai regulasi/landasan hukum pendidikan tinggi dan kementerian terkait  sebagai berikut:</p>
                            <p>1. Undang-Undang Nomor 20 Tahun 2003 tetang Sistem Pendidikan Nasional (Lembaran Negara RI Tahun 2003 Tahun 78, Tambahan Lembaran Negara RI Nomor 4301);
                                <br>2. Undang-Undang Nomor 14 Tahun 2005 tentang Guru dan Dosen (Lembaran Negara RI Tahun 2005 Nomor 157, Tambahan Lembaran Negara RI Nomor 4586);
                                <br>3, Undang-Undang Nomor 12 Tahun 2012 tentang Pendidikan Tinggi (Lembaran Negara RI Tahun 2012 Nomor 158, Tambahan Lembaran Negara RI Nomor 5336);
                                <br>4. Keputusan Presiden Nomor 50 Tahun 2005 tentang Perubahan Status dari Sekolah Tinggi Agama Islam Negeri (STAIN) menjadi Universitas Islam Negeri (UIN) Maulana Malik Ibrahim Malang;
                                <br>5. Keputusan Menteri Keuangan Nomor: 68/KMK.05/2008 tentang Penetapan UIN Mulana Malik Ibrahim Malang pada Departemen Agama sebagai Instansi Pemerintah yang menerapkan Pengelolaan Keuangan Badan Pelayanan Umum (PK-BLU).
                                <br>6. Peraturan Pemerintah Nomor 37 Tahun 2009 tentang Dosen (Lembaran Negara RI Tahun 2009 Nomor 76, Tambahan Lembaran Negara RI Nomor 5007);
                                <br>7. Peraturan Pemerintah Nomor 66 Tahun 2010 tentang Pengelolaan dan Penyelenggaraan Pendidikan (Lembaran Negara RI Tahun 2010 Nomor 112, Tambahan Lembaran Negara RI Nomor 5157);
                                <br>8. Peraturan Pemerintah Nomor 17 Tahun 2010 tentang Pengelolaan dan Penyelenggaraan Pendidikan (Lembaran Negara RI Tahun 2010 Nomor 23, Tambahan Lembaran Negara RI Nomor 5105) sebagaimana telah diubah dengan Peraturan Pemerintah Nomor 66 Tahun 2010 (Lembaran Negara RI Tahun 2010 Nomor 112, Tambahan Lembaran Negara RI Nomor 5157);
                                <br>9. Peraturan Pemerintah Nomor 32 Tahun 2013 tentang Perubahan atas PP Nomor 19 Tahun 2005 tentang Standar Nasional Pendidikan;
                                <br>10. Peraturan Pemerintah Nomor 4 Tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi dan       Pengelolaan Perguruan Tinggi;
                                <br>11. Peraturan Menteri Pendidikan dan Kebudayaan Nomor 49 Tahun 2014 tentang Standar Nasional Pendidikan Tinggi;
                                <br>12. Keputusan Menteri Agama Nomor 55 Tahun 2014 tentang Penelitian dan Pengabdian kepada Masyarakat pada Perguruan Tinggi Keagamaan;
                                <br>13. Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 3 Tahun 2020 tentang Standar Nasional Pendidikan Tinggi.
                                <br>14. Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 4 Tahun 2020 tentang Perubahan Perguruan Tinggi Negeri menjadi Perguruan Tinggi Negeri Badan Hukum.
                                <br>15. Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 5 Tahun 2020 tentang Akreditasi Program Studi dan Perguruan Tinggi.
                            </p>
                            <br>
                            <h6>Tujuan Pelaksanaan</h6>
                            <p>1. Mendidik mahasiswa agar memiliki pola berpikir yang interdisipliner, terpadu, dan komprehensif.
                            <br>2. Menambah wawasan dan pengalaman mahasiswa secara langsung berinteraksi dengan masyarakat dalam membantu memecahkan masalah di masyarakat dengan pendekatan keilmuan.
                            <br>3. Mendidik mahasiswa untuk aktif berkontribusi dalam program-program pengembangan dan pembangunan masyarakat.
                            <br>4. Membina mahasiswa agar menjadi seorang inovator, motivator, dan problem solver.
                            </p>
                            <br>
                            <h6>Tugas DPL, Tim Survey, Panitia dan Supervisor</h6>
                            <p>Tugas DPL adalah :</p>
                            <p>1. Mendampingi mahasiswa saat pelaksanaan KKN Internasional
                            <br> 2. Memberikan pengarahan dan bimbingan terkait dengan perencanaan, pelaksanaan, hingga pembuatan laporan KKN Internasional.</p>
                            <p>Tugas Tim Survey adalah :</p>
                            <p>1. Melakukan observasi awal, meninjau lokasi-lakasi tempat pelaksanaan KKN Internasional
                            <br>2. Menyampaikan hasil survey kepada panitia dan peserta KKN Internasional, sehingga memperoleh gambaran awal dalam menyusun perencanaan kegiatan yang dapat dilakukan saat pelaksanaan KKN Internasional, maupun upaya pemecahan masalah yang ditemui di lokasi pelaksanaan KKN Internasional.
                            </p>
                            <p>Tugas Panitia Pelaksana adalah :</p>
                            <p>1. Menyiapkan jadwal pelaksanaan KKN Internasional
                            <br>2. Menyiapkan segala perlengkapan/logistik seperti: jaket KKN Internasional untuk peserta, spanduk, bingkisan kenang-kenangan, tiket, asuransi, dan lain sebagainya.
                            <br>3. Bertanggungjawab terhadap kelancaran pelaksanaan KKN Internasional</p>
                            <p>Tugas dari Supervisor adalah :</p>
                            <p>1. Melakukan kegiatan observasi lapangan dan melakukan evaluasi, baik secara terprogram maupun insidental, terhadap peserta KKN Internasional, meliputi perencanaan hingga pelaksanaan program kegiatan  KKN Internasional.
                            <br>2. Memberikan hasil laporan supervisi baik secara tulis maupun lisan kepada panitia penanggungjawab pelaksanaan KKN Internasional.</p>
                            <br>
                            <h6>Teknis Pelaksanaan</h6>
                            <p>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN menerima usulan penyelenggaraan KKN Internasional dari Program studi (Prodi).
                                <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN mengumumkan persyaratan peserta dan oleh Prodi dikomunikasikan kepada mahasiswa calon peserta KKN Internasional.
                                <br>- Calon peserta KKN Internasional mendaftarkan diri untuk mengikuti KKN Internasional dengan disetujui oleh masing-masing Prodi.
                                <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN mengkalkulasi pembiayaan KKN Internasional.
                                <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN menyampaikan pemberitahuan ke Ketua Prodi terkait dengan pelaksanaan Program KKN Internasional.
                                <br>- Dengan surat Kepala Pusat Pengabdian Kepada Masyarakat mengajukan permohonan izin ke negara yang menjadi tujuan lokasi KKN melalui konsultasi, koordinasi, dan/atau kerjasama dengan Atase Pendidikan dan Kebudayaan Negara terkait.
                                <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN menyelenggarakan Pembekalan KKN Internasional.
                                <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN melaksanakan seleksi calon peserta KKN Internasional melalui seleksi berkas, wawancara dan tes tertulis.
                                <br>- Peserta KKN Internasional yang telah lolos seleksi dapat melaksanakan program KKN Internasional.
                                <br>- DPL melakukan bimbingan atas pelaksanaan KKN Internasional.
                                <br>- Peserta KKN Internasional diharuskan mengumpulkan laporan akhir KKN Internasional.
                                <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN melaksanakan monitoring dan evaluasi pelaksanaan KKN Internasional.
                                <br>- Setelah menyelesaikan program kegiatan, maka peserta KKN Internasional dapat kembali ke tanah air (Berita Acara disusun oleh Kepala Pusat Pengabdian Kepada Masyarakat dan dikonsultasikan dengan Ketua Prodi).</p>
                            <br>
                            <h6>Prosedur Pendaftaran</h6>
                            <p>Mahasiswa melakukan pendaftaran online pada situs ini</p>
                            <br>
                            <h6>Jadwal Pelaksanaan</h6>
                            <p>Dilaksanakan sekali dalam setahun, bagi mahasiswa semester 7 (tujuh) yang dilakukan berkisar antara bulan Agustus sampai Oktober, namun persiapan pelaksanaan telah dimulai pada bulan Agustus, mengingat banyaknya hal-hal teknis yang perlu dipersiapkan demi kelancaran pelaksanaan kegiatan. Kepastian jadwal pelaksanaan yang mencakup mulai dari pendataan, pendaftaran, seleksi, pembekalan, penerjunan di lapangan, monitoring dan evaluasi, hingga penarikan dan pelaporan akan diumumkan secara khusus oleh Panitia dan Tim KKN Internasional INSAN.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        KKN REGULER 2024
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <p>KKN Reguler merupakan proses pembelajaran inovatif mahasiswa melalui berbagai kegiatan langsung di tengah-tengah masyarakat, dan mahasiswa berupaya untuk menjadi bagian dari masyarakat serta secara aktif dan kreatif terlibat dalam dinamika yang terjadi di masyarakat sebagai penggerak pembangunan desa, dilaksanakan selama 30 hari, Lokasi pelaksanaannya di Kabupaten Langkat, Kabupaten Deli Serdang dan Kotamadya Medan</p>
                        <br>
                        <h6 class="fw-bold">Waktu Pendaftaran       : 25 Juni 2024 - 25 Juli 2024</h6>
                        <h6 class="fw-bold">Waktu Pelaksanaan KKN   : 01 Agustus 2024 - 30 Agustus 2024</h6>
                        <h6 class="fw-bold">Biaya Pelaksanaan KKN   : Rp. 450.000</h6>
                        <br>
                        <h6 class="fw-bold">Persyaratan Peserta :</h6>
                        <p>1. Hanya Untuk Mahasiswa Semester 7, 8 dan 9
                        <br>2. Bersedia mengikuti pembekalan KKN</p>
                        <br>
                        <h6 class="fw-bold">Tata Cara Pembayaran    :</h6>
                        <h6>1. Pembayaran WAJIB dilakukan HANYA MELALUI TELLER BANK (Tidak Boleh Menggunakan Platform Lain)</h6>
                        <h6>2. Harap lakukan pembayaran sebesar Rp. 450.000 ke rekening berikut : </h6>
                        <h6 style="padding-left: 20px;">   - Bank Syariah Indonesia (BSI)</h6>
                        <h6 style="padding-left: 20px;">   - Nomor Rekening         : 1046906515 </h6>
                        <h6 style="padding-left: 20px;">   - Nama Pemilik Rekening  : Yayasan Al Ishlahiyah Binjai</h6>
                        <h6>3. Setelah melakukan pembayaran, Teller Bank akan menyerahkan Receipt atau Bukti Pembayaran kepada peserta KKN</h6>
                        <h6>4. Harap bukti bayar tersebut disimpan untuk melengkapi berkas pendaftaran KKN.</h6>
                        <h6></h6>
                        <br>
                        <h6 class="fw-bold">Lokasi Pelaksanaan :</h6>
                        <h6>1. Kabupaten Langkat</h6>
                        <h6>2. Kabupaten Deli Serdang</h6>
                        <h6>3. Kotamadya Medan</h6>
                        <br>
                        
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        KKN NASIONAL 2024
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <p>KKN Nasional merupakan proses pembelajaran inovatif mahasiswa yang berkolaborasi dengan perguruan tinggi lain dan berlokasi di luar Sumatera Utara, dilaksanakan selama 30 hari, Lokasi pelaksanaannya di Kabupaten Aceh Tamiang, dan Kotamadya Langsa Provinsi Aceh.</p>
                        <br>
                        <h6 class="fw-bold">Waktu Pendaftaran       : 25 Juni 2024 - 25 Juli 2024</h6>
                        <h6 class="fw-bold">Waktu Pelaksanaan KKN   : 01 Agustus 2024 - 30 Agustus 2024</h6>
                        <h6 class="fw-bold">Biaya Pelaksanaan KKN   : Rp. 450.000</h6>
                        <br>
                        <h6 class="fw-bold">Persyaratan Peserta</h6>
                        <p>1. Hanya Untuk Mahasiswa Semester 7, 8 dan 9
                        <br>2. Bersedia mengikuti pembekalan KKN</p>
                        <br>
                        <h6 class="fw-bold">Tata Cara Pembayaran    :</h6>
                        <h6>1. Pembayaran WAJIB dilakukan HANYA MELALUI TELLER BANK (Tidak Boleh Menggunakan Platform Lain)</h6>
                        <h6>2. Harap lakukan pembayaran sebesar Rp. 450.000 ke rekening berikut : </h6>
                        <h6 style="padding-left: 20px;">   - Bank Syariah Indonesia (BSI)</h6>
                        <h6 style="padding-left: 20px;">   - Nomor Rekening         : 1046906515 </h6>
                        <h6 style="padding-left: 20px;">   - Nama Pemilik Rekening  : Yayasan Al Ishlahiyah Binjai</h6>
                        <h6>3. Setelah melakukan pembayaran, Teller Bank akan menyerahkan Receipt atau Bukti Pembayaran kepada peserta KKN</h6>
                        <h6>4. Harap bukti bayar tersebut disimpan untuk melengkapi berkas pendaftaran KKN.</h6>
                        <h6></h6>
                        <br>
                        <h6 class="fw-bold">Lokasi Pelaksanaan :</h6>
                        <h6>1. Kabupaten Aceh Tamiang</h6>
                        <h6>2. Kotamadya Langsa Provinsi Aceh</h6>
                        <br>
                        
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        KKN INTERNASIONAL 2024
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <p>Kuliah Kerja Nyata (KKN) Internasional adalah salah satu bentuk implementasi dari LPPM INSAN. KKN Internasional yang diselenggarakan oleh LPPM merupakan kegiatan intrakurikuler mahasiswa yang telah memenuhi persyaratan dan lulus seleksi sebagai peserta KKN Internasional.</p>
                        <p>Program KKN Internasional adalah bentuk kegiatan pengabdian masyarakat yang dilakukan oleh mahasiswa agar memiliki pengalaman langsung ke masyarakat dalam mengaplikasikan ilmu pengetahuan yang telah      diperolehnya selama perkuliahan. Selain bentuk kegiatan pendidikan dan pengajaran, mahasiswa juga dapat sekaligus melakukan penelitian lapangan di luar negara Indonesia, yang notabene memiliki kultur sosial-budaya yang berbeda. Program KKN Internasional merupakan gambaran pelaksanaan kegiatan pendidikan, penelitian, pengabdian kepada masyarakat dan bersifat internasional.</p>
                        <br>
                        <h6 class="fw-bold">Waktu Pendaftaran KKN   : 25 Juni 2024 - 10 Agustus 2024</h6>
                        <h6 class="fw-bold">Waktu Pelaksanaan KKN   : 15 Agustus 2024 - 30 Agustus 2024</h6>
                        <h6 class="fw-bold">Biaya Pelaksanaan KKN   : Rp. 5.100.000</h6>
                        <br>
                        <h6 class="fw-bold">Persyaratan Peserta</h6>
                        <p>1. Hanya Untuk Mahasiswa Semester 7, 8 dan 9
                        <br>2. Memiliki pasport.
                        <br>3. Bersedia mengikuti pembekalan KKN Internasional</p>
                        <br>
                        <h6 class="fw-bold">Rincian Biaya KKN Internasional</h6>
                        <h6>1. Biaya Transportasi dan Akomodasi :</h6>
                        <h6 style="padding-left: 20px;">- Tiket pesawat PP: Rp 1.200.000,-</h6>
                        <h6 style="padding-left: 20px;">- Biaya transportasi lokal PP dari Bandara ke Lokasi : Rp 600.000,- </h6>
                        <h6 style="padding-left: 20px;">- Biaya akomodasi (hotel, penginapan, dll.): Rp 1.500.000,- (selama 2 minggu)</h6>
                        <h6 style="padding-left: 20px;">- Dokumen perjalanan (pasport,visa, asuransi, dll.): Rp 600.000 </h6>
                        <h6 style="padding-left: 20px;">- Biaya administrasi dan pengurusan perjalanan: Rp 200.000</h6>
                        <h6>2. Biaya Hidup dan Konsumsi :</h6>
                        <h6 style="padding-left: 20px;">- Biaya makan dan minum: Rp/hari x jumlah hari: Rp 1.000.000,-</h6>
                        <br>
                        <h6 class="fw-bold">Tata Cara Pembayaran    :</h6>
                        <h6>1. Pembayaran WAJIB dilakukan HANYA MELALUI TELLER BANK (Tidak Boleh Menggunakan Platform Lain)</h6>
                        <h6>2. Harap lakukan pembayaran sebesar Rp. 5.100.000 ke rekening berikut : </h6>
                        <h6 style="padding-left: 20px;">   - Bank Syariah Indonesia (BSI)</h6>
                        <h6 style="padding-left: 20px;">   - Nomor Rekening         : 1046906515 </h6>
                        <h6 style="padding-left: 20px;">   - Nama Pemilik Rekening  : Yayasan Al Ishlahiyah Binjai</h6>
                        <h6>3. Setelah melakukan pembayaran, Teller Bank akan menyerahkan Receipt atau Bukti Pembayaran kepada peserta KKN</h6>
                        <h6>4. Harap bukti bayar tersebut disimpan untuk melengkapi berkas pendaftaran KKN.</h6>
                        <h6></h6>
                        <br>
                        <h6 class="fw-bold">Lokasi Pelaksanaan : Thailand Selatan</h6>
                        <h6>1. Patthani</h6>
                        <h6>2. Sonkla</h6>
                        <h6>3. Hatyai</h6>
                        <br>
                        
                        <br><br>
                        <h6>Dasar Hukum</h6>
                        <p>Salah satu kebijakan Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi melalui  Merdeka Belajar-Kampus Merdeka adalah Hak Belajar Tiga Semester di Luar Program Studi. Program ini dilandasi berbagai regulasi/landasan hukum pendidikan tinggi dan kementerian terkait  sebagai berikut:</p>
                        <p>1. Undang-Undang Nomor 20 Tahun 2003 tetang Sistem Pendidikan Nasional (Lembaran Negara RI Tahun 2003 Tahun 78, Tambahan Lembaran Negara RI Nomor 4301);
                            <br>2. Undang-Undang Nomor 14 Tahun 2005 tentang Guru dan Dosen (Lembaran Negara RI Tahun 2005 Nomor 157, Tambahan Lembaran Negara RI Nomor 4586);
                            <br>3, Undang-Undang Nomor 12 Tahun 2012 tentang Pendidikan Tinggi (Lembaran Negara RI Tahun 2012 Nomor 158, Tambahan Lembaran Negara RI Nomor 5336);
                            <br>4. Keputusan Presiden Nomor 50 Tahun 2005 tentang Perubahan Status dari Sekolah Tinggi Agama Islam Negeri (STAIN) menjadi Universitas Islam Negeri (UIN) Maulana Malik Ibrahim Malang;
                            <br>5. Keputusan Menteri Keuangan Nomor: 68/KMK.05/2008 tentang Penetapan UIN Mulana Malik Ibrahim Malang pada Departemen Agama sebagai Instansi Pemerintah yang menerapkan Pengelolaan Keuangan Badan Pelayanan Umum (PK-BLU).
                            <br>6. Peraturan Pemerintah Nomor 37 Tahun 2009 tentang Dosen (Lembaran Negara RI Tahun 2009 Nomor 76, Tambahan Lembaran Negara RI Nomor 5007);
                            <br>7. Peraturan Pemerintah Nomor 66 Tahun 2010 tentang Pengelolaan dan Penyelenggaraan Pendidikan (Lembaran Negara RI Tahun 2010 Nomor 112, Tambahan Lembaran Negara RI Nomor 5157);
                            <br>8. Peraturan Pemerintah Nomor 17 Tahun 2010 tentang Pengelolaan dan Penyelenggaraan Pendidikan (Lembaran Negara RI Tahun 2010 Nomor 23, Tambahan Lembaran Negara RI Nomor 5105) sebagaimana telah diubah dengan Peraturan Pemerintah Nomor 66 Tahun 2010 (Lembaran Negara RI Tahun 2010 Nomor 112, Tambahan Lembaran Negara RI Nomor 5157);
                            <br>9. Peraturan Pemerintah Nomor 32 Tahun 2013 tentang Perubahan atas PP Nomor 19 Tahun 2005 tentang Standar Nasional Pendidikan;
                            <br>10. Peraturan Pemerintah Nomor 4 Tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi dan       Pengelolaan Perguruan Tinggi;
                            <br>11. Peraturan Menteri Pendidikan dan Kebudayaan Nomor 49 Tahun 2014 tentang Standar Nasional Pendidikan Tinggi;
                            <br>12. Keputusan Menteri Agama Nomor 55 Tahun 2014 tentang Penelitian dan Pengabdian kepada Masyarakat pada Perguruan Tinggi Keagamaan;
                            <br>13. Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 3 Tahun 2020 tentang Standar Nasional Pendidikan Tinggi.
                            <br>14. Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 4 Tahun 2020 tentang Perubahan Perguruan Tinggi Negeri menjadi Perguruan Tinggi Negeri Badan Hukum.
                            <br>15. Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 5 Tahun 2020 tentang Akreditasi Program Studi dan Perguruan Tinggi.
                        </p>
                        <br>
                        <h6>Tujuan Pelaksanaan</h6>
                        <p>1. Mendidik mahasiswa agar memiliki pola berpikir yang interdisipliner, terpadu, dan komprehensif.
                        <br>2. Menambah wawasan dan pengalaman mahasiswa secara langsung berinteraksi dengan masyarakat dalam membantu memecahkan masalah di masyarakat dengan pendekatan keilmuan.
                        <br>3. Mendidik mahasiswa untuk aktif berkontribusi dalam program-program pengembangan dan pembangunan masyarakat.
                        <br>4. Membina mahasiswa agar menjadi seorang inovator, motivator, dan problem solver.
                        </p>
                        <br>
                        <h6>Tugas DPL, Tim Survey, Panitia dan Supervisor</h6>
                        <p>Tugas DPL adalah :</p>
                        <p>1. Mendampingi mahasiswa saat pelaksanaan KKN Internasional
                        <br> 2. Memberikan pengarahan dan bimbingan terkait dengan perencanaan, pelaksanaan, hingga pembuatan laporan KKN Internasional.</p>
                        <p>Tugas Tim Survey adalah :</p>
                        <p>1. Melakukan observasi awal, meninjau lokasi-lakasi tempat pelaksanaan KKN Internasional
                        <br>2. Menyampaikan hasil survey kepada panitia dan peserta KKN Internasional, sehingga memperoleh gambaran awal dalam menyusun perencanaan kegiatan yang dapat dilakukan saat pelaksanaan KKN Internasional, maupun upaya pemecahan masalah yang ditemui di lokasi pelaksanaan KKN Internasional.
                        </p>
                        <p>Tugas Panitia Pelaksana adalah :</p>
                        <p>1. Menyiapkan jadwal pelaksanaan KKN Internasional
                        <br>2. Menyiapkan segala perlengkapan/logistik seperti: jaket KKN Internasional untuk peserta, spanduk, bingkisan kenang-kenangan, tiket, asuransi, dan lain sebagainya.
                        <br>3. Bertanggungjawab terhadap kelancaran pelaksanaan KKN Internasional</p>
                        <p>Tugas dari Supervisor adalah :</p>
                        <p>1. Melakukan kegiatan observasi lapangan dan melakukan evaluasi, baik secara terprogram maupun insidental, terhadap peserta KKN Internasional, meliputi perencanaan hingga pelaksanaan program kegiatan  KKN Internasional.
                        <br>2. Memberikan hasil laporan supervisi baik secara tulis maupun lisan kepada panitia penanggungjawab pelaksanaan KKN Internasional.</p>
                        <br>
                        <h6>Teknis Pelaksanaan</h6>
                        <p>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN menerima usulan penyelenggaraan KKN Internasional dari Program studi (Prodi).
                            <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN mengumumkan persyaratan peserta dan oleh Prodi dikomunikasikan kepada mahasiswa calon peserta KKN Internasional.
                            <br>- Calon peserta KKN Internasional mendaftarkan diri untuk mengikuti KKN Internasional dengan disetujui oleh masing-masing Prodi.
                            <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN mengkalkulasi pembiayaan KKN Internasional.
                            <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN menyampaikan pemberitahuan ke Ketua Prodi terkait dengan pelaksanaan Program KKN Internasional.
                            <br>- Dengan surat Kepala Pusat Pengabdian Kepada Masyarakat mengajukan permohonan izin ke negara yang menjadi tujuan lokasi KKN melalui konsultasi, koordinasi, dan/atau kerjasama dengan Atase Pendidikan dan Kebudayaan Negara terkait.
                            <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN menyelenggarakan Pembekalan KKN Internasional.
                            <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN melaksanakan seleksi calon peserta KKN Internasional melalui seleksi berkas, wawancara dan tes tertulis.
                            <br>- Peserta KKN Internasional yang telah lolos seleksi dapat melaksanakan program KKN Internasional.
                            <br>- DPL melakukan bimbingan atas pelaksanaan KKN Internasional.
                            <br>- Peserta KKN Internasional diharuskan mengumpulkan laporan akhir KKN Internasional.
                            <br>- Kepala Pusat Pengabdian Kepada Masyarakat INSAN melaksanakan monitoring dan evaluasi pelaksanaan KKN Internasional.
                            <br>- Setelah menyelesaikan program kegiatan, maka peserta KKN Internasional dapat kembali ke tanah air (Berita Acara disusun oleh Kepala Pusat Pengabdian Kepada Masyarakat dan dikonsultasikan dengan Ketua Prodi).</p>
                        <br>
                        <h6>Prosedur Pendaftaran</h6>
                        <p>Mahasiswa melakukan pendaftaran online pada situs ini</p>
                        <br>
                        <h6>Jadwal Pelaksanaan</h6>
                        <p>Dilaksanakan sekali dalam setahun, bagi mahasiswa semester 7 (tujuh) yang dilakukan berkisar antara bulan Agustus sampai Oktober, namun persiapan pelaksanaan telah dimulai pada bulan Agustus, mengingat banyaknya hal-hal teknis yang perlu dipersiapkan demi kelancaran pelaksanaan kegiatan. Kepastian jadwal pelaksanaan yang mencakup mulai dari pendataan, pendaftaran, seleksi, pembekalan, penerjunan di lapangan, monitoring dan evaluasi, hingga penarikan dan pelaporan akan diumumkan secara khusus oleh Panitia dan Tim KKN Internasional INSAN.</p>
                    </div>
                    </div>
                </div>
            </div> -->
    </div>

    <section class="">
        <footer class="text-center text-white" style="background-color: #0a4275;">
            <div class="container p-4 pb-0">
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                <span class="me-3">Institut Syekh Abdul Halim Hasan Binjai</span>
                </p>
            </section>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024
            <a class="text-white" href="#">INSAN</a>
            </div>
        </footer>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function toggleAccordion(id) {
            const element = document.getElementById(id);
            element.classList.toggle('hidden');
        }
    </script>
</body>
</html>