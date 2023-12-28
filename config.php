<?php


$servername = "localhost";
$username = "root";
$dbPassword = "";
$DB = "recruitment";



$conn = new mysqli($servername, $username, $dbPassword,$DB);



if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

?>