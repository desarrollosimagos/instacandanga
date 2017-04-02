<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
    <!-- Scripts -->
    @yield('header_lib')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1924808381083207',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

    <div id="app" style="background-color:#d22052">
        <nav class="navbar navbar-default navbar-static-top" style="background-color:#fff;margin-bottom: 0px;">
            <div class="container">
                
                    <div class="row">
                        <div class="col-md-6 text-left"><a href="/"><img src="{{ url('img/gob.png') }}"></a></div>
                        <div class="col-md-6 text-right"><a href="/"><img src="{{ url('img/zam.png') }}"></a></div>
                    </div>
                
            </div>
        </nav>

        <nav class="navbar navbar-default navbar-static-top" 
        style="border-bottom-width:7px;border-bottom-color:#9d183e;background-image: url('img/bg_tira.png');">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image 
                    {{ config('app.name', 'Laravel') }} 
                    <img src="{{ url('img/insta_50.png') }}">
                    -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="max-height:47px;">
                        
                        
                        <!-- Authentication Links 
                        
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"></a></li>
                            <li><a href="{{ url('/registrar') }}"><img src="{{ url('img/registrate.png') }}"></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        -->
                        @if (Auth::guest())
                            
                            <a href="{{ url('/register') }}"><img src="{{ url('img/registrate.png') }}"></a>
                            
                        @else
                            
                        @endif
                        <div
                        class="fb-like"
                        data-share="true"
                        data-width="450"
                        data-show-faces="true">
                        </div>
                        <a href="/"><img src="{{ url('img/red.png') }}"></a>
                        
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts
    <script src="/js/app.js"></script>
     -->
    <script type="text/javascript">
		@yield('js')
	</script>
    
</body>
</html>
