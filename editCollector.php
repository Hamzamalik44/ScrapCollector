<?php 
  
  require_once 'includes/header.php';
  require_once 'database/users.php';
if(isset($_GET['edit'])){

$id = $_GET['edit'];
   $result = getUserById($id);
   $data  = mysqli_fetch_assoc($result);
}


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
                                <h4 class="card-title">Edit Collector Details </h4>
                                <br>
                                    <form class="form-valide" action="database/accounts.php" method="post" id="signup-form">
                                       <input type="hidden" name="id" value="<?php echo @$data['id']?>">

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
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email.." value=<?php echo @$data['email']?>>
                                                <?php if(isset($_SESSION["data"])){?><label id="email-error" class="error" for="email"><?php echo $data['message']?></label><?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-lg-4 col-form-label" >Phone</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control valid" id="phone" name="phone" placeholder="Phone.."value=<?php echo @$data['phone']?>>
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
                                                <button type="submit" name="editCollctorButton" class="btn col-lg-12 mb-1 btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
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