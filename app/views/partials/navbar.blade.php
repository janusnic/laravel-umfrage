<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Umfrageprojekt</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li {{(Request::is('/') ? 'class="active"' : '')}}><a href="/"><i class="fa fa-home"></i></a></li>
        <li {{(Request::is('umfrage', 'umfrage/*') ? 'class="active"' : '')}}><a href="/umfrage">Umfragen</a></li>
        <li {{(Request::is('/results') ? 'class="active"' : '')}}><a href="/answers">Resultate</a></li>
      </ul>
      <div class="navbar-right">
        @if(!Auth::check())
        {{ Form::open(['url' => '/login', 'class' => 'navbar-form', 'method' => 'post']) }}
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Sign In</button>
            <a class="btn btn-warning" href="/register">Register</a>
        {{ Form::close() }}
        @else
          <p class="navbar-text">Signed is as <strong><a href="{{ action('UserController@show', Auth::user()->id) }}">{{ Auth::user()->username }}</a></strong></p>
          <a href="/logout" class="navbar-text"><i class="logout fa fa-power-off"></i></a>
        @endif
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
