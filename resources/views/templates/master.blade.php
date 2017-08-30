<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('css/starter-template.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    @yield('stylesheets')
  </head>

  <body>
    @yield('headernav')
    @yield('content')
    @include('includes.footer')
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>