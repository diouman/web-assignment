<?php
    session_start();
    include 'dbConnection.php'

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/jquery.cycle2.min.js"></script>
    <script src="js/script.js"></script>
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> -->
	
</head>
<body>
    
    
    <nav>
        <ul>
            <li><a href="product.php">Cupcakes</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="index.php" style="font-size:40px; color: #F07777;">Angel <img src="images/logo/logo3.png" style="width:50px; height:50px"> Cakes</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="loginForm.php">Login </a></li> 
         
        </ul>
    </nav>

    <form method="post" action="signIn.php">
    
    <div id="login" class="log">
        <h1>Login Here</h1>
        <table id="tbllogin">
            <tr>
                <td><p>UserName</p></td>
                <td><input type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><p>Password:</p></td>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td><button class="btnlog" type="submit" name="btnLogin">Login</button></td>
                <td><button class="btnlog" type="button" "btnclear">Clear</button></td>
            </tr>
        </table>
         
         
    
    </div>
    </form>

  
    
    <div id="or">
        <p>OR</p>    
    </div>

    <form method="post" action="signUp.php">
    
    <div id="register" class="log">
        <h1>Register Here</h1>
         <table id="tblRegister">
            
             <tr>
                <td><p>E-mail: </p> </td>
                <td><input type="email" name="email" placeholder="Email"></td>
            </tr>
             <tr>
                <td> <p>Username: </p>  </td>
                <td><input type="text" name="user" placeholder="Username"></td>
            </tr>
             <tr>
                <td> <p> Password: </p>   </td>
                <td> <input type="password" name="password1" placeholder="Enter Password"></td>
            </tr>
             <tr>
                <td> <p>Password:</p>  </td>
                <td>  <input type="password" name="password2" placeholder="Re-enter Password"></td>
            </tr>
             <tr>
                <td><button class="btnlog" type="submit" name="btnRegister">Register</button></td>
                <td><button class="btnlog" type="button" "btnclear">Clear</button></td>
            </tr>
        </table>
        
         
        
        
        
       
      
        
    
    </div>

    </form>
    
    
	

</body>
</html>