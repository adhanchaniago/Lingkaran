@extends('cms.layouts.app')
@section('content')
<div class="tile_count">
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
        <div class="count">{{ $users }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
        <div class="count">{{ $userMale }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
        <div class="count">{{ $userFemale }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-newspaper-o"></i> Total Posts</span>
        <div class="count">{{ $posts }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-bars"></i> Total Categories</span>
        <div class="count">{{ $categories }}</div>
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-tags"></i> Total Tags</span>
        <div class="count">{{ $tags }}</div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-4 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Recent Posts</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="dashboard-widget-content">
                    <ul class="list-unstyled timeline widget">
                        @foreach ($recentPosts as $post)
                        <li>
                            <div class="block">
                                <div class="block_content">
                                    <h2 class="title">
                                        <a href="{{ route('guest.post.show', [$post->category->slug, $post]) }}">{{ $post->title }}</a>
                                    </h2>
                                    <div class="byline">
                                        <span><i class="fa fa-user"></i> {{ $post->user_author->firstname }}</span> - <i class="fa fa-clock-o"></i> {{ $post->created_at->diffForHumans() }}
                                    </div>
                                    <p class="excerpt">{!! Str::limit($post->content, 147, '...') !!}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-8 col-sm-8 ">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Visitors location</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">
                            <div class="col-md-4 hidden-small">
                                <table class="countries_list">
                                    <tbody>
                                        <tr>
                                            <td>United States</td>
                                            <td class="fs15 fw700 text-right">33%</td>
                                        </tr>
                                        <tr>
                                            <td>France</td>
                                            <td class="fs15 fw700 text-right">27%</td>
                                        </tr>
                                        <tr>
                                            <td>Germany</td>
                                            <td class="fs15 fw700 text-right">16%</td>
                                        </tr>
                                        <tr>
                                            <td>Spain</td>
                                            <td class="fs15 fw700 text-right">11%</td>
                                        </tr>
                                        <tr>
                                            <td>Britain</td>
                                            <td class="fs15 fw700 text-right">10%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Populer Posts</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @foreach ($populers as $populer)
                            <article class="media event">
                                <a class="pull-left date">
                                    <p class="month">{{ $populer->created_at->format('M') }}</p>
                                    <p class="day">{{ $populer->created_at->format('d') }}</p>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="{{ route('guest.post.show', [$populer->category->slug, $populer]) }}">{{ $populer->title }}</a>
                                    <p><i class="fa fa-user"></i> {{ $populer->user_author->firstname }} - {{ $populer->view }} views</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User Has The Most Posts</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @foreach ($userMostPosts as $item)
                            <article class="media event">
                                <a class="pull-left date">
                                    <img src="{{ (!empty($item->profiles->first()->image)) ? asset('images/profile/'.$item->profiles->first()->image) : asset('cms/images/user.png') }}" alt="" class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <a class="title" @role('Administrator')href="{{ route('user.show', $item) }}"@endrole>{{ $item->firstname . ' ' . $item->lastname }}</a>
                                    <p>Have {{ $item->posts->count() }} Posts</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection