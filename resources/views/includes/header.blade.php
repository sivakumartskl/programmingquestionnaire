<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Programming Questionnaire</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/create') }}">Ask Question</a></li>
        <li><a href="">Asked</a></li>
        <li><a href="">Answered</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="">{{ auth()->user()->username }}</a></li>
        <li><a href="{{ url('/logout') }}">LogOut</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>