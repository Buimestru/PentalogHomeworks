<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Library') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Library') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::guard('web')->check())
                            <li class="nav-item">
                                <a class="nav-link" href="/user/{{Auth::user()->id}}">{{ __('My Profile') }}</a>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (! (Auth::guard('admin')->check() || Auth::check()))
                            <li class="nav-item">
                                <a id="navbarDropdownLogin" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Login') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLogin">
                                    <a class="dropdown-item" href="{{ route('login') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('login-user-form').submit();">
                                        {{ __('Login as a user') }}
                                    </a>

                                    <form id="login-user-form" action="{{ route('login') }}" method="GET" style="display: none;">
                                    </form>

                                    <a class="dropdown-item" href="{{ route('admin.login') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('login-admin-form').submit();">
                                        {{ __('Login as an admin') }}
                                    </a>

                                    <form id="login-admin-form" action="{{ route('admin.login') }}" method="GET" style="display: none;">
                                    </form>
                                </div>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @elseif ((Auth::guard('admin')->check() || Auth::check()))
                            @if(Auth::guard('admin')->check())
                                <li class="nav-item">
                                    <a href="/notifications/admin" class="notification">
                                        <span>Notifications</span>
                                        <span class="badge">{{ 'App\Notification'::where('receiver_type', 'admin')
                                                                                 ->where('receiver_email', Auth::guard('admin')->user()->email)
                                                                                 ->unseen()
                                                                                 ->count()
                                                                                 }}
                                        </span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="/notifications/user" class="notification">
                                        <span>Notifications</span>
                                        <span class="badge">{{ 'App\Notification'::where('receiver_type', 'user')
                                                                                 ->where('receiver_email', Auth::user()->email)
                                                                                 ->unseen()
                                                                                 ->count()
                                                                                 }}
                                        </span>
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name ?? Auth::guard('admin')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
