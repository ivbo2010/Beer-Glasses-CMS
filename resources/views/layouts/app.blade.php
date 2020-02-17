<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">--}}
<!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <!-- MDB core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <header class="site-header">
        <div class="left-branding">
            <h1 class="site-title">
                <a href="/" rel="home"><img src="{{ URL::to('/') }}/images/{{ $settings[0]->site_logo }}" height="40" alt="..."></a>
            </h1>
        </div>
        <div class="left-menu">
            <div class="menu-icon">
                <img src="{{ asset('images/menu-open.png') }}" alt="menu">
            </div>
            <div class="menu-close-icon">
                <img src="{{ asset('images/close.png') }}" alt="menu close">
            </div>
        </div>
    </header>
    <nav class="left-navigation flex flex-column justify-content-between">
        <div class="left-branding d-none d-lg-block ">
            <h1 class="site-title">
                <a href="/" rel="home">{{ $settings[0]->site_name }}</a>
            </h1>
        </div>
        <ul class="main-menu flex flex-column justify-content-center">
            <li>
                <form method="get" action="{{ route('search.result') }}" class="form-inline mr-auto search-form">
                    <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}"
                        class="form-control" placeholder="Search.." aria-label="Search">
                    <button class="btn orange waves-effect waves-light search-button" type="submit">
                        <i class="fas fa-search"></i></button>
                </form>
            </li>
            <li><a href="/beer">Beer glasses</a></li>
            <li><a href="/category">Beer categories</a></li>
            <li><a href="/pub">Pubs</a></li>
            <li><a href="/pubcategory">Pubs categories</a></li>
            @guest
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
            @else
                <li><a href="/admin/home">Dashboard</a></li>
                <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
        <div class="social-profiles">
            <ul class="flex justify-content-start justify-content-lg-center align-items-center">
                <li><a href="{{ $settings[0]->facebook }}"><i class="fab fa-facebook fa-2x"></i></a></li>
                <li><a href="{{ $settings[0]->vimeo }}"><i class="fab fa-vimeo fa-2x"></i></a></li>
                <li><a href="{{ $settings[0]->twitter }}"><i class="fab fa-twitter fa-2x "></i></a></li>
                <li><a href="{{ $settings[0]->youtube }}"><i class="fab fa-youtube fa-2x"></i></a></li>
                <li><a href="{{ $settings[0]->linkedin }}"><i class="fab fa-linkedin fa-2x"></i></a></li>
            </ul>
        </div>
    </nav>
    <div class="nav-bar-sep d-lg-none"></div>
    <main>
        @yield('content')
    </main>
</div>
<script type='text/javascript'>
    $(document).ready(function () {
        $('.left-menu').on('click', function () {
            $(this).toggleClass('close');
            $('.left-branding').toggleClass('hide');
            $('.left-navigation').toggleClass('show');
            $('.site-header').toggleClass('no-shadow');
        });
    });
</script>
</body>
</html>
