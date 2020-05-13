<!doctype html>
<html>
<head>
<title>ตรวจสอบตวามถูกต้องของข้อมูล</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
<style>
table {
    border-collapse: collapse;
    width: 90%;
}

th, td {
    text-align: left;
    padding: 8px;
    height: 40px;
}

/* tr:nth-child(even){background-color: #f3f3f3} */

th {
    background-color: #cacaca;
    color:  #1e1e1e;
}
</style>
</head>


<?php
include "dbconnect.php";
include "menu.php";

$id = $_SESSION['valid_id'];

$sql = "SELECT * FROM advisor  WHERE email = '$id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 

if(isset($_POST['searchbtn'])){ 
    $years = $_POST['years'];
    $check = $_POST['check'];

    if($check!='' && $years!=''){
    $sql2 = "SELECT * FROM internships 
                WHERE techID = (SELECT techID FROM advisor WHERE email = '$id' )
                AND years  LIKE '%".$years."%' AND checkInternships = '%".$check."%' ";
    $result2 = $conn->query($sql2);
    }

    else if($years!=''){
        $sql2 = "SELECT * FROM internships 
        WHERE techID = (SELECT techID FROM advisor WHERE email = '$id' ) 
                        AND years  LIKE '%".$years."%' ";
        $result2 = $conn->query($sql2);

    }

    else if($check!=''){
        $sql2 = "SELECT * FROM internships 
        WHERE techID = (SELECT techID FROM advisor WHERE email = '$id' ) 
                        AND checkInternships  LIKE '%".$check."%' ";
        $result2 = $conn->query($sql2);

    }
    else{
    
        $sql2 = "SELECT * FROM internships 
                        WHERE techID = (SELECT techID FROM advisor WHERE email = '$id' )";
        $result2 = $conn->query($sql2);    
    }

    // ============================การแบ่งหน้า=====================================================
    $numfound = $result2->num_rows; //return the number of records

	$p_size = 10; //กำหนดจำนวน record เริ่มต้นที่จะแสดงผลต่อ 1 เพจ
	
	$total_page=(int)($numfound/$p_size); 
	//ทำการหารหาจำนวนหน้าทั้งหมดของข้อมูล ในที่นี้ให้หารออกมาเป็นเลขจำนวนเต็ม 
	if(($numfound % $p_size)!=0){ //ถ้าข้อมูลมีเศษให้ทำการบวกเพิ่มจำนวนหน้าอีก 1 
	   $total_page++;
	}

    if($_POST['nextPage']){
		$p = $_POST['pageno'];
		if ( $p < $total_page)
			$page=$p + 1;
		else $page=$p;
		$start=$p_size*($page-1);

	}else if($_POST['firstPage']){
		$page=1;
		$start=$p_size*($page-1);

	}else if($_POST['lastPage']){
		$page=$total_page;
		$start=$p_size*($page-1);
	}else if($_POST['prePage']){
		$p= $_POST['pageno'];
		if($p >= 2)
			$page = $p - 1;
		else $page = $p;
		$start = $p_size*($page-1);
	}else if($_POST['pageno']){
		$page=$_POST['pageno'];
		$start=$p_size*($page-1);

	}else{
	/*
	ถ้่ายังไม่มีการส่งค่ามาเพื่อทำการเลือกดูหน้าข้อมูลใด ๆ ให้กำหนดเป็นหน้าแรกของข้อมูลเป็นค่า Default และให้ Record แรกเริ่มที่ Record ที่ 0 หรือ Record แรก
	*/ 
	   $page=1;
	   $start=0;
	}		
    // =============================================================================================

}
else{
    
    $sql2 = "SELECT * FROM internships 
                    WHERE techID = (SELECT techID FROM advisor WHERE email = '$id' )";
    $result2 = $conn->query($sql2);

    // ============================การแบ่งหน้า=====================================================
    $numfound = $result2->num_rows; //return the number of records

	$p_size = 10; //กำหนดจำนวน record เริ่มต้นที่จะแสดงผลต่อ 1 เพจ
	
	$total_page=(int)($numfound/$p_size); 
	//ทำการหารหาจำนวนหน้าทั้งหมดของข้อมูล ในที่นี้ให้หารออกมาเป็นเลขจำนวนเต็ม 
	if(($numfound % $p_size)!=0){ //ถ้าข้อมูลมีเศษให้ทำการบวกเพิ่มจำนวนหน้าอีก 1 
	   $total_page++;
	}

    if($_POST['nextPage']){
		$p = $_POST['pageno'];
		if ( $p < $total_page)
			$page=$p + 1;
		else $page=$p;
		$start=$p_size*($page-1);

	}else if($_POST['firstPage']){
		$page=1;
		$start=$p_size*($page-1);

	}else if($_POST['lastPage']){
		$page=$total_page;
		$start=$p_size*($page-1);
	}else if($_POST['prePage']){
		$p= $_POST['pageno'];
		if($p >= 2)
			$page = $p - 1;
		else $page = $p;
		$start = $p_size*($page-1);
	}else if($_POST['pageno']){
		$page=$_POST['pageno'];
		$start=$p_size*($page-1);

	}else{
	/*
	ถ้่ายังไม่มีการส่งค่ามาเพื่อทำการเลือกดูหน้าข้อมูลใด ๆ ให้กำหนดเป็นหน้าแรกของข้อมูลเป็นค่า Default และให้ Record แรกเริ่มที่ Record ที่ 0 หรือ Record แรก
	*/ 
	   $page=1;
	   $start=0;
	}		
    // =============================================================================================
}

?>

<body>

<div class="row">
  <div class="col-sm-12">
  <div class="form-group"> 
  <center>
     <h2> อาจารย์ที่ปรึกษา : <?php echo $row["prefix"]." ".$row["techNme"]." ".$row["techSurnme"]?></h2>
  </center>
  </div>
  </div>
</div>
<br>
<?php
echo "<form action='checkInternships.php' method='post'>";

echo "<div class='row'>";

echo "<div class='col-sm-3'></div>";

echo "<div class='col-sm-3'>";
   
        $sql4 = "SELECT years  FROM internships GROUP BY years";
        $result4 = $conn->query($sql4);
    echo "<div class='input-group'>";
        echo "<span class='input-group-addon'>ปีการศึกษา</span>";
        echo "<select class='form-control' name='years'>";
        echo "<option value=''>- ปีการศึกษาทั้งหมด -</option>";
        while($row4 = $result4->fetch_assoc()){
            echo "<option value=".$row4['years'].">".$row4['years']."</option>";
        }
        echo"</select>";
    echo "</div>";
echo "</div>";

echo "<div class='col-sm-2'>";
    echo "<div class='input-group'>";
        echo "<span class='input-group-addon'>สถานะ</span>";
        echo "<select class='form-control' name='check'>";
        echo "<option value=''>- ทั้งหมด -</option>";
        echo "<option value='1'>ตรวจสอบแล้ว</option>";
        echo "<option value='0'>ยังไม่ตรวจสอบ</option>";
        echo"</select>";
    echo "</div>";
echo "</div>";


echo "<div class='col-sm-1'>";
    echo "<input type='submit' name='searchbtn' class='btn btn-primary' value='ค้นหา'>";
echo "</div>";

echo "<div class='col-sm-3'></div>";

echo "</div>";
echo "</form>";
?>

<center>
<table>
    <tr>
    <td><h3>ข้อมูลนักศึกษาฝึกงาน</h3><td>
    </tr>
</table>
</center>

<?php

// ======================แสดงตารางข้อมูล============================
$sql2 = $sql2."LIMIT $start , $p_size";
$result2 = $conn->query($sql2);

echo "<center>";
if ($result2->num_rows > 0) {
    
    echo "<table class='w3-table-all w3-card-4' style = 'width: 90%'>";
    echo "<tr>";
    echo "<th>รหัสนักศึกษา</th>";
    echo "<th>ปีการศึกษา</th>";
    echo "<th>สถานะ</th>";
    echo "<th>รายละเอียด</th>";
    echo "</tr>";
    while($row2 = $result2->fetch_assoc()) {
		echo "<tr>";
        echo "<td>".$row2["stuID"]."</td>";
        echo "<td>".$row2["years"]."</td>";
        if($row2["checkInternships"]==0){
            echo "<td style='color:red'>ยังไม่ตรวจสอบ</td>";
        }  
        else{
            echo "<td style='color:Lime'>ตรวจสอบแล้ว</td>";
        }
        echo "<form action='checkDetaliInternships.php' method='post' >";
        echo "<td> <a href='checkDetaliInternships.php'>
            <input type='hidden' name='getID' value='".$row2["stuID"]."'>
            <input type='submit' value='ดูเพิ่มเติม'></a></td>";
        echo "</form>";
		echo "</tr>";	
    }
}
    echo "</table>";

    if($numfound > 0){
        // ====================การแบ่งหลายหน้า=================================
        echo "<table>";
        echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
            echo"<form name='divide' action = 'checkInternships.php' method ='post'> ";
        
            echo "แสดงหน้าที่ : <select  name = pageno value =$page onchange='document.divide.submit();'>";
        
                for($i=1;$i<=$total_page;$i++){ //สร้าง list เพื่อให้ผู้ใช้งานเลือกชมหน้าข้อมูล
                    echo "<option ";
                     if($page==$i)
                             echo "selected='selected'";
                    echo "value=",$i, ">",$i;
                }        	
            echo "</select>  จากทั้งหมด ".$total_page." หน้า &nbsp";
        echo "</td></tr>";
        
        echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
            echo "<input class='btn btn-info btn-sm' name = 'firstPage' type='submit' value='<< หน้าเเรก' /> &nbsp";
            echo "<input class='btn btn-default btn-sm' name = 'prePage' type='submit' value='< ก่อนหน้า' /> &nbsp";
            echo "<input class='btn btn-default btn-sm' name = 'nextPage' type='submit' value='ถัดไป >' /> &nbsp";
            echo "<input class='btn btn-info btn-sm' name = 'lastPage' type='submit' value='สุดท้าย >>' /> &nbsp";
            echo "</form>";    
        echo "</td></tr>";
        echo "</table>";
        
        }
    else{   
        echo "<h4> - ไม่มีข้อมูล -</h4>";
    }

echo "</center>";
?>

</body>
</html>