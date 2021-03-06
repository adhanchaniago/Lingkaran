<div class="nav_menu">
    <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
        <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                    data-toggle="dropdown" aria-expanded="false">
                    <img
                        src="{{ (!empty(auth()->user()->profiles->first()->image)) ? asset('images/profile/thumbnails/'.auth()->user()->profiles->first()->image) : asset('cms/images/user.png') }}">
                    {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile.show', auth()->user()) }}"> Profile</a>
                    <a class="dropdown-item" href="{{ route('password.edit', auth()->user()) }}"> Change
                        Password</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i>
                        Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div>