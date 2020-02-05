<?php 
  
  require_once 'includes/header.php';
  require_once 'database/accounts.php';
  require_once 'database/materialTypes.php';

@$data = $_SESSION["data"];

if(isset($_GET['userId'])){

    $_SESSION['userId'] = $_GET['userId'];


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
                                <h4 class="card-title">Collecting  </h4>
                                <br>
                                    <form class="form-valide " action="addToCart.php" method="post" id="signup-form">
                                       
                                      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Material Type</label>
                                            <div class="col-lg-2">
                                                <select class="form-control rounded" id="materialTypes" name="materialTypes">
                                                    <?php  $materialTypes = getAllMaterialTypes(); ?>
                                                    <?php  foreach ($materialTypes as $value) { ?>
                                                        <option value="<?php echo $value['id'];?>" ><?php echo $value['name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label class="col-lg-1 col-form-label">Material</label>
                                            <div class="col-lg-2">
                                                <input type="hidden" id="materialName" name="materialName" value="">
                                                <select class="form-control rounded" id="material" name="material" >

                                                </select> 
                                            </div>
                                             <label class="col-lg-2 col-form-label">Weight in Kg</label>
                                            <div class="col-lg-3 ">
                                                
                                                <input type="text" class="form-control rounded" id="weight" name="weight">
                                            </div>
                                            
                                        </div>

                                        <div class="form-group row">
                                           
                                            
                                            <label class="col-lg-2 col-form-label">Price Per Kg</label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control rounded" id="uintPrice" name="uintPrice" readonly>
                                            </div>

                                            <label class="col-lg-1 col-form-label">Price</label>
                                            <div class="col-lg-3 ">
                                                
                                                <input type="text" class="form-control rounded" readonly id="price" name="price">
                                            </div>

                                            <div class="col-lg-3 ">
                                                <button type="submit" name="addToCartButton" class="btn form-control rounded btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

<?php if(@count($_SESSION['cardData'])>0){ ?>
                              <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border ">
                                        <thead>
                                            <tr>
                                                <th>Material</th>
                                                <th>Weight</th>
                                                <th>Price Per Kg</th>
                                                <th>Total Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                          <?php   for ($i=0; $i < count($_SESSION['cardData']); $i++) { ?>
                                                            <tr>
                                          <?php            $data =  $_SESSION['cardData'][$i];  ?>

                                                            
                                                            <td><?php echo $data['materialName'];?></td>
                                                            <td><?php echo $data['weight'];?></td>
                                                            <td><?php echo $data['pricePerKg'];?></td>
                                                            <td><?php echo $data['price'];?></td>
                                                            <td><a href="addToCart.php?remove=<?php echo $data['materialName'];?>"  class="btn mb-1 btn-sm btn-outline-danger">Remove</a></td>
                                                            
                                                            </tr>
                                          <?php } ?>

                                         
                                        </tbody>        
                                    </table>

                                </div>

                            </div>



                        </div>

                        <div class="card">
                            <div class="card-body">
                               
                               <div class="row">
                                <div class="col-5"></div>
                                   <div class="col-4" style="font-size: 16px;">
                                       <p><b>Total Amount : Rs. </b><?php echo $_SESSION['totalAmmount']; ?></p>
                                   </div>

                               

                                    <a href="database/collectedScrap.php?collect=<?php echo $_SESSION['totalAmmount']; ?>" name="collectedScrapButton" class="btn mb-1 btn-md col-3  btn-success rounded" style="color: white;font-size:16px;  ">Collect</a>
                                </div>
                            </div>
                        </div>


                    <?php } ?>
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

