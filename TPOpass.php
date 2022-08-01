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
  // echo "Connected successfully";

  $errPass="";
  $new="";

if(isset($_POST['pass']))
{
  $uid =$_POST["uid"];  
  if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["id_password"]) === 0){
$errPass = 'Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit';
}
else {  
  $new =$_POST["id_password"];  
}  

    $conf =$_POST["conf_password"];  
  if( !$errPass) {  
    $sql="SELECT * FROM logindb WHERE uid='$uid'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==1)
    {
      if($new == $conf)
      {
        $update_query="UPDATE logindb SET password='$new' WHERE uid='$uid'";
        $result=mysqli_query($conn,$update_query);
        if($result)
        {
         echo '<script type="text/javascript">

          window.onload = function () { alert("PASSWORD CHANGED SUCCESSFULLY!!"); }

         </script>';  
        }
      }
       else{
         echo '<script type="text/javascript">

         window.onload = function () { alert("NEW PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH!!"); }

         </script>';
        }

    }
    else{
      echo '<script type="text/javascript">

      window.onload = function () { alert("PLEASE ENTER COREECT USER ID!!"); }

      </script>';
     }
    }
    else{
      echo "<script type='text/javascript'>

      window.onload = function () { alert('{$errPass}');}

         </script>";  
    }
}
mysqli_close($conn);  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="hp.css">
    <title>CHANGE PASSWORD</title>
</head>

<body>
  <div class="container-main">
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
    <div class="wrapper">
        <h1>Change Password</h1>
        <form action="" method="POST" autocomplete="off">
        <div class="row">
            <i class="fas fa-user"></i>
           <input name="uid" id="uid" type="text" placeholder="Username*" required >
            </div>
        <div class="row">
        <i class="fas fa-lock"></i>
            <input name="id_password" id="id_password" type="password" placeholder="Password*" required>
        </div>
        <div class="row">
        <i class="fas fa-lock"></i>
        <input name="conf_password" id="conf_password" type="password" placeholder="Confirm Password*" required>
        </div>
        <div class="check">
            <span>Show Password</span>
            <input type="checkbox" onclick="myFunction()">
        </div>        
        <div class="btn">
        <button type="submit" name="pass" class="login-btn">Done</button>
        </div>
        <div class="btn">
        <button type="reset" class="login-btn">Reset</button>
        </div>
    </div>
    </form>
</div>

    <script>
        function myFunction() {
          var y = document.getElementById("id_password");
          var z = document.getElementById("conf_password");
          if (y.type=== "password" || z.type==="password") {
            y.type="text";
            z.type="text";
          } else {
            y.type = "password";
            z.type = "password";
          }
        }
        </script>
</body>

</html>