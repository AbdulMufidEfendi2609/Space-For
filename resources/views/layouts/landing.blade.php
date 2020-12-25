<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Multi-purpose Makerting html5 landing page">
    @include('layouts.favicon')
    <!-- Fonts
    ============================================= -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700' rel='stylesheet' type='text/css'>
    <!-- Stylesheets
    ============================================= -->
    <link href="{{ asset('landing/css/external.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/css/custom.css') }}" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="{{ asset('landing/js/html5shiv.js') }}"></script>
      <script src="{{ asset('landing/js/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>@yield('title') | Space For Me</title>
</head>

<body class="body-scroll">
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <!-- Header
============================================= -->
        @include('layouts.landing.header')
        <!-- Slider #1-->
        @yield('content')
        @include('layouts.landing.footer')
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
	============================================= -->
    <script src="{{ asset('landing/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins.js') }}"></script>
    <script src="{{ asset('landing/js/functions.js') }}"></script>
    @yield('script')
</body>

</html>
