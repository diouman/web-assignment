<?php
session_start();
include('dbConnection.php');

// $_receipt_sql = "SELECT * FROM checkout c INNER JOIN orders o ON c.chkRef=o.o_checkout_ref INNER JOIN product p ON c.chkItem = p.prodId WHERE c.chkRef = '$_SESSION[ref]'";
// $_receipt_run = mysqli_query($con,$_receipt_sql);

$sellSql2="SELECT * FROM checkout c INNER JOIN product p ON c.chkItem=p.prodId INNER JOIN orders o ON o.o_checkout_ref = c.chkRef   WHERE chkRef = '$_SESSION[ref]'  ";
                        // $runSell = mysqli_query($con,$sellSql);
                        $runSell2 = mysqli_query($con,$sellSql2);


                       $_SESSION['total']= $total = 0;
                       $_SESSION['subtotal']= $subtotal =0;
                       $_SESSION['deliveryCharge']= $delivery_charges = 0;
                       $_SESSION['grand_total']=$grand_total = 0;



?>


<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
	
</head>
<body>



	<table class="table">
		<thead>
			<tr>
				<th>Product No</th>
				<!-- <th>CustomerName</th> -->
				<th>Items</th>
				<th>Price</th>
				<th>Discounted Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>

				
			</tr>
		</thead>
		<tbody>
		<?php
		$c = 1;
			 while ($sellrows = mysqli_fetch_assoc($runSell2)){
			 				$_SESSION['custName'] = $sellrows['o_name'];
			 				$_SESSION['address'] =$sellrows['o_town'].' '.$sellrows['o_district'];

                        	$_SESSION['subtotal']=$subtotal = $sellrows['qty'] * ($sellrows['price']-$sellrows['discountedPrice']);
                        	
                        	$_SESSION['total']=$total = $total + $subtotal;
                        	$_SESSION['deliveryCharge']=$delivery_charges = $sellrows['deliveryCharge'];
                            
                            echo "
                                  <tr>
                                    <td>$c</td>
                                    <td>$sellrows[name]</td>
                                    <td>$sellrows[price]</td>
                                   	<td>$sellrows[discountedPrice]</td>
                                   	<td>$sellrows[qty]</td>
                                    <td>$subtotal</td>";?>
                                    
                                    
                            <?php echo " </tr>
                            ";
                            $c++;
                        }
		 ?>
			
		</tbody>
	</table>
	<br><br>
	<table>
				                    
		<tbody>

		<?php
		 $_SESSION['grand_total'] =$_SESSION['total'] + $_SESSION['deliveryCharge'];

			echo "
				<tr>
				<td>Total</td>
				<td class='tblsummarydata'><b>$total</b></td>
				</tr>
				<tr>
					<td>Delivery Charges</td>
					<td class='tblsummarydata'><b>$delivery_charges</b></td>
				</tr>
				<tr>
					<td>Grand Total</td>
					<td class='tblsummarydata'><b>$_SESSION[grand_total] </b></td>
				</tr>



			";


		 ?>
			
		</tbody>
	</table class="table">
	<h1>Customer Name: <?php 					
							echo $_SESSION['custName'];
					  ?> </h1>
	<h1>Delivery Address: <?php 					
							echo $_SESSION['address'];
					  ?> </h1>

	<div><h1>Paid</h1></div>
	<button onclick="location.href='index.php'">Go Back</button>

</body>
</html>