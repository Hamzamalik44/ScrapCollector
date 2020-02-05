<?php 

session_start();
if(isset($_POST['addToCartButton'])){

  $materialId    = 	$_POST['material'];
  $weight        = 	$_POST['weight'];
  $pricePerKg    = 	$_POST['uintPrice'];
  $price         = 	$_POST['price'];
  $materialName  =	$_POST['materialName'];
  $userId        =  $_POST['userId'];

  $alreadyExist= 'no';

  for ($i=0; $i < count($_SESSION['cardData']); $i++){

     	$data =  $_SESSION['cardData'][$i];

     	if($data['materialName']==$materialName){

     		$data['weight']     += $weight;
     		$data['price']      += $price;
     		  
     		 $_SESSION['cardData'][$i] = array('materialId' => $materialId, 'weight' => $data['weight'] ,'pricePerKg' => $pricePerKg, 'price' => $data['price'], 'materialName' => $materialName, 'collectorId' => $collectorId, 'userId' => $userId);

     		     $alreadyExist = 'yes';
     		     calcultateTotalAmount();
     		     break;

     	}
  }

  if($alreadyExist =='no'){

   for ($i = count($_SESSION['cardData']); $i < count($_SESSION['cardData'])+1; $i++) { 


  	   $_SESSION['cardData'][$i] = array('materialId' => $materialId, 'weight' => $weight,'pricePerKg' => $pricePerKg, 'price' => $price, 'materialName' => $materialName);
  	   calcultateTotalAmount();

  	   break;

  }
}

header('location:startCollecting.php');

}


if(isset($_GET['remove'])){

	$materialName = $_GET['remove'];

	  for ($i=0; $i < count($_SESSION['cardData']); $i++){

     	$data =  $_SESSION['cardData'][$i];

     	if($data['materialName']==$materialName){

     		unset($_SESSION['cardData'][$i]);

     		calcultateTotalAmount();
     		     break;

     	}
  }

  header('location:startCollecting.php');
}


function calcultateTotalAmount(){

	$totalAmount = 0;

	for ($i=0; $i < count($_SESSION['cardData']); $i++){

     	$data =  $_SESSION['cardData'][$i];
         

        $totalAmount   +=   $data['price'];      		  
     	
  }

   $_SESSION['totalAmmount'] = $totalAmount;


}


 ?>