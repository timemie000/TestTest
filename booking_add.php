<?php 
    include ("config.inc.php");
    $id_room=$_POST["id_room"];
    $id_book=$_POST["id_book"];
    $name_cus=$_POST["customer_name"];
    $email=$_POST["email"];
    $checkin=$_POST["checkin"];
    $checkout=$_POST["checkout"];
    $sql="insert into bookings_table values(null,'$id_room','$name_cus','$email','$checkin','$checkout')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $sql3="update rooms set status='booked' where id='$id_room'";
        $result3=mysqli_query($conn,$sql3);
        echo"<center><h4><font color='green'>บันทึกข้อมูลสำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=index.php'>";
        
    }else{
        echo"<center><h4><font color='red'>บันทึกข้อมูลไม่สำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=index.php'>";
    }

mysqli_close($conn);
?>