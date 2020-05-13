<!DOCTYPE html>
<html lang="en">
<head>
  <title>ลงทะเบียนการฝึกงาน</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
</head>

<?php

session_start();
include "dbconnect.php";
include "menu.php";

$id = $_SESSION['valid_id'];
$sql = "SELECT stuID FROM student WHERE email = '$id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 

$sql1 = "SELECT *, count(stuID) as n FROM cooperativepreparation 
        WHERE stuID = (SELECT stuID FROM student WHERE email = '$id' )";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc(); 

?>  


<body>

<div class="container">
<center><h2>บันทึกกิจกรรมเตรียมสหกิจศึกษา</h2></center><br>
  <form action="operation.php" method="post">
  <input type="hidden"  name="stuID"  value="<?php echo $row["stuID"]?>">
  <input type="hidden"  name="num"  value="<?php echo ++$row1["n"]?>">
<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>ชื่อกิจกรรม &nbsp</label> 
    <input type="text" class="form-control" name="activity" required>
  </div>
  </div>
    
  <div class="col-sm-4"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-2">
  <div class="form-group">
    <label>วันที่ &nbsp</label> 
    <input type="date" class="form-control" name="actiDate" required>
  </div>
  </div>
    
  <div class="col-sm-2">
  <div class="form-group">
    <label>จำนวนชั่วโมง &nbsp</label>
    <input type="number" class="form-control" name="actiHours" required>
  </div>
  </div>
  <div class="col-sm-4"></div>

</div>

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label for="field">จัดอบรมโดย</label>
         <select class="form-control" name="organizer" required>
           <option value="">- กรุณาเลือกผู้จัดอบรม -</option>
           <option value="คณะและภาควิชา">คณะและภาควิชา</option>
           <option value="มหาวิทยาลัย">มหาวิทยาลัย</option>
          </select>
  </div>
  </div>
    
  <!-- <div class="col-sm-12"></div> -->

</div>

<div class="row">

<div class="col-sm-4"></div>

<div class="col-sm-4">
<div class="form-group">
  <center>
  <input type="submit" name="insertCooperativePreparation" class="btn btn-primary" value="บันทึก">
  </center>
</div>
</div>

<div class="col-sm-4"></div>

</div>

  </form>
</div>

</body>
</html>