<div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a><i class="fa fa-edit"></i>News <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{ route('post.index') }}">Post</a></li>
                <li><a href="{{ route('category.index') }}">Category</a></li>
                <li><a href="{{ route('tag.index') }}">Tag</a></li>
                @role(['Administrator|Editor'])
                <li><a href="{{ route('headline.index') }}">Headline</a></li>
                @endrole
            </ul>
        </li>
    </ul>
</div>
@role('Administrator')
<div class="menu_section">
    <h3>Company</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-users"></i>Employee <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{ route('user.index') }}">User</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-user"></i>Guest <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{ route('guestuser.index') }}">User</a></li>
            </ul>
        </li>
    </ul>
</div>
@endrole
<div class="menu_section">
    <h3>Other</h3>
    <ul class="nav side-menu">
        <li><a href="{{ route('guest.home') }}"><i class="fa fa-laptop"></i> Main Website</a></li>
    </ul>
</div>