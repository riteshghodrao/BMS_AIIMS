         
<?php
include("session.php");
include("config.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "you tried " .$_POST['radio'].";\n";
if(isset($_POST['delete'])){
  $sql = "DELETE FROM BOQ where project_id=" .$_POST["pro_name"]. " AND item_no='".$_POST["item_no"]. "';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $error="\nDelete Successful\n";
    //echo "\nDelete Successful\n";
  }
  else { //echo "\nNothing to Delete\n";
        $error="\nDeleted. Check updated BOQ.\n";
        }
}


mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

    <head>
    
    <title>Delete Item</title>
    <link type="text/css" rel="stylesheet" href="Delete_project.css">
    
    </head>
    
    
    <body>
    
    <a href="home.php"><input id="home" type="button" value="Home"></a>
        
    <a href="logout.php"> <input id="logout" type="button" value="Log Out"></a>
    <br><br><br>
        
     <form id="container" method="post" action = "delete_boq.php">
        
        <fieldset >
         
        <legend>Delete Item</legend>
            <label>Enter Project Number</label>
            <input type="text" name="pro_name" required >
            
            <br><br><br>
            
            <label>Enter Item No. to delete</label>
            <input type="text" name="item_no" required >
            
            <br><br><br>
            
            <input id="save" type="submit" value="Delete" name="delete"> 

            <div ><span style="color: red; text-align:center; font-size: 22px;"> <?php echo $error; ?></div>
            <br><br>
            <a href="select_boq.php"><input id="save" type="button" value="Check Updated BOQ" name="checkboq"></a>
        </fieldset>
         
         
     </form>
    
    </body>

</html>