@extends('cms.layouts.app')
@section('content')
<div class="tile_count">
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
        <div class="count">2500</div>
        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
        <div class="count">123.50</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
        <div class="count green">2,500</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
        <div class="count">4,567</div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
        <div class="count">2,315</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
        <div class="count">7,325</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Transaction Summary <small>Weekly progress</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-9 col-sm-12 ">
                    <div class="demo-container" style="height:280px">
                        <div id="chart_plot_02" class="demo-placeholder"></div>
                    </div>
                    <div class="tiles">
                        <div class="col-md-4 tile">
                            <span>Total Sessions</span>
                            <h2>231,809</h2>
                            <span class="sparkline11 graph" style="height: 160px;">
                                <canvas width="200" height="60"
                                    style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
                        </div>
                        <div class="col-md-4 tile">
                            <span>Total Revenue</span>
                            <h2>$231,809</h2>
                            <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60"
                                    style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
                        </div>
                        <div class="col-md-4 tile">
                            <span>Total Sessions</span>
                            <h2>231,809</h2>
                            <span class="sparkline11 graph" style="height: 160px;">
                                <canvas width="200" height="60"
                                    style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 ">
                    <div>
                        <div class="x_title">
                            <h2>Top Profiles</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                            <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-user aero"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Ms. Mary Jane</a>
                                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                    <p> <small>12 Sales Today</small>
                                    </p>
                                </div>
                            </li>
                            <li class="media event">
                                <a class="pull-left border-green profile_thumb">
                                    <i class="fa fa-user green"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Ms. Mary Jane</a>
                                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                    <p> <small>12 Sales Today</small>
                                    </p>
                                </div>
                            </li>
                            <li class="media event">
                                <a class="pull-left border-blue profile_thumb">
                                    <i class="fa fa-user blue"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Ms. Mary Jane</a>
                                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                    <p> <small>12 Sales Today</small>
                                    </p>
                                </div>
                            </li>
                            <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-user aero"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Ms. Mary Jane</a>
                                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                    <p> <small>12 Sales Today</small>
                                    </p>
                                </div>
                            </li>
                            <li class="media event">
                                <a class="pull-left border-green profile_thumb">
                                    <i class="fa fa-user green"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Ms. Mary Jane</a>
                                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                    <p> <small>12 Sales Today</small>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Weekly Summary <small>Activity shares</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                    <div class="col-md-7" style="overflow:hidden;">
                        <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                            <canvas width="200" height="60"
                                style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                        <h4 style="margin:18px">Weekly sales progress</h4>
                    </div>

                    <div class="col-md-5">
                        <div class="row" style="text-align: center;">
                            <div class="col-md-4">
                                <canvas class="canvasDoughnut" height="110" width="110"
                                    style="margin: 5px 10px 10px 0"></canvas>
                                <h4 style="margin:0">Bounce Rates</h4>
                            </div>
                            <div class="col-md-4">
                                <canvas class="canvasDoughnut" height="110" width="110"
                                    style="margin: 5px 10px 10px 0"></canvas>
                                <h4 style="margin:0">New Traffic</h4>
                            </div>
                            <div class="col-md-4">
                                <canvas class="canvasDoughnut" height="110" width="110"
                                    style="margin: 5px 10px 10px 0"></canvas>
                                <h4 style="margin:0">Device Share</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Top Profiles <small>Sessions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Top Profiles <small>Sessions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Top Profiles <small>Sessions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="media event">
                    <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                    </a>
                    <div class="media-body">
                        <a class="title" href="#">Item Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection