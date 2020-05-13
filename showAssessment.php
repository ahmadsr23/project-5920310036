<!DOCTYPE html>
<html lang="en">
  <head>
  <title>รายงานสรุปผลการประเมินการฝึกงานนักศึกษา</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 

<style>

table {
  border-collapse: collapse;
  width: 75%;
}

table, th, td {
    border: 1px solid black;
    text-align: left;
    padding: 8px;
    height: 50px;
}

th {
    height: 30px;
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

        if($search == 'แสดงทั้งหมด'){

            $sql = "SELECT COUNT(*) as total FROM assessment ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
            $sqls = "SELECT suggestion FROM assessment  WHERE suggestion !='' ";
            $results = $conn->query($sqls);
        
            // ข้อ 1.1-------------------------------------------------------------------
            $sql11_1 = "SELECT COUNT(*) as q11_1 FROM assessment WHERE q11 ='ดีมาก' ";
            $result11_1 = $conn->query($sql11_1);
            $row11_1 = $result11_1->fetch_assoc(); 
        
            $sql11_2 = "SELECT COUNT(*) as q11_2 FROM assessment WHERE q11 ='ดี'";
            $result11_2 = $conn->query($sql11_2);
            $row11_2 = $result11_2->fetch_assoc(); 
        
            $sql11_3 = "SELECT COUNT(*) as q11_3 FROM assessment WHERE q11 ='พอใช้'";
            $result11_3 = $conn->query($sql11_3);
            $row11_3 = $result11_3->fetch_assoc(); 
        
            $sql11_4 = "SELECT COUNT(*) as q11_4 FROM assessment WHERE q11 ='ควรปรับปรุง'";
            $result11_4 = $conn->query($sql11_4);
            $row11_4 = $result11_4->fetch_assoc(); 
        
            // ข้อ 1.2------------------------------------------------------------------------    
            $sql12_1 = "SELECT COUNT(*) as q12_1 FROM assessment WHERE q12 ='ดีมาก' ";
            $result12_1 = $conn->query($sql12_1);
            $row12_1 = $result12_1->fetch_assoc(); 
        
            $sql12_2 = "SELECT COUNT(*) as q12_2 FROM assessment WHERE q12 ='ดี'";
            $result12_2 = $conn->query($sql12_2);
            $row12_2 = $result12_2->fetch_assoc(); 
        
            $sql12_3 = "SELECT COUNT(*) as q12_3 FROM assessment WHERE q12 ='พอใช้'";
            $result12_3 = $conn->query($sql12_3);
            $row12_3 = $result12_3->fetch_assoc(); 
        
            $sql12_4 = "SELECT COUNT(*) as q12_4 FROM assessment WHERE q12 ='ควรปรับปรุง'";
            $result12_4 = $conn->query($sql12_4);
            $row12_4 = $result12_4->fetch_assoc(); 
        
            // ข้อ 1.3------------------------------------------------------------------------
            $sql13_1 = "SELECT COUNT(*) as q13_1 FROM assessment WHERE q13 ='ดีมาก' ";
            $result13_1 = $conn->query($sql13_1);
            $row13_1 = $result13_1->fetch_assoc(); 
        
            $sql13_2 = "SELECT COUNT(*) as q13_2 FROM assessment WHERE q13 ='ดี'";
            $result13_2 = $conn->query($sql13_2);
            $row13_2 = $result13_2->fetch_assoc(); 
        
            $sql13_3 = "SELECT COUNT(*) as q13_3 FROM assessment WHERE q13 ='พอใช้'";
            $result13_3 = $conn->query($sql13_3);
            $row13_3 = $result13_3->fetch_assoc(); 
        
            $sql13_4 = "SELECT COUNT(*) as q13_4 FROM assessment WHERE q13 ='ควรปรับปรุง'";
            $result13_4 = $conn->query($sql13_4);
            $row13_4 = $result13_4->fetch_assoc(); 
        
            // ข้อ 2.1------------------------------------------------------------------------
            $sql21_1 = "SELECT COUNT(*) as q21_1 FROM assessment WHERE q21 ='ดีมาก' ";
            $result21_1 = $conn->query($sql21_1);
            $row21_1 = $result21_1->fetch_assoc(); 
        
            $sql21_2 = "SELECT COUNT(*) as q21_2 FROM assessment WHERE q21 ='ดี'";
            $result21_2 = $conn->query($sql21_2);
            $row21_2 = $result21_2->fetch_assoc(); 
        
            $sql21_3 = "SELECT COUNT(*) as q21_3 FROM assessment WHERE q21 ='พอใช้'";
            $result21_3 = $conn->query($sql21_3);
            $row21_3 = $result21_3->fetch_assoc(); 
        
            $sql21_4 = "SELECT COUNT(*) as q21_4 FROM assessment WHERE q21 ='ควรปรับปรุง'";
            $result21_4 = $conn->query($sql21_4);
            $row21_4 = $result21_4->fetch_assoc(); 
        
            // ข้อ 2.2------------------------------------------------------------------------   
            $sql22_1 = "SELECT COUNT(*) as q22_1 FROM assessment WHERE q22 ='ดีมาก' ";
            $result22_1 = $conn->query($sql22_1);
            $row22_1 = $result22_1->fetch_assoc(); 
        
            $sql22_2 = "SELECT COUNT(*) as q22_2 FROM assessment WHERE q22 ='ดี'";
            $result22_2 = $conn->query($sql22_2);
            $row22_2 = $result22_2->fetch_assoc(); 
        
            $sql22_3 = "SELECT COUNT(*) as q22_3 FROM assessment WHERE q22 ='พอใช้'";
            $result22_3 = $conn->query($sql22_3);
            $row22_3 = $result22_3->fetch_assoc(); 
        
            $sql22_4 = "SELECT COUNT(*) as q22_4 FROM assessment WHERE q22 ='ควรปรับปรุง'";
            $result22_4 = $conn->query($sql22_4);
            $row22_4 = $result22_4->fetch_assoc(); 
        
            // ข้อ 2.3------------------------------------------------------------------------
            $sql23_1 = "SELECT COUNT(*) as q23_1 FROM assessment WHERE q23 ='ดีมาก' ";
            $result23_1 = $conn->query($sql23_1);
            $row23_1 = $result23_1->fetch_assoc(); 
        
            $sql23_2 = "SELECT COUNT(*) as q23_2 FROM assessment WHERE q23 ='ดี'";
            $result23_2 = $conn->query($sql23_2);
            $row23_2 = $result23_2->fetch_assoc(); 
        
            $sql23_3 = "SELECT COUNT(*) as q23_3 FROM assessment WHERE q23 ='พอใช้'";
            $result23_3 = $conn->query($sql23_3);
            $row23_3 = $result23_3->fetch_assoc(); 
        
            $sql23_4 = "SELECT COUNT(*) as q23_4 FROM assessment WHERE q23 ='ควรปรับปรุง'";
            $result23_4 = $conn->query($sql23_4);
            $row23_4 = $result23_4->fetch_assoc(); 
        
            // ข้อ 3.1------------------------------------------------------------------------
            $sql31_1 = "SELECT COUNT(*) as q31_1 FROM assessment WHERE q31 ='ดีมาก' ";
            $result31_1 = $conn->query($sql31_1);
            $row31_1 = $result31_1->fetch_assoc(); 
        
            $sql31_2 = "SELECT COUNT(*) as q31_2 FROM assessment WHERE q31 ='ดี'";
            $result31_2 = $conn->query($sql31_2);
            $row31_2 = $result31_2->fetch_assoc(); 
        
            $sql31_3 = "SELECT COUNT(*) as q31_3 FROM assessment WHERE q31 ='พอใช้'";
            $result31_3 = $conn->query($sql31_3);
            $row31_3 = $result31_3->fetch_assoc(); 
        
            $sql31_4 = "SELECT COUNT(*) as q31_4 FROM assessment WHERE q31 ='ควรปรับปรุง'";
            $result31_4 = $conn->query($sql31_4);
            $row31_4 = $result31_4->fetch_assoc(); 
        
            // ข้อ 3.2------------------------------------------------------------------------   
            $sql32_1 = "SELECT COUNT(*) as q32_1 FROM assessment WHERE q32 ='ดีมาก' ";
            $result32_1 = $conn->query($sql32_1);
            $row32_1 = $result32_1->fetch_assoc(); 
        
            $sql32_2 = "SELECT COUNT(*) as q32_2 FROM assessment WHERE q32 ='ดี'";
            $result32_2 = $conn->query($sql32_2);
            $row32_2 = $result32_2->fetch_assoc(); 
        
            $sql32_3 = "SELECT COUNT(*) as q32_3 FROM assessment WHERE q32 ='พอใช้'";
            $result32_3 = $conn->query($sql32_3);
            $row32_3 = $result32_3->fetch_assoc(); 
        
            $sql32_4 = "SELECT COUNT(*) as q32_4 FROM assessment WHERE q32 ='ควรปรับปรุง'";
            $result32_4 = $conn->query($sql32_4);
            $row32_4 = $result32_4->fetch_assoc(); 
        
            // ข้อ 3.3------------------------------------------------------------------------
            $sql33_1 = "SELECT COUNT(*) as q33_1 FROM assessment WHERE q33 ='ดีมาก' ";
            $result33_1 = $conn->query($sql33_1);
            $row33_1 = $result33_1->fetch_assoc(); 
        
            $sql33_2 = "SELECT COUNT(*) as q33_2 FROM assessment WHERE q33 ='ดี'";
            $result33_2 = $conn->query($sql33_2);
            $row33_2 = $result33_2->fetch_assoc(); 
        
            $sql33_3 = "SELECT COUNT(*) as q33_3 FROM assessment WHERE q33 ='พอใช้'";
            $result33_3 = $conn->query($sql33_3);
            $row33_3 = $result33_3->fetch_assoc(); 
        
            $sql33_4 = "SELECT COUNT(*) as q33_4 FROM assessment WHERE q33 ='ควรปรับปรุง'";
            $result33_4 = $conn->query($sql33_4);
            $row33_4 = $result33_4->fetch_assoc(); 
        
            // ข้อ 3.4------------------------------------------------------------------------
            $sql34_1 = "SELECT COUNT(*) as q34_1 FROM assessment WHERE q34 ='ดีมาก' ";
            $result34_1 = $conn->query($sql34_1);
            $row34_1 = $result34_1->fetch_assoc(); 
        
            $sql34_2 = "SELECT COUNT(*) as q34_2 FROM assessment WHERE q34 ='ดี'";
            $result34_2 = $conn->query($sql34_2);
            $row34_2 = $result34_2->fetch_assoc(); 
        
            $sql34_3 = "SELECT COUNT(*) as q34_3 FROM assessment WHERE q34 ='พอใช้'";
            $result34_3 = $conn->query($sql34_3);
            $row34_3 = $result34_3->fetch_assoc(); 
        
            $sql34_4 = "SELECT COUNT(*) as q34_4 FROM assessment WHERE q34 ='ควรปรับปรุง'";
            $result34_4 = $conn->query($sql34_4);
            $row34_4 = $result34_4->fetch_assoc(); 
        
            // ข้อ 3.5------------------------------------------------------------------------   
            $sql35_1 = "SELECT COUNT(*) as q35_1 FROM assessment WHERE q35 ='ดีมาก' ";
            $result35_1 = $conn->query($sql35_1);
            $row35_1 = $result35_1->fetch_assoc(); 
        
            $sql35_2 = "SELECT COUNT(*) as q35_2 FROM assessment WHERE q35 ='ดี'";
            $result35_2 = $conn->query($sql35_2);
            $row35_2 = $result35_2->fetch_assoc(); 
        
            $sql35_3 = "SELECT COUNT(*) as q35_3 FROM assessment WHERE q35 ='พอใช้'";
            $result35_3 = $conn->query($sql35_3);
            $row35_3 = $result35_3->fetch_assoc(); 
        
            $sql35_4 = "SELECT COUNT(*) as q35_4 FROM assessment WHERE q35 ='ควรปรับปรุง'";
            $result35_4 = $conn->query($sql35_4);
            $row35_4 = $result35_4->fetch_assoc(); 
        
            // ข้อ 4.1------------------------------------------------------------------------
            $sql41_1 = "SELECT COUNT(*) as q41_1 FROM assessment WHERE q41 ='ดีมาก' ";
            $result41_1 = $conn->query($sql41_1);
            $row41_1 = $result41_1->fetch_assoc(); 
        
            $sql41_2 = "SELECT COUNT(*) as q41_2 FROM assessment WHERE q41 ='ดี'";
            $result41_2 = $conn->query($sql41_2);
            $row41_2 = $result41_2->fetch_assoc(); 
        
            $sql41_3 = "SELECT COUNT(*) as q41_3 FROM assessment WHERE q41 ='พอใช้'";
            $result41_3 = $conn->query($sql41_3);
            $row41_3 = $result41_3->fetch_assoc(); 
        
            $sql41_4 = "SELECT COUNT(*) as q41_4 FROM assessment WHERE q41 ='ควรปรับปรุง'";
            $result41_4 = $conn->query($sql41_4);
            $row41_4 = $result41_4->fetch_assoc(); 
        
            // ข้อ 4.2------------------------------------------------------------------------   
            $sql42_1 = "SELECT COUNT(*) as q42_1 FROM assessment WHERE q42 ='ดีมาก' ";
            $result42_1 = $conn->query($sql42_1);
            $row42_1 = $result42_1->fetch_assoc(); 
        
            $sql42_2 = "SELECT COUNT(*) as q42_2 FROM assessment WHERE q42 ='ดี'";
            $result42_2 = $conn->query($sql42_2);
            $row42_2 = $result42_2->fetch_assoc(); 
        
            $sql42_3 = "SELECT COUNT(*) as q42_3 FROM assessment WHERE q42 ='พอใช้'";
            $result42_3 = $conn->query($sql42_3);
            $row42_3 = $result42_3->fetch_assoc(); 
        
            $sql42_4 = "SELECT COUNT(*) as q42_4 FROM assessment WHERE q42 ='ควรปรับปรุง'";
            $result42_4 = $conn->query($sql42_4);
            $row42_4 = $result42_4->fetch_assoc(); 
        
            // ข้อ 4.3------------------------------------------------------------------------
            $sql43_1 = "SELECT COUNT(*) as q43_1 FROM assessment WHERE q43 ='ดีมาก' ";
            $result43_1 = $conn->query($sql43_1);
            $row43_1 = $result43_1->fetch_assoc(); 
        
            $sql43_2 = "SELECT COUNT(*) as q43_2 FROM assessment WHERE q43 ='ดี'";
            $result43_2 = $conn->query($sql43_2);
            $row43_2 = $result43_2->fetch_assoc(); 
        
            $sql43_3 = "SELECT COUNT(*) as q43_3 FROM assessment WHERE q43 ='พอใช้'";
            $result43_3 = $conn->query($sql43_3);
            $row43_3 = $result43_3->fetch_assoc(); 
        
            $sql43_4 = "SELECT COUNT(*) as q43_4 FROM assessment WHERE q43 ='ควรปรับปรุง'";
            $result43_4 = $conn->query($sql43_4);
            $row43_4 = $result43_4->fetch_assoc(); 
        
            // ข้อ 4.4------------------------------------------------------------------------
            $sql44_1 = "SELECT COUNT(*) as q44_1 FROM assessment WHERE q44 ='ดีมาก' ";
            $result44_1 = $conn->query($sql44_1);
            $row44_1 = $result44_1->fetch_assoc(); 
        
            $sql44_2 = "SELECT COUNT(*) as q44_2 FROM assessment WHERE q44 ='ดี'";
            $result44_2 = $conn->query($sql44_2);
            $row44_2 = $result44_2->fetch_assoc(); 
        
            $sql44_3 = "SELECT COUNT(*) as q44_3 FROM assessment WHERE q44 ='พอใช้'";
            $result44_3 = $conn->query($sql44_3);
            $row44_3 = $result44_3->fetch_assoc(); 
        
            $sql44_4 = "SELECT COUNT(*) as q44_4 FROM assessment WHERE q44 ='ควรปรับปรุง'";
            $result44_4 = $conn->query($sql44_4);
            $row44_4 = $result44_4->fetch_assoc();
            
            // ข้อ 5.1------------------------------------------------------------------------
            $sql51_1 = "SELECT COUNT(*) as q51_1 FROM assessment WHERE q51 ='ดีมาก' ";
            $result51_1 = $conn->query($sql51_1);
            $row51_1 = $result51_1->fetch_assoc(); 
        
            $sql51_2 = "SELECT COUNT(*) as q51_2 FROM assessment WHERE q51 ='ดี'";
            $result51_2 = $conn->query($sql51_2);
            $row51_2 = $result51_2->fetch_assoc(); 
        
            $sql51_3 = "SELECT COUNT(*) as q51_3 FROM assessment WHERE q51 ='พอใช้'";
            $result51_3 = $conn->query($sql51_3);
            $row51_3 = $result51_3->fetch_assoc(); 
        
            $sql51_4 = "SELECT COUNT(*) as q51_4 FROM assessment WHERE q51 ='ควรปรับปรุง'";
            $result51_4 = $conn->query($sql51_4);
            $row51_4 = $result51_4->fetch_assoc(); 
        
            // ข้อ 5.2------------------------------------------------------------------------   
            $sql52_1 = "SELECT COUNT(*) as q52_1 FROM assessment WHERE q52 ='ดีมาก' ";
            $result52_1 = $conn->query($sql52_1);
            $row52_1 = $result52_1->fetch_assoc(); 
        
            $sql52_2 = "SELECT COUNT(*) as q52_2 FROM assessment WHERE q52 ='ดี'";
            $result52_2 = $conn->query($sql52_2);
            $row52_2 = $result52_2->fetch_assoc(); 
        
            $sql52_3 = "SELECT COUNT(*) as q52_3 FROM assessment WHERE q52 ='พอใช้'";
            $result52_3 = $conn->query($sql52_3);
            $row52_3 = $result52_3->fetch_assoc(); 
        
            $sql52_4 = "SELECT COUNT(*) as q52_4 FROM assessment WHERE q52 ='ควรปรับปรุง'";
            $result52_4 = $conn->query($sql52_4);
            $row52_4 = $result52_4->fetch_assoc(); 
        
            // ข้อ 5.3------------------------------------------------------------------------
            $sql53_1 = "SELECT COUNT(*) as q53_1 FROM assessment WHERE q53 ='ดีมาก' ";
            $result53_1 = $conn->query($sql53_1);
            $row53_1 = $result53_1->fetch_assoc(); 
        
            $sql53_2 = "SELECT COUNT(*) as q53_2 FROM assessment WHERE q53 ='ดี'";
            $result53_2 = $conn->query($sql53_2);
            $row53_2 = $result53_2->fetch_assoc(); 
        
            $sql53_3 = "SELECT COUNT(*) as q53_3 FROM assessment WHERE q53 ='พอใช้'";
            $result53_3 = $conn->query($sql53_3);
            $row53_3 = $result53_3->fetch_assoc(); 
        
            $sql53_4 = "SELECT COUNT(*) as q53_4 FROM assessment WHERE q53 ='ควรปรับปรุง'";
            $result53_4 = $conn->query($sql53_4);
            $row53_4 = $result53_4->fetch_assoc(); 
        
            // ข้อ 6.1------------------------------------------------------------------------
            $sql61_1 = "SELECT COUNT(*) as q61_1 FROM assessment WHERE q61 ='ดีมาก' ";
            $result61_1 = $conn->query($sql61_1);
            $row61_1 = $result61_1->fetch_assoc(); 
        
            $sql61_2 = "SELECT COUNT(*) as q61_2 FROM assessment WHERE q61 ='ดี'";
            $result61_2 = $conn->query($sql61_2);
            $row61_2 = $result61_2->fetch_assoc(); 
        
            $sql61_3 = "SELECT COUNT(*) as q61_3 FROM assessment WHERE q61 ='พอใช้'";
            $result61_3 = $conn->query($sql61_3);
            $row61_3 = $result61_3->fetch_assoc(); 
        
            $sql61_4 = "SELECT COUNT(*) as q61_4 FROM assessment WHERE q61 ='ควรปรับปรุง'";
            $result61_4 = $conn->query($sql61_4);
            $row61_4 = $result61_4->fetch_assoc(); 
        
            // ข้อ 6.2------------------------------------------------------------------------   
            $sql62_1 = "SELECT COUNT(*) as q62_1 FROM assessment WHERE q62 ='ดีมาก' ";
            $result62_1 = $conn->query($sql62_1);
            $row62_1 = $result62_1->fetch_assoc(); 
        
            $sql62_2 = "SELECT COUNT(*) as q62_2 FROM assessment WHERE q62 ='ดี'";
            $result62_2 = $conn->query($sql62_2);
            $row62_2 = $result62_2->fetch_assoc(); 
        
            $sql62_3 = "SELECT COUNT(*) as q62_3 FROM assessment WHERE q62 ='พอใช้'";
            $result62_3 = $conn->query($sql62_3);
            $row62_3 = $result62_3->fetch_assoc(); 
        
            $sql62_4 = "SELECT COUNT(*) as q62_4 FROM assessment WHERE q62 ='ควรปรับปรุง'";
            $result62_4 = $conn->query($sql62_4);
            $row62_4 = $result62_4->fetch_assoc(); 
        
            // ข้อ 6.3------------------------------------------------------------------------
            $sql63_1 = "SELECT COUNT(*) as q63_1 FROM assessment WHERE q63 ='ดีมาก' ";
            $result63_1 = $conn->query($sql63_1);
            $row63_1 = $result63_1->fetch_assoc(); 
        
            $sql63_2 = "SELECT COUNT(*) as q63_2 FROM assessment WHERE q63 ='ดี'";
            $result63_2 = $conn->query($sql63_2);
            $row63_2 = $result63_2->fetch_assoc(); 
        
            $sql63_3 = "SELECT COUNT(*) as q63_3 FROM assessment WHERE q63 ='พอใช้'";
            $result63_3 = $conn->query($sql63_3);
            $row63_3 = $result63_3->fetch_assoc(); 
        
            $sql63_4 = "SELECT COUNT(*) as q63_4 FROM assessment WHERE q63 ='ควรปรับปรุง'";
            $result63_4 = $conn->query($sql63_4);
            $row63_4 = $result63_4->fetch_assoc(); 
        
            // ข้อ 6.4------------------------------------------------------------------------
            $sql64_1 = "SELECT COUNT(*) as q64_1 FROM assessment WHERE q64 ='ดีมาก' ";
            $result64_1 = $conn->query($sql64_1);
            $row64_1 = $result64_1->fetch_assoc(); 
        
            $sql64_2 = "SELECT COUNT(*) as q64_2 FROM assessment WHERE q64 ='ดี'";
            $result64_2 = $conn->query($sql64_2);
            $row64_2 = $result64_2->fetch_assoc(); 
        
            $sql64_3 = "SELECT COUNT(*) as q64_3 FROM assessment WHERE q64 ='พอใช้'";
            $result64_3 = $conn->query($sql64_3);
            $row64_3 = $result64_3->fetch_assoc(); 
        
            $sql64_4 = "SELECT COUNT(*) as q64_4 FROM assessment WHERE q64 ='ควรปรับปรุง'";
            $result64_4 = $conn->query($sql64_4);
            $row64_4 = $result64_4->fetch_assoc(); 
        
            // ข้อ 6.5------------------------------------------------------------------------   
            $sql65_1 = "SELECT COUNT(*) as q65_1 FROM assessment WHERE q65 ='ดีมาก' ";
            $result65_1 = $conn->query($sql65_1);
            $row65_1 = $result65_1->fetch_assoc(); 
        
            $sql65_2 = "SELECT COUNT(*) as q65_2 FROM assessment WHERE q65 ='ดี'";
            $result65_2 = $conn->query($sql65_2);
            $row65_2 = $result65_2->fetch_assoc(); 
        
            $sql65_3 = "SELECT COUNT(*) as q65_3 FROM assessment WHERE q65 ='พอใช้'";
            $result65_3 = $conn->query($sql65_3);
            $row65_3 = $result65_3->fetch_assoc(); 
        
            $sql65_4 = "SELECT COUNT(*) as q65_4 FROM assessment WHERE q65 ='ควรปรับปรุง'";
            $result65_4 = $conn->query($sql65_4);
            $row65_4 = $result65_4->fetch_assoc(); 

        }else{

            $sql = "SELECT COUNT(*) as total FROM assessment WHERE years LIKE '%".$search."%' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
            $sqls = "SELECT suggestion FROM assessment  WHERE suggestion !='' AND years LIKE '%".$search."%' ";
            $results = $conn->query($sqls);
        
            // ข้อ 1.1-------------------------------------------------------------------
            $sql11_1 = "SELECT COUNT(*) as q11_1 FROM assessment WHERE q11 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result11_1 = $conn->query($sql11_1);
            $row11_1 = $result11_1->fetch_assoc(); 
        
            $sql11_2 = "SELECT COUNT(*) as q11_2 FROM assessment WHERE q11 ='ดี' AND years LIKE '%".$search."%' ";
            $result11_2 = $conn->query($sql11_2);
            $row11_2 = $result11_2->fetch_assoc(); 
        
            $sql11_3 = "SELECT COUNT(*) as q11_3 FROM assessment WHERE q11 ='พอใช้' AND years LIKE '%".$search."%' ";
            $result11_3 = $conn->query($sql11_3);
            $row11_3 = $result11_3->fetch_assoc(); 
        
            $sql11_4 = "SELECT COUNT(*) as q11_4 FROM assessment WHERE q11 ='ควรปรับปรุง' AND years LIKE '%".$search."%' ";
            $result11_4 = $conn->query($sql11_4);
            $row11_4 = $result11_4->fetch_assoc(); 
        
            // ข้อ 1.2------------------------------------------------------------------------    
            $sql12_1 = "SELECT COUNT(*) as q12_1 FROM assessment WHERE q12 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result12_1 = $conn->query($sql12_1);
            $row12_1 = $result12_1->fetch_assoc(); 
        
            $sql12_2 = "SELECT COUNT(*) as q12_2 FROM assessment WHERE q12 ='ดี' AND years LIKE '%".$search."%' ";
            $result12_2 = $conn->query($sql12_2);
            $row12_2 = $result12_2->fetch_assoc(); 
        
            $sql12_3 = "SELECT COUNT(*) as q12_3 FROM assessment WHERE q12 ='พอใช้' AND years LIKE '%".$search."%' ";
            $result12_3 = $conn->query($sql12_3);
            $row12_3 = $result12_3->fetch_assoc(); 
        
            $sql12_4 = "SELECT COUNT(*) as q12_4 FROM assessment WHERE q12 ='ควรปรับปรุง' AND years LIKE '%".$search."%' ";
            $result12_4 = $conn->query($sql12_4);
            $row12_4 = $result12_4->fetch_assoc(); 
        
            // ข้อ 1.3------------------------------------------------------------------------
            $sql13_1 = "SELECT COUNT(*) as q13_1 FROM assessment WHERE q13 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result13_1 = $conn->query($sql13_1);
            $row13_1 = $result13_1->fetch_assoc(); 
        
            $sql13_2 = "SELECT COUNT(*) as q13_2 FROM assessment WHERE q13 ='ดี' AND years LIKE '%".$search."%' ";
            $result13_2 = $conn->query($sql13_2);
            $row13_2 = $result13_2->fetch_assoc(); 
        
            $sql13_3 = "SELECT COUNT(*) as q13_3 FROM assessment WHERE q13 ='พอใช้' AND years LIKE '%".$search."%' ";
            $result13_3 = $conn->query($sql13_3);
            $row13_3 = $result13_3->fetch_assoc(); 
        
            $sql13_4 = "SELECT COUNT(*) as q13_4 FROM assessment WHERE q13 ='ควรปรับปรุง' AND years LIKE '%".$search."%' ";
            $result13_4 = $conn->query($sql13_4);
            $row13_4 = $result13_4->fetch_assoc(); 
        
            // ข้อ 2.1------------------------------------------------------------------------
            $sql21_1 = "SELECT COUNT(*) as q21_1 FROM assessment WHERE q21 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result21_1 = $conn->query($sql21_1);
            $row21_1 = $result21_1->fetch_assoc(); 
        
            $sql21_2 = "SELECT COUNT(*) as q21_2 FROM assessment WHERE q21 ='ดี' AND years LIKE '%".$search."%'";
            $result21_2 = $conn->query($sql21_2);
            $row21_2 = $result21_2->fetch_assoc(); 
        
            $sql21_3 = "SELECT COUNT(*) as q21_3 FROM assessment WHERE q21 ='พอใช้' AND years LIKE '%".$search."%' ";
            $result21_3 = $conn->query($sql21_3);
            $row21_3 = $result21_3->fetch_assoc(); 
        
            $sql21_4 = "SELECT COUNT(*) as q21_4 FROM assessment WHERE q21 ='ควรปรับปรุง' AND years LIKE '%".$search."%' ";
            $result21_4 = $conn->query($sql21_4);
            $row21_4 = $result21_4->fetch_assoc(); 
        
            // ข้อ 2.2------------------------------------------------------------------------   
            $sql22_1 = "SELECT COUNT(*) as q22_1 FROM assessment WHERE q22 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result22_1 = $conn->query($sql22_1);
            $row22_1 = $result22_1->fetch_assoc(); 
        
            $sql22_2 = "SELECT COUNT(*) as q22_2 FROM assessment WHERE q22 ='ดี' AND years LIKE '%".$search."%' ";
            $result22_2 = $conn->query($sql22_2);
            $row22_2 = $result22_2->fetch_assoc(); 
        
            $sql22_3 = "SELECT COUNT(*) as q22_3 FROM assessment WHERE q22 ='พอใช้' AND years LIKE '%".$search."%' ";
            $result22_3 = $conn->query($sql22_3);
            $row22_3 = $result22_3->fetch_assoc(); 
        
            $sql22_4 = "SELECT COUNT(*) as q22_4 FROM assessment WHERE q22 ='ควรปรับปรุง' AND years LIKE '%".$search."%' ";
            $result22_4 = $conn->query($sql22_4);
            $row22_4 = $result22_4->fetch_assoc(); 
        
            // ข้อ 2.3------------------------------------------------------------------------
            $sql23_1 = "SELECT COUNT(*) as q23_1 FROM assessment WHERE q23 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result23_1 = $conn->query($sql23_1);
            $row23_1 = $result23_1->fetch_assoc(); 
        
            $sql23_2 = "SELECT COUNT(*) as q23_2 FROM assessment WHERE q23 ='ดี' AND years LIKE '%".$search."%'";
            $result23_2 = $conn->query($sql23_2);
            $row23_2 = $result23_2->fetch_assoc(); 
        
            $sql23_3 = "SELECT COUNT(*) as q23_3 FROM assessment WHERE q23 ='พอใช้' AND years LIKE '%".$search."%'";
            $result23_3 = $conn->query($sql23_3);
            $row23_3 = $result23_3->fetch_assoc(); 
        
            $sql23_4 = "SELECT COUNT(*) as q23_4 FROM assessment WHERE q23 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result23_4 = $conn->query($sql23_4);
            $row23_4 = $result23_4->fetch_assoc(); 
        
            // ข้อ 3.1------------------------------------------------------------------------
            $sql31_1 = "SELECT COUNT(*) as q31_1 FROM assessment WHERE q31 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result31_1 = $conn->query($sql31_1);
            $row31_1 = $result31_1->fetch_assoc(); 
        
            $sql31_2 = "SELECT COUNT(*) as q31_2 FROM assessment WHERE q31 ='ดี' AND years LIKE '%".$search."%'";
            $result31_2 = $conn->query($sql31_2);
            $row31_2 = $result31_2->fetch_assoc(); 
        
            $sql31_3 = "SELECT COUNT(*) as q31_3 FROM assessment WHERE q31 ='พอใช้' AND years LIKE '%".$search."%'";
            $result31_3 = $conn->query($sql31_3);
            $row31_3 = $result31_3->fetch_assoc(); 
        
            $sql31_4 = "SELECT COUNT(*) as q31_4 FROM assessment WHERE q31 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result31_4 = $conn->query($sql31_4);
            $row31_4 = $result31_4->fetch_assoc(); 
        
            // ข้อ 3.2------------------------------------------------------------------------   
            $sql32_1 = "SELECT COUNT(*) as q32_1 FROM assessment WHERE q32 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result32_1 = $conn->query($sql32_1);
            $row32_1 = $result32_1->fetch_assoc(); 
        
            $sql32_2 = "SELECT COUNT(*) as q32_2 FROM assessment WHERE q32 ='ดี' AND years LIKE '%".$search."%'";
            $result32_2 = $conn->query($sql32_2);
            $row32_2 = $result32_2->fetch_assoc(); 
        
            $sql32_3 = "SELECT COUNT(*) as q32_3 FROM assessment WHERE q32 ='พอใช้' AND years LIKE '%".$search."%'";
            $result32_3 = $conn->query($sql32_3);
            $row32_3 = $result32_3->fetch_assoc(); 
        
            $sql32_4 = "SELECT COUNT(*) as q32_4 FROM assessment WHERE q32 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result32_4 = $conn->query($sql32_4);
            $row32_4 = $result32_4->fetch_assoc(); 
        
            // ข้อ 3.3------------------------------------------------------------------------
            $sql33_1 = "SELECT COUNT(*) as q33_1 FROM assessment WHERE q33 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result33_1 = $conn->query($sql33_1);
            $row33_1 = $result33_1->fetch_assoc(); 
        
            $sql33_2 = "SELECT COUNT(*) as q33_2 FROM assessment WHERE q33 ='ดี' AND years LIKE '%".$search."%'";
            $result33_2 = $conn->query($sql33_2);
            $row33_2 = $result33_2->fetch_assoc(); 
        
            $sql33_3 = "SELECT COUNT(*) as q33_3 FROM assessment WHERE q33 ='พอใช้' AND years LIKE '%".$search."%'";
            $result33_3 = $conn->query($sql33_3);
            $row33_3 = $result33_3->fetch_assoc(); 
        
            $sql33_4 = "SELECT COUNT(*) as q33_4 FROM assessment WHERE q33 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result33_4 = $conn->query($sql33_4);
            $row33_4 = $result33_4->fetch_assoc(); 
        
            // ข้อ 3.4------------------------------------------------------------------------
            $sql34_1 = "SELECT COUNT(*) as q34_1 FROM assessment WHERE q34 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result34_1 = $conn->query($sql34_1);
            $row34_1 = $result34_1->fetch_assoc(); 
        
            $sql34_2 = "SELECT COUNT(*) as q34_2 FROM assessment WHERE q34 ='ดี' AND years LIKE '%".$search."%'";
            $result34_2 = $conn->query($sql34_2);
            $row34_2 = $result34_2->fetch_assoc(); 
        
            $sql34_3 = "SELECT COUNT(*) as q34_3 FROM assessment WHERE q34 ='พอใช้' AND years LIKE '%".$search."%'";
            $result34_3 = $conn->query($sql34_3);
            $row34_3 = $result34_3->fetch_assoc(); 
        
            $sql34_4 = "SELECT COUNT(*) as q34_4 FROM assessment WHERE q34 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result34_4 = $conn->query($sql34_4);
            $row34_4 = $result34_4->fetch_assoc(); 
        
            // ข้อ 3.5------------------------------------------------------------------------   
            $sql35_1 = "SELECT COUNT(*) as q35_1 FROM assessment WHERE q35 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result35_1 = $conn->query($sql35_1);
            $row35_1 = $result35_1->fetch_assoc(); 
        
            $sql35_2 = "SELECT COUNT(*) as q35_2 FROM assessment WHERE q35 ='ดี' AND years LIKE '%".$search."%'";
            $result35_2 = $conn->query($sql35_2);
            $row35_2 = $result35_2->fetch_assoc(); 
        
            $sql35_3 = "SELECT COUNT(*) as q35_3 FROM assessment WHERE q35 ='พอใช้'AND years LIKE '%".$search."%'";
            $result35_3 = $conn->query($sql35_3);
            $row35_3 = $result35_3->fetch_assoc(); 
        
            $sql35_4 = "SELECT COUNT(*) as q35_4 FROM assessment WHERE q35 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result35_4 = $conn->query($sql35_4);
            $row35_4 = $result35_4->fetch_assoc(); 
        
            // ข้อ 4.1------------------------------------------------------------------------
            $sql41_1 = "SELECT COUNT(*) as q41_1 FROM assessment WHERE q41 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result41_1 = $conn->query($sql41_1);
            $row41_1 = $result41_1->fetch_assoc(); 
        
            $sql41_2 = "SELECT COUNT(*) as q41_2 FROM assessment WHERE q41 ='ดี' AND years LIKE '%".$search."%'";
            $result41_2 = $conn->query($sql41_2);
            $row41_2 = $result41_2->fetch_assoc(); 
        
            $sql41_3 = "SELECT COUNT(*) as q41_3 FROM assessment WHERE q41 ='พอใช้' AND years LIKE '%".$search."%'";
            $result41_3 = $conn->query($sql41_3);
            $row41_3 = $result41_3->fetch_assoc(); 
        
            $sql41_4 = "SELECT COUNT(*) as q41_4 FROM assessment WHERE q41 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result41_4 = $conn->query($sql41_4);
            $row41_4 = $result41_4->fetch_assoc(); 
        
            // ข้อ 4.2------------------------------------------------------------------------   
            $sql42_1 = "SELECT COUNT(*) as q42_1 FROM assessment WHERE q42 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result42_1 = $conn->query($sql42_1);
            $row42_1 = $result42_1->fetch_assoc(); 
        
            $sql42_2 = "SELECT COUNT(*) as q42_2 FROM assessment WHERE q42 ='ดี' AND years LIKE '%".$search."%'";
            $result42_2 = $conn->query($sql42_2);
            $row42_2 = $result42_2->fetch_assoc(); 
        
            $sql42_3 = "SELECT COUNT(*) as q42_3 FROM assessment WHERE q42 ='พอใช้' AND years LIKE '%".$search."%'";
            $result42_3 = $conn->query($sql42_3);
            $row42_3 = $result42_3->fetch_assoc(); 
        
            $sql42_4 = "SELECT COUNT(*) as q42_4 FROM assessment WHERE q42 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result42_4 = $conn->query($sql42_4);
            $row42_4 = $result42_4->fetch_assoc(); 
        
            // ข้อ 4.3------------------------------------------------------------------------
            $sql43_1 = "SELECT COUNT(*) as q43_1 FROM assessment WHERE q43 ='ดีมาก' AND years LIKE '%".$search."%' ";
            $result43_1 = $conn->query($sql43_1);
            $row43_1 = $result43_1->fetch_assoc(); 
        
            $sql43_2 = "SELECT COUNT(*) as q43_2 FROM assessment WHERE q43 ='ดี' AND years LIKE '%".$search."%'";
            $result43_2 = $conn->query($sql43_2);
            $row43_2 = $result43_2->fetch_assoc(); 
        
            $sql43_3 = "SELECT COUNT(*) as q43_3 FROM assessment WHERE q43 ='พอใช้' AND years LIKE '%".$search."%'";
            $result43_3 = $conn->query($sql43_3);
            $row43_3 = $result43_3->fetch_assoc(); 
        
            $sql43_4 = "SELECT COUNT(*) as q43_4 FROM assessment WHERE q43 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result43_4 = $conn->query($sql43_4);
            $row43_4 = $result43_4->fetch_assoc(); 
        
            // ข้อ 4.4------------------------------------------------------------------------
            $sql44_1 = "SELECT COUNT(*) as q44_1 FROM assessment WHERE q44 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result44_1 = $conn->query($sql44_1);
            $row44_1 = $result44_1->fetch_assoc(); 
        
            $sql44_2 = "SELECT COUNT(*) as q44_2 FROM assessment WHERE q44 ='ดี' AND years LIKE '%".$search."%'";
            $result44_2 = $conn->query($sql44_2);
            $row44_2 = $result44_2->fetch_assoc(); 
        
            $sql44_3 = "SELECT COUNT(*) as q44_3 FROM assessment WHERE q44 ='พอใช้' AND years LIKE '%".$search."%'";
            $result44_3 = $conn->query($sql44_3);
            $row44_3 = $result44_3->fetch_assoc(); 
        
            $sql44_4 = "SELECT COUNT(*) as q44_4 FROM assessment WHERE q44 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result44_4 = $conn->query($sql44_4);
            $row44_4 = $result44_4->fetch_assoc();
            
            // ข้อ 5.1------------------------------------------------------------------------
            $sql51_1 = "SELECT COUNT(*) as q51_1 FROM assessment WHERE q51 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result51_1 = $conn->query($sql51_1);
            $row51_1 = $result51_1->fetch_assoc(); 
        
            $sql51_2 = "SELECT COUNT(*) as q51_2 FROM assessment WHERE q51 ='ดี' AND years LIKE '%".$search."%'";
            $result51_2 = $conn->query($sql51_2);
            $row51_2 = $result51_2->fetch_assoc(); 
        
            $sql51_3 = "SELECT COUNT(*) as q51_3 FROM assessment WHERE q51 ='พอใช้' AND years LIKE '%".$search."%'";
            $result51_3 = $conn->query($sql51_3);
            $row51_3 = $result51_3->fetch_assoc(); 
        
            $sql51_4 = "SELECT COUNT(*) as q51_4 FROM assessment WHERE q51 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result51_4 = $conn->query($sql51_4);
            $row51_4 = $result51_4->fetch_assoc(); 
        
            // ข้อ 5.2------------------------------------------------------------------------   
            $sql52_1 = "SELECT COUNT(*) as q52_1 FROM assessment WHERE q52 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result52_1 = $conn->query($sql52_1);
            $row52_1 = $result52_1->fetch_assoc(); 
        
            $sql52_2 = "SELECT COUNT(*) as q52_2 FROM assessment WHERE q52 ='ดี' AND years LIKE '%".$search."%'";
            $result52_2 = $conn->query($sql52_2);
            $row52_2 = $result52_2->fetch_assoc(); 
        
            $sql52_3 = "SELECT COUNT(*) as q52_3 FROM assessment WHERE q52 ='พอใช้' AND years LIKE '%".$search."%'";
            $result52_3 = $conn->query($sql52_3);
            $row52_3 = $result52_3->fetch_assoc(); 
        
            $sql52_4 = "SELECT COUNT(*) as q52_4 FROM assessment WHERE q52 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result52_4 = $conn->query($sql52_4);
            $row52_4 = $result52_4->fetch_assoc(); 
        
            // ข้อ 5.3------------------------------------------------------------------------
            $sql53_1 = "SELECT COUNT(*) as q53_1 FROM assessment WHERE q53 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result53_1 = $conn->query($sql53_1);
            $row53_1 = $result53_1->fetch_assoc(); 
        
            $sql53_2 = "SELECT COUNT(*) as q53_2 FROM assessment WHERE q53 ='ดี' AND years LIKE '%".$search."%'";
            $result53_2 = $conn->query($sql53_2);
            $row53_2 = $result53_2->fetch_assoc(); 
        
            $sql53_3 = "SELECT COUNT(*) as q53_3 FROM assessment WHERE q53 ='พอใช้' AND years LIKE '%".$search."%'";
            $result53_3 = $conn->query($sql53_3);
            $row53_3 = $result53_3->fetch_assoc(); 
        
            $sql53_4 = "SELECT COUNT(*) as q53_4 FROM assessment WHERE q53 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result53_4 = $conn->query($sql53_4);
            $row53_4 = $result53_4->fetch_assoc(); 
        
            // ข้อ 6.1------------------------------------------------------------------------
            $sql61_1 = "SELECT COUNT(*) as q61_1 FROM assessment WHERE q61 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result61_1 = $conn->query($sql61_1);
            $row61_1 = $result61_1->fetch_assoc(); 
        
            $sql61_2 = "SELECT COUNT(*) as q61_2 FROM assessment WHERE q61 ='ดี' AND years LIKE '%".$search."%'";
            $result61_2 = $conn->query($sql61_2);
            $row61_2 = $result61_2->fetch_assoc(); 
        
            $sql61_3 = "SELECT COUNT(*) as q61_3 FROM assessment WHERE q61 ='พอใช้' AND years LIKE '%".$search."%'";
            $result61_3 = $conn->query($sql61_3);
            $row61_3 = $result61_3->fetch_assoc(); 
        
            $sql61_4 = "SELECT COUNT(*) as q61_4 FROM assessment WHERE q61 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result61_4 = $conn->query($sql61_4);
            $row61_4 = $result61_4->fetch_assoc(); 
        
            // ข้อ 6.2------------------------------------------------------------------------   
            $sql62_1 = "SELECT COUNT(*) as q62_1 FROM assessment WHERE q62 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result62_1 = $conn->query($sql62_1);
            $row62_1 = $result62_1->fetch_assoc(); 
        
            $sql62_2 = "SELECT COUNT(*) as q62_2 FROM assessment WHERE q62 ='ดี' AND years LIKE '%".$search."%'";
            $result62_2 = $conn->query($sql62_2);
            $row62_2 = $result62_2->fetch_assoc(); 
        
            $sql62_3 = "SELECT COUNT(*) as q62_3 FROM assessment WHERE q62 ='พอใช้' AND years LIKE '%".$search."%'";
            $result62_3 = $conn->query($sql62_3);
            $row62_3 = $result62_3->fetch_assoc(); 
        
            $sql62_4 = "SELECT COUNT(*) as q62_4 FROM assessment WHERE q62 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result62_4 = $conn->query($sql62_4);
            $row62_4 = $result62_4->fetch_assoc(); 
        
            // ข้อ 6.3------------------------------------------------------------------------
            $sql63_1 = "SELECT COUNT(*) as q63_1 FROM assessment WHERE q63 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result63_1 = $conn->query($sql63_1);
            $row63_1 = $result63_1->fetch_assoc(); 
        
            $sql63_2 = "SELECT COUNT(*) as q63_2 FROM assessment WHERE q63 ='ดี' AND years LIKE '%".$search."%'";
            $result63_2 = $conn->query($sql63_2);
            $row63_2 = $result63_2->fetch_assoc(); 
        
            $sql63_3 = "SELECT COUNT(*) as q63_3 FROM assessment WHERE q63 ='พอใช้' AND years LIKE '%".$search."%'";
            $result63_3 = $conn->query($sql63_3);
            $row63_3 = $result63_3->fetch_assoc(); 
        
            $sql63_4 = "SELECT COUNT(*) as q63_4 FROM assessment WHERE q63 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result63_4 = $conn->query($sql63_4);
            $row63_4 = $result63_4->fetch_assoc(); 
        
            // ข้อ 6.4------------------------------------------------------------------------
            $sql64_1 = "SELECT COUNT(*) as q64_1 FROM assessment WHERE q64 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result64_1 = $conn->query($sql64_1);
            $row64_1 = $result64_1->fetch_assoc(); 
        
            $sql64_2 = "SELECT COUNT(*) as q64_2 FROM assessment WHERE q64 ='ดี' AND years LIKE '%".$search."%'";
            $result64_2 = $conn->query($sql64_2);
            $row64_2 = $result64_2->fetch_assoc(); 
        
            $sql64_3 = "SELECT COUNT(*) as q64_3 FROM assessment WHERE q64 ='พอใช้' AND years LIKE '%".$search."%'";
            $result64_3 = $conn->query($sql64_3);
            $row64_3 = $result64_3->fetch_assoc(); 
        
            $sql64_4 = "SELECT COUNT(*) as q64_4 FROM assessment WHERE q64 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result64_4 = $conn->query($sql64_4);
            $row64_4 = $result64_4->fetch_assoc(); 
        
            // ข้อ 6.5------------------------------------------------------------------------   
            $sql65_1 = "SELECT COUNT(*) as q65_1 FROM assessment WHERE q65 ='ดีมาก' AND years LIKE '%".$search."%'";
            $result65_1 = $conn->query($sql65_1);
            $row65_1 = $result65_1->fetch_assoc(); 
        
            $sql65_2 = "SELECT COUNT(*) as q65_2 FROM assessment WHERE q65 ='ดี' AND years LIKE '%".$search."%'";
            $result65_2 = $conn->query($sql65_2);
            $row65_2 = $result65_2->fetch_assoc(); 
        
            $sql65_3 = "SELECT COUNT(*) as q65_3 FROM assessment WHERE q65 ='พอใช้' AND years LIKE '%".$search."%'";
            $result65_3 = $conn->query($sql65_3);
            $row65_3 = $result65_3->fetch_assoc(); 
        
            $sql65_4 = "SELECT COUNT(*) as q65_4 FROM assessment WHERE q65 ='ควรปรับปรุง' AND years LIKE '%".$search."%'";
            $result65_4 = $conn->query($sql65_4);
            $row65_4 = $result65_4->fetch_assoc(); 

        }
   
}

else{
    $sql = "SELECT COUNT(*) as total FROM assessment ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $sqls = "SELECT suggestion FROM assessment  WHERE suggestion !='' ";
    $results = $conn->query($sqls);

    // ข้อ 1.1-------------------------------------------------------------------
    $sql11_1 = "SELECT COUNT(*) as q11_1 FROM assessment WHERE q11 ='ดีมาก' ";
    $result11_1 = $conn->query($sql11_1);
    $row11_1 = $result11_1->fetch_assoc(); 

    $sql11_2 = "SELECT COUNT(*) as q11_2 FROM assessment WHERE q11 ='ดี'";
    $result11_2 = $conn->query($sql11_2);
    $row11_2 = $result11_2->fetch_assoc(); 

    $sql11_3 = "SELECT COUNT(*) as q11_3 FROM assessment WHERE q11 ='พอใช้'";
    $result11_3 = $conn->query($sql11_3);
    $row11_3 = $result11_3->fetch_assoc(); 

    $sql11_4 = "SELECT COUNT(*) as q11_4 FROM assessment WHERE q11 ='ควรปรับปรุง'";
    $result11_4 = $conn->query($sql11_4);
    $row11_4 = $result11_4->fetch_assoc(); 

    // ข้อ 1.2------------------------------------------------------------------------    
    $sql12_1 = "SELECT COUNT(*) as q12_1 FROM assessment WHERE q12 ='ดีมาก' ";
    $result12_1 = $conn->query($sql12_1);
    $row12_1 = $result12_1->fetch_assoc(); 

    $sql12_2 = "SELECT COUNT(*) as q12_2 FROM assessment WHERE q12 ='ดี'";
    $result12_2 = $conn->query($sql12_2);
    $row12_2 = $result12_2->fetch_assoc(); 

    $sql12_3 = "SELECT COUNT(*) as q12_3 FROM assessment WHERE q12 ='พอใช้'";
    $result12_3 = $conn->query($sql12_3);
    $row12_3 = $result12_3->fetch_assoc(); 

    $sql12_4 = "SELECT COUNT(*) as q12_4 FROM assessment WHERE q12 ='ควรปรับปรุง'";
    $result12_4 = $conn->query($sql12_4);
    $row12_4 = $result12_4->fetch_assoc(); 

    // ข้อ 1.3------------------------------------------------------------------------
    $sql13_1 = "SELECT COUNT(*) as q13_1 FROM assessment WHERE q13 ='ดีมาก' ";
    $result13_1 = $conn->query($sql13_1);
    $row13_1 = $result13_1->fetch_assoc(); 

    $sql13_2 = "SELECT COUNT(*) as q13_2 FROM assessment WHERE q13 ='ดี'";
    $result13_2 = $conn->query($sql13_2);
    $row13_2 = $result13_2->fetch_assoc(); 

    $sql13_3 = "SELECT COUNT(*) as q13_3 FROM assessment WHERE q13 ='พอใช้'";
    $result13_3 = $conn->query($sql13_3);
    $row13_3 = $result13_3->fetch_assoc(); 

    $sql13_4 = "SELECT COUNT(*) as q13_4 FROM assessment WHERE q13 ='ควรปรับปรุง'";
    $result13_4 = $conn->query($sql13_4);
    $row13_4 = $result13_4->fetch_assoc(); 

    // ข้อ 2.1------------------------------------------------------------------------
    $sql21_1 = "SELECT COUNT(*) as q21_1 FROM assessment WHERE q21 ='ดีมาก' ";
    $result21_1 = $conn->query($sql21_1);
    $row21_1 = $result21_1->fetch_assoc(); 

    $sql21_2 = "SELECT COUNT(*) as q21_2 FROM assessment WHERE q21 ='ดี'";
    $result21_2 = $conn->query($sql21_2);
    $row21_2 = $result21_2->fetch_assoc(); 

    $sql21_3 = "SELECT COUNT(*) as q21_3 FROM assessment WHERE q21 ='พอใช้'";
    $result21_3 = $conn->query($sql21_3);
    $row21_3 = $result21_3->fetch_assoc(); 

    $sql21_4 = "SELECT COUNT(*) as q21_4 FROM assessment WHERE q21 ='ควรปรับปรุง'";
    $result21_4 = $conn->query($sql21_4);
    $row21_4 = $result21_4->fetch_assoc(); 

    // ข้อ 2.2------------------------------------------------------------------------   
    $sql22_1 = "SELECT COUNT(*) as q22_1 FROM assessment WHERE q22 ='ดีมาก' ";
    $result22_1 = $conn->query($sql22_1);
    $row22_1 = $result22_1->fetch_assoc(); 

    $sql22_2 = "SELECT COUNT(*) as q22_2 FROM assessment WHERE q22 ='ดี'";
    $result22_2 = $conn->query($sql22_2);
    $row22_2 = $result22_2->fetch_assoc(); 

    $sql22_3 = "SELECT COUNT(*) as q22_3 FROM assessment WHERE q22 ='พอใช้'";
    $result22_3 = $conn->query($sql22_3);
    $row22_3 = $result22_3->fetch_assoc(); 

    $sql22_4 = "SELECT COUNT(*) as q22_4 FROM assessment WHERE q22 ='ควรปรับปรุง'";
    $result22_4 = $conn->query($sql22_4);
    $row22_4 = $result22_4->fetch_assoc(); 

    // ข้อ 2.3------------------------------------------------------------------------
    $sql23_1 = "SELECT COUNT(*) as q23_1 FROM assessment WHERE q23 ='ดีมาก' ";
    $result23_1 = $conn->query($sql23_1);
    $row23_1 = $result23_1->fetch_assoc(); 

    $sql23_2 = "SELECT COUNT(*) as q23_2 FROM assessment WHERE q23 ='ดี'";
    $result23_2 = $conn->query($sql23_2);
    $row23_2 = $result23_2->fetch_assoc(); 

    $sql23_3 = "SELECT COUNT(*) as q23_3 FROM assessment WHERE q23 ='พอใช้'";
    $result23_3 = $conn->query($sql23_3);
    $row23_3 = $result23_3->fetch_assoc(); 

    $sql23_4 = "SELECT COUNT(*) as q23_4 FROM assessment WHERE q23 ='ควรปรับปรุง'";
    $result23_4 = $conn->query($sql23_4);
    $row23_4 = $result23_4->fetch_assoc(); 

    // ข้อ 3.1------------------------------------------------------------------------
    $sql31_1 = "SELECT COUNT(*) as q31_1 FROM assessment WHERE q31 ='ดีมาก' ";
    $result31_1 = $conn->query($sql31_1);
    $row31_1 = $result31_1->fetch_assoc(); 

    $sql31_2 = "SELECT COUNT(*) as q31_2 FROM assessment WHERE q31 ='ดี'";
    $result31_2 = $conn->query($sql31_2);
    $row31_2 = $result31_2->fetch_assoc(); 

    $sql31_3 = "SELECT COUNT(*) as q31_3 FROM assessment WHERE q31 ='พอใช้'";
    $result31_3 = $conn->query($sql31_3);
    $row31_3 = $result31_3->fetch_assoc(); 

    $sql31_4 = "SELECT COUNT(*) as q31_4 FROM assessment WHERE q31 ='ควรปรับปรุง'";
    $result31_4 = $conn->query($sql31_4);
    $row31_4 = $result31_4->fetch_assoc(); 

    // ข้อ 3.2------------------------------------------------------------------------   
    $sql32_1 = "SELECT COUNT(*) as q32_1 FROM assessment WHERE q32 ='ดีมาก' ";
    $result32_1 = $conn->query($sql32_1);
    $row32_1 = $result32_1->fetch_assoc(); 

    $sql32_2 = "SELECT COUNT(*) as q32_2 FROM assessment WHERE q32 ='ดี'";
    $result32_2 = $conn->query($sql32_2);
    $row32_2 = $result32_2->fetch_assoc(); 

    $sql32_3 = "SELECT COUNT(*) as q32_3 FROM assessment WHERE q32 ='พอใช้'";
    $result32_3 = $conn->query($sql32_3);
    $row32_3 = $result32_3->fetch_assoc(); 

    $sql32_4 = "SELECT COUNT(*) as q32_4 FROM assessment WHERE q32 ='ควรปรับปรุง'";
    $result32_4 = $conn->query($sql32_4);
    $row32_4 = $result32_4->fetch_assoc(); 

    // ข้อ 3.3------------------------------------------------------------------------
    $sql33_1 = "SELECT COUNT(*) as q33_1 FROM assessment WHERE q33 ='ดีมาก' ";
    $result33_1 = $conn->query($sql33_1);
    $row33_1 = $result33_1->fetch_assoc(); 

    $sql33_2 = "SELECT COUNT(*) as q33_2 FROM assessment WHERE q33 ='ดี'";
    $result33_2 = $conn->query($sql33_2);
    $row33_2 = $result33_2->fetch_assoc(); 

    $sql33_3 = "SELECT COUNT(*) as q33_3 FROM assessment WHERE q33 ='พอใช้'";
    $result33_3 = $conn->query($sql33_3);
    $row33_3 = $result33_3->fetch_assoc(); 

    $sql33_4 = "SELECT COUNT(*) as q33_4 FROM assessment WHERE q33 ='ควรปรับปรุง'";
    $result33_4 = $conn->query($sql33_4);
    $row33_4 = $result33_4->fetch_assoc(); 

    // ข้อ 3.4------------------------------------------------------------------------
    $sql34_1 = "SELECT COUNT(*) as q34_1 FROM assessment WHERE q34 ='ดีมาก' ";
    $result34_1 = $conn->query($sql34_1);
    $row34_1 = $result34_1->fetch_assoc(); 

    $sql34_2 = "SELECT COUNT(*) as q34_2 FROM assessment WHERE q34 ='ดี'";
    $result34_2 = $conn->query($sql34_2);
    $row34_2 = $result34_2->fetch_assoc(); 

    $sql34_3 = "SELECT COUNT(*) as q34_3 FROM assessment WHERE q34 ='พอใช้'";
    $result34_3 = $conn->query($sql34_3);
    $row34_3 = $result34_3->fetch_assoc(); 

    $sql34_4 = "SELECT COUNT(*) as q34_4 FROM assessment WHERE q34 ='ควรปรับปรุง'";
    $result34_4 = $conn->query($sql34_4);
    $row34_4 = $result34_4->fetch_assoc(); 

    // ข้อ 3.5------------------------------------------------------------------------   
    $sql35_1 = "SELECT COUNT(*) as q35_1 FROM assessment WHERE q35 ='ดีมาก' ";
    $result35_1 = $conn->query($sql35_1);
    $row35_1 = $result35_1->fetch_assoc(); 

    $sql35_2 = "SELECT COUNT(*) as q35_2 FROM assessment WHERE q35 ='ดี'";
    $result35_2 = $conn->query($sql35_2);
    $row35_2 = $result35_2->fetch_assoc(); 

    $sql35_3 = "SELECT COUNT(*) as q35_3 FROM assessment WHERE q35 ='พอใช้'";
    $result35_3 = $conn->query($sql35_3);
    $row35_3 = $result35_3->fetch_assoc(); 

    $sql35_4 = "SELECT COUNT(*) as q35_4 FROM assessment WHERE q35 ='ควรปรับปรุง'";
    $result35_4 = $conn->query($sql35_4);
    $row35_4 = $result35_4->fetch_assoc(); 

    // ข้อ 4.1------------------------------------------------------------------------
    $sql41_1 = "SELECT COUNT(*) as q41_1 FROM assessment WHERE q41 ='ดีมาก' ";
    $result41_1 = $conn->query($sql41_1);
    $row41_1 = $result41_1->fetch_assoc(); 

    $sql41_2 = "SELECT COUNT(*) as q41_2 FROM assessment WHERE q41 ='ดี'";
    $result41_2 = $conn->query($sql41_2);
    $row41_2 = $result41_2->fetch_assoc(); 

    $sql41_3 = "SELECT COUNT(*) as q41_3 FROM assessment WHERE q41 ='พอใช้'";
    $result41_3 = $conn->query($sql41_3);
    $row41_3 = $result41_3->fetch_assoc(); 

    $sql41_4 = "SELECT COUNT(*) as q41_4 FROM assessment WHERE q41 ='ควรปรับปรุง'";
    $result41_4 = $conn->query($sql41_4);
    $row41_4 = $result41_4->fetch_assoc(); 

    // ข้อ 4.2------------------------------------------------------------------------   
    $sql42_1 = "SELECT COUNT(*) as q42_1 FROM assessment WHERE q42 ='ดีมาก' ";
    $result42_1 = $conn->query($sql42_1);
    $row42_1 = $result42_1->fetch_assoc(); 

    $sql42_2 = "SELECT COUNT(*) as q42_2 FROM assessment WHERE q42 ='ดี'";
    $result42_2 = $conn->query($sql42_2);
    $row42_2 = $result42_2->fetch_assoc(); 

    $sql42_3 = "SELECT COUNT(*) as q42_3 FROM assessment WHERE q42 ='พอใช้'";
    $result42_3 = $conn->query($sql42_3);
    $row42_3 = $result42_3->fetch_assoc(); 

    $sql42_4 = "SELECT COUNT(*) as q42_4 FROM assessment WHERE q42 ='ควรปรับปรุง'";
    $result42_4 = $conn->query($sql42_4);
    $row42_4 = $result42_4->fetch_assoc(); 

    // ข้อ 4.3------------------------------------------------------------------------
    $sql43_1 = "SELECT COUNT(*) as q43_1 FROM assessment WHERE q43 ='ดีมาก' ";
    $result43_1 = $conn->query($sql43_1);
    $row43_1 = $result43_1->fetch_assoc(); 

    $sql43_2 = "SELECT COUNT(*) as q43_2 FROM assessment WHERE q43 ='ดี'";
    $result43_2 = $conn->query($sql43_2);
    $row43_2 = $result43_2->fetch_assoc(); 

    $sql43_3 = "SELECT COUNT(*) as q43_3 FROM assessment WHERE q43 ='พอใช้'";
    $result43_3 = $conn->query($sql43_3);
    $row43_3 = $result43_3->fetch_assoc(); 

    $sql43_4 = "SELECT COUNT(*) as q43_4 FROM assessment WHERE q43 ='ควรปรับปรุง'";
    $result43_4 = $conn->query($sql43_4);
    $row43_4 = $result43_4->fetch_assoc(); 

    // ข้อ 4.4------------------------------------------------------------------------
    $sql44_1 = "SELECT COUNT(*) as q44_1 FROM assessment WHERE q44 ='ดีมาก' ";
    $result44_1 = $conn->query($sql44_1);
    $row44_1 = $result44_1->fetch_assoc(); 

    $sql44_2 = "SELECT COUNT(*) as q44_2 FROM assessment WHERE q44 ='ดี'";
    $result44_2 = $conn->query($sql44_2);
    $row44_2 = $result44_2->fetch_assoc(); 

    $sql44_3 = "SELECT COUNT(*) as q44_3 FROM assessment WHERE q44 ='พอใช้'";
    $result44_3 = $conn->query($sql44_3);
    $row44_3 = $result44_3->fetch_assoc(); 

    $sql44_4 = "SELECT COUNT(*) as q44_4 FROM assessment WHERE q44 ='ควรปรับปรุง'";
    $result44_4 = $conn->query($sql44_4);
    $row44_4 = $result44_4->fetch_assoc();
    
    // ข้อ 5.1------------------------------------------------------------------------
    $sql51_1 = "SELECT COUNT(*) as q51_1 FROM assessment WHERE q51 ='ดีมาก' ";
    $result51_1 = $conn->query($sql51_1);
    $row51_1 = $result51_1->fetch_assoc(); 

    $sql51_2 = "SELECT COUNT(*) as q51_2 FROM assessment WHERE q51 ='ดี'";
    $result51_2 = $conn->query($sql51_2);
    $row51_2 = $result51_2->fetch_assoc(); 

    $sql51_3 = "SELECT COUNT(*) as q51_3 FROM assessment WHERE q51 ='พอใช้'";
    $result51_3 = $conn->query($sql51_3);
    $row51_3 = $result51_3->fetch_assoc(); 

    $sql51_4 = "SELECT COUNT(*) as q51_4 FROM assessment WHERE q51 ='ควรปรับปรุง'";
    $result51_4 = $conn->query($sql51_4);
    $row51_4 = $result51_4->fetch_assoc(); 

    // ข้อ 5.2------------------------------------------------------------------------   
    $sql52_1 = "SELECT COUNT(*) as q52_1 FROM assessment WHERE q52 ='ดีมาก' ";
    $result52_1 = $conn->query($sql52_1);
    $row52_1 = $result52_1->fetch_assoc(); 

    $sql52_2 = "SELECT COUNT(*) as q52_2 FROM assessment WHERE q52 ='ดี'";
    $result52_2 = $conn->query($sql52_2);
    $row52_2 = $result52_2->fetch_assoc(); 

    $sql52_3 = "SELECT COUNT(*) as q52_3 FROM assessment WHERE q52 ='พอใช้'";
    $result52_3 = $conn->query($sql52_3);
    $row52_3 = $result52_3->fetch_assoc(); 

    $sql52_4 = "SELECT COUNT(*) as q52_4 FROM assessment WHERE q52 ='ควรปรับปรุง'";
    $result52_4 = $conn->query($sql52_4);
    $row52_4 = $result52_4->fetch_assoc(); 

    // ข้อ 5.3------------------------------------------------------------------------
    $sql53_1 = "SELECT COUNT(*) as q53_1 FROM assessment WHERE q53 ='ดีมาก' ";
    $result53_1 = $conn->query($sql53_1);
    $row53_1 = $result53_1->fetch_assoc(); 

    $sql53_2 = "SELECT COUNT(*) as q53_2 FROM assessment WHERE q53 ='ดี'";
    $result53_2 = $conn->query($sql53_2);
    $row53_2 = $result53_2->fetch_assoc(); 

    $sql53_3 = "SELECT COUNT(*) as q53_3 FROM assessment WHERE q53 ='พอใช้'";
    $result53_3 = $conn->query($sql53_3);
    $row53_3 = $result53_3->fetch_assoc(); 

    $sql53_4 = "SELECT COUNT(*) as q53_4 FROM assessment WHERE q53 ='ควรปรับปรุง'";
    $result53_4 = $conn->query($sql53_4);
    $row53_4 = $result53_4->fetch_assoc(); 

    // ข้อ 6.1------------------------------------------------------------------------
    $sql61_1 = "SELECT COUNT(*) as q61_1 FROM assessment WHERE q61 ='ดีมาก' ";
    $result61_1 = $conn->query($sql61_1);
    $row61_1 = $result61_1->fetch_assoc(); 

    $sql61_2 = "SELECT COUNT(*) as q61_2 FROM assessment WHERE q61 ='ดี'";
    $result61_2 = $conn->query($sql61_2);
    $row61_2 = $result61_2->fetch_assoc(); 

    $sql61_3 = "SELECT COUNT(*) as q61_3 FROM assessment WHERE q61 ='พอใช้'";
    $result61_3 = $conn->query($sql61_3);
    $row61_3 = $result61_3->fetch_assoc(); 

    $sql61_4 = "SELECT COUNT(*) as q61_4 FROM assessment WHERE q61 ='ควรปรับปรุง'";
    $result61_4 = $conn->query($sql61_4);
    $row61_4 = $result61_4->fetch_assoc(); 

    // ข้อ 6.2------------------------------------------------------------------------   
    $sql62_1 = "SELECT COUNT(*) as q62_1 FROM assessment WHERE q62 ='ดีมาก' ";
    $result62_1 = $conn->query($sql62_1);
    $row62_1 = $result62_1->fetch_assoc(); 

    $sql62_2 = "SELECT COUNT(*) as q62_2 FROM assessment WHERE q62 ='ดี'";
    $result62_2 = $conn->query($sql62_2);
    $row62_2 = $result62_2->fetch_assoc(); 

    $sql62_3 = "SELECT COUNT(*) as q62_3 FROM assessment WHERE q62 ='พอใช้'";
    $result62_3 = $conn->query($sql62_3);
    $row62_3 = $result62_3->fetch_assoc(); 

    $sql62_4 = "SELECT COUNT(*) as q62_4 FROM assessment WHERE q62 ='ควรปรับปรุง'";
    $result62_4 = $conn->query($sql62_4);
    $row62_4 = $result62_4->fetch_assoc(); 

    // ข้อ 6.3------------------------------------------------------------------------
    $sql63_1 = "SELECT COUNT(*) as q63_1 FROM assessment WHERE q63 ='ดีมาก' ";
    $result63_1 = $conn->query($sql63_1);
    $row63_1 = $result63_1->fetch_assoc(); 

    $sql63_2 = "SELECT COUNT(*) as q63_2 FROM assessment WHERE q63 ='ดี'";
    $result63_2 = $conn->query($sql63_2);
    $row63_2 = $result63_2->fetch_assoc(); 

    $sql63_3 = "SELECT COUNT(*) as q63_3 FROM assessment WHERE q63 ='พอใช้'";
    $result63_3 = $conn->query($sql63_3);
    $row63_3 = $result63_3->fetch_assoc(); 

    $sql63_4 = "SELECT COUNT(*) as q63_4 FROM assessment WHERE q63 ='ควรปรับปรุง'";
    $result63_4 = $conn->query($sql63_4);
    $row63_4 = $result63_4->fetch_assoc(); 

    // ข้อ 6.4------------------------------------------------------------------------
    $sql64_1 = "SELECT COUNT(*) as q64_1 FROM assessment WHERE q64 ='ดีมาก' ";
    $result64_1 = $conn->query($sql64_1);
    $row64_1 = $result64_1->fetch_assoc(); 

    $sql64_2 = "SELECT COUNT(*) as q64_2 FROM assessment WHERE q64 ='ดี'";
    $result64_2 = $conn->query($sql64_2);
    $row64_2 = $result64_2->fetch_assoc(); 

    $sql64_3 = "SELECT COUNT(*) as q64_3 FROM assessment WHERE q64 ='พอใช้'";
    $result64_3 = $conn->query($sql64_3);
    $row64_3 = $result64_3->fetch_assoc(); 

    $sql64_4 = "SELECT COUNT(*) as q64_4 FROM assessment WHERE q64 ='ควรปรับปรุง'";
    $result64_4 = $conn->query($sql64_4);
    $row64_4 = $result64_4->fetch_assoc(); 

    // ข้อ 6.5------------------------------------------------------------------------   
    $sql65_1 = "SELECT COUNT(*) as q65_1 FROM assessment WHERE q65 ='ดีมาก' ";
    $result65_1 = $conn->query($sql65_1);
    $row65_1 = $result65_1->fetch_assoc(); 

    $sql65_2 = "SELECT COUNT(*) as q65_2 FROM assessment WHERE q65 ='ดี'";
    $result65_2 = $conn->query($sql65_2);
    $row65_2 = $result65_2->fetch_assoc(); 

    $sql65_3 = "SELECT COUNT(*) as q65_3 FROM assessment WHERE q65 ='พอใช้'";
    $result65_3 = $conn->query($sql65_3);
    $row65_3 = $result65_3->fetch_assoc(); 

    $sql65_4 = "SELECT COUNT(*) as q65_4 FROM assessment WHERE q65 ='ควรปรับปรุง'";
    $result65_4 = $conn->query($sql65_4);
    $row65_4 = $result65_4->fetch_assoc(); 

}



?>  
  <body>
  <center>
    <h2>รายงานสรุปผลการประเมินการฝึกงานนักศึกษา</h2> <br>   

        <!-- =================== การค้นหา =================== -->
        <form action='showAssessment.php' method='post'>
        <div class="row">
            <div class="col-sm-4"></div>

            <div class="col-sm-3">
            <?php
            $sql0 = "SELECT years  FROM assessment GROUP BY years  ORDER BY years ASC"  ;
            $result0 = $conn->query($sql0);
             echo "<div class='input-group'>";
                echo "<span class='input-group-addon'>ปีการศึกษา</span>";
                echo "<select class='form-control' name='search' >";
                echo "<option value='แสดงทั้งหมด'>- แสดงทั้งหมด -</option>";
                while($row0 = $result0->fetch_assoc()){
                    echo "<option value='".$row0['years']."'";
                     if($_POST['search']==$row0['years']){
                        echo'selected';
                    } 
                    echo ">".$row0['years']."</option>";
                }
                echo"</select>";
            echo "</div>";

            ?>           
            </div>

            <div class='col-sm-1'>
            <input type='submit' name='searchbtn' class='btn btn-primary' value='ค้นหา'>
            </div>

            <div class="col-sm-4"></div>        
        </div><br>   
        </form>

        <?php
        // =================แสดงจำนวน============================        
            
            if($row['total'] > 0){
                if(isset($_POST['searchbtn'])){
                    echo "<h4>ปีการศึกษา ".$search."</h4>";
                }
                echo "<h4>ข้อมูลทั้งหมด : ".$row['total']." คน</h4>";
            }   
            else{   
                if(isset($_POST['searchbtn'])){
                    echo "<h4>ปีการศึกษา ".$search."</h4>";
                }
                echo "<h3>-ไม่พบข้อมูลที่ค้นหา-</h3>";
            }
            
        ?>
         <!-- =================แสดงผลตาราง============================   -->
        <table>        
        <tr>
            <td style="text-align:center"><b>หัวข้อ</td>
            <td style="text-align:center"><b>ดีมาก</th>
            <td style="text-align:center"><b>ดี</td>
            <td style="text-align:center"><b>พอใช้</td>
            <td style="text-align:center"><b>ควรปรับปรุง</td>
        </tr>

        <tr>
        <th colspan="6">1. คุณธรรมจริยธรรม</th>
        </tr>

        <tr>
            <td>1.1 มีวินัย ซื่อสัตย์ สุจริต และรับผิดชอบในหน้าที่ของตนเอง</td>
            <td style="text-align:center">
            <?php if($row11_1['q11_1']!=0){
                 echo number_format($row11_1['q11_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row11_1['q11_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row11_2['q11_2']!=0){
                 echo number_format($row11_2['q11_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row11_2['q11_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row11_3['q11_3']!=0){
                 echo number_format($row11_3['q11_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row11_3['q11_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row11_4['q11_4']!=0){
                 echo number_format($row11_4['q11_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row11_4['q11_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>
    
        <tr>
            <td>1.2. มีจิตอาสาและจิตสาธารณะที่ถูกต้องดีงาม</td>
            <td style="text-align:center">
            <?php if($row12_1['q12_1']!=0){
                 echo number_format($row12_1['q12_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row12_1['q12_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row12_2['q12_2']!=0){
                 echo number_format($row12_2['q12_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row12_2['q12_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row12_3['q12_3']!=0){
                 echo number_format($row12_3['q12_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row12_3['q12_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row12_4['q12_4']!=0){
                 echo number_format($row12_4['q12_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row12_4['q12_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>1.3 มีจิตสำนึกและตระหนักในการปฏิบัติตามจรรยาบรรณทางวิชาการและวิชาชีพ</td>
            <td style="text-align:center">
            <?php if($row13_1['q13_1']!=0){
                 echo number_format($row13_1['q13_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row13_1['q13_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row13_2['q13_2']!=0){
                 echo number_format($row13_2['q13_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row13_2['q13_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row13_3['q13_3']!=0){
                 echo number_format($row13_3['q13_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row13_3['q13_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row13_4['q13_4']!=0){
                 echo number_format($row13_4['q13_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row13_4['q13_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
        <th colspan="6">2. ความรู้ </th>
        </tr>

        <tr>
            <td>2.1 มีความรู้ความเข้าใจในภาคทฤษฎีและารประยุกต์ใช้</td>
            <td style="text-align:center">
            <?php if($row21_1['q21_1']!=0){
                 echo number_format($row21_1['q21_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row21_1['q21_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row21_2['q21_2']!=0){
                 echo number_format($row21_2['q21_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row21_2['q21_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row21_3['q21_3']!=0){
                 echo number_format($row21_3['q21_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row21_3['q21_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row21_4['q21_4']!=0){
                 echo number_format($row21_4['q21_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row21_4['q21_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>2.2 มีความรอบรู้ในเนื้อหาของศาสตร์ต่างๆ ที่ทันสมัย</td>
            <td style="text-align:center">
            <?php if($row22_1['q22_1']!=0){
                 echo number_format($row22_1['q22_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row22_1['q22_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row22_2['q22_2']!=0){
                 echo number_format($row22_2['q22_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row22_2['q22_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row22_3['q22_3']!=0){
                 echo number_format($row22_3['q22_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row22_3['q22_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row22_4['q22_4']!=0){
                 echo number_format($row22_4['q22_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row22_4['q22_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>2.3 มีความตั้งใจและกระตือรือร้นในการแสวงหาความรู้จากการฝึกปฎิบัติงาน</td>
            <td style="text-align:center">
            <?php if($row23_1['q23_1']!=0){
                 echo number_format($row23_1['q23_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row23_1['q23_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row23_2['q23_2']!=0){
                 echo number_format($row23_2['q23_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row23_2['q23_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row23_3['q23_3']!=0){
                 echo number_format($row23_3['q23_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row23_3['q23_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row23_4['q23_4']!=0){
                 echo number_format($row23_4['q23_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row23_4['q23_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
        <th colspan="6">3. ทักษะทางปัญญา</th>
        </tr>

        <tr>
            <td>3.1 มีการบูรณาการความรู้และการนำไปประยุกต์ใช้</td>
            <td style="text-align:center">
            <?php if($row31_1['q31_1']!=0){
                 echo number_format($row31_1['q31_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row31_1['q31_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row31_2['q31_2']!=0){
                 echo number_format($row31_2['q31_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row31_2['q31_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row31_3['q31_3']!=0){
                 echo number_format($row31_3['q31_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row31_3['q31_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row31_4['q31_4']!=0){
                 echo number_format($row31_4['q31_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row31_4['q31_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>3.2 มีความสามารถในสืบค้นและการประเมินข้อมูล</td>
            <td style="text-align:center">
            <?php if($row32_1['q32_1']!=0){
                 echo number_format($row32_1['q32_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row32_1['q32_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row32_2['q32_2']!=0){
                 echo number_format($row32_2['q32_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row32_2['q32_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row32_3['q32_3']!=0){
                 echo number_format($row32_3['q32_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row32_3['q32_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row32_4['q32_4']!=0){
                 echo number_format($row32_4['q32_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row32_4['q32_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>3.3. มีการคิด วิเคราะห์ และสามารถแก้ปัญหาได้</td>
            <td style="text-align:center">
            <?php if($row33_1['q33_1']!=0){
                 echo number_format($row33_1['q33_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row33_1['q33_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row33_2['q33_2']!=0){
                 echo number_format($row33_2['q33_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row33_2['q33_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row33_3['q33_3']!=0){
                 echo number_format($row33_3['q33_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row33_3['q33_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row33_4['q33_4']!=0){
                 echo number_format($row33_4['q33_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row33_4['q33_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>3.4 มีไหวพริบและปฏิภาณในการแก้ไขปัญหา</td>
            <td style="text-align:center">
            <?php if($row34_1['q34_1']!=0){
                 echo number_format($row34_1['q34_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row34_1['q34_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row34_2['q34_2']!=0){
                 echo number_format($row34_2['q34_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row34_2['q34_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row34_3['q34_3']!=0){
                 echo number_format($row34_3['q34_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row34_3['q34_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row34_4['q34_4']!=0){
                 echo number_format($row34_4['q34_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row34_4['q34_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>3.5 พัฒนาการด้านความรู้ความสามารถของนักศึกษาหลังการฝึกงาน</td>
            <td style="text-align:center">
            <?php if($row35_1['q35_1']!=0){
                 echo number_format($row35_1['q35_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row35_1['q35_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row35_2['q35_2']!=0){
                 echo number_format($row35_2['q35_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row35_2['q35_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row35_3['q35_3']!=0){
                 echo number_format($row35_3['q35_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row35_3['q35_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row35_4['q35_4']!=0){
                 echo number_format($row35_4['q35_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row35_4['q35_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
        <th colspan="6">4. ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ</th>
        </tr>

        <tr>
            <td>4.1 มีความสามารถในการปรับตัว รับฟัง ยอมรับความคิดเห็น ทำงานกับผู้อื่นได้ทั้งในฐานะผู้นำและผู้ตาม</td>
            <td style="text-align:center">
            <?php if($row41_1['q41_1']!=0){
                 echo number_format($row41_1['q41_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row41_1['q41_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row41_2['q41_2']!=0){
                 echo number_format($row41_2['q41_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row41_2['q41_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row41_3['q41_3']!=0){
                 echo number_format($row41_3['q41_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row41_3['q41_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row41_4['q41_4']!=0){
                 echo number_format($row41_4['q41_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row41_4['q41_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>4.2 มีความคิดริเริ่ม สามารถวางแผน และตัดสินใจแก้ปัญหาได้อย่างเหมาะสม</td>
            <td style="text-align:center">
            <?php if($row42_1['q42_1']!=0){
                 echo number_format($row42_1['q42_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row42_1['q42_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row42_2['q42_2']!=0){
                 echo number_format($row42_2['q42_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row42_2['q42_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row42_3['q42_3']!=0){
                 echo number_format($row42_3['q42_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row42_3['q42_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row42_4['q42_4']!=0){
                 echo number_format($row42_4['q42_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row42_4['q42_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>4.3 มีมนุษยสัมพันะ์ที่ดีกับผู้ร่วมงานและบุคคลทั่วไป</td>
            <td style="text-align:center">
            <?php if($row43_1['q43_1']!=0){
                 echo number_format($row43_1['q43_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row43_1['q43_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row43_2['q43_2']!=0){
                 echo number_format($row43_2['q43_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row43_2['q43_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row43_3['q43_3']!=0){
                 echo number_format($row43_3['q43_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row43_3['q43_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row43_4['q43_4']!=0){
                 echo number_format($row43_4['q43_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row43_4['q43_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>4.4 การมีสัมมาคารวะต่อผู้บังคับบัญชาและผู้ร่วมงาน</td>
            <td style="text-align:center">
            <?php if($row44_1['q44_1']!=0){
                 echo number_format($row44_1['q44_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row44_1['q44_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row44_2['q44_2']!=0){
                 echo number_format($row44_2['q44_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row44_2['q44_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row44_3['q44_3']!=0){
                 echo number_format($row44_3['q44_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row44_3['q44_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row44_4['q44_4']!=0){
                 echo number_format($row44_4['q44_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row44_4['q44_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
        <th colspan="6">5. ทักษะการคิดวิเคราะห์เชิงตัวเลข การสื่อสารและการใช้เทคโนโลยีสารสนเทศ</th>
        </tr>

        <tr>
            <td>5.1 สามารถวิเคราะห์และเลือกใช้เครื่องมือทางคณิตศาสตร์และสถิติที่เหมาะสมในการแก้ปัญหา</td>
            <td style="text-align:center">
            <?php if($row51_1['q51_1']!=0){
                 echo number_format($row51_1['q51_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row51_1['q51_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row51_2['q51_2']!=0){
                 echo number_format($row51_2['q51_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row51_2['q51_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row51_3['q51_3']!=0){
                 echo number_format($row51_3['q51_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row51_3['q51_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row51_4['q51_4']!=0){
                 echo number_format($row51_4['q51_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row51_4['q51_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>5.2 สามารถใช้ภาษาเพื่อการสื่อสารได้อย่างมีประสิทธิภาพทั้งการฟัง พูด อ่าน และเขียน</td>
            <td style="text-align:center">
            <?php if($row52_1['q52_1']!=0){
                 echo number_format($row52_1['q52_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row52_1['q52_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row52_2['q52_2']!=0){
                 echo number_format($row52_2['q52_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row52_2['q52_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row52_3['q52_3']!=0){
                 echo number_format($row52_3['q52_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row52_3['q52_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row52_4['q52_4']!=0){
                 echo number_format($row52_4['q52_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row52_4['q52_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>5.3 สามารถใช้เทคโนโลยีสารสนเทศที่เหมาะสม เพื่อการนำเสนอและสื่อการ</td>
            <td style="text-align:center">
            <?php if($row53_1['q53_1']!=0){
                 echo number_format($row53_1['q53_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row53_1['q53_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row53_2['q53_2']!=0){
                 echo number_format($row53_2['q53_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row53_2['q53_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row53_3['q53_3']!=0){
                 echo number_format($row53_3['q53_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row53_3['q53_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row53_4['q53_4']!=0){
                 echo number_format($row53_4['q53_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row53_4['q53_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
        <th colspan="6">6. ทักษะการปฏิบัติงาน</th>
        </tr>

        <tr>
            <td>6.1 การปฏิบัติตามกฏระเบียบของสถานที่ฝึกงาน</td>
            <td style="text-align:center">
            <?php if($row61_1['q61_1']!=0){
                 echo number_format($row61_1['q61_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row61_1['q61_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </th>
            <td style="text-align:center">
            <?php if($row61_2['q61_2']!=0){
                 echo number_format($row61_2['q61_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row61_2['q61_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row61_3['q61_3']!=0){
                 echo number_format($row61_3['q61_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row61_3['q61_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row61_4['q61_4']!=0){
                 echo number_format($row61_4['q61_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row61_4['q61_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>6.2 ความสามารถในการใช้อุปกรณ์และเครื่องมือได้อย่างถูกต้อง</td>
            <td style="text-align:center">
            <?php if($row62_1['q62_1']!=0){
                 echo number_format($row62_1['q62_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row62_1['q62_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row62_2['q62_2']!=0){
                 echo number_format($row62_2['q62_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row62_2['q62_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row62_3['q62_3']!=0){
                 echo number_format($row62_3['q62_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row62_3['q62_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row62_4['q62_4']!=0){
                 echo number_format($row62_4['q62_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row62_4['q62_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>6.3 การเตรียมและการจัดลำดับขั้นตอนการปฏิบัติงาน</td>
            <td style="text-align:center">
            <?php if($row63_1['q63_1']!=0){
                 echo number_format($row63_1['q63_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row63_1['q63_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row63_2['q63_2']!=0){
                 echo number_format($row63_2['q63_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row63_2['q63_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row63_3['q63_3']!=0){
                 echo number_format($row63_3['q63_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row63_3['q63_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row63_4['q63_4']!=0){
                 echo number_format($row63_4['q63_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row63_4['q63_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>6.4 ความคล่องเเคล่วและความมั่นใจในการปฏิบัติงาน</td>
            <td style="text-align:center">
            <?php if($row64_1['q64_1']!=0){
                 echo number_format($row64_1['q64_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row64_1['q64_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row64_2['q64_2']!=0){
                 echo number_format($row64_2['q64_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row64_2['q64_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row64_3['q64_3']!=0){
                 echo number_format($row64_3['q64_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row64_3['q64_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row64_4['q64_4']!=0){
                 echo number_format($row64_4['q64_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row64_4['q64_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
            <td>6.5 การแก้ไขปัญหาเฉพาะหน้า</td>
            <td style="text-align:center">
            <?php if($row65_1['q65_1']!=0){
                 echo number_format($row65_1['q65_1']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row65_1['q65_1']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row65_2['q65_2']!=0){
                 echo number_format($row65_2['q65_2']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row65_2['q65_2']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row65_3['q65_3']!=0){
                 echo number_format($row65_3['q65_3']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row65_3['q65_3']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
            <td style="text-align:center">
            <?php if($row65_4['q65_4']!=0){
                 echo number_format($row65_4['q65_4']*100/$row['total'], 2, '.', ' ')."% <br>"; 
                 echo "(".$row65_4['q65_4']." คน)"; 
            }else{
                echo " - ";
            }?>
            </td>
        </tr>

        <tr>
        <th colspan="6">ข้อเสนอแนะ</th>
        </tr>

        <tr>
            <td colspan="6">

            <?php            
                while($rows = $results->fetch_assoc()){
                    echo "&nbsp;-&nbsp;".$rows['suggestion']."<br>";
                }
            ?>

            </td>
        </tr>

        </table><br><br> 
    
    </center>
  </body> 
</html>