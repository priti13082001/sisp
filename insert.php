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
    


    if(isset($_POST['insert']))
    {
                $rno =$_POST["rno"];   
                $stud_id =$_POST["stud_id"];  
            $class = $_POST["class"];
$fname = $_POST["fname"];
       $fname=ucwords(strtolower($fname));
        $mname = $_POST["mname"];
        $mname=ucwords(strtolower($mname));
        $lname = $_POST["lname"];
        $lname=ucwords(strtolower($lname));
 $p_mailid = $_POST["p_mailid"];
 $b_mailid = $_POST["b_mailid"];
 $scontact_no = $_POST["scontact_no"];
 $swhatsapp_no = $_POST["swhatsapp_no"];
       
        $enroll_no = $_POST["enroll_no"];
$father_name = $_POST["father_name"];
$father_name=ucwords(strtolower($father_name));
$mother_name = $_POST["mother_name"];
$mother_name=ucwords(strtolower($mother_name));
 $p_contactno = $_POST["p_contactno"];
        
        $landline_no = $_POST["landline_no"];
        $address_1 = $_POST["address_1"];
        $address_2 = $_POST["address_2"];
        $address_3 = $_POST["address_3"];
        $district = $_POST["district"];
        $district=ucwords(strtolower($district));
        $state = $_POST["state"];
        $state=ucwords(strtolower($state));
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
        $placed_company1=ucwords(strtolower($placed_company1));
        $placed_comp1_date = $_POST["placed_comp1_date"];
        $placed_company2 = $_POST["placed_company2"];
        $placed_company2=ucwords(strtolower($placed_company2));
        $placed_comp2_date = $_POST["placed_comp2_date"];
        $placed_company3 = $_POST["placed_company3"];
        $placed_company3=ucwords(strtolower($placed_company3));
        $placed_comp3_date = $_POST["placed_comp3_date"];

        $sql1="SELECT * FROM studentdb WHERE rno='$rno'";
        $res1=mysqli_query($conn, $sql1);
        $sql2="SELECT * FROM studentdb WHERE stud_id='$stud_id'";
        $res2=mysqli_query($conn, $sql2);
        $sql3="SELECT * FROM studentdb WHERE p_mailid='$p_mailid'";
        $res3=mysqli_query($conn, $sql3);
        $sql4="SELECT * FROM studentdb WHERE b_mailid='$b_mailid'";
        $res4=mysqli_query($conn, $sql4);
        if(mysqli_num_rows($res1) == 0 && mysqli_num_rows($res2) == 0 && mysqli_num_rows($res3) == 0 && mysqli_num_rows($res4) == 0)
        {
            $sql="INSERT INTO `studentdb` (`rno`,`stud_id`,`class`,`fname`,`mname`,`lname`,`p_mailid`,`b_mailid`, `scontact_no`, `swhatsapp_no`, `enroll_no`, `father_name`, `mother_name`, `p_contactno`, `landline_no`, `address_1`, `address_2`, `address_3`, `district`, `state`, `pincode`, `dob`, `x_maxmarks`, `x_marksobt`, `x_percent`, `x_yop`, `x_board`,`xii_maxmarks`, `xii_marksobt`, `xii_percent`, `xii_yop`, `xii_board`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `tmi`, `placed_company1`, `placed_comp1_date`, `placed_company2`, `placed_comp2_date`, `placed_company3`, `placed_comp3_date`) VALUES ('$rno', '$stud_id', '$class', '$fname', '$mname', '$lname', '$p_mailid', '$b_mailid', '$scontact_no', '$swhatsapp_no', '$enroll_no', '$father_name', '$mother_name', '$p_contactno', '$landline_no', '$address_1', '$address_2', '$address_3', '$district', '$state', ' $pincode', '$dob', '$x_maxmarks', '$x_marksobt', '$x_percent', ' $x_yop', '$x_board', '$xii_maxmarks', '$xii_marksobt', '$xii_percent', ' $xii_yop', '$xii_board', '$sem1', '$sem2', '$sem3', '$sem4', '$sem5', ' $tmi', '$placed_company1', '$placed_comp1_date', '$placed_company2', '$placed_comp2_date', '$placed_company3', '$placed_comp3_date');";
            $result=mysqli_query($conn, $sql);
    
            if ($result) {
             echo '<script type="text/javascript">

             window.onload = function () { alert("RECORD ADDED SUCCESSFULLY!!"); }

            </script>';
            } 
            else {
              echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
        }
        else{
            echo '<script type="text/javascript">

                window.onload = function () { alert("Roll No.,Student Id, Banasthali Mail id and Personal Mail id should be unique!!"); }

            </script>';
        }
           mysqli_close($conn);
 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="hp.css">
    <title>Insert Details</title>
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
            <a href="javascript:void(0)" class="dropbtn" style="padding-right: 20px"><i
                    class="fa-solid fa-user"></i></a>
            <div class="dropdown-content" style="right:0">
            <a href="AddUser.php"><i class="fa-solid fa-plus" style="padding-right: 5px"></i>Add User</a>
                <a href="TPOpass.php"><i class="fa-solid fa-unlock-keyhole" style="padding-right: 5px"></i>Change
                    Password</a>
                <a href="https://forms.gle/zKKU5MmP4KP7t1Fw6"><i class="fa-solid fa-circle-question"
                        style="padding-right: 5px"></i>Help</a>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="padding-right: 5px"></i>Log
                    Out</a>
            </div>
        </li>
    </ul>

    <div class="heading">
        <h1>Insert Student Details</h1>
    </div>
    <div class="insert-container">
        <div class="box1">
            <form action="" method="POST" autocomplete="off">

                <div class="personal">
                    <label for="rno">Roll No.<span class="required">*</span></label>
                    <input type="text" name="rno" id="rno" placeholder="Enter Student's Roll No" pattern="[0-9]{7}"
                        maxlength="7" title="Should be numeric and of length 7" required>
                </div>
                <div class="personal">
                    <label for="stud_id">SmartCard ID<span class="required">*</span></label>
                    <input type="text" name="stud_id" id="stud_id" placeholder="Enter Student ID"
                        pattern="[A-Za-z]{5}[0-9]{5}" maxlength="10"
                        title="Should be of length 10 with alphabets followed by numbers" required>
                </div>
                <div class="personal">
                    <label for="class">Class<span class="required">*</span></label>
                    <input type="text" name="class" id="class" placeholder="Ex. B.TECH(CS) III YEAR"
                        value="B.TECH(CS) III YEAR" required>
                </div>
                <div class="personal">
                    <label for="fname">First Name<span class="required">*</span></label>
                    <input type="text" name="fname" id="fname" placeholder="Enter Student's First Name"
                        pattern="[A-Za-z]{1-20}" maxlength="20" title="Should contain only alphabets" required>
                </div>
                <div class="personal">
                    <label for="fname">Middle Name</label>
                    <input type="text" name="mname" id="mname" placeholder="Enter Student's Middle Name"
                        pattern="[A-Za-z]{1-20}" maxlength="20" title="Should contain only alphabets">
                </div>
                <div class="personal">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter Student's Last Name"
                        pattern="[A-Za-z]{1-20}" maxlength="20" title="Should contain only alphabets">
                </div>
                <div class="personal">
                    <label for="p_mailid">Personal Mail ID<span class="required">*</span></label>
                    <input type="email" name="p_mailid" id="p_mailid" placeholder="Enter Student's Personal Mail id"
                        maxlength="50" required>
                </div>
                <div class="personal">
                    <label for="b_mailid">Banasthali Mail ID<span class="required">*</span></label>
                    <input type="email" name="b_mailid" id="b_mailid" placeholder="Enter Student's Banasthali Mail id"
                        maxlength="50" required>
                </div>
                <div class="personal">
                    <label for="scontact_no">Student's Contact No.<span class="required">*</span></label>
                    <input type="phone" name="scontact_no" id="scontact_no" placeholder="Enter Student Contact No."
                        pattern="[6789][0-9]{9}" maxlength="10"
                        title="Please enter valid phone number. It should be 10 digits long and begin with either 6,7,8 or 9"
                        required>
                </div>
                <div class="personal">
                    <label for="swhatsapp_no">Student's WhatsApp No.<span class="required">*</span></label>
                    <input type="phone" name="swhatsapp_no" id="swhatsapp_no" placeholder="Enter Student Whatsapp No."
                        pattern="[6789][0-9]{9}" maxlength="10"
                        title="Please enter valid phone number. It should be 10 digits long and begin with either 6,7,8 or 9"
                        required>
                </div>
                <div class="personal">
                    <label for="enroll_no">Enrollment No.<span class="required">*</span></label>
                    <input type="text" name="enroll_no" id="enroll_no" placeholder="Enter Student Enrollment No."
                        pattern="[0-9]{1-4}+//+[0-9]{1-4}" title="Should be of format xxxx/xxxx" required>
                </div>
                <div class="personal">
                    <label for="father_name">Father's Name<span class="required">*</span></label>
                    <input type="text" name="father_name" id="father_name" placeholder="Enter Student's Father Name"
                        pattern="[A-Za-z\s]{1-35}" maxlength="35" title="Should contain only alphabets and spaces"
                        required>
                </div>
                <div class="personal">
                    <label for="mother_name">Mother's Name</label>
                    <input type="text" name="mother_name" id="mother_name" placeholder="Enter Student's Mother Name"
                        pattern="[A-Za-z\s]{1-35}" maxlength="35" title="Should contain only alphabets and spaces">
                </div>
                <div class="personal">
                    <label for="pcontact_no">Parent's Contact No.</label>
                    <input type="phone" name="p_contactno" id="p_contactno" placeholder="Enter Parent's Contact No."
                        pattern="[6789][0-9]{9}" maxlength="10"
                        title="Please enter valid phone number. It should be 10 digits long and begin with either 6,7,8 or 9">
                </div>
                <div class="personal">
                    <label for="landline_no">Landline No.</label>
                    <input type="text" name="landline_no" id="landline_no" placeholder="Enter Landline No.(if any)">
                </div>
                <div class="personal">
                    <label for="address_1">Address Line 1<span class="required">*</span></label>
                    <input type="text" name="address_1" id="address_1" placeholder="Enter Student's Address" required>
                </div>
                <div class="personal">
                    <label for="address_2">Address Line 2</label>
                    <input type="text" name="address_2" id="address_2" placeholder="Enter Student's Address">
                </div>
                <div class="personal">
                    <label for="address_3">Address Line 3</label>
                    <input type="text" name="address_3" id="address_3" placeholder="Enter Student's Address">
                </div>
                <div class="personal">
                    <label for="district">District<span class="required">*</span></label>
                    <input type="text" name="district" id="district" placeholder="Enter District"
                        pattern="[A-Za-z/s]{1-50}" maxlength="50" title="Should contain only alphabets and spaces"
                        required>
                </div>
                <div class="personal">
                    <label for="state">State<span class="required">*</span></label>
                    <select name="state" id="state">
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
                <div class="personal">
                    <label for="pincode">Pincode<span class="required">*</span></label>
                    <input type="text" name="pincode" id="pincode" placeholder="Enter Pincode" pattern="[0-9]{1-6}"
                        maxlentgh="6" title="Should be 6 digit numeric code" required>
                </div>
                <div class="personal">
                    <label for="dob">Date of Birth<span class="required">*</span></label>
                    <input type="date" name="dob" id="dob" placeholder="Enter Student's DOB" required>
                </div>
        </div>
        <div class="box2">
            <div class="academic">
                <label for="x_maxmarks">X Max Marks</label>
                <input type="text" name="x_maxmarks" id="x_maxmarks" placeholder="Enter Student's X Max Marks"
                    pattern="[0-9]{1-3]" maxlength="3" title="Can be 3 digit value">
            </div>
            <div class="academic">
                <label for="x_marksobt">X Marks Obtained</label>
                <input type="text" name="x_marksobt" id="x_marksobt" placeholder="Enter Student's X Marks Obt."
                    pattern="[0-9]{1-3]+/.+[0-9][1-2]" maxlength="6" title="Can be of form xxx.xx">
            </div>
            <div class="academic">
                <label for="x_percent">X Percentage</label>
                <input type="text" name="x_percent" id="x_percent" placeholder="Enter Student's X Percentage"
                    pattern="[0-9]{1-3]+/.+[0-9][1-2]" maxlength="6" title="Can be of form xxx.xx">
            </div>
            <div class="academic">
                <label for="x_yop">X Year of Passing</label>
                <input type="year" name="x_yop" id="x_yop" placeholder="Enter Student's X Year of Passing"
                    pattern="[0-9]{1-4}" maxlength="4" title="Should be form of YYYY">
            </div>
            <div class="academic">
                <label for="x_board">X Board</label>
                <input type="text" name="x_board" id="x_board" placeholder="Enter Student's X Board"
                    pattern="[A-Za-z/s]{1-150}" maxlength="150" title="Should conatin only alphabets and spaces">
            </div>
            <div class="academic">
                <label for="xii_maxmarks">XII Max Marks</label>
                <input type="text" name="xii_maxmarks" id="xii_maxmarks" placeholder="Enter Student's XII Max Marks"
                    pattern="[0-9]{1-3]" maxlength="3" title="Can be 3 digit value">
            </div>
            <div class="academic">
                <label for="xii_marksobt">XII Marks Obt.</label>
                <input type="text" name="xii_marksobt" id="xii_marksobt" placeholder="Enter Student's XII Marks Obt."
                    pattern="[0-9]{1-3]" maxlength="3" title="Can be 3 digit value">
            </div>
            <div class="academic">
                <label for="xii_percent">XII Percentage</label>
                <input type="text" name="xii_percent" id="xii_percent" placeholder="Enter Student's XII Percentage"
                    pattern="[0-9]{1-3]+/.+[0-9][1-2]" maxlength="6" title="Can be of form xxx.xx">
            </div>
            <div class="academic">
                <label for="xii_yop">XII Year of Passing</label>
                <input type="year" name="xii_yop" id="xii_yop" placeholder="Enter Student's XII Year of Passing"
                    pattern="[0-9]{1-4}" maxlength="4" title="Should be form of YYYY">
            </div>
            <div class="academic">
                <label for="xii_board">XII Board</label>
                <input type="text" name="xii_board" id="xii_board" placeholder="Enter Student's XII Board"
                    pattern="[A-Za-z/s]{1-150}" maxlength="150" title="Should conatin only alphabets and spaces">
            </div>
            <div class="academic">
                <label for="sem1">Semester 1 CGPA</label>
                <input type="text" name="sem1" id="sem1" placeholder="Enter Student's Semester 1 CGPA"
                    pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx">
            </div>
            <div class="academic">
                <label for="sem2">Semester 2 CGPA</label>
                <input type="text" name="sem2" id="sem2" placeholder="Enter Student's Semester 2 CGPA"
                    pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx">
            </div>
            <div class="academic">
                <label for="sem3">Semester 3 CGPA</label>
                <input type="text" name="sem3" id="sem3" placeholder="Enter Student's Semester 3 CGPA"
                    pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx">
            </div>
            <div class="academic">
                <label for="sem4">Semester 4 CGPA</label>
                <input type="text" name="sem4" id="sem1" placeholder="Enter Student's Semester 4 CGPA"
                    pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx">
            </div>
            <div class="academic">
                <label for="sem5">Semester 5 CGPA</label>
                <input type="text" name="sem5" id="sem5" placeholder="Enter Student's Semester 5 CGPA"
                    pattern="[0-9]{1-2]+/.+[0-9][1-2]" maxlength="5" title="Can be of form xx.xx">
            </div>
            <div class="academic">
                <label for="tmi">Two Month Internship</label>
                <input type="text" name="tmi" id="tmi" placeholder="Enter Student's TMI company(if any)">
            </div>
            <div class="academic">
                <label for="placed_company1">Placed Company 1</label>
                <input type="text" name="placed_company1" id="placed_company1"
                    placeholder="Enter Student's Placed Company 1(if any)">
            </div>
            <div class="academic">
                <label for="placed_comp1_date">Placed Company 1 Date</label>
                <input type="date" name="placed_comp1_date" id="placed_comp1_date"
                    placeholder="Enter Student's Placed Company 1 Date(if any)">
            </div>
            <div class="academic">
                <label for="placed_company2">Placed Company 2</label>
                <input type="text" name="placed_company2" id="placed_company2"
                    placeholder="Enter Student's Placed Company 2(if any)">
            </div>
            <div class="academic">
                <label for="placed_comp2_date">Placed Company 2 Date</label>
                <input type="date" name="placed_comp2_date" id="placed_comp2_date"
                    placeholder="Enter Student's Placed Company 2 Date(if any)">
            </div>
            <div class="academic">
                <label for="placed_company3">Placed Company 3</label>
                <input type="text" name="placed_company3" id="placed_company3"
                    placeholder="Enter Student's Placed Company 3(if any)">
            </div>
            <div class="academic">
                <label for="placed_comp3_date">Placed Company 3 Date</label>
                <input type="date" name="placed_comp3_date" id="placed_comp3_date"
                    placeholder="Enter Student's Placed Company 3 Date(if any)">
            </div>
            <div class="btn1">
                <button type="submit" name="insert"> Insert </button>
            </div>
            <div class="btn2">
                <button type="reset" name="reset">Reset </button>
            </div>

        </div>
        </form>
    </div>

    <script type="text/javascript">

        function forceInputUppercase(e) {
            var start = e.target.selectionStart;
            var end = e.target.selectionEnd;
            e.target.value = e.target.value.toUpperCase();
            e.target.setSelectionRange(start, end);
        }
        function forceInputLowercase(e) {
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