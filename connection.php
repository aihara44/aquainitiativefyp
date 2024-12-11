<?php
// Fetch environment variables
$db_host = getenv('DB_HOST');
$db_username = getenv('DB_USER');
$db_password = getenv('DB_PASSWORD');
$db_name = getenv('DB_NAME');

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
