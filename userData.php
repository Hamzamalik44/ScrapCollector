<?php 

session_start();


if(isset($_SESSION['userData'])){

	$userData = $_SESSION['userData'];
}
else{
    header('location:index.php');
}

 ?>