<?php
include("session.php");
?>

<!DOCTYPE html>
<html>

    <head>
    
    <title>Select Project</title>
    <link type="text/css" rel="stylesheet" href="Select_project.css">
    
    </head>
    
    
    <body>
    
    <a href="home.php"><input id="home" type="button" value="Home"></a>
        
    <a href="logout.php"> <input id="logout" type="button" value="Log Out"></a>
    <br><br><br>
        
     <form id="container" method="post" action="print_page1.php">
        
        <fieldset >
         
        <legend>Select Project</legend>
            
            <label>Select Project to Open</label><br><br>
            <?php
include("config.php");

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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
            <input id="save" type="submit" value="Open">
        </fieldset>
         
         
     </form>
    
    </body>

</html>