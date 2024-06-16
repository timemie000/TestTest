<?php 
    include ("config.inc.php");
    $id_book=$_POST["id_book"];
    $id_room=$_POST["id_room"];
    $name_cus=$_POST["customer_name"];
    $email=$_POST["email"];
    $checkin=$_POST["checkin"];
    $checkout=$_POST["checkout"];
    $sql="update bookings_table set room_id='$id_room',customer_name='$name_cus',customer_email='$email',check_in_date='$checkin',check_out_date='$checkout' where id='$id_book'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $sql3="update rooms set status='booked' where id='$id_room'";
        $result3=mysqli_query($conn,$sql3);
        echo"<center><h4><font color='green'>บันทึกข้อมูลสำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=index.php'>";
        $sql4="select * from rooms where status='booked'";
        $result4=mysqli_query($conn,$sql4);
        while($read=mysqli_fetch_assoc($result4)){
        $id_check=$read["id"];
        $sql2="select * from rooms,bookings_table where rooms.id=bookings_table.room_id and bookings_table.room_id='$id_check'";
        $result2=mysqli_query($conn,$sql2);
        $num=mysqli_num_rows($result2);
        if($num==0){
            $sql5="update rooms set status='available' where id='$id_check'";
            $result5=mysqli_query($conn,$sql5);
        }
        }
    }else{
        echo"<center><h4><font color='red'>บันทึกข้อมูลไม่สำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=index.php'>";
    }

mysqli_close($conn);
?>