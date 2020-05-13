<!DOCTYPE html>
<html lang="en">
<head>
  <title>ข้อมูลผู้ใช้</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>


<?php

session_start();
include "dbconnect.php";
include "menu.php";

$id = $_SESSION['valid_id'];

$sql = "SELECT * FROM user WHERE username = '$id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>  

<body>

<div class="container">
  <center><h2>เปลี่ยนรหัสผ่านของผู้ใช้</h2><br><br></center>
<form action="operation.php" method="post">

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>รหัสผ่านเดิม &nbsp</label>
    <input type="password" class="form-control" name="pwd" required>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>


<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>รหัสผ่านใหม่ &nbsp</label>
    <input type="password" class="form-control" name="newpwd" required>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group"> 
    <label>ยืนยันรหัสผ่านใหม่ &nbsp</label>
    <input type="password" class="form-control" name="newconpwd" required>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>

<div class="row">

  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <center>
    <input type="submit" name="editPassword" class="btn btn-primary" value="ยืนยัน">
    </center>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>
    
</form>
</div>

</body>
</html>