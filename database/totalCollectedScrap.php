<?php 
require_once 'dbConnection.php';



//   get all users reports
function getTotalCollectedScrap(){
	$result  = mysqli_query(dbConnection(),"select date, sum(weight)as weight,name,sum(price*weight)as price from  total_scrap_collected");
	return $result;
}




//   get collector report
function getTotalCollectedScrapByIdAjax($post){

	$startDate  = $post['startDate'];
	$endDate    = $post['endDate'];
    
	$date      =  date_create($startDate);
    $startDate =  date_format($date,"Y-m-d");

    $date      =  date_create($endDate);
    $endDate =  date_format($date,"Y-m-d");

	$result  = mysqli_query(dbConnection(),"select  date, sum(weight)as weight,name,sum(price)as price from total_scrap_collected where date between '$startDate' and '$endDate'");

	$html = '';
	$html .='<thead>';
    $html .='<tr>';
    $html .='<th>Date</th>';
    $html .='<th>Total Weight</th>';
    $html .='<th>Material</th>';
    $html .='<th>Total Amount</th>';
    $html .='</tr>';
    $html .='</thead>';
    $html .='<tbody>';
     
     foreach ($result as $value) {
                                                         
    $html .='<tr>';
    $html .='<td>'.$value['date'].'</td>';
    $html .='<td>'.$value['weight'].'</td>';
    $html .='<td>'.$value['name'].'</td>';
    $html .='<td>'.$value['price'].'</td>';  
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


//   get by material
function getTotalCollectedScrapByMaterial($post){

    $id         = $post['id'];


    $result  = mysqli_query(dbConnection(),"select  date, sum(weight)as weight,name,sum(price)as price from total_scrap_collected where  id = '$id'");

    $html = '';
    $html .='<thead>';
    $html .='<tr>';
    $html .='<th>Date</th>';
    $html .='<th>Total Weight</th>';
    $html .='<th>Material</th>';
    $html .='<th>Total Amount</th>';
    $html .='</tr>';
    $html .='</thead>';
    $html .='<tbody>';
     
     foreach ($result as $value) {
                                                         
    $html .='<tr>';
    $html .='<td>'.$value['date'].'</td>';
    $html .='<td>'.$value['weight'].'</td>';
    $html .='<td>'.$value['name'].'</td>';
    $html .='<td>'.$value['price'].'</td>';  
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