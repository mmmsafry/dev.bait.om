 <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b>ait</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Bait</b>.om</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-default navbar-static-top">
             <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    

                    <!-- Branding Image 
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>-->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            @can('view_users')
                               <!-- <li class="{{ Request::is('users*') ? 'active' : '' }}">
                                    <a href="{{ route('users.index') }}">
                                        <span class="text-info glyphicon glyphicon-user"></span> Users
                                    </a>
                                </li> -->
                            @endcan

<!--                            @can('view_posts')
                                <li class="{{ Request::is('posts*') ? 'active' : '' }}">
                                    <a href="{{ route('posts.index') }}">
                                        <span class="text-success glyphicon glyphicon-text-background"></span> Posts
                                    </a>
                                </li>
                            @endcan-->
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            @can('view_roles')
                           <!-- <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                                <a href="{{ route('roles.index') }}">
                                    <span class="text-danger glyphicon glyphicon-lock"></span> Roles
                                </a>
                            </li> -->
                            @endcan

                            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                                <a href="#">
                                    <span class="text-danger glyphicon glyphicon-lock"></span> {{ Auth::user()->roles->pluck('name')->first() }}
                                </a>
                            </li>
                            
                            <li class="dropdown">
                                  
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="glyphicon glyphicon-log-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                   
                                </a>           
                               
                            </li>
                            

                            
                        @endif
                        
                        <li>
                            <ul></ul>
                        </li>
                    </ul>
                    
                    
                    
                </div>
            
        </nav>