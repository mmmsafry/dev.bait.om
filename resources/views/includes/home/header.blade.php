<div class="modal fade register-modal" data-easein="flipBounceYIn" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-form">
            
            
          <button type="button" class="popup-close" data-dismiss="modal" aria-label="Close"><img src="{{ asset('style/images/close.png') }}" alt="Image"></button>
          <h2>Register</h2>
          
          <form role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            
                           
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          </div> 

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                         </div>  

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                             <input id="password" type="password" class="form-control" name="password" placeholder="password"  required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                            
                                <input id="password-confirm" type="password" class="form-control" placeholder="confirm password"  name="password_confirmation" required>
                            
                        </div>

                       
                         <button type="submit" class="btn btn-block btn-register">REGISTER</button>
                    </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade register-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-form">
          <button type="button" class="popup-close" data-dismiss="modal" aria-label="Close"><img src="{{ asset('style/images/close.png') }}" alt="Image"></button>
          <h2>Login</h2>
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                          
                                <input id="email" type="email" class="form-control" name="email" placeholder="Username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        
                      
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        

                        

                        
                        <button class="btn btn-block btn-register" type="submit">LOGIN</button>
                        
                        
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                             <div class="col-md-4">
                                
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        
                    </form>


          
          
          
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Navbar -->
<div class="menu">
  <nav class="navbar navbar-default">
    <div class="container menu-container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <div class="logo"><a href="index.html"><img src="{{ asset('style/images/amlak-logo.png') }}" alt="Amlak Logo"></a></div>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#">BUY</a></li>
          <li><a href="#">RENT</a></li>
          <li><a href="#">COMMERCIAL</a></li>
          <li><a href="#">FIND AGENT</a></li>
          <li><a href="#">NEW PROJECTS</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MORE <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                             <li><a href="#" type="button" data-toggle="modal" data-target="#loginModal" class="login"><img src="{{ asset('style/images/icon-lock.png') }}" alt="Icon"> Login</a></li>
							 <li><a href="#" type="button" data-toggle="modal" data-target="#registerModal" class="login"><img src="{{ asset('style/images/icon-user.png') }}" alt="Icon"> Register</a></li>
        
                        @else

                            @can('edit_users')
                           <li class="{{ Request::is('users*') ? 'active' : '' }}">
                                    <a href="{{ route('users.index') }}">
                                        <span class="text-info glyphicon glyphicon-user"></span> Dashbord
                                    </a>
                                </li>
                            @endcan

                            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                                <a href="#">
                                    <span class="text-danger glyphicon glyphicon-lock"></span> {{ Auth::user()->roles->pluck('name')->first() }}
                                </a>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                   
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="glyphicon glyphicon-log-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        
                        <li>
                            <ul></ul>
                        </li>
                    </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </nav>
</div>