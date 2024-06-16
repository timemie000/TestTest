<?php
    include "config.inc.php";
    $id_room=$_REQUEST["id_room"];
    $sql2="select * from rooms,bookings_table where rooms.id=bookings_table.room_id and rooms.id='$id_room'";
    $result2=mysqli_query($conn,$sql2);
    $read2=mysqli_fetch_assoc($result2);
    $id_book=$read2["id"];
    $id_room=$read2["room_id"];
    $room_number=$read2["room_number"];
    $room_type2=$read2["room_type"];
    $price2=$read2["price"];
    $name_cus=$read2["customer_name"];
    $email=$read2["customer_email"];
    $checkin=$read2["check_in_date"];
    $checkout=$read2["check_out_date"];
?>
    <br/><br/><br/>
    <form name="form1" method="post" action="edit_book.php" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <center><h2>ข้อมูลการจอง</h2></center>
        </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right" >ชื่อผู้เข้าพัก : </p></div>
                <div class="col-sm-6 col-xs-6">
                    <input type="text" class="form-control"  name="customer_name" value="<?php echo"$name_cus";?>" required>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right" >Email : </p></div>
                <div class="col-sm-6 col-xs-6">
                    <input type="text" class="form-control"  name="email" value="<?php echo"$email";?>" required>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right" >Check In : </p></div>
                <div class="col-sm-6 col-xs-6">
                    <input type="date" class="form-control" name="checkin" value="<?php echo"$checkin";?>" required>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right" >Check Out : </p></div>
                <div class="col-sm-6 col-xs-6">
                    <input type="date" class="form-control" name="checkout" value="<?php echo"$checkout";?>" required>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right" >หมายเลขห้องพัก : </p></div>
                <div class="col-sm-6 col-xs-6">
                    <select name="id_room" class="form-control" required >
                        <option value="<?php echo"$id_room";?>">ห้องหมายเลข&nbsp;<?php echo"$room_number"; ?>&nbsp;ประเภท&nbsp;<?php echo"$room_type2"; ?>&nbsp;ราคา&nbsp;<?php echo"$price2"; ?></option>
                        <?php
                            $sql="select * from rooms where status='available'";
                            $result=mysqli_query($conn,$sql);
                        while($read=mysqli_fetch_assoc($result)){
                            $room_number2=$read["room_number"];
                            $room_type=$read["room_type"];
                            $price=$read["price"];
                            $id_roomavi=$read["id"];
                            echo"<option value='$id_roomavi'>ห้องหมายเลข&nbsp;$room_number2&nbsp;ประเภท&nbsp;$room_type&nbsp;ราคา&nbsp;$price</option>";
                        }
                        ?>
                    </select>
                </div>
            </div><br/>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="+ บันทึก">
            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
        <input type="hidden" name="id_book" value="<?php echo"$id_book";?>">
    </div>
    </form>