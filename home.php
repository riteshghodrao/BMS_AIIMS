<!DOCTYPE html>
<?php
   include('session.php');
?>
<html>

<head>
    
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    
</head>
    
<body>
    <header>
    <div id="heading">Building Measurement Database Management System</div>
        
       <a href="logout.php"> <input type="button" value="LogOut" id="logout"></a>
</header>  
    
    
    
  <div id="a" > 
   <a href="new_project.php"> <input type="button" id="new_project" value="Create New Project">
    </a>
     
  </div>
  <div id="b">
    <a href="Select_project1.php"><input type="button" id="edit_project" value="Edit Room Details"></a>  
      
    
    </div> 
    
    <div id="c">
    <a href="Select_project.php"><input type="button" id="view_project" value="View Project "></a>
    </div>
      
    <div id="c">
    <a href="loginmaster1.php"><input type="button" id="delete_project" value="Delete Project "></a>
    </div>
    
    <div id="c">
    <a href="loginmaster.php"><input type="button" id="add_user" value="Add User "></a>
    </div>  
</body>

</html>