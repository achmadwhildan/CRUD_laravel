<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
        }
        #sidebar {
            min-height: 100vh;
            width: 250px;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        #sidebar .nav-link {
            color: #000;
        }
        #sidebar .nav-link.active {
            background-color: #4F46E5;
            color: #fff;
        }
        #content {
            width: 100%;
            padding: 20px;
        }
    </style>
</head>
<body>

<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <span class="fs-4">Data Siswa</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/home" class="nav-link active" aria-current="page">
                <i class="bi bi-house-door-fill"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#dataSiswaMenu" aria-expanded="false">
                <i class="bi bi-file-earmark-text"></i> Data Siswa
            </a>
            <ul class="collapse" id="dataSiswaMenu">
                <li><a href="{{ route('datas.index') }}" class="nav-link ms-3">Data</a></li>
                <li><a href="{{ route('datas.create') }}" class="nav-link ms-3">Tambah Data</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#nilaiSiswaMenu" aria-expanded="false">
                <i class="bi bi-card-list"></i> Nilai Siswa
            </a>
            <ul class="collapse" id="nilaiSiswaMenu">
                <li><a href="{{ route('values.index') }}" class="nav-link ms-3">Nilai</a></li>
                <li><a href="{{ route('values.create') }}" class="nav-link ms-3">Tambah Nilai</a></li>
            </ul>
        </li>
    </ul>
    <hr>
    <div>
        @if (Route::has('login'))
            @auth
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="rounded-circle" src="https://placehold.co/20" alt="User Profile" style="width: 30px; height: 30px;">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="userMenuButton">
                        <li><a class="dropdown-item" href="{{ url('/logout') }}">Sign out</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary me-2">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                @endif
            @endauth
        @endif
    </div>
</div>

<div id="content" class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

@stack('script')
</body>
</html>
