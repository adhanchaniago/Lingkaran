<nav id="nav-sticky" class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container pr-0 pl-md-2">
        <a href="{{ route('guest.home') }}">
            <img src="assets/logo/logo.png" alt="Logo Lingkaran" class="logo mr-2">
        </a>
        <a class="navbar-brand" href="{{ route('guest.home') }}">Lingkar<span>an</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars nav-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mt-2 mt-lg-0 ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sport</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fashion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lifestyle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Crime</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Social</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Politic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gaming</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Technology</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                @if(auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}" style="color: red">Admin Panel</a>
                </li>
                @endif
            </ul>
            <form class="ml-auto my-2 my-lg-0" action="#">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Pencarian" aria-label="pencarian">
                </div>
            </form>
        </div>
    </div>
</nav>