<?php
include('class_conn.php');
$cls_conn=new class_conn;
 
$user_tel=$_POST['user_tel'];
 

 
$sql=" select * from tb_user";
$sql.=" where";
$sql.=" user_tel='$user_tel'";
 
$num=$cls_conn->select_numrows($sql);
if($num>=1)
{
	$result=$cls_conn->select_base($sql);
	while($row=mysqli_fetch_array($result))
	{
		echo "username :".$row['user_username'];
		echo " and password:".$row['user_password'];
	}
}
else
{
	echo "NotFound";
}
?>