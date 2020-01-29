<?php 

 // Remove cookie variables
session_start();
session_destroy();
 header('Location:index.php');

 ?>