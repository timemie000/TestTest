<?php include("head.php"); 
    include("config.inc.php");
?>    
<div class="container">
    <br/><br/><br/>
<div class="row">
        <div class="col-sm-12">
            <center><h2>ข้อมูลห้องว่าง</h2></center>
        </div>
</div>
<form action="search_room.php" method="post" name="search">
            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i>&nbsp;ค้นหารายการจองจาก E-mail</span>
            <input type="text" name="search" class="form-control" placeholder="กรอก E-mail ผู้เข้าพัก"><input type="hidden" name="t_type" value="name_pro">
                <div class="input-group-btn"><button class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>&nbsp;ค้นหา</button></div>
            </div>
            </form>
<?php 
    $sql1="select * from rooms where status='available' order by id desc";
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
                        <th>จองห้องพัก</th>
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
                    <td><?php if($status=="available"){echo"<font color='green'>$status</font>";}else{echo"<a class='btn btn-info btn_show' id_room='$id_room'>$status</a>";}?></td>
                    <td><?php echo "<a class='btn btn-info btn_book' id_room='$id_room'>จองห้องพัก</a>";?></td>
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
    
</script>
<button type="button" class="btn btn-primary btn-lg sr-only" data-toggle="modal"></button>
<div class="modal fade" id="am" role="dialog">
<div class="modal-dialog" id="adm" role="document"></div>
</div>
<?php include("footer.php"); ?>