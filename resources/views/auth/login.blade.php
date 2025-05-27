@include('layouts.styles')
<!DOCTYPE html>

<html>
<head>
    <title>Login - Sistem Penilaian Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #0f2027, #203a43, #2c5364);
            height: 100vh;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            background: rgba(255, 255, 255, 0.9);
        }
        .card-header {
            background: #f8f9fa;
            border-bottom: 2px solid #203a43;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #0f2027;
            border-radius: 15px 15px 0 0;
        }
        .card-body {
            padding: 40px;
            background: #fff;
            border-radius: 0 0 15px 15px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 2px solid #203a43;
            background: #f8f9fa;
        }
        .form-control:focus {
            border-color: #2c5364;
            box-shadow: 0 0 0 0.2rem rgba(44, 83, 100, 0.25);
            background: #fff;
        }
        .btn-primary {
            background: #203a43;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background: #2c5364;
            transform: translateY(-2px);
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #203a43;
            border-right: none;
            color: #0f2027;
        }
        .form-control {
            border-left: none;
        }
        .text-white {
            color: #e8f0fe !important;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .alert-danger {
            background-color: rgba(220, 38, 38, 0.1);
            border-color: #dc2626;
            color: #dc2626;
        }
        .fa-user-circle {
            color: #203a43;
        }
    </style>
    <style>
        .login-container {
            animation: fadeIn 0.8s ease-out;
        }
        
        .input-group {
            transition: all 0.3s ease;
        }
        
        .input-group:hover {
            transform: translateX(5px);
        }
        
        .login-title {
            animation: slideDown 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center mb-4">
                    <h1 class="text-white mb-4">Sistem Penilaian Siswa</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-circle fa-2x mb-3"></i>
                        <div>Login</div>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt me-2"></i> Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>