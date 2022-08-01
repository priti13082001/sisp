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
    <a href="AddUser.php"><i class="fa-solid fa-plus" style="padding-right: 5px"></i>Add User</a>
      <a href="TPOpass.php"><i class="fa-solid fa-unlock-keyhole" style="padding-right: 5px"></i>Change Password</a>
      <a href="https://forms.gle/zKKU5MmP4KP7t1Fw6"><i class="fa-solid fa-circle-question" style="padding-right: 5px"></i>Help</a>
      <a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="padding-right: 5px"></i>Log Out</a>
    </div>
  </li>
</ul>
<div class="tpocenter">
 <img src="TPO.png" class="heading" />
 <h1> Welcome, Training and Placement Officer!</h1>
</div>
</body>
</html>


