<?php 
  
  require_once 'includes/header.php';
  require_once 'database/dashboard.php';

  $result = adminDashboard();
  $data   = mysqli_fetch_assoc($result);

  $resultUserSale = getSaleByUserId($userData['id']);
  $userSale       =    mysqli_fetch_assoc($resultUserSale);

  $resultAppointments  = getAppointments($userData['id']);
  $totalAppointments   =    mysqli_fetch_assoc($resultAppointments);



 ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <h4 style="color:#76838f; ">Dashboard</h4>
                <div class="row">
                    <?php if($userData['roleName']=='Admin'){ ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Materials</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $data['totalItems']; ?></h2>
                                    <p class="text-white mb-0"><?php echo date("M - D - Y "); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Purchased Materials</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">Rs <?php echo $data['purchasedMaterials']; ?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pending Appointments</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $data['pendingAppointments']; ?></h2>
                                    <p class="text-white mb-0"><?php echo date("M - D - Y "); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-calendar menu-icon"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">All Users </h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $data['totalUsers']; ?></h2>
                                    <p class="text-white mb-0"><?php echo date("M - D - Y "); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($userData['roleName']=='User'){ ?>
                    <div class="col-lg-12 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Sale </h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $userSale['totalSale']; ?></h2>
                                    <p class="text-white mb-0"><?php echo date("M - D - Y "); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($userData['roleName']=='Scrap collector'){ ?>
                    <div class="col-lg-12 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Assign Appointments </h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $totalAppointments['totalAppointments']; ?></h2>
                                    <p class="text-white mb-0"><?php echo date("M - D - Y "); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-calendar menu-icon"></i></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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

</body>

</html>