<!DOCTYPE html>
<html lang="en">
<head>
  <title>ระบบสารสนเทศ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="icon" href="img/icon.jpg">
</head>
<body>
<?php 
  session_start();//start session
	$id = $_SESSION['valid_id'];	
	$fnme = $_SESSION['valid_fnme'];
	$lnme = $_SESSION['valid_lnme'];
	$utype = $_SESSION['valid_utype'];
?>
<a href="index.php"><img src="img/mcs-cover.jpg" style="max-width:100%; height:auto;"></a>
<nav class="navbar navbar-inverse" style="background-color: #3f3f3f;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">หน้าแรก</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      
    <?php 
      if($utype=='') { 
        echo "<li class='dropdown'>";
            echo "  <a class='dropdown-toggle' data-toggle='dropdown'>การฝึกงาน<span class='caret'></span></a>";
                echo " <ul class='dropdown-menu'>";
                  echo " <li><a href='showInternships.php'>ข้อมูลการฝึกงาน</a></li>";
                  echo " <li><a href='reportInternships.php'>รายงานการฝึกงาน</a></li>";
                  echo " <li><a href='showAssessment.php'>รายงานสรุปการประเมิน</a></li>";
                  echo "</ul>";
                echo "</li>";

            echo "<li class='dropdown'>";
            echo " <a class='dropdown-toggle' data-toggle='dropdown'>การเตรียมสหกิจ<span class='caret'></span></a>";
                echo " <ul class='dropdown-menu'>";
                  echo " <li><a href='showCooperativePreparation.php'>ข้อมูลกิจกรรมเตรียมสหกิจ</a></li>";
                  echo "</ul>";
                echo "</li>";

            echo "<li class='dropdown'>";
            echo "<a class='dropdown-toggle' data-toggle='dropdown'>การฝึกสหกิจ<span class='caret'></span></a>";
                echo "<ul class='dropdown-menu'>";
                  echo " <li><a href='showCooperativeTraining.php'>ข้อมูลการฝึกสหกิจ</a></li>";
                  echo "<li><a href='reportCooperativeTraining.php'>รายงานการฝึกสหกิจ</a></li>";
                  echo " </ul>";
                echo " </li>";
            
            echo "</ul>";
      }
      ?>

<?php 
      if($utype=='นักศึกษา') { 
        echo "<li class='dropdown'>";
            echo "  <a class='dropdown-toggle' data-toggle='dropdown'>การฝึกงาน<span class='caret'></span></a>";
                echo " <ul class='dropdown-menu'>";
                echo " <li><a href='insertInternships.php'>ลงทะเบียนฝึกงาน</a></li>";
                  echo " <li><a href='showInternships.php'>ข้อมูลการฝึกงาน</a></li>";
                  echo " <li><a href='reportInternships.php'>รายงานการฝึกงาน</a></li>";
                  echo " <li><a href='https://forms.gle/1RvKqJxUXJvJFgdh7' target='_blank' >การประเมินหลังฝึกงาน(นักศึกษา)</a></li>";
                  echo " <li><a href='showAssessment.php'>รายงานสรุปการประเมิน</a></li>";
                  echo "</ul>";
                echo "</li>";

            echo "<li class='dropdown'>";
            echo " <a class='dropdown-toggle' data-toggle='dropdown'>การเตรียมสหกิจ<span class='caret'></span></a>";
                echo " <ul class='dropdown-menu'>";
                echo " <li><a href='insertCooperativePreparation.php'>บันทึกกิจกรรมเตรียมสหกิจ</a></li>";
                  echo " <li><a href='showCooperativePreparation.php'>ข้อมูลกิจกรรมเตรียมสหกิจ</a></li>";
                  echo "</ul>";
                echo "</li>";

            echo "<li class='dropdown'>";
            echo "<a class='dropdown-toggle' data-toggle='dropdown'>การฝึกสหกิจ<span class='caret'></span></a>";
                echo "<ul class='dropdown-menu'>";
                  echo " <li><a href='insertCooperativeTraining.php'>ลงทะเบียนฝึกสหกิจ</a></li>";
                  echo " <li><a href='showCooperativeTraining.php'>ข้อมูลการฝึกสหกิจ</a></li>";
                  echo "<li><a href='reportCooperativeTraining.php'>รายงานการฝึกสหกิจ</a></li>";
                  echo " </ul>";
                echo " </li>";
            
            echo "</ul>";
      }
      ?>

<?php 
      if($utype=='อาจารย์') { 
        echo "<li class='dropdown'>";
            echo "  <a class='dropdown-toggle' data-toggle='dropdown'>การฝึกงาน<span class='caret'></span></a>";
                echo " <ul class='dropdown-menu'>";
                  echo " <li><a href='showInternships.php'>ข้อมูลการฝึกงาน</a></li>";
                  echo " <li><a href='reportInternships.php'>รายงานการฝึกงาน</a></li>";
                  echo " <li><a href='showAssessment.php'>รายงานสรุปการประเมิน</a></li>";
                  echo "</ul>";
                echo "</li>";

            echo "<li class='dropdown'>";
            echo " <a class='dropdown-toggle' data-toggle='dropdown'>การเตรียมสหกิจ<span class='caret'></span></a>";
                echo " <ul class='dropdown-menu'>";
                  echo " <li><a href='showCooperativePreparation.php'>ข้อมูลกิจกรรมเตรียมสหกิจ</a></li>";
                  echo "</ul>";
                echo "</li>";

            echo "<li class='dropdown'>";
            echo "<a class='dropdown-toggle' data-toggle='dropdown'>การฝึกสหกิจ<span class='caret'></span></a>";
                echo "<ul class='dropdown-menu'>";
                  echo " <li><a href='showCooperativeTraining.php'>ข้อมูลการฝึกสหกิจ</a></li>";
                  echo "<li><a href='reportCooperativeTraining.php'>รายงานการฝึกสหกิจ</a></li>";
                  echo " </ul>";
                echo " </li>";

            echo "<li class='dropdown'>";
            echo "<a class='dropdown-toggle' data-toggle='dropdown'>ตรวจสอบยืนยันความถูกต้อง<span class='caret'></span></a>";
                echo "<ul class='dropdown-menu'>";
                  echo " <li><a href='checkInternships.php'>ข้อมูลการฝึกงาน</a></li>";
                  echo "<li><a href='checkCooperativeTraining.php'>ข้อมูลการฝึกสหกิจ</a></li>";
                  echo " </ul>"; 
            echo "</li>";

            echo "</ul>";
      }
      ?>

<?php 
      if($utype=='ผู้ดูแลระบบ') { 
        echo "<li class='dropdown'>";
            echo "  <a class='dropdown-toggle' data-toggle='dropdown'>การฝึกงาน<span class='caret'></span></a>";
                echo " <ul class='dropdown-menu'>";
                  echo " <li><a href='showInternships.php'>ข้อมูลการฝึกงาน</a></li>";
                  echo " <li><a href='reportInternships.php'>รายงานการฝึกงาน</a></li>";
                  echo " <li><a href='showAssessment.php'>รายงานสรุปการประเมิน</a></li>";
                  echo "</ul>";
                echo "</li>";

            echo "<li class='dropdown'>";
            echo " <a class='dropdown-toggle' data-toggle='dropdown'>การเตรียมสหกิจ<span class='caret'></span></a>";
                echo " <ul class='dropdown-menu'>";
                  echo " <li><a href='showCooperativePreparation.php'>ข้อมูลกิจกรรมเตรียมสหกิจ</a></li>";
                  echo "</ul>";
                echo "</li>";

            echo "<li class='dropdown'>";
            echo "<a class='dropdown-toggle' data-toggle='dropdown'>การฝึกสหกิจ<span class='caret'></span></a>";
                echo "<ul class='dropdown-menu'>";
                  echo " <li><a href='showCooperativeTraining.php'>ข้อมูลการฝึกสหกิจ</a></li>";
                  echo "<li><a href='reportCooperativeTraining.php'>รายงานการฝึกสหกิจ</a></li>";
                  echo " </ul>";
                echo " </li>";

            echo "<li class='dropdown'>";
            echo "<a class='dropdown-toggle' data-toggle='dropdown'>ฐานข้อมูล<span class='caret'></span></a>";
                echo "<ul class='dropdown-menu'>";
                  echo " <li><a href='showStudent.php'>ข้อมูลนักศึกษา</a></li>";
                  echo "<li><a href='showAdvisor.php'>ข้อมูลอาจารย์</a></li>";
                  echo " </ul>"; 
            echo "</li>";

            echo "</ul>";
      }
      ?>    

      <ul class="nav navbar-nav navbar-right">
        <?php
          if($id=="") { //no login
               echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
          } else {  //logined
              if($utype=='นักศึกษา'){
                  echo "<li><a href=''><span class='glyphicon glyphicon-user'></span> ".$fnme." ".$lnme."</a></li>";
                  
                  echo "<li class='dropdown'>";
                    echo "<a class='dropdown-toggle' data-toggle='dropdown'> <span class='glyphicon glyphicon-cog'></span></a>";
                    echo "<ul class='dropdown-menu'>";
                    echo " <li><a href='editUser.php'>แก้ไข้ข้อมูลผู้ใช้</a></li>";
                    echo "<li><a href='editPassword.php'>เปลี่ยนรหัสผ่าน</a></li>";
                    echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                    echo " </ul>";
                  echo "</li>";
              }
              else if($utype=='อาจารย์'){
                echo "<li><a href=''><span class='glyphicon glyphicon-user'></span> ".$fnme." ".$lnme."</a></li>";
                
                echo "<li class='dropdown'>";
                  echo "<a class='dropdown-toggle' data-toggle='dropdown'> <span class='glyphicon glyphicon-cog'></span></a>";
                  echo "<ul class='dropdown-menu'>";
                  echo " <li><a href='editUser.php'>แก้ไข้ข้อมูลผู้ใช้</a></li>";
                  echo "<li><a href='editPassword.php'>เปลี่ยนรหัสผ่าน</a></li>";
                  echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                  echo " </ul>";
                echo "</li>";
              }
              else if($utype=='ผู้ดูแลระบบ'){
                echo "<li><a href=''><span class='glyphicon glyphicon-user'></span> ".$fnme." ".$lnme."</a></li>";
                
                echo "<li class='dropdown'>";
                  echo "<a class='dropdown-toggle' data-toggle='dropdown'> <span class='glyphicon glyphicon-cog'></span></a>";
                  echo "<ul class='dropdown-menu'>";
                  echo " <li><a href='editUser.php'>แก้ไข้ข้อมูลผู้ใช้</a></li>";
                  echo "<li><a href='editPassword.php'>เปลี่ยนรหัสผ่าน</a></li>";
                  echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                  echo " </ul>";
                echo "</li>";
              }
              
              
          }
        ?>
      </ul>

    </div>
  </div>
</nav>

</body>
</html>