<div class="row">
    <div class="col-md-6 pt-3 pt-md-0 d-flex justify-content-center justify-content-md-start align-items-md-center">
        <span>&copy;2020 <a href="index.html">PT. Lingkaran</a>. All Rights Reserved.</span>
    </div>
    <div class="col-md-6 pr-md-0">
        <nav class="nav justify-content-center justify-content-md-end">
            @if (auth()->user())
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                @csrf
            </form>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Log out</a>
            @else
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            @endif
            <a class=" nav-link" href="#">Advertise</a>
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">Privacy Policy</a>
        </nav>
    </div>
</div>