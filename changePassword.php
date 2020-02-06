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
                        <!-- <li class="breadcrumb-item active"><a href="collectors.php">Collectors</a></li> -->
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">

                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Change Password</h4>
                                <br>
                                    <form class="form-valide" action="database/accounts.php" method="post" id="signup-form">
                                       <input type="hidden" name="roleId" value="3">  
                                        
                                        <div class="form-group row ">
                                            <label class="col-lg-4 col-form-label" >Old Password</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old Password..">
                                                <?php if(isset($_SESSION["data"])){?><label id="email-error" class="error" for="email"><?php echo $data['message']?></label><?php unset($_SESSION["data"]); } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row ">
                                            <label class="col-lg-4 col-form-label" >New Password</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control valid" id="password" name="password" placeholder="New Password.." value=<?php echo @$data['password']?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" >Confirm New Password</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control valid" id="confirmPassword" name="confirmPassword" placeholder=" Confirm New Password..">
                                            </div>
                                        </div>
                                       

                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                               
                                            </div>
                                            <div class="col-lg-6 ">
                                                <button type="submit" name="changePasswordButton" class="btn col-lg-12 mb-1 btn-primary">Submit</button>
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
          <script src="scripts/changePassword.js"></script>

  <script>
function done(){

 swal({
            title: "Done!",
            text: "Password Change Successfully",
            icon: "success"
            });
}


<?php if(isset($_SESSION['success'])){ ?>

done();

<?php unset($_SESSION['success']);  }?>    


</script>

</body>

</html>


