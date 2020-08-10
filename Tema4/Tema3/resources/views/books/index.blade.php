<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
    <link rel="stylesheet" href="/css/style.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
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
                @endguest
            </ul>
        </div>
    </div>
</nav>
    <h1>Book Records</h1>
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher Name</th>
            <th>Publish Year</th>
            @auth()
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            <th></th>
            @endauth
        </tr>
         <?php $nrCrt = 0; ?>
         @foreach($books as $book)
        <tr>
            <?php $nrCrt++; ?>
            <td>{{$nrCrt}}</td>
            <td>{{$book->title}}</td>
            <td><a href="/author/{{$book->author_id}}">{{$book->author->name}}</a></td>
            <td><a href="/publisher/{{$book->publisher_id}}">{{$book->publisher->name}}</a></td>
            <td>{{$book->publish_year}}</td>
                @auth()
            <td>{{$book->created_at}}</td>
            <td>{{$book->updated_at}}</td>
            <td><a href="/edit/{{$book->id}}">Edit</a></td>
            <td><form action="/delete/{{$book->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
                @endauth
        </tr>
        @endforeach
    </table>
    <br>
    <button><a href="/authors" class="btn">authors</a></button>
    <button><a href="/publishers" class="btn">publishers</a></button>
    @auth()
    <button><a href="/users" class="btn">users</a></button>
    <button><a href="/borrowings" class="btn">borrowings</a></button>
    <button class="align_right"><a href="/create" class="btn">add a new record</a></button>
    @endauth
</body>
</html>
