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
                        <li class="breadcrumb-item active"><a href="profile.php">Profile</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                         
                        <div class="card">
                            <div class="card-body offset-4">
                                <div class="media align-items-center mb-4">

                                    <img class="mr-3" src="uploadImages/<?php echo @$userData['image']?>" width="80" height="80" alt="">
                                    <div class="media-body">
                                        <h3 class="mb-0"><?php echo $userData['firstName']." ".$userData['lastName'];  ?> </h3>
                                    </div>
                                </div>
                                <br>
                                    <form class="form-valide" action="database/accounts.php" method="post" id="signup-form" enctype="multipart/form-data">
                                       <input type="hidden" name="roleId" value="3">  
                                        <div class="form-group row">
                            
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name.." value=<?php echo @$userData['firstName']?> >
                                            </div>
                                        
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name.."  value=<?php echo @$userData['lastName']?>>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="email" value="<?php echo(isset($data['email']))?$data['email']:$userData['email'] ?>" name="email" placeholder="Email..">
                                                <?php if(isset($data['message'])){?><label id="email-error" class="error" for="email"><?php echo @$data['message']?></label><?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row col-lg-6 ">
                                            
                                           <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                                <?php if(isset($data['imageMessage'])){?><label id="email-error" class="error" for="email"><?php echo $data['imageMessage']?></label><?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control valid" id="phone" name="phone" placeholder="Phone.."value=<?php echo @$userData['phone']?>>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                         
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control valid" id="address" name="address" placeholder="Address.." value=<?php echo @$userData['address']; unset($_SESSION["data"]); ?>>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                         
                                            <div class="col-lg-6 ">
                                                <button type="submit" name="editUserButton" class="btn col-lg-12 mb-1 btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
<script src="scripts/profile.js"></script>


 <script>
function done(){

 swal({
            title: "Done!",
            text: "",
            icon: "success"
            });
}

//   delete 
function deleteCollector(id){
     swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {

        window.location.href="database/accounts.php?deactive="+id;

      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
}


<?php if(isset($_SESSION['success'])){ ?>

done();

<?php unset($_SESSION['success']);  }?>    


</script>

</body>

</html>