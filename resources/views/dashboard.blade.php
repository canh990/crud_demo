<!DOCTYPE html>
<html>
<head>
    <title>Laravel Training</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #ffffff; }
        .navbar-custom {
            background-color: #e3f2fd; /* Màu xanh nhạt giống trong hình */
            padding: 10px 20px;
            margin-bottom: 50px;
        }
        .navbar-brand { font-weight: 500; color: #444; }
        .nav-link { color: #666; margin-left: 15px; }
        .card { border-radius: 4px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .card-header { background: #f8f9fa; font-size: 24px; padding: 15px; }
        .btn-dark { background-color: #212529; border: none; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Laravel Training</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('user.list') }}">Danh sach user</a>
            <a class="nav-link" href="{{ route('signout') }}">Quay ve list</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
