<nav class="navbar fixed-top navbar-expand-md ournavbar navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            B<span>oo</span>kCourts.
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('homepage') }}">{{ __('Home') }}</a>
                    </li>
                    
                    <li class="nav-item px-3">
                        <a class="nav-link" href="#aboutus">{{ __('About Us') }}</a>
                    </li>
                    
                    <li class="nav-item px-3">
                        <a class="nav-link" href="#team">{{ __('Our Team ') }}</a>
                    </li>
                    @if (Route::has('login'))
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    @if(Auth()->user()->role == 'user')
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Facilities') }}</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="">{{ __('Requests') }}</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="">{{ __('Book Now') }}</a>
                        </li>
                    @elseif(Auth()->user()->role == 'management')
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ url('facilities') }}">{{ __('Facilities') }}</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="">{{ __('Requests') }}</a>
                        </li>
                    @else
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Users') }}</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ url('admin/facilities') }}">{{ __('Facilities') }}</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ route('requestListingAdmin') }}">{{ __('Requests') }}</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" style="color:black"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

