<?php 

//Funcion show
	function show(){
		include_once "config/database.php";
		$sql = "SELECT * FROM posts";
		$process = mysqli_query($linker, $sql);
		if ($process) {
			while ($row = mysqli_fetch_assoc($process)) {
				$title = $row['title'];
				$post = $row['post'];
				$img_name = $row['img_name'];
				$img = $row['img_path'];
				$img = explode("/", $img);
				$img = $img[1]."/".$img[2];
				echo '
				<div class="post-content">
		 			<div class="img-container">
			 			<img src="'.$img.'" alt="" title="'.$img_name.'">
		 			</div>
		 			<div class="content-p">
		 				<p class="p-title">'.$title.'</p>
			 			'.nl2br($post).'
		 			</div>
		 		</div>

				';
			}
		}else{
			echo "Error";
		}
	}

 ?>