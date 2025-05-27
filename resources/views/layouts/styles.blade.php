<style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2980b9;
        --light-blue: #ebf5fb;
        --medium-blue: #b3d9f2;
    }

    body {
        background: linear-gradient(135deg, var(--light-blue), var(--medium-blue));
        min-height: 100vh;
    }

    .card {
        background: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        animation: fadeIn 0.5s ease-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .navbar {
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color)) !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        animation: slideDown 0.5s ease-out;
    }

    .table {
        animation: fadeIn 0.5s ease-out;
    }

    .table thead {
        background: var(--primary-color);
        color: white;
    }

    .form-control {
        border: 2px solid var(--medium-blue);
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .btn-primary {
        background: var(--primary-color);
        border: none;
    }

    .btn-primary:hover {
        background: var(--secondary-color);
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideDown {
        from {
            transform: translateY(-100%);
        }
        to {
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    .animate-pulse {
        animation: pulse 2s infinite;
    }

    .nav-link {
        position: relative;
        color: white !important;
        transition: all 0.3s ease;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: white;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .alert {
        animation: slideDown 0.5s ease-out;
    }

    .table tr {
        transition: all 0.3s ease;
    }

    .table tr:hover {
        background-color: var(--light-blue);
    }
</style>