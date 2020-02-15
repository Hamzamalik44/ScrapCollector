<?php 
  
  require_once 'includes/header.php';
@$data = $_SESSION["data"];


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
                        <li class="breadcrumb-item active"><a href="materialTypes.php">Material Types</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">

                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Material Type</h4>
                                <br>
                                    <form class="form-valide" action="database/materialTypes.php" method="post" id="signup-form">
                                       <div class="form-group row ">
                                            <label class="col-lg-4 col-form-label" >Nmae</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name..">
                                                <?php if(isset($_SESSION["data"])){?><label id="email-error" class="error" for="email"><?php echo $data['message']?></label><?php unset($_SESSION["data"]);}   ?>
                                            </div>
                                        </div>
                                    

                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                               
                                            </div>
                                            <div class="col-lg-6 ">
                                                <button type="submit" name="addMaterialTypeButton" class="btn col-lg-12 mb-1 btn-primary">Submit</button>
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
          <script src="scripts/materialTypes.js"></script>

       
</body>

</html>