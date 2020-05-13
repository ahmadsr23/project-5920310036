<!DOCTYPE html>
<html lang="en">
<head>
  <title>แก้ไขข้อมูลอาจารย์</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>


<?php

session_start();
include "dbconnect.php";
include "menu.php";

$techID = $_POST['techID']; 

$sql = "SELECT * FROM advisor WHERE techID = '$techID' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>  

<body>

<div class="container">
  <center><h2>แก้ไขข้อมูลอาจารย์</h2><br><br></center>
<form action="operation.php" method="post">

<input type="hidden"  name="techID" value="<?php echo $row["techID"] ?>">

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>ตำแหน่งทางวิชาการ &nbsp</label>
    <input type="text" class="form-control" name="prefix" value="<?php echo $row["prefix"] ?>" required>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>ชื่อ &nbsp</label>
    <input type="text" class="form-control" name="techNme" value="<?php echo $row["techNme"] ?>" required>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>


<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>นามสกุล &nbsp</label>
    <input type="text" class="form-control" name="techSurnme" value="<?php echo $row["techSurnme"] ?>" required>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>


<div class="row">

  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <center>
    <input type="submit" name="updateAdvisor" class="btn btn-primary" value="ยืนยัน">
    </center>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>
    
</form>
</div>
  
</body>
</html>