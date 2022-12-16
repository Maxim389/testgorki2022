<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>@yield('title', 'Главная старница')</title>
</head>
<body>
    @yield('header')
    <header class="header flex">
        <div class="container flex jcsb aic">
        <h1><a href="/" style="text-decoration: none; color:black">Hotel</a></h1>
        <div class="header-btn-container">
            @guest
            <a href="{{route('register')}}" class="header-btn">Регистрация</a>
            <a href="{{route('auth')}}" class="header-btn">Авторизация</a>
            @endguest
            @auth
            <div class="dropdown">
                    <img onclick="myFunction()" class="dropbtn img" src="{{'/storage/'. Auth::user()->photo}}"
                         alt="Картинка">
                    <div id="myDropdown" class="dropdown-content">
                    <a href="{{route('lk')}}" >Личный кабинет</a>
            <a href="{{route('addBooking')}}">забронировать</a>
            @if(auth()->user()->role == 'Admin')
            <a href="{{route('admin')}}">кабинет администратора</a>
            @endif
            <a href="{{route('logout')}}">Выход</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <script src="/assets/js/js.js"></script>
</body>
</html>
