<?php 
require_once 'userData.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Scrap Collector</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">

        <!-- Custom Stylesheet -->
    <link href="./plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="./plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="./plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="./plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="./plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">




    <style>
        .error{
            color: red;
        }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo-text2.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img class="logo" src="images/logo-text2.png" alt="">
                        <apan class="logo-text">SCRAP COLLECTOR</apan>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">

                </div>
                <div class="header-right">
                    <ul class="clearfix">

                      

                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="uploadImages/<?php echo @$userData['image']?>" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="profile.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="changePassword.php"><i class="icon-lock"></i> <span>Cnage Password</span></a>
                                        </li>
                                        
                                        <hr class="my-2">

                                        <li><a href="logout.php"><i class="fa fa-sign-out "></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="" href="dashboard.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>

                    </li>
                    <?php if($userData['roleName']=='Admin'){ ?>
                    <li>
                        <a class="" href="collectors.php" aria-expanded="false">
                            <i class="icon-user menu-icon"></i><span class="nav-text">Collectors</span>
                        </a>

                    </li>
                <?php } ?>
                    <li>
                        <a class="" href="materialTypes.php" aria-expanded="false">
                            <i class="fa fa-recycle menu-icon"></i><span class="nav-text">Material Types</span>
                        </a>

                    </li>
                    <li>
                        <a class="" href="materials.php" aria-expanded="false">
                            <i class="fa fa-list menu-icon"></i><span class="nav-text">Materials</span>
                        </a>

                    </li>
                    <?php if($userData['roleName']=='Admin'){ ?>
                    <li>
                        <a class="" href="collectedScrap.php" aria-expanded="false">
                            <i class="fa fa-archive"></i><span class="nav-text">Collected Scrap</span>
                        </a>

                    </li>
                <?php } ?>
                    <?php if($userData['roleName']=='User'){ ?>
                    <li>
                        <a class="" href="appointments.php" aria-expanded="false">
                            <i class="fa fa-calendar menu-icon"></i><span class="nav-text">Appointment</span>
                        </a>

                    </li>
                <?php } ?>
                <?php if($userData['roleName']=='Scrap collector'){ ?>
                    <li>
                        <a class="" href="collectorAppointments.php" aria-expanded="false">
                            <i class="fa fa-calendar menu-icon"></i><span class="nav-text">Appointments</span>
                        </a>

                    </li>
                <?php } ?>
                    <?php if($userData['roleName']=='Admin'){ ?>
                      <li>
                        <a class="" href="adminAppointments.php" aria-expanded="false">
                            <i class="fa fa-calendar menu-icon"></i><span class="nav-text">Appointments</span>
                        </a>

                    </li>
                <?php } ?>
                    <li>
                        <?php if($userData['roleName']=='Admin' || $userData['roleName']=='User'){ ?>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-file menu-icon"></i> <span class="nav-text">Reports</span>
                        </a>
                    <?php } ?>
                        <ul aria-expanded="false">
                            <?php if($userData['roleName']=='User'){ ?>
                            <li><a href="userSellingReport.php">Selling's</a></li>
                        <?php } ?>
                            <?php if($userData['roleName']=='Admin'){ ?>
                             <li><a href="userReport.php">User's</a></li>
                              <li><a href="collectorReport.php">Collector's</a></li>
                          <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>