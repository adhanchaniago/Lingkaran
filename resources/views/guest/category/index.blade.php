@extends('guest.layouts.app')

@section('title')
Lingkaran - All Categories
@endsection

@section('content')
<!-- Breadcrum -->
<nav aria-label="breadcrumb">
    <div class="container p-0 mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guest.home') }}"><i class="fa fa-home"></i>
                    Home</a></li>
            <li class="breadcrumb-item">All Categories</li>
        </ol>
    </div>
</nav>

<section class="post-detail mt-3">
    <div class="container">
        <div class="row">
            <!-- Category -->
            <div class="col-md-8">
                <div class="detail-category mt-3">
                    @foreach($cats as $cat)
                    <a href="{{ route('guest.category.show', $cat) }}" class="mb-2 border-0"
                        style="background-color:{{ $cat->color }};">{{ $cat->title }}</a>
                    @endforeach
                </div>

            </div>

            <!-- Sidebar -->
            @include('guest.layouts.partials.sidebar')
        </div>
    </div>
</section>
@endsection