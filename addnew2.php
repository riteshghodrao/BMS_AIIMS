<?php
   include('session.php');
   $error="Please make a valid entry.\n";
  // echo "<p style='color:white'>You are using Project ID : ".$_POST['radio']. "</p>\n";
   $temp= $_POST['radio'];
   session_start();
   // $temp1= $_SESSION["POST_VARS"]["radio"];
   if(!empty($temp)){
   $_SESSION['radio']=$_POST['radio'];}
   //echo "this is ".$_SESSION['radio']. ";";
?>

<?php
         if(isset($_POST['add'])) {
            include("config.php");
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            if(!get_magic_quotes_gpc() ) {
                $project_id = addslashes ($_POST['project_id']);
               $grid_no = addslashes ($_POST['grid_no']);
               $build_id = addslashes ($_POST['build_id']);
               $floor_id = addslashes ($_POST['floor_id']);
               $item_id = addslashes ($_POST['item_id']);
              
               $measured = addslashes ($_POST['measured']);
               $unit = addslashes ($_POST['unit']);
               $no1 = addslashes ($_POST['no1']);
               $no2 = addslashes ($_POST['no2']);
               $length = addslashes ($_POST['length']);
               $breadth = addslashes ($_POST['breadth']);
               $height = addslashes ($_POST['height']);
               $quantity = addslashes ($_POST['quantity']);
               $remarks = addslashes ($_POST['remarks']);
               $date_mod = addslashes ($_POST['date_mod']);
               
            }else {
              $project_id = addslashes ($_POST['project_id']);
               $grid_no = addslashes ($_POST['grid_no']);
               $build_id = addslashes ($_POST['build_id']);
               $floor_id = addslashes ($_POST['floor_id']);
               $item_id = addslashes ($_POST['item_id']);
               
               $measured = addslashes ($_POST['measured']);
               $unit = addslashes ($_POST['unit']);
               $no1 = addslashes ($_POST['no1']);
               $no2 = addslashes ($_POST['no2']);
               $length = addslashes ($_POST['length']);
               $breadth = addslashes ($_POST['breadth']);
               $height = addslashes ($_POST['height']);
               $quantity = addslashes ($_POST['quantity']);
               $remarks = addslashes ($_POST['remarks']);
               $date_mod = addslashes ($_POST['date_mod']);
               
            }
            
            
            $sql = "INSERT INTO Room ". "(project_id,grid_no, build_id, floor_id, item_id, measured, unit, no1, no2, length, breadth, height, quantity, remarks, date_mod) ". "VALUES($project_id,'$grid_no', $build_id, $floor_id, '$item_id', $measured, '$unit', '$no1', '$no2', $length, $breadth, $height, $quantity, '$remarks', '$date_mod');";
               
           // mysql_select_db('aiims_bm_dbms_3');
            $retval = mysqli_query( $conn,$sql );
            
            if(! $retval ) {
               $error = "could not enter data\n";
            //   die('Could not enter data: ' . mysql_error());
            }
            
            $error= "Entered data successfully\n";
            
            mysql_close($conn);
         }else {}
            ?>

<!DOCTYPE html>
<html>

<head>
    
<title>Add/Update Room</title>
<link rel="stylesheet" type="text/css" href="addnew1.css">
</head>
    
    <body>
    <script>
function populate(s1,s2){
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
  if(s1.value == 1){
        var optionArray = ["|","-2|LGF","-1|UGF","1|First","2|Second","3|Third"];
    } else if(s1.value == 2){
        var optionArray = ["|","0|Ground","1|First","2|Second","3|Third"];
    } else if(s1.value == 3){
        var optionArray = ["|", "0|Ground", "1|First","2|Second"];
    } else if(s1.value == 4){
        var optionArray = ["|", "0|Ground","1|First","2|Second","3|Third", "4|Fourth", "5|Fifth", "6|Sixth"];
    } else if(s1.value == 5){
        var optionArray = ["|", "0|Ground","1|First","2|Second","3|Third", "4|Fourth", "5|Fifth", "6|Sixth"];
    } else if(s1.value == 6){
        var optionArray = ["|", "0|Ground","1|First","2|Second","3|Third", "4|Fourth", "5|Fifth", "6|Sixth"];
    } else if(s1.value == 7){
        var optionArray = ["|", "-3|Basement", "0|Ground"];
    } else if(s1.value == 8){
        var optionArray = ["|", "0|Ground","1|First"];
    } else if(s1.value == 9){
        var optionArray = ["|", "0|Ground"];
    } else if(s1.value == 10){
        var optionArray = ["|", "0|Ground", "1|First","2|Second"];
    } else if(s1.value == 11){
        var optionArray = ["|", "0|Ground"];
    } else if(s1.value == 12){
        var optionArray = ["|", "0|Ground"];
    } else if(s1.value == 13){
        var optionArray = ["|", "0|Ground", "1|First"];
    } else if(s1.value == 14){
        var optionArray = ["|", "0|Ground","1|First","2|Second","3|Third", "4|Fourth", "5|Fifth", "6|Sixth"];
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

    
    <header id="logout" >
        <nav>
            <form>
                <a href="home.php"><input class="homebtn" type="button" value="Home"></a>
                <a href="logout.php"><input class="logoutbtn" type="button" value="Log Out"></a>
            </form>
        </nav>
    </header>


        <br><br><br>
    
        
        
        <div id="left_panel"> <!-- room details container -->
        

         
                <!--<form id="option">
                <fieldset >
                    <legend>Add / Update Room Details</legend>
                    <input type="radio" name="option">Add New Room<br>
                    <input type="radio" name="option">Update Existing Room<br>
                </fieldset>
                </form> -->

        <br><br><br>

        <form id="details_container" action="addnew2.php" method ="post">
        <div ><span style="color: red; text-align:center; font-size: 22px;"> <?php echo $error; ?></div>
            <fieldset>
            <legend>Room Details</legend>
                <?php echo "<p style='color:white'>You are currently using Project ID : ".$_SESSION["radio"]. "</p>\n"; ?>
                <br><br>
                <label>Project ID</label>
                <input type="text" name="project_id">
                <br><br><br>
                <label>Building Name</label>
                <select name="build_id" id ="build_id" onchange="populate(this.id,'floor_id')">
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
                <label >Floor</label>
                <select name="floor_id" id="floor_id">
                   <!-- <option></option>
                    <option value=-3>Basement</option>
                    <option value=-2>Lower Ground Floor</option>
                    <option value=-1>Upper Ground Floor</option>
                    <option value=0>Ground Floor</option>
                    <option value=1>First Floor</option>
                    <option value=2>Second Floor</option>
                    <option value=3>Third Floor</option>
                    <option value=4>Fourth Floor</option>
                    <option value=5>Fifth Floor</option>
                    <option value=6>Sixth Floor</option> -->
                </select>
                
                 <br><br>
                <label>Grid</label>
                <input type="text" name="grid_no">

                <br><br>
                <label>Measured</label>
                <select name="measured">
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
                <br><br>

                

                <br><br><br><br><br>
                <label>Item No.</label>
                <input type="text" name="item_id">
                <a href="select_boq.php" target="_blank"><input type="button" name="viewboq" value="View BOQ"></a>
                
                
                <br><br><br><br>
<h4 id="date">Date of Measurement</h4>
                <br><br>
                <label>Date </label>
                <input type="date" name="date_mod">
                
                <br><br><br><br><br>
                                
<h3 id="measurement_heading">Measurements</h3>
                <br><br>
                <label>Unit</label>
                <input type="text" name="unit">
                <br><br>
                <label>Nos. (1)</label>
                <input type=number name="no1">
                <br><br>
                <label>Nos. (2)</label>
                <input type=number name="no2">
                <br><br>
                <label>Length</label>
                <input type=number name="length">
                <br><br>
                <label>Breadth/Width</label>
                <input type=number name="breadth">
                <br><br>
                <label>Height / Depth</label>
                <input type=number name="height">
                <br><br>
                <label>Quantity</label>
                <input type=number name="quantity">
                <br><br>
                <label>Remarks</label>
                <textarea name="remarks"></textarea>
                <br><br><br><br><br><br>
                <h3><input type="submit" value="Save" name="add" ></h3> <br><br><br>
            <div ><span style="color: red; text-align:center; font-size: 22px;"> <?php echo $error; ?></div>
            </fieldset>
            
        </form>
      
        <br><br><br>

        <div>
        <form>
            <a href="home.php"><input type="button" class="home_btn" value="Go to Home">  
             </a>
        </form>
        </div>
        
        </div> <!-- room details container end-->
        
        
        
        
        
    <footer>
        
    
    </footer>
    
    
    </body>

</html>