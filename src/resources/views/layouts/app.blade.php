<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')

    <title>Contact</title>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <p class="header__inner-title">FashionnablyLate</p>
            <div class="header__nav">
                @if (Request::is('admin'))
                    <!-- /admin の場合: ログアウトボタン -->
                    <a href="{{ route('logout') }}" class="header__button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>

                @elseif (Request::is('register'))
                    <!-- /register の場合: ログインボタン -->
                    <a href="{{ route('login') }}" class="header__button">login</a>

                @elseif (Request::is('login'))
                    <!-- /login の場合: 新規登録ボタン -->
                    <a href="{{ route('register') }}" class="header__button">register</a>
                @endif
            </div>
        </div>
    </header>

    @yield('content')

</body>

</html>
