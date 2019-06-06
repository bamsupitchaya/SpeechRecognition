<?php
include('class_conn.php');
$cls_conn=new class_conn;
$username=$_POST['username'];
$password=$_POST['password'];
$sql=" select * from tb_user";
$sql.=" where";
$sql.=" user_username='$username'";
$sql.=" and";
$sql.=" user_password='$password'";
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