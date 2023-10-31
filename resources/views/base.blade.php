<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>@yield('title')</title>

    <style>
        html {
            scroll-behavior: smooth;
            font-family: Poppins;
            color: #65625E;
        }

        body {
            color: #65625E;
        }

        h1 {
            font-family: Anton;
            font-size: 1.5rem;
        }

        h2 {
            font-size: 1.3rem;
        }

        h3 {
            font-weight: 600;
            font-size: 1.1rem;
        }

        p {
            font-weight: 500;
        }

        ul,
        li,
        a {
            font-family: Poppins;
            font-size: 1rem;
            font-weight: 600;
        }

        @layer demo {
            button {
                all: unset;
                font-family: Anton;
            }
        }
    </style>

</head>

@php
    $routeName = request()
        ->route()
        ->getName();
@endphp

<body>

    <div class="container mt-5 mb-3">

        <ul class="nav nav-underline nav-justified mb-5">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Accueil</a>
            </li>
            <li class="nav-item">
                <a @class(['nav-link', 'active' => str_starts_with($routeName, 'blog.')]) href="{{ route('blog.index') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>

    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

</body>

</html>
