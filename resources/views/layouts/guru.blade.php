<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Sistem Penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
        }
        .navbar {
            background-color: #1a4f7a !important;
        }
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            background-color: #ffffff;
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .table {
            background-color: #ffffff;
        }
        .table thead {
            background-color: #2c6ca0;
            color: white;
        }
        .table-bordered {
            border-color: #dee2e6;
        }
        .btn-primary {
            background-color: #2c6ca0;
            border-color: #2c6ca0;
        }
        .btn-primary:hover {
            background-color: #1a4f7a;
            border-color: #1a4f7a;
        }
        .btn-success {
            background-color: #3c8dbc;
            border-color: #3c8dbc;
        }
        .btn-success:hover {
            background-color: #2c6ca0;
            border-color: #2c6ca0;
        }
        .btn-warning {
            background-color: #4b89ac;
            border-color: #4b89ac;
            color: white;
        }
        .btn-warning:hover {
            background-color: #3c7a9a;
            border-color: #3c7a9a;
            color: white;
        }
        .btn-info {
            background-color: #5ba4d6;
            border-color: #5ba4d6;
        }
        .btn-info:hover {
            background-color: #3c8dbc;
            border-color: #3c8dbc;
        }
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
        }
        .nav-link:hover, .nav-link.active {
            color: white !important;
        }
        h2, .card-title {
            color: #1a4f7a;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .form-control:focus {
            border-color: #3c8dbc;
            box-shadow: 0 0 0 0.2rem rgba(60, 141, 188, 0.25);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Penilaian - Guru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('guru.dashboard') ? 'active' : '' }}" 
                           href="{{ route('guru.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('guru.siswa.*') ? 'active' : '' }}" 
                           href="{{ route('guru.siswa.index') }}">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('guru.nilai.*') ? 'active' : '' }}" 
                           href="{{ route('guru.nilai.index') }}">Data Nilai</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>