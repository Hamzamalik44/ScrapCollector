<?php 
  
  require_once 'includes/header.php';

// get all collectors 
require_once 'database/materials.php';
 $totalRecord =  getAllMaterials();

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

 $data = getLimitedMaterial($startingPageNo,$resultPerPage);
 ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="materials.php">Materials</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">
                      <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Material List
                                    <?php if($userData['roleName']=='Admin'){ ?>
                                    <a href="addMaterials.php" class="btn mb-1 btn-primary float-right">Add New</a>
                                <?php } ?>
                                     </h4>
                                    <br>
                                    <hr>
                                <div class="table-responsive">
                                    <table class="table header-border ">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Type</th>
                                                <?php if($userData['roleName']=='Admin'){ ?>
                                                <th>Actions</th>
                                            <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(mysqli_num_rows($data)>0){foreach ($data as $value) { ?>
                                
                                            <tr>
                                                <td><?php echo $value['name']; ?>
                                                <td><?php echo $value['price']; ?>
                                                <td><?php echo $value['type']; ?>
                                                </td>
                                                <?php if($userData['roleName']=='Admin'){ ?>
                                                <td><a href="editMaterial.php?edit=<?php echo $value['id']; ?>" class="btn mb-1 btn-sm btn-outline-info">Edit</a>
                                                    <button  onclick="deleteCollector(<?php echo $value['id']; ?>)" class="btn mb-1 btn-sm btn-outline-danger">Deactivate</button>
                                                </td>
                                            <?php } ?>
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

                                            

                                            <li class="page-item <?php echo ($_GET['page']==1)?'disabled':'' ?>"><a class="page-link" href="materialTypes.php?page=<?php echo $_GET['page']-1 ?>" tabindex="-1">Previous</a>
                                            </li>
                                            <?php for ($page=1; $page<=$numberOfPages ;$page++) { ?>
                                            <li class="page-item <?php echo ($_GET['page']==$page)?'active':'' ?>">
                                                <a class="page-link" href="materials.php?page=<?php echo $page ?>"><?php echo $page ?></a>
                                            </li>
                                            <?php } ?>
                                            <li class="page-item <?php echo ($_GET['page']==$page-1)?'disabled':'' ?>"><a class="page-link" href="materials.php?page=<?php echo $_GET['page']+1 ?>">Next</a>
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

        window.location.href="database/materials.php?deactivate="+id;

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