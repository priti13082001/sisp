<?php  
session_start();  
  
if(!$_SESSION['role'])  
{  
  
    header("Location: Homepage.html");//redirect to the login page to secure the welcome page without login access.  
}  
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
  <title>TPC</title>
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
<div class="tpocenter">
<img src="TPC.png" class="heading" />
 <h1> Welcome, Training and Placement Cell Member!</h1>
</div>
</body>
</html>


