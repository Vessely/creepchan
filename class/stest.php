<?php 
/**
* 
*/
include_once 'config/database.php'; 
class Baseclass
{
	//Propiedades privadas.
	protected $linker;

	//Método constructor.
	function __construct()
	{	
		$linker = new mysqli(host, user, pass, data);
		$this->linker = $linker;
	}

	//Getter
	public function linker(){
		return $this->linker;
	}

}

class First extends Baseclass
{
	protected $linker;

	function __construct(){
		parent::__construct();
	}

	function show(){
		if($this->linker()){
			echo "0";
		}else{
			echo "1";
		}
	}
	
}

class Second extends Baseclass
{
	function __construct(){
		parent::__construct();
	}

	function show(){
		if($this->linker()){
			echo "Correcto";
		}else{
			echo "Incorrecto";
		}
	}
}

 ?>


