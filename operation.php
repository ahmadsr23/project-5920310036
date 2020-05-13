<?php
    include "dbconnect.php"; //return connection $conn

    if(isset($_POST['register'])){ //in case of insertion
        // $id	=$_POST['id'];
		$nme		=$_POST['nme'];
		$surnme		=$_POST['surnme'];
		$username	=$_POST['username'];
		$pwd 		=$_POST['pwd'];
		$conpwd 	=$_POST['conpwd'];
		$class 		=$_POST['class'];
		
		$enpwd = hash('sha256', $pwd); //แปลงรหัส  

		//check repeated email อีเมลซ้ำ
		$sql1 = "Select * From user Where username='$username'";
		$rs1 = mysqli_query($conn,$sql1);
		if($rs1->num_rows>0){ //meaning repeated email          		
              echo "<script>
					alert('อีเมลนี้มีผู้ใช้ลงทะเบียนแล้ว!');
					window.location.href='register.php';
					</script>";	
					return;				
			}
		
		//check email นักศึกษามีในฐานข้อมูลที่กำหนดไม
		if($class=="นักศึกษา"){
			$sql2 = "Select * From student Where email ='$username'";
			$rs2 = mysqli_query($conn,$sql2);
			if($rs2->num_rows<=0){           		
			echo "<script>
				  alert('อีเมลสำหรับนักศึกษา ไม่ถูกต้องตามรูปแบบที่กำหนด!');
				  window.location.href='register.php';
				  </script>";
				  return;					
				}
			}
		
		//check email อาจารย์มีในฐานข้อมูลที่กำหนดไม
		if($class=="อาจารย์"){
			$sql3 = "Select * From advisor Where email ='$username'";
			$rs3 = mysqli_query($conn,$sql3);
			if($rs3->num_rows<=0){           		
			echo "<script>
				  alert('อีเมลสำหรับอาจารย์ ไม่ถูกต้องตามรูปแบบที่กำหนด!');
				  window.location.href='register.php';
				  </script>";
				  return;				
				}	
			}
		

		//check password ยืนยันรหัสผ่าน
		if($pwd!=$conpwd){
				echo "<script>
					  alert('รหัสผ่านไม่ตรงกัน!');
					  window.location.href='register.php';
					  </script>";
					  return;	
			}
			
		else {//not repeated, can insert 

			$sql= "INSERT INTO user (nme, surnme, username, pwd, class)
								VALUES 	 ('$nme', '$surnme', '$username', '$enpwd', '$class')";
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('ลงทะเบียนเสร็จเรียบร้อย'); window.location.href='login.php';</script>";
			}else{
			echo "<script> alert('ลงทะเบียนผิดพลาด!!!');window.location.href='register.php'</script>";
			}
		}
	}//end register
	
	else if(isset($_POST['insertInternships'])){ //in case of update ฝึกงาน
		$stuID		=$_POST['stuID'];
		$techID		=$_POST['techID'];
		$term		=$_POST['term'];
        $years		=$_POST['years'];
		$field		=$_POST['field'];
		$officeID			=$_POST['officeID'];
		$staffNme			=$_POST['staffNme'];
		$department			=$_POST['department'];
		$emailStaff			=$_POST['emailStaff'];
		$jobDescription		=$_POST['jobDescription'];
		$barriers			=$_POST['barriers'];
		$suggestion			=$_POST['suggestion'];
		$counsel			=$_POST['counsel'];
		$startDate 	 	    =$_POST['startDate'];
		$endDate     	    =$_POST['endDate'];

		$path = "fileInters/";
		$name1 = $_FILES['fileResume']['name'];		
		$tmp1 = $_FILES['fileResume']['tmp_name'];
		$name2 = $_FILES['fileInternships']['name'];
		$tmp2 = $_FILES['fileInternships']['tmp_name'];

			if(strlen($name1)){
				list($txt, $ext) = explode(".", $name1);				
						if($ext=="pdf"){
							$new_file_name1 = $stuID."-fileResume".".".$ext;
							move_uploaded_file($tmp1,$path.$new_file_name1);
							
						}else{
							echo "<script>alert('กรุณาเลือกไฟล์ Resume เป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			if(strlen($name2)){
				list($txt, $ext) = explode(".", $name2);				
						if($ext=="pdf"){
							$new_file_name2 = $stuID."-fileInternships".".".$ext;
							move_uploaded_file($tmp2,$path.$new_file_name2);
							
						}else{
							echo "<script>alert('กรุณาเลือกฟล์รายงานเป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

		$sql= "INSERT INTO internships (stuID, techID, term, years, field, officeID, staffNme, department,
		 								emailStaff, jobDescription, barriers, suggestion, counsel,
										startDate, endDate, fileResume, fileInternships)  
			     VALUES 	     ('$stuID', '$techID', '$term', '$years', '$field', '$officeID', '$staffNme', '$department',
					 			  '$emailStaff', '$jobDescription', '$barriers', '$suggestion', '$counsel',
								  '$startDate', '$endDate', '".$new_file_name1."', '".$new_file_name2."')";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('ลงทะเบียนเสร็จเรียบร้อย'); window.location.href='showInternships.php';</script>";
			}else{
			echo "<script> alert('ลงทะเบียนผิดพลาด!!!'); window.history.back();</script>";
			}
		
	}//end insertInternships ฝึกงาน
	
	else if(isset($_POST['insertCooperativePreparation'])){ //in case of update เตรียมสหกิจ
		$num			=$_POST['num'];
		$stuID			=$_POST['stuID'];
		$activity		=$_POST['activity'];
		$actiDate		=$_POST['actiDate'];
		$actiHours		=$_POST['actiHours'];
		$organizer		=$_POST['organizer'];
			
		$sql= "INSERT INTO cooperativepreparation (num, stuID, activity, actiDate, actiHours, organizer)
					 VALUES 	 ('$num', '$stuID', '$activity', '$actiDate', '$actiHours', '$organizer')";
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('บันทึกกิจกรรมเสร็จเรียบร้อย'); window.location.href='insertCooperativePreparation.php';</script>";
			}else{
			echo "<script> alert('การบันทึกผิดพลาด!!!'); window.history.back();'</script>";
			}
		
	}//end insertCooperativePreparation เตรียมสหกิจ

	else if(isset($_POST['insertCooperativeTraining'])){ //in case of update ฝึกสหกิจ
		$stuID		=$_POST['stuID'];
		$techID		=$_POST['techID'];
		$tech2ID	=$_POST['tech2ID'];
		$term		=$_POST['term'];
        $years		=$_POST['years'];
		$field		=$_POST['field'];
		$officeID			=$_POST['officeID'];
		$staffNme			=$_POST['staffNme'];
		$department			=$_POST['department'];
		$emailStaff			=$_POST['emailStaff'];
		$projectScope		=$_POST['projectScope'];
		$barriers			=$_POST['barriers'];
		$suggestion			=$_POST['suggestion'];
		$counsel			=$_POST['counsel'];
		$startDate 	 	    =$_POST['startDate'];
		$endDate     	    =$_POST['endDate'];

		$path = "fileCooperative/";
		$name1 = $_FILES['fileResume']['name'];		
		$tmp1 = $_FILES['fileResume']['tmp_name'];
		$name2 = $_FILES['fileCooperative']['name'];
		$tmp2 = $_FILES['fileCooperative']['tmp_name'];

			if(strlen($name1)){
				list($txt, $ext) = explode(".", $name1);				
						if($ext=="pdf"){
							$new_file_name1 = $stuID."-fileResume".".".$ext;
							move_uploaded_file($tmp1,$path.$new_file_name1);
							
						}else{
							echo "<script>alert('กรุณาเลือกไฟล์ Resume เป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			if(strlen($name2)){
				list($txt, $ext) = explode(".", $name2);				
						if($ext=="pdf"){
							$new_file_name2 = $stuID."-fileInternships".".".$ext;
							move_uploaded_file($tmp2,$path.$new_file_name2);
							
						}else{
							echo "<script>alert('กรุณาเลือกฟล์รายงานเป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}
		
		$sql= "INSERT INTO cooperativetraining (stuID, techID, tech2ID, term, years, field, officeID,
									staffNme, department, emailStaff, projectScope, barriers,
									suggestion, counsel, startDate, endDate, fileResume, fileCooperative)  
			     VALUES 	     ('$stuID', '$techID', '$tech2ID', '$term', '$years', '$field', '$officeID',
				 				  '$staffNme', '$department', '$emailStaff', '$projectScope', '$barriers', 
								  '$suggestion', '$counsel', '$startDate', '$endDate', '".$new_file_name1."', '".$new_file_name2."')";

			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('ลงทะเบียนเสร็จเรียบร้อย'); window.location.href='showCooperativeTraining.php';</script>";
			}else{
			echo "<script> alert('ลงทะเบียนผิดพลาด!!!'); window.history.back();</script>";
			}
		
	}//end insertCooperativeTraining ฝึกสหกิจ

	else if(isset($_POST['insertOffice'])){ //in case of update เพิ่มสถานประกอบการ
		$officeNme 			=$_POST['officeNme'];
		$officeAddress		=$_POST['officeAddress'];
        $province			=$_POST['province'];
		$tell				=$_POST['tell'];
				
		$sql= "INSERT INTO office (officeNme, officeAddress, province, tell)
					 VALUES 	 ('$officeNme', '$officeAddress', '$province', '$tell')";
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('เพิ่มสถานประกอบการเสร็จเรียบร้อย'); window.location.href='index.php';</script>";
			}else{
			echo "<script> alert('การเพิ่มผิดพลาด!!!'); window.history.back();</script>";
			}
		
	}//end insertCooperativePreparation เพิ่มสถานประกอบการ

	else if(isset($_POST['checkInternships'])){ //อัพเดทเช็ค ฝึกงาน

		$stuID	= $_POST['stuID'];
		$check	= $_POST['check'];
		
			$sql = "UPDATE internships SET checkInternships = '$check' 
					WHERE stuID ='$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ 
				echo "<script>alert('ยืนยัน ข้อมูลถูกต้อง'); window.location.href='checkInternships.php';</script>";
			}else{
			echo "<script> alert('การยืนยันผิดพลาด!!!'); window.history.back();'</script>";
			}
	} //End สิ้นสุดอัพเดทเช็ค ฝึกงาน

	else if(isset($_POST['checkCooperativetraining'])){ //อัพเดทเช็ค ฝึกสหกิจ

		$stuID = $_POST['stuID'];
		$check = $_POST['check'];
		
			$sql = "UPDATE cooperativetraining SET checkCooperativetraining ='$check' 
					WHERE stuID ='$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ 
				echo "<script>alert('ยืนยัน ข้อมูลถูกต้อง'); window.location.href='checkCooperativeTraining.php';</script>";
			}else{
			echo "<script> alert('การยืนยันผิดพลาด!!!'); window.history.back();</script>";
			}
	} //End สิ้นสุดอัพเดทเช็ค ฝึกสหกิจ

	else if(isset($_POST['updateInternships'])){ //updateInternships อัพเดทฝึกงาน

		$stuID		=$_POST['stuID'];
		$techID		=$_POST['techID'];
		$term		=$_POST['term'];
        $years		=$_POST['years'];
		$field		=$_POST['field'];
		$officeID			=$_POST['officeID'];
		$staffNme			=$_POST['staffNme'];
		$department			=$_POST['department'];
		$emailStaff			=$_POST['emailStaff'];
		$jobDescription		=$_POST['jobDescription'];
		$barriers			=$_POST['barriers'];
		$suggestion			=$_POST['suggestion'];
		$counsel			=$_POST['counsel'];
		$startDate 	 	    =$_POST['startDate'];
		$endDate     	    =$_POST['endDate'];

		$path = "fileInters/";
		$name1 = $_FILES['fileResume']['name'];		
		$tmp1 = $_FILES['fileResume']['tmp_name'];
		$name2 = $_FILES['fileInternships']['name'];
		$tmp2 = $_FILES['fileInternships']['tmp_name'];

		if(basename($name1)!="" && basename($name2)!=""){

			if(strlen($name1)){
				list($txt, $ext) = explode(".", $name1);				
						if($ext=="pdf"){
							$new_file_name1 = $stuID."-fileResume".".".$ext;
							move_uploaded_file($tmp1,$path.$new_file_name1);
							
						}else{
							echo "<script>alert('กรุณาเลือกไฟล์ Resume เป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			if(strlen($name2)){
				list($txt, $ext) = explode(".", $name2);				
						if($ext=="pdf"){
							$new_file_name2 = $stuID."-fileInternships".".".$ext;
							move_uploaded_file($tmp2,$path.$new_file_name2);
							
						}else{
							echo "<script>alert('กรุณาเลือกฟล์รายงานเป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			$sql= "UPDATE internships SET 
				   techID = '$techID', 
				   term = '$term', 
				   years = '$years', 
				   field = '$field', 
				   officeID = '$officeID', 
				   staffNme = '$staffNme', 
				   department = '$department',
		 		   emailStaff = '$emailStaff', 
				   jobDescription = '$jobDescription',
				   barriers = '$barriers', 
				   suggestion = '$suggestion', 
				   counsel = '$counsel',
				   startDate = '$startDate',
				   endDate = '$endDate', 
				   fileResume = '".$new_file_name1."', 
				   fileInternships ='".$new_file_name2."'					
				   WHERE stuID='$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('บันทึกเสร็จเรียบร้อย'); window.location.href='showInternships.php';</script>";
			}else{
			echo "<script> alert('บันทึกผิดพลาด!!!'); window.history.back();</script>";
			}

		}else if(basename($name1)!=""){

			if(strlen($name1)){
				list($txt, $ext) = explode(".", $name1);				
						if($ext=="pdf"){
							$new_file_name1 = $stuID."-fileResume".".".$ext;
							move_uploaded_file($tmp1,$path.$new_file_name1);
							
						}else{
							echo "<script>alert('กรุณาเลือกไฟล์ Resume เป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			$sql= "UPDATE internships SET 
				   techID = '$techID', 
				   term = '$term', 
				   years = '$years', 
				   field = '$field', 
				   officeID = '$officeID', 
				   staffNme = '$staffNme', 
				   department = '$department',
		 		   emailStaff = '$emailStaff', 
				   jobDescription = '$jobDescription',
				   barriers = '$barriers', 
				   suggestion = '$suggestion', 
				   counsel = '$counsel',
				   startDate = '$startDate',
				   endDate = '$endDate', 
				   fileResume = '".$new_file_name1."'					
				   WHERE stuID='$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('บันทึกเสร็จเรียบร้อย'); window.location.href='showInternships.php';</script>";
			}else{
			echo "<script> alert('บันทึกผิดพลาด!!!'); window.history.back();</script>";
			}

		}else if(basename($name2)!=""){

			if(strlen($name2)){
				list($txt, $ext) = explode(".", $name2);				
						if($ext=="pdf"){
							$new_file_name2 = $stuID."-fileInternships".".".$ext;
							move_uploaded_file($tmp2,$path.$new_file_name2);
							
						}else{
							echo "<script>alert('กรุณาเลือกฟล์รายงานเป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			$sql= "UPDATE internships SET 
				   techID = '$techID', 
				   term = '$term', 
				   years = '$years', 
				   field = '$field', 
				   officeID = '$officeID', 
				   staffNme = '$staffNme', 
				   department = '$department',
		 		   emailStaff = '$emailStaff', 
				   jobDescription = '$jobDescription',
				   barriers = '$barriers', 
				   suggestion = '$suggestion', 
				   counsel = '$counsel',
				   startDate = '$startDate',
				   endDate = '$endDate', 
				   fileInternships ='".$new_file_name2."'					
				   WHERE stuID='$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('บันทึกเสร็จเรียบร้อย'); window.location.href='showInternships.php';</script>";
			}else{
			echo "<script> alert('บันทึกผิดพลาด!!!'); window.history.back();</script>";
			}

		}else{
			$sql= "UPDATE internships SET 
			techID = '$techID', 
			term = '$term', 
			years = '$years', 
			field = '$field', 
			officeID = '$officeID', 
			staffNme = '$staffNme', 
			department = '$department',
			 emailStaff = '$emailStaff', 
			jobDescription = '$jobDescription',
			barriers = '$barriers', 
			suggestion = '$suggestion', 
			counsel = '$counsel',
			startDate = '$startDate',
			endDate = '$endDate'					
			WHERE stuID='$stuID'";

	 			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
	 
	 			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
		 			echo "<script>alert('บันทึกเสร็จเรียบร้อย'); window.location.href='showInternships.php';</script>";
	 			}else{
	 			echo "<script> alert('บันทึกผิดพลาด!!!'); window.history.back();</script>";
	 			}

		}

	}//End updateInternships

	else if(isset($_POST['updateCooperativeTraining'])){ //updateCooperativeTraining อัพเดทฝึกสหกิจศึกษา

		$stuID		=$_POST['stuID'];
		$techID		=$_POST['techID'];
		$tech2ID	=$_POST['tech2ID'];
		$term		=$_POST['term'];
        $years		=$_POST['years'];
		$field		=$_POST['field'];
		$officeID			=$_POST['officeID'];
		$staffNme			=$_POST['staffNme'];
		$department			=$_POST['department'];
		$emailStaff			=$_POST['emailStaff'];
		$projectScope		=$_POST['projectScope'];
		$barriers			=$_POST['barriers'];
		$suggestion			=$_POST['suggestion'];
		$counsel			=$_POST['counsel'];
		$startDate 	 	    =$_POST['startDate'];
		$endDate     	    =$_POST['endDate'];

		$path = "fileCooperative/";
		$name1 = $_FILES['fileResume']['name'];		
		$tmp1 = $_FILES['fileResume']['tmp_name'];
		$name2 = $_FILES['fileCooperative']['name'];
		$tmp2 = $_FILES['fileCooperative']['tmp_name'];

		if(basename($name1)!="" && basename($name2)!=""){

			if(strlen($name1)){
				list($txt, $ext) = explode(".", $name1);				
						if($ext=="pdf"){
							$new_file_name1 = $stuID."-fileResume".".".$ext;
							move_uploaded_file($tmp1,$path.$new_file_name1);
							
						}else{
							echo "<script>alert('กรุณาเลือกไฟล์ Resume เป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			if(strlen($name2)){
				list($txt, $ext) = explode(".", $name2);				
						if($ext=="pdf"){
							$new_file_name2 = $stuID."-fileInternships".".".$ext;
							move_uploaded_file($tmp2,$path.$new_file_name2);
							
						}else{
							echo "<script>alert('กรุณาเลือกฟล์รายงานเป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			$sql= "UPDATE cooperativetraining SET 
				   techID = '$techID',
				   tech2ID ='$tech2ID',
				   term = '$term', 
				   years = '$years', 
				   field = '$field', 
				   officeID = '$officeID', 
				   staffNme = '$staffNme', 
				   department = '$department',
		 		   emailStaff = '$emailStaff', 
				   projectScope = '$projectScope',
				   barriers = '$barriers', 
				   suggestion = '$suggestion', 
				   counsel = '$counsel',
				   startDate = '$startDate',
				   endDate = '$endDate', 
				   fileResume = '".$new_file_name1."', 
				   fileCooperative ='".$new_file_name2."'					
				   WHERE stuID='$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('บันทึกเสร็จเรียบร้อย'); window.location.href='showInternships.php';</script>";
			}else{
			echo "<script> alert('บันทึกผิดพลาด!!!'); window.history.back();</script>";
			}

		}else if(basename($name1)!=""){

			if(strlen($name1)){
				list($txt, $ext) = explode(".", $name1);				
						if($ext=="pdf"){
							$new_file_name1 = $stuID."-fileResume".".".$ext;
							move_uploaded_file($tmp1,$path.$new_file_name1);
							
						}else{
							echo "<script>alert('กรุณาเลือกไฟล์ Resume เป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			$sql= "UPDATE cooperativetraining SET 
				   techID = '$techID',
				   tech2ID ='$tech2ID',
				   term = '$term', 
				   years = '$years', 
				   field = '$field', 
				   officeID = '$officeID', 
				   staffNme = '$staffNme', 
				   department = '$department',
		 		   emailStaff = '$emailStaff', 
				   projectScope = '$projectScope',
				   barriers = '$barriers', 
				   suggestion = '$suggestion', 
				   counsel = '$counsel',
				   startDate = '$startDate',
				   endDate = '$endDate', 
				   fileResume = '".$new_file_name1."'					
				   WHERE stuID='$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('บันทึกเสร็จเรียบร้อย'); window.location.href='showCooperativeTraining.php';</script>";
			}else{
			echo "<script> alert('บันทึกผิดพลาด!!!'); window.history.back();</script>";
			}

		}else if(basename($name2)!=""){

			if(strlen($name2)){
				list($txt, $ext) = explode(".", $name2);				
						if($ext=="pdf"){
							$new_file_name2 = $stuID."-fileInternships".".".$ext;
							move_uploaded_file($tmp2,$path.$new_file_name2);
							
						}else{
							echo "<script>alert('กรุณาเลือกฟล์รายงานเป็น.PDF เท่านั้น!'); window.history.back(); </script>";
							return;
						}
			}

			$sql= "UPDATE cooperativetraining SET 
				   techID = '$techID',
				   tech2ID ='$tech2ID',
				   term = '$term', 
				   years = '$years', 
				   field = '$field', 
				   officeID = '$officeID', 
				   staffNme = '$staffNme', 
				   department = '$department',
		 		   emailStaff = '$emailStaff', 
				   projectScope = '$projectScope',
				   barriers = '$barriers', 
				   suggestion = '$suggestion', 
				   counsel = '$counsel',
				   startDate = '$startDate',
				   endDate = '$endDate',
				   fileCooperative ='".$new_file_name2."'					
				   WHERE stuID='$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
				echo "<script>alert('บันทึกเสร็จเรียบร้อย'); window.location.href='showCooperativeTraining.php';</script>";
			}else{
			echo "<script> alert('บันทึกผิดพลาด!!!'); window.history.back();</script>";
			}

		}else{
			$sql= "UPDATE cooperativetraining SET 
				   techID = '$techID',
				   tech2ID ='$tech2ID',
				   term = '$term', 
				   years = '$years', 
				   field = '$field', 
				   officeID = '$officeID', 
				   staffNme = '$staffNme', 
				   department = '$department',
		 		   emailStaff = '$emailStaff', 
				   projectScope = '$projectScope',
				   barriers = '$barriers', 
				   suggestion = '$suggestion', 
				   counsel = '$counsel',
				   startDate = '$startDate',
				   endDate = '$endDate'					
				   WHERE stuID='$stuID'";

	 			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
	 
	 			if($rs){ //if(mysqli_query($conn,$sql)) //meaning no error  
		 			echo "<script>alert('บันทึกเสร็จเรียบร้อย'); window.location.href='showCooperativeTraining.php';</script>";
	 			}else{
	 			echo "<script> alert('บันทึกผิดพลาด!!!'); window.history.back();</script>";
	 			}

		}

	}//End updateCooperativeTraining

	else if(isset($_POST['editUser'])){ //editUser แก้ไขชื่อ-สกุล
		session_start();
		$nme	= $_POST['nme'];
		$surnme	= $_POST['surnme'];
		$conpwd	= $_POST['conpwd'];

		$enconpwd = hash('sha256', $conpwd); //แปลงรหัส 
		
		$id = $_SESSION['valid_id'];
		$sql1 = "SELECT * FROM user WHERE username = '$id' ";
		$result1 = $conn->query($sql1);
		$row1 = $result1->fetch_assoc(); 
		
		if($row1['pwd']!=$enconpwd){
			echo "<script>
				  alert('รหัสผ่านยืนยันไม่ถูกต้อง!');
				  window.history.back();
				  </script>";
				  return;	
		}
		
			$sql = "UPDATE user SET 
					nme = '$nme',
					surnme = '$surnme' 
					WHERE username = '$id'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ 
				echo "<script>alert('แก้ไข้ข้อมูลสำเร็จ'); window.location.href='index.php';</script>";
			}else{
			echo "<script> alert('แก้ไข้ข้อมูลผิดพลาด!!!'); window.history.back();'</script>";
			}
	} //End editUser

	else if(isset($_POST['editPassword'])){ //editPassword เปลี่ยนรหัสผ่าน
		session_start();
		$pwd	= $_POST['pwd'];
		$newpwd	= $_POST['newpwd'];
		$newconpwd	= $_POST['newconpwd'];
		
		$enpwd = hash('sha256', $pwd); //แปลงรหัส  
		$ennewpwd = hash('sha256', $newpwd); //แปลงรหัส  
		
		$id = $_SESSION['valid_id'];
		$sql1 = "SELECT * FROM user WHERE username = '$id' ";
		$result1 = $conn->query($sql1);
		$row1 = $result1->fetch_assoc(); 
		
		if($row1['pwd']!=$enpwd){
			echo "<script>
				  alert('รหัสผ่านเดิมไม่ถูกต้อง!');
				  window.history.back();
				  </script>";
				  return;	
		}

		if($newpwd!=$newconpwd){
			echo "<script>
				  alert('รหัสผ่านใหม่ไม่ตรงกัน!');
				  window.history.back();
				  </script>";
				  return;	
		}
		
			$sql = "UPDATE user SET pwd = '$ennewpwd' 
					WHERE username = '$id'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ 
				echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ'); window.location.href='index.php';</script>";
			}else{
			echo "<script> alert('เปลี่ยนรหัสผิดพลาด!!!'); window.history.back();'</script>";
			}
	} //End editPassword

	else if(isset($_POST['updateStudent'])){ //updateStudent แก้ไขข้อมูลนักศึกษา		
		$stuID	= $_POST['stuID'];
		$stuNme	= $_POST['stuNme'];
		$stuSurnme	= $_POST['stuSurnme'];
		$techID	= $_POST['techID'];
		
			$sql = "UPDATE student SET 
					stuNme = '$stuNme',
					stuSurnme = '$stuSurnme',
					techID = '$techID' 
					WHERE stuID = '$stuID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ 
				echo "<script>alert('แก้ไข้ข้อมูลสำเร็จ'); window.location.href='showStudent.php';</script>";
			}else{
			echo "<script> alert('แก้ไข้ข้อมูลผิดพลาด!!!'); window.history.back();'</script>";
			}
	} //End updateStudent

	else if(isset($_POST['updateAdvisor'])){ //updateAdvisor แก้ไขข้อมูลอาจารย์		
		$techID	= $_POST['techID'];
		$prefix	= $_POST['prefix'];
		$techNme	= $_POST['techNme'];
		$techSurnme	= $_POST['techSurnme'];
		
			$sql = "UPDATE advisor SET 
					prefix = '$prefix',
					techNme = '$techNme',
					techSurnme = '$techSurnme' 
					WHERE techID = '$techID'";
	
			$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
			
			if($rs){ 
				echo "<script>alert('แก้ไข้ข้อมูลสำเร็จ'); window.location.href='showAdvisor.php';</script>";
			}else{
			echo "<script> alert('แก้ไข้ข้อมูลผิดพลาด!!!'); window.history.back();'</script>";
			}
	} //End updateAdvisor


	else if(isset($_POST['delStudent'])){ //ลบข้อมูล Student

		$stuID = $_POST['stuID']; 

		$sql = "DELETE FROM Student
				WHERE stuID = '$stuID'";	
		if($conn->query($sql)==TRUE){
			echo "<script>alert('ลบข้อมูลสำเร็จ'); window.location.href='showStudent.php';</script>";
          } else{
            echo "<script> alert('ลบข้อมูลผิดพลาด!!!'); window.history.back();'</script>";
         }	
	}// End ลบข้อมูล Student
	
	else if(isset($_POST['delAdvisor'])){ //ลบข้อมูล Advisor

		$techID = $_POST['techID']; 

		$sql = "DELETE FROM advisor
				WHERE techID = '$techID'";	
		if($conn->query($sql)==TRUE){
			echo "<script>alert('ลบข้อมูลสำเร็จ'); window.location.href='showAdvisor.php';</script>";
          } else{
            echo "<script> alert('ลบข้อมูลผิดพลาด!!!'); window.history.back();'</script>";
         }	
    }// End ลบข้อมูล Advisor	
?>
