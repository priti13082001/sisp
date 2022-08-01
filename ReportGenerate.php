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
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/cdc4e46613.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="hp.css">
    <link rel="stylesheet" href="ReportGenerate.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Generate Report</title>
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

<div class="chkbox1">
        <form action="" method="POST">
        <label for="heading" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:22px;">REPORT OF STUDENTS BRANCH WISE-</label><br>
            <input type="radio" name="check1" id="check1" value="check1">
            <label for="check1" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">Two Month Internship</label><br>
            <input type="radio" name="check2" id="check2" value="check2">
            <label for="check2" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">Six Month Internship</label><br>
            <input type="radio" name="check3" id="check3" value="check3">
            <label for="check3" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">Placed</label><br><br><br><br><br>
        <label for="heading" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:22px;">REPORT OF STUDENTS COMPANY WISE-</label><br>
        <label for="tmi" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">Two Month Internship</label>
                <select name="tmi" id="tmi" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">
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
          <label for="placed_company2" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">Six Month Internship</label>
                <select name="placed_company2" id="placed_company2" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">
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
          <label for="placed_company3" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">Placed Company</label>
                <select name="placed_company3" id="placed_company3" style="font-family: 'DM Serif Display', serif; font-weight: 400; font-size:17px;">
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
                <button type="show" name="show">Show</button><br><br>
          </form>
    </div>
    
<?php 
 

 if(isset($_POST['show'])){

  if(isset($_POST['check1'])){
 
  $query = $conn->query("
  SELECT class, COUNT(*) as 'numofstud' FROM studentdb WHERE tmi != '' GROUP BY class;
  ");
  if (mysqli_num_rows($query) == 0)
           {
            echo '<script type="text/javascript">

             window.onload = function () { alert("NO RECORD FOUND!!"); }

            </script>';
           }


  foreach($query as $data)
  {
    $class[] = $data['class'];
    $numstud[] = $data['numofstud'];
  }
}

else if(isset($_POST['check2'])){
 
  $query = $conn->query("
  SELECT class, COUNT(*) as 'numofstud' FROM studentdb WHERE placed_company2 != '' GROUP BY class;
  ");
  if (mysqli_num_rows($query) == 0)
           {
            echo '<script type="text/javascript">

             window.onload = function () { alert("NO RECORD FOUND!!"); }

            </script>';
           }


  foreach($query as $data)
  {
    $class[] = $data['class'];
    $numstud[] = $data['numofstud'];
  }
}

else if(isset($_POST['check3'])){
 
  $query = $conn->query("
  SELECT class, COUNT(*) as 'numofstud' FROM studentdb WHERE placed_company3 != '' GROUP BY class;
  ");
  if (mysqli_num_rows($query) == 0)
           {
            echo '<script type="text/javascript">

             window.onload = function () { alert("NO RECORD FOUND!!"); }

            </script>';
           }

  foreach($query as $data)
  {
    $class[] = $data['class'];
    $numstud[] = $data['numofstud'];
  }
}

else if(isset($_POST['tmi'])){
    $tmi = $_POST["tmi"];
    
    $query = $conn->query("
    SELECT class, COUNT(*) as 'numofstud' FROM studentdb WHERE tmi = '$tmi' GROUP BY class;
    ");
    if (mysqli_num_rows($query) == 0)
           {
            echo '<script type="text/javascript">

             window.onload = function () { alert("NO RECORD FOUND!!"); }

            </script>';
           }

  
    foreach($query as $data)
    {
      $class[] = $data['class'];
      $numstud[] = $data['numofstud'];
    }
  }

else if(isset($_POST['placed_company2'])){
     
      $placed_company2 = $_POST["placed_company2"];
      // $placed_company3 = $_POST["placed_company3"];
      $query = $conn->query("
      SELECT class, COUNT(*) as 'numofstud' FROM studentdb WHERE placed_company2 = '$placed_company2' GROUP BY class;
      ");
      if (mysqli_num_rows($query) == 0)
           {
            echo '<script type="text/javascript">

             window.onload = function () { alert("NO RECORD FOUND!!"); }

            </script>';
           }

    
      foreach($query as $data)
      {
        $class[] = $data['class'];
        $numstud[] = $data['numofstud'];
      }
}

      else if(isset($_POST['placed_company3'])){
     
        $placed_company3 = $_POST["placed_company3"];
        $query = $conn->query("
        SELECT class, COUNT(*) as 'numofstud' FROM studentdb WHERE placed_company3 = '$placed_company3' GROUP BY class;
        ");
        if (mysqli_num_rows($query) == 0)
           {
            echo '<script type="text/javascript">

             window.onload = function () { alert("NO RECORD FOUND!!"); }

            </script>';
           }

      
        foreach($query as $data)
        {
          $class[] = $data['class'];
          $numstud[] = $data['numofstud'];
        }
      }

      else {
             echo '<script type="text/javascript">
      
             window.onload = function () { alert("CHOOSE ONLY ONE OPTION!!"); }
      
             </script>';
           }

    }
?>

<div class="contain">

<div style="width: 500px; height: 800px;  color:black;">
  <canvas id="myChart"></canvas>
</div>
  </div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($class) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Students Report',
      data: <?php echo json_encode($numstud) ?>,
      backgroundColor: [
        'rgba(0,0,128,0.8)',
        'rgba(0,0,128,0.8)',
        'rgba(0,0,128,0.8)',
        'rgba(0,0,128,0.8)',
        'rgba(0,0,128,0.8)',
        'rgba(0,0,128,0.8)',
        'rgba(0,0,128,0.8)'
      ],
      borderWidth: 0.2
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>