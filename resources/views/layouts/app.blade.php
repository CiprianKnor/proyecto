<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JS -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>

    @yield('css')
</head>

<style>
    .a-mio:hover{
        color: blue;
    }
</style>

<script>
    (function($) {

        "use strict";

        $('nav .dropdown').hover(function() {
            var $this = $(this);
            $this.addClass('show');
            $this.find('> a').attr('aria-expanded', true);
            $this.find('.dropdown-menu').addClass('show');
        }, function() {
            var $this = $(this);
            $this.removeClass('show');
            $this.find('> a').attr('aria-expanded', false);
            $this.find('.dropdown-menu').removeClass('show');
        });

    })(jQuery);
</script>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>
                <form action="/discussions" class="searchform order-lg-last" method="get">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control pl-3" placeholder="Search" name="title">
                        <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                    </div>
                </form>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link" id="login">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link" id="register">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item a-mio" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ route('discussions.index') }}"></a>
                            </div>
                        </li>
                        @endguest
                        <li class="nav-item">
                            <a href="{{ route('discussions.index') }}" class="nav-link">
                                Discussions
                            </a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="{{ route('users.notifications') }}" class="nav-link">
                                <span>
                                    {{ auth()->user()->unreadNotifications->count() }}
                                    Notificaciones sin leer
                                </span>
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        @if(!in_array(request()->path(), ['login', 'register', 'password/email', 'password/reset']))
        <main class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    @auth
                    <a href="{{ route('discussions.create') }}" style="width: 100%;" class="btn btn-info my-2">
                        Create Discussion
                    </a>
                    @else
                    <a href="{{ route('login') }}" style="width: 100%;" class="btn btn-info my-2">
                        Sign in to add discussion
                    </a>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            Channels
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($channels as $channel)
                                <li class="list-group-item">
                                    <a href="{{ route('discussions.index') }}?channel={{ $channel->slug }}">
                                        {{$channel->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </main>
        @else
        <main class="py-4">
            @yield('content')
        </main>
        @endif

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>

</html>