<?php
include('class_conn.php');
$cls_conn=new class_conn;
$device_id=$_POST['device_id'];
$status_name=$_POST['status_name'];

update_status($device_id,$status_name);
 

function update_status($device_id,$status_name)
{
	$cls_conn=new class_conn;
	$sql1=" update tb_status";
	$sql1.=" set"; 
	$sql1.=" status_name='$status_name'"; 
	$sql1.=" where";
	$sql1.=" device_id='$device_id'";
	$cls_conn->write_base($sql1);
	
}


?>