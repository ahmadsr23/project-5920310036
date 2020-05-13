<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ระบบสารสนเทศ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/icon.jpg">

	<style>
		td {
  			height: 50px;
  			vertical-align: top;
			}	
	</style>

	<style>
	.card {
  		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  		transition: 0.3s;
  		width: 100%;
  		border-radius: 5px;
		}

		.card:hover {
  		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		}


		.container {
  		padding: 2px 6px;
		}
	</style>

</head>

<body>
<?php
	include "menu.php";
?>
<center>

	<div class="container">
	<div class="card">
<div class="row">
  <div class="col-sm-12">
  	

	<br>
  	<h2>การฝึกงานและการฝึกสหกิจศึกษา</h2>
	  <br><img src="img/logo.png" style="max-width:100%; height:auto;"> <br><br><br>
  		<table>			
			<tr>
				<td>
				<p>
				&nbsp; &nbsp; &nbsp; &nbsp; ระเบียบมหาวิทยาลัยสงขลานครินทร์ ว่าด้วยการศึกษาชั้นปริญญาตรี พ.ศ. 2558 ในข้อ 9 ระบบการศึกษามีการกำหนดปริมาณการศึกษาของการฝึกงานและฝึกสหกิจศึกษา 
				<br>ให้กำหนดเป็นหน่วยกิตตามลักษณะการจัดการเรียนการสอน ดังนี้ 
				</p>
				</td>
			</tr>
		</table>	
  					<table>			
						<tr>
						  <td align="right"><b>การฝึกงาน&nbsp;:&nbsp;</td>
						  <td>การฝึกงาน การฝึกภาคสนาม หรือการฝึกอื่น ๆ ใช้เวลา 3–6 ชั่วโมง ต่อสัปดาห์ ตลอดหนึ่งภาคการศึกษาปกติ <br> 
						  หรือจำนวนชั่วโมงรวมระหว่าง 45–90 ชั่วโมงหรือเทียบเท่า ให้นับเป็น 1หน่วยกิต 
						  <br>&nbsp;&nbsp; <a href="showInternships.php" target="_blank">ข้อมูลการฝึกงาน</a>
						  <br><br></td></tr>

						<tr>  
						  <td align="right"><b>สหกิจศึกษา&nbsp;:&nbsp;</td>
						  <td>สหกิจศึกษาเป็นการศึกษาที่ใช้เวลาปฏิบัติงาน ในสถานประกอบการอย่างต่อเนื่องไม่น้อยกว่า 16 สัปดาห์และไม่น้อยกว่า 6 หน่วยกิต <br> 
						  ทั้งนี้ต้องผ่านการเตรียมความพร้อม ก่อนออกปฏิบัติสหกิจศึกษาไม่น้อยกว่า 30 ชั่วโมง 
						  <br>&nbsp;&nbsp; <a href="showCooperativePreparation.php" target="_blank">ข้อมูลกิจกรรมเตรียมสหกิจ</a>
						  <br>&nbsp;&nbsp; <a href="showCooperativeTraining.php" target="_blank">ข้อมูลการฝึกสหกิจศึกษา</a>
						  <br></td></tr>

											
						<tr>  							  
						  <td align="right" width='25%'></td>
						  <td ><br><b>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาคณิตศาสตร์ประยุกต์</b><br> 
						   กำหนดให้นักศึกษาเลือกเรียนแผนสหกิจศึกษาหรือแผนทั่วไป (ฝึกงาน)<br> 
						   อย่างใดอย่างหนึ่ง เป็นส่วนหนึ่งของรายวิชาเอกเลือก จำนวน 28 หน่วยกิต มีรายละเอียดดังนี้
								<table class="table">
									
									<tbody>
									  	<tr>
										<td><b>แผนสหกิจศึกษา ต้องเรียนรายวิชาต่อไปนี้ 7 หน่วยกิต</b><br>
									  
										  &nbsp;&nbsp;&nbsp;&nbsp;746-401 เตรียมสหกิจศึกษา 	1(0-2-1)<br>
										  &nbsp;&nbsp;&nbsp;&nbsp;746-402 สหกิจศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6(0-36-0)<br>
										</td>
										</tr>

										<tr>
										<td><b>แผนทั่วไป (ฝึกงาน) ต้องเรียนรายวิชาต่อไปนี้ 4 หน่วยกิต</b><br>
									  
										  &nbsp;&nbsp;&nbsp;&nbsp;746-403 ฝึกงาน (Field work)  	จำนวน 300 ชั่วโมง<br>
										  &nbsp;&nbsp;&nbsp;&nbsp;746-451 โครงงานวิจัย  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 3(0-9-0)<br>
										  &nbsp;&nbsp;&nbsp;&nbsp;746-452 สัมมนา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 1(0-2-1)
										</td>
										</tr>

										<tr>
										<td></td>
										</tr>									 
				
									</tbody>
								</table>
						  </td>							 
						</tr>

						<tr>  
						  <td align="right"><b>รายงานสรุปผล&nbsp;:&nbsp;</td>
						  <td> &nbsp;&nbsp; <a href="reportInternships.php" target="_blank">รายงานการฝึกงาน</a>
						  <br> &nbsp;&nbsp; <a href="reportCooperativeTraining.php" target="_blank">รายงานการฝึกสหกิจศึกษา</a>
						  <br><br></td></tr>
							
					</table>
	</div>
  </div>
</div>
</div>	
</center>

<hr>
<footer style="background-color: #3f3f3f;">
<h4 style="text-align:right;">
</label><a href='loginStaff.php'><span class='glyphicon glyphicon-log-in'></span> Login Staff &nbsp; </a>
</h4>
<h4 style="text-align:center; color: #c0c0c0;"> &copy; 2020 Department of Mathematics and Computer Science <br>
Faculty of Science and Technology , Prince of Songkla University ,Pattani campus.</h4>

<br>

</footer>
</body>
</html>