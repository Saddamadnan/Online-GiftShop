

<?php
/**
* validation page
*/
class Validation 
{

	public $values = array();
	public $errors = [];
	public $currentValue;

	function __construct(){
		
	}

	public function post($key)
	{
		$this->values[$key] = $_POST[$key];
		$this->currentValue = $key;
		return $this;
	}



	public function isEmpty(){
		if(empty($this->values[$this->currentValue])){
			$this->errors[$this->currentValue]['empty'] = 'field must not be empty';
		}

		return $this;	
	}


	public function selectOne(){
		if($this->values[$this->currentValue] == 0){
			$this->errors[$this->currentValue]['SelectOne'] = 'Select one data';
		}

		return $this;	
	}

	





	public function character()
	{
		if(!preg_match('%^[a-zA-Z ]+$%', $this->values[$this->currentValue])){
				$this->errors[$this->currentValue]['Character'] = " Input must be character";
		}
			return $this;	
	}




	public function digit()
	{
		if(!preg_match('%^[0-9]+$%', $this->values[$this->currentValue])){
				$this->errors[$this->currentValue]['Character'] = " Input must be digit";
		}
			return $this;	
	}





	public function submit(){
		if(empty($this->errors)){
			return true;
		}else{
			return false;
		}
	}



	






}













?>