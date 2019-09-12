<?php 
/**
*  
*/
class DBContext extends Connection
{
	//$this->db database conneciton
	function __construct(){
		parent::__construct();
	}


	public function insert($pram){
		$stmt = $this->db->prepare($pram);
		return $stmt->execute();
	}

	public function select($pram){
		$stmt = $this->db->prepare($pram);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($pram){
		$stmt = $this->db->prepare($pram);
		return $stmt->execute();
	}

	public function edit($pram){
		$stmt = $this->db->prepare($pram);
		return $stmt->execute();
	}
		

}







 ?>