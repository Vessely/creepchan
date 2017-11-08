<?php 
require_once '../class/main_class.php';

if(isset($_POST['title']) || ($_POST['post']) || !empty($_FILES['image'])){
	$title = $_POST['title'];
	$post = $_POST['post'];

	//file
	$file = $_FILES['file'];
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];

	$path = "../images/".basename(time().rand().$file_name);

	if(move_uploaded_file($file_tmp, $path)){
		echo "ok-";
	}else{
		echo "kl";
	}
}else{
	$title = "";
	$post = "";
	$file_name = "";
	$path = "";
}


$thread = new Post;
$thread->make($title, $post, $file_name, $path);

echo $thread->post();



 ?>