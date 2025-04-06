<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MyTask</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}">Главная</a>

                <div class="dropdown">
                    <button  class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton1"
                             type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        Каталог
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @if($items->count())
                            @foreach($items as $item)
                                <li>
                                    <a href="{{route('categories.show', $item->id)}}" class="dropdown-item">{{$item->title}}</a>
                                </li>
                                @if ($item->children->count())
                                    <ul>
                                        @foreach($item->children as $child)
                                            <a href="{{ route('categories.show', $child->id) }}" class="dropdown-item">
                                                {{$child->title}}
                                            </a>
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                    @endif
                    </ul>
                </div>
                    <a class="navbar-brand" href="{{ route('cart.index') }}">Корзина</a>
                <a class="navbar-brand" href="{{route('create_message')}}">Обратная связь</a>
                <a class="navbar-brand" href="{{route('show_all_message')}}">Отзывы о магазине</a>

                    <div class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                            @if(Illuminate\Support\Facades\Auth::user()->getAuthIdentifier() == 1)
                                <li> <a href="{{ route('admin')}}" class="nav-link">Админ панель</a> </li>
                            @endif

                            <li> <a href="{{ route('orders.index', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()) }}" class="nav-link">Профиль</a> </li>

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
<script>
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
    const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl, {
        popperConfig: {
            modifiers: [{
                name: 'offset',
                options: {
                    offset: [0, 4] // Для небольшой отстройки от кнопки, если нужно
                }
            }]
        }
    }))

    // Добавляем поведение при наведении
    for (const dropdown of dropdownList) {
        dropdown._element.addEventListener('mouseover', () => {
            dropdown.show();
        });


        // Закрытие при выходе за пределы dropdown
        dropdown._menu.addEventListener('mouseleave', () => {
            dropdown.hide();
        });
    }
</script>
<footer class="bg-light text-center py-3">
    <div class="container">
        <p>&copy; 2025 СпортМагазин</p>
    </div>
</footer>
