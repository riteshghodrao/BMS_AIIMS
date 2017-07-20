<?php 
include("session.php");
include("config_tp.php");
session_start();

      
      $myusername = $_POST["username"];
      $mypassword = $_POST["password"];
      //echo "$myusername and $mypassword";
        
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($myusername=='admin' && $mypassword=='adminpassword') {
         $_SESSION['myusername'];
         $_SESSION['login_user'] = $myusername;
         $error ="a";
         header("location: Delete_project.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
         ?>

<!DOCTYPE html>

<html>
<head>

<title>Login Page</title>

<link rel="stylesheet" href="style.css" type="text/css">


</head>

<body>
  <header id="header" >
        <nav>
            <form>
               <a href="logout.php"> <input class="logoutbtn" type="button" value="Log Out"></a>
                
                 <a href="home.php"><input class="home_btn" type="button" value="Home"></a>
            </form>
        </nav>
    </header>

    <h1 class="mainheading">Admin Login</h1>
    
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

</body>

</html>