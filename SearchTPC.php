<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
  <title>SEARCH DATA</title>
  <link rel="stylesheet" href="hp.css">

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

<script>      
  function checkField() {
      if (document.getElementById('field').value == 'rno') {
        document.getElementById('extra').style.display = '';
        document.getElementById('rollno').disabled = false;
        document.getElementById('smartid').style.display = 'none';
        document.getElementById('mail').style.display = 'none';
        document.getElementById('bmail').style.display = 'none';
        document.getElementById('search').disabled = false;
      }
      else if (document.getElementById('field').value == 'stud_id') {
        document.getElementById('extra').style.display = '';
        document.getElementById('smartid').disabled = false;
        document.getElementById('rollno').style.display = 'none';
        document.getElementById('mail').style.display = 'none';
        document.getElementById('bmail').style.display = 'none';
        document.getElementById('search').disabled = false;
      }
      else if (document.getElementById('field').value == 'p_mailid') {
        document.getElementById('extra').style.display = '';
        document.getElementById('mail').disabled = false;
        document.getElementById('rollno').style.display = 'none';
        document.getElementById('smartid').style.display = 'none';
        document.getElementById('bmail').style.display = 'none';
        document.getElementById('search').disabled = false;
      }
      else if (document.getElementById('field').value == 'b_mailid') {
        document.getElementById('extra').style.display = '';
        document.getElementById('bmail').disabled = false;
        document.getElementById('rollno').style.display = 'none';
        document.getElementById('smartid').style.display = 'none';
        document.getElementById('mail').style.display = 'none';
        document.getElementById('search').disabled = false;
      }
       else {
        document.getElementById('extra').style.display = 'none';
  }
}
</script>

<form action="" method="POST" autocomplete="off">
<div class="mainclass">
  <div class="form-group">
    <select class="select"  onclick='checkField()' name="field" id="field">
        <option id="none" value="null">--------------Search by--------------</option>
        <option id="rno" value="rno">Roll Number</option>
        <option id="stud_id" value="stud_id">SmartCard ID</option>
        <option id="p_mailid" value="p_mailid">Personal Mail ID</option>
        <option id="b_mailid" value="b_mailid">Official Mail ID(Banasthali)</option>
    </select>
</div>
<div class="extra" id="extra" name="extra" style="display: none">
    <input type="text" name="rollno" id="rollno" placeholder="Enter Roll Number(ex 1913002)">
    <input type="text" name="smartid" id="smartid" placeholder="Enter SmartCard ID(ex BTBTC19232)">
    <input type="text" name="mail" id="mail" placeholder="Enter Personal E-Mail">
    <input type="text" name="bmail" id="bmail" placeholder="Enter @banasthali.in E-Mail">
    <button type="search" name="search" id="search">Search</button>
</div>
</div>
</form>
<div class="opclass">
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
         $val=$_POST["field"];
         if($val=='rno')
         {
          $input=$_POST["rollno"];
           $sql="SELECT * FROM studentdb WHERE rno='$input'";
           $res=mysqli_query($conn, $sql);
           if (mysqli_num_rows($res) == 0)
           {
            echo '<script type="text/javascript">

             window.onload = function () { alert("NO RECORD FOUND, PLEASE ENTER CORRECT DATA!!"); }

            </script>';
           }else{
           while($row = mysqli_fetch_assoc($res))
           {
            ?>
                <label for="rno">Roll No.</label>
                <span><?php echo $row['rno'] ?></span><br>
                <label for="stud_id">Smart Card Id</label>
                <span><?php echo $row['stud_id'] ?></span><br>
                <label for="class">Class</label>
                <span><?php echo $row['class'] ?></span> <br>
                <label for="fname">First Name</label>
                <span><?php echo $row['fname'] ?></span><br>
                <label for="fname">Middle Name</label>
                <span><?php echo $row['mname'] ?></span><br>
                <label for="lname">Last Name</label>
                <span><?php echo $row['lname'] ?></span><br>
                <label for="p_mailid">Personal Mail Id</label>
                <span><?php echo $row['p_mailid'] ?></span><br>
                <label for="b_mailid">Banasthali Mail Id</label>
                <span><?php echo $row['b_mailid'] ?></span><br>
                <label for="scontact_no">Student Contact No.</label>
                <span><?php echo $row['scontact_no'] ?></span><br>
                <label for="swhatsapp_no">Student WhatsApp No.</label>
                <span><?php echo $row['swhatsapp_no'] ?></span><br>
                <label for="enroll_no">Enrollment No.</label>
                <span><?php echo $row['enroll_no'] ?></span><br>
                <label for="father_name">Father's Name</label>
                <span><?php echo $row['father_name'] ?></span><br>
                <label for="mother_name">Mother's Name</label>
                <span><?php echo $row['mother_name'] ?></span><br>
                <label for="pcontact_no">Parent's Contact No.</label>
                <span><?php echo $row['p_contactno'] ?></span><br>
                <label for="landline_no">Landline No.</label>
                <span><?php echo $row['landline_no'] ?></span><br>
                <label for="address_1">Address Line 1</label>
                <span><?php echo $row['address_1'] ?></span><br>
                <label for="address_2">Address Line 2</label>
                <span><?php echo $row['address_2'] ?></span><br>
                <label for="address_3">Address Line 3</label>
                <span><?php echo $row['address_3'] ?></span><br>
                <label for="district">District</label>
                <span><?php echo $row['district'] ?></span><br>
                <label for="state">State</label>
                <span><?php echo $row['state'] ?></span><br>
                <label for="pincode">Pincode</label>
                <span><?php echo $row['pincode'] ?></span><br>
                <label for="dob">Date Of Birth</label>
                <span><?php echo $row['dob'] ?></span><br>
                <label for="x_maxmarks">X Maximum Marks</label>
                <span><?php echo $row['x_maxmarks'] ?></span><br>
                <label for="x_marksobt">X Marks Obtained</label>
                <span><?php echo $row['x_marksobt'] ?></span><br>
                <label for="x_percent">X Percentage</label>
                <span><?php echo $row['x_percent'] ?></span><br>
                <label for="x_yop">X Year Of Passing</label>
                <span><?php echo $row['x_yop'] ?></span><br>
                <label for="x_board">X Board</label>
                <span><?php echo $row['x_board'] ?></span><br>
                <label for="xii_maxmarks">XII Maximum Marks</label>
                <span><?php echo $row['xii_maxmarks'] ?></span><br>
                <label for="xii_marksobt">XII Marks Obtained</label>
                <span><?php echo $row['xii_marksobt'] ?></span><br>
                <label for="xii_percent">XII Percentage</label>
                <span><?php echo $row['xii_percent'] ?></span><br>
                <label for="xii_yop">XII Year Of Passing</label>
                <span><?php echo $row['xii_yop'] ?></span><br>
                <label for="xii_board">XII Board</label>
                <span><?php echo $row['xii_board'] ?></span><br>
                <label for="sem1">Semester1 CGPA</label>
                <span><?php echo $row['sem1'] ?></span><br>
                <label for="sem2">Semester2 CGPA</label>
                <span><?php echo $row['sem2'] ?></span><br>
                <label for="sem3">Semester3 CGPA</label>
                <span><?php echo $row['sem3'] ?></span><br>
                <label for="sem4">Semester4 CGPA</label>
                <span><?php echo $row['sem1'] ?></span><br>
                <label for="sem5">Semester5 CGPA</label>
                <span><?php echo $row['sem5'] ?></span><br>
                <label for="tmi">Two Month Internship</label>
                <span><?php echo $row['tmi'] ?></span><br>
                <label for="placed_company1">Placed Company 1</label>
                <span><?php echo $row['placed_company1'] ?></span><br>
                <label for="placed_comp1_date">Placed Comapany 1 Date</label>
                <span><?php echo $row['placed_comp1_date'] ?></span><br>
                <label for="placed_company2">Placed Company 2</label>
                <span><?php echo $row['placed_company2'] ?></span><br>
                <label for="placed_comp2_date">Placed Company 2 Date</label>
                <span><?php echo $row['placed_comp2_date'] ?></span><br>
                <label for="placed_company3">Placed Company 3</label>
                <span><?php echo $row['placed_company3'] ?></span><br>
                <label for="placed_comp3_date">Placed Company 3 Date</label>
                <span><?php echo $row['placed_comp3_date'] ?></span>

                <?php 
           }
         }
        }

         else if($val=='stud_id')
         {
          $input=$_POST["smartid"];
          $sql="SELECT * FROM studentdb WHERE stud_id='$input'";
          $res=mysqli_query($conn, $sql);
          if (mysqli_num_rows($res) == 0)
          {
           echo '<script type="text/javascript">

            window.onload = function () { alert("NO RECORD FOUND, PLEASE ENTER CORRECT DATA!!"); }

           </script>';
          }else{
          while($row = mysqli_fetch_assoc($res))
          {
            ?>
            <label for="rno">Roll No.</label>
            <span><?php echo $row['rno'] ?></span><br>
            <label for="stud_id">Smart Card Id</label>
            <span><?php echo $row['stud_id'] ?></span><br>
            <label for="class">Class</label>
            <span><?php echo $row['class'] ?></span> <br>
            <label for="fname">First Name</label>
            <span><?php echo $row['fname'] ?></span><br>
            <label for="fname">Middle Name</label>
            <span><?php echo $row['mname'] ?></span><br>
            <label for="lname">Last Name</label>
            <span><?php echo $row['lname'] ?></span><br>
            <label for="p_mailid">Personal Mail Id</label>
            <span><?php echo $row['p_mailid'] ?></span><br>
            <label for="b_mailid">Banasthali Mail Id</label>
            <span><?php echo $row['b_mailid'] ?></span><br>
            <label for="scontact_no">Student Contact No.</label>
            <span><?php echo $row['scontact_no'] ?></span><br>
            <label for="swhatsapp_no">Student WhatsApp No.</label>
            <span><?php echo $row['swhatsapp_no'] ?></span><br>
            <label for="enroll_no">Enrollment No.</label>
            <span><?php echo $row['enroll_no'] ?></span><br>
            <label for="father_name">Father's Name</label>
            <span><?php echo $row['father_name'] ?></span><br>
            <label for="mother_name">Mother's Name</label>
            <span><?php echo $row['mother_name'] ?></span><br>
            <label for="pcontact_no">Parent's Contact No.</label>
            <span><?php echo $row['p_contactno'] ?></span><br>
            <label for="landline_no">Landline No.</label>
            <span><?php echo $row['landline_no'] ?></span><br>
            <label for="address_1">Address Line 1</label>
            <span><?php echo $row['address_1'] ?></span><br>
            <label for="address_2">Address Line 2</label>
            <span><?php echo $row['address_2'] ?></span><br>
            <label for="address_3">Address Line 3</label>
            <span><?php echo $row['address_3'] ?></span><br>
            <label for="district">District</label>
            <span><?php echo $row['district'] ?></span><br>
            <label for="state">Sstate</label>
            <span><?php echo $row['state'] ?></span><br>
            <label for="pincode">Pincode</label>
            <span><?php echo $row['pincode'] ?></span><br>
            <label for="dob">Date Of Birth</label>
            <span><?php echo $row['dob'] ?></span><br>
            <label for="x_maxmarks">X Maximum Marks</label>
            <span><?php echo $row['x_maxmarks'] ?></span><br>
            <label for="x_marksobt">X Marks Obtained</label>
            <span><?php echo $row['x_marksobt'] ?></span><br>
            <label for="x_percent">X Percentage</label>
            <span><?php echo $row['x_percent'] ?></span><br>
            <label for="x_yop">X Year Of Passing</label>
            <span><?php echo $row['x_yop'] ?></span><br>
            <label for="x_board">X Board</label>
            <span><?php echo $row['x_board'] ?></span><br>
            <label for="xii_maxmarks">XII Maximum Marks</label>
            <span><?php echo $row['xii_maxmarks'] ?></span><br>
            <label for="xii_marksobt">XII Marks Obtained</label>
            <span><?php echo $row['xii_marksobt'] ?></span><br>
            <label for="xii_percent">XII Percentage</label>
            <span><?php echo $row['xii_percent'] ?></span><br>
            <label for="xii_yop">XII Year Of Passing</label>
            <span><?php echo $row['xii_yop'] ?></span><br>
            <label for="xii_board">XII Board</label>
            <span><?php echo $row['xii_board'] ?></span><br>
            <label for="sem1">Semester1 CGPA</label>
            <span><?php echo $row['sem1'] ?></span><br>
            <label for="sem2">Semester2 CGPA</label>
            <span><?php echo $row['sem2'] ?></span><br>
            <label for="sem3">Semester3 CGPA</label>
            <span><?php echo $row['sem3'] ?></span><br>
            <label for="sem4">Semester4 CGPA</label>
            <span><?php echo $row['sem1'] ?></span><br>
            <label for="sem5">Semester5 CGPA</label>
            <span><?php echo $row['sem5'] ?></span><br>
            <label for="tmi">Two Month Internship</label>
            <span><?php echo $row['tmi'] ?></span><br>
            <label for="placed_company1">Placed Company 1</label>
            <span><?php echo $row['placed_company1'] ?></span><br>
            <label for="placed_comp1_date">Placed Comapany 1 Date</label>
            <span><?php echo $row['placed_comp1_date'] ?></span><br>
            <label for="placed_company2">Placed Company 2</label>
            <span><?php echo $row['placed_company2'] ?></span><br>
            <label for="placed_comp2_date">Placed Company 2 Date</label>
            <span><?php echo $row['placed_comp2_date'] ?></span><br>
            <label for="placed_company3">Placed Company 3</label>
            <span><?php echo $row['placed_company3'] ?></span><br>
            <label for="placed_comp3_date">Placed Company 3 Date</label>
            <span><?php echo $row['placed_comp3_date'] ?></span>

            <?php 
          }
        }
      }
      
        else if($val=='p_mailid')
        {
          $input=$_POST["mail"];
          $sql="SELECT * FROM studentdb WHERE p_mailid='$input'";
          $res=mysqli_query($conn, $sql);
          if (mysqli_num_rows($res) == 0)
          {
           echo '<script type="text/javascript">

            window.onload = function () { alert("NO RECORD FOUND, PLEASE ENTER CORRECT DATA!!"); }

           </script>';
          }else{
          while($row = mysqli_fetch_assoc($res))
          {
            ?>
            <label for="rno">Roll No.</label>
            <span><?php echo $row['rno'] ?></span><br>
            <label for="stud_id">Smart Card Id</label>
            <span><?php echo $row['stud_id'] ?></span><br>
            <label for="class">Class</label>
            <span><?php echo $row['class'] ?></span> <br>
            <label for="fname">First Name</label>
            <span><?php echo $row['fname'] ?></span><br>
            <label for="fname">Middle Name</label>
            <span><?php echo $row['mname'] ?></span><br>
            <label for="lname">Last Name</label>
            <span><?php echo $row['lname'] ?></span><br>
            <label for="p_mailid">Personal Mail Id</label>
            <span><?php echo $row['p_mailid'] ?></span><br>
            <label for="b_mailid">Banasthali Mail Id</label>
            <span><?php echo $row['b_mailid'] ?></span><br>
            <label for="scontact_no">Student Contact No.</label>
            <span><?php echo $row['scontact_no'] ?></span><br>
            <label for="swhatsapp_no">Student WhatsApp No.</label>
            <span><?php echo $row['swhatsapp_no'] ?></span><br>
            <label for="enroll_no">Enrollment No.</label>
            <span><?php echo $row['enroll_no'] ?></span><br>
            <label for="father_name">Father's Name</label>
            <span><?php echo $row['father_name'] ?></span><br>
            <label for="mother_name">Mother's Name</label>
            <span><?php echo $row['mother_name'] ?></span><br>
            <label for="pcontact_no">Parent's Contact No.</label>
            <span><?php echo $row['p_contactno'] ?></span><br>
            <label for="landline_no">Landline No.</label>
            <span><?php echo $row['landline_no'] ?></span><br>
            <label for="address_1">Address Line 1</label>
            <span><?php echo $row['address_1'] ?></span><br>
            <label for="address_2">Address Line 2</label>
            <span><?php echo $row['address_2'] ?></span><br>
            <label for="address_3">Address Line 3</label>
            <span><?php echo $row['address_3'] ?></span><br>
            <label for="district">District</label>
            <span><?php echo $row['district'] ?></span><br>
            <label for="state">Sstate</label>
            <span><?php echo $row['state'] ?></span><br>
            <label for="pincode">Pincode</label>
            <span><?php echo $row['pincode'] ?></span><br>
            <label for="dob">Date Of Birth</label>
            <span><?php echo $row['dob'] ?></span><br>
            <label for="x_maxmarks">X Maximum Marks</label>
            <span><?php echo $row['x_maxmarks'] ?></span><br>
            <label for="x_marksobt">X Marks Obtained</label>
            <span><?php echo $row['x_marksobt'] ?></span><br>
            <label for="x_percent">X Percentage</label>
            <span><?php echo $row['x_percent'] ?></span><br>
            <label for="x_yop">X Year Of Passing</label>
            <span><?php echo $row['x_yop'] ?></span><br>
            <label for="x_board">X Board</label>
            <span><?php echo $row['x_board'] ?></span><br>
            <label for="xii_maxmarks">XII Maximum Marks</label>
            <span><?php echo $row['xii_maxmarks'] ?></span><br>
            <label for="xii_marksobt">XII Marks Obtained</label>
            <span><?php echo $row['xii_marksobt'] ?></span><br>
            <label for="xii_percent">XII Percentage</label>
            <span><?php echo $row['xii_percent'] ?></span><br>
            <label for="xii_yop">XII Year Of Passing</label>
            <span><?php echo $row['xii_yop'] ?></span><br>
            <label for="xii_board">XII Board</label>
            <span><?php echo $row['xii_board'] ?></span><br>
            <label for="sem1">Semester1 CGPA</label>
            <span><?php echo $row['sem1'] ?></span><br>
            <label for="sem2">Semester2 CGPA</label>
            <span><?php echo $row['sem2'] ?></span><br>
            <label for="sem3">Semester3 CGPA</label>
            <span><?php echo $row['sem3'] ?></span><br>
            <label for="sem4">Semester4 CGPA</label>
            <span><?php echo $row['sem1'] ?></span><br>
            <label for="sem5">Semester5 CGPA</label>
            <span><?php echo $row['sem5'] ?></span><br>
            <label for="tmi">Two Month Internship</label>
            <span><?php echo $row['tmi'] ?></span><br>
            <label for="placed_company1">Placed Company 1</label>
            <span><?php echo $row['placed_company1'] ?></span><br>
            <label for="placed_comp1_date">Placed Comapany 1 Date</label>
            <span><?php echo $row['placed_comp1_date'] ?></span><br>
            <label for="placed_company2">Placed Company 2</label>
            <span><?php echo $row['placed_company2'] ?></span><br>
            <label for="placed_comp2_date">Placed Company 2 Date</label>
            <span><?php echo $row['placed_comp2_date'] ?></span><br>
            <label for="placed_company3">Placed Company 3</label>
            <span><?php echo $row['placed_company3'] ?></span><br>
            <label for="placed_comp3_date">Placed Company 3 Date</label>
            <span><?php echo $row['placed_comp3_date'] ?></span>

            <?php 
          }
        }
      }

        else if($val=='b_mailid')
        {
          $input=$_POST["bmail"];
          $sql="SELECT * FROM studentdb WHERE b_mailid='$input'";
           $res=mysqli_query($conn, $sql);
           if (mysqli_num_rows($res) == 0)
           {
            echo '<script type="text/javascript">

             window.onload = function () { alert("NO RECORD FOUND, PLEASE ENTER CORRECT DATA!!"); }

            </script>';
           }else{
           while($row = mysqli_fetch_assoc($res))
           {
            ?>
            <label for="rno">Roll No.</label>
            <span><?php echo $row['rno'] ?></span><br>
            <label for="stud_id">Smart Card Id</label>
            <span><?php echo $row['stud_id'] ?></span><br>
            <label for="class">Class</label>
            <span><?php echo $row['class'] ?></span> <br>
            <label for="fname">First Name</label>
            <span><?php echo $row['fname'] ?></span><br>
            <label for="fname">Middle Name</label>
            <span><?php echo $row['mname'] ?></span><br>
            <label for="lname">Last Name</label>
            <span><?php echo $row['lname'] ?></span><br>
            <label for="p_mailid">Personal Mail Id</label>
            <span><?php echo $row['p_mailid'] ?></span><br>
            <label for="b_mailid">Banasthali Mail Id</label>
            <span><?php echo $row['b_mailid'] ?></span><br>
            <label for="scontact_no">Student Contact No.</label>
            <span><?php echo $row['scontact_no'] ?></span><br>
            <label for="swhatsapp_no">Student WhatsApp No.</label>
            <span><?php echo $row['swhatsapp_no'] ?></span><br>
            <label for="enroll_no">Enrollment No.</label>
            <span><?php echo $row['enroll_no'] ?></span><br>
            <label for="father_name">Father's Name</label>
            <span><?php echo $row['father_name'] ?></span><br>
            <label for="mother_name">Mother's Name</label>
            <span><?php echo $row['mother_name'] ?></span><br>
            <label for="pcontact_no">Parent's Contact No.</label>
            <span><?php echo $row['p_contactno'] ?></span><br>
            <label for="landline_no">Landline No.</label>
            <span><?php echo $row['landline_no'] ?></span><br>
            <label for="address_1">Address Line 1</label>
            <span><?php echo $row['address_1'] ?></span><br>
            <label for="address_2">Address Line 2</label>
            <span><?php echo $row['address_2'] ?></span><br>
            <label for="address_3">Address Line 3</label>
            <span><?php echo $row['address_3'] ?></span><br>
            <label for="district">District</label>
            <span><?php echo $row['district'] ?></span><br>
            <label for="state">Sstate</label>
            <span><?php echo $row['state'] ?></span><br>
            <label for="pincode">Pincode</label>
            <span><?php echo $row['pincode'] ?></span><br>
            <label for="dob">Date Of Birth</label>
            <span><?php echo $row['dob'] ?></span><br>
            <label for="x_maxmarks">X Maximum Marks</label>
            <span><?php echo $row['x_maxmarks'] ?></span><br>
            <label for="x_marksobt">X Marks Obtained</label>
            <span><?php echo $row['x_marksobt'] ?></span><br>
            <label for="x_percent">X Percentage</label>
            <span><?php echo $row['x_percent'] ?></span><br>
            <label for="x_yop">X Year Of Passing</label>
            <span><?php echo $row['x_yop'] ?></span><br>
            <label for="x_board">X Board</label>
            <span><?php echo $row['x_board'] ?></span><br>
            <label for="xii_maxmarks">XII Maximum Marks</label>
            <span><?php echo $row['xii_maxmarks'] ?></span><br>
            <label for="xii_marksobt">XII Marks Obtained</label>
            <span><?php echo $row['xii_marksobt'] ?></span><br>
            <label for="xii_percent">XII Percentage</label>
            <span><?php echo $row['xii_percent'] ?></span><br>
            <label for="xii_yop">XII Year Of Passing</label>
            <span><?php echo $row['xii_yop'] ?></span><br>
            <label for="xii_board">XII Board</label>
            <span><?php echo $row['xii_board'] ?></span><br>
            <label for="sem1">Semester1 CGPA</label>
            <span><?php echo $row['sem1'] ?></span><br>
            <label for="sem2">Semester2 CGPA</label>
            <span><?php echo $row['sem2'] ?></span><br>
            <label for="sem3">Semester3 CGPA</label>
            <span><?php echo $row['sem3'] ?></span><br>
            <label for="sem4">Semester4 CGPA</label>
            <span><?php echo $row['sem1'] ?></span><br>
            <label for="sem5">Semester5 CGPA</label>
            <span><?php echo $row['sem5'] ?></span><br>
            <label for="tmi">Two Month Internship</label>
            <span><?php echo $row['tmi'] ?></span><br>
            <label for="placed_company1">Placed Company 1</label>
            <span><?php echo $row['placed_company1'] ?></span><br>
            <label for="placed_comp1_date">Placed Comapany 1 Date</label>
            <span><?php echo $row['placed_comp1_date'] ?></span><br>
            <label for="placed_company2">Placed Company 2</label>
            <span><?php echo $row['placed_company2'] ?></span><br>
            <label for="placed_comp2_date">Placed Company 2 Date</label>
            <span><?php echo $row['placed_comp2_date'] ?></span><br>
            <label for="placed_company3">Placed Company 3</label>
            <span><?php echo $row['placed_company3'] ?></span><br>
            <label for="placed_comp3_date">Placed Company 3 Date</label>
            <span><?php echo $row['placed_comp3_date'] ?></span>

            <?php 
           }
          }
         }

         else if($val=='null'){
          echo '<script type="text/javascript">

          window.onload = function () { alert("ENTER CORRECT INPUT!!"); }

         </script>';
         }
         else{
          echo '<script type="text/javascript">

          window.onload = function () { alert("ENTER CORRECT INPUT!!"); }

         </script>';
         }

       }
    ?>
</div>
</body>
</html>


