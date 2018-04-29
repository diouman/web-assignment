<?php
session_start();

include('dbConnection.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/jquery.cycle2.min.js"></script>
    <script src="js/script.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	
</head>
<body>
    
   
     <nav>
        <ul>
            <li><a href="product.php">Cupcakes</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="index.php" style="font-size:40px; color: #F07777;">Angel <img src="images/logo/logo3.png" style="width:50px; height:50px"> Cakes</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li id="user">
              <?php
                    if(isset($_SESSION['user'])){
                        echo $_SESSION['user'];                        
                    }else{
                        echo "<a href='loginForm.php'>Login</a>";
                    }

                ?></li>
            </a></li>
            <li ><a href="cart.php">
                <?php
                    if(isset($_SESSION['user'])){
                        echo "<img src='images/cart/Basket-512.png' style='width:75px; height:75px; float: right; margin-right: 10px;'/>";
                    }
                ?></a></li>
           
        </ul>



        <form action='logout.php'>
            <?php
                    if(isset($_SESSION['user'])){
                        echo "<button id='btnLogout'>Logout</button>";
                    }
                ?>

        </form>
        
        
    </nav>
    
    
	

</body>
</html>