<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>@yield('title')</title>

    <style>
        html {
            scroll-behavior: smooth;
            font-family: "Poppins";
            color: #65625E;
        }

        body {
            color: #65625E;
        }

        h1 {
            font-family: "Anton";
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
            font-family: "Poppins";
            font-size: 1rem;
            font-weight: 700;
        }

        button {
            font-family: "Poppins";
        }

        form.div {
            font-family: "Poppins";
        }
    </style>

</head>

@php
    $routeName = request()
        ->route()
        ->getName();
@endphp

<body>



    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => str_starts_with($routeName, 'blog.')]) href="{{ route('blog.index') }}">Blog</a>
                    </li>

                  <div class="d-flex justify-content-end">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form class="nav-item px-2" action="{{ route('auth.logout') }}" method="post">
                                          @method('delete')
                                          @csrf
                                          <button class="nav-link">Logout</button>
                                      </form>
                                </li>
                            </ul>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="" href="{{ route('auth.login') }}">Sign In</a>
                        </li>
                    @endguest
                  </div>
                </ul>
            </div>
        </div>
      </nav>


    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

</body>

</html>
