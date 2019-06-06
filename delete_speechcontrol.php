<?php
include('class_conn.php');
$cls_conn=new class_conn;
 ?>
 
 
 <?php
  if(isset($_GET['id']))
  {
      $id=$_GET['id'];
      $sql=" delete from tb_speechcontrol";
      $sql.=" where";
      $sql.=" speechcontrol_id='$id'";
        
     $cls_conn->write_base($sql);
     echo $cls_conn->show_message('Delete success');
     echo $cls_conn->goto_page(1,'show_speechcontrol.php');
  }
?>
 


