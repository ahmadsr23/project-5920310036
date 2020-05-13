<!doctype html>

<html>
<head>
<title>ข้อมูลกิจกรรมการเตรียมสหกิจศึกษา</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
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
session_start();
include "dbconnect.php";
include "menu.php";

if(isset($_POST['searchbtn'])){ 
        $search = $_POST['search'];
 
        $sql3 = "SELECT * FROM cooperativepreparation
            JOIN student ON cooperativepreparation.stuID = student.stuID 
            WHERE student.stuID     LIKE '%".$search."%' 
            OR student.stuNme       LIKE '%".$search."%'
            OR student.stuSurnme    LIKE '%".$search."%' 
            GROUP BY student.stuID  ORDER BY student.stuID ASC ";
        $result3 = $conn->query($sql3);

        // ============================การแบ่งหน้า=====================================================
    $numfound = $result3->num_rows; //return the number of records

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
else if(isset($_POST['getIDbtn'])){
    $id = $_POST['getID'];
    $sqlID = "SELECT * FROM cooperativepreparation 
    WHERE stuID = '$id' ";
    $resultID = $conn->query($sqlID);

    if ($resultID->num_rows > 0){
        $sql = "SELECT * FROM cooperativepreparation 
        WHERE stuID = '$id'";
        $result = $conn->query($sql);
    
        $sql1 = "SELECT * FROM cooperativepreparation 
        WHERE stuID = '$id'";
        $result1 = $conn->query($sql1);
    
    
        $sql2 = "SELECT stuID, stuNme, stuSurnme FROM student WHERE stuID = '$id' ";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc(); 
        } 
}

else {
    $sql3 = "SELECT * FROM cooperativepreparation
             JOIN student ON cooperativepreparation.stuID = student.stuID 
             GROUP BY student.stuID  ORDER BY student.stuID ASC ";
    $result3 = $conn->query($sql3);

    
    $email = $_SESSION['valid_id'];
    $sqlID = "SELECT * FROM cooperativepreparation 
    WHERE stuID = (SELECT stuID FROM student WHERE email = '$email' ) ";
    $resultID = $conn->query($sqlID);
    

    if ($resultID->num_rows > 0){
    $sql = "SELECT * FROM cooperativepreparation 
    WHERE stuID = (SELECT stuID FROM student WHERE email = '$id' )";
    $result = $conn->query($sql);

    $sql1 = "SELECT * FROM cooperativepreparation 
    WHERE stuID = (SELECT stuID FROM student WHERE email = '$id' )";
    $result1 = $conn->query($sql1);


    $sql2 = "SELECT stuID, stuNme, stuSurnme FROM student WHERE email = '$id' ";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc(); 
    }
    
    // ============================การแบ่งหน้า=====================================================
    $numfound = $result3->num_rows; //return the number of records

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

"<body>";
echo "<center>";

echo "<h2>กิจกรรมการเตรียมสหกิจศึกษา</h2>";
echo "<br>";

echo "<form action='showCooperativePreparation.php' method='post'>";
echo "<div class='row'>";
echo "<div class='col-sm-4'></div>";
echo "<div class='col-sm-3'>";
echo "<input type='text' class='form-control' placeholder='ป้อนคำค้น รหัสนักศึกษาหรือชื่อ-สกุลนักศึกษา' name='search' >";
echo "</div>";
echo "<div class='col-sm-1'>";
echo "<input type='submit' name='searchbtn' class='btn btn-primary' value='ค้นหา'>";
echo "</div>";
echo "<div class='col-sm-4'></div>";
echo "</div>";
echo "<br>";
echo "</form>";

// ********************เมื่อกดปุ่มค้นหา****************** 
if(isset($_POST['searchbtn'])){

    // =================แสดงจำนวน============================
    echo "<table>";
    if($numfound > 0){
        echo "<tr>";
        
        echo "<br><h4>ผลลัพธ์ของคำว่า -".$search."-</h4>";
        
        echo "<td>.<h4>ข้อมูลทั้งหมด :".$numfound." คน</h4></td>";
        echo "</tr>";
    }
    else{
        echo "<br><h4>ผลลัพธ์ของคำว่า -".$search."-</h4>";
        echo "<br><h3>-ไม่พบข้อมูลที่ค้นหา-</h3>";
    }
    echo "</table>";

    $sql3 = $sql3."LIMIT $start , $p_size";
    $result3 = $conn->query($sql3);

    echo "<table class='w3-table-all w3-card-4' style = 'width: 70%'>";
        if ($result3->num_rows > 0) {
        echo "<tr>";
        echo "<th>รหัสนักศึกษา</th>";
        echo "<th>ชื่อ-นามสกุล</th>";
        echo "<th>รายละเอียด</th>";
        echo "</tr>";

          while($row3 = $result3->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row3["stuID"]."</td>";        
            echo "<td>".$row3["stuNme"]." ".$row3["stuSurnme"]."</td>";
            echo "<form action='showCooperativePreparation.php' method='post'>";
            echo "<td> <a href='showCooperativePreparation.php' >
                   <input type='hidden' name='getID' value='".$row3["stuID"]."'>
                   <input type='submit' name='getIDbtn'value='ดูเพิ่มเติม'></a></td>";
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
}
// ***************************************************************************

// ---------------------เมื่อกดปุ่มดูเพิ่มเติม---------------------------------------
else if(isset($_POST['getIDbtn'])){

if ($resultID->num_rows > 0){
    echo "<table>";
        echo "<tr>";
            echo "<td><h4>ข้อมูลกิจกรรมของ : ".$row2['stuNme']." ".$row2['stuSurnme']."</h4></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h4>รหัสนักศึกษา : ".$row2['stuID']."</h4></td>";
        echo "</tr>";
    echo "</table>";
    echo "<br>";
    
    echo "<table>";
        echo "<tr>";
        echo "<td><h4>กิจกรรมที่จัดโดย: คณะและภาควิชา</h4></td>";
        echo "</tr>";
    echo "</table>";
    
    echo "<table class='w3-table-all w3-card-4' style = 'width: 70%'>";
    echo "<tr>";
    echo "<th>ลำดับที่</th>";
    echo "<th>ชื่อกิจกรรม</th>";
    echo "<th>วันที่เข้าร่วม</th>";
    echo "<th>จำนวนชัวโมง</th>";
    echo "</tr>";
    
    if ($result->num_rows > 0 ) {
        $n=0;
        $sumHours1=0;
        while($row = $result->fetch_assoc()) {   
            if ($row["organizer"]=="คณะและภาควิชา") {
                echo "<tr>";
                echo "<td>".++$n."</td>";
                echo "<td>".$row["activity"]."</td>";
                echo "<td>".$row["actiDate"]."</td>";
                echo "<td>".$row["actiHours"]." ชั่วโมง</td>";
                $sumHours1 =$sumHours1+$row["actiHours"];
                echo "</tr>";	
            }     
        }     
    }
   
        echo "</table>";
        if($n==0){
            echo "<h3>-ไม่มีข้อมูลกิจกรรม-</h3>";     
        }
        echo "<table>";
            echo "<tr>";
            echo "<td style ='text-align:right'>";
            if ($sumHours1 < 24){
                echo "<h4>รวม <input type='button' class='btn btn-danger' value=".$sumHours1.">  ชั่วโมง</h4>"; 
            }
            else{
                echo "<h4>รวม <input type='button' class='btn btn-success' value=".$sumHours1.">  ชั่วโมง</h4>"; 
            }
            echo "</td>";
            echo "</tr>";
        echo "</table>";
    
    
        echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
                echo "<h5>***หมายเหตุ*** กิจกรรมเตรียมหสกิจที่จัดอบรมโดยคณะและหลักสูตร นักศึกษาต้องเข้าร่วมอย่างน้อย 24 ชั่วโมง</h5>";
            echo "</div>";
        echo "</div>";
        echo "<br><br><br>";
    
        echo "<table>";
            echo "<tr>";
            echo "<td><h4>กิจกรรมที่จัดโดย: มหาวิทยาลัย</h4></td>";
            echo "</tr>";
        echo "</table>";
    
    
        echo "<table class='w3-table-all w3-card-4' style = 'width: 70%'>";
            echo "<tr>";
                echo "<th>ลำดับที่</th>";
                echo "<th>ชื่อกิจกรรม</th>";
                echo "<th>วันที่เข้าร่วม</th>";
                echo "<th>จำนวนชัวโมง</th>";
            echo "</tr>";
    
    if ($result1->num_rows > 0 ) {
        $n=0;
        $sumHours2=0;	
        while($row = $result1->fetch_assoc()) {   
            if ($row["organizer"]=="มหาวิทยาลัย") {
                echo "<tr>";
                echo "<td>".++$n."</td>";
                echo "<td>".$row["activity"]."</td>";
                echo "<td>".$row["actiDate"]."</td>";
                echo "<td>".$row["actiHours"]." ชั่วโมง</td>";
                $sumHours2 =$sumHours2+$row["actiHours"];
                echo "</tr>";	
            }     
        }  
    }
    
    echo "</table>";
    if($n==0){
        echo "<h3>-ไม่มีข้อมูลกิจกรรม-</h3>";     
    }
    echo "<table>";
        echo "<tr>";
            echo "<td style ='text-align:right'>";
            if ($sumHours2 < 6){
                echo "<h4>รวม <input type='button' class='btn btn-danger' value=".$sumHours2.">  ชั่วโมง</h4>"; 
            }
            else{
                echo "<h4>รวม <input type='button' class='btn btn-success' value=".$sumHours2.">  ชั่วโมง</h4>"; 
            }
            echo "</td>";
        echo "</tr>";
    echo "</table>";
    
    
    echo "<div class='row'>";
    echo "<div class='col-sm-12'>";
    echo "<h5>***หมายเหตุ*** กิจกรรมเตรียมหสกิจที่จัดอบรมโดยมหาวิทยาลัย นักศึกษาต้องเข้าร่วมอย่างน้อย 6 ชั่วโมง</h5>";
    echo "</div>";
    echo "</div>";
    }
}    
// ------------------------------------------------------------------------------------------------------------

// ==================================แสดงข้อมูลของตัวเองเมื่อเข้าล็อคอิน===============================================
else if ($resultID->num_rows > 0){
    echo "<table>";
        echo "<tr>";
            echo "<td><h4>ข้อมูลกิจกรรมของ : ".$row2['stuNme']." ".$row2['stuSurnme']."</h4></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><h4>รหัสนักศึกษา : ".$row2['stuID']."</h4></td>";
        echo "</tr>";
    echo "</table>";
    echo "<br>";
    
    echo "<table>";
        echo "<tr>";
        echo "<td><h4>กิจกรรมที่จัดโดย: คณะและภาควิชา</h4></td>";
        echo "</tr>";
    echo "</table>";
    
    echo "<table class='w3-table-all w3-card-4' style = 'width: 70%'>";
    echo "<tr>";
    echo "<th>ลำดับที่</th>";
    echo "<th>ชื่อกิจกรรม</th>";
    echo "<th>วันที่เข้าร่วม</th>";
    echo "<th>จำนวนชัวโมง</th>";
    echo "</tr>";
    
    if ($result->num_rows > 0 ) {
        $n=0;
        $sumHours1=0;
        while($row = $result->fetch_assoc()) {   
            if ($row["organizer"]=="คณะและภาควิชา") {
                echo "<tr>";
                echo "<td>".++$n."</td>";
                echo "<td>".$row["activity"]."</td>";
                echo "<td>".$row["actiDate"]."</td>";
                echo "<td>".$row["actiHours"]." ชั่วโมง</td>";
                $sumHours1 =$sumHours1+$row["actiHours"];
                echo "</tr>";	
            }        
        }
             
    }
        echo "</table>";
        if($n==0){
            echo "<h3>-ไม่มีข้อมูลกิจกรรม-</h3>";     
        }
        echo "<table>";
            echo "<tr>";
            echo "<td style ='text-align:right'>";
            if ($sumHours1 < 24){
                echo "<h4>รวม <input type='button' class='btn btn-danger' value=".$sumHours1.">  ชั่วโมง</h4>"; 
            }
            else{
                echo "<h4>รวม <input type='button' class='btn btn-success' value=".$sumHours1.">  ชั่วโมง</h4>"; 
            }
            echo "</td>";
            echo "</tr>";
        echo "</table>";
    
    
        echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
                echo "<h5>***หมายเหตุ*** กิจกรรมเตรียมหสกิจที่จัดอบรมโดยคณะและหลักสูตร นักศึกษาต้องเข้าร่วมอย่างน้อย 24 ชั่วโมง</h5>";
            echo "</div>";
        echo "</div>";
        echo "<br><br><br>";
    
        echo "<table>";
            echo "<tr>";
            echo "<td><h4>กิจกรรมที่จัดโดย: มหาวิทยาลัย</h4></td>";
            echo "</tr>";
        echo "</table>";
    
    
        echo "<table class='w3-table-all w3-card-4' style = 'width: 70%'>";
            echo "<tr>";
                echo "<th>ลำดับที่</th>";
                echo "<th>ชื่อกิจกรรม</th>";
                echo "<th>วันที่เข้าร่วม</th>";
                echo "<th>จำนวนชัวโมง</th>";
            echo "</tr>";
    
    if ($result1->num_rows > 0 ) {
        $n=0;
        $sumHours2=0;	
        while($row = $result1->fetch_assoc()) {   
            if ($row["organizer"]=="มหาวิทยาลัย") {
                echo "<tr>";
                echo "<td>".++$n."</td>";
                echo "<td>".$row["activity"]."</td>";
                echo "<td>".$row["actiDate"]."</td>";
                echo "<td>".$row["actiHours"]." ชั่วโมง</td>";
                $sumHours2 =$sumHours2+$row["actiHours"];
                echo "</tr>";	
            }     
        }  
    }
    
    echo "</table>";
    if($n==0){
        echo "<h3>-ไม่มีข้อมูลกิจกรรม-</h3>";     
    }
    
    echo "<table>";
        echo "<tr>";
            echo "<td style ='text-align:right'>";
            if ($sumHours2 < 6){
                echo "<h4>รวม <input type='button' class='btn btn-danger' value=".$sumHours2.">  ชั่วโมง</h4>"; 
            }
            else{
                echo "<h4>รวม <input type='button' class='btn btn-success' value=".$sumHours2.">  ชั่วโมง</h4>"; 
            }
            echo "</td>";
        echo "</tr>";
    echo "</table>";
    
    
    echo "<div class='row'>";
    echo "<div class='col-sm-12'>";
    echo "<h5>***หมายเหตุ*** กิจกรรมเตรียมหสกิจที่จัดอบรมโดยมหาวิทยาลัย นักศึกษาต้องเข้าร่วมอย่างน้อย 6 ชั่วโมง</h5>";
    echo "</div>";
    echo "</div>";
    }
// ==============================================================================================================

// *****************************แสดงค่าทั้งหมด เมื่อเริ่มต้น*************************************************************
else{
    // =================แสดงจำนวน============================
    echo "<table>";
    if($numfound > 0){
        echo "<tr>";
        echo "<td>.<h4>ข้อมูลทั้งหมด :".$numfound." คน</h4></td>";
        echo "</tr>";
    }
    else{
        echo "<br><h3>-ไม่พบข้อมูลที่ค้นหา-</h3>";
    }
    echo "</table>";

    $sql3 = $sql3."LIMIT $start , $p_size";
    $result3 = $conn->query($sql3);

    echo "<table class='w3-table-all w3-card-4' style = 'width: 70%'>";
        if ($result3->num_rows > 0) {
        echo "<tr>";
        echo "<th>รหัสนักศึกษา</th>";
        echo "<th>ชื่อ-นามสกุล</th>";
        echo "<th>รายละเอียด</th>";
        echo "</tr>";

          while($row3 = $result3->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row3["stuID"]."</td>";        
            echo "<td>".$row3["stuNme"]." ".$row3["stuSurnme"]."</td>";
            echo "<form action='showCooperativePreparation.php' method='post'>";
            echo "<td> <a href='showCooperativePreparation.php' >
                   <input type='hidden' name='getID' value='".$row3["stuID"]."'>
                   <input type='submit' name='getIDbtn'value='ดูเพิ่มเติม'></a></td>";
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
}
// *********************************************************************************************

echo "</center>";
?>
</body>
</html>