<?php include("head.php"); 
    include("config.inc.php");
    $search=$_POST["search"];
?>    
<div class="container">
    <br/><br/><br/>
<div class="row">
        <div class="col-sm-12">
            <center><h2>ข้อมูลการจอง<?php echo"$search";?></h2></center>
        </div>
</div>
<?php
    $sql1="select * from rooms,bookings_table where bookings_table.room_id=rooms.id and bookings_table.customer_email like '$search%'";
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
                        <th>รหัสรายการจอง</th>
                        <th>หมายเลขห้องพัก</th>
                        <th>ชื่อผู้เข้าพัก</th>
                        <th>E-mail</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>แก้ไขการจอง</th>
                        <th>ลบ</th>
                    </tr>
             </thead>

        <?php 
            while($read=mysqli_fetch_assoc($result1)){
                $id_book=$read["id"];
                $id_room=$read["id"];
                $room_number=$read["room_number"];
                $email=$read["customer_email"];
                $customer_name=$read["customer_name"];
                $check_in_date=$read["check_in_date"];
                $check_out_date=$read["check_out_date"];
            
        ?>
                <tr>
                    <td><?php echo"$id_book";?></td>
                    <td><?php echo"$room_number";?></td>
                    <td><?php echo"$customer_name";?></td>
                    <td><?php echo"$email";?></td>
                    <td><?php echo"$check_in_date";?></td>
                    <td><?php echo"$check_out_date";?></td>
                    <td><?php echo "<a class='btn btn-warning btn_edit' id_book='$id_book'>แก้ไขข้อมูลการจอง</a>";?></td>
                    <td>
                        <?php 
                        echo "<a href='del_booking.php?id_book=$id_book' onclick=\"return confirm('ท่านต้องการลบการจองใช่หรือไม่')\" class='btn btn-danger'>ลบ</a>";
                        ?>
                    </td>
        <?php 
            }
           ?> </table>
    <?php } ?>
    </div>
</div>
</div>
<script>   
    $(function(){
        $(".btn_book").on('click',function(){
            $.ajax({
                url:"booking.php",
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
        $(".btn_edit").on('click',function(){
            $.ajax({
                url:"booking_edit.php",
                data:"id_book="+$(this).attr("id_book"),
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