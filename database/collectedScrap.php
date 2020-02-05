<?php 

require_once 'dbConnection.php';

//   add material type
if(isset($_GET['collect'])){

session_start();

  $result=0;

for ($i=0; $i < count($_SESSION['cardData']); $i++){

     	$data =  $_SESSION['cardData'][$i];
         

        $weight      =    $data['weight'];
        $price       =    $data['price'];      	
        $materialId  =    $data['materialId'];	
                          $userData      =  $_SESSION['userData'];
        $collectorId =    $collectorId   =  $userData['id'];
        $userId      =    $_SESSION['userId'];


        $result = mysqli_query(dbConnection(),"insert into collected_scrap values(default,'$weight',CURRENT_DATE(),'$price','$materialId','$userId','$collectorId');");
     	
  }
		 

			if($result){

				mysqli_query(dbConnection(),"update appointments set status=3 where userId='$userId'");

				unset($_SESSION['userId']);
				unset($_SESSION['cardData']);

				session_start();
		        $_SESSION["success"] = "done";
		        header("location:../collectorAppointments.php");
		}
	

	
}


?>

