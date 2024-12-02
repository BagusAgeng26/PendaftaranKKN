<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script>
        function togglePassword(inputId, toggleIconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(toggleIconId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text"; // Show password
                toggleIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.027 10.027 0 0112 19c-4.478 0-8.269-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7 1.887 0 3.663.482 5.158 1.33m5.384 2.164A9.99 9.99 0 0122.542 12c-1.273 4.057-5.065 7-9.542 7a10.027 10.027 0 01-1.875-.175m-2.542-4.864a3 3 0 114.243-4.243m0 0l4.243 4.243m-4.243-4.243a3 3 0 00-4.243 4.243m0 0l-4.243-4.243"/></svg>`;
            } else {
                passwordInput.type = "password"; // Hide password
                toggleIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.027 10.027 0 0112 19c-4.478 0-8.269-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7 1.887 0 3.663.482 5.158 1.33m5.384 2.164A9.99 9.99 0 0122.542 12c-1.273 4.057-5.065 7-9.542 7a10.027 10.027 0 01-1.875-.175m-2.542-4.864a3 3 0 114.243-4.243m0 0l4.243 4.243m-4.243-4.243a3 3 0 00-4.243 4.243m0 0l-4.243-4.243"/></svg>`;
            }
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Daftar Akun</title>
</head>
<body class="h-full flex flex-col justify-between">
    {{-- <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo/logo-bg.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Institut Syekh Abdul Halim Hasan Binjai
            </a>
        </div>
    </nav> --}}
    <section class="flex-grow" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('register') }}" method="POST" class="border border-gray-300 rounded-lg p-3 shadow-md bg-transparent" style="margin-top: 10px;"> <!-- Margin on form -->
                    @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <h2 class="mt-1 text-center text-2xl font-bold tracking-tight text-gray-900">Daftar Akun KKN INSAN 2024</h2>
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
                                    <input name="nama" type="text" placeholder="Masukkan Nama" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                        </div>
                
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="nim" class="form-label block text-sm font-medium leading-6 text-gray-900">Nomor Induk Mahasiswa / ID</label>
                            <div class="mt-2">
                                <input name="nim" type="text" placeholder="Masukkan NIM atau ID" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                                
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label block text-sm font-medium leading-6 text-gray-900">Status</label>
                                <select class="form-select block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="role" required>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="admin">Admin</option>
                                </select>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label for="password" class="form-label block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2 relative">
                                <input id="password" name="password" type="password" placeholder="Masukkan Password" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                
                                <!-- Button to toggle show/hide password -->
                                <button type="button" class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-600" onclick="togglePassword('password', 'toggleIcon1')">
                                    <span id="toggleIcon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.027 10.027 0 0112 19c-4.478 0-8.269-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7 1.887 0 3.663.482 5.158 1.33m5.384 2.164A9.99 9.99 0 0122.542 12c-1.273 4.057-5.065 7-9.542 7a10.027 10.027 0 01-1.875-.175m-2.542-4.864a3 3 0 114.243-4.243m0 0l4.243 4.243m-4.243-4.243a3 3 0 00-4.243 4.243m0 0l-4.243-4.243"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label for="password_confirmation" class="form-label block text-sm font-medium leading-6 text-gray-900">Konfirmasi Password</label>
                            <div class="mt-2 relative">
                                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Masukkan Konfirmasi Password" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                
                                <!-- Button to toggle show/hide confirmation password -->
                                <button type="button" class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-600" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                    <span id="toggleIcon2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.027 10.027 0 0112 19c-4.478 0-8.269-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7 1.887 0 3.663.482 5.158 1.33m5.384 2.164A9.99 9.99 0 0122.542 12c-1.273 4.057-5.065 7-9.542 7a10.027 10.027 0 01-1.875-.175m-2.542-4.864a3 3 0 114.243-4.243m0 0l4.243 4.243m-4.243-4.243a3 3 0 00-4.243 4.243m0 0l-4.243-4.243"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                                
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
                                <p class="mt-3 text-center text-sm text-gray-500">
                                    Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login</a>
                                </p>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
            </div>
            </div>

        <!-- <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Daftar Akun KKN INSAN 2024</p>
                    </div>
                    <br>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control form-control-lg" placeholder="Masukkan nama" required>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <label class="form-label" for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control form-control-lg" placeholder="Masukkan Password" required>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <label class="form-label" for="role">Role</label>
                            <select class="form-select" name="role" required>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="admin">Admin</option>
                            </select>  
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan Password" required>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Konfirmasi Password" required>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Sudah punya akun? <a href="{{ route('login') }}"
                            class="link-danger">Masuk</a></p>
                    </div>
                    </form>
                </div>
                
            </div>
        </div> -->
    </section>

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
</body>
</html>
