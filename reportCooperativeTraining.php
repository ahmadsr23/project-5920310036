<!DOCTYPE html>
<html lang="en">
  <head>
  <title>รายงานการฝึกสหกิจศึกษา</title>
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

if(isset($_POST['searchbtn'])){ 
        $search = $_POST['search'];

// ======================ข้อมูลแยกตามสาขางาน=================================
        $sql = "SELECT *  FROM cooperativetraining WHERE years LIKE '%".$search."%'
                ORDER BY years ASC"  ;
        $result = $conn->query($sql);

        $sql2 = "SELECT *  FROM cooperativetraining WHERE years LIKE '%".$search."%'
                 GROUP BY years  ORDER BY years ASC"  ;
        $result2 = $conn->query($sql2);
        
        $i=0;
        while($row2 = $result2->fetch_assoc()){
            $nYears[$i]=$row2['years'];
        $i++;
        }
        $n = $result2->num_rows;

        for($i=0; $i<$n; $i++){
            $math[$i]=0;
            $stat[$i]=0;
            $com[$i]=0;
            $other[$i]=0;                        
        }
        
        $j=0;
        while($row = $result->fetch_assoc()){               
                                                              
            if($j<$n){

                if($nYears[$j]==$row['years']){

                    if($row['field']=='คณิตศาสตร์'){
                        $math[$j]++; 
                    }

                    else if($row['field']=='สถิติ'){
                        $stat[$j]++; 
                    }

                    else if($row['field']=='คอมพิวเตอร์'){
                        $com[$j]++; 
                    }
                    
                    else{
                        $other[$j]++;
                    }
                }
                else{
                   $j++;

                   if($row['field']=='คณิตศาสตร์'){
                    $math[$j]++; 
                    }

                    else if($row['field']=='สถิติ'){
                    $stat[$j]++; 
                    }

                    else if($row['field']=='คอมพิวเตอร์'){
                    $com[$j]++; 
                    }
                    
                    else{
                        $other[$j]++;
                    }
                }
            }  
        }
// ====================================================================================

// ======================ข้อมูลแยกตาม ภูมิภาค=================================
        $sql_2 = "SELECT *  FROM cooperativetraining 
                JOIN office ON cooperativetraining.officeID = office.officeID 
                WHERE years LIKE '%".$search."%'
                ORDER BY years ASC"  ;
        $result_2 = $conn->query($sql_2);

        $sql2_2 = "SELECT *  FROM cooperativetraining WHERE years LIKE '%".$search."%'
                 GROUP BY years  ORDER BY years ASC"  ;
        $result2_2 = $conn->query($sql2_2);
        
        $i=0;
        while($row2_2 = $result2_2->fetch_assoc()){
            $nYears_2[$i]=$row2_2['years'];
        $i++;
        }
        $n = $result2_2->num_rows;

        for($i=0; $i<$n; $i++){
            $N[$i]=0;
            $NE[$i]=0;
            $C[$i]=0;
            $E[$i]=0;
            $W[$i]=0;
            $S[$i]=0;                        
        }
        
        $j=0;
        while($row_2 = $result_2->fetch_assoc()){               
                                                              
            if($j<$n){

                if($nYears[$j]==$row_2['years']){

                    if($row_2['province']=='เชียงราย' || $row_2['province']=='เชียงใหม่' || $row_2['province']=='น่าน'
                    || $row_2['province']=='พะเยา' || $row_2['province']=='แพร่' || $row_2['province']=='แม่ฮ่องสอน'
                    || $row_2['province']=='ลำปาง' || $row_2['province']=='ลำพูน' || $row_2['province']=='อุตรดิตถ์'){

                        $N[$j]++; 
                    }

                    else if($row_2['province']=='กาฬสินธุ์' || $row_2['province']=='ขอนแก่น' || $row_2['province']=='ชัยภูมิ' || $row_2['province']=='นครพนม'
                    || $row_2['province']=='นครราชสีมา' || $row_2['province']=='บึงกาฬ' || $row_2['province']=='บุรีรัมย์' || $row_2['province']=='มหาสารคาม'
                    || $row_2['province']=='มุกดาหาร' || $row_2['province']=='ยโสธร' || $row_2['province']=='ร้อยเอ็ด' || $row_2['province']=='เลย'
                    || $row_2['province']=='สกลนคร' || $row_2['province']=='สุรินทร์' || $row_2['province']=='ศรีสะเกษ' || $row_2['province']=='หนองคาย'
                    || $row_2['province']=='หนองบัวลำภู' || $row_2['province']=='อุดรธานี' || $row_2['province']=='อุบลราชธานี' || $row_2['province']=='อำนาจเจริญ'){

                        $NE[$j]++; 
                    }

                    else if($row_2['province']=='กรุงเทพมหานคร' || $row_2['province']=='กำแพงเพชร' || $row_2['province']=='ชัยนาท' || $row_2['province']=='นครนายก'
                    || $row_2['province']=='นครปฐม' || $row_2['province']=='นครสวรรค์' || $row_2['province']=='นนทบุรี' || $row_2['province']=='ปทุมธานี'
                    || $row_2['province']=='พระนครศรีอยุธยา' || $row_2['province']=='พิจิตร' || $row_2['province']=='พิษณุโลก' || $row_2['province']=='เพชรบูรณ์'
                    || $row_2['province']=='ลพบุรี' || $row_2['province']=='สมุทรปราการ' || $row_2['province']=='สมุทรสงคราม' || $row_2['province']=='สมุทรสาคร'
                    || $row_2['province']=='สิงห์บุรี' || $row_2['province']=='สุโขทัย' || $row_2['province']=='สุพรรณบุรี' || $row_2['province']=='สระบุรี'
                    || $row_2['province']=='อ่างทอง' || $row_2['province']=='อุทัยธานี'){

                        $C[$j]++; 
                    }
                    
                    else if($row_2['province']=='จันทบุรี' || $row_2['province']=='ฉะเชิงเทรา' || $row_2['province']=='ชลบุรี' || $row_2['province']=='ตราด'
                    || $row_2['province']=='ปราจีนบุรี' || $row_2['province']=='ระยอง' || $row_2['province']=='สระแก้ว'){

                        $E[$j]++; 
                    }
                    else if($row_2['province']=='กาญจนบุรี' || $row_2['province']=='ตาก' || $row_2['province']=='ประจวบคีรีขันธ์'
                    || $row_2['province']=='เพชรบุรี' || $row_2['province']=='ราชบุรี'){

                        $W[$j]++; 
                    }
                    else if($row_2['province']=='กระบี่' || $row_2['province']=='ชุมพร' || $row_2['province']=='ตรัง' || $row_2['province']=='นครศรีธรรมราช'
                    || $row_2['province']=='นราธิวาส' || $row_2['province']=='ปัตตานี' || $row_2['province']=='พังงา' || $row_2['province']=='พัทลุง'
                    || $row_2['province']=='ภูเก็ต' || $row_2['province']=='ระนอง' || $row_2['province']=='สตูล' || $row_2['province']=='สงขลา'
                    || $row_2['province']=='สุราษฎร์ธานี' || $row_2['province']=='ยะลา'){

                        $S[$j]++; 
                    }
                }
                else{
                   $j++;

                   if($row_2['province']=='เชียงราย' || $row_2['province']=='เชียงใหม่' || $row_2['province']=='น่าน'
                   || $row_2['province']=='พะเยา' || $row_2['province']=='แพร่' || $row_2['province']=='แม่ฮ่องสอน'
                   || $row_2['province']=='ลำปาง' || $row_2['province']=='ลำพูน' || $row_2['province']=='อุตรดิตถ์'){

                       $N[$j]++; 
                   }

                   else if($row_2['province']=='กาฬสินธุ์' || $row_2['province']=='ขอนแก่น' || $row_2['province']=='ชัยภูมิ' || $row_2['province']=='นครพนม'
                   || $row_2['province']=='นครราชสีมา' || $row_2['province']=='บึงกาฬ' || $row_2['province']=='บุรีรัมย์' || $row_2['province']=='มหาสารคาม'
                   || $row_2['province']=='มุกดาหาร' || $row_2['province']=='ยโสธร' || $row_2['province']=='ร้อยเอ็ด' || $row_2['province']=='เลย'
                   || $row_2['province']=='สกลนคร' || $row_2['province']=='สุรินทร์' || $row_2['province']=='ศรีสะเกษ' || $row_2['province']=='หนองคาย'
                   || $row_2['province']=='หนองบัวลำภู' || $row_2['province']=='อุดรธานี' || $row_2['province']=='อุบลราชธานี' || $row_2['province']=='อำนาจเจริญ'){

                       $NE[$j]++; 
                   }

                   else if($row_2['province']=='กรุงเทพมหานคร' || $row_2['province']=='กำแพงเพชร' || $row_2['province']=='ชัยนาท' || $row_2['province']=='นครนายก'
                   || $row_2['province']=='นครปฐม' || $row_2['province']=='นครสวรรค์' || $row_2['province']=='นนทบุรี' || $row_2['province']=='ปทุมธานี'
                   || $row_2['province']=='พระนครศรีอยุธยา' || $row_2['province']=='พิจิตร' || $row_2['province']=='พิษณุโลก' || $row_2['province']=='เพชรบูรณ์'
                   || $row_2['province']=='ลพบุรี' || $row_2['province']=='สมุทรปราการ' || $row_2['province']=='สมุทรสงคราม' || $row_2['province']=='สมุทรสาคร'
                   || $row_2['province']=='สิงห์บุรี' || $row_2['province']=='สุโขทัย' || $row_2['province']=='สุพรรณบุรี' || $row_2['province']=='สระบุรี'
                   || $row_2['province']=='อ่างทอง' || $row_2['province']=='อุทัยธานี'){

                       $C[$j]++; 
                   }
                   
                   else if($row_2['province']=='จันทบุรี' || $row_2['province']=='ฉะเชิงเทรา' || $row_2['province']=='ชลบุรี' || $row_2['province']=='ตราด'
                   || $row_2['province']=='ปราจีนบุรี' || $row_2['province']=='ระยอง' || $row_2['province']=='สระแก้ว'){

                       $E[$j]++; 
                   }
                   else if($row_2['province']=='กาญจนบุรี' || $row_2['province']=='ตาก' || $row_2['province']=='ประจวบคีรีขันธ์'
                   || $row_2['province']=='เพชรบุรี' || $row_2['province']=='ราชบุรี'){

                       $W[$j]++; 
                   }
                   else if($row_2['province']=='กระบี่' || $row_2['province']=='ชุมพร' || $row_2['province']=='ตรัง' || $row_2['province']=='นครศรีธรรมราช'
                   || $row_2['province']=='นราธิวาส' || $row_2['province']=='ปัตตานี' || $row_2['province']=='พังงา' || $row_2['province']=='พัทลุง'
                   || $row_2['province']=='ภูเก็ต' || $row_2['province']=='ระนอง' || $row_2['province']=='สตูล' || $row_2['province']=='สงขลา'
                   || $row_2['province']=='สุราษฎร์ธานี' || $row_2['province']=='ยะลา'){

                       $S[$j]++; 
                   }
                }
            }  
        }
// ====================================================================================

        // *********ข้อมูลกราฟวงกลม แยกตามสาขางาน*************
        $sql5 = "SELECT field FROM cooperativetraining WHERE years LIKE '%".$search."%' ";
        $result5 = $conn->query($sql5);

        $pMath = 0;
        $pStat = 0;
        $pCom = 0;
        $pOther = 0;

        while($row5 = $result5->fetch_assoc()){
            if($row5['field']=='คณิตศาสตร์'){
                $pMath++; 
            }

            else if($row5['field']=='สถิติ'){
                $pStat++; 
            }

            else if($row5['field']=='คอมพิวเตอร์'){
                $pCom++; 
            }
            
            else{
                $pOther++;
            }
        }
        // *******************************************************

        // **********ข้อมูลกราฟวงกลม แยกตามถูมิภาคที่ฝึกสหกิจศึกษา**************      
                $sql5_2 = "SELECT province FROM cooperativetraining JOIN office ON cooperativetraining.officeID = office.officeID 
                           WHERE years LIKE '%".$search."%' ";
                $result5_2 = $conn->query($sql5_2);

                $pN = 0;
                $pNE = 0;
                $pC = 0;
                $pE = 0;
                $pW = 0;
                $pS = 0;

                while($row_2 = $result5_2->fetch_assoc()){
                    if($row_2['province']=='เชียงราย' || $row_2['province']=='เชียงใหม่' || $row_2['province']=='น่าน'
                    || $row_2['province']=='พะเยา' || $row_2['province']=='แพร่' || $row_2['province']=='แม่ฮ่องสอน'
                    || $row_2['province']=='ลำปาง' || $row_2['province']=='ลำพูน' || $row_2['province']=='อุตรดิตถ์'){
 
                        $pN++; 
                    }
 
                    else if($row_2['province']=='กาฬสินธุ์' || $row_2['province']=='ขอนแก่น' || $row_2['province']=='ชัยภูมิ' || $row_2['province']=='นครพนม'
                    || $row_2['province']=='นครราชสีมา' || $row_2['province']=='บึงกาฬ' || $row_2['province']=='บุรีรัมย์' || $row_2['province']=='มหาสารคาม'
                    || $row_2['province']=='มุกดาหาร' || $row_2['province']=='ยโสธร' || $row_2['province']=='ร้อยเอ็ด' || $row_2['province']=='เลย'
                    || $row_2['province']=='สกลนคร' || $row_2['province']=='สุรินทร์' || $row_2['province']=='ศรีสะเกษ' || $row_2['province']=='หนองคาย'
                    || $row_2['province']=='หนองบัวลำภู' || $row_2['province']=='อุดรธานี' || $row_2['province']=='อุบลราชธานี' || $row_2['province']=='อำนาจเจริญ'){
 
                        $pNE++; 
                    }
 
                    else if($row_2['province']=='กรุงเทพมหานคร' || $row_2['province']=='กำแพงเพชร' || $row_2['province']=='ชัยนาท' || $row_2['province']=='นครนายก'
                    || $row_2['province']=='นครปฐม' || $row_2['province']=='นครสวรรค์' || $row_2['province']=='นนทบุรี' || $row_2['province']=='ปทุมธานี'
                    || $row_2['province']=='พระนครศรีอยุธยา' || $row_2['province']=='พิจิตร' || $row_2['province']=='พิษณุโลก' || $row_2['province']=='เพชรบูรณ์'
                    || $row_2['province']=='ลพบุรี' || $row_2['province']=='สมุทรปราการ' || $row_2['province']=='สมุทรสงคราม' || $row_2['province']=='สมุทรสาคร'
                    || $row_2['province']=='สิงห์บุรี' || $row_2['province']=='สุโขทัย' || $row_2['province']=='สุพรรณบุรี' || $row_2['province']=='สระบุรี'
                    || $row_2['province']=='อ่างทอง' || $row_2['province']=='อุทัยธานี'){
 
                        $pC++; 
                    }
                    
                    else if($row_2['province']=='จันทบุรี' || $row_2['province']=='ฉะเชิงเทรา' || $row_2['province']=='ชลบุรี' || $row_2['province']=='ตราด'
                    || $row_2['province']=='ปราจีนบุรี' || $row_2['province']=='ระยอง' || $row_2['province']=='สระแก้ว'){
 
                        $pE++; 
                    }
                    else if($row_2['province']=='กาญจนบุรี' || $row_2['province']=='ตาก' || $row_2['province']=='ประจวบคีรีขันธ์'
                    || $row_2['province']=='เพชรบุรี' || $row_2['province']=='ราชบุรี'){
 
                        $pW++; 
                    }
                    else if($row_2['province']=='กระบี่' || $row_2['province']=='ชุมพร' || $row_2['province']=='ตรัง' || $row_2['province']=='นครศรีธรรมราช'
                    || $row_2['province']=='นราธิวาส' || $row_2['province']=='ปัตตานี' || $row_2['province']=='พังงา' || $row_2['province']=='พัทลุง'
                    || $row_2['province']=='ภูเก็ต' || $row_2['province']=='ระนอง' || $row_2['province']=='สตูล' || $row_2['province']=='สงขลา'
                    || $row_2['province']=='สุราษฎร์ธานี' || $row_2['province']=='ยะลา'){
 
                        $pS++; 
                    }
                }
        // *******************************************************

                  // *********************ข้อมูลอัตราการไปฝึกสหกิจศึกษา**************************************
                  $sql6 = "SELECT * FROM cooperativetraining WHERE years LIKE '%".$search."%'
                           ORDER BY years ASC";
                  $result6 = $conn->query($sql6);
          
                  $sql6_2 = "SELECT *  FROM cooperativetraining WHERE years LIKE '%".$search."%'
                            GROUP BY years  ORDER BY years ASC"  ;
                  $result6_2 = $conn->query($sql6_2);
          
                  $i=0;
                  while($row6_2 = $result6_2->fetch_assoc()){
                      $nYears6[$i]=$row6_2['years'];
                  $i++;
                  }
                  $n = $result6_2->num_rows;
                  for($i=0; $i<$n; $i++){
                      $total_stu[$i]=0; 
                      $training[$i]=0;
                      $non_training[$i]=0;                                  
                  }
          
                  $j=0;
                  while($row6 = $result6->fetch_assoc()){ 
                      if($j<$n){
           
                          if($nYears6[$j]==$row6['years']){
                              $training[$j]++; 
                          }                
                          else{
                              $j++;
                              $training[$j]++; 
                          }
                 
                      } 
                   }
          
                  $sql7 = "SELECT * FROM student ORDER BY generation ASC";
                  $result7 = $conn->query($sql7);
          
                  
                  while($row7 = $result7->fetch_assoc()){ 
                      for($j=0; $j<$n; $j++){
                                        
                          if($nYears6[$j] == $row7['generation']+3){
                              $total_stu[$j]++; 
                          }   
                      } 
                  } 
          
                   for($i=0; $i<$n; $i++){
                      $non_training[$i] = $total_stu[$i]-$training[$i];                     
                  }
          
                  // *******************************************************************************
        
        // รีเซตวนลูป 
        if($n>2){
            $p_size = 3; //กำหนดจำนวน record เริ่มต้นที่จะแสดงผลต่อ 1 เพจ  
        }else if ($n>1){
            $p_size = 2; 
        }else{
            $p_size = 1;
        }               
        $numfound = $n;              
        $start = 0;
        $page = 1;
        $total_page=(int)($numfound/$p_size); //กำหนดจำนวน_siza
        //ทำการหารหาจำนวนหน้าทั้งหมดของข้อมูล ในที่นี้ให้หารออกมาเป็นเลขจำนวนเต็ม 
        if(($numfound % $p_size)!=0){ //ถ้าข้อมูลมีเศษให้ทำการบวกเพิ่มจำนวนหน้าอีก 1 
           $total_page++;
        }
        
}

else{
    // ======================ข้อมูลแยกตามสาขางาน=================================
        $sql = "SELECT *  FROM cooperativetraining ORDER BY years ASC"  ;
        $result = $conn->query($sql);

        $sql2 = "SELECT *  FROM cooperativetraining 
                 GROUP BY years  ORDER BY years ASC"  ;
        $result2 = $conn->query($sql2);
        
            $i=0;
            while($row2 = $result2->fetch_assoc()){
                $nYears[$i]=$row2['years'];
            $i++;
            }
            $n = $result2->num_rows;
            for($i=0; $i<$n; $i++){
                $math[$i]=0;
                $stat[$i]=0;
                $com[$i]=0;
                $other[$i]=0;                        
            }
            
            $j=0;
            while($row = $result->fetch_assoc()){               
                                                                  
                if($j<$n){

                    if($nYears[$j]==$row['years']){

                        if($row['field']=='คณิตศาสตร์'){
                            $math[$j]++; 
                        }

                        else if($row['field']=='สถิติ'){
                            $stat[$j]++; 
                        }

                        else if($row['field']=='คอมพิวเตอร์'){
                            $com[$j]++; 
                        }
                        
                        else{
                            $other[$j]++;
                        }
                    }
                    else{
                       $j++;

                       if($row['field']=='คณิตศาสตร์'){
                        $math[$j]++; 
                        }

                        else if($row['field']=='สถิติ'){
                        $stat[$j]++; 
                        }

                        else if($row['field']=='คอมพิวเตอร์'){
                        $com[$j]++; 
                        }
                        
                        else{
                            $other[$j]++;
                        }
                    }
                }  
            }
        //    ==================================================================
        
        // ======================ข้อมูลแยกตาม ภูมิภาค=================================
        $sql_2 = "SELECT *  FROM cooperativetraining 
                JOIN office ON cooperativetraining.officeID = office.officeID 
                ORDER BY years ASC"  ;
        $result_2 = $conn->query($sql_2);

        $sql2_2 = "SELECT *  FROM cooperativetraining 
                GROUP BY years  ORDER BY years ASC"  ;
        $result2_2 = $conn->query($sql2_2);

        $i=0;
        while($row2_2 = $result2_2->fetch_assoc()){
            $nYears_2[$i]=$row2_2['years'];
        $i++;
        }
        $n = $result2_2->num_rows;

        for($i=0; $i<$n; $i++){
            $N[$i]=0;
            $NE[$i]=0;
            $C[$i]=0;
            $E[$i]=0;
            $W[$i]=0;
            $S[$i]=0;                        
        }

        $j=0;
        while($row_2 = $result_2->fetch_assoc()){               
                                                      
        if($j<$n){

        if($nYears[$j]==$row_2['years']){

            if($row_2['province']=='เชียงราย' || $row_2['province']=='เชียงใหม่' || $row_2['province']=='น่าน'
            || $row_2['province']=='พะเยา' || $row_2['province']=='แพร่' || $row_2['province']=='แม่ฮ่องสอน'
            || $row_2['province']=='ลำปาง' || $row_2['province']=='ลำพูน' || $row_2['province']=='อุตรดิตถ์'){

                $N[$j]++; 
            }

            else if($row_2['province']=='กาฬสินธุ์' || $row_2['province']=='ขอนแก่น' || $row_2['province']=='ชัยภูมิ' || $row_2['province']=='นครพนม'
            || $row_2['province']=='นครราชสีมา' || $row_2['province']=='บึงกาฬ' || $row_2['province']=='บุรีรัมย์' || $row_2['province']=='มหาสารคาม'
            || $row_2['province']=='มุกดาหาร' || $row_2['province']=='ยโสธร' || $row_2['province']=='ร้อยเอ็ด' || $row_2['province']=='เลย'
            || $row_2['province']=='สกลนคร' || $row_2['province']=='สุรินทร์' || $row_2['province']=='ศรีสะเกษ' || $row_2['province']=='หนองคาย'
            || $row_2['province']=='หนองบัวลำภู' || $row_2['province']=='อุดรธานี' || $row_2['province']=='อุบลราชธานี' || $row_2['province']=='อำนาจเจริญ'){

                $NE[$j]++; 
            }

            else if($row_2['province']=='กรุงเทพมหานคร' || $row_2['province']=='กำแพงเพชร' || $row_2['province']=='ชัยนาท' || $row_2['province']=='นครนายก'
            || $row_2['province']=='นครปฐม' || $row_2['province']=='นครสวรรค์' || $row_2['province']=='นนทบุรี' || $row_2['province']=='ปทุมธานี'
            || $row_2['province']=='พระนครศรีอยุธยา' || $row_2['province']=='พิจิตร' || $row_2['province']=='พิษณุโลก' || $row_2['province']=='เพชรบูรณ์'
            || $row_2['province']=='ลพบุรี' || $row_2['province']=='สมุทรปราการ' || $row_2['province']=='สมุทรสงคราม' || $row_2['province']=='สมุทรสาคร'
            || $row_2['province']=='สิงห์บุรี' || $row_2['province']=='สุโขทัย' || $row_2['province']=='สุพรรณบุรี' || $row_2['province']=='สระบุรี'
            || $row_2['province']=='อ่างทอง' || $row_2['province']=='อุทัยธานี'){

                $C[$j]++; 
            }
            
            else if($row_2['province']=='จันทบุรี' || $row_2['province']=='ฉะเชิงเทรา' || $row_2['province']=='ชลบุรี' || $row_2['province']=='ตราด'
            || $row_2['province']=='ปราจีนบุรี' || $row_2['province']=='ระยอง' || $row_2['province']=='สระแก้ว'){

                $E[$j]++; 
            }
            else if($row_2['province']=='กาญจนบุรี' || $row_2['province']=='ตาก' || $row_2['province']=='ประจวบคีรีขันธ์'
            || $row_2['province']=='เพชรบุรี' || $row_2['province']=='ราชบุรี'){

                $W[$j]++; 
            }
            else if($row_2['province']=='กระบี่' || $row_2['province']=='ชุมพร' || $row_2['province']=='ตรัง' || $row_2['province']=='นครศรีธรรมราช'
            || $row_2['province']=='นราธิวาส' || $row_2['province']=='ปัตตานี' || $row_2['province']=='พังงา' || $row_2['province']=='พัทลุง'
            || $row_2['province']=='ภูเก็ต' || $row_2['province']=='ระนอง' || $row_2['province']=='สตูล' || $row_2['province']=='สงขลา'
            || $row_2['province']=='สุราษฎร์ธานี' || $row_2['province']=='ยะลา'){

                $S[$j]++; 
            }
        }
        else{
           $j++;

           if($row_2['province']=='เชียงราย' || $row_2['province']=='เชียงใหม่' || $row_2['province']=='น่าน'
           || $row_2['province']=='พะเยา' || $row_2['province']=='แพร่' || $row_2['province']=='แม่ฮ่องสอน'
           || $row_2['province']=='ลำปาง' || $row_2['province']=='ลำพูน' || $row_2['province']=='อุตรดิตถ์'){

               $N[$j]++; 
           }

           else if($row_2['province']=='กาฬสินธุ์' || $row_2['province']=='ขอนแก่น' || $row_2['province']=='ชัยภูมิ' || $row_2['province']=='นครพนม'
           || $row_2['province']=='นครราชสีมา' || $row_2['province']=='บึงกาฬ' || $row_2['province']=='บุรีรัมย์' || $row_2['province']=='มหาสารคาม'
           || $row_2['province']=='มุกดาหาร' || $row_2['province']=='ยโสธร' || $row_2['province']=='ร้อยเอ็ด' || $row_2['province']=='เลย'
           || $row_2['province']=='สกลนคร' || $row_2['province']=='สุรินทร์' || $row_2['province']=='ศรีสะเกษ' || $row_2['province']=='หนองคาย'
           || $row_2['province']=='หนองบัวลำภู' || $row_2['province']=='อุดรธานี' || $row_2['province']=='อุบลราชธานี' || $row_2['province']=='อำนาจเจริญ'){

               $NE[$j]++; 
           }

           else if($row_2['province']=='กรุงเทพมหานคร' || $row_2['province']=='กำแพงเพชร' || $row_2['province']=='ชัยนาท' || $row_2['province']=='นครนายก'
           || $row_2['province']=='นครปฐม' || $row_2['province']=='นครสวรรค์' || $row_2['province']=='นนทบุรี' || $row_2['province']=='ปทุมธานี'
           || $row_2['province']=='พระนครศรีอยุธยา' || $row_2['province']=='พิจิตร' || $row_2['province']=='พิษณุโลก' || $row_2['province']=='เพชรบูรณ์'
           || $row_2['province']=='ลพบุรี' || $row_2['province']=='สมุทรปราการ' || $row_2['province']=='สมุทรสงคราม' || $row_2['province']=='สมุทรสาคร'
           || $row_2['province']=='สิงห์บุรี' || $row_2['province']=='สุโขทัย' || $row_2['province']=='สุพรรณบุรี' || $row_2['province']=='สระบุรี'
           || $row_2['province']=='อ่างทอง' || $row_2['province']=='อุทัยธานี'){

               $C[$j]++; 
           }
           
           else if($row_2['province']=='จันทบุรี' || $row_2['province']=='ฉะเชิงเทรา' || $row_2['province']=='ชลบุรี' || $row_2['province']=='ตราด'
           || $row_2['province']=='ปราจีนบุรี' || $row_2['province']=='ระยอง' || $row_2['province']=='สระแก้ว'){

               $E[$j]++; 
           }
           else if($row_2['province']=='กาญจนบุรี' || $row_2['province']=='ตาก' || $row_2['province']=='ประจวบคีรีขันธ์'
           || $row_2['province']=='เพชรบุรี' || $row_2['province']=='ราชบุรี'){

               $W[$j]++; 
           }
           else if($row_2['province']=='กระบี่' || $row_2['province']=='ชุมพร' || $row_2['province']=='ตรัง' || $row_2['province']=='นครศรีธรรมราช'
           || $row_2['province']=='นราธิวาส' || $row_2['province']=='ปัตตานี' || $row_2['province']=='พังงา' || $row_2['province']=='พัทลุง'
           || $row_2['province']=='ภูเก็ต' || $row_2['province']=='ระนอง' || $row_2['province']=='สตูล' || $row_2['province']=='สงขลา'
           || $row_2['province']=='สุราษฎร์ธานี' || $row_2['province']=='ยะลา'){

               $S[$j]++; 
           }
        }
    }  
}
// ====================================================================================

        // *********ข้อมูลกราฟวงกลม แยกตามสาขางาน*************
        $sql5 = "SELECT field FROM cooperativetraining ";
        $result5 = $conn->query($sql5);
        $pMath = 0;
        $pStat = 0;
        $pCom = 0;
        $pOther = 0;
        while($row5 = $result5->fetch_assoc()){
            if($row5['field']=='คณิตศาสตร์'){
                $pMath++; 
            }

            else if($row5['field']=='สถิติ'){
                $pStat++; 
            }

            else if($row5['field']=='คอมพิวเตอร์'){
                $pCom++; 
            }
            
            else{
                $pOther++;
            }
        }
        // *******************************************************

        // **********ข้อมูลกราฟวงกลม แยกตามถูมิภาคที่ฝึกสหกิจศึกษา**************      
                $sql5_2 = "SELECT province FROM cooperativetraining 
                           JOIN office ON cooperativetraining.officeID = office.officeID ";
                $result5_2 = $conn->query($sql5_2);

                $pN = 0;
                $pNE = 0;
                $pC = 0;
                $pE = 0;
                $pW = 0;
                $pS = 0;

                while($row_2 = $result5_2->fetch_assoc()){
                    if($row_2['province']=='เชียงราย' || $row_2['province']=='เชียงใหม่' || $row_2['province']=='น่าน'
                    || $row_2['province']=='พะเยา' || $row_2['province']=='แพร่' || $row_2['province']=='แม่ฮ่องสอน'
                    || $row_2['province']=='ลำปาง' || $row_2['province']=='ลำพูน' || $row_2['province']=='อุตรดิตถ์'){
 
                        $pN++; 
                    }
 
                    else if($row_2['province']=='กาฬสินธุ์' || $row_2['province']=='ขอนแก่น' || $row_2['province']=='ชัยภูมิ' || $row_2['province']=='นครพนม'
                    || $row_2['province']=='นครราชสีมา' || $row_2['province']=='บึงกาฬ' || $row_2['province']=='บุรีรัมย์' || $row_2['province']=='มหาสารคาม'
                    || $row_2['province']=='มุกดาหาร' || $row_2['province']=='ยโสธร' || $row_2['province']=='ร้อยเอ็ด' || $row_2['province']=='เลย'
                    || $row_2['province']=='สกลนคร' || $row_2['province']=='สุรินทร์' || $row_2['province']=='ศรีสะเกษ' || $row_2['province']=='หนองคาย'
                    || $row_2['province']=='หนองบัวลำภู' || $row_2['province']=='อุดรธานี' || $row_2['province']=='อุบลราชธานี' || $row_2['province']=='อำนาจเจริญ'){
 
                        $pNE++; 
                    }
 
                    else if($row_2['province']=='กรุงเทพมหานคร' || $row_2['province']=='กำแพงเพชร' || $row_2['province']=='ชัยนาท' || $row_2['province']=='นครนายก'
                    || $row_2['province']=='นครปฐม' || $row_2['province']=='นครสวรรค์' || $row_2['province']=='นนทบุรี' || $row_2['province']=='ปทุมธานี'
                    || $row_2['province']=='พระนครศรีอยุธยา' || $row_2['province']=='พิจิตร' || $row_2['province']=='พิษณุโลก' || $row_2['province']=='เพชรบูรณ์'
                    || $row_2['province']=='ลพบุรี' || $row_2['province']=='สมุทรปราการ' || $row_2['province']=='สมุทรสงคราม' || $row_2['province']=='สมุทรสาคร'
                    || $row_2['province']=='สิงห์บุรี' || $row_2['province']=='สุโขทัย' || $row_2['province']=='สุพรรณบุรี' || $row_2['province']=='สระบุรี'
                    || $row_2['province']=='อ่างทอง' || $row_2['province']=='อุทัยธานี'){
 
                        $pC++; 
                    }
                    
                    else if($row_2['province']=='จันทบุรี' || $row_2['province']=='ฉะเชิงเทรา' || $row_2['province']=='ชลบุรี' || $row_2['province']=='ตราด'
                    || $row_2['province']=='ปราจีนบุรี' || $row_2['province']=='ระยอง' || $row_2['province']=='สระแก้ว'){
 
                        $pE++; 
                    }
                    else if($row_2['province']=='กาญจนบุรี' || $row_2['province']=='ตาก' || $row_2['province']=='ประจวบคีรีขันธ์'
                    || $row_2['province']=='เพชรบุรี' || $row_2['province']=='ราชบุรี'){
 
                        $pW++; 
                    }
                    else if($row_2['province']=='กระบี่' || $row_2['province']=='ชุมพร' || $row_2['province']=='ตรัง' || $row_2['province']=='นครศรีธรรมราช'
                    || $row_2['province']=='นราธิวาส' || $row_2['province']=='ปัตตานี' || $row_2['province']=='พังงา' || $row_2['province']=='พัทลุง'
                    || $row_2['province']=='ภูเก็ต' || $row_2['province']=='ระนอง' || $row_2['province']=='สตูล' || $row_2['province']=='สงขลา'
                    || $row_2['province']=='สุราษฎร์ธานี' || $row_2['province']=='ยะลา'){
 
                        $pS++; 
                    }
                }
        // *******************************************************

                // *********************ข้อมูลอัตราการไปฝึกสหกิจศึกษา**************************************
        $sql6 = "SELECT * FROM cooperativetraining ORDER BY years ASC";
        $result6 = $conn->query($sql6);

        $sql6_2 = "SELECT *  FROM cooperativetraining 
        GROUP BY years  ORDER BY years ASC"  ;
        $result6_2 = $conn->query($sql6_2);

        $i=0;
        while($row6_2 = $result6_2->fetch_assoc()){
            $nYears6[$i]=$row6_2['years'];
        $i++;
        }
        $n = $result6_2->num_rows;
        for($i=0; $i<$n; $i++){
            $total_stu[$i]=0; 
            $training[$i]=0;
            $non_training[$i]=0;                                  
        }

        $j=0;
        while($row6 = $result6->fetch_assoc()){ 
            if($j<$n){
 
                if($nYears6[$j]==$row6['years']){
                    $training[$j]++; 
                }                
                else{
                    $j++;
                    $training[$j]++; 
                }
       
            } 
         }

        $sql7 = "SELECT * FROM student ORDER BY generation ASC";
        $result7 = $conn->query($sql7);

        
        while($row7 = $result7->fetch_assoc()){ 

            for($j=0; $j<$n; $j++){
                                        
                if($nYears6[$j] == $row7['generation']+3){
                    $total_stu[$j]++; 
                }   
            } 
         }

         for($i=0; $i<$n; $i++){
            $non_training[$i] = $total_stu[$i]-$training[$i];                     
        }

        // *******************************************************************************
        
        // ============================การแบ่งหน้า=================================
        if($n>2){
            $p_size = 3; //กำหนดจำนวน record เริ่มต้นที่จะแสดงผลต่อ 1 เพจ  
        }else if ($n>1){
            $p_size = 2; 
        }else{
            $p_size = 1;
        } 

        $numfound = $n; //return the number of records

        $total_page=(int)($numfound/$p_size); 
        //ทำการหารหาจำนวนหน้าทั้งหมดของข้อมูล ในที่นี้ให้หารออกมาเป็นเลขจำนวนเต็ม 
        if(($numfound % $p_size)!=0){ //ถ้าข้อมูลมีเศษให้ทำการบวกเพิ่มจำนวนหน้าอีก 1 
           $total_page++;
        }
        if($_POST['nextPage']){
            $p = $_POST['pageno'];
            if ( $p < $total_page){
                $page=$p + 1;
            }else{ 
                $page=$p; 
            }
            $start=$p_size*($page-1);
            if($page==$total_page){
                $p_size=$numfound;
            }else{
                $p_size=($start+$p_size);
            }            
        }else if($_POST['firstPage']){
            $page=1;
            $start=0;
            $p_size=($start+$p_size);
        }else if($_POST['lastPage']){
            $page=$total_page;
            $start=$p_size*($page-1);
            $p_size=$numfound;
        }else if($_POST['prePage']){
            $p= $_POST['pageno'];
            if($p >= 2){
                $page = $p - 1;
                $start = $p_size*($page-1);
                $p_size=($start+$p_size);
            }else{
            $page = $p;
            $start = 0;
            $p_size=($start+$p_size);                
            } 

        }else{
        /*
        ถ้่ายังไม่มีการส่งค่ามาเพื่อทำการเลือกดูหน้าข้อมูลใด ๆ ให้กำหนดเป็นหน้าแรกของข้อมูลเป็นค่า Default และให้ Record แรกเริ่มที่ Record ที่ 0 หรือ Record แรก
        */ 
           $page=1;
           $start=0;
        }          
        // =====================================================================================

}

?>  

  <body>
  <center>
    <h2>รายงานการฝึกสหกิจศึกษา</h2> <br>   

        <!-- =================== การค้นหา =================== -->
        <form action='reportCooperativeTraining.php' method='post'>
        <div class="row">
            <div class="col-sm-4"></div>

            <div class="col-sm-3">
            <?php
            $sql3 = "SELECT *  FROM cooperativetraining GROUP BY years  ORDER BY years ASC"  ;
            $result3 = $conn->query($sql3);
             echo "<div class='input-group'>";
                echo "<span class='input-group-addon'>ปีการศึกษา</span>";
                echo "<select class='form-control' name='search' >";
                echo "<option value=''>- แสดงทั้งหมด -</option>";
                while($row3 = $result3->fetch_assoc()){
                    echo "<option value='".$row3['years']."'";
                     if($_POST['search']==$row3['years']){
                        echo'selected';
                    } 
                    echo ">".$row3['years']."</option>";
                }
                echo"</select>";
            echo "</div>";

            ?>           
            </div>

            <div class='col-sm-1'>
            <input type='submit' name='searchbtn' class='btn btn-primary' value='ค้นหา'>
            </div>

            <div class="col-sm-4"></div>        
        </div><br><hr>     
        </form>
        <!-- =======================================================   -->

    <!-- *********ตารางที่ใช้ในการแสดงจำนวน นศ.แยกตามสาขางาน************ -->
    <h4>ตารางแสดงจำนวนของนักศึกษาฝึกสหกิจศึกษา แยกตามสาขางาน</h4><br>
    <table class="w3-table-all w3-card-4" style = "width: 70%">
            <thead>
                <tr>
                    <th>ปีการศึกษา</th>
                    <th>คณิตศาสตร์(คน)</th>
                    <th>คอมพิวเตอร์(คน)</th>
                    <th>สถิติ(คน)</th>
                    <th>อื่นๆ(คน)</th>                    
                    <th>รวม(คน)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 
                for($i=$start; $i<$p_size; $i++){
                       echo"<tr>";
                            echo "<td>".$nYears[$i]."</td>";
                            echo "<td>".$math[$i]."</td>";
                            echo "<td>".$com[$i]."</td>"; 
                            echo "<td>".$stat[$i]."</td>";
                            echo "<td>".$other[$i]."</td>";
                            $sum = $math[$i]+$com[$i]+$stat[$i]+$other[$i];
                            echo "<td><b>".$sum."</td>";
                        echo"</tr>";
                }
                // ****************หาผลรวม และแสดงผลรวม***************
                    for($i=0; $i<$n; $i++){ 
                            $sMath  += $math[$i];
                            $sCom   += $com[$i];
                            $sStat  += $stat[$i];
                            $sOther += $other[$i];
                    }
                    if($n>1){
                        echo"<tr>";
                            echo "<td><b>รวมทั้งหมด</td>";
                            echo "<td><b>".$sMath."</td>";
                            echo "<td><b>".$sCom."</td>"; 
                            echo "<td><b>".$sStat."</td>";
                            echo "<td><b>".$sOther."</td>";
                            $sSum = $sMath+$sCom+$sStat+$sOther;
                            echo "<td><b>".$sSum."</td>";
                        echo"</tr>"; 
                    }
                    // ************************************************

                ?>
            
            </tbody>        
        </table><br>  
    <!-- ************************************************************* -->
   
        <!-- ---------------ตารางส่วนที่ใช้สร้างกราฟ----------------     -->
        <div style="display:none">
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>ปีการศึกษา</th>
                    <th>คณิตศาสตร์</th>
                    <th>คอมพิวเตอร์</th>
                    <th>สถิติ</th>
                    <th>อื่นๆ</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                for($i=$start; $i<$p_size; $i++){
                    echo"<tr>";
                         echo "<td>".$nYears[$i]."</td>";
                         echo "<td>".$math[$i]."</td>";
                         echo "<td>".$com[$i]."</td>"; 
                         echo "<td>".$stat[$i]."</td>";
                         echo "<td>".$other[$i]."</td>";
                     echo"</tr>";
             }

                ?>
            
            </tbody>        
        </table>
    </div>
    <!-- --------------------------------------------------------- -->


    <!-- ====================การปุ่มแบ่งหลายหน้า================================= -->
<?php
if($n>3){
echo "<table>";
echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
echo"<form  action = 'reportcooperativetraining.php' method ='post'> ";
    echo "แสดงหน้าที่ : $page จากทั้งหมด ".$total_page." หน้า &nbsp";
    echo "<input type='hidden' name='pageno' value='$page'>";
echo "</td></tr>";

echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
	echo "<input class='btn btn-info btn-sm' name = 'firstPage' type='submit' value='<< หน้าเเรก' /> &nbsp";
	echo "<input class='btn btn-default btn-sm' name = 'prePage' type='submit' value='< ก่อนหน้า' /> &nbsp";
	echo "<input class='btn btn-default btn-sm' name = 'nextPage' type='submit' value='ถัดไป >' /> &nbsp";
	echo "<input class='btn btn-info btn-sm' name = 'lastPage' type='submit' value='สุดท้าย >>' /> &nbsp";
echo "</form>";    
echo "</td></tr>";
echo "</table><br>";
}
?>
 <!-- =============================================================================== -->

    <!-- ********แสดงกราฟ แยกตามสาขางาน************ -->
    <br>
    <div class="row">
            <div class="col-sm-7">
                <figure class="highcharts-figure">
                    <div id="barChat1"></div>
                </figure>
            </div>
            <div class="col-sm-5">
                <figure class="highcharts-figure">
                    <div id="pieChat1"></div>  
                </figure>
            </div>
    
    </div><br><hr><br>              
    <!--******************************************-->



<!-- *********ตารางที่ใช้ในการแสดงจำนวน นศ.แยกตามภูมิภาคที่ไปฝึกสหกิจศึกษา************ -->
    <h4>ตารางแสดงจำนวนของนักศึกษาฝึกสหกิจศึกษา แยกตามภูมิภาคสถานประกอบการ</h4><br>
    <table class="w3-table-all w3-card-4" style = "width: 70%">
            <thead>
                <tr>
                    <th>ปีการศึกษา</th>
                    <th>ภาคเหนือ(คน)</th>
                    <th>ภาคตะวันออกเฉียงเหนือ(คน)</th>
                    <th>ภาคกลาง(คน)</th>
                    <th>ภาคตะวันออก(คน)</th>                    
                    <th>ภาคตะวันตก(คน)</th>
                    <th>ภาคตะวันตก(คน)</th>
                    <th>รวม(คน)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                 
                for($i=$start; $i<$p_size; $i++){
                       echo"<tr>";
                            echo "<td>".$nYears_2[$i]."</td>";
                            echo "<td>".$N[$i]."</td>";
                            echo "<td>".$NE[$i]."</td>"; 
                            echo "<td>".$C[$i]."</td>";
                            echo "<td>".$E[$i]."</td>";
                            echo "<td>".$W[$i]."</td>";
                            echo "<td>".$S[$i]."</td>";
                            $sum_2 = $N[$i]+$NE[$i]+$C[$i]+$E[$i]+$W[$i]+$S[$i];
                            echo "<td><b>".$sum_2."</td>";
                        echo"</tr>";
                }
                // ****************หาผลรวม และแสดงผลรวม***************
                    for($i=0; $i<$n; $i++){  
                            $sN  += $N[$i];
                            $sNE   += $NE[$i];
                            $sC  += $C[$i];
                            $sE += $E[$i];
                            $sW  += $W[$i];
                            $sS   += $S[$i];
                    }
                    if($n>1){
                        echo"<tr>";
                            echo "<td><b>รวมทั้งหมด</td>";
                            echo "<td><b>".$sN."</td>";
                            echo "<td><b>".$sNE."</td>"; 
                            echo "<td><b>".$sC."</td>";
                            echo "<td><b>".$sE."</td>";
                            echo "<td><b>".$sW."</td>";
                            echo "<td><b>".$sS."</td>";
                            $sSum_2 = $sN+$sNE+$sC+$sE+$sW+$sS;
                            echo "<td><b>".$sSum_2."</td>";
                        echo"</tr>"; 
                    }
                    // ************************************************

                ?>
            
            </tbody>        
        </table><br>  
    <!-- ************************************************************* -->
   
        <!-- ---------------ตารางส่วนที่ใช้สร้างกราฟ----------------     -->
        <div style="display:none">
        <table class="table" id="datatable2">
            <thead>
                <tr>
                    <th>ปีการศึกษา</th>
                    <th>ภาคเหนือ</th>
                    <th>ภาคตะวันออกเฉียงเหนือ</th>
                    <th>ภาคกลาง</th>
                    <th>ภาคตะวันออก</th>                    
                    <th>ภาคตะวันตก</th>
                    <th>ภาคตะวันตก</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for($i=$start; $i<$p_size; $i++){
                    echo"<tr>";
                        echo "<td>".$nYears_2[$i]."</td>";
                        echo "<td>".$N[$i]."</td>";
                        echo "<td>".$NE[$i]."</td>"; 
                        echo "<td>".$C[$i]."</td>";
                        echo "<td>".$E[$i]."</td>";
                        echo "<td>".$W[$i]."</td>";
                        echo "<td>".$S[$i]."</td>";
                     echo"</tr>";
             }

                ?>
            
            </tbody>        
        </table>
    </div>
    <!-- --------------------------------------------------------- -->

    <!-- ====================การปุ่มแบ่งหลายหน้า================================= -->
    <?php
if($n>3){
echo "<table>";
echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
echo"<form  action = 'reportcooperativetraining.php' method ='post'> ";
    echo "แสดงหน้าที่ : $page จากทั้งหมด ".$total_page." หน้า &nbsp";
    echo "<input type='hidden' name='pageno' value='$page'>";
echo "</td></tr>";

echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
	echo "<input class='btn btn-info btn-sm' name = 'firstPage' type='submit' value='<< หน้าเเรก' /> &nbsp";
	echo "<input class='btn btn-default btn-sm' name = 'prePage' type='submit' value='< ก่อนหน้า' /> &nbsp";
	echo "<input class='btn btn-default btn-sm' name = 'nextPage' type='submit' value='ถัดไป >' /> &nbsp";
	echo "<input class='btn btn-info btn-sm' name = 'lastPage' type='submit' value='สุดท้าย >>' /> &nbsp";
echo "</form>";    
echo "</td></tr>";
echo "</table><br>";
}
?>
 <!-- =============================================================================== -->

    <!-- ********แสดงกราฟ แยกตามภูมิภาคที่ไปฝึกสหกิจศึกษา************ -->
    <br>
    <div class="row">
            <div class="col-sm-7">
                <figure class="highcharts-figure">
                    <div id="barChat2"></div>
                </figure>
            </div>
            <div class="col-sm-5">
                <figure class="highcharts-figure">
                    <div id="pieChat2"></div>  
                </figure>
            </div>
    
    </div><br><hr><br>             
    <!--******************************************-->

<!-- *********ตารางที่ใช้ในการแสดงจำนวน นศ.ไปฝึกสหกิจศึกษา และ ไม่ไปฝึกสหกิจศึกษา************ -->
<h4>ตารางแสดงจำนวนของนักศึกษาฝึกสหกิจศึกษาและไม่ฝึกสหกิจศึกษา</h4><br>
    <table class="w3-table-all w3-card-4" style = "width: 70%">
            <thead>
                <tr>
                    <th>ปีการศึกษา</th>
                    <th>นักศึกษาทั้งหมด(คน)</th>
                    <th>นักศึกษาฝึกสหกิจ(คน)</th>
                    <th>นักศึกษาไม่ฝึกสหกิจ(คน)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                 
                for($i=$start; $i<$p_size; $i++){
                       echo"<tr>";
                            echo "<td>".$nYears6[$i]."</td>";
                            echo "<td>".$total_stu[$i]."</td>";

                                $percTrain[$i] = ($training[$i]*100)/$total_stu[$i]; // หา % ฝึกสหกิจ
                            echo "<td>".$training[$i]." ( ".number_format($percTrain[$i], 2, '.', ' ')."% )</td>";

                            $percNontrain[$i] = ($non_training[$i]*100)/$total_stu[$i];  // หา % ไม่ฝึกสหกิจ
                            echo "<td>".$non_training[$i]." ( ".number_format($percNontrain[$i], 2, '.', ' ')."% )</td>";  
                        echo"</tr>";
                }
                // ****************หาผลรวม และแสดงผลรวม***************
                    for($i=0; $i<$n; $i++){  
                            $sTotal_stu  += $total_stu[$i];
                            $sTraining   += $training[$i];
                            $sNon_training  += $non_training[$i];
                    }
                    if($n>1){
                        echo"<tr>";
                            echo "<td><b>รวมทั้งหมด</td>";
                            echo "<td><b>".$sTotal_stu."</td>";
                            
                                $percSTraining = ($sTraining*100)/$sTotal_stu; // หา % ฝึกสหกิจรวม
                            echo "<td><b>".$sTraining." ( ".number_format($percSTraining, 2, '.', ' ')."% )</td>";
                            
                                $percSNontraining = ($sNon_training*100)/$sTotal_stu; // หา % ฝึกสหกิจรวม
                            echo "<td><b>".$sNon_training." ( ".number_format($percSNontraining, 2, '.', ' ')."% )</td>";;
                        echo"</tr>"; 
                    }
                    // ************************************************

                ?>
            
            </tbody>        
        </table><br>  
    <!-- ************************************************************* -->
   
        <!-- ---------------ตารางส่วนที่ใช้สร้างกราฟ----------------     -->
        <div style="display:none">
        <table class="table" id="datatable3">
            <thead>
                <tr>
                    <th>ปีการศึกษา</th>
                    <th>นักศึกษาฝึกสหกิจ</th>
                    <th>นักศึกษาไม่ฝึกสหกิจ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for($i=$start; $i<$p_size; $i++){
                    echo"<tr>";
                            echo "<td>".$nYears6[$i]."</td>";
                            echo "<td>".$training[$i]."</td>";
                            echo "<td>".$non_training[$i]."</td>"; 
                    echo"</tr>";
                }

                ?>
            
            </tbody>        
        </table>
    </div>
    <!-- --------------------------------------------------------- -->

    <!-- ====================การปุ่มแบ่งหลายหน้า================================= -->
    <?php
if($n>3){
echo "<table>";
echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
echo"<form  action = 'reportcooperativetraining.php' method ='post'> ";
    echo "แสดงหน้าที่ : $page จากทั้งหมด ".$total_page." หน้า &nbsp";
    echo "<input type='hidden' name='pageno' value='$page'>";
echo "</td></tr>";

echo "<tr style = 'text-align: center;'><td style = 'text-align: center;'>";
	echo "<input class='btn btn-info btn-sm' name = 'firstPage' type='submit' value='<< หน้าเเรก' /> &nbsp";
	echo "<input class='btn btn-default btn-sm' name = 'prePage' type='submit' value='< ก่อนหน้า' /> &nbsp";
	echo "<input class='btn btn-default btn-sm' name = 'nextPage' type='submit' value='ถัดไป >' /> &nbsp";
	echo "<input class='btn btn-info btn-sm' name = 'lastPage' type='submit' value='สุดท้าย >>' /> &nbsp";
echo "</form>";    
echo "</td></tr>";
echo "</table><br>";
}
?>
 <!-- =============================================================================== -->

    <!-- ********แสดงกราฟ ไปฝึกสหกิจศึกษา************ -->
    <br>
    <div class="row">
            <div class="col-sm-7">
                <figure class="highcharts-figure">
                    <div id="barChat3"></div>
                </figure>
            </div>
            <div class="col-sm-5">
                <figure class="highcharts-figure">
                    <div id="pieChat3"></div>  
                </figure>
            </div>
    
    </div><br><hr><br>             
    <!--******************************************-->

    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
   
    <!-- ==========Bar Chat แยกตามสาขางาน============= -->
    <script>
         Highcharts.chart('barChat1', {
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'แผนภูมิแท่งแสดงจำนวนของนักศึกษาฝึกสหกิจศึกษา แยกตามสาขางาน'
            },
            yAxis: {
                allowDecimals: false,
                    title: {
                    text: 'จำนวน (คน)'
                    }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        }); 
    </script>

    <!-- ==========Pie Chat แยกตามสาขางาน============= -->
    <script>
    Highcharts.chart('pieChat1', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
         text: 'แผนภูมิวงกลมแสดงอัตราส่วนของนักศึกษาฝึกสหกิจศึกษา แยกตามสาขางาน'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'คิดเป็น',
            colorByPoint: true,
            data: [{
                    name: 'คณิตศาสตร์',
                    y: <?php echo $pMath; ?>
                }, {
                    name: 'คอมพิวเตอร์',
                    y: <?php echo $pCom; ?>
                }, {
                    name: 'สถิติ',
                    y: <?php echo $pStat; ?>
                }, {
                    name: 'อื่นๆ',
                    y: <?php echo $pOther; ?>
             }]
            
        }]
    });
    </script>  

    <!-- ==========Bar Chat แยกตามภูมิภาคที่ไปฝึกสหกิจศึกษา============= -->
    <script>
         Highcharts.chart('barChat2', {
            data: {
                table: 'datatable2'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'แผนภูมิแท่งแสดงจำนวนของนักศึกษาฝึกสหกิจศึกษา แยกตามภูมิภาคของสถานที่ฝึกสหกิจศึกษา'
            },
            yAxis: {
                allowDecimals: false,
                    title: {
                    text: 'จำนวน (คน)'
                    }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        }); 
    </script>

    <!-- ==========Pie Chat แยกตามภูมิภาคสถานประกอบการ============= -->
    <script>
    Highcharts.chart('pieChat2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
         text: 'แผนภูมิวงกลมแสดงอัตราส่วนของนักศึกษาฝึกสหกิจศึกษา แยกตามภูมิภาคของสถานที่ฝึกสหกิจศึกษา'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'คิดเป็น',
            colorByPoint: true,
            data: [{
                    name: 'ภาคเหนือ',
                    y: <?php echo $pN; ?>
                }, {
                    name: 'ภาคตะวันออกเฉียงเหนือ',
                    y: <?php echo $pNE; ?>
                }, {
                    name: 'ภาคกลาง',
                    y: <?php echo $pC; ?>
                }, {
                    name: 'ภาคตะวันออก',
                    y: <?php echo $pE; ?>
                }, {
                    name: 'ภาคตะวันตก',
                    y: <?php echo $pW; ?>
                }, {
                    name: 'ภาคใต้',
                    y: <?php echo $pS; ?>
             }]
            
        }]
    });
    </script>

      <!-- ==========Bar Chat อัตราการไปฝึกสหกิจ============= -->
      <script>
         Highcharts.chart('barChat3', {
            data: {
                table: 'datatable3'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'แผนภูมิแท่งแสดงจำนวนของนักศึกษาฝึกสหกิจศึกษาและไม่ฝึกสหกิจ ตามปีการศึกษา'
            },
            yAxis: {
                allowDecimals: false,
                    title: {
                    text: 'จำนวน (คน)'
                    }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        }); 
    </script>

    <!-- ==========Pie Chat อัตราการไปฝึกสหกิจ============= -->
    <script>
    Highcharts.chart('pieChat3', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
         text: 'แผนภูมิวงกลมแสดงอัตราส่วนของนักศึกษาฝึกสหกิจศึกษา และไม่ฝึกสหกิจ'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'คิดเป็น',
            colorByPoint: true,
            data: [{
                    name: 'ฝึกสหกิจ',
                    y: <?php echo $sTraining; ?>
                }, {
                    name: 'ไม่ฝึกสหกิจ',
                    y: <?php echo $sNon_training; ?>
             }]
            
        }]
    });
    </script>

  </center>  
  </body> 
</html>