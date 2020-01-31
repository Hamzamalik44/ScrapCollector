<?php 
  
  require_once 'includes/header.php';
@$data = $_SESSION["data"];



 ?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="appointments.php">Appointments</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">

                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Book Now</h4>
                                <br>
                                    <form class="form-valide" action="database/appointments.php" method="post" id="signup-form">
                                      <input type="hidden" name="userId" value="<?php echo $userData['id']; ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Address</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address.."  value=<?php echo $userData['address']; ?>>
                                            </div>
                                        </div><div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Phone</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone.."  value=<?php echo $userData['phone']; ?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                               
                                            </div>
                                            <div class="col-lg-6 ">
                                                <button type="submit" name="confirmBookButton" class="btn col-lg-12 mb-1 btn-primary">Comfirm Book</button>
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
<?php 
  require_once 'includes/footer.php';
 ?>
          <script src="scripts/Appointments.js"></script>

       
</body>

</html>