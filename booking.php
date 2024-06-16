<?php
    include "config.inc.php";
    $id_room=$_REQUEST["id_room"];
    $sql2="select * from rooms where id='$id_room'";
    $result2=mysqli_query($conn,$sql2);
    $read2=mysqli_fetch_assoc($result2);
    $room_number=$read2["room_number"];
    $room_type=$read2["room_type"];
    $price=$read2["price"];
?>
    <br/><br/><br/>
    <form name="form1" method="post" action="booking_add.php" enctype="multipart/form-data">
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
                <div class="col-sm-4 col-xs-4"><p align="right">หมายเลขห้องพัก :</p></div>
                <div class="col-sm-6 col-xs-6">
                    <input type="text" readonly class="form-control" name="name_room" value="<?php echo"$room_number";?>" required>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right">ประเภทห้องพัก :</p></div>
                <div class="col-sm-6 col-xs-6">
                    <select name="typeroom" readonly class="form-control" required>
                        <option value="<?php echo"$room_type";?>"><?php echo"$room_type";?></option>
                    </select>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right">ราคาห้องพัก :</p></div>
                <div class="col-sm-6 col-xs-6">
                    <input type="number" readonly class="form-control" name="price_room" value="<?php echo"$price";?>" required>
                </div>
            </div><br/>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="+ บันทึก">
            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
        <input type="hidden" name="id_room" value="<?php echo"$id_room";?>">
    </div>
    </form>