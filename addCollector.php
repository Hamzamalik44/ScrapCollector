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
                        <li class="breadcrumb-item active"><a href="collectors.php">Collectors</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">

                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Collector</h4>
                                <br>
                                    <form class="form-valide" action="database/accounts.php" method="post" id="signup-form">
                                       <input type="hidden" name="roleId" value="3">  
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">First Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name.." value=<?php echo @$data['firstName']?> >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Last Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name.."  value=<?php echo @$data['lastName']?>>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-lg-4 col-form-label" >Email</label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email..">
                                                <?php if(isset($_SESSION["data"])){?><label id="email-error" class="error" for="email"><?php echo $data['message']?></label><?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-lg-4 col-form-label" >Phone</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control valid" id="phone" name="phone" placeholder="Phone.."value=<?php echo @$data['phone']?>>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-lg-4 col-form-label" >Password</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control valid" id="password" name="password" placeholder="Password.." value=<?php echo @$data['password']?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" >Confirm Password</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control valid" id="confirmPassword" name="confirmPassword" placeholder=" Confirm Password..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" >Address</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control valid" id="address" name="address" placeholder="Address.." value=<?php echo @$data['address']; unset($_SESSION["data"]); ?>>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                               
                                            </div>
                                            <div class="col-lg-6 ">
                                                <button type="submit" name="addCollctorButton" class="btn col-lg-12 mb-1 btn-primary">Submit</button>
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
          <script src="scripts/collectors.js"></script>

       
</body>

</html>