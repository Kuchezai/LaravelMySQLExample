<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<div style="min-height:calc(100vh - 56px);">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Обувные договора</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Компании
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route("companies.index")}}">Все компании</a></li>
                            <li><a class="dropdown-item" href="{{route("companies.create")}}">Добавить компанию</a></li>
                            <li><a class="dropdown-item" href="{{route("shipment.create")}}">Добавить
                                    товар</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Договора
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route("agreements.index")}}">Все договора</a></li>
                            <li><a class="dropdown-item" href="{{route("agreements.create")}}">Добавить договор</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<style>
    BODY {
        background: antiquewhite;
        /* Цвет фона веб-страницы */
    }

    A {
        color: rgba(255, 255, 255, 0.59); /* Цвет ссылок */
    }

    A:active {
        color: rgba(255, 255, 255, 0.59); /* Цвет активных ссылок */
    }
</style>
@yield('content')
</div>

<footer class="bg-dark text-center text-light">
    <div class="text-center p-3" style="background-color: #1d2023;  width: 100%;">
        © 2022 Copyright: Коженов Артём. ИКВТ-03
        <a href="https://t.me/kozhen_ar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram"
                 viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
            </svg>
        </a>
    </div>
</footer>
