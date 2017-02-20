<?php
//ket noi csdl
$conn = mysql_connect("127.0.0.1", "root", "") or die("can't connect database");
//chon csdl
mysql_select_db("training_php",$conn);
// viet query
$sql = "SELECT * FROM users WHERE ORDER BY id DESC";
// thuc thi cau lenh query
$query = mysql_query($sql);
?> 
<table border=1>
<?php
	
	while($row = mysql_fetch_array($query))
		{ 
			echo "<tr>";
			echo "<td>".$row['first_name']. "</td>";
			echo "<td>".$row['last_name']. "</td>";
			echo "<td>".$row['phone']. "</td>";
			echo "<td>".$row['email']. "</td>";
			echo "<td><a href ='delete.php?id=".$row['id']."'>DELETE</a></td>";
			echo "<td><a href ='edit.php?id=".$row['id']."'>EDIT</a></td>";
			echo "</tr>";
		}
?>
</table>