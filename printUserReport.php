

<?php 
  
  require_once 'includes/header.php';

// get all collectors 
require_once 'database/reports.php';



$data = getuserReportById($_GET['userId']);
 ?>


 <style>
     
     input[type="search"]{

        border: 1px solid #ced4da;
        border-radius: 3px;

     }

.dataTables_wrapper {
    margin-top: -25px;
}
.dt-buttons {
    margin-top: 10px;
 </style>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="userReport.php">User's Report</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">
                      <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-5">
                                       <h4 class="card-title"> User's Report </h4>
                                    </div>
                                </div>

                                    <hr>
                                <div class="table-responsive">
                                    <table class="table header-border " id="userReport" >
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>

                                                <th>Material</th>
                                                <th>Material Weight</th>
                                                <th>Price Per Kg</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(mysqli_num_rows($data)>0){foreach ($data as $value) { ?>
                                
                                            <tr>
                                                <td><?php echo $value['date']; ?>
                                                </td>
                                                <td><?php echo $value['firstName']; ?></td>
                                             
                                                <td><?php echo $value['material']; ?></td>
                                                <td><?php echo $value['weight']; ?></td>
                                                </td>
                                                <td><?php echo $value['price']; ?></td>
                                                <td><?php echo $value['totalPrice']; ?></td>
                                            </tr>
                                           
                                           <?php }}
                                           else{ ?>
                                            <td colspan="5" style="text-align: center;" ><h4>No Record Found</h4></td>
                                           <?php } ?>
                                        </tbody>
                                        
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


    <script src="./plugins/moment/moment.js"></script>
    <script src="./plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="./plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="./plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="./plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="./plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="./plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="./plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="./js/plugins-init/form-pickers-init.js"></script>
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>


    <!--  -->
    <script src="./plugins/dataTables/Buttons/buttons.min.js"></script>
    <script src="./plugins/dataTables/Buttons/flash.min.js"></script>
    <script src="./plugins/dataTables/Buttons/pdfmake.min.js"></script>
    <script src="./plugins/dataTables/Buttons/vfsfonts.js"></script>
    <script src="./plugins/dataTables/Buttons/html5.min.js"></script>
    <script src="./plugins/dataTables/Buttons/print.min.js"></script>

 <script>
function done(){

 swal({
            title: "Done!",
            text: "",
            icon: "success"
            });
}



<?php if(isset($_SESSION['success'])){ ?>

done();

<?php unset($_SESSION['success']);  }?>    


$(document).ready(function(){
    

    $('#userReport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });




 
});


</script>

</body>

</html>