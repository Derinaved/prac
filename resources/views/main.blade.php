<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .max-w-xL {
            width: 500px;
        }
        .form{
            width: 500px;

            display: flex;
            align-items: stretch;
            flex-direction: column;
        }
        main{
            display: flex;
            margin-top: 100px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .card-body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .cr{
            display: flex;
            width: 75%;
            justify-content: center;
        }
        .cr2{
            margin: 20px;
        }
    </style>
    <title>MyTask</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}">MyTask</a>

                    <div class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                           <li> <a href="{{ route('profile', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()) }}" class="nav-link">Профиль</a> </li>

                           <li> <a href="{{ route('logout') }}" class="nav-link">Выйти</a> </li>
                        @else
                           <li> <a href="{{ route('login') }}" class="nav-link">Вход</a> </li>

                            @if (Route::has('register'))
                            <li> <a href="{{ route('register') }}" class="nav-link">Регистрация</a> </li>
                            @endif
                        @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
