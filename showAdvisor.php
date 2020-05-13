<!doctype html>

<html lang="en">
<head>
<title>ข้อมูลการฝึกงาน</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="chosen.css"> 
<style>
table {
    border-collapse: collapse;
    width: 70%;
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

if(isset($_POST['searchbtn'])){ 
    
    $search = $_POST['search'];

        $sql = "SELECT * FROM advisor 
        WHERE techNme  LIKE '%".$search."%' 
        OR  techSurnme  LIKE '%".$search."%' ";     
        $result = $conn->query($sql);

    // ============================การแบ่งหน้า=====================================================
    $numfound = $result->num_rows; //return the number of records

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
    $sql = "SELECT * FROM advisor ";
    $result = $conn->query($sql);

        // ============================การแบ่งหน้า=====================================================
        $numfound = $result->num_rows; //return the number of records
		
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

// $conn->close();

"<body>";
echo "<center>";

echo "<h2>ข้อมูลอาจารย์ ภาควิชาคณิตศาสตร์และวิทยาการคอมพิวเตอร์</h2>";
echo "<br>";

echo "<form action='showAdvisor.php' method='post'>";
echo "<div class='row'>";
echo "<div class='col-sm-4'></div>";
echo "<div class='col-sm-3'>";
echo "<input type='text' class='form-control' placeholder='ป้อนคำค้น ชื่อ-สกุลของอาจารย์' name='search' >";
echo "</div>";
echo "<div class='col-sm-1'>";
echo "<input type='submit' name='searchbtn' class='btn btn-primary' value='ค้นหา'>";
echo "</div>";
echo "<div class='col-sm-4'></div>";
echo "</div>";
echo "<br>";
echo "</form>";

// =================แสดงจำนวน============================
echo "<table>";
if($numfound > 0){
    echo "<tr>";
    if(isset($_POST['searchbtn'])){
        echo "<br><h4>ผลลัพธ์ของคำว่า -".$search."-</h4>";
    }
    echo "<td>.<h4>ข้อมูลทั้งหมด :".$numfound." คน</h4></td>";
    echo "</tr>";
}
else{
    if(isset($_POST['searchbtn'])){
        echo "<br><h4>ผลลัพธ์ของคำว่า -".$search."-</h4>";
    }
    echo "<h3>-ไม่พบข้อมูลที่ค้นหา-</h3>";
}
echo "</table>";

// ======================แสดงตารางข้อมูล============================
$sql = $sql."LIMIT $start , $p_size";
$result = $conn->query($sql);

echo "<table class='w3-table-all w3-card-4' style = 'width: 70%'>";
if ($result->num_rows > 0) {

echo "<tr>";
echo "<th>ตำแหน่งทางวิชาการ</th>";
echo "<th>ชื่อ-นามสกุล</th>";
echo "<th>แก้ไขข้อมูล</th>";
echo "<th>ลบข้อมูล</th>";
echo "</tr>";
    while($row = $result->fetch_assoc()) {
        
        echo "<tr>";
        echo "<td>".$row["prefix"]."</td>";      
        echo "<td>".$row["techNme"]." ".$row["techSurnme"]."</td>";

		echo "<td>";
		echo "<form action = 'editAdvisor.php' method ='post'> ";
		echo "<input type='hidden' name ='techID'  value = '".$row["techID"]."'/>";		
		echo "<input name = 'editAdvisor' type='submit' value='แก้ไขข้อมูล' />";
		echo "</form>";
		echo "</td>";

		echo "<td>";
		echo "<form action = 'operation.php' method ='post'> ";
		echo "<input type='hidden' name ='techID'  value = '".$row["techID"]."'/>";
		echo "<input name = 'delAdvisor' type='submit' value='ลบข้อมูล' />";
		echo "</form>";
		echo "</td>";

        echo "</tr>";	
    }
}
echo "</table>";

if($numfound > 0){
// ====================การแบ่งหลายหน้า=================================
echo "<table>";
echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
	echo"<form name='divide' action = 'showAdvisor.php' method ='post'> ";

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
echo "</center>";
?>

</body>
</html>