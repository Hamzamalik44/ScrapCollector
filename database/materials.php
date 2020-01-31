<?php 

require_once 'dbConnection.php';

//   add material type
if(isset($_POST['addMaterialButton'])){

	$name    = $_POST['name'];
	$price   = $_POST['price'];
	$typeId  = $_POST['typeId'];

	if(checkUniqueMaterialType($name)){

		$result = mysqli_query(dbConnection(),"insert into scrap_items values(default,'$name','$price','$typeId');");

			if($result){
				session_start();
		        $_SESSION["success"] = "done";
		        header("location:../materials.php");
		}
	}	

		else{

			$formdata = array('message'   => 'already exist' ,
		                      'price'     => $price,
		                      'name'      => $name);

    	session_start();
    	$_SESSION["data"] = $formdata;
    	header("location:../addMaterials.php");
		}

	
}

//   get all material types
function getAllMaterials(){

	$result = mysqli_query(dbConnection(),"select *from scrap_with_type");
	return $result;
}

//   get all material types
function getAllMaterialTypes(){

	$result = mysqli_query(dbConnection(),"select *from item_types");
	return $result;
}
//  get limited types

function getLimitedMaterial($start,$end){

	$result = mysqli_query(dbConnection(),"select *from scrap_with_type limit $start,$end");
	return $result;
}
//   get material types by id
function getAllMaterialById($id){

	$result = mysqli_query(dbConnection(),"select *from scrap_items where id= '$id'");
	return $result;
}


//    check unique type
function checkUniqueMaterialType($name){

	$result = mysqli_query(dbConnection(),"select *from scrap_items where name = '$name'");
	$emaiArray = mysqli_fetch_assoc($result);
	if(strcasecmp($emaiArray['name'],$name)==0){

		return false;
	}

	return true;
}

if(isset($_POST['editMaterialButton'])){

	$id     = $_POST['id'];	
	$name   = $_POST['name'];
	$price  = $_POST['price'];
	$typeId = $_POST['typeId'];


	$result  = mysqli_query(dbConnection(),"update scrap_items set name = '$name',price= '$price' ,itemTypeId = '$typeId' where id  = '$id'
		                                                      ");

	if($result){

		session_start();
		$_SESSION['success']="Update Successfully!";
		header("location:../materials.php");
	}
	
}

//   delete material Type

if (isset($_GET['delete'])) {
	 $id = $_GET['delete'];
    $result= mysqli_query(dbConnection(),"delete from scrap_items where id = '$id'");

    if($result){
    	session_start();
		$_SESSION['success']="delete Successfully!";
		header("location:../materials.php");
    }

 

}

//   get material types by id
function getAllMaterialByIdAjax($post){

	$id = $post['id'];

	$result = mysqli_query(dbConnection(),"select *from scrap_items where itemTypeId= '$id'");

	$html = '';

	foreach ($result as $value) {
		
    $html .= '<option value='.$value['id'].' >'.$value['name'].'</option>';
    
	}
	
	echo json_encode(['status'=>'success','html'=>$html]);


}


?>

