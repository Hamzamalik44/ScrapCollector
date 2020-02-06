<?php 

require_once 'dbConnection.php';

//   add material type
if(isset($_POST['addMaterialButton'])){

	$name    = $_POST['name'];
	$price   = $_POST['price'];
	$typeId  = $_POST['typeId'];

	if(checkUniqueMaterialType($name)){

		$result = mysqli_query(dbConnection(),"insert into scrap_items values(default,'$name','$price','$typeId',default);");

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

	$result = mysqli_query(dbConnection(),"select *from scrap_with_type where typeStatus = 1 and materialStatus = 1"  );
	return $result;
}

//   get all material types
function getAllMaterialTypes(){

	$result = mysqli_query(dbConnection(),"select *from item_types where status = 1 ");
	return $result;
}
//  get limited types

function getLimitedMaterial($start,$end){

	$result = mysqli_query(dbConnection(),"select *from scrap_with_type where typeStatus = 1 and materialStatus = 1 limit $start,$end");
	return $result;
}
//   get material types by id
function getAllMaterialById($id){

	$result = mysqli_query(dbConnection(),"select *from scrap_items where id= '$id'");
	return $result;
}


//    check unique type
function checkUniqueMaterialType($name){

	$result = mysqli_query(dbConnection(),"select *from scrap_items where name = '$name' and status = 1 ");
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

if (isset($_GET['deactivate'])) {
	 $id = $_GET['deactivate'];
    $result= mysqli_query(dbConnection(),"update scrap_items set status = 0 where id = '$id'");

    if($result){
    	session_start();
		$_SESSION['success']="delete Successfully!";
		header("location:../materials.php");
    }

 

}

//   get material types by id
function getAllMaterialByIdAjax($post){

	$id = $post['id'];

	$result = mysqli_query(dbConnection(),"select *from scrap_items where itemTypeId= '$id' and status = 1");

	$firstrow = mysqli_fetch_assoc($result);

	$html = '';

	foreach ($result as $value) {
		
    $html .= '<option price='.$value['price'].' value='.$value['id'].' material-name='.$value['name'].' >'.$value['name'].'</option>';
    
	}

	

	echo json_encode(['status'=>'success','html'=>$html,'firstOption'=>$firstrow['name']]);


}


?>

