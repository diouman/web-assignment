<?php
$user = "root";
$password = "";
$server = "localhost";
$database = "newangelcakes";

$con=mysqli_connect($server,$user,$password,$database);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>