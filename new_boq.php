<?php
    include('session.php');
   $error="Please make a valid entry.\n";
   
   
?>
<?php
    $temp=$_POST['radio'];
   session_start();
   if(!empty(temp)){
   $_SESSION['radio1']=$_POST['radio'];}

         if(isset($_POST['save'])) {
            include("config.php");
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
               $var_item_no =$_POST['item_no'];
               $var_item_description= $_POST['item_description'];
               $var_unit=$_POST['unit'];
               $var_rate=$_POST['rate'];
               $var_project_id= $_POST['project_id'];
               $var_remarks=$_POST['remarks'];
               
            
            $sql = "INSERT INTO BOQ ". "(project_id, item_no, item_description,unit, rate, Remarks) ". "VALUES($var_project_id, '$var_item_no', '$var_item_description', '$var_unit',$var_rate,'$var_remarks');";
               
           // mysql_select_db('aiims_bm_dbms_3');
            $retval = mysqli_query( $conn, $sql );
            
            if(! $retval ) {
               $error = "could not enter data\n";
              die('Could not enter data: ' . mysql_error());
            }
            
            $error= "Entered data successfully\n";
            
            mysql_close($conn);
         }else {}
            ?>
<!DOCTYPE html>
<html>

    <head>
    
    <title>Add New Item</title>
    <link type="text/css" rel="stylesheet" href="NEW_BOQ.css">
    
    </head>
    
    
    <body>
    
    <a href="home.php"><input id="home" type="button" value="Home"></a>
        
     <a href="logout.php"><input id="logout" type="button" value="Log Out"></a>
    <br><br><br>
        
     <form id="container" action="new_boq.php" method="post">
        
        <fieldset >
         
        <legend>Add New Item</legend>
            <?php echo "<p style='color:white'>You are currently using Project ID : ".$_SESSION['radio1']. "</p>\n"; ?>
            <br><br><br>
            <label>Project ID</label>
            <input type="text" name="project_id" required >
            <br><br>
            <label>Item No.</label>
            <input type="text" name="item_no" required >
            <br><br>
            <label>Item Description</label>
            <textarea name="item_description" required></textarea>
            <br><br><br>
            <label>Unit</label>
            <input type="text" name="unit" required>
            <br><br>
            <label>Rate (INR)</label>
            <input type="number" name="rate" required>
            <br><br>
            <label>Remarks</label>
            <input type="text" name="remarks" required>
            <br><br>
            <br><br><br>
            <div ><span style="color: red; text-align:center; font-size: 22px;"> <?php echo $error; ?></div> 
            <input id="save" type="submit" value="Save" name="save">
            
            <a href="Select_project2.php"><input id="save" type="button" value="Add More Items" name="addmore"></a>
        </fieldset>
         
          
     </form>
    
    </body>

</html>