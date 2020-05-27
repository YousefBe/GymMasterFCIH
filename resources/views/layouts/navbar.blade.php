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
                                {{-- if conditions to acess the logged user details *name and image* --}}

                                {{-- This Section is to get the name and type of each type of system users --}}
                                {{-- i checked if the logged user image is the default image if it is the path changes --}}
                                {{-- cuz when you update your image it includes part of the path to the new  image name --}}
                                
                                @if( Auth::guard('coach')->check()) 
                                {{ Auth::guard('coach')->user()->name }}
                               
                                     @if(Auth::guard('coach')->user()->image =='default.jpg' )
                                        <img src="{{asset('storage/uploads/' .Auth::guard('coach')->user()->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >
                                      @else
                                        <img src="{{asset('storage/' .Auth::guard('coach')->user()->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >

                                     @endif

                                @elseif(Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->name }}
                                
                                    @if(Auth::guard('admin')->user()->image =='default.jpg' )
                                         <img src="{{asset('storage/uploads/' .Auth::guard('admin')->user()->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >
                                     @else
                                         <img src="{{asset('storage/' .Auth::guard('admin')->user()->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >

                                    @endif

                                
                  
                                @else
                                    {{ Auth::user()->name }}
                                    @if(Auth::user()->image =='default.jpg' )
                                         <img src="{{asset('storage/uploads/' .Auth::user()->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >
                                    @else
                                         <img src="{{asset('storage/' . Auth::user()->image) }}" alt="nothingBoy" style="width:30px; height:30px ; float:left ; border-radius:50% ;  margin-right:25px;" >

                                    @endif


                                @endif
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               {{--the drop down links changes according to the logged user type--}}

                               {{--admin drop down--}}
                                @auth('admin')
                                        <a class="dropdown-item" href="/admin/MangeCoaches">
                                            {{ __('Mabge Coaches') }}
                                        </a>
                                        <a class="dropdown-item" href="/admin/MangeMembers">
                                        {{ __('Mange Members') }}
                                        </a>
                                        <a class="dropdown-item" href="/admin">
                                            {{ __('My Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="/admin/{{Auth::guard('admin')->user()->id}}/edit">
                                            {{ __('Update Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="/admin/AddCoach">
                                            {{ __('Add a New Coach') }}
                                        </a>
                                        <a class="dropdown-item" href="/admin/AddAdmin">
                                            {{ __('Add a New Admin') }}
                                        </a>
                               @endauth
                               

                             {{--coach drop down--}}

                               @auth('coach')
                                    <a class="dropdown-item" href="/coach/members">
                                        {{ __('Manage My Members') }}
                                    </a>
                                    <a class="dropdown-item" href="/coach/MyInbox">
                                         {{ __('My Messages') }}
                                    </a>
                                    <a class="dropdown-item" href="/coach">
                                        {{ __('My Profile') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="/coach/{{Auth::user()->id}}/edit">
                                        {{ __('Update My Profile') }}
                                    </a>
                                 @endauth
                                

                                {{--member drop down--}}

                                @auth('web')
                                     <a class="dropdown-item" href="/member/profile">
                                        {{ __('My Profile') }}
                                    </a>
                                     <a class="dropdown-item" href="/member/Profile/edit/{{Auth::user()->id}}">
                                        {{ __('Update My Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="/member/MyMsgs">
                                        {{ __('My Masseges') }}
                                    </a>
                                    <a class="dropdown-item" href="/member/DMYorCoach">
                                        {{ __('Dm Coach') }}
                                    </a>
                                @endauth
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                                
                            </div>
                            
                            
                        </li>    
                        
                        {{--now we know that the system user is just a visitor  , show him the login and register routes--}}
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
                        {{--links that are there forevery one--}}
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