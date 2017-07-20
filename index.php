<?php 

include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
        $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['myusername'];
         $_SESSION['login_user'] = $myusername;
         $error ="a";
         header("location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   } 
         ?>

<!DOCTYPE html>

<html>
<head>

<title>Login Page</title>

<link rel="stylesheet" href="style.css" type="text/css">


</head>

<body>
<header class="headerimage">
 
    <div>
    
        <img src="top_logo.png";>
        
    </div>

</header>
  
    <h1 class="mainheading">Building Measurement Database Management System</h1>
    
<div class="body-content">
  <div class="module">
<!--    <h1>Login</h1> -->
    <form class="form" action="" method="post">

      <input type="text" placeholder="User Name" name="username" required />
     
      <input type="password" placeholder="Password" name="password" required />
      
      <input type="submit" value="Login" class="btn btn-block btn-primary" name="login" />
    </form>
    <div style = "font-size:25px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
  </div>
</div>
<footer style="text-align: center; align-content: center; font-size:12px">
    <p>Developed by: BITS Pilani Goa Campus</p>
    <p>Email: ritesh.ghodrao@gmail.com</p>
    </footer>
</body>

</html>
