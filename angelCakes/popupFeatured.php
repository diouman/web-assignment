<?php
session_start();
include('dbConnection.php');

 if (isset($_POST['id'])) { 

     $sql1 = "SELECT * from product WHERE prodId = '$_POST[id]'";
     $run = mysqli_query($con,$sql1);
     $rows = mysqli_fetch_assoc($run);

     $discountedPrice = $rows['price'] - $rows['discountedPrice'];
	echo "<div><h1 id='prodname'>$rows[name]</h1>
		  <p id='prodPrice' style='text-decoration: line-through;'>Rs: $rows[price]</p>";?>
		  <p style="font-family: 'Courgette'; text-align:center; font-size:50px;color:deeppink;">Rs: <?php echo $discountedPrice;?></p>
		 <?php echo " <p id='prodDesc'>$rows[description]</p>
		  </div>";?>
		  

		  <?php 
		  	if(isset($_SESSION['user'])){
		  		echo "<a  id='addtocart' href='cart.php?chk_item_id=$rows[prodId]'>Add to Cart</a>";
		  	}

		  	else{
		  		echo "<button onclick='addtocart()' id='addtocart' >Add to Cart</button>";

		  	}

		  	
		  		

		
		  

	

  }                     
                    
            

?>