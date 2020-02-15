<?php 
  
  require_once 'includes/header.php';



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
                    <div class="col-lg-4 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">

                                    <img class="mr-3" src="uploadImages/<?php echo @$userData['image']?>" width="80" height="80" alt="">

                                    <div class="media-body">
                                        <h3 class="mb-0"><?php echo $userData['firstName']." ".$userData['lastName'];  ?> </h3>
                                    </div>
                                    <a href="editProfile.php" class="float-right btn btn-primary ">Edit</a>
                                </div>
                                


                                
                                <ul class="card-profile__info">
                                    <table>
                                        <tr>
                                            <td><strong class="text-dark mr-4">Mobile</strong></td> <td><span><?php echo $userData['phone']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="text-dark mr-4">Email</strong></td> <td><span><?php echo $userData['email']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="text-dark mr-4">Address</strong></td> <td><span><?php echo $userData['address'] ?></span></td>
                                        </tr>
                                    </table>
                                </ul>
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