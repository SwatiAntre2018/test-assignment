<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">

    <div class="container-fluid">
        <a class="navbar-brand" href="#">User Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>

            <ul class="navbar-nav">
                @guest
                    <li class="nav-item me-3">
                        <!-- Add margin right to each nav-item using Bootstrap class 'me-3' -->
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item me-3">
                        <!-- Add margin right to each nav-item using Bootstrap class 'me-3' -->
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item me-3">
                        <!-- Add margin right to each nav-item using Bootstrap class 'me-3' -->
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
</body>

</html>
