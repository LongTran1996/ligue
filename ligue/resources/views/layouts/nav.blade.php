<nav class="navbar navbar-default" style="background-color:lightgray;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand"><img src = "images/flag.png" style = "height:35px; width:40px; position:relative; top:-10px;"></a>
      <a class="navbar-brand" href="/">NHL HOCKEY</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a href="/leagues">Leagues</a></li>
      <li><a href="/seasons">Seasons</a></li>
      <li><a href="/matchs">Matchs</a></li>
        <li><a href="/players">Players</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Stats <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Rechercher">
        </div>
        <button type="submit" class="btn btn-default">Rechercher</button>
      </form>

      <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())

          @if(Auth::user()->hasEditorRole())
            <li>
              <a href="/posts/create">Publier</a>
            </li>
          @endif

        @endif

        <li class="dropdown">

          @if(Auth::check() == false)
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Se connecter <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/register">Créer un compte</a></li>
              <li><a href="/login">Se connecter</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Conditions d'utilisation</a></li>
            </ul>
          @endif

          @if(Auth::check())

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}<span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li><a href="#">Mon compte</a></li>


              <li role="separator" class="divider"></li>

              <li><a href="/logout">Se déconnecter</a></li>

          @endif

        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>