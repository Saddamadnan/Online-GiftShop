<?php

ob_start();
session_start();
include_once 'systems/config/appsConfig.php';
spl_autoload_register(function($className){
	include_once 'systems/lib/'.$className.'.php';
});

?>



<?php
appsConfig::randerBody();

ob_end_flush();

?>
