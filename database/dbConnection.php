<?php 

function dbConnection(){

    $result = mysqli_connect("localhost","root","","scrap_collector");	
	return $result;
}

 ?>