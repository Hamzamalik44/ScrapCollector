<?php 

require_once 'dbConnection.php';

//   add user
if(isset($_POST['addUserButton'])){
	
	$firstName  = $_POST['firstName'];
	$lastName   = $_POST['lastName'];
	$email      = $_POST['email'];
	$phone      = $_POST['phone'];
	$password   = password_hash($_POST['password'],PASSWORD_DEFAULT);
	$address    = $_POST['address'];
	$roleId     = $_POST['roleId'];

	if(checkUniqueEmail($email)){


	    mysqli_query(dbConnection(),"insert into users values(default,'$firstName','$lastName','$email','$password','$phone','$address');");
	// add role    
	   $result  = mysqli_query(dbConnection(),"select id from users where email = '$email'");
	   $data    = mysqli_fetch_assoc($result);
	   $userId  = $data['id'];
	   $result  = mysqli_query(dbConnection(),"insert into user_roles values(default,'$userId','$roleId')");
	
	if($result)
	{  
		session_start();
	    $_SESSION["success"] = "done";
	    header("location:../index.php");

	}


 }
    else{

    	$formdata = array('firstName' => $firstName,
    	                  'lastName'  => $lastName,
    	                  'email'     => $email,
    	                  'phone'     => $phone,
    	                  'password'  => $_POST['password'],
    	                  'address'   => $address,
    	                  'message'   => 'try another email' );

    	session_start();
    	$_SESSION["data"] = $formdata;
    	header("location:../index.php");
    }

}

//   add collector button

if(isset($_POST['addCollctorButton'])){
	
	$firstName  = $_POST['firstName'];
	$lastName   = $_POST['lastName'];
	$email      = $_POST['email'];
	$phone      = $_POST['phone'];
	$password   = password_hash($_POST['password'],PASSWORD_DEFAULT);
	$address    = $_POST['address'];
	$roleId     = $_POST['roleId'];

	if(checkUniqueEmail($email)){


	    mysqli_query(dbConnection(),"insert into users values(default,'$firstName','$lastName','$email','$password','$phone','$address');");
	// add role    
	   $result  = mysqli_query(dbConnection(),"select id from users where email = '$email'");
	   $data    = mysqli_fetch_assoc($result);
	   $userId  = $data['id'];
	   $result  = mysqli_query(dbConnection(),"insert into user_roles values(default,'$userId','$roleId')");
	
	if($result)
	{  
		session_start();
	    $_SESSION["success"] = "done";
	    header("location:../collectors.php");

	}


 }
    else{

    	$formdata = array('firstName' => $firstName,
    	                  'lastName'  => $lastName,
    	                  'email'     => $email,
    	                  'phone'     => $phone,
    	                  'password'  => $_POST['password'],
    	                  'address'   => $address,
    	                  'message'   => 'try another email' );

    	session_start();
    	$_SESSION["data"] = $formdata;
    	header("location:../addCollector.php");
    }

}

//   edit collector

if(isset($_POST['editCollctorButton'])){

	$id         = $_POST['id'];	
	$firstName  = $_POST['firstName'];
	$lastName   = $_POST['lastName'];
	$email      = $_POST['email'];
	$phone      = $_POST['phone'];
	$address    = $_POST['address'];

	$result  = mysqli_query(dbConnection(),"update users set firstName = '$firstName' ,
															 lastName  = '$lastName'  ,
															 email     = '$email'     ,
															 phone     = '$phone'     ,
															 address   = '$address'
															 where id  = '$id'
		                                                      ");
	if($result){

		session_start();
		$_SESSION['success']="Update Successfully!";
		header("location:../collectors.php");
	}

}


//   get all collectors
function getAllCollectors(){
	$result  = mysqli_query(dbConnection(),"select *from  user_with_role where roleName = 'Scrap collector' ");
	return $result;
}

//   get all collectors
function getLimitedCollectors($start,$end){
	$result  = mysqli_query(dbConnection(),"select *from  user_with_role where roleName = 'Scrap collector' limit $start,$end");
	return $result;
}

//   delete collector

if (isset($_GET['delete'])) {
	 $id = $_GET['delete'];
     mysqli_query(dbConnection(),"delete from user_roles where userId = '$id'");
    $result= mysqli_query(dbConnection(),"delete from users where id = '$id'");

    if($result){
    	session_start();
		$_SESSION['success']="Update Successfully!";
		header("location:../collectors.php");
    }

}

//   check unique mails
function checkUniqueEmail($email){

	$result = mysqli_query(dbConnection(),"select email from users where email = '$email'");
	$emaiArray = mysqli_fetch_assoc($result);
	if(strcasecmp($emaiArray['email'],$email)==0){

		return false;
	}

	return true;
}

//   login user
function login($post){
	$email      = $post['loginEamil'];
	$password   = $post['LoginPassword'];
    
	    $result = mysqli_query(dbConnection(),"select *from user_with_role where email = '$email' ");
	
  		$data = mysqli_fetch_assoc($result);
  		$hashedPassword = $data['password'];
        $isValid = password_verify($password, $hashedPassword);

        if($isValid){

        		session_start();
        		$_SESSION['userData'] = $data;
        		sleep(2);
        	    echo json_encode(['status'=>'success','message'=>'done']);

        }
        else{
        	sleep(2);
        	echo json_encode(['status'=>'success','message'=>'invalid user name or password']);
        }

 
}

function rememberMeIsCheck($data){


}
