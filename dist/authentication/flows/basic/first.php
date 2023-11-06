<?php
session_start();
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'myuserdata';
if(isset( $_POST['first-name'])){
//make connect to database
$connect = mysqli_connect($server, $username, $password, $database);
$fname = $_POST['first-name'];
$lname = $_POST['last-name'];
$email = $_POST['email'];
$pass = $_POST['password'];
// if(!$connect){
//     echo 'error';
// }
$insertQuery = "INSERT INTO `userdata`(`firstname`,`lastname`,`email`,`password`,`datetime`)
                VALUES('$fname','$lname','$email','$pass',current_timestamp());";
mysqli_query($connect, $insertQuery);
header("location: sign-up.html");
}
?>