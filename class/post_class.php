<?php 

/**
* Post class.
*/
class Post
{
	private $title;
	private $post;
	private $img_name;
	private $img_path;
	private $date;
	private $id;

	function __construct($title, $post, $img_name, $img_path)
	{
		$this->title = $title;
		$this->post = $post;
		$this->img_name = $img_name;
		$this->img_path = $img_path;
	}

	public function post(){
		require "config/database.php";

		$title = $this->title;
		$post = $this->post;
		$img_name = $this->img_name;
		$img_path = $this->img_path;
		$date = date("s");
		$id = "20";

		if ($linker) {
			$sql = "INSERT INTO posts(title, post, img_name, img_path, c_date, id) VALUES ('$title', '$post', '$img_name', '$img_path', '$date', '$id')";
			$process = mysqli_query($linker, $sql);
			if ($process) {
				return 0;
			}else{
				return mysqli_error($process);
			}
		}else{
			echo "Error!";
		}
	}

	function show_location(){
		echo getcwd();
	}

	function get_last(){
		$sql = "SELECT thread_id FROM posts ORDER BY thread_id DESC LIMIT 1";
		$process = mysqli_query($linker, $sql);
		
	}
}

 ?>