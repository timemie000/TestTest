<?php 
    include ("config.inc.php");
    $id_room=$_POST["id_room"];
    $name_room=$_POST["name_room"];
    $typeroom=$_POST["typeroom"];
    $price=$_POST["price_room"];
    $status="available";
    $sql2="select *from rooms where name_room='$name_room'";
    $result2=mysqli_query($conn,$sql2);
    if($result2){
    $sql="update rooms set room_number='$name_room',room_type='$typeroom',price='$price' where id='$id_room'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo"<center><h4><font color='green'>บันทึกข้อมูลสำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=room.php'>";
    }else{
        echo"<center><h4><font color='red'>บันทึกข้อมูลไม่สำเร็จ</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=room.php'>";
    }
}else{
    echo"<center><h4><font color='red'>บันทึกข้อมูลไม่สำเร็จเนื่องจากมีชื่อห้องซ้ำกัน</font></h4></center>";
        echo"<meta http-equiv='refresh' content='2;url=room.php'>";
}
mysqli_close($conn);
?>