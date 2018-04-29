<?php
session_start();
include('dbConnection.php');

					if (isset($_REQUEST['$id'])) { 
                            $id = $_REQUEST['$id'];

                        ?><script type="text/javascript">alert("fsdf")</script> <?php
							
							$_del_sql ="DELETE FROM checkout WHERE chkId = '$_REQUEST[$id]'";
							$_del_run = mysqli_query($con,$_del_sql);
                            // $_del_row = mysqli_fetch_assoc($_del_run);
						}

					if (isset($_REQUEST['up_chk_qty'])) {
						$_qty_sql = "UPDATE checkout SET qty = '$_REQUEST[up_chk_qty]'  ";
						$_qty_run = mysqli_query($con,$_qty_sql);
					}
		



                        $c = 1;
                        // $sellSql="SELECT * FROM checkout WHERE chkRef = '$_SESSION[ref]' ";
                        $sellSql2="SELECT * FROM checkout c JOIN product p ON c.chkItem=p.prodId WHERE chkRef = '$_SESSION[ref]'  ";
                        // $runSell = mysqli_query($con,$sellSql);
                        $runSell2 = mysqli_query($con,$sellSql2);

                        $total = 0;
                        $subtotal =0;
                        $delivery_charges = 0;
                        $grand_total = 0;
                        while ($sellrows = mysqli_fetch_assoc($runSell2)){

                        	$_SESSION['subtotal']=$subtotal = $sellrows['qty'] * ($sellrows['price']-$sellrows['discountedPrice']);
                        	
                        	$_SESSION['total']=$total = $total + $subtotal;
                        	$_SESSION['deliveryCharge']=$delivery_charges = $sellrows['deliveryCharge'];
                            
                            echo "
                                  <tr>
                                    <td>$c</td>
                                    <td>$sellrows[name]</td>";?>
                                    <td><input min=1 name="qty" style="width:50px;" onblur="up_chk_qty(this.value,'<?php echo $sellrows['chkId'];?>');" value='<?php echo $sellrows['qty'];?>' type='number'></td>
                                   <?php echo"<td>$sellrows[price]</td>
                                    <td>$subtotal</td>";?>
                                    <td><button onclick="del_func(<?php echo $sellrows['chkId'] ?>);">Delete</button></td>
                                    <td><p id="id"><?php echo $sellrows['chkId'] ?><p></td>
                            <?php echo " </tr>
                            ";
                            $c++;
                        }

                        $_SESSION['grand_total'] =$grand_total = $total +$delivery_charges;
                        
                        echo "
                        	</tbody>
				                </table>

				                <div class='panel-heading'>Order Summary</div>

				                <table class='table' id='tblsummary'>
				                    
				                    <tbody>
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

				                    </tbody>
				                </table>



                        ";



                       

?>