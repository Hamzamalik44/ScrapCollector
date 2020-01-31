<?php 
  
  require_once 'includes/header.php';
  require_once 'database/accounts.php';

@$data = $_SESSION["data"];

if(isset($_GET['userId'])){

    $userId = $_GET['userId'];
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
                        <li class="breadcrumb-item active"><a href="adminAppointments.php">Appointments</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">

                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Assign Appointment <?php  ?> </h4>
                                <br>
                                    <form class="form-valide" action="database/appointments.php" method="post" id="signup-form">
                                       
                                      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Select Collector</label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="collectorId" name="collectorId">
                                                    <?php  $materialTypes = getAllCollectors(); ?>
                                                    <?php  foreach ($materialTypes as $value) { ?>
                                                        <option value="<?php echo $value['id'];?>" ><?php echo $value['firstName'].' '.$value['lastName'] ;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                               
                                            </div>
                                            <div class="col-lg-6 ">
                                                <button type="submit" name="assignAppointmentButton" class="btn col-lg-12 mb-1 btn-primary">Confirm Assign </button>
                                            </div>
                                        </div>
                                    </form>
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
}
<?php 
  require_once 'includes/footer.php';
 ?>

       
</body>

</html>