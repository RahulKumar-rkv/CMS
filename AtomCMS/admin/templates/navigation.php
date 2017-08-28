<nav class="navbar navbar-default" role="navigation">

  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>                        
    </button>          
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
    	<li><a href="?page=dashboard">Dashboard</a></li>
      <li><a href="?page=pages">Pages</a></li>
      <li><a href="?page=users">Users</a></li>
      <li><a href="?page=settings">Settings</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">    	
    	<li><button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button></li>
    	<li class="dropdown">
    		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user['fullname']; ?>&nbsp;<span class="caret"></span></a>
        	<ul class="dropdown-menu">
           		<li><a href="logout.php">Logout</a></li>
          </ul>
    	</li>    	
    </ul>
  </div>
</nav>