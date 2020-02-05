<?php 
require_once 'dbConnection.php';



//   get all users reports
function getAllUsersReport(){
	$result  = mysqli_query(dbConnection(),"select *from  user_report");
	return $result;
}

//   get all users report by id
function getUsersReportById($id){
	$result  = mysqli_query(dbConnection(),"select *from  user_report where userId ='$id'");
	return $result;
}

//   get all users reports
function getuserReportById($userId){
	$result  = mysqli_query(dbConnection(),"select *from  one_user_report where userId='$userId'");
	return $result;
}


//   get all collector 
function getAllCollectorReport(){
	$result  = mysqli_query(dbConnection(),"select *from  collector_report");
	return $result;
}

// get collector report by id
function getCollectorById($userId){
	$result  = mysqli_query(dbConnection(),"select *from  one_collector_report where UserId='$userId'");
	return $result;
}




//   get collector report
function getCollectorReport($post){

	$startDate  = $post['startDate'];
	$endDate    = $post['endDate'];

	$date      =  date_create($startDate);
    $startDate =  date_format($date,"Y-m-d");

    $date      =  date_create($endDate);
    $endDate =  date_format($date,"Y-m-d");

	$result  = mysqli_query(dbConnection(),"select *from  collector_report where date between '$startDate' and '$endDate'");

	$html = '';
	$html .='<thead>';
    $html .='<tr>';
    $html .='<th>Date</th>';
    $html .='<th>First Name</th>';
    $html .='<th>Last Name</th>';
    $html .='<th>Address</th>';
    $html .='<th>Total Weight</th>';
    $html .='<th>Total Amount</th>';
    $html .='<th>Action</th>';
    $html .='</tr>';
    $html .='</thead>';
    $html .='<tbody>';
     
     foreach ($result as $value) {
                                                         
    $html .='<tr>';
    $html .='<td>'.$value['date'].'</td>';
    $html .='<td>'.$value['firstName'].'</td>';
    $html .='<td>'.$value['lastName'].'</td>';
    $html .='<td>'.$value['address'].'</td>';
    $html .='<td>'.$value['totalWeight'].'</td>'; 
    $html .='<td>'.$value['totalAmount'].'</td>'; 
    $html .='<td><a href="printCollectorReport.php?userId='.$value['UserId'].'" class="btn mb-1 btn-sm btn-outline-success">View</a></td>';   
    $html .='</tr>';                                      
    }

    $html .='</tbody>';
    if(mysqli_num_rows($result)>0){

	    echo json_encode(['status'=>'success','html'=>$html]);
    }

    else{
        $html='';
        $html .= '<td colspan="5" style="text-align: center;" ><h4>No Record Found</h4></td>';
        echo json_encode(['status'=>'success','html'=>$html]);
    }
}

//   get user report
function getUserReport($post){

	$startDate  = $post['startDate'];
	$endDate    = $post['endDate'];

	$date      =  date_create($startDate);
    $startDate =  date_format($date,"Y-m-d");

    $date      =  date_create($endDate);
    $endDate =  date_format($date,"Y-m-d");

	$result  = mysqli_query(dbConnection(),"select *from  user_report where date between '$startDate' and '$endDate'");

	$html = '';
	$html .='<thead>';
    $html .='<tr>';
    $html .='<th>Date</th>';
    $html .='<th>First Name</th>';
    $html .='<th>Last Name</th>';
    $html .='<th>Address</th>';
    $html .='<th>Total Weight</th>';
    $html .='<th>Total Amount</th>';
    $html .='<th>Action</th>';
    $html .='</tr>';
    $html .='</thead>';
    $html .='<tbody>';
     
     foreach ($result as $value) {
                                                         
    $html .='<tr>';
    $html .='<td>'.$value['date'].'</td>';
    $html .='<td>'.$value['firstName'].'</td>';
    $html .='<td>'.$value['lastName'].'</td>';
    $html .='<td>'.$value['address'].'</td>';
    $html .='<td>'.$value['totalWeight'].'</td>'; 
    $html .='<td>'.$value['totalAmount'].'</td>'; 
    $html .='<td><a href="printUserReport.php?userId='.$value['userId'].'" class="btn mb-1 btn-sm btn-outline-success">View</a></td>';   
    $html .='</tr>';                                      
    }

    $html .='</tbody>';
    if(mysqli_num_rows($result)>0){

	    echo json_encode(['status'=>'success','html'=>$html]);
    }

    else{
        $html='';
        $html .= '<td colspan="5" style="text-align: center;" ><h4>No Record Found</h4></td>';
        echo json_encode(['status'=>'success','html'=>$html]);
    }
}



?>