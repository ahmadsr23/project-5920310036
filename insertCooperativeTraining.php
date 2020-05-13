<!DOCTYPE html>
<html lang="en">
<head>
  <title>ลงทะเบียนการฝึกสหกิจศึกษา</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="chosen.css">

</head>

<?php
session_start();
include "dbconnect.php";
include "menu.php";

$id = $_SESSION['valid_id'];
$sql = "SELECT stuID, stuNme, stuSurnme FROM student WHERE email = '$id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 

$sql3 = "SELECT * FROM cooperativetraining 
        WHERE stuID = (SELECT stuID FROM student WHERE email = '$id' )";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();


?>  

<body>

<div class="container">
  
<!-- ===========================สำหรับการลงทะเบียนฝึกสหกิจศึกษา ============================== -->
<?php if ($result3->num_rows == 0) { ?>
<center><h2>ลงทะเบียนการฝึกหสกิจศึกษา</h2></center>
  <form action="operation.php" method="post" enctype="multipart/form-data">

<div class="row">
  <div class="col-sm-2"></div>

  <div class="col-sm-8"><div class="form-group">
        <center>
        <h4>รหัสนักศึกษา: <?php echo $row["stuID"]?> ชื่อ: <?php echo $row['stuNme']." ".$row['stuSurnme']; ?></h4>
        </center>
        <input type="hidden" class="form-control" name="stuID"  value="<?php echo $row["stuID"]?>">
  </div></div>

  <div class="col-sm-2"></div>
</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
      <label for="field">ภาคการศึกษา</label>
         <select class="form-control" name="term" required>
           <option value="">- เลือกภาคการศึกษา -</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
          </select>
  </div>
  </div>
    
  <div class="col-sm-3">
  <div class="form-group">
        <label>ปีการศึกษา &nbsp</label> 
        <input type="text" class="form-control" name="years" required>
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>อาจารย์ที่ปรึกษาคนที่ 1 &nbsp</label>
    <?php
        include "dbconnect.php";
        $sql = "SELECT techID, prefix, techNme, techSurnme FROM advisor ORDER BY techID";
        $result = $conn->query($sql);
        echo "<select class='chosen-select' name='techID' required>";
        echo "<option value=>- อาจารย์ที่ปรึกษาคนที่ 1 -</option>";
        while($row = $result->fetch_assoc()){
            echo "<option value=".$row['techID'].">".$row['prefix']." ".$row['techNme']." ".$row['techSurnme']."</option>";
        }
        echo"</select>";
        $conn->close();
    ?>
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>อาจารย์ที่ปรึกษาคนที่ 2 &nbsp</label>
    <?php
        include "dbconnect.php";
        $sql = "SELECT techID, prefix, techNme, techSurnme FROM advisor ORDER BY techID";
        $result = $conn->query($sql);
        echo "<select class='chosen-select' name='tech2ID'>";
        echo "<option value=>- อาจารย์ที่ปรึกษาคนที่ 2 -</option>";
        while($row = $result->fetch_assoc()){
            echo "<option value=".$row['techID'].">".$row['prefix']." ".$row['techNme']." ".$row['techSurnme']."</option>";
        }
        echo"</select>";
        $conn->close();
    ?>
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-5">
  <div class="form-group"> 
      <label for="field">ฝึกสหกิจทางด้าน</label>
         <select class="form-control" name="field" required>
           <option value="">- กรุณาเลือกสาขางาน -</option>
           <option value="คณิตศาสตร์">คณิตศาสตร์</option>
           <option value="สถิติ">สถิติ</option>
           <option value="คอมพิวเตอร์">คอมพิวเตอร์</option>
           <option value="อื่นๆ">อื่นๆ</option>
          </select> 
  </div>
  </div>

  <div class="col-sm-4"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>ชื่อสถานประกอบการ</label>
    <?php
        include "dbconnect.php";
        $sql = "SELECT officeID, officeNme, province  FROM office ORDER BY officeID";
        $result = $conn->query($sql);
        echo "<select id='searchddl' class='chosen-select' name='officeID' required>";
        echo "<option value=''>- เลือกสถานประกอบการ -</option>";
        while($row = $result->fetch_assoc()){
            echo "<option value=".$row['officeID'].">".$row['officeNme']." (".$row['province'].")"."</option>";
        }
        echo"</select>";
        $conn->close();
    ?>
  </div>
  </div>

  <div class="col-sm-3"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <a href='insertOffice.php' target='_blank' >
      <button type="button" class="btn btn-warning">เพิ่มสถานประกอบการ</button>
    </a>
  </div>
  </div>

  <div class="col-sm-6"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
        <label>เริ่มการฝึกสหกิจ &nbsp</label> 
        <input type="date" class="form-control" name="startDate" required>
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group"> 
        <label>สิ้นสุดการฝึกสหกิจ &nbsp</label> 
        <input type="date" class="form-control" name="endDate" required>
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>พี่เลี้ยงที่ติดต่อ &nbsp</label> 
    <input type="text" class="form-control" name="staffNme" required>
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group"> 
    <label>อีเมลพี่เลี้ยง &nbsp</label> 
    <input type="email" class="form-control" name="emailStaff" required> 
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>แผนก/หน่วยงาน ของพี่เลี้ยง &nbsp</label> 
    <input type="text" class="form-control" name="department" required>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>ขอบเขตของโครงงาน &nbsp</label> 
    <textarea type="text" class="form-control" name="projectScope" required></textarea>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  
  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>ปัญหาและอุปสรรค์ &nbsp</label> 
    <textarea type="text" class="form-control" name="barriers" required></textarea>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>คำแนะนำสำหรับนักศึกษาในหลักสูตร &nbsp</label> 
    <textarea type="text" class="form-control" name="suggestion" required></textarea>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>คำแนะนำจากอาจารย์นิเทศฝึกงาน &nbsp</label>
    <textarea type="text" class="form-control" name="counsel" required></textarea>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>ไฟล์ Resume(PDF) &nbsp</label> 
    <input type="file" class="form-control" name="fileResume" required>
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group"> 
    <label>ไฟล์รายงาน(PDF) &nbsp</label> 
    <input type="file" class="form-control" name="fileCooperative" required>
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <center>
    <input type="submit" name="insertCooperativeTraining" class="btn btn-primary" value="ลงทะเบียน">
    </center>
  </div>
  </div>

  <div class="col-sm-4"></div>


</div>
</form> 

<?php }
// ================================================================================================== 

// ****************************ลงทะเบียนแล้ว ทำการอัพเดทข้อมูลหรือแก้ไขข้อมูล********************************
else if($row3['checkCooperativetraining']!= 1){ ?>
<center><h2>แก้ไขข้อมูลการฝึกหสกิจศึกษา</h2></center>
<form action="operation.php" method="post" enctype="multipart/form-data">

<div class="row">
  <div class="col-sm-2"></div>

  <div class="col-sm-8"><div class="form-group">
        <center>
        <h4>รหัสนักศึกษา: <?php echo $row["stuID"]?> ชื่อ: <?php echo $row['stuNme']." ".$row['stuSurnme']; ?></h4>
        </center>
        <input type="hidden" class="form-control" name="stuID"  value="<?php echo $row["stuID"]?>">
  </div></div>

  <div class="col-sm-2"></div>
</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
      <label for="field">ภาคการศึกษา</label>
         <select class="form-control" name="term" required>
           <option value="1" <?php if ($row3["term"]=='1') echo'selected'?> >1</option>
           <option value="2" <?php if ($row3["term"]=='2') echo'selected'?> >2</option>
           <option value="3" <?php if ($row3["term"]=='3') echo'selected'?> >3</option>
          </select>
  </div>
  </div>
    
  <div class="col-sm-3">
  <div class="form-group">
        <label>ปีการศึกษา &nbsp</label> 
        <input type="text" class="form-control" name="years" value="<?php echo $row3["years"] ?>" required>
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>อาจารย์ที่ปรึกษาคนที่ 1 &nbsp</label>
    <?php
        include "dbconnect.php";
        $sql = "SELECT techID, prefix, techNme, techSurnme FROM advisor ORDER BY techID";
        $result = $conn->query($sql);

        $tech = $row3['techID'];
        $sql5 = "SELECT techID, prefix, techNme, techSurnme FROM advisor WHERE techID = $tech";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_assoc();

        echo "<select class='chosen-select' name='techID' required>";
            echo "<option value=".$row5['techID'].">".$row5['prefix']." ".$row5['techNme']." ".$row5['techSurnme']."</option>";
        while($row = $result->fetch_assoc()){
            echo "<option value=".$row['techID'].">".$row['prefix']." ".$row['techNme']." ".$row['techSurnme']."</option>";
        }
        echo"</select>";
        $conn->close();
    ?>
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>อาจารย์ที่ปรึกษาคนที่ 2 &nbsp</label>
    <?php
        include "dbconnect.php";
        $sql = "SELECT techID, prefix, techNme, techSurnme FROM advisor ORDER BY techID";
        $result = $conn->query($sql);

        $tech = $row3['tech2ID'];
        $sql6 = "SELECT techID, prefix, techNme, techSurnme FROM advisor WHERE techID = $tech";
        $result6 = $conn->query($sql6);
        $row6 = $result6->fetch_assoc();

        echo "<select class='chosen-select' name='tech2ID'>";
        if($result6->num_rows > 0){
          echo "<option value=".$row6['techID'].">".$row6['prefix']." ".$row6['techNme']." ".$row6['techSurnme']."</option>";
        }else{
          echo "<option value=>- อาจารย์ที่ปรึกษาคนที่ 2 -</option>";
        }       
        
        while($row = $result->fetch_assoc()){
            echo "<option value=".$row['techID'].">".$row['prefix']." ".$row['techNme']." ".$row['techSurnme']."</option>";
        }
        echo"</select>";
        $conn->close();
    ?>
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-5">
  <div class="form-group"> 
      <label for="field">ฝึกสหกิจทางด้าน</label>
         <select class="form-control" name="field" required>
           <option value="คณิตศาสตร์" <?php if ($row3["field"]=='คณิตศาสตร์') echo'selected'?>>คณิตศาสตร์</option>
           <option value="สถิติ" <?php if ($row3["field"]=='สถิติ') echo'selected'?>>สถิติ</option>
           <option value="คอมพิวเตอร์" <?php if ($row3["field"]=='คอมพิวเตอร์') echo'selected'?>>คอมพิวเตอร์</option>
           <option value="อื่นๆ" <?php if ($row3["field"]!='คณิตศาสตร์' && $row3["field"]!='สถิติ' && $row3["field"]!='คอมพิวเตอร์') echo'selected'?>>อื่นๆ</option>
          </select> 
  </div>
  </div>

  <div class="col-sm-4"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>ชื่อสถานประกอบการ</label>
    <?php
        include "dbconnect.php";
        $sql = "SELECT officeID, officeNme, province  FROM office ORDER BY officeID";
        $result = $conn->query($sql);

        $off = $row3['officeID'];
        $sql4 = "SELECT officeID, officeNme, province  FROM office WHERE officeID = $off";
        $result4 = $conn->query($sql4);
        $row4 = $result4->fetch_assoc();
        
        echo "<select id='searchddl' class='chosen-select' name='officeID' required>";
        echo "<option value=".$row4['officeID'].">".$row4['officeNme']." (".$row4['province'].")"."</option>";
        while($row = $result->fetch_assoc()){
            echo "<option value=".$row['officeID'].">".$row['officeNme']." (".$row['province'].")"."</option>";
        }
        echo"</select>";
        $conn->close();
    ?>
  </div>
  </div>

  <div class="col-sm-3"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <a href='insertOffice.php' target='_blank' >
      <button type="button" class="btn btn-warning">เพิ่มสถานประกอบการ</button>
    </a>
  </div>
  </div>

  <div class="col-sm-6"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
        <label>เริ่มการฝึกสหกิจ &nbsp</label> 
        <input type="date" class="form-control" name="startDate" value="<?php echo $row3["startDate"] ?>" required >
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group"> 
        <label>สิ้นสุดการฝึกสหกิจ &nbsp</label> 
        <input type="date" class="form-control" name="endDate" value="<?php echo $row3["endDate"] ?>" required>
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>พี่เลี้ยงที่ติดต่อ &nbsp</label> 
    <input type="text" class="form-control" name="staffNme" value="<?php echo $row3["staffNme"] ?>" required>
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group"> 
    <label>อีเมลพี่เลี้ยง &nbsp</label> 
    <input type="email" class="form-control" name="emailStaff" value="<?php echo $row3["emailStaff"] ?>" required> 
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>แผนก/หน่วยงาน ของพี่เลี้ยง &nbsp</label> 
    <input type="text" class="form-control" name="department" value="<?php echo $row3["department"] ?>" required>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>ขอบเขตของโครงงาน &nbsp</label> 
    <textarea type="text" class="form-control" name="projectScope" required> <?php echo $row3["projectScope"] ?></textarea>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">
  
  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>ปัญหาและอุปสรรค์ &nbsp</label> 
    <textarea type="text" class="form-control" name="barriers" required> <?php echo $row3["barriers"] ?> </textarea>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>คำแนะนำสำหรับนักศึกษาในหลักสูตร &nbsp</label> 
    <textarea type="text" class="form-control" name="suggestion" required> <?php echo $row3["suggestion"] ?></textarea>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-6">
  <div class="form-group">
    <label>คำแนะนำจากอาจารย์นิเทศฝึกงาน &nbsp</label>
    <textarea type="text" class="form-control" name="counsel" required> <?php echo $row3["counsel"] ?> </textarea>
  </div>
  </div>

  <div class="col-sm-3"></div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-3"></div>

  <div class="col-sm-3">
  <div class="form-group">
    <label>ไฟล์ Resume(PDF) &nbsp</label> 
    <p><a href="fileCooperative/<?php echo $row3["fileResume"]?>" target="_blank"><?php echo $row3["fileResume"]?></a> </p>
    <input type="file" class="form-control" name="fileResume">
  </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group"> 
    <label>ไฟล์รายงาน(PDF) &nbsp</label>
    <p><a href="fileCooperative/<?php echo $row3["fileCooperative"]?>" target="_blank"><?php echo $row3["fileCooperative"]?></a> </p> 
    <input type="file" class="form-control" name="fileCooperative">
  </div>
  </div>

  <div class="col-sm-12"></div>

</div>

<div class="row">

  <div class="col-sm-4"></div>

  <div class="col-sm-4">
  <div class="form-group">
    <center>
    <input type="submit" name="updateCooperativeTraining" class="btn btn-primary" value="บันทึก">
    </center>
  </div>
  </div>

  <div class="col-sm-4"></div>


</div>
</form> 

<?php 
}else{
?>
    <center>
    <br><br><br>
    <h3>ข้อมูลของท่านได้ยืนยันความถูกต้องแล้ว ไม่สามารถแก้ไขได้</h3>
    <a href="showCooperativeTraining.php"><h4>ดูข้อมูลการฝึกสหกิจศึกษา</h4></a>
    </center>
<?php 
}
?>
<!-- ********************************************************************************************* -->

</div>

  <script src="docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>