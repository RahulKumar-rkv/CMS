<nav class="navbar navbar-default" role="navigation">

<button id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>  

  	<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>          
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
          	<?php nav_main($dbc, $path); ?>
          </ul>
        </div>
    </div>
</nav>