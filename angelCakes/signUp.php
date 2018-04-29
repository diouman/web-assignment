<?php
session_start();

include('dbConnection.php');

$email = $_POST['email'];
$username = $_POST['user'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];

if ($pass1 == $pass2) {
	$sql = "INSERT into credentials (email,username,password) VALUES ('$email','$username','$pass1')";
	$result = $con->query($sql);

} else {
	echo "Re-enter Password";
}

$sql1 = "SELECT * FROM credentials WHERE username = '$username' AND password = '$pass1'";
$result1 = mysqli_query($con,$sql1);
	

	if (!$row = $result1->fetch_assoc()) {
		echo "You are not registered";
	} else {
		$_SESSION['user'] = $row['username'];
		
		header("Location: index.php");
	}
	


?>