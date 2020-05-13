<!DOCTYPE html>
<html lang="en">
<head>
  <title>แก้ไขข้อมูลนักศึกษา</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="chosen.css">
</head>


<?php

session_start();
include "dbconnect.php";
include "menu.php";

$stuID = $_POST['stuID']; 

$sql = "SELECT * FROM student WHERE stuID = '$stuID' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>  

<body>

<div class="container">
  <center><h2>แก้ไขข้อมูลนักศึกษา</h2><br><br></center>
<form action="operation.php" method="post">

<input type="hidden"  name="stuID" value="<?php echo $row["stuID"] ?>">

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>ชื่อ &nbsp</label>
    <input type="text" class="form-control" name="stuNme" value="<?php echo $row["stuNme"] ?>" required>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>


<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>นามสกุล &nbsp</label>
    <input type="text" class="form-control" name="stuSurnme" value="<?php echo $row["stuSurnme"] ?>" required>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>อาจารย์ที่ปรึกษา &nbsp</label>
    <?php
        include "dbconnect.php";
        $sql2 = "SELECT techID, prefix, techNme, techSurnme FROM advisor ORDER BY techID";
        $result2 = $conn->query($sql2);

        $tech = $row['techID'];
        $sql3 = "SELECT techID, prefix, techNme, techSurnme FROM advisor WHERE techID = $tech";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();

        echo "<select class='chosen-select' name='techID' required>";
            echo "<option value=".$row3['techID'].">".$row3['prefix']." ".$row3['techNme']." ".$row3['techSurnme']."</option>";
        while($row2 = $result2->fetch_assoc()){
            echo "<option value=".$row2['techID'].">".$row2['prefix']." ".$row2['techNme']." ".$row2['techSurnme']."</option>";
        }
        echo"</select>";
        $conn->close();
    ?>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>

<div class="row">

  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <center>
    <input type="submit" name="updateStudent" class="btn btn-primary" value="ยืนยัน">
    </center>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>
    
</form>
</div>

  <script src="docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>
  
</body>
</html>