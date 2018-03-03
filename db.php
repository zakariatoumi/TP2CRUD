<?php 
$dns='mysql:host=localhost;dbname=crud2';
$username='root';
$pwd='';
$option=[];


try {

	$connection = new PDO($dns,$username,$pwd,$option);
	
} catch (Exception $e) {
	
}

 ?>