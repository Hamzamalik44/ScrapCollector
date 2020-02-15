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

	$result =   mysqli_query(dbConnection(),"insert into users values(default,'$firstName','$lastName','$email','$password','$phone','$address',default,default);");

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


	    mysqli_query(dbConnection(),"insert into users values(default,'$firstName','$lastName','$email','$password','$phone','$address',default,default);");
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

//   change password
if(isset($_POST['changePasswordButton'])){
	
	$oldPassword       = $_POST['oldPassword'];
	$confirmPassword   = $_POST['confirmPassword'];
	session_start();
    $userData          = $_SESSION['userData'];
    $email             = $userData['email'];

    $hashedPassword    = password_hash($confirmPassword, PASSWORD_DEFAULT);

	if(checkOldPassword($email,$oldPassword)){


	   $result = mysqli_query(dbConnection(),"update users set password = '$hashedPassword' where email = '$email'");

	if($result)
	{  
		session_start();
	    $_SESSION["success"] = "done";
	    header("location:../changePassword.php");

	}


 }
 else{

    	$formdata = array('message'   => 'Old password not correct' );

    	session_start();
    	$_SESSION["data"] = $formdata;
    	header("location:../changePassword.php");
    }


}


//   get all collectors
function getAllCollectors(){
	$result  = mysqli_query(dbConnection(),"select *from  user_with_role where roleName = 'Scrap collector' and status = 1 ");
	return $result;
}

//   get all collectors
function getLimitedCollectors($start,$end){
	$result  = mysqli_query(dbConnection(),"select *from  user_with_role where roleName = 'Scrap collector' and status = 1 limit $start,$end");
	return $result;
}

//   delete collector

if (isset($_GET['deactive'])) {
	 $id = $_GET['deactive'];
    $result= mysqli_query(dbConnection(),"update users set status = 0 where id = '$id'");

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

//   check unique mails
function checkOldPassword($email,$password){

	$result = mysqli_query(dbConnection(),"select * from users where email = '$email'");
	$emaiArray = mysqli_fetch_assoc($result);

	$isValid = password_verify($password, $emaiArray['password']);
	if(!$isValid){


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

//   edit user
if(isset($_POST['editUserButton'])){
	
	$firstName  = $_POST['firstName'];
	$lastName   = $_POST['lastName'];
	$email      = $_POST['email'];
	$phone      = $_POST['phone'];
	$address    = $_POST['address'];
    session_start();
	$userData   = $_SESSION['userData'];
    $id         = $userData['id'];


// files
if($_FILES['image']['name']!=null){

	  $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp  = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $text      = explode('.',$file_name);
      $text      = end($text);
      $file_ext  = strtolower($text);
      
      $extensions = array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)== false){
         $formdata = array('imageMessage'    => 'only jpeg and png are allowed' );

         	$_SESSION["data"] = $formdata;
        	header("location:../editProfile.php");
        	exit();
      }


       if($file_size > 2097152 ){
       	 $formdata = array('imageMessage'    => 'File size must be excately 2 MB' );

         	$_SESSION["data"] = $formdata;
        	header("location:../editProfile.php");
        	exit();
        
      }

}

      


	if(checkEmail($email)){


//  delete imgage 

		if($_FILES['image']['name']!=null){

			$result = mysqli_query(dbConnection(),"select *from user_with_role where email = '$email' ");
	
  		$data = mysqli_fetch_assoc($result);
  	    $_SESSION["userData"] = $data;
  	    $uniqueImageName = uniqid().$file_name;


  	    move_uploaded_file($file_tmp,"../uploadImages/".$uniqueImageName);



	    $result2 =   mysqli_query(dbConnection(),"update users set firstName = '$firstName', lastName='$lastName', email= '$email',phone ='$phone',address = '$address',image = '$uniqueImageName' where id = '$id' ");

	    chdir('../uploadImages'); 

	       if(!$data['image']='defaultImage/defaultUser.png'){

              unlink($data['image']);
	       }

		}

		else{

			 $result2 =   mysqli_query(dbConnection(),"update users set firstName = '$firstName', lastName='$lastName', email= '$email',phone ='$phone',address = '$address' where id = '$id' ");

		}
	    
	
	 if($result2)
	{  

  	    $result = mysqli_query(dbConnection(),"select *from user_with_role where email = '$email' ");
  		$data = mysqli_fetch_assoc($result);
  	    $_SESSION["userData"] = $data;

	    $_SESSION["success"] = "done";
	    header("location:../editProfile.php");

	}



 }
    else{

    	$formdata = array('message'   => 'try another email',
    	                  'email'     => $email );

    	$_SESSION["data"] = $formdata;
    	header("location:../editProfile.php");
    }

}




//   check  email
function checkEmail($email){


	$userData = $_SESSION['userData'];
	$id       = $userData['id'];

	$result = mysqli_query(dbConnection(),"select email from users where email = '$email' and id !='$id' ");

	$emaiArray = mysqli_fetch_assoc($result);
	if(strcasecmp($emaiArray['email'],$email)==0){

		return false;
	}

	return true;
}


