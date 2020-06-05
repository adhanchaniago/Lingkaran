<div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
            </ul>
        </li>
        <li><a><i class="fa fa-edit"></i> News <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{ route('post.index') }}">Post</a></li>
                <li><a href="{{ route('category.index') }}">Category</a></li>
            </ul>
        </li>
        <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="chartjs.html">Chart JS</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="menu_section">
    <h3>Company</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-users"></i> Employee <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="#">Reporter</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="menu_section">
    <h3>Other</h3>
    <ul class="nav side-menu">
        <li><a href="{{ route('guest.home') }}"><i class="fa fa-laptop"></i> Main Website</a></li>
    </ul>
</div>