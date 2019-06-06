<?php
include('class_conn.php');
$cls_conn=new class_conn;
$log_speech=$_POST['log_speech'];
$log_datetime=date('Y-m-d H:i:s');



$sql=" select * from tb_speechcontrol";
$sql.=" where";
$sql.=" speechcontrol_text like '%$log_speech%'";
 
$num=$cls_conn->select_numrows($sql);
if($num>=1)
{
	 $result=$cls_conn->select_base($sql);
	 while($row=mysqli_fetch_array($result))
	 {
		 $speechcontrol_id=$row['speechcontrol_id'];
		 $speechcontrol_text=$row['speechcontrol_text'];
		 $device_id=$row['device_id'];
		 $speechcontrol_status=$row['speechcontrol_status'];
		 insert_log($log_speech,$device_id,$speechcontrol_status,$log_datetime);
		 update_status($device_id,$speechcontrol_status);
		  
	 }
}
else
{
		insert_log($log_speech,'','',$log_datetime);
		if($log_speech=='power off')
		{
			update_status_all('OFF');
		}
		if($log_speech=='power on')
		{
			update_status_all('ON');
		}
}


function insert_log($log_speech,$device_id,$log_status,$log_datetime)
{
	$cls_conn=new class_conn;
	$sql1="insert into tb_log(log_speech,device_id,log_status,log_datetime)";
	$sql1.=" values('$log_speech','$device_id','$log_status','$log_datetime')";
	$cls_conn->write_base($sql1);
}

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

function update_status_all($status_name)
{
	$cls_conn=new class_conn;
	$sql1=" update tb_status";
	$sql1.=" set"; 
	$sql1.=" status_name='$status_name'"; 
	 
	$cls_conn->write_base($sql1);
	
}


?>