<?php include("head.php"); 
    include("config.inc.php");
?>    
<div class="container">
    <br/><br/><br/>
<div class="row">
        <div class="col-sm-12">
            <center><h2>ข้อมูลห้อง</h2></center>
        </div>
        <div class="col-sm-12">
            <a class="btn btn-primary btn_add"><i class="glyphicon glyphicon-plus"></i>&nbsp;เพิ่มข้อมูลห้อง</a>
        </div>
</div>
<?php 
    $sql1="select * from rooms order by id desc";
    $result1=mysqli_query($conn,$sql1);
    $total=mysqli_num_rows($result1);

?>
<div class="row">
    <div class="col-sm-12">
        <?php if($total==0){
            echo"<center><h4><font color='red'>ไม่พบข้อมูล</font></h4></center>";
        }else{
            echo "<font color='blue'><h4>จำนวนรายการ $total รายการ</h4></font>";
        ?>
        <table class="table table-striped table-hover">
            <thead class="thead">
                    <tr>
                        <th>รหัสห้อง</th>
                        <th>หมายเลขห้องพัก</th>
                        <th>ประเภทห้องพัก</th>
                        <th>ราคาห้องพัก</th>
                        <th>สถานะห้องพัก</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                        <th>เปลี่ยนสถานะห้อง</th>
                    </tr>
             </thead>

        <?php 
            while($read=mysqli_fetch_assoc($result1)){
                $id_room=$read["id"];
                $room_number=$read["room_number"];
                $typeroom=$read["room_type"];
                $price=$read["price"];
                $status=$read["status"];
            
        ?>
                <tr>
                    <td><?php echo"$id_room";?></td>
                    <td><?php echo"$room_number";?></td>
                    <td><?php echo"$typeroom";?></td>
                    <td><?php echo"$price";?></td>
                    <td><?php 
                    $sql3="select * from bookings_table,rooms where rooms.id=bookings_table.room_id and rooms.id='$id_room'";
                    $result3=mysqli_query($conn,$sql3);
                    $numm=mysqli_num_rows($result3);
                    if($status=="available"){echo"<font color='green'>$status</font>";}
                    elseif($status=="booked" && $numm!=0 ){
                        echo"<a class='btn btn-info btn_show' id_room='$id_room'>$status</a>";
                    }else{
                        echo"<font color='blue'>$status</font>";
                    }
                    
                    ?></td>
                    <td><?php echo "<a class='btn btn-warning btn_edit' id_room='$id_room'>แก้ไข</a>";?></td>
                        <td><?php 
                        echo "<a href='del_room.php?id_room=$id_room' onclick=\"return confirm('ท่านต้องการลบห้องพักใช่หรือไม่')\" class='btn btn-danger'>ลบ</a>";
                        ?></td>
                    <td><?php if($status=="available"){
                        echo "<a class='btn btn-success' href='status_change.php?id_room=$id_room&status=booked'>เปลี่ยนสถานะห้องพัก</a>";
                    }else{
                        echo "<a class='btn btn-warning' href='status_change.php?id_room=$id_room&status=available'>เปลี่ยนสถานะห้องพัก</a>";
                    }
                    ?></td>
        <?php 
            }
           ?> </table>
    <?php } ?>
    </div>
</div>
</div>
<script>
    $(function(){
        $(".btn_add").on('click',function(){
            $.ajax({
                url:"room_add.php",
                success:function(result){
                    $("#adm").html('');
                    $("#adm").html(result);
                    $("#am").modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                }
            });
        });
    });    
    $(function(){
        $(".btn_edit").on('click',function(){
            $.ajax({
                url:"edit_room.php",
                data:"id_room="+$(this).attr("id_room"),
                type:"GET",
                success:function(result){
                    $("#adm").html('');
                    $("#adm").html(result);
                    $("#am").modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                }
            });
        });
    });
    $(function(){
        $(".btn_show").on('click',function(){
            $.ajax({
                url:"booked.php",
                data:"id_room="+$(this).attr("id_room"),
                type:"GET",
                success:function(result){
                    $("#adm").html('');
                    $("#adm").html(result);
                    $("#am").modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                }
            });
        });
    });  
</script>
<button type="button" class="btn btn-primary btn-lg sr-only" data-toggle="modal"></button>
<div class="modal fade" id="am" role="dialog">
<div class="modal-dialog" id="adm" role="document"></div>
</div>
<?php include("footer.php"); ?>