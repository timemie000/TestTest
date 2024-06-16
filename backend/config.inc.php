<?php
    $serv="localhost";
    $user="root";
    $pass="";
    $data="hotel_booking";
    $conn=mysqli_connect($serv,$user,$pass,$data);
    if(!$conn){
        echo "<font color='red'><h1>ไม่สามารถเชื่อมต่อฐานข้อมูลได้</h1></font>";
    }
    mysqli_set_charset($conn,"utf8");
    error_reporting(~E_NOTICE);
    date_default_timezone_set("Asia/Bangkok");
?>