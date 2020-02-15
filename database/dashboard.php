<?php 

require_once 'dbConnection.php';



//   get all material types
function adminDashboard(){

	$result = mysqli_query(dbConnection(),"select *from admin_dashboard");
	return $result;
}

function getSaleByUserId($id){

	$result = mysqli_query(dbConnection(),"SELECT SUM(weight*price) as totalSale from collected_scrap WHERE userId = '$id' and EXTRACT(MONTH FROM date) =
         EXTRACT(MONTH  FROM CURRENT_DATE())");
	return $result;
}





function getAppointments($id){

	$result = mysqli_query(dbConnection(),"SELECT COUNT(*) as totalAppointments FROM appointments WHERE collectorId = '$id' and status = 2");
	return $result;
}

?>

