<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Rubik:wght@500&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: #dc3545">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="https://gm1.ggpht.com/KRZH1z5DuY0VN2JcPtGLibd9Gm99DO3Wz41MQB6jiMjmv8LJVla5kPl04N6LlBB4pBQ-5u4mWrcHVALQ2FNB32FpeYVr8IB8d8f0RrXSjCcPH8Qy8ygb9Rlg_Wfl4VVt6LpcsGsFvIufMdSWTXPbL97Kig8x3n_6_6BfUBLkJlEKyyBSyvBRCeCCjqpg80QmSgQiDKGajIsYB0aiudaD_QXW8UPSxPwL_HCJ_nd3tRiXIGa7z-CE_adSs9ebDejN9sjaIP2HRW5VLZZksHRRHEElw4BJp3e4_QY4CgHEeN5be6jCS2eBKHykorhoyhQhNbeNGsRNcLnLNsKlktaWYXRs0_A5zXAMR-XTEtRFPBA64YYrWEBZMzZ-uDj6JH4z6e8rfQhQjywKs_nSn1CGWxMRMzJzxnQo8dpUaMty2BqpmTlh9GSldN4rDUpXAuNsNyLcBWI0A6CutelC4X0tMS79WQWhFgdBgRUWLqaqavDeVCg_28MBUYyfarrkIXLdyHAoaZUGs1gBG0SyNI40tX2m_quz6_nWZ-T5mg1gtjxLGcoy7EfeCIwu9xKRuLZsbP-4ps-bOzwoBAUkclxd7NJ0J8MkiI5mP6LEPKyxTxBo5ga0-lxGpTg-CMEtR-PC-9kfCZa23_3mf-XVI9BLYvcn3KJ0ChNUFev29i9KqbZ-eLWo27zHofrdz0kDovO-P-V3C-WdAfiWOIOOLxV3RVKMia_dx-cb_cXJIxIoQ2vC_ZNW4jRQK4T7xdCroiR3_l6n=s0-l75-ft-l75-ft" height="60px" >
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Profile
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                  <li><a class="dropdown-item" href="#">{{ auth()->user()->username }}</a></li>
                                  <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('logout') }}
                                  </a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                  </form>
                                </ul>
                              </li>
                            </ul>
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="main py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</html>
