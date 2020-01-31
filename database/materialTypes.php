<?php 

require_once 'dbConnection.php';

//   add material type
if(isset($_POST['addMaterialTypeButton'])){

	$name  = $_POST['name'];

	if(checkUniqueMaterialType($name)){

		$result = mysqli_query(dbConnection(),"insert into item_types values(default,'$name');");

			if($result){
				session_start();
		        $_SESSION["success"] = "done";
		        header("location:../materialTypes.php");
		}
	}	

		else{

			$formdata = array('message'   => 'already exist' );

    	session_start();
    	$_SESSION["data"] = $formdata;
    	header("location:../addMaterialTypes.php");
		}

	
}

//   get all material types
function getAllMaterialTypes(){

	$result = mysqli_query(dbConnection(),"select *from item_types");
	return $result;
}
//  get limited types

function getLimitedTypes($start,$end){

	$result = mysqli_query(dbConnection(),"select *from item_types limit $start,$end");
	return $result;
}
//   get material types by id
function getAllMaterialTypeById($id){

	$result = mysqli_query(dbConnection(),"select *from item_types where id= '$id'");
	return $result;
}


//    check unique type
function checkUniqueMaterialType($name){

	$result = mysqli_query(dbConnection(),"select *from item_types where name = '$name'");
	$emaiArray = mysqli_fetch_assoc($result);
	if(strcasecmp($emaiArray['name'],$name)==0){

		return false;
	}

	return true;
}

if(isset($_POST['editMaterialTypeButton'])){

	$id    = $_POST['id'];	
	$name  = $_POST['name'];

if(checkUniqueMaterialType($name)){
	$result  = mysqli_query(dbConnection(),"update item_types set name = '$name' where id  = '$id'
		                                                      ");

	if($result){

		session_start();
		$_SESSION['success']="Update Successfully!";
		header("location:../materialTypes.php");
		echo $result;
	}

	}	

		else{

			$formdata = array('message'   => 'already exist' );

    	session_start();
    	$_SESSION["data"] = $formdata;
    	header("location:../editMaterialTypes.php");
		}
}

//   delete material Type

if (isset($_GET['delete'])) {
	 $id = $_GET['delete'];
	         mysqli_query(dbConnection(),"delete from scrap_items where itemTypeId = '$id'");
    $result= mysqli_query(dbConnection(),"delete from item_types where id = '$id'");

    if($result){
    	session_start();
		$_SESSION['success']="delete Successfully!";
		header("location:../materialTypes.php");
    }

 

}


?>

