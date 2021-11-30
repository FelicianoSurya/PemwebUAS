<footer>
    <div class="container pt-5">
        <div class="row">
            <div class="footer-details col-6 d-flex flex-column align-items-start text-left">
                <p class="footer-logo">B<span>oo</span>kCourts.</p>
                <p class="footer-desc">
                    BookCourts is the world's leading space <br>
                    booking and scheduling software
                </p>
            </div>
            <div class="col-6 d-flex flex-lg-row flex-column align-items-lg-start align-items-end justify-content-lg-end text-lg-left text-right footer-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Our Team</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
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
             
            </div>
        </div>
        <div class="text-center footer-note pb-3">
            BookCourts.  by  Kelompok 3
        </div>
    </div>
</footer>
