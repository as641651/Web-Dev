<?php
//CONNECT TO DB
$servername = "shareddb-i.hosting.stackcp.net";
$username = "secretdi-333768ab";
$password = "7k8r4197sf";
$databasename = $username; //Same in eco webhosting server

$link = mysqli_connect($servername,$username,$password,$databasename);

if (mysqli_connect_error()){
  // Stop the script if connection is not established!
  die("There was an error connecting to database");
}
?>
