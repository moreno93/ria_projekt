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
                        @if(Auth::user()->profile_pic != '')
                            <img src="{{ asset(Auth::user()->profile_pic) }}">
                        @else
                            <img src="{{ asset('images/profile_pic/default.jpg') }}">
                        @endif
                        <span>{{ Auth::user()->name }}</span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right icons-right">
                        <li><a href="/profile/{{ Auth::user()->id }} "><i class="icon-user"></i> Profile</a></li>
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

    @if(Auth::user())
            
        <!-- Search line -->
        <form class="search-line block" role="form" method="GET" action="/search">
            <span class="subtitle"><i class="icon-pencil3"></i> Search Activity:</span>
            
            <div class="row">
                <div class="col-sm-9">
                    <div class="search-control">
                        <input type="text" class="form-control autocomplete" name="query" placeholder="What are you looking for?">
                        <select name="search_option" class="multi-select-search" tabindex="2">
                            <option id="users_radio" value="users" selected="selected">Users</option> 
                            <option id="auditions_radio" value="auditions">Auditions</option> 
                            <option id="agencies_radio" value="agencies">Agencies</option> 
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary btn-lg" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
            
                    <a href="/search/advanced" class="btn btn-info btn-lg advanced">
                        <i class="fa fa-database"></i></i>Advanced search
                    </a>
                </div>
            </div>
        </form> 
        <!-- /search line --> 


    @endif

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

    @yield('javascript')


</body>
</html>
