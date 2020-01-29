<?php 

$days=30;

$arrayName = array('id' => 1,'name'=>'hamza' );
setcookie("email",$arrayName['id'],time()+(1 * 60 * 60 ));
setcookie("password",$arrayName['name'],time()+(1 * 60 * 60 ));

$userData = $_COOKIE['remember'];

print_r($userData['id']);

 ?>