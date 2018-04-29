<?php
session_start();

include('dbConnection.php');


$username = $_POST['username'];
$password = $_POST['password'];



	$sql = "SELECT * FROM credentials WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($con,$sql);
	

	if (!$row = $result->fetch_assoc()) {
		echo "Your username or password is incorrect!";
	} else {
		$_SESSION['user'] = $row['username'];
		header("Location: index.php");
	}
	



?>