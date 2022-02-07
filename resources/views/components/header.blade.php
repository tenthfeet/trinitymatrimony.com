<div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
    <div class="navbar-inner">
        <div class="container">

            <!--a class="brand" href="index.html"><img src="images/logo.png" alt="logo"></a-->
            <a class="brand" href="{{ url('/') }}"><span style="font-size:2em; color:#FFF;">{{ strtoupper(config('app.name', 'Laravel')) }}</span>
                <!--img src="images/trinitylogo.png" alt="logo"-->
            </a>
            <div class="pull-right">
                <nav class="navbar nav_bottom" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav nav_1">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about') }}">About</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/newprofiles')}}">New Matches</a></li>
                                    <li><a href="{{url('/viewedprofiles')}}">Viewed Matches</a></li>
                                </ul>
                            </li>
                            @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ url('/registration') }}">Register</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->firstname }}<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/viewprofile') }}">View Profile</a></li>
                                    <li><a href="{{ url('/updateprofile') }}">Update Profile</a></li>
                                    <li><a href="{{ route('password.request') }}">Change Password</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li><a href="{{ url('/search') }}">Search</a></li>
                            <!-- <li><a href="{{ route('logout') }}">Logout</a></li> -->
                            @endguest
                            <li class="last"><a href="{{ url('/contact') }}">Contacts</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div> <!-- end pull-right -->
            <div class="clearfix"> </div>
        </div> <!-- end container -->
    </div> <!-- end navbar-inner -->
</div>