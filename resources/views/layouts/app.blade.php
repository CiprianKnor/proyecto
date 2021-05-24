<!DOCTYPE html>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Stage2</title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        try {
            if (typeof(Storage) !== "undefined" && sessionStorage.getItem("loadThemeEditor")) {
                var showThemeLoader = {};
                showThemeLoader.loadingThemeEditor = 1;
                window.parent.postMessage(showThemeLoader, '*');
            }
        } catch (e) {}
    </script>



    <script language="JavaScript" type="text/javascript">
        var global_hash = {
            AppId: '',
            perm_view_profiles: '1',
            forum_embed_url: '',
            date_format: '3',
            uid: '267033',
            enable_pms: 'checked',
            forum_SSO_login_url: '',
            less_variables: '',
            skin: 'angela',
            max_file_size: '204800',
            display_time: '1',
            alt_embed_param: '0'
        };
        if (typeof wtbx === 'undefined') var wtbx = {};

        wtbx.isPostRequest = 0;

        wtbx.cdn = 'https://cdn.websitetoolbox.com';
        wtbx.userLang = 'en';
        wtbx.wysiwyg = 'both';
        wtbx.toolbarCompatible = '1';
        wtbx.uses_smilies = '0';
        wtbx.isBot = '';
        wtbx.date_format = '3';
        wtbx.homePage = 'categories';
        wtbx.reqreg = 'checked';
        wtbx.webPushAlert = false;
    </script>


    <script src="https://cdn.websitetoolbox.com/js/jquery.min-1.11.2.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/js/bootstrap.min-3.1.1.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/js/moment-2.18.1.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/textarea/forum1/tinymce/tinymce.min-4.7.9.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/js/mb/i18next_global.js" defer></script>
    <script language="JavaScript" type="text/javascript" src="https://cdn.websitetoolbox.com/js/mb/forum1_global.js" defer></script>

    <link rel="stylesheet" href="https://cdn.websitetoolbox.com/css/bootstrap.css">


    <link href="https://cdn.websitetoolbox.com/skins/mb/angela/angela.css" rel="stylesheet" type="text/css">


    <link href="https://cdn.websitetoolbox.com/css/forum1_global.css" rel="stylesheet">


    <link rel="manifest" href="/manifest.json">

    <link rel="apple-touch-icon" href="https://cdn.websitetoolbox.com/images/app_icons/ios-unrounded-1024px.png">




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
                                        <span id="buttonName" data-i18n>Categorias</span><span class="caret"></span>
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


            <div class="container content-panel forum-list wt-categories">
                <a id="startTopic" href="{{ route('discussions.create') }}" class="pull-right btn btn-uppercase btn-primary start-new-topic-btn "><span data-i18n>New Topic</span></a>

                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="/latest" data-i18n>Topics</a></li>
                </ul>
                <div class="tab-content">


                    <div class="panel panel-default">

                        <div class="panel-body table-responsive">
                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>

</body>

</html>
<!-- end page -->