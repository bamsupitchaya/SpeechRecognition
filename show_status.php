<?php
include('class_conn.php');
$cls_conn=new class_conn;


?>

<style>
table.paleBlueRows {
  font-family: "Times New Roman", Times, serif;
  border: 1px solid #FFFFFF;
  width: 350px;
  height: 200px;
  text-align: center;
  border-collapse: collapse;
}
table.paleBlueRows td, table.paleBlueRows th {
  border: 3px solid #FFFFFF;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 13px;
}
table.paleBlueRows tr:nth-child(even) {
  background: #D0E4F5;
}
table.paleBlueRows thead {
  background: #0B6FA4;
  border-bottom: 5px solid #FFFFFF;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #FFFFFF;
}
table.paleBlueRows thead th:first-child {
  border-left: none;
}

table.paleBlueRows tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #333333;
  background: #D0E4F5;
  border-top: 3px solid #444444;
}
table.paleBlueRows tfoot td {
  font-size: 14px;
}
</style>
 <table class="paleBlueRows">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Status</th>
 
</tr>
</thead>
 
<tbody>

<?php
$sql=" SELECT
tb_status.status_id,
tb_device.device_name,
tb_status.status_name
FROM
tb_status
INNER JOIN tb_device ON tb_status.device_id = tb_device.device_id
";
 
$result=$cls_conn->select_base($sql);
while($row=mysqli_fetch_array($result))
{
?>

<tr>
<td><?=$row['status_id'];?></td>
<td><?=$row['device_name'];?></td>
<td><?=$row['status_name'];?></td>
 
</tr>
 <?php	
}
?>
 
 
 
</tbody>
</table>