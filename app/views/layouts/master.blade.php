<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Umfrageprojekt</title>

    <!-- Bootstrap & Fontawesome-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  </head>
  <body>
    @include('partials.navbar')
    <div class="container clearfix">
      @include('partials.msgbox')

      @yield('content')
    </div>

    <div class="navbar navbar-default navbar-fixed-bottom clearfix">
      <div class="container">
        <p class="navbar-text navbar-right">Michael Messerli</p>
      </div>
    </div>
    @section('scripts')
    <!-- JQuery and Bootstrap -->
    <script charset="utf-8" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    @show
  </body>
</html>
