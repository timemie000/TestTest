<?php 
    include ("config.inc.php");
    $name_room=$_POST["name_room"];
    $typeroom=$_POST["typeroom"];
    $price=$_POST["price_room"];
    $status="available";
    $sql="insert into rooms values(null,'$name_room','$typeroom','$price','$status')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo"<center><h4><font color='green'>บันทึกข้อมูลสำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=room.php'>";
    }else{
        echo"<center><h4><font color='red'>บันทึกข้อมูลไม่สำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=room.php'>";
    }
    mysqli_close($conn);
?>