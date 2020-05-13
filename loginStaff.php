<!DOCTYPE html>
<html lang="en">
<head>
  <title>login Staff</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
	
</head>

<?php

session_start();
include "dbconnect.php";
include "menu.php";

if($_POST["loginbtn"]) {
	$usrnme = $_POST['email']; //using email as usrname
	$pwd = $_POST['pwd'];

	//hash password, encript the password ($pwd) using hash function with sha256 encription
	$enpwd = hash('sha256',$pwd); 

$sql = "SELECT username as id, pwd, nme as fnme, surnme as lnme, class
				FROM user 
				WHERE username = '$usrnme' AND (pwd = '$enpwd' OR pwd = '$pwd')";
				
	$result = mysqli_query($conn, $sql);
		
	if(!$result) {
			//echo "เกิดข้อผิดพลาด กรุณาลองใหม่";
			echo "<script>alert('เกิดข้อผิดพลาด กรุณาลองใหม่');</script>";
	}
	else {
			if(mysqli_num_rows($result) == 1) {   
				$row = mysqli_fetch_array($result);
				//set all session values, could be more if necessary (can use object instead of array)
				$_SESSION['valid_id'] = $row["id"]; 
				$_SESSION['valid_fnme'] = $row["fnme"]; 
				$_SESSION['valid_lnme'] = $row["lnme"]; 
				$_SESSION['valid_utype'] = $row["class"]; 
				//header("location: menu.php"); //set location to page menu.php
				echo "<script>alert('ล็อคอินสำเร็จ');window.location.href='index.php'</script>";
				
			}
			else {
				//echo "ท่านกำหนด Login หรือ Password ไม่ถูกต้อง";
				echo "<script>alert('ท่านกำหนด Username หรือ Password ไม่ถูกต้อง');</script>";
			}
	}	
	mysqli_close($conn);
}

?>

<body>

<div class="container" >
<center><h2>ล็อคอินผู้ดูแลระบบ</h2></center>
  
<form  method="post" >
 
<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
  	<label for="email">ชื่อผู้ใช้ &nbsp</label>
  	<input type="email" class="form-control" id="email" placeholder="Username" name="email" required> 
  </div>
  </div>
  
  <div class="col-sm-4"></div>
</div>

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
  	<label for="pwd">รหัสผ่าน &nbsp</label>
  	<input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" required>
  </div>
  </div>
  
  <div class="col-sm-4"></div>

  <div class="col-sm-12"></div>
</div>

<div class="row">
  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
  <center>
  	<input type="submit" class="btn btn-success" name="loginbtn" value="เข้าสู่ระบบ" >
  </center>
  </div>
  </div>
  
  <div class="col-sm-4"></div>
</div>

</form>

</div>

</body>
</html>