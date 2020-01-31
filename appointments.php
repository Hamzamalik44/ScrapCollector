<?php 
  
  require_once 'includes/header.php';

// get all collectors 
require_once 'database/appointments.php';

$data = getUserById($userData['id']);
$restult = mysqli_num_rows($data);
 ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="appointments.php">Appointment</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">
                      <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Appointment
                                    <?php if($restult==0){ ?>
                                    <a href="userBookAppointment.php" class="btn mb-1 btn-primary float-right">Book Now
                                    </a> <?php } ?></h4>
                                    <br>
                                    <hr>
                                    <?php if($restult>0){  ?>
                                <div class="table-responsive">
                                    <table class="table header-border ">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(mysqli_num_rows($data)>0){foreach ($data as $value) { ?>
                                
                                            <tr>
                                                <td><?php echo $value['date']; ?>
                                                <td><span class="label gradient-<?php echo ($value['status']=="Pending")?2:1 ?> rounded"><?php echo $value['status']; ?></span>
                                                </td>
                                                

                                            </tr>
                                           
                                           <?php }}
                                           else{ ?>
                                            <td colspan="5" style="text-align: center;" ><h4>No Record Found</h4></td>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
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

        window.location.href="database/materials.php?delete="+id;

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