<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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