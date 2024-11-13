<?php 	

$localhost = "fypbns.mysql.database.azure.com";
$username = "fyp_admin";
$password = "Amirhasan@990630";
$dbname = "persada";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
