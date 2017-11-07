<?php 
include("class/post_class.php");


$post = new Post("22", "3", "3", "", "", "");
echo $post->post();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Creepchan</title>
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
	<div class="container">
		<div class="navbar"></div>
		<div class="form-container">
			<form enctype="multipart/form-data">
				<input type="text" class="title" placeholder="Titulo">
				<textarea class="post" placeholder="Post"></textarea>
				<p class="c-input">
					<span class="icon-image"></span>
				</p>
				<input type="file" name="file" class="file-in">
				<p class="submit">Post</p>
			</form>
		</div>
		<div class="spacer"></div>
		<div class="content"></div>
	</div>
	<script src="js/format.js"></script>
</body>
</html>