<?php
include('class_conn.php');
$cls_conn=new class_conn;
$sql=" select * from tb_status";
$sql.=" where";
$sql.=" device_id='".$_GET['device_id']."'";
$result=$cls_conn->select_base($sql);
while($row=mysqli_fetch_array($result))
{
	$device_id=$row['device_id'];
	$status_name=$row['status_name'];
	
}

?>
{
  "device_id": "<?=$device_id;?>",
  "status_name": "<?=$status_name;?>"
}