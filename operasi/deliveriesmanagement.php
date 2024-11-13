<?php
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    include ("../connection.php");

    $kenderaan_id = "";
    $plat_no = "";
    
    if(isset($_GET["get_id"])){
        $qe = mysqli_query($con, "SELECT kenderaan_id, no_plat, nombor_id_kenderaan, saiz_tayar, tahun FROM kenderaan WHERE kenderaan_id='".mres($con, $_GET["get_id"])."'");
        while($row=mysqli_fetch_array($qe,MYSQLI_ASSOC)){
            $kenderaan_id = $row["kenderaan_id"];
            $plat_no = $row["no_plat"];
            $transport_id = $row["nombor_id_kenderaan"];
            $tyre = $row["saiz_tayar"];
            $date = $row["tahun"];

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
              <div class="col-lg-12">
              <div class="well">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Delivery Log</div>
                      <div class="panel-body">
                          <div class="well">
                           <h3 style="text-align: center">Vehicle Identification Information</h3>
                            <div style="margin-bottom: 25px" class="input-group">
                                <input type="hidden" name="kenderaan_id" value="<?php echo $kenderaan_id; ?>">
                                <span class="input-group-addon">Plat No.</span>
                                <input type="text" class="form-control" name="plat_no" id="plat_no" value="<?php echo $plat_no; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Vehicle Identification Number</span>
                                <input type="text" class="form-control" name="transport_id" id="transport_id" value="<?php echo $transport_id; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Tire Size</span>
                                <input type="text" class="form-control" name="tyre" id="tyre" value="<?php echo $tyre; ?>" readonly>
                           </div>
                           <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">Vehicle Year</span>
                                <input type="date" class="form-control" name="date" id="date" value="<?php echo $date; ?>" readonly>
                           </div>
                       </div> 
                        <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Plat No.</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Insufficient</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Fuel Serial No.</th>
                            <th>Petrol Type</th>
                            <th>Price (RM)</th>
                        </tr>
                            </thead>
                            <tbody>
                       <?php
                        $qry = "";
                        
                        $qry = mysqli_query($con, "SELECT * FROM penghantaran WHERE no_plat='".$plat_no."' ORDER BY penghantaran_id desc");   
                        while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
                            ?>
                            <tr>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['no_plat'] ?></td>
                                <td><?php echo $row['jenama_1'] ?></td>
                                <td><?php echo $row['jenis_1'] ?></td>
                                <td><?php echo $row['kuantiti_1'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_1'] ?></p></td>
                                <td><?php echo $row['lokasi_1'] ?></td>
                                <td><?php echo $row['tarikh'] ?></td>
                                <td><?php echo $row['no_siri'] ?></td>
                                <td><?php echo $row['petrol'] ?></td>
                                <td>RM<?php echo $row['harga'] ?></td>
                            </tr>
                            <tr>
                                <td> - </td>
                                <td> - </td>                            
                                <td><?php echo $row['jenama_2'] ?></td>
                                <td><?php echo $row['jenis_2'] ?></td>
                                <td><?php echo $row['kuantiti_2'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_2'] ?></p></td>
                                <td><?php echo $row['lokasi_2'] ?></td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td> - </td>
                                <td> - </td>
                                <td><?php echo $row['jenama_3'] ?></td>
                                <td><?php echo $row['jenis_3'] ?></td>
                                <td><?php echo $row['kuantiti_3'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_3'] ?></p></td>
                                <td><?php echo $row['lokasi_3'] ?></td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td> - </td>
                                <td> - </td>
                                <td><?php echo $row['jenama_4'] ?></td>
                                <td><?php echo $row['jenis_4'] ?></td>
                                <td><?php echo $row['kuantiti_4'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_4'] ?></p></td>
                                <td><?php echo $row['lokasi_4'] ?></td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td> - </td>
                                <td> - </td>
                                <td><?php echo $row['jenama_5'] ?></td>
                                <td><?php echo $row['jenis_5'] ?></td>
                                <td><?php echo $row['kuantiti_5'] ?></td>
                                <td><p style="color: red; font-weight: bold;"><?php echo $row['baki_5'] ?></p></td>
                                <td><?php echo $row['lokasi_5'] ?></td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                            </tbody>
                            <?php
                        }
                        ?>
                </table>
                        </div>
                    </div>
              </div>
        </div>
    </div>
</div>
        