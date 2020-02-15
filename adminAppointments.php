<?php 
  
  require_once 'includes/header.php';

// get all collectors 
require_once 'database/appointments.php';
require_once 'database/materials.php';
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
                        <li class="breadcrumb-item active"><a href="adminAppointments.php">Appointments</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">
                      <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <h4 class="card-title col-10">Appointments</h4>

                                    <select class="form-control col-2 rounded" id="status" name="status">
                                                    <?php  $materialTypes = getAllStatus(); ?>
                                                    <?php  foreach ($materialTypes as $value) { ?>
                                                        <option value="<?php echo $value['name'];?>" ><?php echo $value['name'];?></option>
                                                    <?php } ?>
                                                </select>

                                     </div>
                                    <br>
                                    <hr>
                                <div class="table-responsive">
                                    <table class="table header-border " id="appointments">
                                       
                                        
                                    </table>
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

        window.location.href="database/materials.php?delete="+id;

      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
}


<?php if(isset($_SESSION['success'])){ ?>

done();

<?php unset($_SESSION['success']);  }?>    


$(document).ready(function(){
    
    loadData();
    $('#status').on('change',function(){

        loadData();
    });

function loadData(){

    var status =  $('#status').val();

            $.ajax({
                url:'ajaxCalls/appointments.php',
                method:'post',
                data:{status:status},
                success:function(response){
                      response=  $.parseJSON(response);
                    console.log(response);

                    $('#appointments').html(response.html);
                }
            });
}    

});


</script>

</body>

</html>