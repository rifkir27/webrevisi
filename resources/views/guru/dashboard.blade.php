<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Guru</title>
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
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
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
        .btn-info {
            background-color: #5ba4d6;
            border-color: #5ba4d6;
        }
        .btn-info:hover {
            background-color: #3c8dbc;
            border-color: #3c8dbc;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
        }
        .nav-link:hover, .nav-link.active {
            color: white !important;
        }
        .display-4 {
            color: #1a4f7a;
        }
        h2 {
            color: #2c6ca0;
        }
        .card-title {
            color: #1a4f7a;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Penilaian - Guru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('guru.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guru.siswa.index') }}">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guru.nilai.index') }}">Data Nilai</a>
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
        <div class="row">
            <div class="col-md-12">
                <h2>Selamat Datang, {{ Auth::guard('guru')->user()->nama }}</h2>
                
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Siswa</h5>
                                <p class="card-text display-4">{{ count($siswas) }}</p>
                                <a href="{{ route('guru.siswa.index') }}" class="btn btn-primary">Kelola Siswa</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Input Nilai</h5>
                                <p class="card-text">Masukkan nilai untuk siswa</p>
                                <a href="{{ route('guru.nilai.create') }}" class="btn btn-success">Input Nilai</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lihat Nilai</h5>
                                <p class="card-text">Lihat daftar nilai siswa</p>
                                <a href="{{ route('guru.nilai.index') }}" class="btn btn-info text-white">Lihat Nilai</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>