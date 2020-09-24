<nav id="nav-sticky" class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container pr-0 pl-md-2">
        <a href="{{ route('guest.home') }}">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo Lingkaran" class="logo mr-2">
        </a>
        <a class="navbar-brand" href="{{ route('guest.home') }}">Lingkar<span>an</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars nav-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mt-2 mt-lg-0 mx-auto">
                <li class="nav-item {{ (request()->segment(1) == '') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('guest.home') }}">Home</a>
                </li>

                @foreach($categories->slice(0,7) as $category)
                <li class="nav-item {{ (request()->segment(2) == $category->slug) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('guest.category.show', $category) }}">{{ $category->title }}</a>
                </li>
                @endforeach
            </ul>
            <livewire:search />
            @if (auth()->user())
            @hasrole(['Administrator|Editor|Reporter'])
            <div class="dropdown ml-2">
                <button type="button" class="btn btn-danger btn-sm dropdown-toggle" id="dropdownMenuOffset"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                    Options
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="{{ route('dashboard.index') }}">Admin Panel</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Log out</a>
                </div>
            </div>
            @endhasrole
            @hasrole('Writer')
            <div class="dropdown mt-2 mt-md-0 ml-2">
                <button class="btn btn-sm dropdown-toggle btn-user" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ (!empty(auth()->user()->profiles->first()->image)) ? asset('images/profile/thumbnails/'.auth()->user()->profiles->first()->image) : asset('cms/images/user.png') }}"
                        class="user-image rounded-circle">
                    <span class="ml-1">{{ auth()->user()->firstname }}</span>
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('guestuser.dashboard') }}"><i class="fas fa-home"></i>
                        Dashboard</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-key"></i>
                        Change Password</a>
                    <div class="dropdown-divider"></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Log out</a>
                </div>
            </div>
            @endhasrole
            @else
            <button onclick="document.location='{{ route('login') }}'"
                class="btn btn-outline-success btn-sm mt-2 mt-md-0 ml-2">Login</button>
            @endif
        </div>
    </div>
</nav>