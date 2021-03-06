<!-- START nav.blade.php -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="height: 70px !important">
        <a class="navbar-brand" href="/" style="border-right:2px; border-color: white">
            <img src="{{asset('images/logo-icon.png')}}" width="30" height="30" class="d-inline-block" alt="">
            <b>Home</b>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                @guest
                @else
                <li class="nav-item @if (request()->routeIs('tracks')) active @endif">
                    <a class="nav-link" href="{{env('app_url')}}/tracks"><b>Tracks</b></a>
                </li>
                <li class="nav-item @if (request()->routeIs('library')) active @endif">
                    <a class="nav-link" href="{{env('app_url')}}/library"><b>Library</b></a>
                </li>
                <li class="nav-item @if (request()->routeIs('community')) active @endif">
                    <a class="nav-link" href="{{env('app_url')}}/community"><b>Community</b></a>
                </li>
                @endguest
                <li class="nav-item @if (request()->routeIs('support')) active @endif">
                    <a class="nav-link" href="{{env('app_url')}}/support"><b>Support</b></a>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                @guest
                <li class="nav-item @if (request()->routeIs('login')) active @endif">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item @if (request()->routeIs('register')) active @endif">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>My Org</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>Workspaces</b></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>

        </div>
    </nav>
    <!-- END nav.blade.php -->
