<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
  <title>Delete Data</title>
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

<script>      
  function checkField() {
      if (document.getElementById('field').value == 'rno') {
        document.getElementById('extra').style.display = '';
        document.getElementById('rollno').disabled = false;
        document.getElementById('smartid').style.display = 'none';
        document.getElementById('mail').style.display = 'none';
        document.getElementById('bmail').style.display = 'none';
        document.getElementById('delete').disabled = false;
      }
      else if (document.getElementById('field').value == 'stud_id') {
        document.getElementById('extra').style.display = '';
        document.getElementById('smartid').disabled = false;
        document.getElementById('rollno').style.display = 'none';
        document.getElementById('mail').style.display = 'none';
        document.getElementById('bmail').style.display = 'none';
        document.getElementById('delete').disabled = false;
      }
      else if (document.getElementById('field').value == 'p_mailid') {
        document.getElementById('extra').style.display = '';
        document.getElementById('mail').disabled = false;
        document.getElementById('rollno').style.display = 'none';
        document.getElementById('smartid').style.display = 'none';
        document.getElementById('bmail').style.display = 'none';
        document.getElementById('delete').disabled = false;
      }
      else if (document.getElementById('field').value == 'b_mailid') {
        document.getElementById('extra').style.display = '';
        document.getElementById('bmail').disabled = false;
        document.getElementById('rollno').style.display = 'none';
        document.getElementById('smartid').style.display = 'none';
        document.getElementById('mail').style.display = 'none';
        document.getElementById('delete').disabled = false;
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
        <option id="none" value="null">--------------Delete by--------------</option>
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
    <button type="delete" name="delete" id="delete">Delete</button>
</div>
</div>
</form>
<div class="ipclass">
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

       if(isset($_POST['delete']))
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
           $sql="DELETE FROM studentdb WHERE rno='$input'";
           $res=mysqli_query($conn, $sql);

           if ($conn->query($sql) === TRUE)
           {
            echo '<script type="text/javascript">

            window.onload = function () { alert("STUDENT DATA DELETED SUCCESSFULLY!!"); }
  
           </script>';
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
          $sql="DELETE FROM studentdb WHERE stud_id='$input'";
          $res=mysqli_query($conn, $sql);
          if ($conn->query($sql) === TRUE)
           {
            echo '<script type="text/javascript">

            window.onload = function () { alert("STUDENT DATA DELETED SUCCESSFULLY!!"); }
  
           </script>';
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
          $sql="DELETE FROM studentdb WHERE p_mailid='$input'";
          $res=mysqli_query($conn, $sql);
          if ($conn->query($sql) === TRUE)
           {
            echo '<script type="text/javascript">

            window.onload = function () { alert("STUDENT DATA DELETED SUCCESSFULLY!!"); }
  
           </script>';
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
          $sql="DELETE FROM studentdb WHERE b_mailid='$input'";
           $res=mysqli_query($conn, $sql);
           if ($conn->query($sql) === TRUE)
           {
            echo '<script type="text/javascript">

            window.onload = function () { alert("STUDENT DATA DELETED SUCCESSFULLY!!"); }
  
           </script>';
           }
         }
        }

         else if($val=='null')
         {
          echo '<script type="text/javascript">

          window.onload = function () { alert("CHOOSE CORRECT OPTION!!"); }

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



