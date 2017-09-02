<?php
// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$dbcon = mysqli_select_db('users');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!$dbcon){
  die("Database connection failed " . mysqli_connect_error());
}
?>
