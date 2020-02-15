

<?php 
  
  require_once 'includes/header.php';

// get all collectors 
require_once 'database/TotalCollectedScrap.php';
require_once 'database/materialTypes.php';


$data = getTotalCollectedScrap();
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
                        <li class="breadcrumb-item active"><a href="collectedScrap.php">Collected Scrap</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid ">
                      <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">
                                       <h4 class="card-title">Total Scrap Collected </h4>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control rounded" id="materialTypes" name="materialTypes">
                                                    <?php  $materialTypes = getAllMaterialTypes(); ?>
                                                    <?php  foreach ($materialTypes as $value) { ?>
                                                        <option value="<?php echo $value['id'];?>" ><?php echo $value['name'];?></option>
                                                    <?php } ?>
                                                </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control rounded" id="material" name="material" >

                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                       <div class="example">

                                            <div class="input-daterange input-group" id="date-range">
                                                <span style=" margin-right: 20px;" class="">from</span>
                                                <input type="text" class="form-control" name="start"> <span style="margin-left: 20px; margin-right: 20px;" class="">to</span>
                                                <input type="text" class="form-control" name="end">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <hr>
                                <div class="table-responsive">
                                    <table class="table header-border " id="userReport" >
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Total Weight</th>
                                                <th>Material</th>
                                                <th>Total Amount</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(mysqli_num_rows($data)>0){foreach ($data as $value) { ?>
                                
                                            <tr>
                                                <td><?php echo $value['date']; ?>
                                                </td>
                                                <td><?php echo $value['weight']; ?></td>
                                                <td><?php echo $value['name']; ?></td>
                                               
                                                <td><?php echo $value['price']; ?></td>
                                                
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




 <script>  

$(document).ready(function(){
    
    getItems();

    $('#materialTypes').on("change",function(){

        getItems();

    });

    $('input[name="start"]').on("change",function(){

        loadData();
    });

    $('input[name="end"]').on("change",function(){

        loadData();
    });

    $('#material').on("change",function(){

        var material   =  $('#material').val();

         $.ajax({
            url:'ajaxCalls/getTotalCollectedScrapByMaterial.php',
            method:'post',
            data:{id:material},
            success:function(response){
                  response=  $.parseJSON(response);

                $('#userReport').html(response.html);
            }
        });

    });



function loadData(){

var startDate =  $('input[name="start"]').val();
var endDate   =  $('input[name="end"]').val();

        $.ajax({
            url:'ajaxCalls/totalCollectedScrap.php',
            method:'post',
            data:{startDate:startDate,endDate:endDate},
            success:function(response){
                  response=  $.parseJSON(response);

                $('#userReport').html(response.html);
            }
        });


} 

function getItems(){

            materialTypeId =  $('#materialTypes').val();

          $.ajax({

            url:"ajaxCalls/getMaterials.php",
            method:"POST",
            data: {id:materialTypeId},
            success:function(resopone){

                resopone = $.parseJSON(resopone);
                $('#material').html(resopone.html);
                $('#materialName').val(resopone.firstOption);
            }
          });
}


});


</script>

</body>

</html>