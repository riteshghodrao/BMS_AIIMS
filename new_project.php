<?php
    include('session.php');
   $error="Please make a valid entry.\n";
?>
<?php
         if(isset($_POST['save'])) {
            
            include('config.php');
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
               $var_name_of_work =$_POST['work'];
               $var_name_of_contractor= $_POST['contractor'];
               $var_date_and_number_of_work_order=$_POST['work_order'];
               $var_date_of_completion_as_per_work_order=$_POST['work_completion'];
               $var_date_of_actual_work_completion= $_POST['actual_completion'];
               $var_on_ac= $_POST['on_ac'];
               
            
            $sql = "INSERT INTO Project ". "(name_of_work, name_of_contractor, date_and_number_of_work_order,date_of_completion_as_per_work_order, date_of_actual_work_completion, on_ac) ". "VALUES('$var_name_of_work', '$var_name_of_contractor', '$var_date_and_number_of_work_order', '$var_date_of_completion_as_per_work_order','$var_date_of_actual_work_completion','$var_on_ac');";
               
           // mysql_select_db('aiims_bm_dbms_3');
            $retval = mysqli_query($conn, $sql);
            
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
    
<title>Create New Project</title>
 <link rel="stylesheet" type="text/css" href="new_project.css">
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
    
     <form id="container" action="new_project.php" method="post">
        
            <fieldset>
            <legend>Project Details</legend>
                <label>Name of work</label>
                <input type="text" name="work">
                <br><br><br>
                
            
                <label>Name of the Contractor </label>
                <input type="text" name="contractor"> 
                <br><br><br>
                
           
                <label>Date and no of work order</label>
                <input type="text" name="work_order">
                <br><br><br>
                
           
                <label>Date of completion as per work order </label>
                <input type="date" name="work_completion" >
                <br><br><br>
                
            
                <label>Date of actual work completion</label>
                <input type="date" name="actual_completion" >
                <br><br><br>
                 
                
                <label>On A/c </label>
                <input type="text" name="on_ac">
                <br><br>    <br>
                
                <input id="save" type="submit" value="Save" name="save">
              <br><br><br><br>
              <a href="select_boq.php" target="_blank"><input id="boq" type="button" value="View BOQ"></a>
              <div ><span style="color: red; text-align:center; font-size: 22px;"> <?php echo $error; ?></div>  
            </fieldset>
            
        </form>
        

    
    
    
</body>

</html>