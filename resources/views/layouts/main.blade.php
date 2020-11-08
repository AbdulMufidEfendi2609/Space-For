<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title') | Space For Me</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        @include('layouts.favicon')

        <link href="{{ asset('cms/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('cms/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('cms/css/style.css') }}" rel="stylesheet" type="text/css">
        @yield('css')
    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            @include('layouts.main.header')
            @include('layouts.main.navbar')
        </header>
        <!-- End Navigation Bar-->
        @yield('content')
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © {{date('Y')}} <b>Space For Me</b><span class="d-none d-sm-inline-block"> - TRPL G</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- jQuery  -->
        <script src="{{ asset('cms/js/jquery.min.js') }}"></script>
        <script src="{{ asset('cms/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('cms/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('cms/js/detect.js') }}"></script>
        <script src="{{ asset('cms/js/fastclick.js') }}"></script>
        <script src="{{ asset('cms/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('cms/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('cms/js/waves.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('cms/js/app.js') }}"></script>
        @yield('js')
    </body>
</html>
