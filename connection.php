<?php
// Fetch environment variables
$db_host = getenv('fypbns.mysql.database.azure.com');
$db_username = getenv('fyp_admin');
$db_password = getenv('Amirhasan@990630');
$db_name = getenv('persada');

// Establish the connection
$connection = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connected successfully to MySQL database!";
}

// Your database queries go here

// Close the connection when done
$connection->close();
?>
