<?php
    include "config.inc.php";
    $id_room=$_REQUEST["id_room"];
    $sql2="select * from rooms where id='$id_room'";
    $result2=mysqli_query($conn,$sql2);
    $read=mysqli_fetch_assoc($result2);
    $status=$read["status"];
    if($status=="available"){
        $sql="delete from rooms where id='$id_room'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo"<font color='green'><center><h2>ลบข้อมูลสำเร็จ</h2></center></font>";
            echo"<meta http-equiv='refresh' content='2;url=room.php'>";
        }else{
            echo"<font color='red'><center><h2>ลบข้อมูลไม่สำเร็จ</h2></center></font>";
            echo"<meta http-equiv='refresh' content='2;url=room.php'>";
        }
    }else{
        echo"<font color='red'><center><h2>ลบข้อมูลไม่สำเร็จ เนื่องจากมีการจองห้องพักอยู่</h2></center></font>";
        echo"<meta http-equiv='refresh' content='2;url=room.php'>";
    }
    mysqli_close($conn);
?>  