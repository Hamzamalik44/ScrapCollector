<?php 
require_once 'dbConnection.php';

//   confirm book

if(isset($_POST['confirmBookButton'])){

     $phone   = $_POST['phone'];
	 $address = $_POST['address'];
	 $userId  = $_POST['userId'];

	mysqli_query(dbConnection(),"update users set phone='$phone',address='$address' where id = '$userId'");
	$result = mysqli_query(dbConnection(),"insert into appointments values(DEFAULT,now(),1,'$userId',null)");

	if($result){
		header('location:../appointments.php');
	}
	
}

//   get appointment id
function getUserById($id){
	$result  = mysqli_query(dbConnection(),"select *from  appointments_with_status where userId = '$id'and status !='done'");
	return $result;
}

//   get appointment by status
function getAppointmentsByStatus($post){
	$status = $post['status'];
	$result  = mysqli_query(dbConnection(),"select *from  appointments_with_status where status = '$status'");

    $data = mysqli_fetch_array($result);

	$html = '';
	$html .='<thead>';
    $html .='<tr>';
    $html .='<th>Date</th>';
    $html .='<th>Name</th>';
    $html .='<th>Address</th>';
    $html .='<th>Status</th>';
    if($data['status']=='Pending'){
    $html .='<th>Action</th>';
}
    $html .='</tr>';
    $html .='</thead>';
    $html .='<tbody>';
     
     foreach ($result as $value) {
                                                         
    $html .='<tr>';
    $html .='<td>'.$value['date'].'</td>';
    $html .='<td>'.$value['firstName'].'</td>';
    $html .='<td>'.$value['address'].'</td>';
    if($value['status']=='Pending'){
    $html .='<td><span class="label gradient-2 rounded">'.$value['status'].'</span></td>';
    }else if($value['status']=='done'){
    	$html .='<td><span class="label gradient-4 rounded">'.$value['status'].'</span></td>';
    }
    else{
    	$html .='<td><span class="label gradient-1 rounded">'.$value['status'].'</span></td>';
    }

    if($value['status']=='Pending'){
    $html .='<td><a href="assignAppointments.php?userId='.$value['userId'].'" class="btn mb-1 btn-sm btn-outline-success">Assign</a>';
        }    
    $html .='</td>';
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

//   get appointment by status
function getAllStatus(){
	$result  = mysqli_query(dbConnection(),"select *from  status");
	return $result;
}

//   get limited appointments
function getLimitedAppintments($start,$end,$id){

    $result = mysqli_query(dbConnection(),"select *from appointments_with_status where collectorId='$id' and status='In process' limit $start,$end");
    return $result;
}

//   assign appointment

if(isset($_POST['assignAppointmentButton'])){

    $collectorId = $_POST['collectorId'];
    $userId      = $_POST['userId'];


       $result  = mysqli_query(dbConnection(),"update appointments set collectorId ='$collectorId',status=2 where userId = '$userId'and status=1 ");
    
    if($result)
    {  
        session_start();
        $_SESSION["success"] = "done";
        header("location:../adminAppointments.php");

    }
}

//   get all appointments by id
function getAppointmentsById($id){

    $result = mysqli_query(dbConnection(),"select *from appointments_with_status where collectorId= '$id' and status='In process'");
    return $result;
}


 ?>