<?php 

$serverName = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'pay-a-pal';

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
  die("Could not connect to Database!" . mysqli_connect_error());
}