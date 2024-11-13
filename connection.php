<?php
$con = mysqli_connect("fypbns.mysql.database.azure.com", "fyp_admin", "Amirhasan@990630", "persada") or die ("Cannot connect to database");
function mres ($con,$data){
    return mysqli_real_escape_string($con,rtrim(ltrim($data)));
}
?>
