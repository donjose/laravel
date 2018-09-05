<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Toastr style -->
    <link href="{{ asset('assets/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('assets/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <!-- SweetAlert -->
    <link href="{{ asset('assets/js/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/chosen/chosen.css') }}" rel="stylesheet">

    <!-- Switchery -->
    <link href="{{ asset('assets/css/plugins/switchery/switchery.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/chosen/chosen.css') }}" rel="stylesheet">

@section('scripts')
    <!-- Mainly scripts -->
        <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

        <!-- Flot -->
        <script src="{{ asset('assets/js/plugins/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/flot/jquery.flot.spline.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/flot/jquery.flot.pie.js') }}"></script>

        <!-- Peity -->
        <script src="{{ asset('assets/js/plugins/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('assets/js/demo/peity-demo.js') }}"></script>

        <!-- Custom and plugin javascript -->
        <script src="{{ asset('assets/js/inspinia.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>

        <!-- jQuery UI -->
        <script src="{{ asset('assets/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

        <!-- GITTER -->
        <script src="{{ asset('assets/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

        <!-- Sparkline -->
        <script src="{{ asset('assets/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Sparkline demo data  -->
        <script src="{{ asset('assets/js/demo/sparkline-demo.js') }}"></script>

        <!-- ChartJS-->
        <script src="{{ asset('assets/js/plugins/chartJs/Chart.min.js') }}"></script>

        <!-- Toastr -->
        <script src="{{ asset('assets/js/plugins/toastr/toastr.min.js') }}"></script>

        <!-- ICheck -->
        <script src="{{ asset('assets/js/plugins/iCheck/icheck.min.js') }}"></script>
        <!-- SweetAlert -->
        <script src="{{ asset('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

        <script src="{{ asset('assets/js/plugins/chosen/chosen.jquery.js') }}"></script>
        <!-- Switchery -->

        <script src="{{ asset('assets/js/plugins/switchery/switchery.js') }}"></script>

    @show
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('admin.layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('admin.layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

{{--<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>--}}


</body>
</html>
