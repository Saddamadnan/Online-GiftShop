<?php
/*
include_once 'systems/lib/Connection.php';
include_once 'systems/lib/DBContext.php';
include_once 'systems/lib/Validation.php';*/
session_start();
spl_autoload_register(function($className){
	include_once 'systems/lib/'.$className.'.php';
});

$input = new Validation;
include_once 'systems/config/appsConfig.php';

if(!isset($_SESSION['name'])){
appsConfig::Redirect('login');
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Gift Shop Admin panel</title>
	<link rel="stylesheet" type="text/css" href="apps/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="apps/css/admin.css">
</head>
<body>


<div class="row" style="background-color: #0363AF;min-height: 50px;">
<div class="col-md-2"><h4 style="color: white;
    text-align: center;
    font-size: 22px;">Admin panel</h4></div>

<div class="col-md-2 col-md-offset-8"><a href="?page=logout" style="
	color: white;
    padding-top: 14px;
    display: block;">Logout</a></div>
</div>


<div class="row">
<!--start left section-->
<div class="col-md-3">
<div class="left-section">
<ul>
	<li><a href="?page=home">Home</a></li>
	<li><a href="?page=country">country</a></li>
	<li><a href="?page=city">city</a></li>
	<li><a href="?page=warranty">warranty</a></li>
	<li><a href="?page=category">category</a></li>
	<li><a href="?page=product">product</a></li>
	<li><a href="?page=productImages">product Images</a></li>
	<li><a href="?page=suppliers">Suppliers</a></li>
	<li><a href="?page=users">users</a></li>
	<li><a href="?page=orders">Orders</a></li>
</ul>

</div>

</div>
<!--end left section-->

<!--start right section-->
<div class="col-md-9">
<div class="right-section">




<?php

//include_once 'apps/admin/city.php';


if(isset($_GET['page'])){
	echo '<h3>Dashboard -> '.ucwords($_GET['page']).'</h3>
<hr>';
	if(file_exists('apps/admin/'.$_GET['page'].'.php')){
		include_once 'apps/admin/'.$_GET['page'].'.php';
	}else{
		include_once 'apps/admin/404.php';
	}
	
}else{
	echo '<h3>Dashboard -> Home page</h3>
	<hr>';
	include_once 'apps/admin/home.php';
}

?>




</div>
</div>
<!--end right section-->
</div>











<script type="text/javascript" src="apps/js/jquery.js"></script>
<script type="text/javascript" src="apps/js/bootstrap.js"></script>
</body>
</html>