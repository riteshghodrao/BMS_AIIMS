<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>

    <head>
    
    <title>View BOQ</title>
    <link type="text/css" rel="stylesheet" href="view_boq1.css">
    
    </head>
    
    
    <body>
    
    <header id="header" >
        <nav>
            <form>
              
                
                 <a href="home.php"><input class="home_btn" type="button" value="Home"></a>
            </form>
        </nav>
    </header>
    <br><br><br>
        
     <a href="Select_project2.php"><input id="new_item" type="button" class="new" value="Add New Item"> </a>
     <a href="delete_boq.php"><input id="new_item" type="button" class="new" value="Delete Existing Item"> </a>



    <table>
    <caption>BOQ</caption>
        
        <tr>
        
            <th>Item No.</th>
            <th>Item Description</th>
            <th>Remarks</th>
            <th>Unit</th>
            <th>Rate (INR)</th>
        
        </tr>
        <?php
include("config.php");
// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM BOQ WHERE project_id ='" .$_POST["radio"]. "';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>". $row["item_no"]. "</td>";
        echo "<td>". $row["item_description"]. "</td>";
        echo "<td>". $row["Remarks"]. "</td>";
        echo "<td>". $row["unit"]. "</td>";
        echo "<td>". $row["rate"]. "</td>";
      //  echo "<input type='radio' value=". $row["project_id"]. " name='radio'>";
        echo "</tr>";
    }
} else {
    echo "\n 0 results\n";
}

mysqli_close($conn);
?>
           
        </fieldset>
        
        
    </table>
    
    </body>

</html>
