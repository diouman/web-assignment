<?php
session_start();

include('dbConnection.php');

$sql = "SELECT * FROM product WHERE isFeatured = 0 ";
$result = mysqli_query($con,$sql);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
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

     <div id="search"><p>Search<input type="search" name="search" id="search" placeholder="Search by Product Name""></p></div>

     <div id="search_result"></div>

  

    <div id="Wrapper">
        <div id="productWrapper">

              <?php while($row = $result->fetch_assoc())
              :?>

              <fieldset id="productFieldset"><legend><?php { echo $row['name'];}
                    $id = $row['prodId'];
               ?></legend>
                <div  class="product cakes">
                 <?php echo "<img src='".$row['photo']."'/>"; ?>
                 <p class="id"><?php echo $id;?></p>

                  <div class="div_price"><p id="price">Rs: <?php echo $row['price'];?></p></div>
                  
                </div>

              </fieldset>

             <?php endwhile ?> 

        </div>
          <a id="prevThumb" href="javascript: void(0)"><button class="btnNav">&#9664;</button></a>
          <a id="nextThumb" href="javascript: void(0)"><button class="btnNav">&#9654;</button></a>
        </div> 

       

        <div class="show">
            <div class="overlay"></div>       

               <div class='imgShow'>
                    <span>X</span>
                    <img src=''>
                    <div id='descripton'>
                        <h1 id="prodname"></h1>   
                        <!-- <p></p>
                        <p></p>   -->      
                    </div>

                    <!-- <a></a> -->

                </div>
           
        </div>

     

    
       


</body>
</html>