<?php
session_start();
include('dbConnection.php');

if (isset($_GET['chk_item_id'])) {
   $date=date('y-m-d h:i:s');
   $randNum = mt_rand();

   if(isset($_SESSION['ref'])){

   }else{
    $_SESSION['ref'] = $date.'_'.$randNum;

}
   $chkSql = "INSERT INTO checkout1 (chkItem,chkRef,chkTiming) VALUES ('$_GET[chk_item_id]',
   '$_SESSION[ref]','$date')";
   $result = $con->query($chkSql);

    

}

?>