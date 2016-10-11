<nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ action('PostsController@index') }}">Reddit.dev</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ action('PostsController@index') }}">Posts</a></li>
                @if (Auth::check())
                    <li><a href="{{ action('UsersController@show', Auth::id()) }}">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
                    <li><a href="{{ action('PostsController@create') }}">Create Post</a></li>
                @else
                    <li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
                    <li><a href="{{ action('Auth\AuthController@getRegister') }}">Register</a></li>
                @endif
            </ul>
            <form class="navbar-form navbar-right" method="GET" action="{{ action('PostsController@index') }}">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>