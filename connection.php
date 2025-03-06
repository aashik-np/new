<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "school_db";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    echo '<script>alert(' . json_encode("Connection failed: " . mysqli_connect_error()) . ');</script>';
    exit;
}
?>