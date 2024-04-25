<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="#">Register Users Details </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="margin-left: auto; ">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        @if(Auth::check())
                            <a class="nav-link">Welcome, {{ Auth::user()->name }}</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</td>
            <th>DOB</td>
            <th>Gender</td>
            <th>Country</td>
            <th>State</td>
            <th>City</th>

        </tr>
        </thead>
        <tbody>


            @foreach($users as $user)
                <tr>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['date_of_birth']}}</td>
                <td>{{$user['gender']}}</td>
                <td>{{$user->country()->first()?->name}}</td>
                <td>{{$user->state()->first()?->name}}</td>
                <td>{{$user->city()->first()?->name}}</td>
                </tr>
            @endforeach


        </tbody>

    </table>
</div>


</body>

</html>
