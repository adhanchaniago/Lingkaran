<nav class="nav dashboard-nav flex-column">
    <a class="nav-link {{ (request()->segment(3) == '') ? 'active' : '' }}"
        href="{{ route('guestuser.dashboard') }}">Dashboard</a>
    <a class="nav-link {{ (request()->segment(3) == 'post') ? 'active' : '' }}"
        href="{{ route('guestuser.post.index') }}">Posts</a>
    <a class="nav-link {{ (request()->segment(3) == 'profile') ? 'active' : '' }}"
        href="{{ route('guestuser.profile', encrypt(auth()->user()->id)) }}">Profile</a>
</nav>