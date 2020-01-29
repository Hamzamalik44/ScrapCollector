<?php 

session_start();

if(isset($_SESSION['userData'])){

	header('location:dashboard.php');
}


 ?>