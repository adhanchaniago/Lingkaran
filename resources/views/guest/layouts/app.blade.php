<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo/favicon.ico') }}" type="image/x-icon">
    <title>
        @section('title')
        @show
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fontawesome -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <livewire:styles>
        @section('t-script')
        @show

        <!-- Select2 -->
        <link href="{{ asset('cms/select2/css/select2.min.css') }}" rel="stylesheet">

        <!-- CKeditor -->
        <script src="{{ asset('cms/ckeditor/ckeditor.js') }}"></script>

        {{-- Anychart --}}
        <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-core.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-graph.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-data-adapter.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    @include('guest.layouts.partials.navbar')

    @section('content')
    @show

    <!-- Footer -->
    <footer class="mt-4">
        <div class="container pr-0">
            @include('guest.layouts.partials.footer')
        </div>
    </footer>

    <!-- Back to top -->
    <div id="back-top" class="btn-back-top d-flex justify-content-center align-items-center rounded-circle">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Main JS assets -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('cms/select2/js/select2.min.js') }}"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    @section('b-script')
    @show
    <livewire:scripts />
</body>

</html>