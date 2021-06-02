<!DOCTYPE html>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Stage2</title>




    <script src="https://cdn.websitetoolbox.com/js/jquery.min-1.11.2.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/js/bootstrap.min-3.1.1.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/js/moment-2.18.1.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/textarea/forum1/tinymce/tinymce.min-4.7.9.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/js/mb/i18next_global.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/js/mb/forum1_global.js" defer></script>

    <link rel="stylesheet" href="https://cdn.websitetoolbox.com/css/bootstrap.css">
    <link href="https://cdn.websitetoolbox.com/skins/mb/angela/angela.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.websitetoolbox.com/css/forum1_global.css" rel="stylesheet">

</head>

<body>

    <div id="body-wrapper">
        <div class="header-wrapper">
            <header id="forum_header_fixed" class="fixed-header">
                <div class="container">
                    <div class="nav-main-container col-xs-10">
                        <div class="nav-main">
                            <div class="push-panel">
                                <h3 id="logo_wrapper">
                                    <a href="/" id="logo_or_title">
                                        <span id="forumLogoWrapper">
                                        
                                        </span>

                                        <span id="forumTitleWrapper">
                                            <img src="{{ asset('img/logo.png') }}" alt="" style="z-index: 1000;">
                                        </span>
                                    </a>
                                </h3>
                            </div>



                            <div class="search-wrapper pull">
                                <span class="glyphicon glyphicon-search"></span>
                                <form name="inlineSearchForm" method="get" action="/discussions" id="inlineSearchForm">
                                    <input type="text" class="form-control pl-3" placeholder="Buscar..." name="title">
                                </form>
                                <div class="btn-group search-category">
                                    <button id="searchContent" class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                                        <span id="buttonName" data-i18n>Categorias</span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu left" role="menu">
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
                    </div>

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

                    <ul class="nav pull-right">
                        @guest

                        <a href="{{ route('login') }}" class="nav-link" id="login" style="color: white; margin-right:5px;">Inicia Sesion</a>

                        @if (Route::has('register'))

                        <a href="{{ route('register') }}" class="nav-link" id="register" style="color: white; margin-right:5px;">Registro</a>

                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret">
                                    <div class="dropdown-menu" style="padding-left:20px;">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="{{ route('discussions.index') }}"></a>
                                    </div>
                                </span>
                            </a>


                        </li>
                        @endguest
                    </ul>

                </div>
            </header>
        </div>

        <div class="main-container">




        </div>

        @yield('content')
    </div>

</body>

</html>
<!-- end page -->