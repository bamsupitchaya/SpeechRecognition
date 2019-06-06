<?php
include('class_conn.php');
$cls_conn=new class_conn;


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
table.paleBlueRows {
  font-family: "Times New Roman", Times, serif;
  border: 1px solid #FFFFFF;
  width: 300px;
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
<th>no</th>
    
<th>Command</th>
<th>Device</th>
<th>Status</th>
<th></th> 
</tr>
</thead>
 
<tbody>

<?php
$sql="
SELECT
tb_speechcontrol.speechcontrol_id,
tb_device.device_name,
tb_speechcontrol.speechcontrol_text,
tb_speechcontrol.speechcontrol_status
FROM
tb_speechcontrol
INNER JOIN tb_device ON tb_speechcontrol.device_id = tb_device.device_id

";
 
$result=$cls_conn->select_base($sql);
    $i=1;
while($row=mysqli_fetch_array($result))
{
?>

<tr>
<td><?=$i++;?></td>
<td><?=$row['speechcontrol_text'];?></td>
<td><?=$row['device_name'];?></td>
<td><?=$row['speechcontrol_status'];?></td>
    <td><a href="update_speechcontrol.php?id=<?=$row['speechcontrol_id'];?>"><button><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
        <a href="delete_speechcontrol.php?id=<?=$row['speechcontrol_id'];?>"><button><i class="fa fa-trash" aria-hidden="true"></i></button></a>
    
    </td> 
</tr>
 <?php	
}
?>
 
 
 
</tbody>
</table>