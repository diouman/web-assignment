<?php
session_start();
include('dbConnection.php');

		  echo "

		  					<div><h1 style='text-align: center;font-family: 'Courgette'; padding-top: 20px;'>Credit Card Payment</h1></div>
                    		<fieldset id='payfieldset'><legend>Payment</legend>	


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