<?php 

/**
* 
*/
class Test
{
	private $content;

	function __construct($content)
	{
		$this->content = $content;
	}

	function show(){
		echo $this->content;
	}
}

 ?>