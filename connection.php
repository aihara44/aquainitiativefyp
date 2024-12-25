<?php
$host = getenv('AZURE_MYSQL_HOST');
$username = getenv('AZURE_MYSQL_USER');
$password = getenv('AZURE_MYSQL_PASSWORD');
$database = getenv('Azure_MYSQL_DBNAME');
$port = int(getenv('AZURE_MYSQL_PORT'));
# $flag = getenv('AZURE_MYSQL_FLAG');

$conn = mysqli_init();
# mysqli_ssl_set($conn,NULL,NULL,NULL,NULL,NULL);
mysqli_real_connect($conn, $host, $username, $password, $database, $port, NULL);

if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

echo 'Connected successfully to MySQL database!';
mysqli_close($conn);
?>
