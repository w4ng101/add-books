<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book System</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

    <style type="text/css">
        .dropdown-menu {
            padding: 0rem 0 !important;
        }

        .bg-light {
            background: #fff !important;
            border-bottom: 1px solid #f3f3f3;
        }

        .navbar {
            padding-bottom: 0 !important;
            padding-top: 0 !important;
        }

        .navbar-nav li.nav-item {
            padding: 10px !important;
        }

        .nav-item.active {
            background: #7fb3da;
        }


        /*.nav-item.active>nav-link */
        .navbar-light .navbar-nav .active > .nav-link {
            color: #fff !important;
            font-weight: bold !important;
        }
    </style>
</head>
<body>
    <div id="app">
        @if (Auth::user())
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item {{ (request()->is('books*') || request()->is('/')) ? 'active' : '' }}"><a href="/books" class="nav-link">Dashboard</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{asset('/images/user.jpg')}}" class="img-rounded" width="18" /> 
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class='dropdown-trigger btn' href='{{ route("logout") }}' data-target='dropdown1'   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                
            </div>
        </nav>
        @endif
        
    <main class="py-4">
        @yield('content')
    </main>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

</body>
</html>
