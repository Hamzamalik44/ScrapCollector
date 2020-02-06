<?php 
  
  require_once 'includes/header.php';
  require_once 'database/materials.php';

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
                        <li class="breadcrumb-item active"><a href="materials.php">Materials</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">

                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Material </h4>
                                <br>
                                    <form class="form-valide" action="database/materials.php" method="post" id="signup-form">
                                       <div class="form-group row ">
                                            <label class="col-lg-4 col-form-label" >Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name..">
                                                <?php if(isset($_SESSION["data"])){?><label id="email-error" class="error" for="email"><?php echo $data['message']?></label><?php unset($_SESSION["data"]);}   ?>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Price</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Price.."  value=<?php echo @$data['price']?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Type</label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="typeId" name="typeId">
                                                    <?php  $materialTypes = getAllMaterialTypes(); ?>
                                                    <?php  foreach ($materialTypes as $value) { ?>
                                                        <option value="<?php echo $value['id'];?>" ><?php echo $value['name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                               
                                            </div>
                                            <div class="col-lg-6 ">
                                                <button type="submit" name="addMaterialButton" class="btn col-lg-12 mb-1 btn-primary">Submit </button>
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
          <script src="scripts/materials.js"></script>

       
</body>

</html>