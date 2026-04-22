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
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="#">Laravel Training</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.createUser') }}">Create user</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>