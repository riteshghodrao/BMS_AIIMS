
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
$sql = "SELECT * FROM Project WHERE project_id ='" .$_POST["radio"]. "';";
    $result = $conn->query($sql);
//echo "$_POST["radio"]";
    $temp=$_POST["radio"];
    session_start();
  //  $_SESSION['pro_id']=$row["project_id"];
if ($result->num_rows > 0) {
    

    // output data of each row
    $row = $result->fetch_assoc();
    if(!empty(temp)){
        $_SESSION['pro_id']=$row["project_id"];
    $_SESSION["var_name"]= $row["name_of_work"];
    $_SESSION["var_name_contractor"] =$row["name_of_contractor"];
    $_SESSION["var_work_order"]= $row["date_and_number_of_work_order"];
    $_SESSION["var_completion_work_order"]=$row["date_of_completion_as_per_work_order"];
    $_SESSION["var_actual"]=$row["date_of_actual_work_completion"];
    $_SESSION["var_on_ac"]= $row["on_ac"];
   }
    
} 

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    
<title>View Project</title>
<link rel="stylesheet" type="text/css" href="view_project.css">

</head>
    
    <body>
    
    
     <header id="header" >
        <nav>
            <form>
                <a href="logout.php"><input class="logoutbtn" type="button" value="Log Out"></a>
                
                <a href="home.php"> <input class="home_btn" type="button" value="Home"></a>
            </form>
        </nav>
    </header>
    
        
        
        
<script>
function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == 1){
		var optionArray = ["|","LGF|LGF","UGF|UGF","First|First","Second|Second","Third|Third"];
	} else if(s1.value == 2){
		var optionArray = ["|","Ground|Ground","First|First","Second|Second","Third|Third"];
	} else if(s1.value == 3){
		var optionArray = ["|", "Ground|Ground", "First|First","Second|Second"];
	} else if(s1.value == 4){
		var optionArray = ["|", "Ground|Ground","First|First","Second|Second","Third|Third", "Fourth|Fourth", "Fifth|Fifth", "Sixth|Sixth"];
	} else if(s1.value == 5){
		var optionArray = ["|", "Ground|Ground","First|First","Second|Second","Third|Third", "Fourth|Fourth", "Fifth|Fifth", "Sixth|Sixth"];
	} else if(s1.value == 6){
		var optionArray = ["|", "Ground|Ground","First|First","Second|Second","Third|Third", "Fourth|Fourth", "Fifth|Fifth", "Sixth|Sixth"];
	} else if(s1.value == 7){
		var optionArray = ["|", "Basement|Basement", "Ground|Ground"];
	} else if(s1.value == 8){
		var optionArray = ["|", "Ground|Ground","First|First"];
	} else if(s1.value == 9){
		var optionArray = ["|", "Ground|Ground"];
	} else if(s1.value == 10){
		var optionArray = ["|", "Ground|Ground", "First|First","Second|Second"];
	} else if(s1.value == 11){
		var optionArray = ["|", "Ground|Ground"];
	} else if(s1.value == 12){
		var optionArray = ["|", "Ground|Ground"];
	} else if(s1.value == 13){
		var optionArray = ["|", "Ground|Ground", "First|First"];
	} else if(s1.value == 14){
		var optionArray = ["|", "Ground|Ground","First|First","Second|Second","Third|Third", "Fourth|Fourth", "Fifth|Fifth", "Sixth|Sixth"];
	}
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}
</script>
        
        
       
            
        <form id="details_container">
        
            <fieldset>
            <legend>Project Details</legend>
               <label>Name of work</label>
                <output>"<?php echo $_SESSION["var_name"]; ?>"</output>
                <br><br><br><br><br><br><br><br>
                
            
                <label>Name of the Contractor </label>
                <output>"<?php echo $_SESSION["var_name_contractor"]; ?>"</output>
                <br><br><br><br><br><br><br><br>
                
           
                <label>Date and no of work order</label>
                <output>"<?php echo $_SESSION["var_work_order"]; ?>"</output>
                <br><br><br><br><br><br>
                
           
                <label>Date of completion as per work order </label>
                <output>"<?php echo $_SESSION["var_completion_work_order"]; ?>"</output>
                <br><br><br><br>
                
            
                <label>Date of actual work completion</label>
                <output>"<?php echo $_SESSION["var_actual"]; ?>"</output>
                <br><br><br><br>
                 
                
                <label>On A/c </label>
                <output>"<?php echo $_SESSION["var_on_ac"]; ?>"</output>
        
                
                <br><br><br><br>
                <a href="Select_project1.php"><input type="button" class="addnew" value="Add New Room Details"></a>
                <br><br> 
                <a href="select_print_project.php"><input type="button" class="addnew" value="Print All Project Details"></a>
                <br><br> 
            </fieldset>
            
        </form>

        
        <form id="details_container" method="post" action="print_page.php">
        
            <fieldset>
            <legend>Search Room Details</legend>
                <label >Building Name</label>
                <select id="slct1" name="slct1" onchange="populate(this.id,'slct2')">
                    <option value=""></option>
                    <option value=1>Hospital</option>
                    <option value=2>Medical College</option>
                    <option value=3>Nursing College</option>
                    <option value=4>Boys Hostel</option>
                    <option value=5>Girls Hostel</option>
                    <option value=6>Nursing Hostel</option>
                    <option value=7>Auditorium</option>
                    <option value=8>Main Service Building</option>
                    <option value=9>UG Service Building</option>
                    <option value=10>Library</option>
                    <option value=11>MRS Building</option>
                    <option value=12>Animal House</option>
                    <option value=13>AYUSH</option>
                    <option value=14>PG Hostel</option>
</select>
                <br><br>

                <label id="floor" name="floor">Floor</label>
                <select id="slct2" name="slct2"></select>
                <br><br>
                
                <label>Grid</label>
                <input type="text" name="grid_no" required>
                
                <br><Br>
                
                <label>Item no</label> <a href="select_boq.php" target="_blank"><input type="button" value="View BOQ"></a>
                <input type="text" name="item_id" required>
                               
                <br><br><br><br>
                <input type="submit" value="search">
                <br><br>
                <div ><span style="color: red; text-align:center; font-size: 22px;"> <?php echo "Record Not Found. Try with valid details."; ?></div>
            </fieldset>
            
        </form>

        <br>
        
        
        
        
        
        
        
        
    
    
    
    </body>

</html>