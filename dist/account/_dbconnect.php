<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'myuserdata';
//make connect to database
$connect = mysqli_connect($server, $username, $password, $database);
//   check connection 
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>