<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="hp.css">
    <title>Update</title>
</head>

<body style="background: url('Banasthali.png') no-repeat center center fixed;background-size: cover;">
<ul>
  <li><a href="TPOMenu.php"><i class="fa-solid fa-house-user" style="padding-right: 5px"></i>Home</a></li>
  <li><a href="import.php"><i class="fa-solid fa-file-import" style="padding-right: 5px"></i></i>Import</a></li>
  <li><a href="insert.php"><i class="fa-solid fa-user-plus" style="padding-right: 5px"></i>Add</a></li>
  <li><a href="Update.php"><i class="fa-solid fa-square-pen" style="padding-right: 5px"></i>Update</a></li>
  <li><a href="AdminDelete.php"><i class="fa-solid fa-trash-can" style="padding-right: 5px"></i>Delete</a></li>
  <li><a href="Search.php"><i class="fa-solid fa-magnifying-glass" style="padding-right: 5px"></i>Search</a></li>
  <li class="dropdown" style="float:right">
    <a href="javascript:void(0)" class="dropbtn" style="padding-right: 20px"><i class="fa-solid fa-user"></i></a>
    <div class="dropdown-content" style="right:0">
    <a href="AddUser.php"><i class="fa-solid fa-plus" style="padding-right: 5px"></i>Add User</a>
      <a href="TPOpass.php"><i class="fa-solid fa-unlock-keyhole" style="padding-right: 5px"></i>Change Password</a>
      <a href="https://forms.gle/zKKU5MmP4KP7t1Fw6"><i class="fa-solid fa-circle-question" style="padding-right: 5px"></i>Help</a>
      <a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="padding-right: 5px"></i>Log Out</a>
    </div>
  </li>
</ul>
      

    <form action="" method="POST" autocomplete="off">
        <div class="mainclass">
            <div class="extra">
                <input type="text" name="rno" id="rno" placeholder="Enter Student's Roll Number" required>
                <button type="submit" name="search">SEARCH</button>
            </div>
        </div>
    </form>
    
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

       if(isset($_POST['search']))
       {
          $rno=$_POST["rno"];

          $sql="SELECT * FROM studentdb WHERE rno='$rno'";
          $result=mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            
            ?>
            <div class="opclass">
               <h2>Update Student Record</h2>
               <form action="" method="POST" autocomplete="off">
                <label for="rno">Roll No.</label>
                <input type="text" name="rno" id="rno" value="<?php echo $row['rno'] ?>" readonly="readonly"><br>
                <label for="stud_id">SmartCard ID</label>
                <input type="text" name="stud_id" id="stud_id" value="<?php echo $row['stud_id'] ?>" placeholder="Enter Student ID" pattern="[A-Za-z]{5}[0-9]{5}" maxlength="10" title="Should be of length 10 with alphabets followed by numbers" required><br>
                <label for="class">Class</label>
                <input type="text" name="class" id="class" value="<?php echo $row['class'] ?>" placeholder="Ex. B.TECH(CS) III YEAR"><br>
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" value="<?php echo $row['fname'] ?>" placeholder="Enter Student's First Name" pattern="[A-Za-z]{1-20}" maxlength="20" title="Should contain only alphabets" required><br>
                <label for="fname">Middle Name</label>
                <input type="text" name="mname" id="mname" value="<?php echo $row['mname'] ?>" placeholder="Enter Student's Middle Name" pattern="[A-Za-z]{1-20}" maxlength="20" title="Should contain only alphabets"><br>
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" value="<?php echo $row['lname'] ?>"  placeholder="Enter Student's Last Name" pattern="[A-Za-z]{1-20}" maxlength="20" title="Should contain only alphabets"><br>
                <label for="p_mailid">Personal Mail ID</label>
                <input type="email" name="p_mailid" id="p_mailid" value="<?php echo $row['p_mailid'] ?>" placeholder="Enter Student's Personal Mail id" maxlength="50" required><br>
                <label for="b_mailid">Banasthali Mail ID</label>
                <input type="email" name="b_mailid" id="b_mailid" value="<?php echo $row['b_mailid'] ?>"  placeholder="Enter Student's Banasthali Mail id" maxlength="50" required><br>
                <label for="scontact_no">Student's Contact No.</label>
                <input type="phone" name="scontact_no" id="scontact_no" value="<?php echo $row['scontact_no'] ?>" placeholder="Enter Student Contact No." pattern="[6789][0-9]{9}" maxlength="10" title="Please enter valid phone number. It should be 10 digits long and begin with either 6,7,8 or 9" required><br>
                <label for="swhatsapp_no">Student's WhatsApp No.</label>
                <input type="phone" name="swhatsapp_no" id="swhatsapp_no" value="<?php echo $row['swhatsapp_no'] ?>" placeholder="Enter Student Whatsapp No." pattern="[6789][0-9]{9}" maxlength="10" title="Please enter valid phone number. It should be 10 digits long and begin with either 6,7,8 or 9" required><br>
                <label for="enroll_no">Enrollment No.</label>
                <input type="text" name="enroll_no" id="enroll_no" value="<?php echo $row['enroll_no'] ?>" placeholder="Enter Student Enrollment No." pattern="[0-9]{1-4}+//+[0-9]{1-4}" title="Should be of format xxxx/xxxx" required><br>
                <label for="father_name">Father's Name</label>
                <input type="text" name="father_name" id="father_name" value="<?php echo $row['father_name'] ?>" placeholder="Enter Student's Father Name" pattern="[A-Za-z\s]{1-35}" maxlength="35" title="Should contain only alphabets and spaces" required><br>
                <label for="mother_name">Mother's Name</label>
                <input type="text" name="mother_name" id="mother_name" value="<?php echo $row['mother_name'] ?>"  placeholder="Enter Student's Mother Name" pattern="[A-Za-z\s]{1-35}" maxlength="35" title="Should contain only alphabets and spaces"><br>
                <label for="pcontact_no">Parent's Contact No.</label>
                <input type="phone" name="p_contactno" id="p_contactno" value="<?php echo $row['p_contactno'] ?>"  placeholder="Enter Parent's Contact No." pattern="[6789][0-9]{9}" maxlength="10" title="Please enter valid phone number. It should be 10 digits long and begin with either 6,7,8 or 9"><br>
                <label for="landline_no">Landline Number</label>
                <input type="text" name="landline_no" id="landline_no" value="<?php echo $row['landline_no'] ?>"  placeholder="Enter LANDLINE No.(if any)"><br>
                <label for="address_1">Address Line 1</label>
                <input type="text" name="address_1" id="address_1" value="<?php echo $row['address_1'] ?>" placeholder="Enter Student's Address" required><br>
                <label for="address_2">Address Line 2</label>
                <input type="text" name="address_2" id="address_2" value="<?php echo $row['address_2'] ?>"  placeholder="Enter Student's Address"><br>
                <label for="address_3">Address Line 3</label>
                <input type="text" name="address_3" id="address_3" value="<?php echo $row['address_3'] ?>"  placeholder="Enter Student's Address"><br>
                <label for="district">District</label>
                <input type="text" name="district" id="district" value="<?php echo $row['district'] ?>" placeholder="Enter District" pattern="[A-Za-z/s]{1-50}" maxlength="50" title="Should contain only alphabets and spaces" required><br>
                <label for="state">State</label>
                <input type="text" name="state" id="state" value="<?php echo $row['state'] ?>"  placeholder="Enter State" pattern="[A-Za-z/s]{1-50}" maxlength="30" title="Should contain only alphabets and spaces" required><br>
                <label for="pincode">Pincode</label>
                <input type="text" name="pincode" id="pincode" value="<?php echo $row['pincode'] ?>" placeholder="Enter Pincode" pattern="[0-9]{1-6}" maxlentgh="6" title="Should be 6 digit numeric code" required><br>
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob" id="dob" value="<?php echo $row['dob'] ?>" placeholder="Enter Student's DOB" required><br>
                <label for="x_maxmarks">X Maximum Marks</label>
                <input type="text" name="x_maxmarks" id="x_maxmarks" value="<?php echo $row['x_maxmarks'] ?>"  placeholder="Enter Student's X Max Marks" pattern="[0-9]{1-3]" maxlength="3" title="Can be 3 digit value"><br>
                <label for="x_marksobt">X Marks Obtained</label>
                <input type="text" name="x_marksobt" id="x_marksobt" value="<?php echo $row['x_marksobt'] ?>" placeholder="Enter Student's X Marks Obt." pattern="[0-9]{1-3]+/.+[0-9][1-2]" maxlength="6" title="Can be of form xxx.xx"><br>
                <label for="x_percent">X Percentage</label>
                <input type="text" name="x_percent" id="x_percent" value="<?php echo $row['x_percent'] ?>" placeholder="Enter Student's X Percentage" pattern="[0-9]{1-3]+/.+[0-9][1-2]" maxlength="6" title="Can be of form xxx.xx"><br>
                <label for="x_yop">X Year Of Passing</label>
                <input type="year" name="x_yop" id="x_yop" value="<?php echo $row['x_yop'] ?>"  placeholder="Enter Student's X Year of Passing" pattern="[0-9]{1-4}" maxlength="4" title="Should be form of YYYY"><br>
                <label for="x_board">X Board</label>
                <input type="text" name="x_board" id="x_board" value="<?php echo $row['x_board'] ?>" placeholder="Enter Student's X Board" pattern="[A-Za-z/s]{1-150}" maxlength="150" title="Should conatin only alphabets and spaces"><br>
                <label for="xii_maxmarks">XII Max Marks</label>
                <input type="text" name="xii_maxmarks" id="xii_maxmarks" value="<?php echo $row['xii_maxmarks'] ?>" placeholder="Enter Student's XII Max Marks" pattern="[0-9]{1-3]" maxlength="3" title="Can be 3 digit value"><br>
                <label for="xii_marksobt">XII Marks Obt.</label>
                <input type="text" name="xii_marksobt" id="xii_marksobt" value="<?php echo $row['xii_marksobt'] ?>" placeholder="Enter Student's XII Marks Obt." pattern="[0-9]{1-3]" maxlength="3" title="Can be 3 digit value"><br>
                <label for="xii_percent">XII Percentage</label>
                <input type="text" name="xii_percent" id="xii_percent" value="<?php echo $row['xii_percent'] ?>" placeholder="Enter Student's XII Percentage" pattern="[0-9]{1-3]+/.+[0-9][1-2]" maxlength="6" title="Can be of form xxx.xx"><br>
                <label for="xii_yop">XII Year Of Passing</label>
                <input type="year" name="xii_yop" id="xii_yop" value="<?php echo $row['xii_yop'] ?>" placeholder="Enter Student's XII Year of Passing" pattern="[0-9]{1-4}" maxlength="4" title="Should be form of YYYY"><br>
                <label for="xii_board">XII Board</label>
                <input type="text" name="xii_board" id="xii_board" value="<?php echo $row['xii_board'] ?>" placeholder="Enter Student's XII Board" pattern="[A-Za-z/s]{1-150}" maxlength="150" title="Should conatin only alphabets and spaces"><br>
                <label for="sem1">Semester 1 CGPA</label>
                <input type="text" name="sem1" id="sem1" value="<?php echo $row['sem1'] ?>" placeholder="Enter Student's Semester 1 CGPA" pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx"><br>
                <label for="sem2">Semester 2 CGPA</label>
                <input type="text" name="sem2" id="sem2" value="<?php echo $row['sem2'] ?>" placeholder="Enter Student's Semester 2 CGPA" pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx"><br>
                <label for="sem3">Semester 3 CGPA</label>
                <input type="text" name="sem3" id="sem3" value="<?php echo $row['sem3'] ?>" placeholder="Enter Student's Semester 3 CGPA" pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx"><br>
                <label for="sem4">Semester 4 CGPA</label>
                <input type="text" name="sem4" id="sem1" value="<?php echo $row['sem1'] ?>" placeholder="Enter Student's Semester 4 CGPA" pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx"><br>
                <label for="sem5">Semester 5 CGPA</label>
                <input type="text" name="sem5" id="sem5" value="<?php echo $row['sem5'] ?>" placeholder="Enter Student's Semester 5 CGPA" pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx"><br>
                <label for="tmi">Two Month Internship</label>
                <input type="text" name="tmi" id="tmi" value="<?php echo $row['tmi'] ?>" placeholder="Enter Student's TMI company(if any)"><br>
                <label for="placed_company1">Placed Company 1</label>
                <input type="text" name="placed_company1" id="placed_company1" value="<?php echo $row['placed_company1'] ?>" placeholder="Enter Student's Placed Company 1(if any)"><br>
                <label for="placed_comp1_date">Placed Company 1 Date</label>
                <input type="date" name="placed_comp1_date" id="placed_comp1_date" value="<?php echo $row['placed_comp1_date'] ?>" placeholder="Enter Student's Placed Company 1 Date(if any)"><br>
                <label for="placed_company2">Placed Company 2</label>
                <input type="text" name="placed_company2" id="placed_company2" value="<?php echo $row['placed_company2'] ?>" placeholder="Enter Student's Placed Company 2(if any)"><br>
                <label for="placed_comp2_date">Placed Company 2 Date</label>
                <input type="date" name="placed_comp2_date" id="placed_comp2_date" value="<?php echo $row['placed_comp2_date'] ?>" placeholder="Enter Student's Placed Company 2 Date(if any)"><br>
                <label for="placed_company3">Placed Company 3</label>
                <input type="text" name="placed_company3" id="placed_company3" value="<?php echo $row['placed_company3'] ?>" placeholder="Enter Student's Placed Company 3(if any)"><br>
                <label for="placed_comp3_date">Placed Company 3 Date</label>
                <input type="date" name="placed_comp3_date" id="placed_comp3_date" value="<?php echo $row['placed_comp3_date'] ?>" placeholder="Enter Student's Placed Company 3 Date(if any)">
                <div class="upbtn"> <br>
                    <button type="submit" name="update">UPDATE</button>
                </div>
                </form>

        </div>
              <?php 
          
          }
       }

    ?>

<script type="text/javascript">

function forceInputUppercase(e)
{
  var start = e.target.selectionStart;
  var end = e.target.selectionEnd;
  e.target.value = e.target.value.toUpperCase();
  e.target.setSelectionRange(start, end);
}
function forceInputLowercase(e)
{
  var start = e.target.selectionStart;
  var end = e.target.selectionEnd;
  e.target.value = e.target.value.toLowerCase();
  e.target.setSelectionRange(start, end);
}

document.getElementById("stud_id").addEventListener("keyup", forceInputUppercase, false);
document.getElementById("class").addEventListener("keyup", forceInputUppercase, false);
document.getElementById("p_mailid").addEventListener("keyup", forceInputLowercase, false);
document.getElementById("b_mailid").addEventListener("keyup", forceInputLowercase, false);
</script>
            
</body>

</html>

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

    if(isset($_POST['update']))
    {
      $rno=$_POST["rno"];
        $stud_id = $_POST["stud_id"];
        $class = $_POST["class"];
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $p_mailid = $_POST["p_mailid"];
        $b_mailid = $_POST["b_mailid"];
        $scontact_no = $_POST["scontact_no"];
        $swhatsapp_no = $_POST["swhatsapp_no"];
        $enroll_no = $_POST["enroll_no"];
        $father_name = $_POST["father_name"];
        $mother_name = $_POST["mother_name"];
        $p_contactno = $_POST["p_contactno"];
        $landline_no = $_POST["landline_no"];
        $address_1 = $_POST["address_1"];
        $address_2 = $_POST["address_2"];
        $address_3 = $_POST["address_3"];
        $district = $_POST["district"];
        $state = $_POST["state"];
        $pincode = $_POST["pincode"];
        $dob = $_POST["dob"];
        $x_maxmarks = $_POST["x_maxmarks"];
        $x_marksobt = $_POST["x_marksobt"];
        $x_percent = $_POST["x_percent"];
        $x_yop = $_POST["x_yop"];
        $x_board = $_POST["x_board"];
        $xii_maxmarks = $_POST["xii_maxmarks"];
        $xii_marksobt = $_POST["xii_marksobt"];
        $xii_percent = $_POST["xii_percent"];
        $xii_yop = $_POST["xii_yop"];
        $xii_board = $_POST["xii_board"];
        $sem1 = $_POST["sem1"];
        $sem2 = $_POST["sem2"];
        $sem3 = $_POST["sem3"];
        $sem4 = $_POST["sem4"];
        $sem5 = $_POST["sem5"];
        $tmi = $_POST["tmi"];
        $placed_company1 = $_POST["placed_company1"];
        $placed_comp1_date = $_POST["placed_comp1_date"];
        $placed_company2 = $_POST["placed_company2"];
        $placed_comp2_date = $_POST["placed_comp2_date"];
        $placed_company3 = $_POST["placed_company3"];
        $placed_comp3_date = $_POST["placed_comp3_date"];


        $sql1="UPDATE studentdb SET stud_id='$stud_id', class='$class', fname='$fname', mname='$mname', lname='$lname', p_mailid='$p_mailid', b_mailid='$b_mailid', scontact_no='$scontact_no', swhatsapp_no='$swhatsapp_no', enroll_no='$enroll_no', father_name='$father_name', mother_name='$mother_name', p_contactno='$p_contactno', landline_no='$landline_no', address_1='$address_1', address_2='$address_2', address_3='$address_3', district='$district', state='$state', pincode='$pincode', dob='$dob', x_maxmarks='$x_maxmarks', x_marksobt='$x_marksobt', x_percent='$x_percent', x_yop='$x_yop', x_board='$x_board', xii_maxmarks='$xii_maxmarks', xii_marksobt='$xii_marksobt', xii_percent='$xii_percent', xii_yop='$xii_yop', xii_board='$xii_board', sem1='$sem1', sem2='$sem2', sem3='$sem3', sem4='$sem4', sem5='$sem5', tmi='$tmi', placed_company1='$placed_company1', placed_comp1_date='$placed_comp1_date', placed_company2='$placed_company2', placed_comp2_date='$placed_comp2_date', placed_company3='$placed_company3', placed_comp3_date='$placed_comp3_date' WHERE rno='$rno' ";

        $res=mysqli_query($conn, $sql1);
        if($res)
        {
          echo '<script type="text/javascript">

          window.onload = function () { alert("DATA UPDATED SUCCESSFULLY!!"); }

         </script>'; 
        }else{
          echo '<script type="text/javascript">

          window.onload = function () { alert("ROLL NO. CANT BE UPDATED!!"); }

         </script>';
        }

      }
  
    
  

?>