
<?php
$servername = "localhost";
$dbname = "students_info";
$username = "root";
$password = "";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$connect) {
  die("Connection failed: ");
}


?>