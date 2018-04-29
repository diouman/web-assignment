<?php
session_start();

include('dbConnection.php');

$sqlFeatured = "SELECT * FROM product WHERE isFeatured = 1 ";
$_run_featured = mysqli_query($con,$sqlFeatured);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/jquery.cycle2.min.js"></script>
    <script src="js/script.js"></script>
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> -->
     <script type="text/javascript">
      function addtocart(){
        alert("Please Login Before Commiting any Transaction");
      }

    </script>
	
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
                        echo "<img src='images/cart/Basket-512.png' style='width:50px; height:50px; float: right; margin-right: 10px;'/>";
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

    <div id="slider_container">
        <div id="slideshow" class="cycle-slideshow"
            data-cycle-fx = "fade"
            data-cycle-speed = "600"
            data-cycle-timeout = "3000"
            data-cycle-pager = "#pager"
            data-cycle-pager-template = "<a href='#'
            ><img src='{{src}}' height=100 width=150/
            ></a> "
            data-cycle-next = "#next"
            data-cycle-prev = "#prev">
            <img  src="images/slide/slide1.jpg">
            <img  src="images/slide/slide2.jpg">
            <img  src="images/slide/slide3.jpg">
            <img  src="images/slide/slide4.jpg">
            <img  src="images/slide/slide5.jpg">
        </div>
        <div id="pager"></div>
        <img id="next" src="images/nav/next.png">
        <img id="prev" src="images/nav/prev.png">

    </div>

    <div id="promo">
        <div><h1>Featured Cupcakes</h1></div>

         <?php while($row = $_run_featured->fetch_assoc())
            
              :?>
            <?php $discountedPrice = $row['price'] - $row['discountedPrice'];?>
            <fieldset id="featuredSet"><legend><?php { echo $row['name'];}
                    $id = $row['prodId'];?></legend>
            <div id="featured" class="featureImg">
                <?php echo "<img src='".$row['photo']."'/>"; ?>
                <p class="id"><?php echo $id;?></p>
                <p id="normalPrice">Rs: <?php echo $row['price'];?></p>
                <p>Rs: <?php echo $discountedPrice;?></p>
            </div>
        </fieldset> 

        <?php endwhile ?>  
        
    </div>

        <div class="show">
            <div class="overlay"></div>       

               <div class='imgShow'>
                    <span>X</span>
                    <img src=''>
                    <div id='descriptonFeaured'>
                        <h1 ></h1>   
                        <!-- <p></p>
                        <p></p>   -->      
                    </div>

                    <!-- <a></a> -->

                </div>
           
        </div>


        
        
    
    
	

</body>
</html>