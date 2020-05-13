<!DOCTYPE html>
<html lang="en">
<head>
  <title>ลงทะเบียนเข้าใช้งานระบบ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>


<?php

session_start();
include "dbconnect.php";
include "menu.php";
?>  

<body>

<div class="container">
  <center><h2>ลงทะเบียนเข้าใช้งานระบบ</h2></center>
  <form action="operation.php" method="post">

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>ชื่อ &nbsp</label>
    <input type="text"  class="form-control" name="nme" required>
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>นามสกุล &nbsp</label>
    <input type="text" class="form-control" name="surnme" required>
  </div>
  </div>
    
  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>
</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <label>ชื่อผู้ใช้ &nbsp</label> 
    <input type="email" class="form-control" name="username" required>
    <h6>สำหรับอาจารย์ name.s@psu.ac.th สำหรับนักศึกษา IDstudent@psu.ac.th</h6>
  </div>
  </div>

  <div class="col-sm-2">
  <div class="form-group"> 
        <label>ประเภทผู้ใช้ &nbsp</label>
         <select class="form-control" name="class" required>
           <option value="">- กรุณาเลือกประเภทผู้ใช้ -</option>
           <option value="นักศึกษา">นักศึกษา</option>
           <option value="อาจารย์">อาจารย์</option>
         </select> 
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>
</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>รหัสผ่าน &nbsp</label>
    <input type="password" class="form-control" name="pwd" required>
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group"> 
    <label>ยืนยันรหัสผ่าน &nbsp</label>
    <input type="password" class="form-control" name="conpwd" required>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>
</div>

<div class="row">

  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <center>
    <input type="submit" name="register" class="btn btn-primary" value="ลงทะเบียน">
    </center>
  </div>
  </div>

  <div class="col-sm-4"></div>
</div>

    
</form>
</div>

</body>
</html>