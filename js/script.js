$(function() {
	
	$(".post-content").tweetify();	
	
	$(".submit").click(function() {
		var title = $(".title").val();
		var post = $(".post_c").val();

		
		if(post.length == 0){

		}else{
			var form = new FormData();
			form.append('title', title);
			form.append('post', post);
			form.append('file', $("input[name=file]")[0].files[0]);	

				$.ajax({
				url: 'controller/post.php',
				type: 'POST',
				contentType: false,
				processData: false,
				data: form,
				success:function(data){
					if (data == "ok-0") {
						$(".title").val("");
						$(".post_c").val("");
						location.reload();
						console.log(data);
					}else{
						alert("Error");
						console.log(data);
					}
				}
			});
		}

	});
	//Form objects.
	var file_in, file_ci;
	file_in = $(".file-in");
	file_ci = $(".c-input");

	//Variables.
	var my_file, extension, ext_val;

	//Handler functions.
	file_ci.click(function() {
		file_in.trigger('click');
	});
	file_in.change(function() {
		my_file = this.files[0].name;
		extension = my_file.substr( (my_file.lastIndexOf('.') + 1) );
		ext_val = ext_validate(extension);

		console.log(my_file);
		if(ext_val == 0){
			file_ci.html(my_file);
			file_ci.css("border", "0px solid transparent");
		}else{
			file_ci.css("border", "1px solid red");
			file_ci.html("Selecciona archivos de imagen solamente.");
		}
	});

	//Functions.
	function ext_validate(extension){
		//Retorna 0 en el caso de que sea valido.
		//Retorna 1 en el caso de que no sea valido.

		switch (extension) {
			case "jpg":
				return 0;
				break;

			case "png":
				return 0;
				break;

			case "gif":
				return 0;
				break;

			case "svg":
				return 0;
				break;

			default:
				return 1;
				break;
		}
	}
});