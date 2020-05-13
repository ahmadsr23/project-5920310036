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

if(isset($_POST['searchbtn'])){ 
    
    $search = $_POST['search'];
    $valueFrom = $_POST['valueFrom'];

    if($valueFrom==0){
        $sql = "SELECT * FROM internships  
        JOIN student ON internships.stuID = student.stuID 
        JOIN office  ON internships.officeID  = office.officeID 
        WHERE student.stuID  LIKE '%".$search."%' AND checkInternships = 1 ";     
    $result = $conn->query($sql);
    }

    else if($valueFrom==1){
        $sql = "SELECT * FROM internships  
        JOIN student ON internships.stuID = student.stuID 
        JOIN office  ON internships.officeID  = office.officeID 
        WHERE student.stuNme  LIKE '%".$search."%' AND checkInternships = 1 
        OR student.stuSurnme  LIKE '%".$search."%' AND checkInternships = 1 ";     
    $result = $conn->query($sql);
    }

    else if($valueFrom==2){
        $sql = "SELECT * FROM internships  
        JOIN student ON internships.stuID = student.stuID 
        JOIN office  ON internships.officeID  = office.officeID 
        WHERE internships.officeID  LIKE '%".$search."%' AND checkInternships = 1 ";     
    $result = $conn->query($sql);
    }
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
    $sql = "SELECT * FROM internships 
        JOIN student ON internships.stuID = student.stuID 
        JOIN office  ON internships.officeID  = office.officeID 
        WHERE checkInternships = 1 ";
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
echo "<h2>การฝึกงานของนักศึกษา หลักสูตรสาขาคณิตศาสตร์ประยุกต์</h2>";
echo "<br>";

echo "<form name='search' action='showInternships.php' method='post'>";
echo "<div class='row'>";
echo "<div class='col-sm-3'></div>";

echo "<div class='col-sm-2'>";
echo "<div class='form-group'>";
echo "<select class='form-control' name='searchForm' onchange='document.search.submit();' >";
    echo "<option value='0'";
        if($_POST['searchForm']==0){
            echo'selected';
        }
        echo ">ค้นหาตามรหัสนักศึกษา</option>";
    echo "<option value='1'";
        if($_POST['searchForm']==1){
            echo'selected';
        }
        echo ">ค้นหาตามชื่อ-สกุล</option>";
    echo "<option value='2'";
        if($_POST['searchForm']==2){
            echo'selected';
        }
        echo ">ค้นหาตามสถานประกอบการ</option>";
    echo "</select>";
    echo "</div>";
echo "</div>";

$searchForm = $_POST['searchForm'];

if( $searchForm==0){
    echo "<div class='col-sm-3'>";
    echo "<input type='text' class='form-control' placeholder='ป้อนคำค้น รหัสนักศึกษา' name='search' >";
    echo "<input type='hidden' name='valueFrom' value='0'>";
    echo "</div>";

}
else if( $searchForm==1){
    echo "<div class='col-sm-3'>";
    echo "<input type='text' class='form-control' placeholder='ป้อนคำค้น ชื่อ-สกุล นักศึกษา' name='search' >";
    echo "<input type='hidden' name='valueFrom' value='1'>";
    echo "</div>";

}
else if( $searchForm==2){
    echo "<div class='col-sm-4'>";
        $sql3 = "SELECT officeID, officeNme, province  FROM office ORDER BY officeID";
        $result3 = $conn->query($sql3);
        echo "<select class='chosen-select' name='search'>";
        echo "<option value=''>- เลือกสถานประกอบการ -</option>";
        while($row3 = $result3->fetch_assoc()){
            echo "<option value=".$row3['officeID'].">".$row3['officeNme']." (".$row3['province'].")"."</option>";
        }
        echo"</select>";
    echo "<input type='hidden' name='valueFrom' value='2'>";
    echo "</div>";

    
}

echo "<div class='col-sm-1'>";
    echo "<input type='submit' name='searchbtn' class='btn btn-primary' value='ค้นหา'>";
echo "</div>";

echo "<div class='col-sm-3'></div>";

echo "</div>";
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

echo "<table class='w3-table-all w3-card-4' style = 'width: 90%'>";
if ($result->num_rows > 0) {

echo "<tr>";
echo "<th>รหัสนักศึกษา</th>";
echo "<th>ชื่อ-นามสกุล</th>";
echo "<th>ปีการศึกษา</th>";
echo "<th>สถานประกอบการ</th>";
echo "<th>รายละเอียด</th>";
echo "</tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["stuID"]."</td>";
        
        echo "<td>".$row["stuNme"]." ".$row["stuSurnme"]."</td>";
        echo "<td>".$row["years"]."</td>";
        echo "<td>".$row["officeNme"]."</td>";
        echo "<form action='detaliInternships.php' method='post' target='_blank'>";
        echo "<td> <a href='detaliInternships.php' >
                   <input type='hidden' name='getID' value='".$row["stuID"]."'>
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
	echo"<form name='divide' action = 'showInternships.php' method ='post'> ";

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

  <script src="docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>