<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   7lawaGymFCIH
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                        @if (Request::path() == '/')
                        @auth('admin')
                        <a class="nav-link" href="/admin">
                         Back To Admin Dashboard ?
                          </a>
                        @endauth
                        @auth('coach')
                        <a class="nav-link" href="/coach">
                         Back To coach Dashboard ?
                          </a>
                        @endauth
                        @auth('web')
                        <a class="nav-link" href="/home">
                         Back To Your Profile ?
                          </a>
                        @endauth
                        @endif



                        @if (Request::path() == '/')
                        
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if(Auth::guard('admin')->check() || Auth::guard('coach')->check() || Auth::guard('web')->check())
                       
                        
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if( Auth::guard('coach')->check()) 
                                {{ Auth::guard('coach')->user()->name }}
                                @elseif(Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->name }}
                                @else
                                {{ Auth::user()->name }}
                                @endif
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="#">
                                    {{ __('DoSomething') }}
                                </a>
                               @auth('admin')
                               <a class="dropdown-item" href="#">
                                {{ __('DoSomething') }}
                                 </a>
                               @endauth
                               
                                <a class="dropdown-item" href="#">
                                    {{ __('DoSomething') }}
                                </a>
                               
                                <a class="dropdown-item" href="#">
                                    {{ __('DoSomething') }}
                                </a>
                                

                                
                            </div>
                            
                            
                        </li>       
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">{{ __('ContactUs') }}</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('About-Us') }}</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>