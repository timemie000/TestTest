<?php 
    include ("config.inc.php");
    $id_room=$_REQUEST["id_room"];
    $status=$_REQUEST["status"];
    $sql2="select * from bookings_table,rooms where bookings_table.room_id=rooms.id and rooms.id='$id_room'";
    $result2=mysqli_query($conn,$sql2);
    $num=mysqli_num_rows($result2);
    if($num==0){
        $sql="update rooms set status='$status' where id='$id_room'";
        $result=mysqli_query($conn,$sql);

    if($result){
        echo"<center><h4><font color='green'>เปลี่ยนสถานะห้องพักสำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=room.php'>";
    }else{
        echo"<center><h4><font color='red'>เปลี่ยนสถานะห้องพักไม่สำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=room.php'>";
    }
}else{
    echo"<center><h4><font color='red'>เปลี่ยนสถานะห้องพักไม่สำเร็จเนื่องจากมีการจองอยู่ในระบบ</font></h4></center>";
    echo"<meta http-equiv='refresh' content='2;url=room.php'>";
}


?>