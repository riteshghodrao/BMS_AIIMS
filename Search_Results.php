
<?php

    $var_item_no= "";
    $var_item_name ="";
    $var_unit= "";
    $var_no1="";
    $var_no2="";
    $var_length= "";
    $var_breadth= "";
    $var_height= "";
    $var_cost = "";
    $var_quantity= "";
    $var_remarks="";
    $var_date="";

    //echo "<p style='color:white'>SELECT * FROM Room NATURAL JOIN Floor WHERE grid_no ='" .$_POST["grid_no"]. "' AND item_id ='" .$_POST["item_id"]. "' AND floor_name ='" .$_POST["slct2"]. "' AND build_id = " .$_POST["slct1"] .";</p>";
?>
<?php
   include('session.php');
?>
<?php
include("config.php");

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM Room NATURAL JOIN Floor NATURAL JOIN Building JOIN Project JOIN BOQ WHERE grid_no ='" .$_POST["grid_no"]. "' AND item_id ='" .$_POST["item_id"]. "' AND floor_name ='" .$_POST["slct2"]. "' AND build_id = " .$_POST["slct1"] .";";
    $result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
   // $var_building= $row["build_name"];
    //$var_floor= $row["floor_name"];
   // $var_grid= $row["grid_no"];
 //   $var_project= $row["name_of_work"];
  //  $var_item_no= $row["item_id"];
  //  $var_item_name =$row["item_description"];
    //$var_unit= $row["unit"];
    //$var_no1=$row["no1"];
    //$var_no2=$row["no2"];
    //$var_length= $row["length"];
   // $var_breadth= $row["breadth"];
   // $var_height= $row["height"];
    //$var_quantity= $row["quantity"];
    //$var_remarks=$row["remarks"];
     //$var_date= $row["date_mod"];///
    $var_building=$row["build_name"];
    $_SESSION["var_floor"]= $row["floor_name"];
    $_SESSION["var_grid"]= $row["grid_no"];
    $_SESSION["var_project"]= $row["name_of_work"];
    $_SESSION["var_item_no"]= $row["item_id"];
    $_SESSION["var_item_name"] =$row["item_description"];
    $_SESSION["var_unit"]= $row["unit"];
    $_SESSION["var_no1"]=$row["no1"];
    $_SESSION["var_no2"]=$row["no2"];
    $_SESSION["var_length"]= $row["length"];
    $_SESSION["var_breadth"]= $row["breadth"];
    $_SESSION["var_height"]= $row["height"];
    $_SESSION["var_quantity"]= $row["quantity"];
    $_SESSION["var_remarks"]=$row["remarks"];
     $_SESSION["var_date"]= $row["date_mod"];
    

} else {
    header("Location: view_project.php");
    echo "0 results";
}



$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    
<title>Search Results</title>
<link rel="stylesheet" type="text/css" href="Search_Results.css">

</head>
    
    <body>
    
    
    <header  >
        <nav>
            <form>
               <a href="logout.php"> <input class="logoutbtn" type="button" value="Log Out"></a>
               <a href="home.php"> <input class="homebtn" type="button" value="Home"></a>
            </form>
        </nav>
    </header>
    
        

        
        <div id="left_panel"> <!-- room details container -->
        
        
        <form id="result_container">
        
            <fieldset>
             <legend>Project Details</legend>
            <!--   <label>Name of work</label>
                <input type="text" >
                <br><br>
                
            
                <label>Name of the Contractor </label>
                <input type="text" >
                <br><br>
                
           
                <label>Date and no of work order</label>
                <input type="text" >
                <br><br>
                
           
                <label>Date of completion as per work order </label>
                <input type="text" >
                <br><br>
                
            
                <label>Date of actual work completion</label>
                <input type="text" >
                <br><br>
                 
                
                <label>On A/c </label>
                <input type="text" > -->
                
                <br><br>
                <label>Project </label>
                <output type="text"> "<?php echo $_SESSION["var_project"]; ?>"</output>
                <br><br><br><br>
                
                <label>Building </label>
                <output type="text"> "<?php echo $var_building; ?>"</output>
                
                <br><br>
                 
                
                <label>Floor </label>
                <output type="text"> "<?php echo $_SESSION["var_floor"]; ?>"</output>
                
                <br><br>
                 
                
                <label>Grid </label>
                <output type="text"> "<?php echo $_SESSION["var_grid"]; ?>"</output>
                

            
                
                
            </fieldset>
            
        </form>

        <br>
        
        <div>
        <form >
            <a href="print_page.php" target="_blank"><input type="button" class="print_btn" value="View in Printable Format"></a>  
            <br><br><br><br>
            <input type="button" class="new_room_btn" value="Add / Update Room Details"> 
        </form>
        </div>
        
        </div> <!-- room details container end-->
        
        
        
        <div>
        <form id="result_container">
            <fieldset>
            <legend>Results</legend>
                <label>Item No.</label>
                <output type="text"> "<?php echo $_SESSION["var_item_no"]; ?>"</output>
                <br><br>
                <label>Item No. Description</label>
                 <output>"<?php echo $_SESSION["var_item_name"]; ?>"</output>
                <br><br><br>
<h4 id="date">Date of Measurement</h4>
                <br><br>
                <label>Date</label>
                <output>"<?php echo $_SESSION["var_date"]; ?>"</output>
                
                <br><br><br><br>
                                
<h3 id="measurement_heading">Measurements</h3>
                <br><br>
                <label>Unit</label>
                <output>"<?php echo $_SESSION["var_unit"]; ?>"</output>
                <br><br>
                <label>Nos. (1)</label>
                <output>"<?php echo $_SESSION["var_no1"]; ?>"</output>
                <br><br>
                <label>Nos. (2)</label>
                <output>"<?php echo $_SESSION["var_no2"]; ?>"</output>
                <br><br>
                <label>Length</label>
                <output>"<?php echo $_SESSION["var_length"]; ?>"</output>
                <br><br>
                <label>Breadth</label>
                <output>"<?php echo $_SESSION["var_breadth"]; ?>"</output>
                <br><br>
                <label>Height / Depth</label>
                <output>"<?php echo $_SESSION["var_height"]; ?>"</output>
                <br><br>
                <label>Quantity</label>
                <output>"<?php echo $_SESSION["var_quantity"]; ?>"</output>
                <br><br>
                <label>Remarks</label>
                <output>"<?php echo $_SESSION["var_remarks"]; ?>"</output>
                <br><br>

                        
            </fieldset>
        </form>        
        </div>
        
    <footer>
        
    
    </footer>
    
    
    </body>

</html>
