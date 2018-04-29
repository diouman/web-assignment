<?php
session_start();
include('dbConnection.php');

if (isset($_GET['chk_item_id'])) {
   $date=date('y-m-d h:i:s');
   $randNum = mt_rand();

   if (isset($_SESSION['ref'] )) {
       
   } else {
        $_SESSION['ref'] = $date.'_'.$randNum;
   }
   
   
   $chkSql = "INSERT INTO checkout (chkItem,chkRef,chkTiming,qty) VALUES ('$_GET[chk_item_id]',
   '$_SESSION[ref]','$date',1)";
   

   if ( $con->query($chkSql)) {
       ?> <script>window.location = "cart.php" ;           
      
       </script> <?php 
   }

}




if (isset($_POST['order_submit'])) {

   
    $name = mysqli_real_escape_string($con,strip_tags($_POST['name']));
    $email = mysqli_real_escape_string($con,strip_tags($_POST['email'])) ;
    $contactNum = mysqli_real_escape_string($con,strip_tags($_POST['contactNum']));
    $town = mysqli_real_escape_string($con,strip_tags($_POST['town']));
    $district = mysqli_real_escape_string($con,strip_tags($_POST['district'])) ;

    

    $order_sql = "INSERT INTO orders (o_name,o_contact,o_district,o_town,o_email,o_checkout_ref,o_total) VALUES('$name','$contactNum','$district','$town','$email','$_SESSION[ref]','$_SESSION[grand_total]')";
echo $_SESSION['ref'];

    if (mysqli_query($con,$order_sql)) {
        ?><script>  
            alert("Form Submitted Successfully");
            window.location.href = "cart.php";
        </script><?php
    }
    else{
        ?> <script>alert("Failed To Submit Form");</script><?php
    }
    
}

if (isset($_POST['btncreditpay'])) {

    $cardName = mysqli_real_escape_string($con,strip_tags($_POST['cardName'])) ;
    $cardNumber = mysqli_real_escape_string($con,strip_tags($_POST['creditNumber'])) ;
    $date = mysqli_real_escape_string($con,strip_tags($_POST['expirydate'])) ;
    $cvv = mysqli_real_escape_string($con,strip_tags($_POST['cvv'])) ;

    $sql_pay = "INSERT INTO payment (pay_name,credit_num,expiryDate,cvv_num,total,ref) VALUES ('$cardName','$cardNumber','$date','$cvv','$_SESSION[grand_total]','$_SESSION[ref]')";
    echo $_SESSION['ref'];

    if (mysqli_query($con,$sql_pay)) {
        ?><script>  
            alert("Payment Done Successfully");
            window.location.href = "receipt.php";

        </script><?php
    }
    else{
        ?> <script>alert("Failed To Make Payment");</script><?php
    }


}







?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
    
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/jquery.cycle2.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> -->
    <script type="text/javascript">


        
        function ajax_func() {
            
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById('get_processd_data').innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','cart_process.php',true);
            xmlhttp.send();
           
        }

        function up_chk_qty(chk_qty,chk_id){
           
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById('get_processd_data').innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','cart_process.php?up_chk_qty='+chk_qty+'?up_chk_id='+chk_id,true);
            xmlhttp.send();
        }

        function del_func(chk_id){
           
        var $id = chk_id;
    
           xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById('get_processd_data').innerHTML = xmlhttp.responseText;
                }

            }

            xmlhttp.open('GET','cart_process.php?'+chk_id,true);
            xmlhttp.send();
            
        }

        function pay_func(){
            
           xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById('makepayment').innerHTML = xmlhttp.responseText;
                }

            }

            xmlhttp.open('GET','pay_total.php?'+chk_id,true);
            xmlhttp.send();
            
        }

    </script>
	
</head>
<body onload="ajax_func()">
    
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



    <div class ="cartContainer">
        <div class="page-header">            
            <h2>Checkout</h2>
        </div>
        <div class="panel">
            <div class="panel-heading">Order Detail</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.no</th>  
                            <th>Item</th> 
                            <th>Quantity</th> 
                            <th>Price</th>     
                            <th>Subtotal</th>  
                            <th>Delete</th>                           
                            
                        </tr>
                    </thead>
                    <tbody id="get_processd_data">
                 
                    </tbody>
                </table>

               <!--  <div class="panel-heading">Order Summary</div>

                <table class="table" id="tblsummary"> --> 
                   
                <div style="margin-left:825px;">                     
                     <button  class="btnlog btnProceed ">Shipping Info</button>
                     <button class="btnpayment btnlog" onclick="pay_func()">Payment</button>
                </div>
             
             
               
            </div>
        </div>

    </div>


   

    <form  method="post" action="cart.php">

    <div class="showshipping">
        <div class="overlay"></div>
        <div class="modal_content">
            <span>x</span>
            <!-- <div class="modal_header">Modal Header</div> -->
            <div class="modal_body">

                    <form>

                    <fieldset id="shippingFieldset" ><legend>Shipping Information</legend>
                        <table id="tblshipping">
                            <tr>
                                <td><p>Full Name:</p></td>
                                <td><input type="text" name="name" placeholder="Full Name"></td>
                            </tr>
                            <tr>
                                <td><p>Contact Number</p></td>
                                <td><input type="text" name="contactNum" placeholder="Contact Number"></td>
                            </tr>
                            <tr>
                                <td><p>District</p></td>
                                <td><select name="district" style="width: 200px; height: 30px;border-radius: 25px;margin-left: 10px;">
                                      <option selected disabled hidden>Choose District</option>   
                                      <option value="blackriver">Black River</option>
                                      <option value="flacq">Flacq</option>
                                      <option value="granport">Grand Port</option>
                                      <option value="moka">Moka</option>
                                      <option value="pamplemousses">Pamplemousses</option>
                                      <option value="plaineswilhems">Plaines-Wilhems</option>
                                      <option value="portlouis">Port-Louis</option>
                                      <option value="riviereduremport">Rivière du Rempart</option>
                                      <option value="savanne">Savanne</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Town:</p> </td>
                                <td><input type="text" name="town" placeholder="Town"></td>
                            </tr>
                            <tr>
                                <td><p>E-mail Address</p></td>
                                <td><input type="email" name="email" placeholder="E-mail" ></td>
                            </tr>
                            <tr>
                                <td colspan="2"><button style="width: 100%; margin-right: 20px;" class="btnlog"  type="submit" name="order_submit">Submit</button></td>
                            </tr>

                        </table>
                    </fieldset>
                    </form>
                </div>
                
            </div>

         
            
        </div>                    
   

    </form>

    <form action="cart.php" method="post">

    <div class="showPayment">
        <div class="overlay"></div>
        <div class="paymentContent" style="width: 40%">
            <span>x</span>
            <div class="paymentBody" id="makepayment">
                
                   <div><h1 style="text-align: center;font-family: 'Courgette'; padding-top: 20px">Credit Card Payment</h1></div>
                    <fieldset id="payfieldset"><legend>Payment</legend>
                    <?php 

                        echo "
                            <table style='width: 100%'>
                            <tr>
                                <td><p>Cardholder Name: </p></td>
                                <td><input type='text' name='cardName' placeholder='CardholderName'></td>
                            </tr>
                             <tr>
                                <td><p>Credit Card Number: </p></td>
                                <td><input type='text' name='creditNumber' placeholder='Credit Card Number'></td>
                            </tr>
                             <tr>
                                <td><p>Expiry Date: </p></td>
                                <td><input type='date' name='expirydate' ></td>
                            </tr>
                             <tr>
                                <td><p>CVV Number: </p></td>
                                <td><input type='text' name='cvv' placeholder='CVV Number'><a style='font-size:15px;' href='https://www.cvvnumber.com/cvv.html'>(Help)</a></td>
                            </tr>
                            <tr>
                               
                                <td colspan='2'><button style='width: 50%; height:30px; margin-left: 100px' class='btnlog btnpay'  type='submit' name='btncreditpay'>Pay Rs: $_SESSION[grand_total]</button></td>
                            </tr>
                        </table>

                        ";

                    ?>
                         
                    </fieldset>
                          
            </div>
        </div>                
    </div>

    </form> 



    
   
    
    
	

</body>
</html>