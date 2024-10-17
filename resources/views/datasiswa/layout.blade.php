<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Data Siswa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome for icons -->
    <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


    <style>
        body {
            display: flex;
            flex-direction: row;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light background color for contrast */
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            color: #ffffff;
            padding-top: 20px; /* Add padding at the top */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5); /* Add shadow for depth */
        }
        #content {
            margin-left: 250px; /* Space for sidebar */
            padding: 20px;
            width: 100%;
        }
        .navbar-brand {
            font-size: 1.5rem; /* Increase font size for brand */
            font-weight: bold;
        }
        .nav-link {
            font-size: 1.1rem; /* Slightly larger font for nav links */
        }
        .dropdown-menu {
            background-color: #495057; /* Darker dropdown menu */
        }
        .dropdown-item {
            color: #ffffff; /* White text for dropdown items */
        }
        .dropdown-item:hover {
            background-color: #6c757d; /* Change color on hover */
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar Samping -->
    <nav id="sidebar" class="sidebar p-4">
        <div class="container-fluid flex-column">
            <a class="navbar-brand" href="#">Data Siswa</a>
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-user-graduate"></i> Data Siswa
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('siswa.index') }}">Data Siswa</a></li>
                        <li><a class="dropdown-item" href="{{ route('siswa.create') }}">Tambah Baru</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-chalkboard-teacher"></i> Data Guru
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('guru.index') }}">Data Guru</a></li>
                        <li><a class="dropdown-item" href="{{ route('guru.create') }}">Tambah Baru</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Konten -->
    <div id="content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
