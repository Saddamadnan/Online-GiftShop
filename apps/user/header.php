
<!DOCTYPE html>
<html>
<head>
	<title>Apps! Project</title>
	<link rel="stylesheet" type="text/css" href="<?php appsConfig::url('apps/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php appsConfig::url('apps/css/style.css')?>">
</head>
<body>










<!--start header section-->
<div class="header" style="padding-top: 30px; height: 110px;">
	
	<div class="col-md-4">
		<img src="apps/images/online gift shop.png" alt="logo" width="400" height="80" style="padding-bottom:30px;">

	</div>



	




<div class="col-md-6 col-md-offset-2">

	<form action="<?php appsConfig::url('search')?>" method="post" class="navbar-form navbar-left">
	  <div class="form-group">
	    <input type="text" name="search" class="form-control" placeholder="Search">
	  </div>
	  <button type="submit" class="btn btn-default">Search</button>
	</form>

	<div class="loginout" style="padding-top: 15px;">
	<?php
	if(isset($_SESSION['name'])){
		echo '<a href="'.appsConfig::link('logout').'">Logout</a>';
	}else{
		echo '
		<a href="'.appsConfig::link('login').'">Login</a> | 
		<a href="'.appsConfig::link('register').'">Register</a> 
		';
	}
	?>
	</div>
</div>




</div>
<!--end header section-->