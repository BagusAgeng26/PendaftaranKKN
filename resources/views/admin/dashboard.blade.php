<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Dashboard Admin</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <div class="flex-grow-1">
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
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex w-full justify-center rounded-md bg-white px-3 py-1.5 text-sm font-semibold leading-6 text-black shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                                Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div>
            @if(session('success'))
                <div class="alert alert-info bg-green-500">
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

        <div class="container" style="margin-top: 50px;">
            <div class="border border-gray-300 rounded-lg p-3">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Jenis KKN</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kknRegistrations as $registration)
                        <tr>
                            <td>
                                <p class="fw-normal mb-1">
                                    {{ $registration->user->nama }}
                                </p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $registration->user->nim }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $registration->program_studi }}</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $registration->jenis_kkn }}</p>
                            </td>
                            <td>
                                <form action="{{ route('admin.kkn.approve', $registration->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm btn-rounded">
                                        Approve
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="text-center text-white" style="background-color: #0a4275;">
        <div class="container p-4 pb-0">
            <section>
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Institut Syekh Abdul Halim Hasan Binjai</span>
                </p>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024
            <a class="text-white" href="{{ route('login') }}">INSAN</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
