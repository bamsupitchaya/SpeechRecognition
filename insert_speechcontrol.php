<?php
include('class_conn.php');
$cls_conn=new class_conn;
 ?>
 
<form class="form-horizontal" method="post">
 

<!-- Form Name -->
 

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="device_id">Device Name</label>
  <div class="col-md-4">
    <select id="device_id" name="device_id" class="form-control">
        <?php
        $sqld=" select * from tb_device";
        $resuld=$cls_conn->select_base($sqld);
        while($rowd=mysqli_fetch_array($resuld))
        {
            ?>
      <option value="<?=$rowd['device_id'];?>"><?=$rowd['device_name'];?></option>
         <?php
        }
        ?>
     
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="speechcontrol_text">Command</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="speechcontrol_text" name="speechcontrol_text"></textarea>
  </div>
</div>

<!-- Select Multiple -->
<div class="form-group">
  <label class="col-md-4 control-label" for="speechcontrol_status">Status</label>
  <div class="col-md-4">
    <select id="speechcontrol_status" name="speechcontrol_status" class="form-control" multiple="multiple">
      <option value="ON" selected >ON</option>
      <option value="OFF">OFF</option>
    </select>
  </div>
</div>
<br/>
<!-- Button (Double) -->
<div class="form-group">
   
  <div class="col-md-8">
    <button id="submit" type="submit" name="submit" class="btn btn-success">Insert</button>
    <button id="cancel" type="reset" name="cancel" class="btn btn-danger">Cancel</button>
  </div>
</div>

 
</form>
<hr/>


<?php
 if(isset($_POST['submit']))
 {
     $device_id=$_POST['device_id'];
     $speechcontrol_text=$_POST['speechcontrol_text'];  
     $speechcontrol_status=$_POST['speechcontrol_status'];  
     
     $sql=" insert into tb_speechcontrol(speechcontrol_text,device_id,speechcontrol_status)";
     $sql.=" values('$speechcontrol_text','$device_id','$speechcontrol_status')";
     $cls_conn->write_base($sql);
     echo $cls_conn->show_message('insert success');
 }
?>



