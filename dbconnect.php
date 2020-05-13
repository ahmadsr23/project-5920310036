<?php
    // $servername = "127.0.0.1";
    // $username = "root";
    // $password = "5920310036";
    // $dbname = "mcs_psu";

    $servername = "172.18.111.41";
    $username = "5920310036";
    $password = "5920310036";
    $dbname = "5920310036";
    // Create connection object
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  
    mysqli_set_charset($conn, "utf8");//is to make Thai readable
?>
