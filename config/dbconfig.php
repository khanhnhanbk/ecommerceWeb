<!-- connect db -->
<?php
$host = "localhost";
$username = "root";
$password = "123";
$database = "phpecom";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    // echo "Connected successfully";
}