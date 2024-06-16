<?php
    include "config.inc.php";
    $id_book=$_REQUEST["id_book"];
    $sql2="select * from rooms,bookings_table where bookings_table.room_id=rooms.id and bookings_table.id='$id_book'";
    $result2=mysqli_query($conn,$sql2);
    $read=mysqli_fetch_assoc($result2);
    $id_room=$read["room_id"];
        $sql="delete from bookings_table where id='$id_book'";
        $result=mysqli_query($conn,$sql);

        if($result){
            $sql3="update rooms set status='available' where id='$id_room'";
            $result3=mysqli_query($conn,$sql3);
            echo"<font color='green'><center><h2>ลบข้อมูลสำเร็จ</h2></center></font>";
            echo"<meta http-equiv='refresh' content='2;url=index.php'>";
        }else{
            echo"<font color='red'><center><h2>ลบข้อมูลไม่สำเร็จ</h2></center></font>";
            echo"<meta http-equiv='refresh' content='2;url=index.php'>";
        }
    mysqli_close($conn);
?>  