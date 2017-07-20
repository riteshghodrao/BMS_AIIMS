<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>

    <head>
    
    <title>Delete Project</title>
    <link type="text/css" rel="stylesheet" href="Select_project.css">
    
    </head>
    
    
    <body>
    
    <a href="home.php"><input id="home" type="button" value="Home"></a>
        
    <a href="logout.php"> <input id="logout" type="button" value="Log Out"></a>
    <br><br><br>
        
     <form id="container" method="post" action="Delete_project.php">
        
        <fieldset >
         
        <legend>Select Project</legend>
            
            <label>Select Project to Delete:</label><br><br>
            <?php
//$servername = "localhost";
//$username = "root";
//$password = "ritesh";
//$dbname = 'aiims_bm_dbms_3';
include("config.php");
// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "you tried " .$_POST['radio'].";\n";
if(isset($_POST['delete'])){
  $sql = "DELETE FROM Project WHERE Project.project_id=" .$_POST['radio'].";" ;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $error="\nDelete Successful\n";
    //echo "\nDelete Successful\n";
  }
  else { //echo "\nNothing to Delete\n";
        $error="\nNothing to Delete\n";
        }
}
$sql = "SELECT project_id, name_of_work FROM Project";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<input type='radio' value=". $row["project_id"]. " name='radio'>";
        echo "ID: " . $row["project_id"]. "  |||   " . $row["name_of_work"]. "<br><br><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
            <input id="save" type="submit" value="Delete" name="delete">
            <div ><span style="color: red; text-align:center; font-size: 22px;"> <?php echo $error; ?></div>
        </fieldset>
         
         
     </form>
    
    </body>

</html>
