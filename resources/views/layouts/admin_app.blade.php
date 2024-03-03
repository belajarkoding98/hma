<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/images/logo/freshcart-logo.svg')}}">
    <title>@yield('title') - PT. Hanatekindo Mulia Abadi</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
</head>

<body class="fixed-left">
    <!-- Loader -->
    {{--
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    --}}

    <!-- Begin page -->
    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.includes.sidebar')

        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <!-- Top Bar Start -->
                @include('layouts.includes.topbar')

                <!-- Top Bar End -->

                <div class="page-content-wrapper">
                    @yield('content')
                    <!-- container -->
                </div>
                <!-- Page content Wrapper -->
            </div>
            <!-- content -->

            <footer class="footer">© Pusat Oleh - Oleh Neng Ghina.</footer>
        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->
    @yield('modal-area')

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{
                asset('assets/js/jquery.slimscroll.js')
            }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{
                asset('assets/js/jquery.nicescroll.js')
            }}"></script>
    <script src="{{
                asset('assets/js/jquery.scrollTo.min.js')
            }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @yield('scripts')
</body>

</html>