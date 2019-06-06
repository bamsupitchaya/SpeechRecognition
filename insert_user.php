<?php
include('class_conn.php');
$cls_conn=new class_conn;
$user_name=$_POST['user_name'];
$user_tel=$_POST['user_tel'];
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];


$sql1="insert into tb_user(user_name,user_tel,user_username,user_password)";
$sql1.=" values('$user_name','$user_tel','$user_username','$user_password')";
$cls_conn->write_base($sql1);

$sql=" select * from tb_user";
$sql.=" where";
$sql.=" user_username='$user_username'";
$sql.=" and";
$sql.=" user_password='$user_password'";
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