<?php
    include "config.inc.php";
?>
    <br/><br/><br/>
    <form name="form1" method="post" action="room_add2.php" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <center><h2>เพิ่มข้อมูลห้อง</h2></center>
        </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right">หมายเลขห้องพัก :</p></div>
                <div class="col-sm-6 col-xs-6">
                    <input type="text" class="form-control" name="name_room" placeholder="กรุณากรอก หมายเลขห้อง" required>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right">ประเภทห้องพัก :</p></div>
                <div class="col-sm-6 col-xs-6">
                    <select name="typeroom" class="form-control" required>
                        <option value="">เลือกประเภทห้องพัก</option>
                        <option value="Standard">Standard Room</option>
                        <option value="Superior">Superior Room</option>
                        <option value="Deluxe">Deluxe Room</option>
                        <option value="Suite">Suite Room</option>
                    </select>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-4 col-xs-4"><p align="right">ราคาห้องพัก :</p></div>
                <div class="col-sm-6 col-xs-6">
                    <input type="number" class="form-control" name="price_room" placeholder="กรุณากรอก ราคาห้องพัก" required>
                </div>
            </div><br/>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="+ บันทึก">
            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
    </div>
    </form>