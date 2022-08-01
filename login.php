<?php
    session_start();
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
     //echo "Connected successfully";
     
     if (isset($_POST['login-btn'])){
        $uid=$_POST["uid"];
        $pwd=$_POST["id_password"];
      //$pwd=$_POST["password"];
        $role=$_POST["role"];
        $sql="SELECT * FROM logindb WHERE uid='$uid'and id_password='$pwd' and role='$role'";
        $result=mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0)
     {
        echo '<script type="text/javascript">

        window.onload = function () { alert("PLEASE ENTER COREECT LOGIN CREDENTIALS!!"); }

</script>';
     }
     else{
         if(strcmp($role,"TPC")==0){
            $_SESSION['role']=$role;
            $script = "<script>
            window.location = 'TPCMenu.php';</script>";
            echo $script;
        }
       else{
        $_SESSION['role']=$role;
        $script = "<script>
        window.location = 'TPOMenu.php';</script>";
        echo $script;
       }
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
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel ="stylesheet" href ="hp.css"> 
    <script src="https://kit.fontawesome.com/890a324f84.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-main">
    <div class ="showcase-container">
   <div class ="wrapper">
       <div class="title"><img src="Loginlogo.png" alt="Logo" /></div>
       <form action="" method="POST" autocomplete="off">
        <div class="row">
           <i class="fas fa-user"></i>
           <input name="uid" id="uid" type="text" placeholder="Username*" required >
           </div>
        <div class="row">
            <i class="fas fa-lock"></i>
            <input name="id_password" id="id_password" type="password" placeholder="Password*" required>
            <i class="far fa-eye" id="togglePassword" style="float: right;
            margin-left: -25px;
            margin-top: -32px;
            margin-right:-17px;
            position: relative;
            z-index: 2;" id="togglePassword"></i>
        </div>
        <div class="row">
            <i class="fa-solid fa-briefcase"></i>
            <select class="role" id ="role" name ="role" required>
                <option value="TPO">TPO</option> 
                <option value="TPC">TPC</option>
            </select>
        </div>
        <div class="center">
        <button type="submit" name="login-btn" class="login-btn"><i class="fa-solid fa-right-to-bracket awesome"></i>LOGIN</button>
             </div>
    </form>
</div>
</div>
<script>
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#id_password');

togglePassword.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  // toggle the eye slash icon
  this.classList.toggle('fa-eye-slash');
});
</script>
</body>
</html>
        