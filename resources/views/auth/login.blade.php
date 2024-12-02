<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script>
        // JavaScript function to toggle password visibility
        function togglePassword() {
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text"; // Show password
            toggleIcon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c1.887 0 3.663.482 5.158 1.33M22.542 12c-1.274 4.057-5.065 7-9.542 7-1.887 0-3.663-.482-5.158-1.33M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            `;
        } else {
            passwordInput.type = "password"; // Hide password
            toggleIcon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.027 10.027 0 0112 19c-4.478 0-8.269-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7 1.887 0 3.663.482 5.158 1.33m5.384 2.164A9.99 9.99 0 0122.542 12c-1.273 4.057-5.065 7-9.542 7a10.027 10.027 0 01-1.875-.175m-2.542-4.864a3 3 0 114.243-4.243m0 0l4.243 4.243m-4.243-4.243a3 3 0 00-4.243 4.243m0 0l-4.243-4.243"/>
            </svg>
            `;
        }
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Pendaftaran KKN INSAN 2024</title>
</head>
<body class="h-full flex flex-col justify-between">
    <!-- Content Section -->
    <section class="flex-grow" style="margin-top: 50px;"> <!-- Added inline style for fixed margin -->
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-9 col-lg-6 col-xl-5" style="margin-top: 50px;"> <!-- Added fixed margin here too -->
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('login') }}" method="POST" class="border border-gray-300 rounded-lg p-3 shadow-md bg-transparent" style="margin-top: 50px;"> <!-- Margin on form -->
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <h2 class="mt-8 text-center text-2xl font-bold tracking-tight text-gray-900">Login KKN INSAN 2024</h2>
                        </div>
                        <br>
                        <div>
                            @if(session('success'))
                                <div class="alert alert-info">
                                    {!! session('success') !!}
                                </div>
                            @endif

                            @if(session('status'))
                                <div class="alert alert-info">
                                    {!! session('status') !!}
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
                            <label for="nim" class="form-label block text-sm font-medium leading-6 text-gray-900">Nomor Induk Mahasiswa / ID</label>
                            <div class="mt-2">
                                <input name="nim" type="text" placeholder="Masukkan NIM atau ID" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label for="password" class="form-label block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2 relative">
                                <input id="password" name="password" type="password" placeholder="Masukkan Password" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                
                                <!-- Button to toggle show/hide password -->
                                <button type="button" class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-600" onclick="togglePassword()">
                                    <span id="toggleIcon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.027 10.027 0 0112 19c-4.478 0-8.269-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7 1.887 0 3.663.482 5.158 1.33m5.384 2.164A9.99 9.99 0 0122.542 12c-1.273 4.057-5.065 7-9.542 7a10.027 10.027 0 01-1.875-.175m-2.542-4.864a3 3 0 114.243-4.243m0 0l4.243 4.243m-4.243-4.243a3 3 0 00-4.243 4.243m0 0l-4.243-4.243"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                        
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label block text-sm font-medium leading-6 text-gray-900">Status</label>
                            <select class="form-select block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="role" required>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
                            <p class="mt-3 text-center text-sm text-gray-500">
                                Belum punya akun? <a href="{{ route('register') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Daftar</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="text-center text-white mt-5 lg:mt-10" style="background-color: #0a4275;">
        <div class="container p-4 pb-0">
            <section class="d-flex justify-content-center align-items-center">
                <p>Institut Syekh Abdul Halim Hasan Binjai</p>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024
            <a class="text-white" href="{{ route('login') }}">INSAN</a>
        </div>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>


</html>
