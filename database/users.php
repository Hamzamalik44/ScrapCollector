<?php 
require_once 'dbConnection.php';

//   get user by id
function getUserById($id){
	$result  = mysqli_query(dbConnection(),"select *from  users where id = '$id'");
	return $result;
}


 ?>