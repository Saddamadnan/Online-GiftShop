<?php 

/**
* 
*/
class appsConfig 
{
	const URL = 'http://localhost/city/';

	public static function url($pram){
		echo self::URL.$pram;
	}


	public static function link($pram){
		return self::URL.$pram;
	}

	public static function Redirect($pram)
	{
		header("Location:".self::URL.$pram);
		exit();
	}



	public static function randerBody()
	{
		include_once 'apps/user/header.php';
		include_once 'apps/user/nav.php';

		if(isset($_GET['url'])){

		$url = $_GET['url'];
		$url = explode("/", $url);
		if(file_exists('apps/user/'.$url[0].'.php')){
		  include_once 'apps/user/'.$url[0].'.php';
		}else{
		    include_once 'apps/admin/404.php';
		}



		}else{
			include_once 'apps/user/home.php';
		}

		include_once 'apps/user/footer.php';
	}
}










 ?>