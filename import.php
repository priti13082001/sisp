<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
  <title>TPO</title>
  <link rel="stylesheet" href="hp.css">

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
    <a href="AddUser.php"><i class="fa-solid fa-unlock-keyhole" style="padding-right: 5px"></i>Add User</a>
      <a href="TPOpass.php"><i class="fa-solid fa-unlock-keyhole" style="padding-right: 5px"></i>Change Password</a>
      <a href="https://forms.gle/zKKU5MmP4KP7t1Fw6"><i class="fa-solid fa-circle-question" style="padding-right: 5px"></i>Help</a>
      <a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="padding-right: 5px"></i>Log Out</a>
    </div>
  </li>
</ul>
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
if(isset($_POST['submit'])){
	$file=$_FILES['doc']['tmp_name'];
	
	$ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
	if($ext=='xlsx'){
		require('PHPExcel/PHPExcel.php');
		require('PHPExcel/PHPExcel/IOFactory.php');
		
		
		$obj=PHPExcel_IOFactory::load($file);
		foreach($obj->getWorksheetIterator() as $sheet){
			$getHighestRow=$sheet->getHighestRow();
			for($i=0;$i<=$getHighestRow;$i++){
				$rno=$sheet->getCellByColumnAndRow(0,$i)->getValue();
				$stud_id=$sheet->getCellByColumnAndRow(1,$i)->getValue();
				$class=$sheet->getCellByColumnAndRow(2,$i)->getValue();
				$fname=$sheet->getCellByColumnAndRow(3,$i)->getValue();
				$mname=$sheet->getCellByColumnAndRow(4,$i)->getValue();
				$lname=$sheet->getCellByColumnAndRow(5,$i)->getValue();
				$p_mailid=$sheet->getCellByColumnAndRow(6,$i)->getValue();
				$b_mailid=$sheet->getCellByColumnAndRow(7,$i)->getValue();
				$scontact_no=$sheet->getCellByColumnAndRow(8,$i)->getValue();
				$swhatsapp_no=$sheet->getCellByColumnAndRow(9,$i)->getValue();
				$enroll_no=$sheet->getCellByColumnAndRow(10,$i)->getValue();
				$father_name=$sheet->getCellByColumnAndRow(11,$i)->getValue();
				$mother_name=$sheet->getCellByColumnAndRow(12,$i)->getValue();
				$p_contactno=$sheet->getCellByColumnAndRow(13,$i)->getValue();
				$landline_no=$sheet->getCellByColumnAndRow(14,$i)->getValue();
				$address_1=$sheet->getCellByColumnAndRow(15,$i)->getValue();
				$address_2=$sheet->getCellByColumnAndRow(16,$i)->getValue();
				$address_3=$sheet->getCellByColumnAndRow(17,$i)->getValue();
				$district=$sheet->getCellByColumnAndRow(18,$i)->getValue();
				$state=$sheet->getCellByColumnAndRow(19,$i)->getValue();
				$pincode=$sheet->getCellByColumnAndRow(20,$i)->getValue();
				$dob=$sheet->getCellByColumnAndRow(21,$i)->getValue();
				$x_maxmarks=$sheet->getCellByColumnAndRow(22,$i)->getValue();
				$x_marksobt=$sheet->getCellByColumnAndRow(23,$i)->getValue();
				$x_percent=$sheet->getCellByColumnAndRow(24,$i)->getValue();
				$x_yop=$sheet->getCellByColumnAndRow(25,$i)->getValue();
				$x_board=$sheet->getCellByColumnAndRow(26,$i)->getValue();
				$xii_maxmarks=$sheet->getCellByColumnAndRow(27,$i)->getValue();
				$xii_marksobt=$sheet->getCellByColumnAndRow(28,$i)->getValue();
				$xii_percent=$sheet->getCellByColumnAndRow(29,$i)->getValue();
				$xii_yop=$sheet->getCellByColumnAndRow(30,$i)->getValue();
				$xii_board=$sheet->getCellByColumnAndRow(31,$i)->getValue();
				$sem1=$sheet->getCellByColumnAndRow(32,$i)->getValue();
				$sem2=$sheet->getCellByColumnAndRow(33,$i)->getValue();
				$sem3=$sheet->getCellByColumnAndRow(34,$i)->getValue();
				$sem4=$sheet->getCellByColumnAndRow(35,$i)->getValue();
				$sem5=$sheet->getCellByColumnAndRow(36,$i)->getValue();
				$tmi=$sheet->getCellByColumnAndRow(37,$i)->getValue();
				$placed_company1=$sheet->getCellByColumnAndRow(38,$i)->getValue();
				$placed_comp1_date=$sheet->getCellByColumnAndRow(39,$i)->getValue();
				$placed_company2=$sheet->getCellByColumnAndRow(40,$i)->getValue();
				$placed_comp2_date=$sheet->getCellByColumnAndRow(41,$i)->getValue();
				$placed_company3=$sheet->getCellByColumnAndRow(42,$i)->getValue();
				$placed_comp3_date=$sheet->getCellByColumnAndRow(43,$i)->getValue();

				if($rno!=''){

					$result=mysqli_query($conn,"INSERT INTO `studentdb` (`rno`,`stud_id`,`class`,`fname`,`mname`,`lname`,`p_mailid`,`b_mailid`, `scontact_no`, `swhatsapp_no`, `enroll_no`, `father_name`, `mother_name`, `p_contactno`, `landline_no`, `address_1`, `address_2`, `address_3`, `district`, `state`, `pincode`, `dob`, `x_maxmarks`, `x_marksobt`, `x_percent`, `x_yop`, `x_board`,`xii_maxmarks`, `xii_marksobt`, `xii_percent`, `xii_yop`, `xii_board`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `tmi`, `placed_company1`, `placed_comp1_date`, `placed_company2`, `placed_comp2_date`, `placed_company3`, `placed_comp3_date`) VALUES ('$rno', '$stud_id', '$class', '$fname', '$mname', '$lname', '$p_mailid', '$b_mailid', '$scontact_no', '$swhatsapp_no', '$enroll_no', '$father_name', '$mother_name', '$p_contactno', '$landline_no', '$address_1', '$address_2', '$address_3', '$district', '$state', ' $pincode', '$dob', '$x_maxmarks', '$x_marksobt', '$x_percent', ' $x_yop', '$x_board', '$xii_maxmarks', '$xii_marksobt', '$xii_percent', ' $xii_yop', '$xii_board', '$sem1', '$sem2', '$sem3', '$sem4', '$sem5', ' $tmi', '$placed_company1', '$placed_comp1_date', '$placed_company2', '$placed_comp2_date', '$placed_company3', '$placed_comp3_date')");
    
            if ($result) {
             echo '<script type="text/javascript">

             window.onload = function () { alert("RECORD ADDED SUCCESSFULLY!!"); }

            </script>';
            } 
            else {
              echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
	
				}
			}
		}
	}else{
		echo "Invalid file format";
	}
}
?>

<div class="import" style="top: 35vh; left:30vw; width:500px; height:250px; text-align: center; position:absolute;">
<form method="post" enctype="multipart/form-data">
	<input type="file" name="doc"/>
	<input type="submit" name="submit" class="imp"/>
</form>
</div>


