<?php
	function connect(){
		$con = mysqli_connect('localhost', 'root', '', 'bsblab');
		return $con;
	}

	
?>