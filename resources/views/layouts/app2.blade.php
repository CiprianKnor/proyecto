<!DOCTYPE html>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Stage2</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                                <ul class="dropdown-menu left" role="menu">
                                    <li><a href="/">Categories</a></li>
                                </ul>
                                <h3 id="logo_wrapper">
                                    <a href="/" id="logo_or_title">
                                        <span id="forumLogoWrapper">

                                        </span>

                                        <span id="forumTitleWrapper">
                                            Stage2
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
                                        <span id="buttonName" data-i18n>Categorias</span>
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

                    <ul class="nav pull-right">
                        @auth
                        <li>
                            <a href="{{ route('users.notifications') }}" class="user-nav-icon dropdown-toggle" type="button" data-toggle="dropdown"><i data-toggle="tooltip" data-placement="bottom" data-i18n="[title]Notifications" title="Notifications" class="glyphicon glyphicon-bell"></i></a>
                        </li>
                        @endauth
                    </ul>


                    <ul class="nav pull-right">
                        @guest
                        
                            <a href="{{ route('login') }}" class="nav-link" id="login" style="color: white; margin-right:5px;">{{ __('Login') }}</a>
                        
                        @if (Route::has('register'))
                        
                            <a href="{{ route('register') }}" class="nav-link" id="register" style="color: white; margin-right:5px;">{{ __('Register') }}</a>
                        
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret">
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
                                </span>
                            </a>

                        </li>
                        @endguest
                    </ul>

            </header>
        </div>

        <div class="main-container">

            <div class="header-image container">
                <div id="header_image"></div>
            </div>

            <div class="modal fade" id="pmessage_modal" tabindex="0" role="dialog" aria-hidden="true" data-old_fixed_dialog="0"></div>

            @yield('content')
        </div>

    </div>

</body>

</html>
<!-- end page -->