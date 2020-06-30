<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets/logo/favicon.ico') }}" type="image/ico" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('cms/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('cms/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('cms/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('cms/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('cms/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('cms/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('cms/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('cms/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="{{ asset('cms/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}"
        rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('cms/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('cms/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('cms/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('cms/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('cms/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- CKeditor -->
    <script src="{{ asset('cms/ckeditor/ckeditor.js') }}"></script>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @if(auth()->user())
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title pl-2" style="border: 0;">
                        <a href="{{ route('dashboard.index') }}" class="site_title">
                            <img src="{{ asset('assets/logo/logo.png') }}" alt="Lingkaran Logo" style="width:30px">
                            <span>{{ config('app.name', 'Laravel') }}</span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <br />

                    <!-- sidebar menu -->

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        @include('cms.layouts.partials.sidenav')
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>
            @endif

            <!-- top navigation -->
            <div class="top_nav">
                @if(auth()->user())
                @include('cms.layouts.partials.topnav')
                @endif
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @section('content')
                @show
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Lingkaran - Gentelella Admin Template
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('cms/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('cms/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <!-- FastClick -->
    <script src="{{ asset('cms/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('cms/vendors/nprogress/nprogress.js') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('cms/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('cms/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}">
    </script>
    <!-- jQuery Smart Wizard -->
    <script src="{{ asset('cms/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
    <!-- Switchery -->
    <script src="{{ asset('cms/vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('cms/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('cms/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('cms/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('cms/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('cms/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('cms/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/flot-spline/js/jquery.flot.spline.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('cms/vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('cms/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('cms/vendors/bootstrap-daterangepicker/daterangepicker.js') }}">
    </script>
    <!-- morris.js -->
    <script src="{{ asset('cms/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('cms/vendors/morris.js/morris.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('cms/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="{{ asset('cms/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}">
    </script>
    <!-- Datatables -->
    <script src="{{ asset('cms/vendors/datatables.net/js/jquery.dataTables.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-buttons/js/buttons.print.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}">
    </script>
    <script src="{{ asset('cms/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('cms/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('cms/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('cms/select2/js/select2.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('cms/build/js/custom.min.js') }}"></script>
    <script>
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);

    </script>
    @section('script')
    @show
</body>

</html>