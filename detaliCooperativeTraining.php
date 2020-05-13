<!DOCTYPE html>
<html lang="en">
<head>
  <title>รายละเอียดการฝึกสหกิจศึกษา</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
</head>

<?php
session_start();
include "dbconnect.php";
include "menu.php";

$id = $_SESSION['valid_id'];

$getID = $_POST['getID'];

$sql = "SELECT stuID, stuNme, stuSurnme, techID FROM student WHERE stuID = '$getID' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 

$sql2 = "SELECT techNme,techSurnme, prefix FROM advisor 
        WHERE techID = (SELECT techID FROM cooperativetraining WHERE stuID = '$getID' )";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc(); 

$sql2_2 = "SELECT techNme,techSurnme, prefix FROM advisor 
        WHERE techID = (SELECT tech2ID FROM cooperativetraining WHERE stuID = '$getID' )";
$result2_2 = $conn->query($sql2_2);
$row2_2 = $result2_2->fetch_assoc(); 

$sql3 = "SELECT * FROM cooperativetraining 
        WHERE stuID = '$getID' ";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc(); 
?>  

<body>

<div class="container">

<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
  <div class="form-group">
        
    <table class="w3-table">
    <tr>
      <th>
      <center><h2>ข้อมูลการฝึกสหกิจศึกษา</h2></center>
      </th>
    </tr>
    
    <tr>
        <td>
        <center>
        <h4>รหัสนักศึกษา: <?php echo $row["stuID"]?> ชื่อ: <?php echo $row['stuNme']." ".$row['stuSurnme']; ?></h4>
        </center>
        </td>

    </tr>
   </table>
  </div></div>
 
  <div class="col-sm-2"></div>
</div>


<div class="row">
  <div class="col-sm-2"></div>

  <div class="col-sm-8">
  <div class="form-group">
  <table class="w3-table-all w3-card-4">
  <?php 
    if( $row3['tech2ID'] == 0){
    echo "<tr>";
      echo "<td>";
        echo "<label>";
         echo "อาจารย์ที่ปรึกษา: ";
        echo "</label> ";
      echo "</td>";
      echo "<td>";
       echo $row2['prefix']." ".$row2['techNme']." ".$row2['techSurnme']; 
      echo "</td>";
    echo "</tr>";
      }
    else{
    echo "<tr>";
        echo "<td>";
        echo "<label>";
         echo "อาจารย์ที่ปรึกษาคนที่ 1: ";
        echo "</label> ";
      echo "</td>";
      echo "<td>";
        echo $row2['prefix']." ".$row2['techNme']." ".$row2['techSurnme'];
      echo "</td>";
    echo "</tr>";

    echo "<tr>";
      echo "<td>";
        echo "<label>";
         echo "อาจารย์ที่ปรึกษาคนที่ 2: ";
        echo "</label> ";
      echo "</td>";
      echo "<td>";
        echo $row2_2['prefix']." ".$row2_2['techNme']." ".$row2_2['techSurnme'];
      echo "</td>"; 
    echo "</tr>";
      }
    ?>

    <tr>
      <td>
        <label>ภาคการศึกษา: </label> 
      </td>
      <td>
        <t><?php echo $row3["term"]?></t>
      </td>
    </tr>

    <tr>
      <td>
        <label>ปีการศึกษา: </label>
      </td>
      <td>
        <t><?php echo $row3["years"]?></t>
      </td>
    </tr>
       
    <tr>
      <td>
        <label>ชื่อสถานประกอบการ:</label>
      </td>
      <td> 
        <?php
        $x= $row3["officeID"];
        $sql4 = "SELECT officeID, officeNme, province, tell  FROM office  WHERE officeID = '$x'";
        $result4 = $conn->query($sql4);
        $row4 = $result4->fetch_assoc();
        ?>
        <t> <?php echo $row4["officeNme"]." (".$row4["province"].") "?></t>
      </td>
    </tr>

    <tr>
      <td>
         <label>เบอร์โทรศัพท์: </label>
      </td>
      <td>
        <t><?php echo $row4["tell"]?></t>
      </td>
    </tr>

    <tr>
      <td>
         <label>ฝึกงานทางด้าน: </label>
      </td>
      <td>
        <t><?php echo $row3["field"]?></t>
      </td>
    </tr>

    <tr>
      <td>
         <label>เริ่มการฝึกสหกิจ: </label>
      </td>
      <td>
         <t><?php echo $row3["startDate"]?></t>
      </td>
    </tr>

    <tr>
      <td>
        <label>สิ้นสุดการฝึกสหกิจ: </label>
      </td>
      <td>
         <t><?php echo $row3["endDate"]?></t>
      </td>
    </tr>

    <tr>
      <td>
        <label>พี่เลี้ยงที่ติดต่อ: </label>
      </td>
      <td>
        <t><?php echo $row3["staffNme"]?></t>
      </td>
    </tr>

    <tr>
      <td> 
        <label>อีเมลพี่เลี้ยง: </label>
      </td>
      <td>
        <t><?php echo $row3["emailStaff"]?></t>
      </td>
    </tr>

    <tr>
      <td>
         <label>แผนก/หน่วยงาน ของพี่เลี้ยง: </label>
      </td>
      <td>
        <t><?php echo $row3["department"]?></t> 
      </td>
    </tr>

    <tr>
      <td>  
        <label>ลักษณะงาน: </label>  
      </td>
      <td>
        <t><?php echo $row3["projectScope"]?></t>
      </td>
    </tr>

    <tr>
      <td>
        <label>ปัญหาและอุปสรรค์: </label>
      </td>
      <td>
        <t><?php echo $row3["barriers"]?></t>
      </td>
    </tr>

    <tr>
      <td>     
        <label>คำแนะนำสำหรับนักศึกษาในหลักสูตร: </label>
      </td>
      <td>     
        <t><?php echo $row3["suggestion"]?></t>
      </td>
    </tr>

    <tr>
      <td>   
        <label>คำแนะนำจากอาจารย์นิเทศฝึกงาน: </label>
      </td>
      <td>       
         <t><?php echo $row3["counsel"]?></t>
      </td>
    </tr>

    <tr>
      <td>      
        <label>ไฟล์ Resume(PDF): </label>
      </td>
      <td>       
        <t><a href="fileCooperative/<?php echo $row3["fileResume"]?>" target="_blank"><?php echo $row3["fileResume"]?></a></t>
      </td>
    </tr>

    <tr>
      <td>     
        <label>ไฟล์รายงาน(PDF): </label>
      </td>
      <td>
        <t><a href="fileCooperative/<?php echo $row3["fileCooperative"]?>" target="_blank"><?php echo $row3["fileCooperative"]?></a></t>
      </td>
    </tr>

  </table>      
  </div></div>

  <div class="col-sm-2"></div>
</div>

 
  
  
 
</div>
</body>
</html>