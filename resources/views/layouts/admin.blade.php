<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png"/>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png"/>
    <title>Dashboard - VenciPro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <!-- Dashboard Core -->
    <link href="{{ asset('assets/dashboard/css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard/css/bshidden.css') }}" rel="stylesheet" />
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        {{-- Topbar --}}
        @include('admin.components.topbar')
        {{-- Navbar --}}
        @include('admin.components.navbar')
        {{-- Content --}}
        @yield('content')
      </div>
      @include('admin.components.footer')
    </div>

    <script src="{{ asset('assets/dashboard/js/vendors/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/core.js') }}"></script>
  </body>
</html>
