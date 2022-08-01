<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database="mysisp";
   
   // Create connection
   $conn = mysqli_connect($servername, $username, $password,$database);
   
   // Check connection
   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }
   $cols="";
  
   $class=$x_percent =$xii_percent =$sem1=$sem2=$sem3=$sem4 =$sem5 =$tmi =$placed_company1 =$placed_company2 =
   $placed_company3="";


   if(isset($_POST['submit'])){

    $class = $_POST["class"];
    // $x_percent = $_POST["x_percent"];
    // $xii_percent = $_POST["xii_percent"];
    // $sem1 = $_POST["sem1"];
    // $sem2 = $_POST["sem2"];
    // $sem3 = $_POST["sem3"];
    // $sem4 = $_POST["sem4"];
    // $sem5 = $_POST["sem5"];
    $tmi = $_POST["tmi"];
    $placed_company1 = $_POST["placed_company1"];
    $placed_company2 = $_POST["placed_company2"];
    $placed_company3 = $_POST["placed_company3"];


    $whereParts = array();
    if(!empty($class))     { $whereParts[] = "class = '$class' "; }
    // if(!empty($x_percent)) { $whereParts[] = "x_percent >= '$x_percent' "; }
    // if(!empty($xii_percent)) { $whereParts[] = "xii_percent >= '$x_percent' "; }
    // if(!empty($sem1)) { $whereParts[] = "sem1 >= '$sem1' "; }
    // if(!empty($sem2)) { $whereParts[] = "sem2 >= '$sem2' "; }
    // if(!empty($sem3)) { $whereParts[] = "sem3 >= '$sem3' "; }
    // if(!empty($sem4)) { $whereParts[] = "sem4 >= '$sem4' "; }
    // if(!empty($sem5)) { $whereParts[] = "sem5 >= '$sem5' "; }
    if(!empty($tmi)) { $whereParts[] = "tmi = '$tmi' "; }
    if(!empty($placed_company1)) { $whereParts[] = "placed_company1 = '$placed_company1' "; }
    if(!empty($placed_company2)) { $whereParts[] = "placed_company2 = '$placed_company2' "; }
    if(!empty($placed_company3)) { $whereParts[] = "placed_company3 = '$placed_company3' "; }


    
    $columns = $_POST['check_list']; // array
    foreach($columns as $column)
    {
        $cols .= $column . ',';
    }
    $cols = substr($cols,0,strlen($cols)-1);
    $sql = "SELECT " . $cols . " FROM studentdb";

    if(count($whereParts)) {
      $sql .= " WHERE " . implode('AND ', $whereParts);
  }
 // echo "$sql";
  $result=mysqli_query($conn,$sql);

  
  
  echo "<table id='studexport' border='1'>";
    $chkcol = $_POST['check_list'];
    if(empty($chkcol))
    {
      echo '<script type="text/javascript">

           window.onload = function () { alert("NO CHECKBOXES WERE SELECTED !!"); }
    
          </script>';
    }
   else
   {
    $chcol = $_POST['check_list'];
    echo "<tr>";
    foreach($chcol as $col)
    {
      echo "<td style='font-weight: bold; font-size:20px;'>" . $col . "</td>"; 
    }
    echo "</tr>";

    while($data = mysqli_fetch_array($result)){
    echo "<tr>";
    foreach($chkcol as $column)
    {
      echo "<td>" . $data["$column"] . "</td>"; 
    }
   
  }
  echo "</tr>";
}
echo "</table>";
  
  //    else {
  //      echo '<script type="text/javascript">

  //      window.onload = function () { alert("NO RECORDS FOUND!!"); }

  //      </script>';
  //    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="hp.css">
    <link rel="stylesheet" href="GenerateTemplates.css">
    <title>Generate Templates</title>
</head>

<body style="background: url('Banasthali.png') no-repeat center center fixed;background-size: cover;">
    <ul>
    <li><a href="TPCMenu.php"><i class="fa-solid fa-house-user" style="padding-right: 5px"></i></i>Home</a></li>
      <li><a href="SearchTPC.php"><i class="fa-solid fa-magnifying-glass" style="padding-right: 5px"></i>Search</a></li>
      <li><a href="GenerateTemplates.php"><i class="fa-solid fa-file-lines" style="padding-right: 5px"></i>Generate Templates</a></li>
      <li><a href="ReportGenerate.php"><i class="fa-solid fa-chart-column" style="padding-right: 5px"></i></i>Generate Report</a></li>
      <li class="dropdown" style="float:right">
        <a href="javascript:void(0)" class="dropbtn"><i class="fa-solid fa-user"></i></a>
        <div class="dropdown-content" style="right:0">
          <a href="TPCpass.php"><i class="fa-solid fa-unlock-keyhole" style="padding-right: 5px"></i>Change Password</a>
          <a href="https://forms.gle/zKKU5MmP4KP7t1Fw6"><i class="fa-solid fa-circle-question" style="padding-right: 5px"></i>Help</a>
          <a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="padding-right: 5px"></i>Log Out</a>
        </div>
      </li>
    </ul>

    <div class="exbtn">
      <button id="export" onclick="myFunction('xlsx','StudentData')">Export</button>
    </div>
    
    <div class="chkbox">
        <form action="" method="POST">
          <div class="selection">
              <label for="class">CLASS</label>
                <select name="class" id="class">
                    <option value="">---SELECT---</option>
                    <?php
                    $res=mysqli_query($conn,"SELECT DISTINCT class FROM studentdb");
                    while($row=mysqli_fetch_array($res)){
                    ?>
                    <option value="<?php echo $row["class"];?>"><?php echo $row["class"];?></option>
                    <?php
                    }
                    ?>
                </select><br>
            <label for="rno">Roll No</label><input type="checkbox" name="check_list[]" id="rno" value="rno"><br>
            
            <label for="stud_id">Smartcard ID</label><input type="checkbox" name="check_list[]" id="stud_id" value="stud_id"><br>
            
            <label for="class">Class</label><input type="checkbox" name="check_list[]" id="class" value="class"><br>
            
            <label for="fname">First Name</label><input type="checkbox" name="check_list[]" id="fname" value="fname"><br>
            
            <label for="mname">Middle Name</label><input type="checkbox" name="check_list[]" id="mname" value="mname"><br>
            
            <label for="lname">Last Name</label><input type="checkbox" name="check_list[]" id="lname" value="lname"><br>
            
            <label for="p_mailid">Personal Mail ID</label><input type="checkbox" name="check_list[]" id="p_mailid" value="p_mailid"><br>
            
            <label for="b_mailid">Banasthali Mail ID</label><input type="checkbox" name="check_list[]" id="b_mailid" value="b_mailid"><br>
            
            <label for="scontact_no">Student Contact No.</label><input type="checkbox" name="check_list[]" id="scontact_no" value="scontact_no"><br>
            
            <label for="swhatsapp_no">Student Whatsapp No.</label><input type="checkbox" name="check_list[]" id="swhatsapp_no" value="swhatsapp_no"><br>
            
            <label for="enroll_no">Enroll No.</label><input type="checkbox" name="check_list[]" id="enroll_no" value="enroll_no"><br>
            
            <label for="father_name">Father's Name</label><input type="checkbox" name="check_list[]" id="father_name" value="father_name"><br>
            
            <label for="mother_name">Mother's Name</label><input type="checkbox" name="check_list[]" id="mother_name" value="mother_name"><br>
            
            <label for="p_contactno">Parent's Contact No.</label><input type="checkbox" name="check_list[]" id="p_contactno" value="p_contactno"><br>
            <input type="checkbox" name="check_list[]" id="landline_no" value="landline_no">
            <label for="landline_no">Landline No.</label><br>
            <input type="checkbox" name="check_list[]" id="address_1" value="address_1">
            <label for="address_1">Address Line 1</label><br>
            <input type="checkbox" name="check_list[]" id="address_2" value="address_2">
            <label for="address_2">Address Line 2</label><br>
            <input type="checkbox" name="check_list[]" id="address_3" value="address_3">
            <label for="address_3">Address Line 3</label><br>
            <input type="checkbox" name="check_list[]" id="district" value="district">
            <label for="district">District</label><br>
            <input type="checkbox" name="check_list[]" id="state" value="state">
            <label for="state">State</label><br>
            <input type="checkbox" name="check_list[]" id="pincode" value="pincode">
            <label for="pincode">Pincode</label><br>
            <input type="checkbox" name="check_list[]" id="dob" value="dob">
            <label for="dob">DOB</label><br>
            <input type="checkbox" name="check_list[]" id="x_maxmarks" value="x_maxmarks">
            <label for="x_maxmarks">X Maxmarks</label><br>
            <input type="checkbox" name="check_list[]" id="x_marksobt" value="x_marksobt">
            <label for="x_marksobt">X Marks Obtained</label><br>
            <input type="checkbox" name="check_list[]" id="x_percent" value="x_percent">
            <label for="x_percent">X Percentage</label><br>
            <input type="checkbox" name="check_list[]" id="x_yop" value="x_yop">
            <label for="x_yop">X YOP</label><br>
            <input type="checkbox" name="check_list[]" id="x_board" value="x_board">
            <label for="x_board">X Board</label><br>
            <input type="checkbox" name="check_list[]" id="xii_maxmarks" value="xii_maxmarks">
            <label for="xii_maxmarks">XII Max Marks</label><br>
            <input type="checkbox" name="check_list[]" id="xii_marksobt" value="xii_marksobt">
            <label for="xii_marksobt">XII Marks Obtained</label><br>
            <input type="checkbox" name="check_list[]" id="xii_percent" value="xii_percent">
            <label for="xii_percent">XII Percentage</label><br>
            <input type="checkbox" name="check_list[]" id="xii_yop" value="xii_yop">
            <label for="xii_yop">XII YOP</label><br>
            <input type="checkbox" name="check_list[]" id="xii_board" value="xii_board">
            <label for="xii_board">XII Board</label><br>
            <input type="checkbox" name="check_list[]" id="sem1" value="sem1">
            <label for="sem1">Semester 1 CGPA</label><br>
            <input type="checkbox" name="check_list[]" id="sem2" value="sem2">
            <label for="sem2">Semester 2 CGPA</label><br>
            <input type="checkbox" name="check_list[]" id="sem3" value="sem3">
            <label for="sem3">Semester 3 CGPA</label><br>
            <input type="checkbox" name="check_list[]" id="sem4" value="sem4">
            <label for="sem4">Semester 4 CGPA</label><br>
            <input type="checkbox" name="check_list[]" id="sem5" value="sem5">
            <label for="sem5">Semester 5 CGPA</label><br>
            <input type="checkbox" name="check_list[]" id="tmi" value="tmi">
            <label for="tmi">Two Month Internship</label><br>
            <input type="checkbox" name="check_list[]" id="placed_company1" value="placed_company1">
            <label for="placed_company1">Placed Company 1</label><br>
            <input type="checkbox" name="check_list[]" id="placed_comp1_date" value="placed_comp1_date">
            <label for="placed_comp1_date">Placed Company 1 Date</label><br>
            <input type="checkbox" name="check_list[]" id="placed_company2" value="placed_company2">
            <label for="placed_company2">Placed Company 2</label><br>
            <input type="checkbox" name="check_list[]" id="placed_comp2_date" value="placed_comp2_date">
            <label for="placed_comp2_date">Placed Company 2 Date</label><br>
            <input type="checkbox" name="check_list[]" id="placed_company3" value="placed_company3">
            <label for="placed_company3">Placed Company 3</label><br>
            <input type="checkbox" name="check_list[]" id="placed_comp3_date" value="placed_comp3_date">
            <label for="placed_comp3_date">Placed Company 3 Date</label><br>

             <label for="tmi">Two Month Internship</label>
                <select name="tmi" id="tmi">
                   <option value="">---SELECT---</option>
                    <?php
                    $res=mysqli_query($conn,"SELECT DISTINCT tmi FROM studentdb");
                    while($row=mysqli_fetch_array($res)){
                    ?>
                    <option value="<?php echo $row["tmi"];?>"><?php echo $row["tmi"];?></option>
                    <?php
                    }
                    ?>
                </select><br>
            <label for="placed_company1">Placed Company 1</label>
                <select name="placed_company1" id="placed_company1">
                    <option value="">---SELECT---</option>
                    <?php
                    $res=mysqli_query($conn,"SELECT DISTINCT placed_company1 FROM studentdb");
                    while($row=mysqli_fetch_array($res)){
                    ?>
                    <option value="<?php echo $row["placed_company1"];?>"><?php echo $row["placed_company1"];?></option>
                    <?php
                    }
                    ?>
                </select><br>
              <label for="placed_company2">Placed Company 2</label>
                <select name="placed_company2" id="placed_company2">
                    <option value="">---SELECT---</option>
                    <?php
                    $res=mysqli_query($conn,"SELECT DISTINCT placed_company2 FROM studentdb");
                    while($row=mysqli_fetch_array($res)){
                    ?>
                    <option value="<?php echo $row["placed_company2"];?>"><?php echo $row["placed_company2"];?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label for="placed_company3">Placed Company 3</label>
                <select name="placed_company3" id="placed_company3">
                   <option value="">---SELECT---</option>
                    <?php
                    $res=mysqli_query($conn,"SELECT DISTINCT placed_company3 FROM studentdb");
                    while($row=mysqli_fetch_array($res)){
                    ?>
                    <option value="<?php echo $row["placed_company3"];?>"><?php echo $row["placed_company3"];?></option>
                    <?php
                    }
                    ?><br>
                </select><br><br>
                  </div>
                <div class="subbtn">
                <button type="submit" name="submit">Submit</button><br><br>
                  </div>
          </form>
    </div>
    <script>
      function myFunction(fileExtension,fileName){
        var elt = document.getElementById('studexport');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
        return XLSX.writeFile(wb, fileName+"."+fileExtension || ('MySheetName.' + (fileExtension || 'xlsx')));
    }
    </script>
</body>
</html>