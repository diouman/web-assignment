<?php
	session_start();
	include('dbConnection.php');

	if (isset($_SESSION['user'])) {
		$premuim_sql = "SELECT * FROM credential WHERE custId = '$_SESSION[user]'";
		$premium_run = mysqli_query($con,$premuim_sql);

		$premiun_row=mysqli_fetch_assoc($premium_run) ;
	}else{
		?><script type="text/javascript">alert("Login")</script> <?php
		
	}
	

?>



<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
</head>
<body>
	<?php if ($premiun_row->premium):?>
			<p>You are a Premium</p>
	<?php else: ?>
			<p>You are not a premium. <a href="premium.php">Go To Premium</a>
	<?php endif;?>
		
</body>
</html>