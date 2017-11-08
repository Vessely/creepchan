<?php 
/*
* Clase base: conexión con la base de datos.
*/

class Baseclass
{
	//Propiedades compartidas.
	protected $linker;

	//Método constructor.
	function __construct()
	{	
		include_once '../config/database.php';
		$this->linker = $linker;
	}

	//Método para exportar el linker.
	public function linker()
	{
		return $this->linker;
	}

	public function test(){

		if ($this->linker()) {
			echo "Correcto.";
		}else{
			echo "Incorrecto.";
		}
	}
}

//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------

/*
* Post class
*/
class Post extends Baseclass
{
	//Propiedades privadas.
	private $title;
	private $post;
	private $img_name;
	private $img_path;
	//Herencia de constructor con la clase base.

	function __construct()
	{
		parent::__construct();
	}
	/*-------------------------------------------*/

	//Setter
	public function make($title, $post, $img_name, $img_path){
		$this->title = $title;
		$this->post = $post;
		$this->img_name = $img_name;
		$this->img_path = $img_path;
		$this->timestamp = date("s-y");
		$this->thread_id = self::get_last();
	}

	public function post()
	{
		$t = $this->title;
		$p = $this->post;
		$in = $this->img_name;
		$ip = $this->img_path;
		$tp = $this->timestamp;
		$ti = $this->thread_id;

		$sql = "INSERT INTO posts (title, post, img_name, img_path, c_date, thread_id) VALUES ('$t', '$p', '$in', '$ip', '$tp', '$ti')";
		$process = mysqli_query($this->linker(), $sql);
		if ($process) {
			return 0;
		}else{
			return 1;
		}
	}
	//Getter
	public function out(){
		
	}


	//Métodos.
	private function get_last(){
		$sql = "SELECT thread_id FROM posts ORDER BY thread_id DESC LIMIT 1";
		$process = mysqli_query($this->linker(), $sql);
		if ($process) {
			$count = mysqli_num_rows($process);
			if($count == 0){
				return "9000";
			}else{
				while ($row = mysqli_fetch_assoc($process)) {
					$last = $row['thread_id'] + 2;
				}	
				return $last;
			}
		}else{
			return 1;
		}
	}

	private function count_threads(){
		$sql = "SELECT id FROM posts";
		$process = mysqli_query($this->linker(), $sql);
		$count = mysqli_num_rows($process);

		return $count;
	}
}

//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
 ?>