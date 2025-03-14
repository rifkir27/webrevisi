<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
        }
        .navbar {
            background-color: #1a4f7a !important;
        }
        .table thead {
            background-color: #2c6ca0;
            color: white;
        }
        .table {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            color: #1a4f7a;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Penilaian - {{ Auth::guard('siswa')->user()->nama }}</a>
            <div class="navbar-nav ms-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-body">
                <h4>Data Siswa</h4>
                <table class="table table-bordered">
                    <tr>
                        <th width="200">NIS</th>
                        <td>{{ Auth::guard('siswa')->user()->nis }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ Auth::guard('siswa')->user()->nama }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ Auth::guard('siswa')->user()->kelas }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <h2>Daftar Nilai</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Harian</th>
                        <th>UH 1</th>
                        <th>UH 2</th>
                        <th>Nilai Akhir Semester</th>
                        <th>Rata-rata</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilai as $key => $n)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $n->mata_pelajaran }}</td>
                        <td>{{ $n->nilai_harian }}</td>
                        <td>{{ $n->ulangan_harian_1 }}</td>
                        <td>{{ $n->ulangan_harian_2 }}</td>
                        <td>{{ $n->nilai_akhir_semester }}</td>
                        <td>{{ number_format($n->rata_rata, 2) }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>