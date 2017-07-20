<?php
   include('session.php');
   session_start();
  // echo $_SESSION['pro_id'];
?>



<!DOCTYPE html>
<html>

    <head>
    
    <title>Printable Format</title>
    <link type="text/css" rel="stylesheet" href="print_page.css">
    
    </head>
    
    
    <body>
       
        
        <div>
        
        <table >
  <tr>
    <th>Name of work :</th>
  
    <th>Name of the Contractor :</th>
   
  
    <th>Date and no of work order :</th>
   
    <th>Date of completion as per work order :</th>
    
    <th>Date of actual work completion	:</th>
    
    <th>On A/c :</th>
    
    
    
  </tr>
  
    <?php
$servername = "localhost";
$username = "root";
$password = "ritesh";
$dbname = "aiims_bm_dbms_3";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
} 
$sql = "SELECT * FROM Project WHERE project_id=".$_POST["radio"];



$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
   // while($row = mysqli_fetch_assoc($result)){
      $row = mysqli_fetch_assoc($result);
      echo "<tr>";
      echo "<td>". $row["name_of_work"]. "</td>";
      echo "<td>". $row["name_of_contractor"]. "</td>";
      echo "<td>". $row["date_and_number_of_work_order"]. "</td>";
      echo "<td>". $row["date_of_completion_as_per_work_order"]. "</td>";
      echo "<td>". $row["date_of_actual_work_completion"]. "</td>";
      echo "<td>". $row["on_ac"]. "</td>";
      
      echo "</tr>";
    
    
//}//end while
} else {
    //header("Location: view_project.php");
    //echo "0 results";
}



$conn->close();
?>
            
</table>

        
        </div>
        
        
    <table >
   
        
        <tr>
            <th>Item No:</th>
            <th>Item Description:</th>
            <th>Building</th>    
            <th>Floor</th>
            <th>Grid:</th>
            <th>Date Of Measurement</th>
            <th>Unit</th>
            <th>Nos(1)</th>
            <th>Nos(2))</th>
            <th>Length</th>
            <th>Breadth</th>
            <th>Height / Depth</th>
            <th>Quantity</th>
            <th>Remarks</th>
        
        </tr>
        
       
        <?php
include("config.php");

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM Project P JOIN BOQ B JOIN Floor F JOIN Building BB JOIN Room R WHERE P.project_id = B.project_id AND P.project_id=R.project_id AND R.floor_id=F.floor_id AND R.build_id=BB.build_id AND P.project_id=".$_POST["radio"].";";



$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
      echo "<tr>";
      echo "<td>". $row["item_no"]. "</td>";
      echo "<td>". $row["item_description"]. "</td>";
      echo "<td>". $row["build_name"]. "</td>";
      echo "<td>". $row["floor_name"]. "</td>";
      echo "<td>". $row["grid_no"]. "</td>";
      echo "<td>". $row["date_of_actual_work_completion"]. "</td>";
      echo "<td>". $row["unit"]. "</td>";
      echo "<td>". $row["no1"]. "</td>";
      echo "<td>". $row["no2"]. "</td>";
      echo "<td>". $row["length"]. "</td>";
      echo "<td>". $row["breadth"]. "</td>";
      echo "<td>". $row["height"]. "</td>";
      echo "<td>". $row["quantity"]. "</td>";
      echo "<td>". $row["remarks"]. "</td>";
      
      echo "</tr>";
    
    
}//end while
} else {
    //header("Location: view_project.php");
    //echo "0 results";
}



$conn->close();
?>

        
        
    </table>
    
    </body>

</html>
