<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RIA Projekt</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{{ asset('css/bootstrap.min.css') }}}" rel="stylesheet"> 
    <link href="{{{ asset('css/londinium-theme.css') }}}" rel="stylesheet"> 
    <link href="{{{ asset('css/styles.css') }}}" rel="stylesheet"> 
    <link href="{{{ asset('css/icons.css') }}}" rel="stylesheet"> 

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

</head>
<body id="app-layout">
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            @if (Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}">RIA Projekt</a>
            @else
                <a class="navbar-brand" href="{{ url('/home') }}">RIA Projekt</a>
            @endif
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
                <span class="sr-only">Toggle navbar</span>
                <i class="icon-paragraph-justify2"></i>
            </button>
        </div>

        <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="user dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="http://placehold.it/300">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right icons-right">
                        <li><a href="{{ url('/profile') }}"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="#"><i class="icon-bubble4"></i> Messages</a></li>
                        <li><a href="#"><i class="icon-cog"></i> Settings</a></li>

                        @if (Auth::user()->agency()->first())
                            <li><a href="/agencies/user/{{ Auth::user()->agency()->first()->user_id }}"><i class="icon-camera6"></i> View your Agency Page</a></li>
                        @else
                            <li><a href="/agencies/create"><i class="icon-camera6"></i> Create an Agency Page</a></li>
                        @endif
                        <li><a href="{{ url('/logout') }}"><i class="icon-exit"></i> Logout</a></li>
                    </ul>
                </li>
            @endif               
        </ul>
    </div>

    <div class="page-container">
        <div class="page-content">
            <div class="page-header">
                @include('flash::message')
                <div class="page-title">
                @yield('header')
                </div>
            </div>

            <div class="row">
                @yield('content') 
            </div>

            <div class="footer clearfix">
                <div class="pull-left">
                © 2016. RIA Projekt 
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    
    <script src="{{ asset('js/plugins/charts/sparkline.min.js') }}"></script>

    <script src="{{ asset('js/plugins/forms/uniform.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/select2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/inputmask.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/autosize.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/inputlimit.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/listbox.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/multiselect.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/tags.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/switch.min.js') }}"></script>


    <script src="{{ asset('js/plugins/forms/uploader/plupload.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/uploader/plupload.queue.min.js') }}"></script>

    <script src="{{ asset('js/plugins/forms/wysihtml5/wysihtml5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/wysihtml5/toolbar.js') }}"></script>

    <script src="{{ asset('js/plugins/interface/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/plugins/interface/fancybox.min.js') }}"></script>
    <script src="{{ asset('js/plugins/interface/moment.js') }}"></script>
    <script src="{{ asset('js/plugins/interface/jgrowl.min.js') }}"></script>
    <script src="{{ asset('js/plugins/interface/datatables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/interface/colorpicker.js') }}"></script>
    <script src="{{ asset('js/plugins/interface/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/interface/timepicker.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/application.js') }}"></script>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>
