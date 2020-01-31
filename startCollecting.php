<?php 
  
  require_once 'includes/header.php';
  require_once 'database/accounts.php';
  require_once 'database/materialTypes.php';

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
                        <li class="breadcrumb-item active"><a href="collectorAppointments.php">Appointments</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">

                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Collecting <?php  ?> </h4>
                                <br>
                                    <form class="form-valide " action="database/appointments.php" method="post" id="signup-form">
                                       
                                      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Material Type</label>
                                            <div class="col-lg-3">
                                                <select class="form-control rounded" id="materialTypes" name="materialTypes">
                                                    <?php  $materialTypes = getAllMaterialTypes(); ?>
                                                    <?php  foreach ($materialTypes as $value) { ?>
                                                        <option value="<?php echo $value['id'];?>" ><?php echo $value['name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label class="col-lg-2 col-form-label">Material</label>
                                            <div class="col-lg-3">
                                                <select class="form-control rounded" id="material" name="material">

                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Weight in Kg</label>
                                            <div class="col-lg-3 ">
                                                
                                                <input type="text" class="form-control rounded" name="Weight">
                                            </div>
                                            
                                            <label class="col-lg-2 col-form-label">Price</label>
                                            <div class="col-lg-3 ">
                                                
                                                <input type="text" class="form-control rounded" readonly name="price">
                                            </div>

                                            <div class="col-lg-2 ">
                                                <button type="submit" name="assignAppointmentButton" class="btn form-control rounded btn-primary">Add </button>
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

<script src="scripts/addToCart.js"></script>
       
</body>

</html>

