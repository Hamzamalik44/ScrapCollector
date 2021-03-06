

<?php 
  
  require_once 'includes/header.php';

// get all collectors 
require_once 'database/accounts.php';
 $totalRecord =  getAllCollectors();

 $resultPerPage  =  5;
 $numberOfResult =  mysqli_num_rows($totalRecord);
 $numberOfPages  =  ceil($numberOfResult/$resultPerPage);

 if(!isset($_GET['page'])){
    $page=1;
    $_GET['page']=1;
 }else{
    $page=$_GET['page'];
 }

 $startingPageNo = ($page-1)*$resultPerPage;

 $data = getLimitedCollectors($startingPageNo,$resultPerPage);
 ?>


  <?php 
if($userData['roleName']!='Admin'){ 

    echo "<script>window.location.href='index.php'</script>";
}
 ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="collectors.php">Collectors</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">
                      <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Collectors List 
                                    <a href="addCollector.php" class="btn mb-1 btn-primary float-right">Add New</a> </h4>
                                    <br>
                                    <hr>
                                <div class="table-responsive">
                                    <table class="table header-border ">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Eamil</th>
                                                <th>Address</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(mysqli_num_rows($data)>0){foreach ($data as $value) { ?>
                                
                                            <tr>
                                                <td><?php echo $value['firstName']; ?>
                                                </td>
                                                <td><?php echo $value['lastName']; ?></td>
                                                <td><span class="text-muted"><?php echo $value['email']; ?></span>
                                                </td>

                                                </td>
                                                <td><?php echo $value['address']; ?></td>
                                                <td><a href="editCollector.php?edit=<?php echo $value['id']; ?>" class="btn mb-1 btn-sm btn-outline-info">Edit</a>
                                                    <a href="#" onclick="deleteCollector(<?php echo $value['id']; ?>)" class="btn mb-1 btn-sm btn-outline-danger">Deactivate</a>
                                                </td>
                                            </tr>
                                           
                                           <?php }}
                                           else{ ?>
                                            <td colspan="5" style="text-align: center;" ><h4>No Record Found</h4></td>
                                           <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="bootstrap-pagination">
                                    <nav>
                                        <ul class="pagination justify-content-end">

                                            

                                            <li class="page-item <?php echo ($_GET['page']==1)?'disabled':'' ?>"><a class="page-link" href="collectors.php?page=<?php echo $_GET['page']-1 ?>" tabindex="-1">Previous</a>
                                            </li>
                                            <?php for ($page=1; $page<=$numberOfPages ;$page++) { ?>
                                            <li class="page-item <?php echo ($_GET['page']==$page)?'active':'' ?>">
                                                <a class="page-link" href="collectors.php?page=<?php echo $page ?>"><?php echo $page ?></a>
                                            </li>
                                            <?php } ?>
                                            <li class="page-item <?php echo ($_GET['page']==$page-1)?'disabled':'' ?>"><a class="page-link" href="collectors.php?page=<?php echo $_GET['page']+1 ?>">Next</a>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>


            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        

        <!--**********************************
            Footer start
        ***********************************-->
<?php 
  require_once 'includes/footer.php';
 ?>

 <script>
function done(){

 swal({
            title: "Done!",
            text: "",
            icon: "success"
            });
}

//   delete 
function deleteCollector(id){
     swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {

        window.location.href="database/accounts.php?deactive="+id;

      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
}


<?php if(isset($_SESSION['success'])){ ?>

done();

<?php unset($_SESSION['success']);  }?>    


</script>

</body>

</html>