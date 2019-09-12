<?php 

/**
* 
*/
abstract class Connection 
{
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "onlineshopping";

	protected $db;

	function __construct(){
		$this->CreateConnection();
	}

	public function CreateConnection(){
		 try{
		 	$this->db = new PDO("mysql:dbname=".$this->dbname.";host=".$this->host,$this->username,$this->password);
		 }catch(PDOException $ex){
		 	echo $ex->getMessage();
		 }


		
	}



}














 ?>