<?php 
    session_start();
    
    if(!isset($_SESSION["operasi"])){
        header("location:login.php");
    }
    
    include ("../connection.php");

 ?>

<?php include ("header.php"); ?>
        <body>
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
                       <div class="panel-title">View Deliveries</div>
                    </div>
                   <div class="panel-body">
                      <table class="table table-hover table-bordered">
                          <thead>
                          <tr>
                            <th>Plat No.</th>
                            <th>Transport</th>
                            <th>Action</th>
                        </tr>
                          </thead>
                          <?php
                          
                            $qry = mysqli_query($con, "SELECT * FROM kenderaan ORDER BY kenderaan_id asc");
                        while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
                            echo '<tr>';
                            echo '<td>'.$row["no_plat"]."</td><td>".$row["kenderaan"]."</td><td width = '50%'><a href='deliveriesmanagement.php?get_id=".$row["kenderaan_id"]."' class='btn btn-success'>View Deliveries</a></td>";
                            echo '</tr>';
                        }
                        ?>
                       </table>
                    </div>
                  </div>
              </div>
        </div>
    </div>
        </body>