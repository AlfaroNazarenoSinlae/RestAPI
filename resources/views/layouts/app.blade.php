<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Mahasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/DataTables-1.13.3/css/dataTables.bootstrap5.css') }}">
</head>

<body>
    <div class="d-flex min-vh-100">
        <!-- Sidebar -->
        <div class="bg-danger text-white p-3" style="width: 250px;">
            <div class="mb-4 text-center">
                <img src="{{ asset('assets/image/logo.png') }}" style="max-width: 180px; height: auto" alt="Logo">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mahasiswa') }}" class="nav-link text-white">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-white">Logout</a>

                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-fill">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 d-flex justify-content-between">
                <span class="navbar-brand">Sistem Akademik</span>
                <div class="ms-auto">
                    <span class="navbar-text">Selamat Datang, {{ Auth::user()->name }}</span>
                </div>
            </nav>

            <!-- Content -->
            <div class="p-4 container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('assets/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables-1.13.3/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables-1.13.3/js/dataTables.bootstrap5.min.js') }}"></script>

    @yield('script')
</body>

</html>
