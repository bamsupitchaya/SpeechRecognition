<?php
include('class_conn.php');
$cls_conn=new class_conn;
$device_name=$_POST['device_name'];
 


$sql1="insert into tb_device(device_name)";
$sql1.=" values('$device_name')";
$cls_conn->write_base($sql1);

$sql=" select * from tb_device";
$sql.=" where";
$sql.=" device_name='$device_name'";
 
$num=$cls_conn->select_numrows($sql);
if($num>=1)
{
	echo "OK_PASS";
}
else
{
	echo "FAIL";
}
?>