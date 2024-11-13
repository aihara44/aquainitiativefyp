<?php
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

    $msg = "";
    $kenderaan_id = "";
    $plat_no = "";
    $driver_name = "";
    $brand1 = "";
    $type1 = "";
    $quantity1 = "";
    $insufficient1 = "";
    $location1 = "";
    $brand2 = "";
    $type2 = "";
    $quantity2 = "";
    $insufficient2 = "";
    $location2 = "";
    $brand3 = "";
    $type3 = "";
    $quantity3 = "";
    $insufficient3 = "";
    $location3 = "";
    $brand4 = "";
    $type4 = "";
    $quantity4 = "";
    $insufficient4 = "";
    $location4 = "";
    $brand5 = "";
    $type5 = "";
    $quantity5 = "";
    $insufficient5 = "";
    $location5 = "";
    $date = "";
    $serial_no = "";
    $fuel_type = "";
    $price = "";

    if(isset($_GET["get_id"])){
        $qe = mysqli_query($con, "SELECT * FROM kenderaan WHERE kenderaan_id='".mres($con, $_GET["get_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $kenderaan_id = $row["kenderaan_id"];
            $plat_no = $row["no_plat"];
        }
    }
    
    if(isset($_POST["btn_save"])){
    $driver_name = mres($con, $_SESSION["operasi"]);
    $plat_no = mres($con, $_POST["plat_no"]);
    $brand1 = mres($con, $_POST["brand1"]);
    $type1 = mres($con, $_POST["type1"]);
    $quantity1 = mres($con, $_POST["quantity1"]);
    $insufficient1 = mres($con, $_POST["insufficient1"]);
    $location1 = mres($con, $_POST["location1"]);
    $brand2 = mres($con, $_POST["brand2"]);
    $type2 = mres($con, $_POST["type2"]);
    $quantity2 = mres($con, $_POST["quantity2"]);
    $insufficient2 = mres($con, $_POST["insufficient2"]);
    $location2 = mres($con, $_POST["location2"]);
    $brand3 = mres($con, $_POST["brand3"]);
    $type3 = mres($con, $_POST["type3"]);
    $quantity3 = mres($con, $_POST["quantity3"]);
    $insufficient3 = mres($con, $_POST["insufficient3"]);
    $location3 = mres($con, $_POST["location3"]);
    $brand4 = mres($con, $_POST["brand4"]);
    $type4 = mres($con, $_POST["type4"]);
    $quantity4 = mres($con, $_POST["quantity4"]);
    $insufficient4 = mres($con, $_POST["insufficient4"]);
    $location4 = mres($con, $_POST["location4"]);
    $brand5 = mres($con, $_POST["brand5"]);
    $type5 = mres($con, $_POST["type5"]);
    $quantity5 = mres($con, $_POST["quantity5"]);
    $insufficient5 = mres($con, $_POST["insufficient5"]);
    $location5 = mres($con, $_POST["location5"]);
    $date = mres($con, $_POST["date"]);
    $serial_no = mres($con, $_POST["serial_no"]);
    $fuel_type = mres($con, $_POST["fuel_type"]);
    $price = mres($con, $_POST["price"]);
    $qry = mysqli_query($con, "INSERT INTO penghantaran values('','".$driver_name."','".$plat_no."','".$brand1."','".$type1."','".$quantity1."','".$insufficient1."','".$location1."','".$brand2."','".$type2."','".$quantity2."','".$insufficient2."','".$location2."','".$brand3."','".$type3."','".$quantity3."','".$insufficient3."','".$location3."','".$brand4."','".$type4."','".$quantity4."','".$insufficient4."','".$location4."','".$brand5."','".$type5."','".$quantity5."','".$insufficient5."','".$location5."','".$date."','".$serial_no."','".$fuel_type."','".$price."')");

    if($qry){
        $msg = '<div id="login-alert" class="alert alert-success col-sm-12">Success! Data Is Inserted.</div>';
        }else{
        $msg = '<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Data cannot inserted.</div>';
        }
    }

?>
   

   <?php include ("header.php"); ?>
    <div class="row" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                <div class="col-md-12">
             <?php include ("leftmenu.php"); ?>
          </div>
        </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="col-md-12">
                <div class="panel panel-info">
                   <div class="panel-heading">
                       <div class="panel-title">Add Delivery Information</div>
                    </div>
                   <div class="panel-body">
                       <?php echo $msg; ?>
                   <form id="form_delivery" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <div style="margin-bottom: 25px" class="input-group">
                            <input type="hidden" name="penghantaran_id" value="<?php echo $penghantaran_id; ?>">
                            <span class="input-group-addon">Driver Name</span>
                            <input type="text" class="form-control" name="driver_name" id="driver_name" value="<?php echo $_SESSION["operasi"]; ?>" readonly>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Plat No.</span>
                            <input type="text" class="form-control" name="plat_no" id="plat_no" value="<?php echo $plat_no; ?>" readonly>
                        </div>
                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title">Delivery 1</div>
                           </div>
                           <div class="panel-body">
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Brand</span>
                               <select class="form-control" name="brand1" id="brand1">
                                   <option value="">-- Select Brand --</option>
                                  <?php 
                    
                                    $qry = "SELECT * FROM jenama";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<option value"'.$row["jenama_id"].'">'.$row["jenama"].'</option>';
                                    }
                                   
                                     ?>
                               </select>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Type</span>
                               <select class="form-control" name="type1" id="type1">
                                    <option value="">-- Select Type --</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Quantity</span>
                           <input type="text" class="form-control" name="quantity1" id="quantity1" />
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Insufficient</span>
                            <input type="text" class="form-control" name="insufficient1" id="insufficient1" />
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Location</span>
                               <select class="form-control" name="location1" id="location1">
                                    <option value="">-- Select Location --</option>
                                   <?php 
                    
                                    $qry = "SELECT * FROM lokasi";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        ?>

                                    <option value="<?php echo $row["lokasi"]; ?>"><?php echo $row["lokasi"]; ?></option>
                                        <?php
                                    }
                                   ?>
                               </select>
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning">
                        <div class="panel-heading">
                                <div class="panel-title">Delivery 2</div>
                           </div>
                           <div class="panel-body">
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Brand</span>
                               <select class="form-control" name="brand2" id="brand2">
                                   <option value="">-- Select Brand --</option>
                                  <?php 
                    
                                    $qry = "SELECT * FROM jenama";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<option value"'.$row["jenama_id"].'">'.$row["jenama"].'</option>';
                                    }
                
                
                                     ?>
                               </select>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Type</span>
                               <select class="form-control" name="type2" id="type2">
                                    <option value="">-- Select Type --</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Quantity</span>
                           <input type="text" class="form-control" name="quantity2" id="quantity2" />
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Insufficient</span>
                            <input type="text" class="form-control" name="insufficient2" id="insufficient2" />
                        </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Location</span>
                               <select class="form-control" name="location2" id="location2">
                                    <option value="">-- Select Location --</option>
                                   <?php 
                    
                                    $qry = "SELECT * FROM lokasi";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        ?>

                                    <option value="<?php echo $row["lokasi"]; ?>"><?php echo $row["lokasi"]; ?></option>
                                        <?php
                                    }
                                   ?>
                               </select>
                           </div>
                           </div>
                       </div>
                       <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="panel-title">Delivery 3</div>
                           </div>
                           <div class="panel-body">
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Brand</span>
                               <select class="form-control" name="brand3" id="brand3">
                                   <option value="">-- Select Brand --</option>
                                 <?php 
                    
                                    $qry = "SELECT * FROM jenama";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<option value"'.$row["jenama_id"].'">'.$row["jenama"].'</option>';
                                    }
                
                
                                     ?>
                               </select>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Type</span>
                               <select class="form-control" name="type3" id="type3">
                                    <option value="">-- Select Type --</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Quantity</span>
                           <input type="text" class="form-control" name="quantity3" id="quantity3" />
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Insufficient</span>
                            <input type="text" class="form-control" name="insufficient3" id="insufficient3" />
                        </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Location</span>
                               <select class="form-control" name="location3" id="location3">
                                    <option value="">-- Select Location --</option>
                                   <?php 
                    
                                    $qry = "SELECT * FROM lokasi";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        ?>

                                    <option value="<?php echo $row["lokasi"]; ?>"><?php echo $row["lokasi"]; ?></option>
                                        <?php
                                    }
                                   ?>
                               </select>
                           </div>
                           </div>
                       </div>
                       <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="panel-title">Delivery 4</div>
                           </div>
                           <div class="panel-body">
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Brand</span>
                               <select class="form-control" name="brand4" id="brand4">
                                   <option value="">-- Select Brand --</option>
                                   <?php 
                    
                                    $qry = "SELECT * FROM jenama";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<option value"'.$row["jenama_id"].'">'.$row["jenama"].'</option>';
                                    }
                
                
                                     ?>
                               </select>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Type</span>
                               <select class="form-control" name="type4" id="type4">
                                    <option value="">-- Select Type --</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Quantity</span>
                           <input type="text" class="form-control" name="quantity4" id="quantity4" />
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Insufficient</span>
                            <input type="text" class="form-control" name="insufficient4" id="insufficient4" />
                        </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Location</span>
                               <select class="form-control" name="location4" id="location4">
                                    <option value="">-- Select Location --</option>
                                   <?php 
                    
                                    $qry = "SELECT * FROM lokasi";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        ?>

                                    <option value="<?php echo $row["lokasi"]; ?>"><?php echo $row["lokasi"]; ?></option>
                                        <?php
                                    }
                                   ?>
                               </select>
                           </div>
                           </div>
                       </div>
                       <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">Delivery 5</div>
                           </div>
                           <div class="panel-body">
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Brand</span>
                               <select class="form-control" name="brand5" id="brand5">
                                   <option value="">-- Select Brand --</option>
                                   <?php 
                    
                                    $qry = "SELECT * FROM jenama";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        echo '<option value"'.$row["jenama_id"].'">'.$row["jenama"].'</option>';
                                    }
                
                
                                     ?>
                               </select>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Type</span>
                               <select class="form-control" name="type5" id="type5">
                                    <option value="">-- Select Type --</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Quantity</span>
                           <input type="text" class="form-control" name="quantity5" id="quantity5" />
                       </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">Insufficient</span>
                            <input type="text" class="form-control" name="insufficient5" id="insufficient5" />
                        </div>
                           <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Location</span>
                               <select class="form-control" name="location5" id="location5">
                                    <option value="">-- Select Location --</option>
                                   <?php 
                    
                                    $qry = "SELECT * FROM lokasi";
                                    $result = mysqli_query($con, $qry);
                                    while($row = mysqli_fetch_array($result)){
                                        ?>

                                    <option value="<?php echo $row["lokasi"]; ?>"><?php echo $row["lokasi"]; ?></option>
                                        <?php
                                    }
                                   ?>
                               </select>
                           </div>
                           </div>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Date</span>
                           <input type="date" class="form-control" name="date" id="date" />
                       </div>
                           <div style="margin-bottom: 25px" class="input-group">
                            <input type="hidden" name="kad_id" value="<?php echo $kad_id; ?>">
                            <span class="input-group-addon">Serial Number</span>
                            <select class="form-control" name="serial_no" id="serial_no">
                                <option value="">-- Select Serial No. --</option>
                                <option value="Cash">Cash</option>
                                
                                <?php 
                               $query = mysqli_query($con, "SELECT no_siri FROM kad_petrol") or die (mysqli_error($con));
                               while($row = mysqli_fetch_array($query)) {
                                   echo'<option value="'.$row['no_siri'].'">'.$row['no_siri'].'</option>';
                               }
                               
                               ?>
                           </select>
                       </div>
                       <div style="margin-bottom: 25px" class="input-group">
                               <span class="input-group-addon">Fuel Type</span>
                               <select class="form-control" name="fuel_type" id="fuel_type">
                                   <option value="">-- Select Fuel Type --</option>
                                   <option value="Petrol">Petrol</option>
                                   <option value="Diesel">Diesel</option>
                               </select>
                           </div>
                       <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon">Price (RM)</span>
                           <input type="text" class="form-control" name="price" id="price" />
                       </div>
                       <div style="margin-top: 10px" class="form-group">
                           <div class="col-sm-12 controls">
                               <input type="submit" id="btn_save" name="btn_save" class="btn btn-info" value="Register"/>
                            </div>
                       </div>
                    </form>
               </div>
            </div>
          </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $('#brand1').on('change',function(){
                    var jenama_id = $(this).val();
                    if(jenama_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch_delivery.php',
                            data:'jenama_id='+jenama_id,
                            success:function(html){
                                $('#type1').html(html);
                            }
                        }); 
                    }else{
                        $('#type1').html('<option value="">-- Select Type --</option>');
                    }
                });
                
                $('#brand2').on('change',function(){
                    var jenama_id = $(this).val();
                    if(jenama_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch_delivery.php',
                            data:'jenama_id='+jenama_id,
                            success:function(html){
                                $('#type2').html(html);
                            }
                        }); 
                    }else{
                        $('#type2').html('<option value="">-- Select Type --</option>');
                    }
                });
                        
                $('#brand3').on('change',function(){
                    var jenama_id = $(this).val();
                    if(jenama_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch_delivery.php',
                            data:'jenama_id='+jenama_id,
                            success:function(html){
                                $('#type3').html(html);        
                            }
                        }); 
                    }else{
                        $('#type3').html('<option value="">-- Select Type --</option>');
                    }
                });
            
                $('#brand4').on('change',function(){
                    var jenama_id = $(this).val();
                    if(jenama_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch_delivery.php',
                            data:'jenama_id='+jenama_id,
                            success:function(html){
                                $('#type4').html(html);        
                            }
                        }); 
                    }else{
                        $('#type4').html('<option value="">-- Select Type --</option>'); 
                    }
                });
            
                $('#brand5').on('change',function(){
                    var jenama_id = $(this).val();
                    if(jenama_id){
                        $.ajax({
                            type:'POST',
                            url:'fetch_delivery.php',
                            data:'jenama_id='+jenama_id,
                            success:function(html){
                                $('#type5').html(html);        
                            }
                        }); 
                    }else{
                        $('#type5').html('<option value="">-- Select Type --</option>'); 
                    }
                });
              $('input[class="form-control"]').focus(function() {
                  $(this).removeAttr('style');
              });
                $("#btn_save").click(function(e){
                    if($("#brand1").val() == ''){
                        $("#brand1").css("border-color","#DA1908");
                        $("#brand1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#type1").val() == ''){
                        $("#type1").css("border-color","#DA1908");
                        $("#type1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#quantity1").val() == ''){
                        $("#quantity1").css("border-color","#DA1908");
                        $("#quantity1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#insufficient1").val() == ''){
                        $("#insufficient1").css("border-color","#DA1908");
                        $("#insufficient1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    if($("#location1").val() == ''){
                        $("#location1").css("border-color","#DA1908");
                        $("#location1").css("background","#F2DEDE");
                        e.preventDefault();
                    }
                    
                    if($("#date").val() == ''){
                        $("#date").css("border-color","#DA1908");
                        $("#date").css("background","#F2DEDE");
                        e.preventDefault();
                    }else{
                        $('form_delivery').unbind('submit').submit();
                    }
                });
            });
    </script>

