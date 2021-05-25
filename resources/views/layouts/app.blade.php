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
            sso_disabled: 1,
            AppId: '',
            perm_view_profiles: '1',
            forum_embed_url: '',
            date_format: '3',
            uid: '267033',
            enable_pms: '',
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
        wtbx.userLang = '';
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
                                        <span id="buttonName" data-i18n>Categories</span> <span class="caret"></span>
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


                    <ul class="nav pull-right wt-pages-links hidden">
                        <a href="/post/printadd" class="pull-left btn btn-uppercase btn-primary start-new-topic-btn hidden signupLogin"><span data-i18n>New Topic</span></a>

                        <li class="pull-left search_modal_toggle">
                            <a href="/search" data-toggle="tooltip" data-placement="bottom" title="Search" data-i18n="[title]Search">
                                <i class="icon icon-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </header>
        </div>

        <div class="main-container">

            <div class="header-image container">
                <div id="header_image"></div>
            </div>


            <div id="user_login" class="modal fade  " tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                    <span class="wt-login-message hidden" data-i18n>Join the conversation</span>
                    <div class="modal-content">
                        <form class="form-horizontal" method="post" role="form" action="{{ route('login') }}" name="frmLogin">
                            @csrf
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" tabindex="8">&times;</button>
                                <h4 class="modal-title" id="myModalLabel" data-i18n>Log In</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label" data-i18n>Username or Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="inputEmail3" name="member" value="" class="form-control" tabindex="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-4 control-label" data-i18n>Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" id="inputPassword3" name="pw" value="" tabindex="2">

                                        <small><a href="/register/lost_pw" id="anchor_tab_forget_password" data-i18n tabindex="3">Forgot your password?</a></small>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-6">
                                        <button type="submit" class="btn btn-primary" data-loading-text="Logging in..." data-i18n tabindex="5">Log In</button>

                                        <span class="text-muted">&nbsp;<span data-i18n>or</span>&nbsp;</span>
                                        <a class="wt-registration-page-link" href="/register/register" data-i18n tabindex="6">Create an account</a>

                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="action" value="dologin">
                            <input type="hidden" name="jump" value="https://byxipi.discussion.community/latest?trail=25">
                            <input type="hidden" name="embedded" value="">
                        </form>
                    </div>
                </div>
            </div>

            @yield('content')

            <!-- LOGIN DIALOG -->
            <div class="modal fade  " id="form-dialog" tabindex="0" role="dialog" aria-hidden="true">
                <div class="modal-dialog" id="login_register_modal">
                    <span class="wt-login-message hidden" data-i18n>Join the conversation</span>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" id="bootstrap_close_register_dialog" tabindex="13">&times;</button>
                            <h4 class="modal-title" id="myModalLabel" data-i18n>You need to be logged in to send an email.</h4>
                        </div>
                        <div class="modal-body">


                            <form method="post" action="/register/create_account" name="PostTopics" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <span class="text-block" data-i18n>Create Account</span>
                                    <div class="col-sm-12">
                                        <input type="text" id="registerModalCreateAccount" class="form-control" data-i18n="[placeholder]Username" placeholder="Username" name="member" value="" maxlength="25" tabindex="1">
                                    </div>
                                    <div class="col-sm-12 cleared">
                                        <input type="password" class="form-control" data-i18n="[placeholder]Password" placeholder="Password" name="pw" value="" tabindex="2">
                                    </div>
                                    <div class="col-sm-12 cleared">
                                        <input type="text	" class="form-control" data-i18n="[placeholder]Email Address" placeholder="Email Address" name="email" value="" maxlength="50" tabindex="3">
                                    </div>

                                    <div class="col-sm-12 cleared text-muted termsAndRulesConfirmation">
                                        <label>
                                            <input type="checkbox" id="rules_checkbox" name="rules_checkbox" value="checked" tabindex="4">&nbsp;
                                            <span><span data-i18n="createAccountToAgree">I agree to the</span> <a id="rules_dialog" href="/register?action=forumrules" target="_blank" data-i18n="termsAndRules" tabindex="5">Terms &amp; Rules.</a></span>
                                        </label>
                                    </div>


                                    <div class="hdx"><textarea name="comments_0497" cols="35" rows="5"></textarea></div>
                                    <button type="submit" class="btn btn-primary cleared" data-i18n tabindex="6">Create Account</button>
                                </div>
                                <input type="hidden" name="action" value="create_account">
                                <input type="hidden" name="cist" value="" id="cist">
                                <input type="hidden" name="quick_register" value="1">
                            </form>

                            <form method="post" action="/register" name="frmLogin" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <span id="user-login-modal-heading" class="text-block" data-i18n>Log In</span>
                                    <div class="col-sm-12">
                                        <input type="text" id="registerModalUserName" class="form-control" data-i18n="[placeholder]Username or Email" placeholder="Username or Email" name="member" value="" tabindex="7">
                                    </div>
                                    <div class="col-sm-12 cleared">
                                        <input type="password" class="form-control" id="registerModalPassword" data-i18n="[placeholder]Password" placeholder="Password" name="pw" value="" tabindex="8">

                                        <div class="pull-right">
                                            <small><a href="/register/lost_pw" id="anchor_tab_forget_password" class="text-right" data-i18n tabindex="9">Forgot your password?</a></small>
                                        </div>

                                    </div>
                                    <div class="col-sm-8 cleared">
                                        <label>
                                            <input type="checkbox" name="remember" value="checked" tabindex="10">&nbsp; <span class="text-muted" data-i18n>Keep me logged in</span>
                                        </label>
                                    </div>
                                    <div class="cleared"></div>
                                    <button type="submit" class="btn btn-primary cleared" data-loading-text="Logging in..." data-i18n tabindex="11">Log In</button>
                                    <input type="hidden" name="action" value="dologin">
                                    <input type="hidden" name="jump" value="https://byxipi.discussion.community/latest?trail=25">
                                    <input type="hidden" name="embedded" value="">
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
</body>

</html>
<!-- end page -->