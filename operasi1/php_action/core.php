<?php 

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['operasi']) {
	header('location: http://localhost/aquainitiative/operasi1/index.php');	
} 



?>