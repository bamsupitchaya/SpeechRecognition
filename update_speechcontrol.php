<?php
include('class_conn.php');
$cls_conn=new class_conn;
 ?>
 

 

<!-- Form Name -->
 <?php
  if(isset($_GET['id']))
  {
      $id=$_GET['id'];
      $sqlu=" select * from tb_speechcontrol";
      $sqlu.=" where";
      $sqlu.=" speechcontrol_id='$id'";
      $resultu=$cls_conn->select_base($sqlu);
      while($rowu=mysqli_fetch_array($resultu))
      {
          $speechcontrol_id=$rowu['speechcontrol_id'];
          $speechcontrol_text=$rowu['speechcontrol_text'];
          $device_id=$rowu['device_id'];
          $speechcontrol_status=$rowu['speechcontrol_status'];
      }
  }
?>
<form class="form-horizontal" method="post">
    <input type="hidden" name="speechcontrol_id" value="<?=$speechcontrol_id;?>" />
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
      <option value="<?=$rowd['device_id'];?>" 
               <?php
                    if($rowd['device_id']==$device_id)
                    {
                        echo 'selected';
                    }
                ?>
              ><?=$rowd['device_name'];?></option>
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
    <textarea class="form-control" id="speechcontrol_text" name="speechcontrol_text"  ><?=$speechcontrol_text;?></textarea>
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
    <button id="submit" type="submit" name="submit" class="btn btn-success">Update</button>
    <button id="cancel" type="reset" name="cancel" class="btn btn-danger">Cancel</button>
  </div>
</div>

 
</form>
<hr/>


<?php
 if(isset($_POST['submit']))
 {
     $speechcontrol_id=$_POST['speechcontrol_id'];
     $device_id=$_POST['device_id'];
     $speechcontrol_text=$_POST['speechcontrol_text'];  
     $speechcontrol_status=$_POST['speechcontrol_status'];  
     
     $sql=" update tb_speechcontrol";
     $sql.=" set";
     $sql.=" device_id='$device_id'";
     $sql.=" ,speechcontrol_text='$speechcontrol_text'";
     $sql.=" ,speechcontrol_status='$speechcontrol_status'";
     $sql.=" where";
    $sql.=" speechcontrol_id='$speechcontrol_id'";
     
     $cls_conn->write_base($sql);
     echo $cls_conn->show_message('Update success');
     echo $cls_conn->goto_page(1,'show_speechcontrol.php');
 }
?>



